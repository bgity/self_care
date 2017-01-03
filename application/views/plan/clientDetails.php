<div class="col-md-12 text-center">
	<a class="btn btn-primary green" ng-click="addClient();">Add Existing Client</a>
</div>
<div class="effect8">
	<h3>Client Details </h3>
	<br/>
	<div class="form-group width_100_input" style="float:left;">
		<input type="hidden" class="form-control input-inline" name="planid" ng-model="formData.planid" >
		<input type="hidden" class="form-control input-inline" name="copy_plan" ng-model="formData.copy_plan" >
		<div class="col-md-1">
			<input type="text" class="form-control input-inline width_100_input" name="file_no" ng-model="formData.file_no" placeholder="File No">
		</div>
		
		<div class="col-md-2">
			<input type="text" class="form-control input-inline width_100_input" name="name" ng-model="formData.name" placeholder="Name">
		</div>
		<div class="col-md-2">
			<input type="text" class="form-control input-inline width_100_input" name="email" ng-model="formData.email" placeholder="Email">
		</div>
		
		<div class="col-md-1 col_lab">
			<select ng-model="formData.gender" class="form-control input-inline width_100_input" ng-options="gender.name for gender in genders track by gender.value" ng-change="genderRelUpdate();updateVals();"></select>
		</div>
		<div class="col-md-2 col_lab" ng-show="showPL">
			<select class="form-control input-inline width_100_input" ng-model="formData.preg_lact" ng-options="preg_lact.text for preg_lact in preg_lacts track by preg_lact.text" ng-show="showPL" ng-change="UpdatePL(formData.preg_lact);">
				<option value='' >Select</option>
			</select>
		</div>
		
		
		<div class="col-md-4"> 
			DOB:<input  type="text" datepicker-popup="{{format}}" ng-model="formData.dob" placeholder="DOB" is-open="status.opened" max-date="maxDate" show-weeks="false" datepicker-options="dateOptions" date-disabled="disabled(date, mode)"  close-text="Close" name="dob" ng-click="open($event)" class="form-control input-inline input-small" ng-change="ages()" /><i class="glyphicon glyphicon-calendar" ng-click="open($event)" style="cursor:pointer"></i>
			<input type="text" class="form-control input-inline input-xsmall" name="age" ng-model="formData.age" placeholder="Age" ng-change="ageRelUpdate();">
		</div>
		
	</div>
	<div class="form-group width_100_input" style="float:left;">
		
		<div class="col-md-1"> 
			<select class="form-control input-inline width_100_input" ng-model="formData.food_pref" ng-options="food_pref.id as food_pref.sdesc for food_pref in food_prefs">
				<option value='' disabled selected style='display:none;'>Food Pref</option>
			</select>
		</div>
		
		<div class="col-md-4">
			Consultation Date:<!--<input id="datepicker" ng-datepicker type="text" name="consult_date" ng-model="formData.consult_date" placeholder="Consultation Date">-->
			<input  type="text" datepicker-popup="{{format}}" ng-model="formData.consult_date" placeholder="" is-open="status_consult.opened" max-date="maxDate" show-weeks="false" datepicker-options="dateOptions" date-disabled="disabled(date, mode)"  close-text="Close" name="consult_date" ng-click="open_consult($event)" class="form-control input-inline input-small"/><i class="glyphicon glyphicon-calendar" ng-click="open_consult($event)" style="cursor:pointer"></i>
		
		</div>
	</div>
		
	<div class="form-group width_100_input" style="float:left; border-bottom:#d3d3d3 solid 1px; padding-bottom:20px; margin-bottom:20px;">
		<div class="col-md-6"> 
			<span class="form-control input-inline input_full" style="width:100%; padding:0px;">
				<tags-input ng-model="formData.diseases" placeholder="Add disease" on-tag-added="tagAdded($tag)" on-tag-removed="tagRemoved($tag)" add-from-autocomplete-only="true" display-property="name">
					<auto-complete source="loadDiseases($query)"></auto-complete>
				</tags-input>
			</span>
		</div>
	</div>

	<div class="form-group width_100_input" style="float:left;">
		<div class="col-md-4">
			<div class="col-md-1 col_lab"> Programe Type</div>
			<select ng-model="formData.programe_type" class="form-control input-small input-inline" ng-options="ptype.name for ptype in programeType track by ptype.id" ></select>
		</div>
		
		<div class="col-md-4">
			<div class="col-md-1 col_lab"> Target Date</div>
			<input  type="text" datepicker-popup="{{format}}" ng-model="formData.target_date" placeholder="" is-open="status_target.opened"  show-weeks="false" datepicker-options="dateOptions" date-disabled="disabled(date, mode)"  close-text="Close" name="target_date" ng-click="open_target($event)" class="form-control input-inline input-small"/><i class="glyphicon glyphicon-calendar" ng-click="open_target($event)" style="cursor:pointer"></i>
		</div>
		
		<div class="col-md-4">
			<div class="col-md-1 col_lab"> Target Weight</div>
			<input type="text" class="form-control input-inline input-small" name="target_weight_in_kg" ng-model="formData.target_weight_in_kg" placeholder="Target Weight">Kgs
		</div>
	</div>
	<div class="form-group width_100_input" style="float:left;">
		<div class="col-md-4"> 
			<div class="col-md-1 col_lab">Present Fat</div>
			<input type="text" class="form-control input-inline input-small" name="started_fat" ng-model="formData.started_fat" placeholder="Started Fat">%
		</div>
		<div class="col-md-4"> 
			<div class="col-md-1 col_lab">Target Fat</div>
			<input type="text" class="form-control input-inline input-small" name="target_fat" ng-model="formData.target_fat" placeholder="Target Fat">%
		</div>
		<div class="col-md-4">
			<div class="col-md-1 col_lab"> Fat Ideal Range</div>
			<input type="text" class="form-control input-inline input-small" name="fat_ideal_range" ng-model="formData.fat_ideal_range" placeholder="Ideal Range">%
		</div>
		
	</div>
</div>

<div class="effect8">
	<h3>Investigation Data</h3>
	<br/>
	<div class="form-group width_100_input" style="float:left;">
	  <div class="col-md-2">&nbsp;</div>
	  <div class="col-md-2">&nbsp;</div>
	  <div class="col-md-2" style="text-align:center;">
	  Wrist
	   <hr class="dotted"  style="margin:5px;"/>
	  </div>
	  <div class="col-md-1">&nbsp;</div>
	  <div class="col-md-2">&nbsp;</div>
	  <div class="col-md-2" style="text-align:center;">
	  BF
	   <hr class="dotted"  style="margin:5px;"/>
	  </div>
	</div>

	<div class="form-group width_100_input" style="float:left;">
		<div class="col-md-2">
			<input type="text" class="form-control input-inline" style="width:100px;" name="height_in_cm" ng-model="formData.height_in_cm" placeholder="Height" ng-change="updateVals();">Cms
		</div>
		<div class="col-md-2">
			<input type="text" class="form-control input-inline" style="width:100px;" name="weight_in_kg" ng-model="formData.weight_in_kg" placeholder="Weight" ng-change="updateDefWeight()">Kgs
		</div>
		<div class="col-md-3">
			<input type="text" class="form-control input-inline input-xsmall" style="width:100px;" name="wrist_in_inch" ng-model="formData.wrist_in_inch" placeholder="Inches" ng-change="updateVals();"> - 
			<input type="text" class="form-control input-inline input-xsmall" name="wrist_in_cm" ng-model="formData.wrist_in_cm" ng-disabled="true">Cms
		</div>
		<div class="col-md-2">
			<label>The r Factor <input type="text" class="form-control input-inline input-xsmall input-xsmall" name="rfactor" ng-model="formData.rfactor" ng-disabled="true"></label>
		</div>
		<div class="col-md-2">
			<input type="text" class="form-control input-inline input-xsmall" name="bf" ng-model="formData.bf" placeholder="BF" ng-disabled="true">
			<select class="form-control input-inline input-xsmall" ng-model="formData.body_fat" ng-options="frame_size.id as (formData.bf + frame_size.name) for frame_size in frame_sizes"></select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 text-center">IBW Range</div>
		<div class="col-md-4 text-center">ICC</div>
		<div class="col-md-4 text-center">ICC %</div>
	</div>
	<hr class="dotted"  style="margin:5px;"/>
	<div class="row">
		<div class="col-md-4 text-center">
			<div class="row">
				<div class="col-md-8">
					<input type="text" class="form-control input-inline input-small" name="ibw" ng-model="formData.ibw" placeholder="IBW Range" ng-disabled="true" >
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control input-inline input-small" name="ibw_mean" ng-model="formData.ibw_mean" placeholder="IBW Mean" ng-change="updateIBWRel();" >
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				BMI <input type="text" class="form-control input-inline input-xsmall" name="bmi" ng-model="formData.bmi" ng-disabled="true">
				Excess Weight <input type="text" class="form-control input-inline input-xsmall" name="icc" ng-model="formData.excess_weight" ng-disabled="true" >
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="row">
				<span style="border-bottom:1px solid #DDD;"><span ng-hide="formData.ibw_mean">IBW Mean</span><span>{{formData.ibw_mean}}</span> X</span>
				<input type="text" ng-model="formData.icc_gender_opt" typeahead="gender_opt for gender_opt  in icc_gender_options | filter:$viewValue" class="form-control input-inline input-xsmall" typeahead-editable="false"  >
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<input type="text" class="form-control input-inline input-xsmall" name="icc" ng-model="formData.icc" ng-disabled="true" ng-change="updateIBWRel();">
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="row">
				<span style="border-bottom:1px solid #DDD;"><span ng-hide="formData.icc">ICC - (ICC</span><span ng-show="formData.icc">{{formData.icc}} - ({{formData.icc}}</span> X</span>
				<input type="text" ng-model="formData.icc_gender_percent_opt" typeahead="gender_percent_opt for gender_percent_opt  in icc_gender_percent_options | filter:$viewValue" class="form-control input-inline input-xsmall" ng-change="updateIBWRel();" ng-selected="updateIBWRel();">%
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<input type="text" class="form-control input-inline input-xsmall" name="icc_adjusted" ng-model="formData.icc_adjusted" ng-disabled="true">
				<span> + </span><input type="text" class="form-control input-inline input-xsmall" name="preg_lact_energy" ng-model="formData.preg_lact_energy">
				<!--<span ng-show="showPL;formData.preg_lact"> + </span><input type="text" class="form-control input-inline input-xsmall" name="preg_lact_energy" ng-model="formData.preg_lact_energy" ng-show="showPL;formData.preg_lact">-->
			</div>
		</div>
	</div>
</div>
<div class="effect8">
	<h3>Recommended Intake</h3>
	<br/>
	<div class="row">
		<div class="col-md-4 text-center">Proteins</div>
		<div class="col-md-4 text-center">Fats</div>
		<div class="col-md-4 text-center">Carbs</div>
	</div>
	<hr class="dotted" style="margin:5px;"/>
	<div class="row">
		<div class="col-md-4 text-center">
			<div class="row">
				<span style="border-bottom:1px solid #DDD;"><span ng-hide="formData.ibw_mean">IBW Mean</span><span>{{formData.ibw_mean}}</span> X</span>
				<input type="text" ng-model="formData.protein_range" typeahead="protein_range for protein_range in pro_range | filter:$viewValue" class="form-control input-inline input-xsmall" ng-change="updateProteins();" ng-selected="updateProteins();">
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<input type="text" class="form-control input-inline input-xsmall" name="rec_protien" ng-model="formData.rec_protien" ng-disabled="true">
				<span> + </span><input type="text" class="form-control input-inline input-xsmall" name="preg_lact_protein" ng-model="formData.preg_lact_protein">
				<!--<span ng-show="showPL;formData.preg_lact" > + </span><input type="text" class="form-control input-inline input-xsmall" name="preg_lact_protein" ng-model="formData.preg_lact_protein" ng-show="showPL;formData.preg_lact">-->
			</div>
			
		</div>
		<div class="col-md-4 text-center">
			<div class="row">
				<span style="border-bottom:1px solid #DDD;"><span ng-hide="formData.icc_adjusted">ICC%</span><span ng-show="formData.icc_adjusted">{{formData.icc_adjusted}}</span> X</span>
					<input type="text" ng-model="formData.fat_range" typeahead="fat_range for fat_range in fat_range | filter:$viewValue" class="form-control input-inline input-xsmall" ng-change="updateFats();" ng-selected="updateFats();">%
				<span style="border-bottom:1px solid #DDD;">/9</span>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<input type="text" class="form-control input-inline input-xsmall" name="rec_fat" ng-model="formData.rec_fat" ng-disabled="true">
			</div>
		</div>
		<div class="col-md-4 text-center">
			
			<div class="row">
				<span style="border-bottom:1px solid #DDD;"><span ng-hide="formData.icc_adjusted">ICC%</span><span ng-show="formData.icc_adjusted">{{formData.icc_adjusted}}</span> X 50%/4</span>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<input type="text" class="form-control input-inline input-xsmall" name="rec_carbs" ng-model="formData.rec_carbs" ng-disabled="true">
			</div>
		</div>
	</div>
</div>
<div class="form-group"  style="margin-top:10px; float:left; width:100%;">
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<a class="btn btn-primary green" ng-click="selectedTemplate.path = 'diet/intakeAllocation';setTab('intake');">Next</a>
				<!--<button class="btn btn-primary green" ng-click="nextPage('intake');">Next</button>-->
			</div>
		</div>
	</div>
</div>