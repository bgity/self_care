<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#/heightWeight">Height Weight Master</a>
		</li>
	</ul>
	<div class="page-toolbar">
		<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addNewView();">Add New</button>
	</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN MAIN CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-institution"></i>Height Weight Master
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body hwmaster">
				<div class="table-responsive">
					<table class="table">
					<thead>
					<tr>
						<th rowspan="2">
							Age
						</th>
						<th colspan="3" class="text-center">
							Boys
						</th>
						<th colspan="3" class="text-center">
							Girls
						</th>
						
					</tr>
					<tr>
						<th class="text-center">
							Height(cms)
						</th>
						<th class="text-center">
							Weight(kg)
						</th>
						<th>&nbsp;</th>
						<th class="text-center">
							Height(cms)
						</th>
						<th class="text-center">
							Weight(kg)
						</th>
					</tr>	
					</thead>
					<tbody>
					<tr ng-repeat="(key, value) in hwmasters">
						<td>
							{{key}}
						</td>
						<td class="text-center">
							<span editable-text="value[0].height_in_cms" e-name="height_in_cms" e-form="rowform" e-required>
							  {{value[0].height_in_cms}}
							</span>
						</td>
						<td class="text-center">
							<span editable-text="value[0].weight_in_kgs" e-name="weight_in_kgs" e-form="rowform" e-required>
							  {{value[0].weight_in_kgs}}
							</span>
						</td>
						<td style="white-space: nowrap">
							<!-- form -->
							<form editable-form name="rowform" onbeforesave="saveDet($data, value[0].id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="inserted == value">
							  <button type="submit" ng-disabled="rowform.$waiting" class="fa fa-save"></button>
							  <a type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="fa fa-times"></a>
							</form>
							<div class="buttons" ng-show="!rowform.$visible">
							  <a  ng-click="rowform.$show()"><i class="fa fa-edit"></i></a>
							</div>  
						</td>
						<td class="text-center">
							<span editable-text="value[1].height_in_cms" e-name="height_in_cms" e-form="growform" e-required>
							  {{value[1].height_in_cms}}
							</span>
						</td>
						<td class="text-center">
							<span editable-text="value[1].weight_in_kgs" e-name="weight_in_kgs" e-form="growform" e-required>
							  {{value[1].weight_in_kgs}}
							</span>
						</td>
						<td style="white-space: nowrap">
							<!-- form -->
							<form editable-form name="growform" onbeforesave="saveDet($data, value[1].id)" ng-show="growform.$visible" class="form-buttons form-inline" shown="inserted == value">
							  <button type="submit" ng-disabled="growform.$waiting" class="fa fa-save"></button>
							  <a type="button" ng-disabled="growform.$waiting" ng-click="growform.$cancel()" class="fa fa-times"></a>
							</form>
							<div class="buttons" ng-show="!growform.$visible && value[1].height_in_cms">
							  <a  ng-click="growform.$show()"><i class="fa fa-edit"></i></a>
							</div>  
						</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->