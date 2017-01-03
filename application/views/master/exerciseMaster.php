<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dietplan">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			Exercise Master
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
					<i class="icon-vector"></i>Exercise Master
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" ng-model="search.desc" ng-change="filter()"></label>
						</div>
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
						</select>
						</label>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table">
					<thead>
					<tr>
					    <tr>
						  <th >&nbsp;				  
						  </th>
						   <th colspan='5' class="text-center">
						    Ex Def
						  </th>
						  <th >&nbsp;				  
						  </th>
						</tr>
						<th ng-click="sort_by('desc');">
							Exercise<span class="glyphicon sort-icon" ng-show="predicate=='desc'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
						</th>
						<th class="text-center">
							 50-59 kgs
						</th>
						<th class="text-center">
							60-69 kgs
						</th>
						<th class="text-center">
							70-79 kgs
						</th>
						<th class="text-center">
							80-89 kgs
						</th>
						<th class="text-center">
							90-99 kgs
						</th>
						
						<th>
							&nbsp;
						</th>
					</tr>
					</thead>
					<tbody>
					<tr ng-repeat="exercise in filtered = (exercises | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
						<td>
						{{exercise.desc}}
						</td>
						<td class="text-center">
						{{exercise.wt_50}}
						</td>
						<td class="text-center">
						{{exercise.wt_60}}
						</td>
						<td class="text-center">
						{{exercise.wt_70}}
						</td>
						<td class="text-center">
						{{exercise.wt_80}}
						</td>
						<td class="text-center">
						{{exercise.wt_90}}
						</td>						
						<td>
							<a tooltip="Edit Exercise" tooltip-placement="bottom"  class="fa fa-edit" ng-click="editExerciseView(exercise.id)"></a> / <a tooltip="Delete Food" tooltip-placement="bottom"  class="fa fa-trash-o" ng-click="deleteExerciseView(exercise.id, exercise.desc)"></a>
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