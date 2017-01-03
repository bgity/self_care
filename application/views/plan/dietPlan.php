<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dietplan">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			Diet Plans
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
					<i class="fa fa-users"></i>Clients 
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="Search by Name" ng-model="search.first_name" ng-change="filter()"></label>
						</div>
					</div>
					<div class="col-md-6">
						<label class="pull-right">Limit:
						<!--<select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions ">-->
						<select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage">
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
						<th>
							Sr No.
						</th>
						<th ng-click="sort_by('first_name');">
							Name<span class="glyphicon sort-icon" ng-show="predicate=='first_name'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
						</th>
						<th class="text-center">
							File No.
						</th>
						<th class="text-center">
							DOB
						</th>
						<th class="text-center">
							Age
						</th>
						<th class="text-center">
							City
						</th>
						<th class="text-center">
							Food Pref
						</th>
						
						<th class="text-center">
							Status
						</th>
						<th>
							Created by
						</th>
						<th>
						&nbsp;
						</th>
					</tr>
					</thead>
					<tbody >
					<tr ng-repeat="diet in filtered = (diets | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
						<td>
						{{$index+1}}
						</td>
						<td>
						{{diet.first_name}}
						</td>
						<td class="text-center">
						{{diet.file_no}}
						</td>
						<td class="text-center">
						{{diet.dob}}
						</td>
						<td class="text-center">
						{{diet.age}}
						</td>
						<td class="text-center">
						{{diet.city}}
						</td>
						<td class="text-center">
						{{diet.sdesc}}
						</td>
						
						<td class="text-center">
						{{diet.status}}	
						</td>
						<td>
						  Admin
						</td>
						<th>						
							<a tooltip="View Diet Chart" tooltip-placement="left" ng-click="getPlanList(diet.id)"><i class="fa fa-eye"></i></a>
						</th>						
						
					</tr>
					<tr ng-show="!filtered.length"><td colspan="9">No Record Found</td></tr>
					</tbody>
					</table>
					<div class="pagi_wrap" ng-show="filteredItems > itemsPerPage">
						<div class="dataTables_paginate paging_simple_numbers" style="float:right;">
						<pagination on-select-page="setPage(page)" total-items="filteredItems" items-per-page="itemsPerPage" ng-model="currentPage" boundary-links="true" max-size="10"></pagination>

						</div>
					 </div>
				</div>
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->