SelfcareApp.controller('MasterFoodController', function ($rootScope, $scope, $state, FoodMaster, createDialog, $timeout, $http) {
	
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
        FoodMaster.getFoodMaster().success(function (data) {
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

        createDialog(BASE_URL + "/master/addFoodsview", {
            id: 'addFoods',
            title: 'Add Food',
            backdrop: true,
			controller: 'AddFoodController',
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
	
	$scope.editFoodView = function (pid) { 

        createDialog(BASE_URL + "/master/addFoodsview", {
            id: 'editFood',
            title: 'Edit Food',
            backdrop: true,
            controller: 'AddFoodController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit food modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };
	
	
	$scope.deleteFoodView = function (pid, name) {
		createDialog({
            id: 'delSchool',
			template:  angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
                    '    <h4>Are you sure you want to delete Food <b>"'+name+'"</b>?</h4> ' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            title: 'Delete Food',
            backdrop: true,
            footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            success: {label: 'Save', fn: function () {
                    FoodMaster.deleteFood(pid).success(function (data) {
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
	
});

SelfcareApp.controller('AddFoodController', function ($scope, $state, $rootScope, FoodMaster, Edit, createDialog) {
 // alert(Edit)
    $scope.frm = {};
	if(Edit !='') {
		
		FoodMaster.getFoodDetails(Edit).success(function (food) {
			$scope.frm = food.data;
        });
		
		$scope.processadd = function ()
		{
			FoodMaster.editFood($.param($scope.frm)).success(function (data) {
				
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
			FoodMaster.addFoods($.param($scope.frm)).success(function (data) {
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

SelfcareApp.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});