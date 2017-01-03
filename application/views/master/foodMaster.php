<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#/foodMaster">Food Master</a>
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
					<i class="fa fa-institution"></i>Food Master
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" ng-model="search.name" ng-change="filter()"></label>
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
						<th ng-click="sort_by('name');">
							Food Groups<span class="glyphicon sort-icon" ng-show="predicate=='name'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
						</th>
						<th class="text-center">
							Amt/Serving
						</th>
						<th class="text-center">
							Protein
						</th>
						<th class="text-center">
							Fat
						</th>
						<th class="text-center">
							Cholestrol
						</th>
						<th class="text-center">
							Calories
						</th>
						<th class="text-center">
							Calcium
						</th>
						<th>
							&nbsp;
						</th>
					</tr>
					</thead>
					<tbody>
					<tr ng-repeat="food in filtered = (foods | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
						<td>
						{{food.name}}
						</td>
						<td class="text-center">
						{{food.weight_per_serving}}
						</td>
						<td class="text-center">
						{{food.prot_per_serving}}
						</td>
						<td class="text-center">
						{{food.fat_per_serving}}
						</td>
						<td class="text-center">
						{{food.chol_per_serving}}
						</td>
						<td class="text-center">
						{{food.calo_per_serving}}
						</td>
						<td class="text-center">
						{{food.calc_per_serving}}
						</td>
						<td>
							<a tooltip="Edit Food" tooltip-placement="bottom"  class="fa fa-edit" ng-click="editFoodView(food.id)"></a> / <a tooltip="Delete Food" tooltip-placement="bottom"  class="fa fa-trash-o" ng-click="deleteFoodView(food.id, food.name)"></a>
						</td>
					</tr>
					</tbody>
					</table>
					<div class="pagi_wrap" ng-show="filteredItems > itemsPerPage">
						<div class="dataTables_paginate paging_simple_numbers" style="float:right;"><pagination on-select-page="setPage(page)" total-items="filteredItems" items-per-page="itemsPerPage" ng-model="currentPage" boundary-links="true" max-size="10"></pagination>

						</div>
					 </div>
				</div>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->