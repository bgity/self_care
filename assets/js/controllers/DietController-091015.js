'use strict';
SelfcareApp.controller('DietController', function ($rootScope, $scope, $state, $filter, $timeout, FoodMaster, $http, UomMaster, DietFactory, FoodPref, createDialog,filterFilter,$stateParams) {
   	

    $scope.formData = {};
	$scope.selectedTemplate = {};
	$scope.selectedTemplate.path = "diet/clientDetails";
	$scope.selectedTab = 'client';
	$scope.plan_opt = false;
	$scope.foodSel = false;
	$scope.count = 0;
	$scope.icount = 0;
	$scope.optcount = 1;
	$scope.showPL = false;
	$scope.formComplete = false;
	$scope.ex_user = 0; 
	
	$scope.formData.planid = 0;
	
	// Set intial values for meal sum
	$scope.formData.breakfast_cal = 0;
	$scope.formData.lunch_cal = 0;
	$scope.formData.snack_cal = 0;
	$scope.formData.dinner_cal = 0;
	
	$scope.formData.breakfast_protein = 0;
	$scope.formData.lunch_protein = 0;
	$scope.formData.snack_protein = 0;
	$scope.formData.dinner_protein = 0;
	
	$scope.setTab = function(val) {
		$scope.selectedTab = val;
		console.log($scope.formData);
	}
	
	//display consult date selected;
	$scope.today = function() {
	    $scope.formData.consult_date = new Date();
	  };
	 $scope.today();
	// Function to navigate to next page
	$scope.nextPage = function(page) {
		console.log($scope.dietform.name.$valid)
		console.log($scope.dietform.name.$dirty);
		console.log($scope.dietform.$valid);
		return false;
		$scope.selectedTemplate.path = 'diet/intakeAllocation';
		$scope.setTab('intake');
	}
	
	$scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy','dd-MM-yyyy', 'shortDate'];
     $scope.format = $scope.formats[3];

	
	// Cities
	$scope.cities = ['Mumbai', 'Pune', 'Thane', 'Nagpur'];
	
	//Get food preference master
	$scope.food_prefs = [];
	FoodPref.getFoodpfsMaster().success(function (data) {
		$scope.food_prefs = data;
	});
	
	// Get food master
	$scope.foods = [];
	
	FoodMaster.getFoodMaster().success(function (data) {
		$scope.foods = data;
		
	});
	$scope.formData.foods = $scope.foods;
	
	
	$scope.formData.startTime = new Date();
	$scope.formData.endTime = new Date($scope.formData.startTime.getTime() + 30*60000);
	console.log($scope.formData.startTime)	
	$scope.meals = [
			{	id:1, name: 'Early Morning', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime  },
			{	id:2, name: 'Break Fast', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime },
			{	id:3, name: 'Mid Morning', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime },
			{	id:4, name: 'Lunch', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime },
			{	id:5, name: 'Mid Afternoon', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime },
			{	id:6, name: 'Snack', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime },
			{	id:7, name: 'Mid Evening', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime },
			{	id:8, name: 'Dinner', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime },
			{	id:9, name: 'After Dinner', start_time: $scope.formData.startTime, end_time:$scope.formData.endTime }
	];
	$scope.formData.meals = $scope.meals;
	
	/* Gender options */
	$scope.genders = [{value:'Male',name:'Male'}, {value:'Female',name:'Female'}];
	$scope.formData.gender = {value:"Male"};
	
	/* Pregnancy and Lactation */
	$scope.preg_lacts = [{text: 'Pregnant Woman', energy: 300, protein: 15 }, {text: 'Lactation 0-6 Months', energy: 550, protein: 25}, {text: 'Lactation 6-12 Months', energy: 400, protein: 18}]
	
	$scope.UpdatePL = function() {
		$scope.formData.preg_lact_energy = $scope.formData.preg_lact.energy;
		$scope.formData.preg_lact_protein = $scope.formData.preg_lact.protein;
	}
	
	/* ICC dropdown options */
	$scope.icc_gender_options = ['27','28','29','30','31','35','40','45','50'];
	
	/* ICC% dropdown options */
	$scope.icc_gender_percent_options = ['5','10','15','20','25'];
	
	/* Update ICC Percent options based on Age */
	$scope.ageRelUpdate = function() {
		if($scope.formData.age >=40 && $scope.formData.age < 50)
			$scope.formData.icc_gender_percent_opt = 5;
		else if($scope.formData.age >=50 && $scope.formData.age < 55)
			$scope.formData.icc_gender_percent_opt = 10;
		else if($scope.formData.age >=55 && $scope.formData.age < 60)
			$scope.formData.icc_gender_percent_opt = 15;
		else if($scope.formData.age >=60 && $scope.formData.age < 70)
			$scope.formData.icc_gender_percent_opt = 20;
		else if($scope.formData.age >=70)
			$scope.formData.icc_gender_percent_opt = 25;
	}
	
	/* Update icc dropdown based on gender */
	if($scope.formData.gender.value == 'Male') {
		$scope.formData.icc_gender_opt= '31';
	}
	else {
		$scope.formData.icc_gender_opt='27';
	}
	
	/* Function to update IBW related sections */
	$scope.updateIBWRel = function() {
		$scope.formData.icc = $scope.formData.ibw_mean * $scope.formData.icc_gender_opt;
		$scope.formData.icc_adjusted = $scope.formData.icc - $scope.formData.icc * $scope.formData.icc_gender_percent_opt/100;
			
		// For Proteins update
		$scope.formData.rec_protien = $scope.formData.ibw_mean * $scope.formData.protein_range;
		
		// For Carbs update
		$scope.formData.rec_carbs = parseFloat(($scope.formData.icc_adjusted * 50/100)/4).toFixed(2);
		
		// For Exercise update
		if($scope.formData.icc_adjusted && $scope.calo_tot)
			$scope.formData.total_cd = parseFloat($scope.formData.icc_adjusted - $scope.calo_tot).toFixed(2);
	}
	
	/* Function for age related updates */
	$scope.genderRelUpdate = function() {
		if($scope.formData.gender.value == 'Male') {
			$scope.formData.icc_gender_opt= '31';
			$scope.formData.protein_range= '0.9';
			$scope.showPL = false;
		}
		else {
			$scope.formData.icc_gender_opt='27';
			$scope.formData.protein_range= '0.85';
			$scope.showPL = true;
		}
	}
	
	/* Frame sizes */ 
	$scope.frame_sizes = [{id:1, name:'S', value: '10.4'}, {id:2, name:'M', value: '9.6-10.4'}, {id:3, name:'L', value: '9.6'}]
	$scope.formData.body_fat = $scope.frame_sizes[1].id;
	
	
	/* Update Investigation data */
	$scope.updateVals = function() {
		
		if($scope.formData.wrist_in_inch)
			$scope.formData.wrist_in_cm = parseFloat($scope.formData.wrist_in_inch*2.54).toFixed(2);
		if($scope.formData.height_in_cm && $scope.formData.wrist_in_cm) {
			$scope.formData.rfactor = parseFloat($scope.formData.height_in_cm/$scope.formData.wrist_in_cm).toFixed(2);
			
			if($scope.formData.gender.value == 'Male') {
				if($scope.formData.rfactor > 10.4 )
					$scope.formData.bf = 'S';
				else if($scope.formData.rfactor < 9.6 )
					$scope.formData.bf = 'L';
				else
					$scope.formData.bf = 'M';
			}
			else {
				if($scope.formData.rfactor > 11 )
					$scope.formData.bf = 'S';
				else if($scope.formData.rfactor < 10.1)
					$scope.formData.bf = 'L';
				else
					$scope.formData.bf = 'M';
			}
			
			DietFactory.getIBWRange($scope.formData.height_in_cm, $scope.formData.bf).success(function (data) {
				$scope.formData.ibw = data[0].min_range+' - '+data[0].max_range;
			});
		}
	}
	
	/* Recommended Intake  */
	// Protein range
	$scope.pro_range = ['0.65', '0.7', '0.75', '0.8', '0.85', '0.9', '0.95', '1', '1.1', '1.2', '1.3', '1.4', '1.5' ];
	$scope.formData.protein_range= '0.9';
	
	// Fat range percent
	$scope.fat_range = ['14', '18', '20', '25', '30'];
	
	/* Function to update Proteins */
	$scope.updateProteins = function() {
		$scope.formData.rec_protien = $scope.formData.ibw_mean * $scope.formData.protein_range;
	}
	
	/* Function to update Fats */
	$scope.updateFats = function() {
		$scope.formData.rec_fat = parseFloat(($scope.formData.icc_adjusted * $scope.formData.fat_range/100)/9).toFixed(2);
	}
	
		
	/* Update intake allocation */
	$scope.prot_tot = 0;
	$scope.fat_tot = 0;
	$scope.chol_tot = 0;
	$scope.calo_tot = 0;
	$scope.calc_tot = 0;
	$scope.updateIntake = function(index) {
		$scope.formData.foods[index].prot_per_serving = parseFloat($scope.formData.foods[index].no_of_serving * $scope.foods[index].prot_per_serving).toFixed(1);
		$scope.formData.foods[index].fat_per_serving = parseFloat($scope.formData.foods[index].no_of_serving * $scope.foods[index].fat_per_serving).toFixed(1);
		$scope.formData.foods[index].chol_per_serving = parseFloat($scope.formData.foods[index].no_of_serving * $scope.foods[index].chol_per_serving).toFixed(1);
		$scope.formData.foods[index].calo_per_serving = parseFloat($scope.formData.foods[index].no_of_serving * $scope.foods[index].calo_per_serving).toFixed(1);
		$scope.formData.foods[index].calc_per_serving = parseFloat($scope.formData.foods[index].no_of_serving * $scope.foods[index].calc_per_serving).toFixed(1);
		
		$scope.intakeTot();
		/*$scope.prot_tot += parseFloat($scope.formData.foods[index].prot_per_serving);
		$scope.fat_tot += parseFloat($scope.formData.foods[index].fat_per_serving);
		$scope.chol_tot += parseFloat($scope.formData.foods[index].chol_per_serving);
		$scope.calo_tot += parseFloat($scope.formData.foods[index].calo_per_serving);
		$scope.calc_tot += parseFloat($scope.formData.foods[index].calc_per_serving);*/
		
		// For Exercises
		if($scope.formData.icc_adjusted && $scope.calo_tot)
			$scope.formData.total_cd = parseFloat($scope.formData.icc_adjusted - $scope.calo_tot).toFixed(2);
	}
	
	
	$scope.intakeTot = function() {
		var pro_total=0,fat_total=0,chol_total=0,calo_total=0,calc_total=0;
		angular.forEach($scope.formData.foods , function(list){
			if(list.prot_per_serving)
				pro_total += parseFloat(list.prot_per_serving);
			if(list.fat_per_serving)
				fat_total += parseFloat(list.fat_per_serving);
			if(list.chol_per_serving)
				chol_total += parseFloat(list.chol_per_serving);
			if(list.calo_per_serving)
				calo_total += parseFloat(list.calo_per_serving);
			if(list.calc_per_serving)
				calc_total += parseFloat(list.calc_per_serving);
		});
		
		$scope.prot_tot = pro_total;
		$scope.fat_tot = fat_total;
		$scope.chol_tot = chol_total;
		$scope.calo_tot = calo_total;
		$scope.calc_tot = calc_total;
	}
	/* Intake Allocation - End */
	
	/* Meal Exchange */ 
	$scope.calories = [{id:1,name:'Carb Ex',mult:85,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
						{id:2,name:'PTN Ex',mult:85,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
						{id:3, name:'Veg Ex',mult:25,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
						{id:4, name:'FAT Ex',mult:50,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
						{id:5, name:'SMP',mult:33,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0}];
	$scope.formData.calories = $scope.calories;
	
	$scope.prots = [{id:1,value:'Carb Ex',mult:2.5,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
					{id:2,value:'PTN Ex',mult:6,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
					{id:3, value:'Veg Ex',mult:1,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
					{id:4, value:'FAT Ex',mult:'',bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0},
					{id:5, value:'SMP',mult:3.1,bf:0,bf_val:0,lunch:0,lunch_val:0,snack:0,snack_val:0,dinner:0,dinner_val:0}];
	$scope.formData.prots = $scope.prots;
	
	/* Function to calculate sum of calories */
	$scope.calculateSum = function (val)
	{
		var sum = 0;
		
		for (var i = 0; i < $scope.calories.length; i++)
		{
		  if((val == 'bf' && i==2) || (val == 'snack' && i==2)) {
			 $scope.mult = 0;
		  }
		  else {
			 $scope.mult = $scope.formData.calories[i]['mult']; 
		  }
		 
		  $scope.formData.calories[i][val+'_val'] = $scope.formData.calories[i][val]*$scope.mult;
		  sum += $scope.formData.calories[i][val+'_val'];
		}
		if(val=='bf')
			$scope.formData.breakfast_cal = sum;
		else if(val=='lunch')
			$scope.formData.lunch_cal = sum;
		else if(val=='snack')
			$scope.formData.snack_cal = sum;
		else if(val=='dinner')
			$scope.formData.dinner_cal = sum;
		
		return sum;
	}
	
	/* Function to calculate sum of proteins */
	$scope.calculateProtSum = function (val)
	{
		var prot_sum = 0;
		
		for (var i = 0; i < $scope.prots.length; i++)
		{
		  if(i==3) {
			 $scope.prot_mult = 0;
		  }
		  else {
			 $scope.prot_mult = $scope.formData.prots[i]['mult']; 
		  }
		 
		  $scope.formData.prots[i][val+'_val'] = $scope.formData.calories[i][val]*$scope.prot_mult;
		  prot_sum += $scope.formData.prots[i][val+'_val'];
		}
		
		if(val=='bf')
			$scope.formData.breakfast_protein = prot_sum;
		else if(val=='lunch')
			$scope.formData.lunch_protein = prot_sum;
		else if(val=='snack')
			$scope.formData.snack_protein = prot_sum;
		else if(val=='dinner')
			$scope.formData.dinner_protein = prot_sum;
		
		return prot_sum;
	}
	
	/* Create Plans - Start */
	$scope.checkedIndexs = [];
	$scope.selectedAll= false;
	$scope.checkAll = function () {
		$scope.checkedIndexs = [];
        if ($scope.selectedAll) {
            $scope.selectedAll = true;
        } else {
            $scope.selectedAll = false;
            $scope.checkedIndexs.length = 0;
        }
        angular.forEach($scope.meals, function (meal, key) {
            if ($scope.selectedAll) {
                $scope.checkedIndexs.push($scope.meals[key].id);
            }
            meal.checked = $scope.selectedAll;
        });
		
		if($scope.checkedIndexs.length > 0) {
			$scope.formData.meals = $scope.checkedIndexs;
		}
    };
	
	$scope.checkedRow = function (id) { 
		if ($scope.checkedIndexs.indexOf(id) === -1) {
            $scope.checkedIndexs.push(id);
        }
        else {
            $scope.checkedIndexs.splice($scope.checkedIndexs.indexOf(id), 1);
        }
	};
	
	
	$scope.mytime = new Date();
	
	$scope.hstep = 1;
	$scope.mstep = 15;
	
	$scope.ismeridian = true;
	
	$scope.dateChange = function(index) {
		$scope.formData.meals[index].end_time = new Date($scope.formData.meals[index].start_time.getTime() + 30*60000);
	}
	
	//Load diseases
	$scope.loadDiseases = function(query) {
		return $http.get('master/getDiseases?query=' + query);
	};
	
	//Tag added
	$scope.tagAdded = function(tag) {
        console.log('Tag added: ', tag);
    };
	
	//Tag removed
	$scope.tagRemoved = function(tag) {
        console.log('Tag removed: ', tag);
    };
	
	// Get UOM list
	UomMaster.getUomMaster().success(function (data) {
		$scope.uoms = data;
	});
	
	// Food items scope
	DietFactory.getFooditems().success(function (data) {
		$scope.fooditems = data;
		console.log($scope.fooditems)
	});
	
	$scope.getFitems = function (search) {
	    var filtered = filterFilter($scope.fooditems, search);
    
	    var results = _(filtered)
	      .groupBy('category_name')
	      .map(function (g) {
	        g[0].firstInGroup = true;  // the first item in each group
	        return g;
	      })
	      .flatten()
	      .value();
      
	    console.log(results);
    
	    return results;
	  }
	  
	 $scope.formatLabel = function(model) {
		console.log($scope.fooditems.length)
		for (var i=0; i< $scope.fooditems.length; i++) {
		  if (model === $scope.fooditems[i].id) {
			return $scope.fooditems[i].name;
		  }
		}
	 }
	
	$scope.meal_options = {items: [{id:1, item:'', exchange:''}]};
	
	
	/*$scope.fields = [];
	$scope.addOptItem = function() {
		$scope.count++;
		var html = '<input type="text" ng-model="formData.fooditems.item" typeahead="fooditem.name for fooditem  in fooditems | filter:$viewValue" class="form-control input-inline input-small" typeahead-editable="false" >';

        var topScope = angular.element(document).scope();
        var elem = $compile(html)(topScope);
		//$scope.fields.push({});
		$scope.fields.splice($scope.count, $scope.count, elem);
    };*/
	
	// Delete food item
	$scope.delOpItem = function(mealid, option, col) {
		var ele = angular.element( document.querySelector( '#col'+mealid+'_'+option+'_'+col+'' ) );
		ele.remove();
	}
	
	// Delete meal option
	$scope.delOpt = function(mealid, option) {
		var optele = angular.element( document.querySelector( '#row'+mealid+'_'+option+'' ) );
		optele.remove();
	}

	
    
	
	/* For DOB and Age calculation */
	$scope.ages = function(){ 
	  var age = $scope.formData.dob;
	 
	  if(typeof(age) != "undefined" ){
		   var ageDifMs = Date.now() - age.getTime();
		   var ageDate = new Date(ageDifMs); // miliseconds from epoch
		   var ag =  Math.abs(ageDate.getUTCFullYear() - 1970);
		   
		   $scope.formData.age = ag; 
		}   
    };
	
	$scope.maxDate = new Date();
    $scope.open = function($event) {
		$scope.status.opened = true;
    };
    $scope.status = {
		opened: false
	};
	
	$scope.open_consult = function($event) {
		$scope.status_consult.opened = true;
    };
    $scope.status_consult = {
		opened: false
	};
	
	// Guidelines section
	$scope.second = 0;
	$scope.guidelineAct = false;
	$scope.showGuidelines = function (diseases) {
		//console.log($scope.guidelineAct)
		$scope.guidelineAct = true;
		//diseases.push({'guide':$scope.guidelineAct});
		
		$scope.second++;
		diseases.push({'guide':$scope.formData.guidelines});
		//diseases.push({'client_id':$scope.ex_user});
		//diseases.push({'seconds':$scope.second});
		
        createDialog(BASE_URL + "/diet/showGuidelines", {
            id: 'showGuidelines',
            title: 'Important Guidelines',
			controller: 'GuidelinesController',
            backdrop: true,
            footerTemplate: false,
            success: {label: 'Success', fn: function () {
                    console.log('Guidelines');
                }}
        }
        , {
            params: diseases,
			client_id: $scope.ex_user

        }
        );
    };
	
	$scope.formData.checked_guidelines = [];
	$scope.$on('setGuideline', function (event, data) {
		$scope.formData.guidelines = data;
		
	});
	//console.log($scope.formData.guidelines)
	// Exercises
	$scope.formData.exercises = [{exercise_name:'',ex_def:''}];
	
	$scope.addExercise = function (formData) {   
		if (typeof  formData.exercises == 'undefined') {
             formData.exercises = [];
        }
        formData.exercises.push({exercise_name: '', ex_def: ''});
    }
	
	$scope.formData.tot_ex_def=0;
	$scope.formData.total_closs=0;
	$scope.formData.weight_loss=0;
	$scope.formData.exno_of_days=0;
	$scope.formData.total_cd=0;
	$scope.formData.program=0;
	$scope.formData.exno_of_weeks=0;
	$scope.ex_sum = function(list) {
	  var total=0;
	  angular.forEach(list , function(exercise){
		if(exercise.ex_def)
		total+= parseInt(exercise.ex_def);
	  });
	  $scope.formData.tot_ex_def=total;
	  $scope.formData.total_closs = parseFloat($scope.formData.exno_of_days * (parseFloat($scope.formData.total_cd)+parseFloat($scope.formData.tot_ex_def))).toFixed(2);
	  $scope.formData.weight_loss = parseFloat((1000/7700)*$scope.formData.total_closs).toFixed(2);
	  $scope.formData.exno_of_weeks = parseFloat($scope.formData.program/$scope.formData.weight_loss).toFixed(2);
	  return total;
	 }
	 
	// function to process the form
    $scope.processForm = function() {
        
		angular.toJson($scope.formData);
		console.log($scope.formData);  //return false;
		//if($scope.formComplete) {
			DietFactory.addPlan($.param($scope.formData)).success(function (data) {
				
				if (data.success == true) {
					toastr.success(data.message);
					//$state.go('dietplan');
					$scope.dietid = data.dietid;
					$scope.planid = data.planid;
					$state.go('dietChart', { 'diet_id':$scope.dietid ,'plan_id':$scope.planid});
				} else {
					toastr.error(data.message);
				}
			});
		//}
    };
	
	/* ============================== */
	/* Added for Add Existing Client */
	$scope.foodshort =[];
	FoodMaster.getFoodMasterShort().success(function (data) {
		$scope.foodshort = data;
	});
	// edit plan when uid not null
	if($stateParams.uid!=null){		 
          DietFactory.getClientDtl($stateParams.uid,$stateParams.plan_id).success(function (data) {	
		    
	       $scope.$broadcast('update_controller',data);
     });
    }
	$scope.$on("update_controller", function(event, data){
		console.log(data);  
	
		//client deatils data
		$scope.ex_user = data.id;
		
		$scope.formData = data;
	
		$scope.formData.diseases = data.diseasess;
		if($stateParams.uid!=null){	       
			$scope.formData.planid = $stateParams.plan_id; 
	    }
		else
		{
			$scope.formData.planid = 0;
		}
		$scope.formData.gender = {value:data.gender};
		$scope.formData.preg_lact = {text:data.preg_lact};
		if(data.gender.value == 'Male')
		{ 
		 $scope.formData.icc_gender_opt = 31;
		 $scope.formData.protein_range = 0.9;
		 $scope.showPL = false;		
		}
		else
		{
		 $scope.formData.icc_gender_opt = 27;
		 $scope.formData.protein_range = 0.85;
		 $scope.showPL = true;	
		}
		
		$scope.frame_sizes = [{id:1, name:'S', value: '10.4'}, {id:2, name:'M', value: '9.6-10.4'}, {id:3, name:'L', value: '9.6'}]
		$scope.formData.body_fat = $scope.frame_sizes[1].id;
		if($scope.formData.gender.value == 'Male') {
			if($scope.formData.rfactor > 10.4 )
				$scope.formData.bf = 'S';
			else if($scope.formData.rfactor < 9.6 )
				$scope.formData.bf = 'L';
			else
				$scope.formData.bf = 'M';
		}
		else {
			if($scope.formData.rfactor > 11 )
				$scope.formData.bf = 'S';
			else if($scope.formData.rfactor < 10.1)
				$scope.formData.bf = 'L';
			else
				$scope.formData.bf = 'M';
		}
		$scope.formData.icc_gender_percent_opt  = parseInt((data.icc - data.icc_adjusted) / (data.icc/100));
		$scope.formData.fat_range  = parseInt((data.rec_fat * 100 * 9 )/ data.icc_adjusted);
		// intake allocation data
		$scope.formData.foods  = $scope.foodshort;
			//console.log($scope.foodshort);
			$scope.prot_tot = 0;
			$scope.fat_tot = 0;
			$scope.chol_tot = 0;
			$scope.calo_tot = 0;
			$scope.calc_tot = 0;
		for(var i=0; i < data.foodss.length; i++) 
		{						
				$scope.formData.foods[data.foodss[i].food_id-1].no_of_serving = data.foodss[i].no_of_serving;
				$scope.formData.foods[data.foodss[i].food_id-1].prot_per_serving = data.foodss[i].servings_prot;
				$scope.formData.foods[data.foodss[i].food_id-1].fat_per_serving = data.foodss[i].servings_fat;
				$scope.formData.foods[data.foodss[i].food_id-1].chol_per_serving = data.foodss[i].servings_chol;
				$scope.formData.foods[data.foodss[i].food_id-1].calo_per_serving = data.foodss[i].servings_calo;
				$scope.formData.foods[data.foodss[i].food_id-1].calc_per_serving = data.foodss[i].servings_calc;
			
			
				$scope.prot_tot += parseFloat(data.foodss[i].servings_prot);
				$scope.fat_tot += parseFloat(data.foodss[i].servings_fat);
				$scope.chol_tot += parseFloat(data.foodss[i].servings_chol);
				$scope.calo_tot += parseFloat(data.foodss[i].servings_calo);
				$scope.calc_tot += parseFloat(data.foodss[i].servings_calc);
		}
		// create meal data
			$scope.formData.calories = JSON.parse(data.exchanges.calories);
			$scope.formData.prots = JSON.parse(data.exchanges.prots);
		//console.log(data.exchanges.calories);
   
		$scope.formData.startTime = new Date();
		$scope.formData.endTime = new Date($scope.formData.startTime.getTime() + 30*60000);
		// create plan data
		//console.log(data.exchanges.calories)
		$scope.mealopts=[]; 
		$scope.mealoptsn=[]; 
		$scope.mealopts = data.mealopts;
		//$scope.formData.meals = $scope.mealoptsn;
		$scope.formData.fooditems = data.mealopts;
		console.log(data.mealopts);
		
		$scope.checkedIndexs=[];
		$scope.formData.meals  = $scope.meals;
		for(var i=0; i < $scope.meals.length; i++) 
		{
			$scope.formData.meals[$scope.meals[i].id-1].checked=false;					
		
		}
		$scope.checkedRow = function (id) {
			if ($scope.mealoptsn.indexOf(id) === -1) {
				//$scope.mealoptsNew.push({8:{'id':'8','name':'Dinner','start_time':'','end_time':''}});
				$scope.mealoptsn.push(id);
				$scope.meals[id-1].checked=true;
				$scope.mealopts[id] = {'id':id,name:$scope.meals[id-1].name,'start_time':'','end_time':'','options':{id:[{'item':'','exch':''}]}};
				//console.log($scope.meals);
				console.log($scope.mealopts);
	        }
	        else {
				
				delete $scope.mealopts[id];
				$scope.meals[id-1].checked=false;
	            $scope.mealoptsn.splice($scope.mealoptsn.indexOf(id), 1);
				//$scope.mealopts.splice(id ,1);
				console.log($scope.mealopts);
	        }
			
			
			//console.log($scope.mealoptsn);
			//console.log($scope.mealoptsn.length)
			
		};
		for(var i=0; i < data.mealtimes.length; i++) 
		{
			$scope.formData.meals[data.mealtimes[i].id-1].checked=true;					
			//$scope.checkedIndexs.push(parseInt(data.mealtimes[i].id));
			$scope.formData.meals[data.mealtimes[i].id-1].start_time = new Date(data.mealtimes[i].start_time);//'Fri Sep 18 2015 '+
			$scope.formData.meals[data.mealtimes[i].id-1].end_time = new Date(data.mealtimes[i].end_time);
		}
		
		
		
		// creat plan
	    
		
		
	
        // For exercises
		if(data.plan_exercises!=null)
		{
		$scope.formData.exercises = JSON.parse(data.plan_exercises.exercises);
		$scope.formData.program = parseInt(data.plan_exercises.program);
		$scope.formData.exno_of_days = parseInt(data.plan_exercises.exno_of_days);
		$scope.formData.exno_of_weeks = parseFloat(data.plan_exercises.exno_of_weeks).toFixed(2);
		$scope.formData.total_cd = parseFloat(data.plan_exercises.total_cd).toFixed(2);
		$scope.formData.total_closs = parseFloat(data.plan_exercises.total_closs).toFixed(2);
		$scope.formData.weight_loss = parseFloat(data.plan_exercises.weight_loss).toFixed(2);
	   }
				
	});	
			
	
	$scope.addClient = function () {

		createDialog(BASE_URL + "/master/addClientView", {
			id: 'addClient',
			title: 'Add Client From List',
			backdrop: true,
			controller: 'AddDietController',
			footerTemplate: false,
			success: {label: 'Success', fn: function () {
					console.log('Add Intake modal closed');
				}}
		}
		, {
			Edit: ''

		}
		);
	};
		
		

});

SelfcareApp.controller('GuidelinesController', function ($scope, $state, $rootScope, DietFactory, params, client_id) {
	console.log(client_id);
	var lastItem = params.splice(-1,1);
	//if(!$scope.second)
	    
	//console.log(lastItem[0].guide)
	//console.log(lastItem[0].seconds)
	
    $scope.guidelines = [];
	if(typeof(lastItem[0].guide) == "undefined")
		 $scope.sel_guidelines = [];
	
	$scope.checkboxes = [];
	
	//console.log($scope.sel_guidelines.length)
	if(params !='') {
		 
		if(typeof(lastItem[0].guide) != "undefined") 
		  { 
			  $scope.guidelines = lastItem[0].guide;
			  $scope.sel_guidelines = angular.copy($scope.guidelines);			  
			  $rootScope.$broadcast('setGuideline', $scope.sel_guidelines);
	      }
		 else
		 { 
				 DietFactory.getGuidelines(params).success(function (data) {
					
					if(client_id !=0) {
						DietFactory.getPlanGuidelines(client_id).success(function (plandata) {
							
							angular.forEach(data, function(recommes) {
								for(var i=0; i<recommes.length; i++) {
									//console.log(recommes[i].id+',,,,,'+plandata.indexOf(recommes[i].id))
									if(plandata.indexOf(recommes[i].id) >= 0) {
										recommes[i].checked = true;
									}
										
								}
							});
							
							$scope.guidelines = data;
							$scope.sel_guidelines = angular.copy($scope.guidelines); 
						});
						
					}
					else {
						angular.forEach(data, function(recomms) {
							for(var i=0; i<recomms.length; i++) {
								recomms[i].checked = true;
							}
						});
						$scope.guidelines = data;
						$scope.sel_guidelines = angular.copy($scope.guidelines); 
					}
					
	 				//$scope.sel_guidelines = angular.copy($scope.guidelines); 
					$rootScope.$broadcast('setGuideline', $scope.sel_guidelines); 
				});  	
		  }	
	}
	
	
	$scope.checkedDis = function (dis,recomm,index, checkstatus) { 
		if (checkstatus) { 
			$scope.sel_guidelines[dis][index].checked = false;
		}
		else {
			$scope.sel_guidelines[dis][index].checked = true;
		}
		
		$rootScope.$broadcast('setGuideline', $scope.sel_guidelines);
	};
	
	
});

SelfcareApp.controller('AddDietController', function ($scope, $state, $rootScope,$timeout, DietFactory ,Edit, createDialog) {
    $scope.frm = {};	
	$scope.clients =  {};
    $scope.limitOptions = {
        5: "5",
        10: "10",
        20: "20",
        50: "50",
        100: "100"
     };
	  DietFactory.getClients().success(function (data) {
			$scope.clients = data;
            $scope.filteredItems = data.length;          
            $scope.totalItems = data.length;
            $scope.currentPage = 1;
            $scope.itemsPerPage = GLOBAL_PAGINATION_SIZE; 
       });
	   $scope.setPage = function(pageNo) { 
			$scope.currentPage = pageNo;
		};     
	   $scope.filter = function() {
			$timeout(function() {
				//$scope.filteredItems = $scope.filtered.length;
			}, 10);
		};
		$scope.sort_by = function(predicate) {
	        $scope.predicate = predicate;
	        $scope.reverse = !$scope.reverse;
	    };
	    $scope.sort = function(keyname) {
	  		$scope.sortKey = keyname;// set the sort key to the parameter passed
	                  $scope.reverse = !$scope.reverse; // if true make it false or vice varsa
	  	};
		//$scope.radioValue=1;
		$scope.setClient = function ()
		{  
			//$scope.radioValue.
			var id  = $scope.frm.radioValue;
			
			 DietFactory.getClientDtl(id,'0').success(function (data) {
				// console.log(data);				
				$rootScope.$broadcast('update_controller',data);
 				$scope.$modalClose();
 				//toastr.success(data.message);
 				//$state.reload();
			 });
			 
		}


});