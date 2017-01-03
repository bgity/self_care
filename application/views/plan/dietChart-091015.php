<!-- BEGIN PAGE HEADER-->
<div class="page-bar text-right">
	<a class="btn btn-primary btn-sm" href="diet/downloadPDF/{{dietchart.main.id}}/{{dietchart.recomm_intake.id}}">Download</a>
	<button type="button" class="btn btn-primary btn-sm" ng-click="printDiv('chart_div');"><i class="fa fa-print"></i> Print</button>
	<button type="button" class="btn btn-primary btn-sm" ng-click="sendMail();"><i class="fa fa-envelope"></i> Email</button>
	<button type="button" class="btn btn-primary btn-sm" ng-click="goCreateChart(dietId,planId)"><i class="fa fa-edit"></i> Edit</button>
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
				<div class="row">
					<div class="col-md-6">
						<h4>{{dietchart.main.first_name}}</h4>
					</div>
					<div class="col-md-6">
						<h4>File No:{{dietchart.main.file_no}}</h4>
					</div>
					<div class="col-md-12">
						<hr style="border:2px solid #1CAF9A;">
					</div>
				</div>
				<div class="row" ng-repeat="dietch in dietchart.meals">
					 <div class="col-md-12 text-center">
						<div class="col-md-12 "><h4><b>{{dietch.meal_name}} : {{dietch.start_time | date:'shortTime'}} - {{dietch.end_time | date:'shortTime'}}</b></h4></div>
						<div class="clearfix"></div>
						
					</div>
				<!-- start except for NA category options -->	
			    <span ng-if="dietch.meal=='2' || dietch.meal=='4' || dietch.meal=='6' || dietch.meal=='8'">		
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
								<div class="col-md-3"><b>Options</b></div>
								<div class="col-md-3"><b>Carbs</b></div>
								<div class="col-md-3"><b>Proteins</b></div>
								<div class="col-md-3"><b>Fats</b></div>
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
								<div class="col-md-3" >{{$index+1}}</div>								 
								<span ng-if="option.items.nut_count=='1'">
									
								 <div class="col-md-3" id='carbs'>
								  <span ng-repeat="optitem in option.items">	
								  <span ng-if="optitem.macro_nut=='CARBS'"><span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas}}</span>
								                                <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br></span>
								  </span>
								 </div>
								 
								 <div class="col-md-3" id='prot'>
								  <span ng-repeat="optitem in option.items">	
								  <span ng-if="optitem.macro_nut=='PROTEIN'"><span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas}}</span> 
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br></span>
								  </span>
								 </div>
								 
								 <div class="col-md-3" id='fat'>
								  <span ng-repeat="optitem in option.items">	
								  <span ng-if="optitem.macro_nut=='FATS'"><span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas}}</span> 
								                              <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br></span>
								  </span>
								 </div>
							  </span>
							  
								<span ng-if="option.items.nut_count=='2'">
								 <div class="col-md-6 text-center" id='carbsp' >
								  <span ng-repeat="optitem in option.items">	
								   <span ng-if="optitem.macro_nut==('PROTEIN,CARBS' || optitem.macro_nut=='CARBS,PROTEIN') && optitem.exchange==''">
									   
									                           <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas}}</span>
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
									</span>
															   
								   
								    <span ng-if="optitem.exchange!=''">
									  {{optitem.text_exchange}}
								    </spna>
								  </span>
								 </div>
								 
								 <div class="col-md-3" id='prot'>
								  <span ng-repeat="optitem in option.items">	
								   <span ng-if="optitem.macro_nut=='FATS'">
									  <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas}}</span> 
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
								   </span>								   
															   
								  </span>
								 </div>								 								 
							  </span>
							  
								<span ng-if="option.items.nut_count=='3'">
								 <div class="col-md-9 text-center" id='carbspf' >
								  <span ng-repeat="optitem in option.items" >
									  <span ng-if="optitem.exchange==''">									  
									                           <span ng-if="optitem.calc_base=='cup' || optitem.calc_base=='gms' || optitem.calc_base=='Cup cooked' || optitem.calc_base=='Ml'">{{optitem.amount * optitem.cup_meas}}</span>
								                               <span ng-if="optitem.calc_base=='Number' || optitem.calc_base=='Tbs' || optitem.calc_base=='Tsp' || optitem.calc_base=='Pint' || optitem.calc_base=='Glass'">{{optitem.amount}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
									  </span>
								     <span ng-if="optitem.exchange!=''">
									  {{optitem.text_exchange}}
								     </spna>						   
								  </span>
								 </div>								 								 								 
							   </span>
								 
	                            
									 
							</div>
							
						</div>
						<div class="col-md-3">
							<div class="row">
								
								 <div class="col-md-3 text-left">{{option.items.tot_prot}} g</div>
								 <div class="col-md-3 text-left">{{option.items.tot_fat}} g</div>
								 <div class="col-md-3 text-left">{{option.items.tot_carb}} </div>
								 <div class="col-md-3 text-left">{{option.items.tot_kcal}} kcal</div>
							  
							</div>
						</div>
					</div>
				</span>
				<!-- end except NA category options -->	
					<!--<div class="col-md-1 col-md-offset-8">Total</div>
					<div class="col-md-1 col-md-offset-8">Total</div>
					<div class="col-md-1 col-md-offset-8">Total</div>
					<div class="col-md-1 col-md-offset-8">Total</div>-->
					<!-- for NA category options -->	
					  <span ng-if="dietch.meal=='1' || dietch.meal=='3' || dietch.meal=='5' || dietch.meal=='7' || dietch.meal=='9'">
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
  								                    <span ng-if="optitem.calc_base=='cup'">{{optitem.amount * optitem.cup_meas}}</span> {{optitem.calc_base}} of {{optitem.food_item}} </br>
										  </span>
  								  </span>
							   </div>
						</div>
					  </div>	
					 </span>
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
				
				<div class="row">
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
				
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-center"><b>Guidelines</b></h4>
						<h5 class="text-center"><b>General Guidelines</b></h5>
						<hr class="dotted" style="margin:5px 0;">
						<div class="col-md-12">
							<div class="col-md-12" ng-repeat="general in dietchart.gen_guidelines">
							{{$index+1}}. {{general.recommendation}}
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
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->