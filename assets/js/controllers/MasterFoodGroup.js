'use strict';
SelfcareApp.controller('MasterFoodGroup', function ($rootScope, $scope, $state, $timeout, FoodGroup, createDialog) {
    // here 'FoodGroup' is a factory service from which we will fetch data from database in this case
    
   //console.log($stateParams);
   //$scope.frm = {};
   $scope.clients = [];
   $scope.ord = 'id';
   $scope.limitOptions = {
        5: "5",
        10: "10",
        20: "20",
        50: "50",
        100: "100"
    };
    
    /*$scope.$on('$viewContentLoaded', function () {
       */
        FoodGroup.get_foodGroup().success(function (data) {
            $scope.filteredItems = data.length; //Initially for no filter
            $scope.clients = data;
            $scope.totalItems = data.length;
            $scope.currentPage = 1;
            $scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
        });
   /* });*/
    
    $scope.filter = function() {
		$timeout(function() {
			$scope.filteredItems = $scope.filtered.length;
		}, 10);
	};
        
     $scope.sort = function(keyname) {
		$scope.sortKey = keyname;// set the sort key to the parameter passed
                $scope.reverse = !$scope.reverse; // if true make it false or vice varsa
	};
        
        
    $scope.del = function(id) {
        var result = confirm("Are you sure?");
        if(result == true)
        {
            var index = getSelectedIndex(id);
            $scope.clients.splice(index,1);            
        }  
    };
    
    $scope.editMasterFoodGrpView = function (pid) {
        //alert(BASE_URL+ "/index.php/master/editMasterFoodGroupView");

        createDialog(BASE_URL + "/index.php/master/editMasterFoodGroupView", {
            id: 'editMasterFood',
            title: 'Edit Master Food',
            backdrop: true,
            controller: 'AddFGController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit Food modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };
    
    /*$scope.selectEdit = function(id) 
    {
        //alert("id- "+id);
        
       
        var index = getSelectedIndex(id);
        var client = $scope.clients[index];
        $scope.id = client.id;
        $scope.name = client.name;
        $scope.weight_per_serving = client.weight_per_serving;
        $scope.prot_per_serving = client.prot_per_serving; 
        $scope.fat_per_serving = client.fat_per_serving;
        $scope.chol_per_serving = client.chol_per_serving;
        $scope.calo_per_serving = client.calo_per_serving;
        $scope.calc_per_serving = client.calc_per_serving;
        
        $scope.master = {firstName:"John", lastName:"Doe"};
         $scope.user = angular.copy($scope.master);
        
        $state.go('editFoodGroup', { 'id':client.id, 'name':client.name, 'weight_per_serving':client.weight_per_serving });
       
       
       
       
    };*/
    
    $scope.edit = function() {
        alert("frm edit- ");
       
       
    };
    
    
    
    /*$scope.add = function(){
        $scope.clients.push({id:$scope.id,name:$scope.name,age:$scope.age,gender:$scope.gender,height:$scope.height,weight:$scope.weight,wrist:$scope.wrist});
        $scope.id = '';
        $scope.name = '';
        $scope.age = '';
        $scope.gender = '';
        $scope.height = '';
        $scope.weight = '';
        $scope.wrist = '';
    };*/
    
    $scope.edit = function(){
        var index = getSelectedIndex($scope.id);
        $scope.clients[index].name = $scope.name;
        $scope.clients[index].age = $scope.age;
        $scope.clients[index].gender = $scope.gender;
        $scope.clients[index].height = $scope.height;
        $scope.clients[index].weight = $scope.weight;
        $scope.clients[index].wrist = $scope.wrist;
    };
    
    function getSelectedIndex(id){
        var productCount = $scope.clients.length;
        for(var i=0; i < productCount; i++)
        {
            if($scope.clients[i].id == id)
            {
                return i;
            }
        }
        return -1;
    }
    
   
    

});















SelfcareApp.controller('AddFGController', function ($scope, $state, $rootScope, Edit, FoodGroup, createDialog) {
//alert("hi frm AddController");
    $scope.frm = {};
    $scope.isError = false;
    $scope.isErrorpur = false;
    $scope.clickForOne = 0;
    
    

    if (Edit !== '') 
    {
        //alert("frm Edit"); 
       
        FoodGroup.getMasterFoodEdit(Edit).success(function (data) {
            $scope.frm = data;
            /*$scope.id = data.id;
            $scope.name = data.name;
            $scope.weight_per_serving = data.weight_per_serving;
            $scope.prot_per_serving = data.prot_per_serving; 
            $scope.fat_per_serving = data.fat_per_serving;
            $scope.chol_per_serving = data.chol_per_serving;
            $scope.calo_per_serving = data.calo_per_serving;
            $scope.calc_per_serving = data.calc_per_serving;*/
            //results = $scope.frm;
            //alert("frm console");
            //console.log(results);
            
        });
       
    }
    
    $scope.processedit = function ()
    {
        //if ($scope.clickForOne <= 0) {
            //$scope.clickForOne = 1;
            //alert($scope.weight_per_serving);
            FoodGroup.editMasterFood($.param($scope.frm)).success(function (data) {
                if (data.success == true) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
                $scope.$modalClose();
                $state.reload();
            });
       // }
    };
    
    
    
    
    
    /*

    var uploader = $scope.uploader = new FileUploader({
        url: BASE_URL + '/warranties/uploadimage'
    });

    uploader.filters.push({
        name: 'imageFilter',
        fn: function (item , options) {

            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            var typeofindex = '|jpg|png|jpeg|bmp|gif|'.indexOf(type);

            if (typeofindex !== -1)
                $scope.isError = false;
            else
                $scope.isError = true;

            return typeofindex !== -1;
        }
    });
    uploader.onBeforeUploadItem = function (item) {
        $scope.loadingtillresponseimage = true;
    };
    uploader.onProgressAll = function (progress) {
        $scope.loadingtillresponseimage = true;
    };
    uploader.onAfterAddingAll = function (addedFileItems) {
        // $scope.frm.warranty_card = addedFileItems[0].file.name;
        uploader.uploadAll();
    };
    uploader.onSuccessItem = function (fileItem, response, status, headers) {
        $scope.loadingtillresponseimage = false;
        $scope.frm.warranty_card = response.filename;
    };
    var pur_uploader = $scope.pur_uploader = new FileUploader({
        url: BASE_URL + '/warranties/uploadpurchaseimage'
    });
    pur_uploader.filters.push({
        name: 'imageFilter',
        fn: function (item , options) {

            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            var typeofindex = '|jpg|png|jpeg|bmp|gif|'.indexOf(type);

            if (typeofindex !== -1)
                $scope.isErrorpur = false;
            else
                $scope.isErrorpur = true;

            return typeofindex !== -1;
        }
    });
    pur_uploader.onBeforeUploadItem = function (item) {
        $scope.loadingtillresponseimagepur = true;
    };
    pur_uploader.onProgressAll = function (progress) {
        $scope.loadingtillresponseimagepur = true;
    };
    pur_uploader.onAfterAddingAll = function (addedFileItems) {
        // $scope.frm.purchase_invoice = addedFileItems[0].file.name;    
        pur_uploader.uploadAll();
    };
    pur_uploader.onSuccessItem = function (fileItem, response, status, headers) {
        $scope.loadingtillresponseimagepur = false;
        $scope.frm.purchase_invoice = response.filename;
    };
    $scope.processadd = function ()
    {
        if ($scope.clickForOne <= 0) {
            $scope.clickForOne = 1;
            Warranty.addWarranty($.param($scope.frm)).success(function (data) {
                $scope.$modalClose();
                if (data.success == true) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
                if ($state.current.name == 'warranties_status' || $state.current.name == 'warranties_category') {
                    $state.reload();
                }
                else {
                    $rootScope.productsort('id');
                    $rootScope.sorttype = 'id';
                }
            });
        }
    };

    $scope.proccesaddamcwty = function ()
    {
        if ($scope.clickForOne <= 0) {
            $scope.clickForOne = 1;
            Warranty.addWarranty($.param($scope.frm)).success(function (data) {
                if (data.success == true) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
                $scope.warranty_idamc = data.id;
                $scope.openamc();
            });
        }
    };
    $scope.proccesaddservicewty = function ()
    {
        if ($scope.clickForOne <= 0) {
            $scope.clickForOne = 1;
            Warranty.addWarranty($.param($scope.frm)).success(function (data) {
                if (data.success == true) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
                $scope.warranty_idservice = data.id;
                $scope.openservice();
            });
        }
    };
    $scope.processedit = function ()
    {
        if ($scope.clickForOne <= 0) {
            $scope.clickForOne = 1;
            Warranty.editWarranty($.param($scope.frm)).success(function (data) {
                if (data.success == true) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
                $scope.$modalClose();
                $state.reload();
            });
        }
    };
    $scope.savewarranty_ser = function ()
    {
        createDialog({
            id: 'confirmaddser',
            template: angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
                    '    <h3 style="line-height:40px; font-weight:400;">Do you like to Add Service?</h3> ' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            footerTemplate:
                    ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            backdrop: true,
            //footerTemplate: backdropfalse,       
            success: {label: 'Save', fn: function () {
                    $scope.proccesaddservicewty();
                }}
        });
    };
    $scope.savewarranty_amc = function ()
    {
        createDialog({
            id: 'confirmaddamc',
            template: angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
                    '    <h3 style="line-height:40px; font-weight:400;">Do you like to Add AMC?</h3> ' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            footerTemplate:
                    ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            backdrop: true,
            success: {label: 'Save', fn: function () {
                    $scope.proccesaddamcwty();
                }}
        });
    };
    $scope.openamc = function ()
    {
        $scope.$modalClose();
        createDialog(BASE_URL + "/amc/addAmcView", {
            id: 'addAmc',
            title: 'Add Amc',
            backdrop: true,
            controller: 'AmcAddController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Amc modal closed');
                }}
            ,
            resolve: {FileUploader: function () {
                    return $scope;
                }}
        }
        , {
            Wrty_Id: $scope.warranty_idamc,
            myVal: 'cat',
            Edit: ''

        }
        );
    };
    $scope.openservice = function ()
    {
        $scope.$modalClose();
        createDialog(BASE_URL + "/service/addServiceView", {
            id: 'addservice',
            title: 'Add Service Schedule',
            backdrop: true,
            controller: 'ServiceAddController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Service modal closed');
                }}
            ,
            resolve: {FileUploader: function () {
                    return $scope;
                }}
        }
        , {
            myVal: 'cat',
            Wrty_Id: $scope.warranty_idservice,
            Edit: ''
        }
        );
    };
    $scope.openamcedit = function (id)
    {
        $scope.$modalClose();
        createDialog(BASE_URL + "/amc/addAmcView", {
            id: 'addAmc',
            title: 'Add Amc',
            backdrop: true,
            controller: 'AmcAddController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Amc modal closed');
                }}
            ,
            resolve: {FileUploader: function () {
                    return $scope;
                }}
        }
        , {
            Wrty_Id: id,
            myVal: 'cat',
            Edit: ''

        }
        );
    };
    $scope.openserviceedit = function (id)
    {
        $scope.$modalClose();
        createDialog(BASE_URL + "/service/addServiceView", {
            id: 'addservice',
            title: 'Add Service Schedule',
            backdrop: true,
            controller: 'ServiceAddController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Service modal closed');
                }}
            ,
            resolve: {FileUploader: function () {
                    return $scope;
                }}
        }
        , {
            myVal: 'cat',
            Wrty_Id: id,
            Edit: ''
        }
        );
    };
    $scope.editamc = function (pid)
    {
        $scope.$modalClose();
        createDialog(BASE_URL + "/amc/editAmcView", {
            id: 'editAmc',
            title: 'Edit Amc',
            backdrop: true,
            controller: 'AmcEditController',
            //footerTemplate: '<button class="btn" ng-click="$modalCancel()">{{$modalCancelLabel}}</button>',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit amc modal closed');
                }}
            ,
            resolve: {FileUploader: function () {
                    return $scope;
                }
            }
        },
        {
            myVal: 'cat',
            Edit: pid,
            Wrty_Id: ''
        }
        );
    };
    $scope.editservice = function (pid)
    {
        $scope.$modalClose();
        createDialog(BASE_URL + "/service/editServiceView", {
            id: 'editservice',
            title: 'Edit Service Schedule',
            backdrop: true,
            controller: 'ServiceAddController',
            //footerTemplate: '<button class="btn" ng-click="$modalCancel()">{{$modalCancelLabel}}</button>',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Service modal closed');
                }}
            ,
            resolve: {FileUploader: function () {
                    return $scope;
                }}
        }
        , {
            myVal: 'cat',
            Wrty_Id: '',
            Edit: pid
        }
        );
    };*/

});


























//SelfcareApp.factory("FoodGroup", function ($http) {
//    var factory = {};
//    
//    
//    
//    
//    
//    
//    factory.get_foodGroup = function () {
//        return $http({
//            method: 'POST',
//            url: BASE_URL + '/master/get_foodGroup',
//            responseType: 'json'
//        });
//    };
//	
//	
//	
//	return factory;
//});


