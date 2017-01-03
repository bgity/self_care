SelfcareApp.controller('FoodPrefMasterController', function ($rootScope, $scope, $state, FoodPref, createDialog, $timeout, $http, $q) {
	
	$scope.foodpfs = [];
    $scope.ord = 'id';
	$scope.limitOptions = {
            5: "5",
            10: "10",
            20: "20",
			50: "50",
			100: "100"
          };
	$scope.editVal = false;
    
    $scope.$on('$viewContentLoaded', function () {
        FoodPref.getFoodpfsMaster().success(function (data) {
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.foodpfs = data;
            $scope.totalItems = data.length;
			$scope.currentPage = 1;
			$scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
        });
		
		$scope.toInt = function(val) {
			return parseInt(val,10); 
		};
    });
	
	$scope.saveDet = function(data, id) {
		
		if (!data.sdesc || !data.ldesc)
			return "Error";
				
		//angular.extend(data, {id: id});
		var defer = $q.defer();

		data = 'id=' + id+'&sdesc='+data.sdesc+'&ldesc='+data.ldesc;
		$http.post('master/saveFoodpfDet',data).success(function(data){
				temp =data;
				defer.resolve(data);
				
		});
		$state.reload();
		return defer.promise;
	};
	
	// add food pref
	$scope.addFoodPref = function() {
		$scope.inserted = {
		  sdesc: '',
		  ldesc: '',
		  id:''
		};
		$scope.foodpfs.push($scope.inserted);
	};	
	
	// remove 
	$scope.removeFoodpf = function(index, pid, name) {
		console.log(pid)
		if(name) {
			createDialog({
				id: 'delFoodpf',
				template:  angular.element(
						'<div class="row-fluid">' +
						' <div>' +
						'   <div class="codebox" style="text-align:center;">' +
						'    <h4>Are you sure you want to delete food preference <b>"'+name+'"</b>?</h4> ' +
						'   </div>\n' +
						' </div>\n' +
						'</div>'),
				title: 'Delete Food Preference',
				backdrop: true,
				footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
						'<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
						'</div>',
				success: {label: 'Save', fn: function () {
						FoodPref.deleteFoodpf(pid).success(function (data) {
							if (data.success == true) {
								$scope.foodpfs.splice(index, 1);
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