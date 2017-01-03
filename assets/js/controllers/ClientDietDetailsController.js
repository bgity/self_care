SelfcareApp.controller('ClientDietDetailsController', function ($rootScope, $scope, $state, DietFactory, $stateParams, $http) {
	
	$scope.clientdietdet = [];
	$scope.clientId = $stateParams.client_id;
	
    $scope.$on('$viewContentLoaded', function () {
        DietFactory.getClientDietDetails($scope.clientId).success(function (data) {
			console.log(data)
			$scope.clientdietdet = data;
        });
    });
		
});