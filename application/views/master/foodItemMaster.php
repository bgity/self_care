<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#/foodItemMaster">Food Item Master</a>
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
					<i class="fa fa-institution"></i>Food Item Master
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" ng-model="search.name" ng-change="filter()"></label>

						<label class="">Category:
					    <select class="form-control input-medium input-inline" ng-model="filterItem.store" ng-options="cats.category for cats in foods | unique:'category'"></select>
                        </label>
						</div>
						</select>
						</div>
						<div class="col-md-6">
						<label class="pull-right">Limit:
						<select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" >
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="100">100</option>
						
						</select>
						</label>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table">
					<thead>
					<tr>
						<th ng-click="sort_by('name');">
							Food Item<span class="glyphicon sort-icon" ng-show="predicate=='name'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
						</th>
						<th class="text-center">
							Category
						</th>
						<th class="text-center">
							Macro Nut
						</th>
						<th class="text-center">
							Calorie Calc Base
						</th>
						<th class="text-center">
							Calc Base
						</th>
						<th class="text-center">
							Number
						</th>
						<th class="text-center">
							Cup
						</th>
						<th class="text-center">
							Gm/Ml
						</th>
						<th class="text-center">
							Protein
						</th>
						<th class="text-center">
							Fat
						</th>
						<th class="text-center">
							Carbs
						</th>
						<th class="text-center">
							Kcal
						</th>
						<th class="text-center">
							Fibre
						</th>
						<th class="text-center">
							Calcium
						</th>
						<th class="text-center">
							Iron
						</th>
						<th>
							&nbsp;
						</th>
					</tr>
					</thead>
					<tbody>
					<tr ng-repeat="food in filtered = (foods | filter:search | filter:categoryFilter | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
						<td>
						{{food.name}}
						</td>
						<td class="text-center">
						{{food.category}}
						</td>
						<td class="text-center">
						{{food.macro_nut}}
						</td>
						<td class="text-center">
						{{food.calorie_calc_base}}
						</td>
						<td class="text-center">
						{{food.calc_base}}
						</td>
						<td class="text-center">
						{{food.number_meas}}
						</td>
						<td class="text-center">
						{{food.cup_meas}}
						</td>
						<td class="text-center">
						{{food.gm_ml_meas}}
						</td>
						<td class="text-center">
						{{food.protein}}
						</td>
						<td class="text-center">
						{{food.fat}}
						</td>
						<td class="text-center">
						{{food.carbs}}
						</td>
						<td class="text-center">
						{{food.kcal}}
						</td>
						<td class="text-center">
						{{food.fibre}}
						</td>
						<td class="text-center">
						{{food.calcium}}
						</td>
						<td class="text-center">
						{{food.iron}}
						</td>
						<td>
							<a tooltip="Edit Food" tooltip-placement="bottom"  class="fa fa-edit" ng-click="editFoodItemView(food.id)"></a> / <a tooltip="Delete Food" tooltip-placement="bottom"  class="fa fa-trash-o" ng-click="deleteFoodItemView(food.id, food.name)"></a>
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