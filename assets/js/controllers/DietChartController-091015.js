SelfcareApp.controller('DietChartController', function ($rootScope, $scope, $state, DietFactory, $stateParams, $http) {
	
	$scope.dietchart = [];
   // console.log($stateParams.diet_id);
   //console.log($stateParams.plan_id);
	$scope.dietId = $stateParams.diet_id;
	$scope.planId = $stateParams.plan_id;
    $scope.$on('$viewContentLoaded', function () {
        DietFactory.getDietChart($scope.dietId,$scope.planId).success(function (data) {
			$scope.dietchart = data;
			console.log(data)
        });
    });
	
	$scope.downloadPdf = function() {
		DietFactory.downloadDietPDF($scope.dietId).success(function (data) {
			console.log('done');
        });
	};

	$scope.printDiv = function(divName) {
	  var printContents = document.getElementById(divName).innerHTML;
	  var popupWin = window.open('', '_blank', 'width=300,height=300');
	  popupWin.document.open()
	  popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" /></head><body onload="window.print()">' + printContents + '</html>');
	  popupWin.document.close();
	} 
	
	$scope.sendMail = function() {
		DietFactory.sendMailChart($scope.dietId).success(function (data) {
			console.log('Email sent');
        });
	};
	
	$scope.getPlanList = function(uid) {
		$state.go('dietPlanList', { 'uid':uid});
	};
	$scope.goCreateChart = function(uid,planid) {
		$state.go('createDiet', { 'uid':uid,'plan_id':planid });
	};
	
	
});