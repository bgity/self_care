<div class="text-center create_plan" ng-show="!plan_opt">
    <h3 class="text-center main_head">Step 1 - Select Meals</h3>
	<div class="col-md-3"></div>
	<div class="col-md-6 blockwise">
		<div class="table-responsive">
			<table class="table">
			<thead>
			<tr>
				<th>
					<input type="checkbox" class="regular-checkbox" ng-model="$parent.selectedAll" ng-change="checkAll()" />
					 Select All
				</th>
				<th colspan="2" class="text-center">
					 Time
				</th>
			</tr>
			</thead>
			<tbody>
			<tr ng-repeat="meal in meals track by $index">
				<td class="text-left">
					<input type="checkbox" id="{{ meal.id}}" class="regular-checkbox" ng-model="meal.checked" ng-click="checkedRow(meal.id)" />
					{{meal.name}}
				</td>
				<td class="text-left">{{nospinners}}
					<timepicker ng-model="formData.meals[$index].start_time" hour-step="hstep" minute-step="mstep" show-meridian="ismeridian" ng-change="dateChange($index)" show-spinners="false" arrowkeys="false"></timepicker>
				</td>
				<td class="text-left">{{nospinners}}
					<timepicker ng-model="formData.meals[$index].end_time" hour-step="hstep" minute-step="mstep" show-meridian="ismeridian" ng-change="dateChange($index)" show-spinners="false" arrowkeys="false"></timepicker>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-3"></div>
	<div class="clearfix">&nbsp;</div>
	<div class="pull-right">
		<a class="btn btn-primary green" ng-click="plan_opt=true;">Next</a>
	</div>
</div>

<div class="text-center" ng-show="plan_opt" style="position:relative;">
    <h3 class="text-center main_head">Step 2 - Diet Plan</h3>
	<a class="btn btn-xs yellow-gold pull-right" style="margin-bottom:10px;position:absolute; right:0; top:0; line-height:38px;" ng-click="showGuidelines(formData.diseases)">Guidelines</a>
	<div class="col-md-3 blockwise padding_zero">
		<h4>Selected Exchanges</h4>
		<div class="table-responsive">
			<table class="table">
			<thead>
			<tr>
				<th>
					Categories
				</th>
				<th>
					 No. of Serving
				</th>
			</tr>
			</thead>
			<tbody>
			<tr ng-repeat="lfood in foods" ng-if="formData.foods[$index].no_of_serving !=0 && formData.foods[$index].no_of_serving">
				<td class="text-left" >
					{{lfood.name}}
				</td>
				<td class="text-center">
					{{formData.foods[$index].no_of_serving}}
				</td>
			</tr>
			
			</tbody>
			</table>
		</div>
	</div>
	
	<div class="col-md-8 blockwise padding_zero" style="float:right;"">
		<!-- if existing user than -->	
		<div class="row" ng-if="ex_user>0 && lenmeal!=0" ng-repeat="(ky,meal_opt) in  mealopts ">	
			
			<div class="col-md-12" style="margin-bottom:10px;">
				<h4>{{meal_opt.name}}&nbsp;&nbsp;&nbsp;Time:{{formData.meals[ky-1].start_time | date:'shortTime'}} - {{formData.meals[ky-1].end_time | date:'shortTime'}}</h4>
				<br/>
				<div  ng-repeat="(key,value) in filteredopt = meal_opt.options track by $index">
				   
					<div class="text-left ng-scope" id="row{{ky}}_{{key}}" style="padding-left:10px;">
						
						<table width='100%' cellspacing='0' cellpadding='0' border='0'>
							<tr>
								<td width="7%" valign="top">
									<label>Option:&nbsp;</label>
								</td>
								<td>
									<span ng-repeat = "(kk,items) in itemsop = value track by $index" id="col{{ky}}_{{key}}_{{$index}}" style="padding:5px; display:inline-block;">
									   <input type="text"  class="form-control input-inline input-small" 
										   ng-model="formData.fooditems[ky]['options'][key][$index].item" 
										   typeahead="fooditem.name for fooditem  in getFitems($viewValue)" 
										   typeahead-template-url="typeahead-item.html"  
										   typeahead-editable="false" >
									   <input type="text" placeholder="Exch" ng-model="formData.fooditems[ky]['options'][key][$index].exch" class="form-control input-inline input-xsmall amt_input">
									   <a ng-click='delOpItem(ky,key,$index,"options")' ng-if="$index>0"><i class='fa fa-times'></i></a>
									   &nbsp;&nbsp;
									</span> 
								   <span id="optionItem{{ky}}_{{key}}"></span>
								   <button type="button" class="btn btn-xs blue" addoptitema checkedi="{{ky}}" checkopt="{{key}}" countitm="{{itemsop.length}}">Add</button>
								   
								   <div class='clearfix'>&nbsp;</div>
								   <a class='btn btn-xs red pull-left' ng-click="delOpt(ky,key)" ng-if="key>0"><i class='fa fa-times'>Del</i></a>
								</td>
							</tr>
						</table>
						 
						
				   </div>
			   
			  </div>
			  
			<div id="space-for-newrows{{ky}}"></div>
			<button type="button" class="btn btn-xs blue" addbuttonsa checkedm="{{ky}}" countopt="{{filteredopt.length}}">Add Option</button>
			<div class="clearfix">&nbsp;</div>
			<div class="col-md-12">
				<a class="btn btn-primary yellow btn-xs pull-right" ng-click="showNote = !showNote">Add Notes</a>
			</div>
			<div class="col-md-12" ng-show="showNote">
				<textarea class="form-control" ng-model="formData.fooditems[ky].notes" placeholder="Type your message here"></textarea>
			</div>
				<div class="clearfix">&nbsp;</div>
			</div>
	  </div>
		<!--end loop -->  
		<!-- end existing user -->
		<!-- for new user -->
	    
		<div class="row" ng-if="lenmeal==0" ng-repeat="diet_meal in filtered = ( checkedIndexs | orderBy )">
			<div class="col-md-12" style="margin-bottom:10px;">
				<h4>{{meals[diet_meal-1].name}}&nbsp;&nbsp;&nbsp;Time:{{formData.meals[diet_meal-1].start_time | date:'shortTime'}} - {{formData.meals[diet_meal-1].end_time | date:'shortTime'}}</h4>
				<hr class="dotted" style="margin:5px 0;">
				<div class="text-left optioncl" style="padding-left:10px;">
					<table width='100%' cellspacing='0' cellpadding='0' border='0'>
						<tr>
							<td width="7%" valign="top">
								<label>Option:&nbsp;</label>
							</td>
							<td>
								<span style="padding:5px; display:inline-block;">
									<input type="text" class="form-control input-inline input-small" 
									ng-model="formData.fooditems[meals[diet_meal-1].id]['options'][1][0].item"
									typeahead="fooditem.name for fooditem in getFitems($viewValue)"
									typeahead-template-url="typeahead-item.html" 
									typeahead-editable="false" />
									<input type="text" placeholder="Exch" ng-model="formData.fooditems[meals[diet_meal-1].id]['options'][1][0].exch" class="form-control input-inline input-xsmall amt_input">&nbsp;&nbsp;
								</span>	
								<span id="optionItem{{meals[diet_meal-1].id}}_1"></span>
								<button type="button" class="btn btn-xs blue" addoptitem checkedi="{{meals[diet_meal-1].id}}" checkopt="1">Add</button>
								<div class="clearfix">&nbsp;</div>
								
							</td>
						</tr>
					</table>
				</div>
				
				<div id="space-for-newrows{{meals[diet_meal-1].id}}"></div>
				<button type="button" class="btn btn-xs blue" addbuttons checkedm="{{meals[diet_meal-1].id}}">Add Option</button>
				<div class="clearfix">&nbsp;</div>
				<div class="col-md-12">
					<a class="btn btn-primary yellow btn-xs pull-right" ng-click="showNote = !showNote">Add Notes</a>
				</div>
				<div class="col-md-12" ng-show="showNote">
					<textarea class="form-control" ng-model="formData.fooditems[meals[diet_meal-1].id].notes" placeholder="Type your message here"></textarea>
				</div>
				<div class="clearfix">&nbsp;</div>
			</div>
			
		</div>
	</div>
	
<!--	<div class="col-md-12">
			 <h3>Exercises</h3>
			 <div class="col-md-4 form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-6 text-right control-label">Total CD:</label>
						<div class="col-md-4"><input type="text" class="form-control input-inline input-xsmall" name="total_cd" ng-model="formData.total_cd" ng-disabled="true"></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 text-right control-label">Ex Def:</label>
						<div class="col-md-4"><input id="tot_ex_def" type="text" class="form-control input-inline input-xsmall" name="tot_ex_def" ng-model="formData.tot_ex_def" value="{{ex_sum(formData.exercises)}}" ng-disabled="true"></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 text-right control-label">No. of Days:</label>
						<div class="col-md-4"><input id="exno_of_days" type="text" class="form-control input-inline input-xsmall" name="exno_of_days" ng-model="formData.exno_of_days"></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 text-right control-label">Total C loss:</label>
						<div class="col-md-4"><input id="total_closs" type="text" class="form-control input-inline input-xsmall" name="total_closs" ng-model="formData.total_closs" ng-disabled="true"></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 text-right control-label">W.L</label>
						<div class="col-md-4"><input id="weight_loss" type="text" class="form-control input-inline input-xsmall" name="weight_loss" ng-model="formData.weight_loss" ng-disabled="true"></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 text-right control-label">Program:</label>
						<div class="col-md-4"><input id="program" type="text" class="form-control input-inline input-xsmall" name="program" ng-model="formData.program"></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 text-right control-label">No. of Weeks:</label>
						<div class="col-md-4"><input id="exno_of_weeks" type="text" class="form-control input-inline input-xsmall" name="exno_of_weeks" ng-model="formData.exno_of_weeks" ng-disabled="true"></div>
					</div>
				</div>
			 </div>
			 <div class="col-md-8">
				<div class="form-group">
					<table class="table table-bordered table-striped table-condensed flip-content">
						<thead class="flip-content">
							<th>Exercise</th>
							<th>Ex Def</th>
							<th>&nbsp;</th>
						</thead>
						<tbody>
							<tr ng-repeat="exercise in resultValue = (formData.exercises) track by $index">
								<td>
									<input type="text" class="form-control input-inline input-small" placeholder="" ng-model="formData.exercises[$index].exercise_name" name="exercise_name" id="exercise_name" />
								</td>
								<td>
									<input type="text" class="form-control input-inline input-xsmall" placeholder="" ng-model="formData.exercises[$index].ex_def" name="ex_def" id="ex_def" />
								</td>
								<td>
									<a type="button" class="btn btn-xs red" ng-click="formData.exercises.splice(i, 1);">Del<i class="fa fa-times"></i></a>
								</td>
							</tr>
							<tr>
								<td colspan="4" class="text-left"><a class="btn btn-xs green" ng-click="addExercises(formData)">Add<i class="fa fa-plus"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			 </div>
		</div>-->
		
	<div class="clearfix">&nbsp;</div>
	<div class="pull-right" style="margin-top:10px;">		
		<a class="btn btn-primary green" ng-click="selectedTemplate.path = 'diet/scheduleExercise';setTab('exercise');">Next</a>
	</div>
	<!--<div class="pull-right" ng-if="formData.programe_type.id==3">
         <button class="btn btn-primary green">Submit</button>
	</div>-->
	
	
	
	
	
</div>
<script type="text/ng-template" id="typeahead-item.html">
      <div class="typeahead-group-header" ng-if="match.model.firstInGroup">{{match.model.category_name}}</div>
      <a>
        <span ng-bind-html="match.label | typeaheadHighlight:query"></span>
      </a>
</script>
	