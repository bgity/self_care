SelfcareApp.controller('DietPlanController', function ($rootScope, $scope, $state, DietFactory, $timeout) {
	
	$scope.diets = [];
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
        DietFactory.getDietPlans().success(function (data) {
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.diets = data;
            $scope.totalItems = data.length;
			$scope.currentPage = 1;
			$scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
        });
		
		$scope.toInt = function(val) {
			return parseInt(val,10); 
		};
    });
	
	
	
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
	

	/*$scope.dieDetailsView = function(clientId) {
		$state.go('clientDietDetails', { 'client_id':clientId });
	}*/
	
	$scope.getPlanList = function(uid) {
		$state.go('dietPlanList', { 'uid':uid});
	};
	
});

SelfcareApp.controller('DietPlanListController', function ($rootScope, $scope, $state, DietFactory, $timeout,$stateParams) {
	
	$scope.plans = [];
	$scope.clientdietdet = [];
	$scope.uid = $stateParams.uid;
    $scope.ord = 'id';
	$scope.limitOptions = {
            5: "5",
            10: "10",
            20: "20",
			50: "50",
			100: "100"
          };
	$scope.editVal = false;
    $scope.programeType = [{'id':1,'name':'Weight Gain'},{'id':2,'name':'Weight Loss'},{'id':3,'name':'Neutral'}];
    $scope.$on('$viewContentLoaded', function () {
        DietFactory.getDietPlanList($scope.uid).success(function (data){
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.plans = data;
            $scope.totalItems = data.length;
			$scope.currentPage = 1;
			$scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
        });
		
		$scope.toInt = function(val) {
			return parseInt(val,10); 
		};
    });
	
    DietFactory.getClientDietDetails($scope.uid).success(function (data) {
		console.log(data)
		$scope.clientdietdet = data;
    });

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
	
	$scope.dieChartView = function(dietid ,planid) { 
		$state.go('dietChart', { 'diet_id':dietid, 'plan_id':planid });
	}
	
});