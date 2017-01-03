<style>
    #addBodyWeight .modal-dialog  {width:50%;}
     #editBodyWeight .modal-dialog  {width:50%;}
   
</style>
<!-- BEGIN MAIN CONTENT -->
<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="#/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#/foodMaster">Body Weight Master</a>
		</li>
	</ul>
	<div class="page-toolbar">
		<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addBodyWeight();">Add New</button>
	</div>
</div>
<!-- END PAGE HEADER-->
        
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Body Weight Master
                        </div>
                        <div class="actions">
                            
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="row" >
                           <!-- <div class="col-md-6 col-sm-12">
                                <div class="dataTables_filter">
                                   <label>Search:<input type="text" class="form-control input-small input-inline" placeholder="search"  ng-model="search.gender" ng-change="filter()"></label>
                                </div>
                            </div>-->
                            <div class="col-md-6 col-sm-12">
                                                            <label style="float:left;">Limit:
                                                                <select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions"></select>
                                                            </label>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="dataTables_filter" style="float:right">
                                <select ng-model="filterItem.store" ng-options="item.name for item in filterOptions.stores"></select>
                             </div>
                               
                            </div>   
                                                       
                        </div>


                         <br>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" > 
                            <thead>
                                <tr>
                                    <th ng-click="sort('gender')"> Gender	
                                    </th>
                                    <th ng-click="sort('height_in_feet')"> Height in feet 
                                    </th>
                                    <th ng-click="sort('height_in_cm')">
                                        Height in cm 
                                    </th>
                                    <th  ng-click="sort('height_in_inches')">
                                        Height in inches
                                    </th>
                                    <th  ng-click="sort('height_in_meter')">
                                        Height in sq. meter
                                    </th>
                                    <th>
                                        I.B.W. FOR SMALL FRAME
                                    </th>
                                    <th>
                                        I.B.W. FOR MEDIUM FRAME
                                    </th>
                                     <th>
                                        I.B.W. FOR LARGE FRAME 
                                    </th>
                                     	
                                    <th class="hidden-xs" >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

<!--                                <tr class="odd" ng-show="filtered.length ==0">
                        <td class="dataTables_empty" colspan="8">No clients found</td>
                </tr>-->

                                <tr ng-repeat="client in filtered = (clients | filter:customFilter | orderBy :  sortKey :reverse 	)  | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">
                                    
                                    <td>
                                        {{client.gender}}
                                    </td>

                                    <td>
                                        {{client.height_in_feet}}
                                    </td>
                                    <td>
                                        {{client.height_in_cm}}
                                    </td>
                                    <td>
                                        {{client.height_in_inches}} 
                                    </td>
                                    <td>
                                        {{client.height_in_meter}}
                                    </td>
                                    <td>
                                        {{client.bw_small_frame}} - {{client.bw_small_frame_maxval}}
                                    </td>

                                    <td>
                                        {{client.bw_medium_frame}} - {{client.bw_medium_frame_maxval}}
                                    </td>

                                    <td>
                                        {{client.bw_large_frame}} - {{client.bw_large_frame_maxval}}
                                    </td>

                                    <td>
                                        <a tooltip="Edit Weight" tooltip-placement="bottom"  class="fa fa-edit" ng-click="editBodyWeightMaster(client.id)"></a> | <a tooltip="Delete Weight" tooltip-placement="bottom"  class="fa fa-trash-o" ng-click="deleteBodyWeight(client.id)"></a> | <a tooltip="View For Ages" tooltip-placement="bottom" ng-click="moreBodyWeight(client.id)"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagi_wrap" ng-show="filteredItems > itemsPerPage">
						   <div class="dataTables_paginate paging_simple_numbers" style="float:right;">                                                                              
						   <pagination on-select-page="setPage(page)" total-items="filteredItems" items-per-page="itemsPerPage" ng-model="currentPage" boundary-links="true" max-size="10"></pagination>

						</div>
					 </div>
                         
                          <!--    Pagination End Here   -->  
                          </div>
                    </div>
                    <!-- portlet body end -->
                                          
                    
                </div>
            </div>

        </div>

<!-- END MAIN CONTENT -->