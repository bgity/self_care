SelfcareApp.controller('DietChartController', function ($rootScope, $scope, $state, DietFactory, $stateParams, $http, $q, createDialog) {
	
	$scope.dietchart = [];
   // console.log($stateParams.diet_id);
   //console.log($stateParams.plan_id);
	$scope.dietId = $stateParams.diet_id;
	$scope.planId = $stateParams.plan_id;
	$scope.exercise_len=0;
    $scope.$on('$viewContentLoaded', function () {
        DietFactory.getDietChart($scope.dietId,$scope.planId).success(function (data) {
			
			//console.log(data.exercise.exercises)
			if(data.exercise)
			{
				if(data.exercise.exercises)
					data.exercise.exercises = JSON.parse(data.exercise.exercises);
				
				if(data.exercise.exercise_anytime)
					data.exercise.exercise_anytime = JSON.parse(data.exercise.exercise_anytime);
			
			}
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
		$state.go('createDiet', { 'uid':uid,'plan_id':planid,'copy_plan':0 });
	};
	
	$scope.goCreateCopy = function(uid,planid) {
		$state.go('createDiet', { 'uid':uid,'plan_id':planid,'copy_plan':1});
	};
	
	// For saving updated general recommends
	$scope.updRecommend = function(data, id) {
		console.log(data)
		if (!data)
			return "Error";
				
		//angular.extend(data, {id: id});
		var defer = $q.defer();

		data = 'id=' + id+'&recommendation='+data+'&plan_id='+$scope.planId+'&client_id='+$scope.dietId;
		$http.post('diet/updateRecommend',data).success(function(data){
				temp =data;
				defer.resolve(data);
		});
		
		return defer.promise;
	};
	
	// uncheck general guidelines
	$scope.removeGeneral = function(id,recomd,dis){
		if ($('#'+id).is(':checked')) { 
            var chk = 1;
         }
		 else{
			 var chk = 0;
		 }
		 	
	    data = 'id='+id+'&plan_id='+$scope.planId+'&client_id='+$scope.dietId+'&chk='+chk+'&recomd='+recomd;
		$http.post('diet/removeGeneral',data).success(function(data){
				console.log(data)
		});
		
	};
	// add extra general guideline
	$scope.saveExtGeneral = function(data) {
		//console.log(data)
		var defer = $q.defer();
		if (data.recommendation_extra)
		{
			data = 'extrec='+data.recommendation_extra+'&plan_id='+$scope.planId+'&client_id='+$scope.dietId;
			
		    $http.post('diet/saveExtraRecomd',data).success(function(data){
				//console.log(data)
				//temp = data;
				//defer.resolve(data);
		    });
		}							
		return defer.resolve(data);
		//return defer.promise;
	};
	
	// added for exercise category display
	$scope.exercise_text = {1:'Morning', 2:'Afternoon', 3:'Evening', 4:'Late Evening'}
	
	
	// For popup on download pdf
		
	$scope.openPrint = function (type, clientId, planId) {
		alert(type+'=='+clientId+'=='+planId)
		
        createDialog({
            id: 'selectPrint',
			template:  angular.element(
                    '<div class="row-fluid">' +
                    ' <div>' +
                    '   <div class="codebox" style="text-align:center;">' +
					'    <input type="checkbox" ng-model="guideline" id="guideline"/> With Guidelines' +
                    '    <input type="checkbox" ng-model="exercise" id="exercise"/> With Exercise' +
                    '   </div>\n' +
                    ' </div>\n' +
                    '</div>'),
            title: 'Select options for '+type,
			backdrop: false,
			controller: 'DietChartController',
            footerTemplate: ' <div style="width:100%; padding:5px 5px 25px 5px; text-align:center;">' +
                    '<button class="btn btn-info"  ng-click="$modalSuccess()">Ok</button><button class="btn red" style="margin-left:10px;" ng-click="$modalCancel()">Cancel</button>' +
                    '</div>',
            success: {label: 'Save', fn: function () {
					var exercise_stat = $('#exercise').is(':checked');
					var guideline_stat = $('#guideline').is(':checked');
					var downloadPath = 'diet/downloadPDF/'+clientId+'/'+planId+'/'+exercise_stat+'/'+guideline_stat;
					window.open(downloadPath, '_self', '');  
                }}
        }
        );
    };
});