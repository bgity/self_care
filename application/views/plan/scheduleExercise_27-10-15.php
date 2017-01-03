<div class="text-center"  ng-if="formData.programe_type.id==3">
  Exercise Not Availabe For this Programe
</div>
<div class="text-center"  ng-if="formData.programe_type.id!=3">
    <h3>Schedule Exercise</h3>
	
	<div class="col-md-12">
			 <div class="col-md-4 form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-6 text-right control-label">Total CD:</label>
						<div class="col-md-4"><input type="text" class="form-control input-inline input-xsmall" name="total_cd" ng-model="formData.total_cd" ng-disabled="true"></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 text-right control-label">Ex Def:</label>
						<div class="col-md-4"><input id="tot_ex_def" type="text" class="form-control input-inline input-xsmall" name="tot_ex_def" ng-model="formData.tot_ex_def" value="{{ex_sum_new(formData.exercise_new)}}" ng-disabled="true"></div>
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
			 <div class="col-md-8" ng-repeat="(key,value) in formData.exercise_new " style="outline:1px solid #7ca7cc; margin-bottom:10px;float:right;">
				<h4>{{exercise_options[key-1].name}}</h4>
				<div class="form-group">
					<table class="table table-bordered table-striped table-condensed flip-content">
						<thead class="flip-content">
							<th>Exercise</th>
							<th>Duration</th>
							<th>Ex Def</th>
							<th>&nbsp;</th>
						</thead>
						<tbody>
						<!--<tr ng-repeat="(optkey,optval) in value track by $index">
						  <td colspan="4">
						    <table class="table">
							 <tr ng-repeat="exercise in optval.items track by $index">
								<td>
									<input type="text" class="form-control input-inline input-small" placeholder="" 
									      ng-model="formData.exercise_new[key][optkey].items[$index].exercise_name" 
										  name="exercise_name" 
										  id="exercise_name" 
										  typeahead="exrc.desc for exrc in exercisess | filter:$viewValue"
										  typeahead-on-select="updateDef(formData.exercise_new[key][optkey].items[$index].exercise_name,key,optkey,$index)"
										  />
														
								</td>
								<td>
									<input type="text" class="form-control input-inline input-xsmall" placeholder="" ng-model="formData.exercise_new[key][optkey].items[$index].duration" name="duration" id="duration" ng-change="updateTimeDef(formData.exercise_new[key][optkey].items[$index].exercise_name,key,optkey,$index)" />
								</td>
								<td>
									<input type="text" class="form-control input-inline input-xsmall" placeholder="" ng-model="formData.exercise_new[key][optkey].items[$index].ex_def" name="ex_def" id="ex_def" />
								</td>
								<td>
									<a type="button" class="btn btn-xs red" ng-click="formData.exercise_new[key][optkey].items.splice($index, 1);">Del<i class="fa fa-times"></i></a>
								</td>
							</tr>
							
							<tr>
								<td colspan="4" class="text-left"><a type="button" class="btn btn-xs green" ng-click="addExercise(formData, key,optkey	)">Add<i class="fa fa-plus"></i></a></td>
							</tr>
						   </table>
						  </td>
						</tr>
							<tr>
								<td colspan="4" class="text-left"><a type="button" class="btn btn-xs green" ng-click="addExerciseOption(formData, key,excount)">Add Option<i class="fa fa-plus"></i></a></td>
							</tr>-->
									
								
										 <tr ng-repeat="exercise in value.items track by $index">
											<td class="text-left">
												<input type="text" class="form-control input-inline input-large" placeholder="" 
													  ng-model="formData.exercise_new[key].items[$index].exercise_name" 
													  name="exercise_name" 
													  id="exercise_name" 
													  typeahead="exrc.desc for exrc in exercisess | filter:$viewValue"
													  typeahead-on-select="updateDef(formData.exercise_new[key].items[$index].exercise_name,key,$index)"
													   autocomplete="off" />
																	
											</td>
											<td class="text-left">
												<input type="text" class="form-control input-inline input-xsmall" placeholder="" ng-model="formData.exercise_new[key].items[$index].duration" name="duration" id="duration" ng-change="updateTimeDef(formData.exercise_new[key].items[$index].exercise_name,key,$index)"  autocomplete="off"/>
											</td>
											<td class="text-left">
												<input type="text" class="form-control input-inline input-xsmall" placeholder="" ng-model="formData.exercise_new[key].items[$index].ex_def" name="ex_def" id="ex_def"  autocomplete="off"/>
											</td>
											<td>
												<a type="button" class="btn btn-xs red" ng-click="formData.exercise_new[key].items.splice($index, 1);">Del<i class="fa fa-times"></i></a>
											</td>
										</tr>
										
										<tr>
											<td colspan="4" class="text-left"><a type="button" class="btn btn-xs green" ng-click="addExercise(formData, key)">Add<i class="fa fa-plus"></i></a></td>
										</tr>
									
						</tbody>
					</table>
				</div>
			 </div>
			 <!-- start anytime -->
			                <div class="col-md-8" style="outline:1px solid #7ca7cc; margin-bottom:10px;float:right;">
								<h4>Anytime</h4>
								
								<div class="form-group">
									<table class="table table-bordered table-striped table-condensed flip-content">
										<thead class="flip-content">
											<th>Tonning Exercise</th>
											<th>Repetition</th>
											<th>&nbsp;</th>
										</thead>
										<tbody>
											<tr ng-repeat="exercise_any in resultValue = (formData.exercise_anytime) track by $index">
												<td class="text-left">
													<input type="text" class="form-control input-inline input-large" placeholder="" 
														  ng-model="formData.exercise_anytime[$index].exercise_name" 
														  name="exercise_name" 
														  id="exercise_name" 														  
														   autocomplete="off" />
												</td>
												<td class="text-left">
													<input type="text" class="form-control input-inline input-xsmall" placeholder="" ng-model="formData.exercise_anytime[$index].repetition" name="repetition" id="repetition"  autocomplete="off"/>
												</td>
												<td>
													<a type="button" class="btn btn-xs red" ng-click="formData.exercise_anytime.splice(i, 1);">Del<i class="fa fa-times"></i></a>
												</td>
												
											</tr>
											<tr>
												<td colspan="4" class="text-left"><a type="button" class="btn btn-xs green" ng-click="addExerciseAny(formData)">Add<i class="fa fa-plus"></i></a></td>
											</tr>
										</tbody>
									</table>
				            </div>
			         </div>
			 <!-- end enytime -->
			 
		</div>
	
	<div class="clearfix">&nbsp;</div>
	<div class="pull-right">
		<button class="btn btn-primary green">Submit</button>
	</div>
</div>
	