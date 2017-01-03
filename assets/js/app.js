/***
Metronic AngularJS App Main Script
***/

/* Metronic App */
var SelfcareApp = angular.module("SelfcareApp", [
    "ui.router", 
    "ui.bootstrap", 
    "oc.lazyLoad",  
    "ngSanitize",
	/*"ng-bootstrap-datepicker",*/
	"createDialog",
	"ngMessages",
	"xeditable",
	"ngTagsInput",
	"angular.filter"
]); 

/* Configure ocLazyLoader(refer: https://github.com/ocombe/ocLazyLoad) */
SelfcareApp.config(['$ocLazyLoadProvider', function($ocLazyLoadProvider) {
    $ocLazyLoadProvider.config({
        // global configs go here
    });
}]);

/********************************************
 BEGIN: BREAKING CHANGE in AngularJS v1.3.x:
*********************************************/
/**
`$controller` will no longer look for controllers on `window`.
The old behavior of looking on `window` for controllers was originally intended
for use in examples, demos, and toy apps. We found that allowing global controller
functions encouraged poor practices, so we resolved to disable this behavior by
default.

To migrate, register your controllers with modules rather than exposing them
as globals:

Before:

```javascript
function MyController() {
  // ...
}
```

After:

```javascript
angular.module('myApp', []).controller('MyController', [function() {
  // ...
}]);

Although it's not recommended, you can re-enable the old behavior like this:

```javascript
angular.module('myModule').config(['$controllerProvider', function($controllerProvider) {
  // this option might be handy for migrating old apps, but please don't use it
  // in new ones!
  $controllerProvider.allowGlobals();
}]);
**/

//AngularJS v1.3.x workaround for old style controller declarition in HTML
SelfcareApp.config(['$controllerProvider', function($controllerProvider) {
  // this option might be handy for migrating old apps, but please don't use it
  // in new ones!
  $controllerProvider.allowGlobals();
}]);

/********************************************
 END: BREAKING CHANGE in AngularJS v1.3.x:
*********************************************/

/* Setup global settings */
SelfcareApp.factory('settings', ['$rootScope', function($rootScope) {
    // supported languages
    var settings = {
        layout: {
            pageSidebarClosed: false, // sidebar menu state
            pageBodySolid: false, // solid body color state
            pageAutoScrollOnLoad: 1000 // auto scroll to top on page load
        },
        layoutImgPath: Metronic.getAssetsPath() + 'admin/layout/img/',
        layoutCssPath: Metronic.getAssetsPath() + 'admin/layout/css/'
    };

    $rootScope.settings = settings;

    return settings;
}]);

/* Setup App Main Controller */
SelfcareApp.controller('AppController', ['$scope', '$rootScope', function($scope, $rootScope) {
    $scope.$on('$viewContentLoaded', function() {
        Metronic.initComponents(); // init core components
        //Layout.init(); //  Init entire layout(header, footer, sidebar, etc) on page load if the partials included in server side instead of loading with ng-include directive 
    });
}]);

/***
Layout Partials.
By default the partials are loaded through AngularJS ng-include directive. In case they loaded in server side(e.g: PHP include function) then below partial 
initialization can be disabled and Layout.init() should be called on page load complete as explained above.
***/

/* Setup Layout Part - Header */
SelfcareApp.controller('HeaderController', ['$scope', 'createDialog', function($scope, createDialog) {
    $scope.$on('$includeContentLoaded', function() {
        Layout.initHeader(); // init header
    });
	
	$scope.changePassword = function(userid) {
		createDialog(BASE_URL + "/login/changePassword",{
            id: 'changePassword',
			title: 'Change Password',
			controller: 'PasswordController',
            backdrop: true,
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Change Password');
                }}
        }
        , {
            user_id: userid

        }
        );
	}
	
	
	
}]);

SelfcareApp.controller('PasswordController', function ($scope, $state, $rootScope, $http, user_id) {
	$scope.frm = {};
	
	$scope.changeupass = function() {
		$scope.frm.user_id = user_id;
		
		$http.post('login/changeUserPassword',$scope.frm).success(function(data){
			if(data.status == true) {
				$scope.$modalClose();
				toastr.success(data.message);
			}
			else {
				toastr.error(data.message);
			}
		});
	}
});


/* Setup Layout Part - Sidebar */
SelfcareApp.controller('SidebarController', ['$scope', '$state', function($scope, $state) {
   // $scope.$on('$includeContentLoaded', function() {
		Layout.initSidebar(); // init sidebar
    //});
	$scope.uiRouterState = $state;
}]);

/* Setup Layout Part - Quick Sidebar */
SelfcareApp.controller('QuickSidebarController', ['$scope', function($scope) {    
    $scope.$on('$includeContentLoaded', function() {
        setTimeout(function(){
            QuickSidebar.init(); // init quick sidebar        
        }, 2000)
    });
}]);

/* Setup Layout Part - Theme Panel */
SelfcareApp.controller('ThemePanelController', ['$scope', function($scope) {    
    $scope.$on('$includeContentLoaded', function() {
        Demo.init(); // init theme panel
    });
}]);

/* Setup Layout Part - Footer */
SelfcareApp.controller('FooterController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        Layout.initFooter(); // init footer
    });
}]);

/* Setup Rounting For All Pages */
SelfcareApp.config(['$stateProvider', '$urlRouterProvider', '$httpProvider', function($stateProvider, $urlRouterProvider, $httpProvider) {
	
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    // Redirect any unmatched url
    $urlRouterProvider.otherwise("/dietplan");  
    
    $stateProvider

        // Dashboard
        .state('dashboard', {
            url: "/dashboard",
           templateUrl: BASE_URL+"/index.php/dashboard/home",         
            data: {pageTitle: 'Admin Dashboard'},
            controller: "DashboardController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'SelfcareApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            'assets/global/plugins/morris/morris.css',
                            'assets/admin/pages/css/tasks.css',
                            
                            'assets/global/plugins/morris/morris.min.js',
                            'assets/global/plugins/morris/raphael-min.js',
                            'assets/global/plugins/jquery.sparkline.min.js',

                            'assets/admin/pages/scripts/index3.js',
                            'assets/admin/pages/scripts/tasks.js',

                             'assets/js/controllers/DashboardController.js'
                        ] 
                    });
                }]
            }
        })
		
		/* Diet Plan section */
		.state('dietplan', {
            url: "/dietplan",
            templateUrl: BASE_URL+"/diet/dietPlan",         
            data: {pageTitle: 'Diet Plan'},
            controller: "DietPlanController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'SelfcareApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            BASE_URL + '/assets/js/controllers/DietPlanController.js'
                        ] 
                    });
                }]
            }
        })

        /* Diet section */
		.state('createDiet', {
			url: "/createDiet",
			templateUrl: BASE_URL + "/diet/createDiet", 
			data: {pageTitle: 'Create Diet'},
			params:  {'uid': null,'plan_id': null,'copy_plan':null},
			controller: "DietController",
			resolve: {
				deps: ['$ocLazyLoad', function ($ocLazyLoad) {
						return $ocLazyLoad.load(
								{
									name: 'SelfcareApp',
									insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
									files: [
										BASE_URL + '/assets/js/controllers/DietController.js'
									]
								});
					}],
			}
		})
		
		/* Height Weight Master*/ 
		.state('heightWeight', {
			url: "/heightWeight",
			templateUrl: BASE_URL + "/master/heightWeight", 
			data: {pageTitle: 'Height Weight Master'},
			controller: "MasterHeightWeightController",
			resolve: {
				deps: ['$ocLazyLoad', function ($ocLazyLoad) {
						return $ocLazyLoad.load(
								{
									name: 'SelfcareApp',
									insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
									files: [
										'assets/js/controllers/MasterHeightWeightController.js'
									]
								});
					}],
			}
		})
		
		/* Food Master */
		.state('foodMaster', {
			url: "/foodMaster",
			templateUrl: BASE_URL + "/master/foodMaster", 
			data: {pageTitle: 'Food Master'},
			controller: "MasterFoodController",
			resolve: {
				deps: ['$ocLazyLoad', function ($ocLazyLoad) {
						return $ocLazyLoad.load(
								{
									name: 'SelfcareApp',
									insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
									files: [
										'assets/js/controllers/MasterFoodController.js'
									]
								});
					}],
			}
		})
		
		/* UOM Master */
		.state('uomMaster', {
			url: "/uomMaster",
			templateUrl: BASE_URL + "/master/uomMaster", 
			data: {pageTitle: 'UOM Master'},
			controller: "MasterUOMController",
			resolve: {
				deps: ['$ocLazyLoad', function ($ocLazyLoad) {
						return $ocLazyLoad.load(
								{
									name: 'SelfcareApp',
									insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
									files: [
										'assets/js/controllers/MasterUOMController.js'
									]
								});
					}],
			}
		})
		
		/* Diet Chart */
		.state('dietChart', {
			url: "/dietChart",
			templateUrl: BASE_URL + "/diet/dietChart", 
			data: {pageTitle: 'Diet Chart'},
			params:  {'diet_id': null,'plan_id': null},
			controller: "DietChartController",
			resolve: {
				deps: ['$ocLazyLoad', function ($ocLazyLoad) {
						return $ocLazyLoad.load(
								{
									name: 'SelfcareApp',
									insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
									files: [
										'assets/js/controllers/DietChartController.js'
									]
								});
					}],
			}
		})
		
		/* Body Weight Master */
		.state('bodyWeightMaster', { 
                    url: "/bodyWeightMaster",
                    templateUrl: BASE_URL + "/master/bodyWeightMaster",  
                    data: {pageTitle: 'Body Weight Master', pageSubTitle: 'List, ADD, UPDATE & DELETE'},
                    controller: "BodyWeightMasterController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                        {
                                            name: 'SelfcareApp',
                                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                                            files: [
                                                BASE_URL + '/assets/js/controllers/BodyWeightMasterController.js'
                                            ]
                                        });
                            }],
                        BodyWeight: 'BodyWeight'
                    }
                })
				
		/* frameSizeMaster Master */
		.state('frameSizeMaster', { 
                    url: "/frameSizeMaster",
                    templateUrl: BASE_URL + "/master/frameSizeMaster",  
                    data: {pageTitle: 'Body Weight Master', pageSubTitle: 'List, ADD, UPDATE & DELETE'},
                    controller: "FrameSizeMasterController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                        {
                                            name: 'SelfcareApp',
                                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                                            files: [
                                                BASE_URL + '/assets/js/controllers/FrameSizeMasterController.js'
                                            ]
                                        });
                            }],
                    }
                })
				
		 /* Food preference Master */
		.state('foodPrefMaster', { 
                    url: "/foodPrefMaster",
                    templateUrl: BASE_URL + "/master/foodPrefMaster",  
                    data: {pageTitle: 'Food Preference Master', pageSubTitle: 'List, ADD, UPDATE & DELETE'},
                    controller: "FoodPrefMasterController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                        {
                                            name: 'SelfcareApp',
                                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                                            files: [
                                                BASE_URL + '/assets/js/controllers/FoodPrefMasterController.js'
                                            ]
                                        });
                            }],
                    }
                }) 
			
		/* Intake Master */
		.state('intakeMaster', { 
                    url: "/intakeMaster",
                    templateUrl: BASE_URL + "/master/intakeMaster",  
                    data: {pageTitle: 'Intake Master', pageSubTitle: 'List, ADD, UPDATE & DELETE'},
                    controller: "IntakeMasterController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                        {
                                            name: 'SelfcareApp',
                                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                                            files: [
                                                BASE_URL + '/assets/js/controllers/IntakeMasterController.js'
                                            ]
                                        });
                            }],
                    }
                })   
				
		/* Disease Master */
		.state('diseaseRecom', { 
					url: "/diseaseRecom",
					templateUrl: BASE_URL + "/master/diseaseRecommendation",  
					data: {pageTitle: 'Intake Master', pageSubTitle: 'List, ADD, UPDATE & DELETE'},
					controller: "DiseaseRecomController",
					resolve: {
						deps: ['$ocLazyLoad', function ($ocLazyLoad) {
								return $ocLazyLoad.load(
										{
											name: 'SelfcareApp',
											insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
											files: [
												BASE_URL + '/assets/js/controllers/DiseaseRecomController.js'
											]
										});
							}],
					}
				})
				
		/* Client details */
		.state('clientDietDetails', { 
					url: "/clientDietDetails",
					templateUrl: BASE_URL + "/diet/getClientDietDetailsView",  
					data: {pageTitle: 'Client Diet Details'},
					params:  {'client_id': null},
					controller: "ClientDietDetailsController",
					resolve: {
						deps: ['$ocLazyLoad', function ($ocLazyLoad) {
								return $ocLazyLoad.load(
										{
											name: 'SelfcareApp',
											insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
											files: [
												BASE_URL + '/assets/js/controllers/ClientDietDetailsController.js'
											]
										});
							}],
					}
				})
				/* Diet plam list */
				.state('dietPlanList', {
					url: "/dietPlanList",
					templateUrl: BASE_URL + "/diet/dietPlanList", 
					data: {pageTitle: 'User Diet Plans'},
					params:  {'uid': null},
					controller: "DietPlanListController",
					resolve: {
						deps: ['$ocLazyLoad', function ($ocLazyLoad) {
								return $ocLazyLoad.load(
										{
											name: 'SelfcareApp',
											insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
											files: [
												'assets/js/controllers/DietPlanController.js'
											]
										});
							}],
					}
				})
				/* Food Item Master */
			.state('foodItemMaster', {
				url: "/foodItemMaster",
				templateUrl: BASE_URL + "/master/foodItemMaster", 
				data: {pageTitle: 'Food Item Master'},
				controller: "MasterFoodItemController",
				resolve: {
					deps: ['$ocLazyLoad', function ($ocLazyLoad) {
							return $ocLazyLoad.load(
									{
										name: 'SelfcareApp',
										insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
										files: [
											'assets/js/controllers/MasterFoodItemController.js'
										]
									});
						}],
				}
			})
			
		 /* Exercise Master */
			.state('exerciseMaster', {
				url: "/exerciseMaster",
				templateUrl: BASE_URL + "/master/exerciseMaster", 
				data: {pageTitle: 'Food Item Master'},
				controller: "MasterExerciseController",
				resolve: {
					deps: ['$ocLazyLoad', function ($ocLazyLoad) {
							return $ocLazyLoad.load(
									{
										name: 'SelfcareApp',
										insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
										files: [
											'assets/js/controllers/MasterExerciseController.js'
										]
									});
						}],
				}
			})

}]);

/* Init global settings and run the app */
SelfcareApp.run(["$rootScope", "settings", "$state", function($rootScope, settings, $state) {
    $rootScope.$state = $state; // state to be accessed from view
}]);