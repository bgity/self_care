var App = angular.module('userLogin', []);

App.controller('LoginController', function($scope, $location, Users){
 
 $scope.username = undefined;
 $scope.password = undefined;
 $scope.message = undefined;
 $scope.submitForm = function ()
 {
	 //console.log("dsad");return false;
	 Users.checkLogin($scope.username, $scope.password).success(function (data) {
		
		$scope.message = data.status;
		if($scope.message == 'success') {
			window.location = '';
		} else {
			jQuery('.alert').show();
			jQuery('.alert > span').html(data.msg);
		}
	 })
	 .error(function (data) {
		 console.log(data);
	 });
 }
 
 $scope.forgotPass = function() {
	 Users.forgotPassword($scope.email).success(function (data) {
		 $scope.email = null;
		 if(data.status)
			toastr.success(data.message);
		 else
			toastr.error(data.message); 
	 });
	 return false;
 }
 
 });

App.factory("Users", function ($http) {
    var factory = {};
    factory.checkLogin = function (username, password) {
        return $http({
            method: 'POST',
			data: JSON.stringify({username: username,password:password}),
            url: 'login/login_ang',
            responseType: 'json'
        });
    };
	
	factory.forgotPassword = function (email) {
		return $http({
            method: 'POST',
			data: JSON.stringify({email: email}),
            url: 'login/forgotPassword',
            responseType: 'json'
        });
	}
	
	return factory;
});