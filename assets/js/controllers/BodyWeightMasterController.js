'use strict';
SelfcareApp.controller('BodyWeightMasterController', function ($rootScope, $scope, $state, BodyWeight, createDialog ,$timeout, $http) {
    $scope.clients = [];
    $scope.ord = 'id'; 
    $scope.limitOptions = {
        5: "5",
        10: "10",
        20: "20",
        50: "50",
        100: "100"
     };
    
    $scope.$on('$viewContentLoaded', function () {      
        BodyWeight.get_bodyWeight().success(function (data) {
            $scope.clients = data;
            $scope.filteredItems = data.length; //Initially for no filter
           
            $scope.totalItems = data.length;
            $scope.currentPage = 1;
            $scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
            
           
        });
        $scope.toInt = function(val) {
			return parseInt(val,10); 
		};
    });
   
    $scope.filterOptions = {
    stores: [
      {id : 1, name : 'Show All',gender: 0},
	  {id : 2, name : 'Female', gender: 'Female' },
	  {id : 3, name : 'Male', gender: 'Male' }
      
       ]
    };
  //Mapped to the model to filter
  $scope.filterItem = {
    store: $scope.filterOptions.stores[0]
  }	
  //Custom filter - filter based on the rating selected
  $scope.customFilter = function (clients) {
    $scope.filteredItems = $scope.filtered.length;
    if (clients.gender === $scope.filterItem.store.gender) {
      return true;
    } else if ($scope.filterItem.store.gender === 0) {
      return true;
    } else {
      return false;
    }
  }; 
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
	
        

    
    $scope.editBodyWeightMaster = function (pid) {
        createDialog(BASE_URL + "/master/editBodyWeightMaster", {
            id: 'editBodyWeight',
            title: 'Edit Body Weight',
            backdrop: true,
            controller: 'AddBWController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit Body Weight modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };
    $scope.moreBodyWeight = function (pid) {
        createDialog(BASE_URL + "/master/moreBodyWeight", {
            id: 'moreBodyWeight',
            title: 'Body Weight For Different Age Limit',
            backdrop: true,
            controller: 'AddBWController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('More Body Weight modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };
    $scope.addBodyWeight = function () {

        createDialog(BASE_URL + "/master/editBodyWeightMaster", {
            id: 'addBodyWeight',
            title: 'Add Body Weight',
            backdrop: true,
			controller: 'AddBWController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Body Weight modal closed');
                }}
        }
		, {
            Edit: ''

        }
        );
    };
    $scope.deleteBodyWeight = function (pid) {
		createDialog({
            id: 'delBodyWeight',
			template:  angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
                    '    <h4>Are you sure you want to delete ?</h4> ' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            title: 'Delete Body Weight',
            backdrop: true,
            footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            success: {label: 'Save', fn: function () {
                    BodyWeight.deleteBodyWeight(pid).success(function (data) {
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


SelfcareApp.controller('AddBWController', function ($scope, $state, $rootScope, BodyWeight ,Edit, createDialog) {
//alert("hi frm AddController");
    $scope.frm = {};
   /* $scope.isError = false;
    $scope.isErrorpur = false;
    $scope.clickForOne = 0;*/
    
   
   if(Edit !='') 
   {  
		BodyWeight.getBodyWeightDetails(Edit).success(function (data) {
			$scope.frm = data;
        });
		
		$scope.processedit = function ()
		{  
			BodyWeight.editBodyWeight($.param($scope.frm)).success(function (data) {
				
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
			BodyWeight.addBodyWeight($.param($scope.frm)).success(function (data) {
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




