<div class="form-group text-center intk_top"> 
	Proteins: <input type="text" class="form-control input-inline input-xsmall blk" name="rec_protien" ng-model="formData.rec_protien" ng-disabled="true">
    Fats: <input type="text" class="form-control input-inline input-xsmall blk" name="rec_fat" ng-model="formData.rec_fat" ng-disabled="true">
    Carbs: <input type="text" class="form-control input-inline input-xsmall blk" name="rec_carbs" ng-model="formData.rec_carbs" ng-disabled="true">
	ICC %: <input type="text" class="form-control input-inline input-xsmall blk" name="icc_adjusted" ng-model="formData.icc_adjusted" ng-disabled="true">
    Total CD: <input type="text" class="form-control input-inline input-xsmall" name="total_cd" ng-model="formData.total_cd" ng-disabled="true">	
</div>
<h3 class="text-center main_head">Intake Chart</h3>
 <div class="portlet-body">
   
		<table class="table">
		<thead>
		<tr>
			<th width="25%">
				 Categories
			</th>
			<th  width="10%">
				 No. of Serving
			</th>
			<th width="15%">
				 Amt/Serving
			</th>
			<th width="10%">
				 Protein
			</th>
			<th width="10%">
				 Fat
			</th>
			<th width="10%">
				 Carbs
			</th>
			<th width="10%">
				 Calories
			</th>
			<th width="10%">
				 Calcium
			</th>
		</tr>
		</thead>
		</table>
	   <div class="table-responsive" style="height:400px">
		<table class="table tblnew">
		<tbody>
		<tr ng-repeat="food in filtered = ( foods )" >
			<td width="25%">
				{{food.name}}
			</td>
			<td width="10%">
				<input class="form-control input-xsmall" type="text" name="no_of_serving" ng-model="formData.foods[$index].no_of_serving" value="0" ng-change="updateIntake($index)" />
			</td>
			<td width="15%">
				{{food.weight_per_serving}}
			</td>
			<td width="10%">
				 <input class="form-control input-inline input-xsmall" type="text" ng-model="formData.foods[$index].prot_per_serving" ng-disabled=true />
			</td>
			<td width="10%">
				 <input class="form-control input-inline input-xsmall" type="text" ng-model="formData.foods[$index].fat_per_serving" ng-disabled=true />
			</td>
			<td width="10%">
				 <input class="form-control input-inline input-xsmall" type="text" ng-model="formData.foods[$index].chol_per_serving" ng-disabled=true />
			</td>
			<td width="10%">
				 <input class="form-control input-inline input-xsmall" type="text" ng-model="formData.foods[$index].calo_per_serving" ng-disabled=true />
			</td>
			<td width="10%">
				 <input class="form-control input-inline input-xsmall" type="text" ng-model="formData.foods[$index].calc_per_serving" ng-disabled=true />
			</td>
		</tr>
		
		</tbody>
		</table>
		
		
	</div>
	<table class="table">
		 <tr>
			<td width="25%">&nbsp;</td>
			<td  width="10%"></td>
			<td width="15%"><b>Total</b></td>
			<td width="10%"><b>{{prot_tot | number:2}}</b></td>
			<td width="10%"><b>{{fat_tot | number:2}}</b></td>
			<td width="10%"><b>{{chol_tot | number:2}}</b></td>
			<td width="10%"><b>{{calo_tot | number:2}}</b></td>
			<td width="10%"><b>{{calc_tot | number:2}}</b></td>
		</tr>
	</table>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<a class="btn btn-primary green" ng-click="selectedTemplate.path = 'diet/mealExchange';setTab('meal');">Next</a>
			</div>
		</div>
	</div>
</div>