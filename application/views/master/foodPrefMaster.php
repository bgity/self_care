<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#/foodMaster">Food Preference Master</a>
		</li>
	</ul>
	<div class="page-toolbar">
		<!--<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addNewView();">Add New</button>-->
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
					<i class="fa fa-institution"></i>Food Preference Master
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" ng-model="search.sdesc" ng-change="filter()"></label>
						</div>
					</div>
					<div class="col-md-6">
						<label class="pull-right">Limit:
						<select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions"></select>
						</label>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th ng-click="sort_by('sdesc');">
							Short Description<span class="glyphicon sort-icon" ng-show="predicate=='sdesc'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
						</th>
						<th class="text-center">
							Long Description
						</th>
						<th class="text-center">
							Created on
						</th>
						<th class="text-center">
							Edited on
						</th>
						<th>
							&nbsp;
						</th>
					</tr>
					</thead>
					<tbody>
					<tr ng-repeat="foodpf in filtered = (foodpfs | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
						<td>
							<span editable-text="foodpf.sdesc" e-name="sdesc" e-form="rowform" e-required>
							  {{foodpf.sdesc}}
							</span>
						</td>
						<td class="text-center">
							<span editable-textarea="foodpf.ldesc" e-name="ldesc" e-form="rowform" e-required>
							  {{foodpf.ldesc}}
							</span>
						</td>
						<td class="text-center">
						{{foodpf.created_date}}
						</td>
						<td class="text-center">
						{{foodpf.edited_date}}
						</td>
						<td style="white-space: nowrap">
							<!-- form -->
							<form editable-form name="rowform" onbeforesave="saveDet($data, foodpf.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="inserted == foodpf">
							  <button type="submit" ng-disabled="rowform.$waiting" class="fa fa-save"></button>
							  <a type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="fa fa-times"></a>
							</form>
							<div class="buttons" ng-show="!rowform.$visible">
							  <a ng-click="rowform.$show()"><i class="fa fa-edit"></i></a>
							  <a ng-click="removeFoodpf($index, foodpf.id, foodpf.sdesc)"><i class="fa fa-trash"></i></a>
							</div>  
						</td>
					</tr>
					</tbody>
					</table>
					<div class="pagi_wrap" ng-show="filteredItems > itemsPerPage">
						<div class="dataTables_paginate paging_simple_numbers" style="float:right;">                                                                              
						<pagination on-select-page="setPage(page)" total-items="filteredItems" items-per-page="itemsPerPage" ng-model="currentPage" boundary-links="true" max-size="10"></pagination>

						</div>
					 </div>
				</div>
				<button type="button" class="btn btn-small blue" ng-click="addFoodPref();">Add New</button>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->