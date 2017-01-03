<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#/foodMaster">User Diet Plans</a>
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
					<i class="fa fa-institution"></i>User Diet Plans
				</div>
				<div class="tools">
				</div>
			</div>
			<!-- start details -->
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-3">
						<p>Name: {{clientdietdet.main.first_name}}</p>
					</div>
					<div class="col-md-3">
						<p>File No: {{clientdietdet.main.file_no}}</p>
					</div>
					<div class="col-md-3">
						<p>Frame Size: {{clientdietdet.profile.body_fat}}</p>
					</div>
					<div class="col-md-3">
						<p>Programe Type: {{programeType[clientdietdet.main.programe_type-1].name}}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<p>Gender: {{clientdietdet.main.gender}}</p>
					</div>
					<div class="col-md-2">
						<p>DOB: {{clientdietdet.main.birth_date}}</p>
					</div>
					<div class="col-md-2">
						<p>City: {{clientdietdet.main.city}}</p>
					</div>
					<div class="col-md-2">
						<p>Food Pref: {{clientdietdet.main.sdesc}}</p>
					</div>
					<div class="col-md-2">
						<p>Status: {{clientdietdet.main.status}}</p>
					</div>
					<div class="col-md-2">
						<p>Consultation: {{clientdietdet.profile.consultation_date}}</p>
					</div>
				</div>
				
			<hr class="dotted ng-scope">
			<h4 class="text-center">All Plans</h4>
			<hr class="dotted ng-scope">
			<!-- end details -->
			
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<!--<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" ng-model="search.first_name" ng-change="filter()"></label>
						</div>-->
					</div>
					<div class="col-md-6">
						<label class="pull-right">Limit:
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
						
						<th class="text-center">
							Consultation Date
						</th>
						<th class="text-center">
							Created By
						</th>
						<th class="text-center">
							Edited By
						</th>
						
						<th>
						&nbsp;
						</th>
					</tr>
					</thead>
					<tbody>
					<tr ng-repeat="plan in filtered = (plans | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
						<td>
						{{$index+1}}
						</td>
						<td class="text-center">
						{{plan.consult}}
						</td>
						<td class="text-center">
						{{plan.username}}
						</td>
						<td class="text-center">
						{{plan.username}}
						</td>
					    
						<th>
							<a tooltip="View Diet Chart" tooltip-placement="left" ng-click="dieChartView(plan.client_id,plan.id)"><i class="fa fa-eye"></i></a>
						</th>
					</tr>
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
</div>
<!-- END MAIN CONTENT -->