SelfcareApp.controller('MasterUOMController', function ($rootScope, $scope, $state, UomMaster, createDialog, $timeout, $http, $q) {
	
	$scope.uoms = [];
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
        UomMaster.getUomMaster().success(function (data) {
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.uoms = data;
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
		$http.post('master/saveUOMDet',data).success(function(data){
				temp =data;
				defer.resolve(data);
		});
		
		return defer.promise;
	};
	
	// add UOM
	$scope.addUom = function() {
		$scope.inserted = {
		  sdesc: '',
		  ldesc: ''
		};
		$scope.uoms.push($scope.inserted);
	};
	
	// remove Uom row
	$scope.removeUom = function(index, pid, name) {
		console.log(pid)
		if(name) {
			createDialog({
				id: 'delUom',
				template:  angular.element(
						'<div class="row-fluid">' +
						' <div>' +
						'   <div class="codebox" style="text-align:center;">' +
						'    <h4>Are you sure you want to delete Uom <b>"'+name+'"</b>?</h4> ' +
						'   </div>\n' +
						' </div>\n' +
						'</div>'),
				title: 'Delete Uom',
				backdrop: true,
				footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
						'<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
						'</div>',
				success: {label: 'Save', fn: function () {
						UomMaster.deleteUom(pid).success(function (data) {
							if (data.success == true) {
								$scope.uoms.splice(index, 1);
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
			$scope.uoms.splice(index, 1);
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