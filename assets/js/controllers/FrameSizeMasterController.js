
SelfcareApp.controller('FrameSizeMasterController', function ($rootScope, $scope, $state, FrameSize, createDialog ,$timeout, $http) {
    $scope.frames = [];
    $scope.ord = 'id'; 
   
    $scope.$on('$viewContentLoaded', function () {      
        FrameSize.getFrameSize().success(function (data) {
            $scope.frames = data;
        });
       
    });
   
   
     $scope.addFrameSize = function () { 
        createDialog(BASE_URL + "/master/editFrameSizeView", {
            id: 'addFrame',
            title: 'Add Frame Size',
            backdrop: true,
			controller: 'AddFSController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Frame Size modal closed');
                }}
        }
		, {
            Edit: ''

        }
        );
    };
    $scope.editFrameSize = function (pid) {
        createDialog(BASE_URL + "/master/editFrameSizeView", {
            id: 'editFrame',
            title: 'Edit Frame Size',
            backdrop: true,
            controller: 'AddFSController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit Frame Size modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };

});


SelfcareApp.controller('AddFSController', function ($scope, $state, $rootScope, FrameSize ,Edit, createDialog) {

    $scope.frm = {};
       
   if(Edit !='') 
   { 
		FrameSize.getFrameSizeDetails(Edit).success(function (data) {
			$scope.frm = data;
        });
		
		$scope.processedit = function ()
		{  
			FrameSize.editFrameSize($.param($scope.frm)).success(function (data) {
				
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
			FrameSize.addFrameSize($.param($scope.frm)).success(function (data) {
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
/*
var uniqueItems = function (data, key) {
    var result = [];
    for (var i = 0; i < data.length; i++) {
        var value = data[i][key];
        if (result.indexOf(value) == -1) {
            result.push(value);
        }
    }
    return result;
};

SelfcareApp.filter('groupBy',
            function () {
                return function (collection, key) {
                    if (collection === null) return;
                    return uniqueItems(collection, key);
        };
    });*/


