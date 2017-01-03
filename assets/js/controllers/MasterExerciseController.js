SelfcareApp.controller('MasterExerciseController', function ($rootScope, $scope, $state, ExerciseMaster, createDialog, $timeout, $http) {
	
	$scope.exercises = [];
    $scope.ord = 'id';
	$scope.limitOptions = {
            5: "5",
            10: "10",
            20: "20",
			50: "50",
			100: "100"
          };
	
	
  
    $scope.$on('$viewContentLoaded', function () {
        ExerciseMaster.getExerciseMaster().success(function (data) {  
			$scope.filteredItems = data.length; //Initially for no filter
			$scope.exercises = data;
            $scope.totalItems = data.length;
			$scope.currentPage = 1;
			$scope.itemsPerPage = GLOBAL_PAGINATION_SIZE;
        });
		
		$scope.toInt = function(val) {
			return parseInt(val,10); 
		};
    });

	$scope.addNewView = function () {

        createDialog(BASE_URL + "/master/addExerciseview", {
            id: 'addExercise',
            title: 'Add Exercise',
            backdrop: true,
			controller: 'AddExerciseController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Add Exercise modal closed');
                }}
        }
		, {
            Edit: ''

        }
        );
    };
	
	$scope.editExerciseView = function (pid) {
        createDialog(BASE_URL + "/master/addExerciseview", {
            id: 'editExercise',
            title: 'Edit Exercise',
            backdrop: true,
            controller: 'AddExerciseController',
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Edit Exercise modal closed');
                }}
        }
        , {
            Edit: pid

        }
        );
    };
	
	
	$scope.deleteExerciseView = function (pid, name) { 
		createDialog({
            id: 'delExercise',
			template:  angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
                    '    <h4>Are you sure you want to delete Exercise <b>"'+name+'"</b>?</h4> ' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            title: 'Delete Exercise',
            backdrop: true,
            footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            success: {label: 'Save', fn: function () {
                    ExerciseMaster.deleteExercise(pid).success(function (data) {
						if (data.success == true) {
							toastr.success(data.message);
							$state.reload();
						} else {
							toastr.error(data.message);
						}
					});
                }}
        }
        );
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

SelfcareApp.controller('AddExerciseController', function ($scope, $state, $rootScope, ExerciseMaster, Edit, createDialog) {

    $scope.frm = {};
	
    
	if(Edit !='') {
		
		ExerciseMaster.getExerciseDetails(Edit).success(function (exercise) {
			$scope.frm = exercise.data;
			console.log(exercise.data)
        });
		
		
		$scope.processadd = function ()
		{
			ExerciseMaster.editExercise($.param($scope.frm)).success(function (data) {
				
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
			ExerciseMaster.addExercise($.param($scope.frm)).success(function (data) {
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