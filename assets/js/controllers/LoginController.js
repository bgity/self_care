SelfcareApp.controller('LoginController', function($scope, $location, Users){
 
 $scope.username = undefined;
 $scope.password = undefined;
 $scope.message = undefined;
 $scope.submitForm = function ()
 {
	 console.log("dsad");return false;
	 Login.checkLogin($scope.username, $scope.password).success(function (data) {
		
		$scope.message = data.status;
		if($scope.message == 'success') {
			//window.location = 'index.php';
		} else {
			jQuery('.alert').show();
			jQuery('.alert > span').html(data.msg);
		}
	 })
	 .error(function (data) {
		 console.log(data);
	 });
 }
 });

SelfcareApp.factory("Login", function ($http) {
    var factory = {};
    factory.checkLogin = function (username, password) {
        return $http({
            method: 'POST',
			data: JSON.stringify({username: username,password:password}),
            url: 'login/login_ang',
            responseType: 'json'
        });
    };
	return factory;
});