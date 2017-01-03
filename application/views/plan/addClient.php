
<div class="row" >
    <div class="col-sm-12">
		
	<div class="text-center">
		<form  valid-submit="setClient()" name="frmbw" novalidate>
		<div class="col-md-12">
			<div class="row">
					<div class="col-md-6">
						<div class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-small input-inline" placeholder="" ng-model="search.$" ng-change="filter()"></label>
						</div>
					</div>
                    <div class="col-md-6">
                              <!--<label style="float:left;">Limit:
                                  <select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions"></select>
                             </label>-->
                    </div>
			</div>
			
			<div class="table-responsive" style="height:auto; overflow-x:hidden;">
				<table class="table">
				<thead>
				<tr>
					<th ng-click="sort('first_name')">
						Client Name
					</th>
					<th>
						 File No
					</th>
					<th>
						 Gender
					</th>
					<th >
						 Age
					</th>
					<th>Plans</th>
				</tr>
				</thead>
				<tbody  ng-repeat="(key,client) in filtered = (clients | filter: search | orderBy : sortKey :reverse) | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
				<tr>
				{{key}}
					<td class="text-left">
						
						<a ng-click="isReplyFormOpen = !isReplyFormOpen">{{client.first_name}}</a>
                        <div style="color:#f3565d;" class="error" ng-show="clientid.$invalid">
						
                            <span ng-show="frmbw.$submitted && frmbw.clientid.$error.required">Plan is required.</span>
							
                        </div>
					</td>
					<td class="text-left">
						{{client.file_no}}
					</td>
					<td class="text-left">
						{{client.gender}}
					</td>
					<td class="text-left">
						{{client.age}} 
					</td>
					<td class="text-right" >
					<a ng-click="isReplyFormOpen = !isReplyFormOpen">View</a>
					
					
					</td>
				</tr>
				<tr ng-show="isReplyFormOpen">
				 <td colspan="5">
				 <ul style="list-style:none; margin:0;padding:0;">
				  <li style="background-color:#f3f3f3; border:bottom:#d3d3d3 solid 1px; height:30px; line-height:30px; padding-left:10px; padding-right:10px; float:left; border-left:#fff solid 2px;" ng-repeat = "plan in client.plans">
				   <input type="radio" id="{{plan.planid}}" ng-model="frm.radioValue" value="{{plan.planid}}"  name="clientid" required /> Plan {{plan.plan_date}}
				  </li>
				 </ul>
			
					
				 </td>
				</tr>
				</tbody>
				
				
				
				</table>
			</div>
		   </div>
		<!--pagination starts-->
		   <div class="pagi_wrap" ng-show="filtered.length > itemsPerPage">
						<div class="dataTables_paginate paging_simple_numbers" style="float:right;">
						<pagination on-select-page="setPage(page)" total-items="filteredItems" items-per-page="itemsPerPage" ng-model="currentPage" boundary-links="true" max-size="10"></pagination>

						</div>
					 </div>
		<!--pagination end-->					   
		<div class="col-md-3"></div>
		<div class="clearfix">&nbsp;</div>
		<div class="pull-right">
             <div  class="form-actions">
             <button class="btn blue" type="submit" >Add</button>
			<button class="btn default" type="button" ng-click="$modalCancel()">Cancel</button>
            </div>
		</div>
	</form>
	</div>
	
  </div>
</div>
                    