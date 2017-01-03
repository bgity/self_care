<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dietplan">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			UOM Master
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
					<i class="icon-refresh"></i>UOM Master
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
					<table class="table">
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
					<tr ng-repeat="uom in filtered = (uoms | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
						<td>
							<span editable-text="uom.sdesc" e-name="sdesc" e-form="rowform" e-required>
							  {{uom.sdesc}}
							</span>
						</td>
						<td class="text-center">
							<span editable-textarea="uom.ldesc" e-name="ldesc" e-form="rowform" e-required>
							  {{uom.ldesc}}
							</span>
						</td>
						<td class="text-center">
						{{uom.created_date}}
						</td>
						<td class="text-center">
						{{uom.edited_date}}
						</td>
						<td style="white-space: nowrap">
							<!-- form -->
							<form editable-form name="rowform" onbeforesave="saveDet($data, uom.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="inserted == uom">
							  <button type="submit" ng-disabled="rowform.$waiting" class="fa fa-save"></button>
							  <a type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="fa fa-times"></a>
							</form>
							<div class="buttons" ng-show="!rowform.$visible && uom.sdesc!=''">
							  <a ng-click="rowform.$show()"><i class="fa fa-edit"></i></a>
							  <a ng-click="removeUom($index, uom.id, uom.sdesc)"><i class="fa fa-trash"></i></a>
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
				<button type="button" class="btn btn-sm blue" ng-click="addUom();">Add new</button>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->