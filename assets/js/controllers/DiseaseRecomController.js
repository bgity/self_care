SelfcareApp.controller('DiseaseRecomController', function ($rootScope, $scope, $state, DiseaseRec, createDialog, $timeout, $http, $q) {
	
	$scope.diseasrs = [];
    $scope.ord = 'id';
	$scope.limitOptions = {
            5: "5",
            10: "10",
            20: "20",
			50: "50",
			100: "100"
          };
	  	$scope.diseases =  {};
	  	DiseaseRec.getDiseases().success(function (data) {
	  			$scope.diseases = data;
				
				
				
	         });
			 	  
	//$scope.editVal = false;
    
    $scope.$on('$viewContentLoaded', function () {
        DiseaseRec.getDiseaseRec().success(function (data) {
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.diseasrs = data;
            $scope.totalItems = data.length;
			$scope.currentPage = 1;
			$scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
        });
		
		/* $scope.toInt = function(val) {
			return parseInt(val,10); 
		};*/
    });
	
	
	/* $scope.saveDet = function(data, id) {
		
		if (!data.disease_id || !data.recommendation)
			return "Error";
				
		//angular.extend(data, {id: id});
		var defer = $q.defer();

		data = 'id=' + id+'&disease_id='+data.disease_id+'&recommendation='+data.recommendation;
		$http.post('master/saveDiseaseRec',data).success(function(data){
				temp =data;
				defer.resolve(data);
				
		});
		$state.reload();
		return defer.promise;
	};
	
	$scope.addDiseaseRec = function() {
		$scope.inserted = {
		  sdesc: '',
		  ldesc: '',
		  id:''
		};
		$scope.diseasrs.push($scope.inserted);
	};	*/
	    $scope.editDiseaseRec = function (pid) { 
	        createDialog(BASE_URL + "/master/addDiseaseRecView", {
	            id: 'editDiseaseRec',
	            title: 'Edit Disease Recommendation',
	            backdrop: true,
	            controller: 'AddDiseaseController',
	            footerTemplate: false,
	            success: {label: 'Success', fn: function () {
	                    console.log('Edit Disease modal closed');
	                }}
	        }
	        , {
	            Edit: pid
					

	        }
	        );
	    };
  
	    $scope.addDiseaseRec = function () {

	        createDialog(BASE_URL + "/master/addDiseaseRecView", {
	            id: 'addDiseaseRec',
	            title: 'Add Disease Recommendation',
	            backdrop: true,
				controller: 'AddDiseaseController',
	            footerTemplate: false,
	            success: {label: 'Success', fn: function () {
	                    console.log('Add Disease modal closed');
	                }}
	        }
			, {
	            Edit: ''

	        }
	        );
	    };
	    $scope.deleteDiseaseRec = function (pid) {
			createDialog({
	            id: 'delDiseaseRec',
				template:  angular.element(
	                    '<div class="row-fluid">' +
	                    ' <div>' +
	                    '   <div class="codebox" style="text-align:center;">' +
	                    '    <h4>Are you sure you want to delete disease recommendation?</h4> ' +
	                    '   </div>\n' +
	                    ' </div>\n' +
	                    '</div>'),
	            title: 'Delete Disease Recommendation',
	            backdrop: true,
	            footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
	                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
	                    '</div>',
	            success: {label: 'Save', fn: function () {
	                    DiseaseRec.deleteDiseaseRec(pid).success(function (data) {
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
	// remove 
	/*$scope.removeDiseaseRec = function(index, pid) {
		console.log(pid)
		if(name) {
			createDialog({
				id: 'delDiseaseRec',
				template:  angular.element(
						'<div class="row-fluid">' +
						' <div>' +
						'   <div class="codebox" style="text-align:center;">' +
						'    <h4>Are you sure you want to delete disease recommendation  ?</h4> ' +
						'   </div>\n' +
						' </div>\n' +
						'</div>'),
				title: 'Delete Food Preference',
				backdrop: true,
				footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
						'<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
						'</div>',
				success: {label: 'Save', fn: function () {
						DiseaseRec.deleteDiseaseRec(pid).success(function (data) {
							if (data.success == true) {
								$scope.diseasrs.splice(index, 1);
								toastr.success(data.message);
								$state.reload();
							} else {
								toastr.error(data.message);
							}
						});
					}}
			}
			);
		}
		else {
			$scope.foodpfs.splice(index, 1);
		}
		
	};*/
	
		/*$scope.searchObj = {
		    store: $scope.diseases
		  }
	
	    $scope.customFilter = function (diseasrs) {
	      if (diseasrs.disease_name === $scope.searchObj.store.name) {
	        return true;
	      } else if ($scope.searchObj.store.name === 0) {
	        return true;
	      } else {
	        return false;
	      }
	    }; */	
		
	
	$scope.setPage = function(pageNo) {
		$scope.currentPage = pageNo;
	};
	
	$scope.filter = function() {
		$timeout(function() {
		//	$scope.filteredItems = $scope.filtered.length;
		}, 10);
	};
	
	$scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
    $scope.sort = function(keyname) {
  		$scope.sortKey = keyname;// set the sort key to the parameter passed
                  $scope.reverse = !$scope.reverse; // if true make it false or vice varsa
  	};
	$scope.addDisease = function () {

	        createDialog(BASE_URL + "/master/addDiseaseView", {
	            id: 'addDisease',
	            title: 'Add Disease ',
	            backdrop: true,
				controller: 'AddNewDiseaseController',
	            footerTemplate: false,
	            success: {label: 'Success', fn: function () {
	                    console.log('Add Disease modal closed');
	                }}
	        }
			, {
	            Edit: ''

	        }
	        );
	    };
});

SelfcareApp.controller('AddDiseaseController', function ($scope, $state, $rootScope, DiseaseRec ,Edit, createDialog) {
    $scope.frm = {};
	$scope.diseases =  {};
	
	  DiseaseRec.getDiseases().success(function (data) {
			$scope.diseases = data;
       });
	   
      if(Edit !='') 
       {  
		DiseaseRec.getDiseaseRecDetails(Edit).success(function (data) {
			$scope.frm = data;
       });
		
		$scope.processedit = function ()
		{  
			DiseaseRec.editDiseaseRec($.param($scope.frm)).success(function (data) {
				
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
			DiseaseRec.addDiseaseRec($.param($scope.frm)).success(function (data) {
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
SelfcareApp.controller('AddNewDiseaseController', function ($scope, $state, $rootScope, DiseaseRec ,Edit, createDialog) {
    $scope.frm = {};
	$scope.diseases =  {};
	
		$scope.processedit = function ()
		{
			DiseaseRec.addDisease($.param($scope.frm)).success(function (data) {
				if (data.success == true) {
					$scope.$modalClose();
					toastr.success(data.message);
					$state.reload();
				} else {
					toastr.error(data.message);
				}
			});
		};
	
    

});