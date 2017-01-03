<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
{{$state.current.data.pageTitle}}
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#/user_management">User Management</a>
		</li>
	</ul>
	<div class="page-toolbar">
		<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addUserView();">Add User</button>
	</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN MAIN CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-users"></i>Users
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" ng-model="search.firstname"></label>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<label style="float:right;">Limit:
						<select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions"></select>
						</label>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th ng-click="sort_by('firstname');">
								Name <span class="glyphicon sort-icon" ng-show="sortkey=='firstname'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
							</th>
							<th>
								Address
							</th>
							<th ng-click="sort_by('city');">
								City <span class="glyphicon sort-icon" ng-show="sortkey=='city'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
							</th>
							<th>
								State
							</th>
							<th>
								Contact
							</th>
							<th>
								Email
							</th>
							<th>
								Roles
							</th>
							<th>
								School
							</th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" ng-show="!filtered.length">
							<td class="dataTables_empty" colspan="8">No users found</td>
						</tr>
						<tr ng-repeat="user in filtered = (users | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
							<td>
							{{user.firstname}} {{user.lastname}}
							</td>
							<td>
							{{user.address}}
							</td>
							<td>
							{{user.city}}
							</td>
							<td>
							{{user.state}}
							</td>
							<td>
							{{user.contact_no}}
							</td>
							<td>
							{{user.email}}
							</td>
							<td>
							{{user.roles}}
							</td>
							<td>
							{{user.school}}
							</td>
							<td>
								<a tooltip="Edit User" tooltip-placement="bottom"  class="fa fa-edit" ng-click="editUserView(user.id)"></a> / <a tooltip="Delete User" tooltip-placement="bottom"  class="fa fa-trash-o" ng-click="deleteUserView(user.id, user.firstname+' '+user.lastname)"></a> / <a tooltip="Change Password" tooltip-placement="bottom" class="fa fa-lock" ng-click="changePassView(user.id, user.firstname+' '+user.lastname)" ></a>
							</td>
						</tr>
					</tbody>
				</table>
				
				<div class="pagi_wrap" ng-show="filteredItems > itemsPerPage">
					<div class="dataTables_paginate paging_simple_numbers" style="float:right;">                                                                              
					<pagination on-select-page="setPage(page)" total-items="filteredItems" items-per-page="itemsPerPage" ng-model="currentPage" boundary-links="true" max-size="3"></pagination>
					</div>
				 </div>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->