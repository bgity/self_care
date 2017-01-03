<!-- BEGIN PAGE HEADER-->
<div class="page-bar text-right">
	<a class="btn btn-primary btn-sm" href="diet/downloadPDF/{{dietchart.main.id}}/{{dietchart.recomm_intake.id}}">Download</a>
	<button type="button" class="btn btn-primary btn-sm" ng-click="printDiv('chart_div');"><i class="fa fa-print"></i> Print</button>
	<button type="button" class="btn btn-primary btn-sm" ng-click="sendMail();"><i class="fa fa-envelope"></i> Email</button>
	<button type="button" class="btn btn-primary btn-sm" ng-click="goCreateChart(dietId,planId)"><i class="fa fa-edit"></i> Edit</button>
	<button type="button" class="btn btn-primary btn-sm" ng-click="goCreateCopy(dietId,planId)"><i class="fa fa-copy"></i> Copy</button>
	<button type="button" class="btn btn-primary btn-sm" ng-click="getPlanList(dietId)">View History</button>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN MAIN CONTENT -->
<div class="row" id="chart_div">
	<div class="col-md-12">
		<!-- BEGIN TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					Diet Chart
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="chart_top">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">
								<h4 class="no_margin">File No.: {{dietchart.main.file_no}}</h4>
							</div>
							<div class="col-md-4">
								<h4 class="no_margin">Age: {{dietchart.main.age}}</h4>
							</div>
							<div class="col-md-4">
								<h4 class="no_margin">Gender: {{dietchart.main.gender}}</h4>
							</div>
						</div>
						<div class="col-md-12">
							<hr style="margin:5px 0px;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">
								<h4 class="no_margin">{{dietchart.recomm_intake.consultation_date}}</h4>
							</div>
							<div class="col-md-4">
								&nbsp;
							</div>
							<div class="col-md-4">
								<h4 class="no_margin">Food Preference: {{dietchart.main.ldesc}}</h4>
							</div>
						</div>
						<div class="col-md-12">
							<hr style="margin:5px 0px;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<h4 class="no_margin">Diet Guide For: {{dietchart.main.first_name}}</h4>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<h4 ng-show="dietchart.main.program_type !='NA'">DIET CHART FOR <b style="text-transform:uppercase;">{{dietchart.main.program_type}}</b></h4>
						<h4 ng-if="dietchart.recomm_intake.guidelines_count > 0">SUPPORTING <span ng-repeat="(key, value) in dietchart.guidelines" style="font-weight:bold;">
							{{value.name}}{{$last ? '' : ($index==dietchart.guidelines.length-2) ? ' and ' : ', '}}
							</span>
						</h4>
					</div>
					<div class="col-md-8 col-md-offset-2">
						<table class="table table-striped">
							<thead>
								<th></th>
								<th>STARTED</th>
								<th>TARGET</th>
								<th>IDEAL RANGE</th>
							</thead>
							<tbody>
								<tr>
									<td><b>Date</b></td>
									<td>{{dietchart.target_details.start_date}}</td>
									<td>{{dietchart.target_details.target_date}}</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><b>Weight</b></td>
									<td>{{dietchart.target_details.start_weight}}kgs</td>
									<td>{{dietchart.target_details.target_weight}}kgs</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><b>Fat</b></td>
									<td>{{dietchart.target_details.fat}}</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><b>BMI</b></td>
									<td>{{dietchart.target_details.bmi}}</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-center"><b>Guidelines</b></h4>
						<h5 class="text-center"><b>General Guidelines</b></h5>
						<hr class="dotted" style="margin:5px 0;">
						<div class="col-md-12">
							<div class="col-md-12" ng-repeat="general in dietchart.gen_guidelines">
							<input type="checkbox" class="regular-checkbox" ng-model="general[$index].checked" ng-checked={{general.chkd}} ng-click="removeGeneral(general.id,general.recommendation)" id="{{general.id}}"> 
							<a href="#" editable-textarea="general.recommendation" e-rows="1" e-cols="120" onbeforesave="updRecommend($data, general.id)">{{general.recommendation}}</a>
							</div>
						</div>
						<div id="extra" class="col-md-12">
						   <div class="col-md-10"> 
						    <span editable-textarea="dietchart.gen_ext_guidelines" e-rows="2" e-cols="100" e-name="recommendation_extra" e-form="rowform" >
							  {{dietchart.gen_ext_guidelines}}
							</span>
						   </div>
							<form editable-form name="rowform" onbeforesave="saveExtGeneral($data)" ng-show="rowform.$visible" class="form-buttons form-inline" >
							  <button type="submit" ng-disabled="rowform.$waiting" class="fa fa-save"></button>
							  <a type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="fa fa-times"></a>
							</form>
							<div class="buttons" ng-show="!rowform.$visible">
							  <a ng-click="rowform.$show()"><i class="fa fa-edit">Add Extra</i></a>
							  <!--<a ng-click="removeExtGen($index, uom.id, uom.sdesc)"><i class="fa fa-trash"></i></a>-->
							</div>							
						</div>
						
						<div class="col-md-12">
							<hr style="border:1px solid #DDD;">
						</div>
						<div class="col-md-12">
							<p>Diseases:
								<span ng-repeat="(key, value) in dietchart.guidelines" style="font-weight:bold;">
									{{value.name}}{{$last ? '' : ($index==dietchart.guidelines.length-2) ? ' and ' : ', '}}
								</span>
								<hr class="dotted" style="margin:5px 0;">
							</p>
						</div>
						<div class="col-md-12" ng-repeat="(key, gvalue) in dietchart.guidelines">
							<div class="col-md-12 text-center">
								<h4>Recommendations for supporting {{gvalue.name}}</h4>
							</div>
							<div class="col-md-12" ng-repeat="(kk,guideline) in gvalue" ng-if="kk!='name'">
								{{kk--1}}. {{guideline.recommendation}}
							</div>

							<div class="col-md-12">
								<hr style="border:1px solid #DDD;">
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<hr style="padding:0 5px; border:1px solid #1CAF9A;">
					</div>
				</div>
				
				<div class="row" ng-repeat="dietch in dietchart.meals">
					 <div class="col-md-12 text-center">
						<div class="col-md-12 "><h4><b>{{dietch.meal_name}} : {{dietch.start_time | date:'shortTime'}} - {{dietch.end_time | date:'shortTime'}}</b></h4></div>
						<div class="clearfix"></div>
						
					</div>
				<!-- start except for NA category options -->	
			    <!--<span ng-if="dietch.meal=='2' || dietch.meal=='4' || dietch.meal=='6' || dietch.meal=='8'">		-->
					<div class="col-md-12 text-center">
												
						<div class="col-md-12 " ng-if="dietch.meal_name=='Break Fast'"><i>Calories : {{dietch.breakfast_protein}} kcal - Proteins : {{dietch.breakfast_cal}} g </i></div>
						<div class="col-md-12 " ng-if="dietch.meal_name=='Lunch'"><i>Calories : {{dietch.lunch_protein}} kcal - Proteins : {{dietch.lunch_cal}} g</i></div>
						<div class="col-md-12 " ng-if="dietch.meal_name=='Snack'"><i>Calories : {{dietch.snack_protein}} kcal - Proteins : {{dietch.snack_cal}} g</i></div>
						<div class="col-md-12 " ng-if="dietch.meal_name=='Dinner'"><i>Calories : {{dietch.dinner_protein}} kcal - Proteins : {{dietch.dinner_cal}} g</i></div>
						
						
						<div class="clearfix"></div>
						<hr class="" style="margin:5px 0;">
					</div>
					
					<div class="col-md-12">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-1"><b>Options</b></div>
								<div class="col-md-2"><b>Carbs</b></div>
								<div class="col-md-2"><b>Proteins</b></div>
								<div class="col-md-2"><b>Fats</b></div>
								<div class="col-md-2"><b>Fibres</b></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="row">
								<div class="col-md-3">Proteins</div>
								<div class="col-md-3">Fats</div>
								<div class="col-md-3">Carbs</div>
								<div class="col-md-3">Cals</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<hr class="" style="margin:5px 0;">
					</div>
					<div class="col-md-12" ng-repeat="option in dietch.options">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-1" >{{$index+1}}</div>								 
								<span ng-if="option.items.nut_count=='1'">
									
								 <div class="col-md-2" id='carbs'>
								  <span ng-repeat="optitem in option.items">	
								  <!--<span ng-if="optitem.macro_nut=='CARBS'"><span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>
								                                <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br></span>-->
									<span ng-if="optitem.macro_nut=='CARBS'">
										<span ng-if="optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.gm_ml_meas}}</span>
										<span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Cup cooked'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>
										<span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass' || optitem.calc_base=='slice'">{{optitem.amount }}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
									</span>
									      <span ng-if="optitem.macro_nut=='NA'">
  								                    <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
										  </span>
								  </span>
								 </div>
								 
								 <div class="col-md-2" id='prot'>
								  <span ng-repeat="optitem in option.items">	
								  <!--<span ng-if="optitem.macro_nut=='PROTEIN'"><span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span> 
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br></span>-->
										<span ng-if="optitem.macro_nut=='PROTEIN' && optitem.exchange==''">
								         <span ng-if="optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.gm_ml_meas }}</span>
                                         <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Cup cooked'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>								  
								         <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass' || optitem.calc_base=='slice'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
										 
										 
										</span>
										<span ng-if="optitem.exchange!=''">
									       {{optitem.text_exchange}}								    
								        </span>
										 
								  </span>
								 </div>
								 
								 <div class="col-md-2" id='fat'>
								  <span ng-repeat="optitem in option.items">	
								  <!--<span ng-if="optitem.macro_nut=='FATS'"><span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span> 
								                              <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br></span>-->
									<span ng-if="optitem.macro_nut=='FATS'">
								         <span ng-if="optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.gm_ml_meas }}</span>
                                         <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Cup cooked'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>								  
								         <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass' || optitem.calc_base=='slice'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
									</span>
								  </span>
								 </div>
								 <div class="col-md-2" id='fibre'>
								  <span ng-repeat="optitem in option.items">	
								  <!--<span ng-if="optitem.macro_nut=='FIBRE'"><span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span> 
								                              <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' ">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br></span>-->
										<span ng-if="optitem.macro_nut=='FIBRE'">
								         <span ng-if="optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.gm_ml_meas }}</span>
                                         <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Cup cooked'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>								  
								         <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass' || optitem.calc_base=='slice'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
										</span>
								  </span>
								 </div>
							  </span>
							  
								<span ng-if="option.items.nut_count=='2'">
								 <div class="col-md-6 text-center" id='carbsp' >
								  <span ng-repeat="optitem in option.items">	
								   <span ng-if="optitem.macro_nut==('PROTEIN,CARBS' || optitem.macro_nut=='CARBS,PROTEIN') && optitem.exchange==''">
									   
									                           <!--<span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>-->
										 <span ng-if="optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.gm_ml_meas }}</span>
                                         <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Cup cooked'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>								  
								         <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass' || optitem.calc_base=='slice'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
									</span>
															   
								   
								    <span ng-if="optitem.exchange!=''">
									  {{optitem.text_exchange}}
								    
								  </span>
								 </div>
								 
								 <div class="col-md-3" id='prot'>
								  <span ng-repeat="optitem in option.items">	
								   <span ng-if="optitem.macro_nut=='FATS'">
									  <!--<span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span> 
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>-->
										<span ng-if="optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.gm_ml_meas }}</span>
                                         <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Cup cooked'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>								  
								         <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass' || optitem.calc_base=='slice'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
								   </span>								   
															   
								  </span>
								 </div>								 								 
							  </span>
							  
								<span ng-if="option.items.nut_count=='3'">
								 <div class="col-md-9 text-center" id='carbspf' >
								  <span ng-repeat="optitem in option.items" >
									  <span ng-if="optitem.exchange==''">									  
									                           <!--<span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>-->
										<span ng-if="optitem.calc_base=='gms' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.gm_ml_meas }}</span>
                                         <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Cup cooked'">{{optitem.amount * optitem.cup_meas | decimalToFraction}}</span>								  
								         <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass' || optitem.calc_base=='slice'">{{optitem.amount | decimalToFraction}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
									  </span>
								     <span ng-if="optitem.exchange!=''">
									  {{optitem.text_exchange}}
								     				   
								  </span>
								 </div>								 								 								 
							   </span>
								 
	                            
									 
							</div>
							
						</div>
						<div class="col-md-3">
							<div class="row">
								
								 <div class="col-md-3 text-left">{{option.items.tot_prot}} g</div>
								 <div class="col-md-3 text-left">{{option.items.tot_fat}} g</div>
								 <div class="col-md-3 text-left">{{option.items.tot_carb}} g</div>
								 <div class="col-md-3 text-left">{{option.items.tot_kcal}} kcal</div>
							  
							</div>
						</div>
					</div>
				<!--</span>-->
				<!-- end except NA category options -->	
					<!--<div class="col-md-1 col-md-offset-8">Total</div>
					<div class="col-md-1 col-md-offset-8">Total</div>
					<div class="col-md-1 col-md-offset-8">Total</div>
					<div class="col-md-1 col-md-offset-8">Total</div>-->
					<!-- for NA category options -->	
					  <!--<span ng-if="dietch.meal=='1' || dietch.meal=='3' || dietch.meal=='5' || dietch.meal=='7' || dietch.meal=='9'">
					    <div class="col-md-12">
							<div class="clearfix"></div>
							<hr class="" style="margin:5px 0;">
						 <div class="row">
							<div class="col-md-3"><b>Options</b></div>
							<div class="col-md-9"></div>
							<div class="clearfix"></div>
							<hr class="" style="margin:5px 0;">
						 </div>
					   </div>
						
						<div class="col-md-12" ng-repeat="option in dietch.options">
							
							<div class="row">
								 <div class="col-md-3" >{{$index+1}}</div>
  								 <div class="col-md-9 text-left">
  								  <span ng-repeat="optitem in option.items">	
  								           <span ng-if="optitem.macro_nut=='NA'">
  								                    <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
										  </span>
  								  </span>
							   </div>
						</div>
					  </div>	
					 </span>-->
				   <!-- end NA category options -->	 
					<div class="clearfix">&nbsp;</div>
					<div class="col-md-12" >
						<hr style="padding:0 5px; border:1px solid #1CAF9A;">
					</div>
				</div>
				<!--<div class="row">
					<div class="col-md-12">
						<h4 class="text-center"><b>Recommended Intake</b></h4>
						<div class="row">
							<div class="col-md-4 text-center"><b>Proteins</b></div>
							<div class="col-md-4 text-center"><b>Fats</b></div>
							<div class="col-md-4 text-center"><b>Carbs</b></div>
						</div>
						<hr class="dotted" style="margin:5px;"/>
						<div class="row">
							<div class="col-md-4 text-center">
								{{dietchart.recomm_intake.rec_protien}}
							</div>
							<div class="col-md-4 text-center">
								{{dietchart.recomm_intake.rec_fat}}
							</div>
							<div class="col-md-4 text-center">
								{{dietchart.recomm_intake.rec_carbs}}
							</div>
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="col-md-12">
						<hr style="padding:0 5px; border:1px solid #1CAF9A;">
					</div>
				</div>-->
				
				<div class="row" ng-show="dietchart.exercise">
					<div class="col-md-12">
						<h4 class="text-center"><b>The Nutritional Value Of Your Diet Chart</b></h4>
						<div class="clearfix"></div>
						<hr class="dotted" style="margin:5px 0;">
						<div class="row">
							<div class="col-md-3 text-center"><b>Calories</b></div>
							<div class="col-md-2 text-center"><b>Proteins</b></div>
							<div class="col-md-2 text-center"><b>Fats</b></div>
							<div class="col-md-2 text-center"><b>Carbs</b></div>
							<div class="col-md-3 text-center"><b>Calcium</b></div>
						</div>
						<hr class="" style="margin:5px;"/>
						<div class="row">
							<div class="col-md-3 text-center">
								{{dietchart.intake_chart.calories}} kcal
							</div>
							<div class="col-md-2 text-center">
								{{dietchart.intake_chart.protein}} g
							</div>
							<div class="col-md-2 text-center">
								{{dietchart.intake_chart.fats}} g
							</div>
							<div class="col-md-2 text-center">
								{{dietchart.intake_chart.carbs}} g
							</div>
							<div class="col-md-3 text-center">
								{{dietchart.intake_chart.calcium}} g
							</div>
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="col-md-12">
						<hr style="padding:0 5px; border:1px solid #1CAF9A;">
					</div>
				</div>
				
				
				
				<div class="row" ng-show="dietchart.exercise">
					<div class="col-md-12">
						<h4 class="text-center"><b>Exercise Schedule</b></h4>
						<div class="clearfix"></div>
						<hr class="dotted" style="margin:5px 0;">
						<div class="row">
							<div class="col-md-2 text-center"><b>Total CD</b></div>
							<div class="col-md-1 text-center"><b>Ex Def</b></div>
							<div class="col-md-2 text-center"><b>No. of days</b></div>
							<div class="col-md-2 text-center"><b>Total C Loss</b></div>
							<div class="col-md-1 text-center"><b>W.L</b></div>
							<div class="col-md-2 text-center"><b>Pogram</b></div>
							<div class="col-md-2 text-center"><b>No. of Weeks</b></div>
						</div>
						<hr class="" style="margin:5px;"/>
						<div class="row">
							<div class="col-md-2 text-center">
								{{dietchart.exercise.total_cd}}
							</div>
							<div class="col-md-1 text-center">
								{{dietchart.exercise.tot_ex_def}}
							</div>
							<div class="col-md-2 text-center">
								{{dietchart.exercise.exno_of_days}}
							</div>
							<div class="col-md-2 text-center">
								{{dietchart.exercise.total_closs}}
							</div>
							<div class="col-md-1 text-center">
								{{dietchart.exercise.weight_loss}}
							</div>
							<div class="col-md-2 text-center">
								{{dietchart.exercise.program}}
							</div>
							<div class="col-md-2 text-center">
								{{dietchart.exercise.exno_of_weeks}}
							</div>
						</div>
						<hr class="dotted" style="margin:5px 0;">
						<div class="row">
							<hr class="" style="margin:5px;"/>
							<div class="col-md-12 text-center">
								<table class="table">
									<thead>
										<th>&nbsp;</th>
										<th>TYPE OF EXERCISE</th>
										<th>DURATION</th>
									</thead>
									<tr ng-repeat="(key,value) in dietchart.exercise.exercises track by $index">
										<td class="rotate_text">{{exercise_text[key]}}</td>
										<td>
											<table class="table">
												<tr ng-repeat="item in value.items track by $index">
													<td>{{item.exercise_name}}</td>
													<td>{{item.duration}}</td>
												</tr>
											</table>
										</td>
									</tr>
									
								</table>
							</div>
							
							    <div class="col-md-12 text-center">
								<table class="table">
									<thead>
										<th>&nbsp;</th>
										<th>TONNING EXERCISE</th>
										<th>REPETITION</th>
									</thead>
									
									<tr>
										<td class="rotate_text">Anytime</td>
										<td>
											<table class="table">
												<tr ng-repeat="anyex in dietchart.exercise.exercise_anytime track by $index">
													<td>{{anyex.exercise_name}}</td>
													<td>{{anyex.repetition}}</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							   </div>
						
						
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<hr style="padding:0 5px; border:1px solid #1CAF9A;">
					</div>
				</div>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->