SelfcareApp.controller('IntakeMasterController', function ($rootScope, $scope, $state, Intake, createDialog ,$timeout, $http) {
    $scope.intakes = [];
    $scope.ord = 'id'; 
    $scope.limitOptions = {
        5: "5",
        10: "10",
        20: "20",
        50: "50",
        100: "100"
     };
    
    $scope.$on('$viewContentLoaded', function () {      
        Intake.getIntake().success(function (data) {
            $scope.intakes = data;
            $scope.filteredItems = data.length; //Initially for no filter          
           /* $scope.totalItems = data.length;
            $scope.currentPage = 1;
            $scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;*/          
        });
       /* $scope.toInt = function(val) {
			return parseInt(val,10); 
		};*/
    });
/* filter dropdown start */   
    $scope.filterOptions = {
    stores: [
      {id : 1, name : 'Show All',gender: 0},
	  {id : 2, name : 'Female', gender: 'Female' },
	  {id : 3, name : 'Male', gender: 'Male' },
	  {id : 3, name : 'Children', gender: 'Children' }
      
       ]
    };
  $scope.filterItem = {
    store: $scope.filterOptions.stores[0]
  }	
  //Custom filter - filter based on the rating selected
  $scope.customFilter = function (intakes) {
    if (intakes.gender === $scope.filterItem.store.gender) {
      return true;
    } else if ($scope.filterItem.store.gender === 0) {
      return true;
    } else {
      return false;
    }
  }; 
  /* filter dropdown end */
  $scope.sort = function(keyname) {
		$scope.sortKey = keyname;// set the sort key to the parameter passed
                $scope.reverse = !$scope.reverse; // if true make it false or vice varsa
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
        

    
    $scope.editIntake = function (pid) { 
        createDialog(BASE_URL + "/master/addIntakeView", {
            id: 'editIntake',
            title: 'Edit Intake',
            backdrop: true,
            controller: 'AddIntakeController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit Intake modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };
  
    $scope.addIntake = function () {

        createDialog(BASE_URL + "/master/addIntakeView", {
            id: 'addIntake',
            title: 'Add Intake',
            backdrop: true,
			controller: 'AddIntakeController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Intake modal closed');
                }}
        }
		, {
            Edit: ''

        }
        );
    };
    $scope.deleteIntake = function (pid) {
		createDialog({
            id: 'delIntake',
			template:  angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
                    '    <h4>Are you sure you want to delete ?</h4> ' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            title: 'Delete Intake',
            backdrop: true,
            footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            success: {label: 'Save', fn: function () {
                    Intake.deleteIntake(pid).success(function (data) {
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
 
   
    

});


SelfcareApp.controller('AddIntakeController', function ($scope, $state, $rootScope, Intake ,Edit, createDialog) {
    $scope.frm = {}; 
   if(Edit !='') 
   {  
		Intake.getIntakeDetails(Edit).success(function (data) {
			$scope.frm = data;
        });
		
		$scope.processedit = function ()
		{  
			Intake.editIntake($.param($scope.frm)).success(function (data) {
				
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
	else 
	{
		$scope.processedit = function ()
		{
			Intake.addIntake($.param($scope.frm)).success(function (data) {
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




