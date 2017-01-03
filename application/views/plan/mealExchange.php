<div class="text-center">
    <h3 class="text-center main_head">Meal Exchange</h3>
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
	<div class="col-md-4 blockwise padding_zero">
		<h4>Calories</h4>
		<div class="table-responsive ctable">
			<table class="table">
			<thead>
			<tr>
				<th>
					&nbsp;
				</th>
				<th>
					BF
				</th>
				<th>
					Lunch
				</th>
				<th>
					Snack
				</th>
				<th>
					Dinner
				</th>
			</tr>
			</thead>
			<tbody>
			<tr ng-repeat="calorie in filtered = (calories)">
				<td class="col-md-2" style="padding-top:50px;">
					{{calorie.name}}
				</td>
				<td class="col-md-2 text-center" >
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].bf" onfocus="if(this.value == '0') { this.value = ''; }"/></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].bf_val" ng-disabled=true ng-value="formData.calories[$index].bf*calorie.mult" ng-if="$index !=2"  />
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].bf_val" ng-disabled=true ng-value="formData.calories[$index].bf*0" ng-if="$index ==2" />
					</div>
				</td>
				<td class="col-md-2 text-center">
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].lunch" onfocus="if(this.value == '0') { this.value = ''; }" /></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].lunch_val" ng-disabled=true  ng-value="formData.calories[$index].lunch*calorie.mult" />
					</div>
				</td>
				<td class="col-md-2 text-center" >
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].snack" onfocus="if(this.value == '0') { this.value = ''; }" /></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].snack_val" ng-disabled=true ng-value="formData.calories[$index].snack*calorie.mult" ng-if="$index !=2" />
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].snack_val" ng-disabled=true ng-value="formData.calories[$index].snack*0" ng-if="$index ==2" />
					</div>
				</td>
				<td class="col-md-2 text-center">
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].dinner" onfocus="if(this.value == '0') { this.value = ''; }"/></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.calories[$index].dinner_val" ng-disabled=true ng-value="formData.calories[$index].dinner*calorie.mult" />
					</div>
				</td>
			</tr>
			<tr>
				<td><b>Total</b></td>
				<td><b>{{calculateSum('bf')}}</b></td>
				<td><b>{{calculateSum('lunch')}}</b></td>
				<td><b>{{calculateSum('snack')}}</b></td>
				<td><b>{{calculateSum('dinner')}}</b></td>
			</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-4 blockwise padding_zero">
		<h4>Proteins</h4>
		<div class="table-responsive ctable">
			<table class="table">
			<thead>
			<tr>
				<th>
					&nbsp;
				</th>
				<th>
					BF
				</th>
				<th>
					Lunch
				</th>
				<th>
					Snack
				</th>
				<th>
					Dinner
				</th>
			</tr>
			</thead>
			<tbody>
			<tr ng-repeat="prot in prots">
				<td class="col-md-2" style="padding-top:50px;">
					{{prot.value}}
				</td>
				<td class="col-md-2 text-center" >
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].bf" onfocus="if(this.value == '0') { this.value = ''; }"/></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].bf_val" ng-disabled=true  ng-value="formData.calories[$index].bf*prot.mult" ng-if="$index != 3" />
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].bf_val" ng-disabled=true  ng-value="formData.calories[$index].bf*0" ng-if="$index == 3" />
					</div>
				</td>
				<td class="col-md-2 text-center">
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].lunch" onfocus="if(this.value == '0') { this.value = ''; }" /></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].lunch_val" ng-disabled=true  ng-value="formData.calories[$index].lunch*prot.mult" ng-if="$index !=3" />
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].lunch_val" ng-disabled=true  ng-value="formData.calories[$index].lunch*0" ng-if="$index == 3" />
					</div>
				</td>
				<td class="col-md-2 text-center" >
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].snack" onfocus="if(this.value == '0') { this.value = ''; }" /></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].snack_val" ng-disabled=true  ng-value="formData.calories[$index].snack*prot.mult" ng-if="$index != 3" />
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].snack_val" ng-disabled=true  ng-value="formData.calories[$index].snack*0" ng-if="$index == 3" />
					</div>
				</td>
				<td class="col-md-2 text-center">
					<div class="row"><input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].dinner" onfocus="if(this.value == '0') { this.value = ''; }" /></div>
					<div class="row">
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].dinner_val" ng-disabled=true  ng-value="formData.calories[$index].dinner*prot.mult" ng-if="$index != 3" />
						<input class="form-control input-inline input-xsmall" type="text" ng-model="formData.prots[$index].dinner_val" ng-disabled=true  ng-value="formData.calories[$index].dinner*0" ng-if="$index == 3" />
					</div>
				</td>
			</tr>
			<tr>
				<td><b>Total</b></td>
				<td><b>{{calculateProtSum('bf')}}</b></td>
				<td><b>{{calculateProtSum('lunch')}}</b></td>
				<td><b>{{calculateProtSum('snack')}}</b></td>
				<td><b>{{calculateProtSum('dinner')}}</b></td>
			</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<a class="btn btn-primary green" ng-click="selectedTemplate.path = 'diet/createPlans';setTab('plan');">Next</a>
			</div>
		</div>
	</div>
</div>
