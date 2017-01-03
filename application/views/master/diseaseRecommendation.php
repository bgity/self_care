<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dietplan">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			Disease Recommendations
		</li>
	</ul>
	<div class="page-toolbar">
		<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addDiseaseRec();">Add New Recommendation</button>
		<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addDisease();">Add Disease</button>
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
					<i class="icon-feed"></i>Disease Recommendations
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-medium input-inline" placeholder="By Recommendation Text" ng-model="search.recommendation" ng-change="filter()"></label>
						</div>
					</div>
					<div class="col-md-6">
						<!--<label class="pull-right">Limit:
						<select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions"></select>
						</label>-->
	                       <!-- <select  class="form-control input-medium pull-right" ng-model="diseases.name"  ng-init="diseases" ng-options="disease.name for disease in diseases" >
                                  <option value="">Select Disease</option>                                   
                            </select>-->
					</div>
				</div>
				<div class="table-responsive">
					<table class="table ">
					
					<tr>
					<td>
						<table class="table">
							<thead>	
						<!--<th ng-click="sort_by('disease_name');">
							Disease <span class="glyphicon sort-icon" ng-show="predicate=='disease_name'" ng-class="{'glyphicon-chevron-down':reverse,'glyphicon-chevron-up':!reverse}"></span>
						</th>-->
						<th class="text-center" width="60%">
							Recommendation
						</th>
						<th class="text-center">
							Created on
						</th>
						<th class="text-center">
							Edited on
						</th>
                        <th class="hidden-xs">
                            Action
                        </th>
						</thead>
					</table>
					</td>
					</tr>
					
					<tbody>
					<!--<tr ng-repeat="diseasr in filtered = (diseasrs | filter:search | orderBy : predicate :reverse) filter:customFilter">-->
					<tr ng-repeat="(key,diseasr) in diseasrs  | filter: search | filter: diseases.name | groupBy:'disease_name'  ">
						
						<td ><b>{{key}}</b>
						<table class="table ">
						<tr ng-repeat="dis in filtered = (diseasr)">
						<td width="60%">							
							  {{dis.recommendation}}							
						</td>
						<td class="text-center">
						{{dis.created_date}}
						</td>
						
						<td class="text-center">
						{{dis.edited_date}}
						</td>
						<!--<td style="white-space: nowrap">
							
							<form editable-form name="rowform" onbeforesave="saveDet($data, foodpf.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="inserted == foodpf">
							  <button type="submit" ng-disabled="rowform.$waiting" class="fa fa-save"></button>
							  <a type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="fa fa-times"></a>
							</form>
							<div class="buttons" ng-show="!rowform.$visible">
							  <a ng-click="rowform.$show()"><i class="fa fa-edit"></i></a>
							  <a ng-click="removeFoodpf($index, foodpf.id, foodpf.sdesc)"><i class="fa fa-trash"></i></a>
							</div>  
						</td> -->
						<td>
                            <a tooltip="Edit Disease Recommendation" tooltip-placement="bottom"  class="fa fa-edit" ng-click="editDiseaseRec(dis.id)"></a> | 
							<a tooltip="Delete Disease Recommendation" tooltip-placement="bottom"  class="fa fa-trash-o" ng-click="deleteDiseaseRec(dis.id)"></a>
						</td>
					  </tr>
					  </table>
					  </td>		
					</tr>
					</tbody>
					</table>
					<!--<div class="pagi_wrap" ng-show="filteredItems > itemsPerPage">
						<div class="dataTables_paginate paging_simple_numbers" style="float:right;">                                                                              
						<pagination on-select-page="setPage(page)" total-items="filteredItems" items-per-page="itemsPerPage" ng-model="currentPage" boundary-links="true" max-size="10"></pagination>

						</div>
					 </div>-->
				</div>
				<!--<button type="button" class="btn btn-small blue" ng-click="addDiseaseRec();">Add New</button>-->
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->