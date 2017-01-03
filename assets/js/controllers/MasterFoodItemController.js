SelfcareApp.controller('MasterFoodItemController', function ($rootScope, $scope, $state, FoodItemMaster, createDialog, $timeout, $http) {
	
	$scope.foods = [];
    $scope.ord = 'id';
	$scope.limitOptions = {
            5: "5",
            10: "10",
            20: "20",
			50: "50",
			100: "100"
          };
	
	
    
    $scope.$on('$viewContentLoaded', function () {
        FoodItemMaster.getFoodItemMaster().success(function (data) {
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.foods = data;
            $scope.totalItems = data.length;
			$scope.currentPage = 1;
			$scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
			
			
        });
		
		$scope.toInt = function(val) {
			return parseInt(val,10); 
		};
    });

	$scope.addNewView = function () {

        createDialog(BASE_URL + "/master/addFoodItemview", {
            id: 'addFoodItem',
            title: 'Add Food Item',
            backdrop: true,
			controller: 'AddFoodItemController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add food modal closed');
                }}
        }
		, {
            Edit: ''

        }
        );
    };
	
	$scope.editFoodItemView = function (pid) {

        createDialog(BASE_URL + "/master/addFoodItemview", {
            id: 'editFoodItem',
            title: 'Edit Food Item',
            backdrop: true,
            controller: 'AddFoodItemController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit food item modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };
	
	
	$scope.deleteFoodItemView = function (pid, name) {
		createDialog({
            id: 'delFoodItem',
			template:  angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
                    '    <h4>Are you sure you want to delete Food Item <b>"'+name+'"</b>?</h4> ' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            title: 'Delete Food',
            backdrop: true,
            footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            success: {label: 'Save', fn: function () {
                    FoodItemMaster.deleteFoodItem(pid).success(function (data) {
						if (data.success == true) {
							toastr.success(data.message);
							$state.reload();
						} else {
							toastr.error(data.message);
						}
					});
                }}
        }
        );
    };
	
	$scope.setPage = function(pageNo) {
		$scope.currentPage = pageNo;
	};
	
	$scope.filter = function() {
		$timeout(function() {
			$scope.filteredItems = $scope.filtered.length;
		}, 10);
	};
	
	$scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	
	//Mapped to the model to filter
   $scope.filterItem = {
    store: $scope.foods,
   }	
	 //Custom filter - filter based on the rating selected
	  $scope.categoryFilter = function (foods) {
		$scope.filteredItems = $scope.filtered.length;
		if($scope.filterItem.store==null)
		{
			return true;
		}
		else if (foods.category === $scope.filterItem.store.category)
		{
		  return true;
		} 
		/*else if ($scope.filterItem.store.category === 0 ) 
		{
		  return true;
		} */
		else if (typeof($scope.filterItem.store.category)==='undefined')
		{
           return true;	
		} 
		else 
		{
		  return false;
		}
	  }; 
	
});

SelfcareApp.controller('AddFoodItemController', function ($scope, $state, $rootScope, FoodMaster, FoodItemMaster, Edit, createDialog) {

    $scope.frm = {};
	
	$scope.food_categories =  {};
	FoodMaster.getFoodMasterShort().success(function (data) {
		$scope.food_categories = data;
	});
	
    $scope.base_calcs = [{value:'Number',name:'Number'}, {value:'cup',name:'cup'}, {value:'gms',name:'gms'}, {value:'slice',name:'slice'}, {value:'Tbsp',name:'Tbsp'}, {value:'Tsp',name:'Tsp'}, {value:'pieces',name:'pieces'}, {value:'Ml',name:'Ml'}, {value:'Pint',name:'Pint'}, {value:'Glass',name:'Glass'}, {value:'slices',name:'slices'}, {value:'rotis',name:'rotis'}, {value:'rings',name:'rings'}, {value:'cookies',name:'cookies'}, {value:'biscuits',name:'biscuits'}];
	
	$scope.nuts = [{value:'CARBS',name:'CARBS'}, {value:'PROTEIN',name:'PROTEIN'}, {value:'FATS',name:'FATS'}, {value:'FIBRE',name:'FIBRE'}, {value:'NA',name:'NA'}];
	
	if(Edit !='') {
		
		FoodItemMaster.getFoodItemDetails(Edit).success(function (food) {
			$scope.frm = food.data;
			console.log(food.data.calc_base);
			
			//$scope.frm.macro_nut = {'value':food.data.macro_nut}; //[{'value':'PROTEIN'},{'value':'FIBRE'}]
			var macro_nuts = food.data.macro_nut;
			var array = new Array();
			var macro_nut_new = [];
			
			array = macro_nuts.split(',');
			angular.forEach(array , function(list){
				macro_nut_new.push({"value":""+list+""});
			});			
			$scope.frm.macro_nut = macro_nut_new;
			
			var calc_bases = food.data.calc_base;
			var array_calc = new Array();
			var calc_base_new = [];
			array_calc = calc_bases.split(',');
			angular.forEach(array_calc , function(list){
				calc_base_new.push({"value":""+list+""});
			});			
			$scope.frm.calc_base = calc_base_new;
        });
		
		
		$scope.processadd = function ()
		{
			FoodItemMaster.editFoodItem($.param($scope.frm)).success(function (data) {
				
				if (data.success == true) {
					$scope.$modalClose();
					toastr.success(data.message);
					$state.reload();
				} else {
					toastr.error(data.message);
				}
			});
		};
	}
	else {
		$scope.processadd = function ()
		{
			FoodItemMaster.addFoodItem($.param($scope.frm)).success(function (data) {
				if (data.success == true) {
					$scope.$modalClose();
					toastr.success(data.message);
					$state.reload();
				} else {
					toastr.error(data.message);
				}
			});
		};
	}

});