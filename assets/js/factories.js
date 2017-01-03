/***
 SelfcareApp Factories
 ***/

/**********  Product Factory*******************************/
SelfcareApp.factory("FoodGroup", function ($http) {
    var factory = {};
    
    factory.get_foodGroup = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/get_foodGroup',
            responseType: 'json'
        });
    };
    
    // getMasterFoodEdit
    
    factory.getMasterFoodEdit = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getMasterFoodEditdetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
    
    factory.editMasterFood = function (frm) {
        var url = BASE_URL + '/master/editFoodGroupMaster';
        //alert(url);
        return $http.post(url, frm);
    };
 
    return factory;

});

SelfcareApp.factory("FoodMaster", function ($http) {
	var factory = {};
    
    factory.getFoodMaster = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFoodMaster',
            responseType: 'json'
        });
    };
	
	factory.getFoodMasterShort = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFoodMasterShort',
            responseType: 'json'
        });
    };
	
	factory.addFoods = function (frm) {
		var url = BASE_URL + '/master/addFood';
        return $http.post(url, frm);
    };
	
	factory.getFoodDetails = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFoodDetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
	
	factory.editFood = function (frm) {
        var url = BASE_URL + '/master/editFood';
        return $http.post(url, frm);
    };
	
	factory.deleteFood = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteFood',
            responseType: 'json'
        });
    };
	
	return factory;
});

SelfcareApp.factory("HeightWeight", function ($http) {
    var factory = {};
    factory.addHeightWeight = function (frm) {
		var url = BASE_URL + '/master/addHeightWeight';
        return $http.post(url, frm);
    };
	
	factory.getHeightWeight = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/viewHeightWeights',
            responseType: 'json'
        });
    };
	
	factory.editHeightWeight = function (frm) {
        var url = BASE_URL + '/master/editheightweight';
        return $http.post(url, frm);
    };
	
	factory.deleteHeightWeight = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteheightweight',
            responseType: 'json'
        });
    };
	
	return factory;
});

SelfcareApp.factory("UomMaster", function ($http) {
    var factory = {};
	
	factory.getUomMaster = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/viewUomMaster',
            responseType: 'json'
        });
    };
	
	
	return factory;
});

SelfcareApp.factory("DietFactory", function ($http) {
    var factory = {};
	//console.log(optInd+','+itemInd+','+ ind)
	factory.appendOptionVal = function (optInd, itemInd, ind, uoms) {
		angular.element(document.getElementById('optionItem'+optInd+'_'+itemInd+'_'+ind)).append('<input type="text" ng-model="formData.fooditems['+optInd+']['+itemInd+']['+ind+'].uom" typeahead="uom.sdesc for uom in uoms | filter:$viewValue" class="form-control input-inline input-xsmall" typeahead-editable="false"><input class="form-control input-inline input-xsmall amt_input" type="text" ng-model="formData.fooditems['+optInd+']['+itemInd+']['+ind+'].amount" placeholder="Amt" >');
    };
	
	//<select ng-model="formData.fooditems['+optInd+']['+itemInd+']['+ind+'].uom" class="form-control input-xsmall input-inline" ng-options="'+uom.sdesc for uom in uoms+'"></select>
	
	factory.getIBWRange = function(height, bf,age,gender) {
		return $http({
            method: 'POST',
			data: 'height='+height+'&bf='+bf+'&age='+age+'&gender='+gender,
            url: BASE_URL + '/diet/getIBWRange'
        });
	}
	
	factory.addPlan = function (frm) {
		var url = BASE_URL + '/diet/addPlan';
        return $http.post(url, frm);
    };
	
	factory.getDietPlans = function() {
		return $http({
            method: 'POST',
			url: BASE_URL + '/diet/getDietPlans'
        });
	}
	
	factory.getDietPlanList = function(uid) {
		return $http({
            method: 'POST',
			data: 'uid='+uid,
			url: BASE_URL + '/diet/getDietPlanList'
        });
	}
	
	factory.getDietChart = function(dietid,planid) {
		return $http({
            method: 'POST',
			data: 'diet_id='+dietid+'&plan_id='+planid,
			url: BASE_URL + '/diet/getDietChart'
        });
	}
	
	factory.getClients = function() {
		return $http({
            method: 'POST',
			url: BASE_URL + '/diet/getClients'
        });
	}
    factory.getClientDtl = function (pid,planid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/diet/getClientDtl',
            data: "pid=" + pid+'&planid='+planid,
            responseType: "JSON"
        });
    };
	
	factory.getGuidelines = function(diseaseId) {
		return $http({
            method: 'POST',
			data: diseaseId,
			url: BASE_URL + '/diet/getGuidelines'
        });
	}
	
	factory.getClientDietDetails = function(clientId) {
		return $http({
            method: 'POST',
			data: 'client_id='+clientId,
			url: BASE_URL + '/diet/getClientDietDetails'
        });
	}
	
	factory.downloadDietPDF = function(dietid) {
		return $http({
            method: 'POST',
			data: 'diet_id='+dietid,
			url: BASE_URL + '/diet/downloadPDF'
        });
	}
	
	factory.sendMailChart = function(clientId,planId,exercise_stat,guideline_stat,type) {
		return $http({
            method: 'POST',
			data: 'clientId='+clientId+'&planId='+planId+'&exercise_stat='+exercise_stat+'&guideline_stat='+guideline_stat+'&type='+type,
			url: BASE_URL + '/diet/sendMailChart'
        });
	}
	
	factory.getFooditems = function() {
		return $http({
			method: 'POST',
			url: BASE_URL + '/diet/getFooditems'
	});
	}
	
	factory.getPlanGuidelines = function(clientId) {
		return $http({
            method: 'POST',
			data: clientId,
			url: BASE_URL + '/diet/getPlanGuidelines'
        });
	}
	factory.getExercises = function() {
		return $http({
			method: 'POST',
			url: BASE_URL + '/diet/getExercises'
	});
	}
	
	factory.getExDef = function(exise,wet) {
		return $http({
			method: 'POST',
			data: 'exc='+exise+'&weigt='+wet,
			url: BASE_URL + '/diet/getExDef'
	});
	}
     
	return factory;
});

/**********  Body weight *******************************/ 
SelfcareApp.factory("BodyWeight", function ($http) {
    var factory = {};
    
    factory.get_bodyWeight = function () {
        return $http({
            method: 'POST',
            //data: 'pageno=' + pgno + '&search_data=' + srch+'&order_data='+ord,
            url: BASE_URL + '/master/get_bodyWeight',
            responseType: 'json'
        });
    };
    factory.getBodyWeightDetails = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getBodyWeightDetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
    factory.editBodyWeight = function (frm) { 
        var url = BASE_URL + '/master/editBodyWeight';
        return $http.post(url, frm);
    };
    factory.addBodyWeight = function (frm) {
		var url = BASE_URL + '/master/addBodyWeight';
        return $http.post(url, frm);
    };
   
   factory.deleteBodyWeight = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteBodyWeight',
            responseType: 'json'
        });
    };
    
    return factory;

});
/*********** end body weight **************/
/**********  Intake start *******************************/ 
SelfcareApp.factory("Intake", function ($http) {
    var factory = {};
    
    factory.getIntake = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getIntake',
            responseType: 'json'
        });
    };
    factory.getIntakeDetails = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getIntakeDetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
    factory.editIntake = function (frm) { 
        var url = BASE_URL + '/master/editIntake';
        return $http.post(url, frm);
    };
    factory.addIntake = function (frm) {
		var url = BASE_URL + '/master/addIntake';
        return $http.post(url, frm);
    };
   
   factory.deleteIntake = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteIntake',
            responseType: 'json'
        });
    };
    
    return factory;

});
/*********** end Intake **************/
/**********  Frame Size *******************************/ 
SelfcareApp.factory("FrameSize", function ($http) {
    var factory = {};
    
    factory.getFrameSize = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFrameSize',
            responseType: 'json'
        });
    };
    factory.getFrameSizeDetails = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFrameSizeDetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
    factory.addFrameSize = function (frm) {
		var url = BASE_URL + '/master/addFrameSize';
        return $http.post(url, frm);
    };
    factory.editFrameSize = function (frm) { 
        var url = BASE_URL + '/master/editFrameSize';
        return $http.post(url, frm);
    };
    return factory;
});
    
/******* end Frame Size	*********************/
/******* start Food Pref master	*********************/
SelfcareApp.factory("FoodPref", function ($http) {
    var factory = {};
    
	
	factory.getFoodpfsMaster = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFoodpfsMaster',
            responseType: 'json'
        });
    };
	
	factory.deleteFoodpf = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteFoodpf',
            responseType: 'json'
        });
    };
	
	return factory;
});
/******* end Food pref master	*********************/
/******* start disease recommendation	*********************/
SelfcareApp.factory("DiseaseRec", function ($http) {
    var factory = {};
    
	
	factory.getDiseaseRec = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getDiseaseRec',
            responseType: 'json'
        });
    };
	factory.getDiseases = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getDiseases',
            responseType: 'json'
        });
    };
	factory.deleteDiseaseRec = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteDiseaseRec',
            responseType: 'json'
        });
    };
    factory.getDiseaseRecDetails = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getDiseaseRecDetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
    factory.editDiseaseRec = function (frm) { 
        var url = BASE_URL + '/master/editDiseaseRec';
        return $http.post(url, frm);
    };
    factory.addDiseaseRec = function (frm) {
		var url = BASE_URL + '/master/addDiseaseRec';
        return $http.post(url, frm);
    };
	factory.addDisease = function (frm) {
		var url = BASE_URL + '/master/addDisease';
        return $http.post(url, frm);
    };
	return factory;
});
/******* end disease recommendation	*********************/
SelfcareApp.factory("HeightWeight", function ($http) {
    var factory = {};
    factory.addHeightWeight = function (frm) {
		var url = BASE_URL + '/master/addHeightWeight';
        return $http.post(url, frm);
    };
	
	factory.getHeightWeight = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/viewHeightWeights',
            responseType: 'json'
        });
    };
	
	factory.editHeightWeight = function (frm) {
        var url = BASE_URL + '/master/editheightweight';
        return $http.post(url, frm);
    };
	
	factory.deleteHeightWeight = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteheightweight',
            responseType: 'json'
        });
    };
	
	return factory;
});
SelfcareApp.factory("FoodItemMaster", function ($http) {
	var factory = {};
    
    factory.getFoodItemMaster = function () {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFoodItemMaster',
            responseType: 'json'
        });
    };
	
	factory.addFoodItem = function (frm) {
		var url = BASE_URL + '/master/addFoodItem';
        return $http.post(url, frm);
    };
	
	factory.getFoodItemDetails = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getFoodItemDetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
	
	factory.editFoodItem = function (frm) {
        var url = BASE_URL + '/master/editFoodItem';
        return $http.post(url, frm);
    };
	
	factory.deleteFoodItem = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteFoodItem',
            responseType: 'json'
        });
    };
	
	return factory;
});
// Exercise master
SelfcareApp.factory("ExerciseMaster", function ($http) {
	var factory = {};
    
    factory.getExerciseMaster = function () { 
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getExerciseMaster',
            responseType: 'json'
        });
    };
	
	factory.addExercise = function (frm) {
		var url = BASE_URL + '/master/addExercise';
        return $http.post(url, frm);
    };
	
	factory.getExerciseDetails = function (pid)
    {
        return $http({
            method: 'POST',
            url: BASE_URL + '/master/getExerciseDetails',
            data: "pid=" + pid,
            responseType: "JSON"
        });
    };
	
	factory.editExercise = function (frm) {
        var url = BASE_URL + '/master/editExercise';
        return $http.post(url, frm);
    };
	
	factory.deleteExercise = function (pid) {
        return $http({
            method: 'POST',
            data: 'id=' + pid,
            url: BASE_URL + '/master/deleteExercise',
            responseType: 'json'
        });
    };
	
	return factory;
});