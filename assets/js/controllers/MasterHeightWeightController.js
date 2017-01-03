SelfcareApp.controller('MasterHeightWeightController', function ($rootScope, $scope, $state, HeightWeight, createDialog, $timeout, $http, $q) {
	
	$scope.hwmasters = [];
    $scope.ord = 'id';
	$scope.limitOptions = {
            5: "5",
            10: "10",
            20: "20",
			50: "50",
			100: "100"
          };
	
    
    $scope.$on('$viewContentLoaded', function () {
        HeightWeight.getHeightWeight().success(function (data) {
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.hwmasters = data;
            $scope.totalItems = data.length;
			$scope.currentPage = 1;
			$scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
        });
		
		$scope.toInt = function(val) {
			return parseInt(val,10); 
		};
    });

	$scope.addNewView = function () {

        createDialog(BASE_URL + "/master/addHeightWeightview", {
            id: 'addHeightWeight',
            title: 'Add Height Weight',
            backdrop: true,
			controller: 'AddHWController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add hwmaster modal closed');
                }}
        }
		, {
            Edit: ''

        }
        );
    };
	
	
	$scope.saveDet = function(data, id) {
		
		if (data.height_in_cms != parseFloat(data.height_in_cms, 10) || data.weight_in_kgs != parseFloat(data.weight_in_kgs, 10) )
			return "Error";
				
		//angular.extend(data, {id: id});
		var defer = $q.defer();

		data = 'id=' + id+'&height_in_cms='+data.height_in_cms+'&weight_in_kgs='+data.weight_in_kgs;
		$http.post('master/saveHWDet',data).success(function(data){
				temp =data;
				defer.resolve(data);
		});
		
		return defer.promise;
	};
	
		
});

SelfcareApp.controller('AddHWController', function ($scope, $state, $rootScope, HeightWeight, Edit, createDialog) {

    $scope.frm = {};
	if(Edit !='') {
		HeightWeight.getHeightWeight(Edit).success(function (hwmaster) {
			$scope.frm = hwmaster.data;
        });
		
		$scope.processadd = function ()
		{
			HeightWeight.editHeightWeight($.param($scope.frm)).success(function (data) {
				
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
			HeightWeight.addHeightWeight($.param($scope.frm)).success(function (data) {
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