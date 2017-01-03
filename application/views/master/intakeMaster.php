<style>
    #addIntake .modal-dialog  {width:50%;}
     #editIntake .modal-dialog  {width:50%;}
   
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
			<a href="#/intakeMaster">Intake Master</a>
		</li>
	</ul>
	<div class="page-toolbar">
		<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addIntake();">Add New</button>
	</div>
</div>
<!-- END PAGE HEADER-->
        
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Intake Master
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
                                                          <!--<div class="col-md-6 col-sm-12">
                                                            <label style="float:left;">Limit:
                                                                <select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions"></select>
                                                            </label>
                                                          </div>--> 
                            <div class="col-md-12 col-sm-12">
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
                                    <th> Age Limit 
                                    </th>
                                    <th ng-click="sort('height_in_cm')">
                                        Height in Cm 
                                    </th>
                                    <th>
                                        Weight in Kgs
                                    </th>
                                    <th>
                                        Kcal/Day
                                    </th>
                                    <th>
                                        Kcal/Kg
                                    </th>
                                     <th>
                                        Kcal/Cm
                                    </th>
                                    <th>
                                        Prot gm/day
                                    </th>
                                    <th>
                                        Prot gm/cm
                                    </th>
                                     <th>
                                       Prot gm/kg
                                    </th>
                                     <th>
                                       Calc mg/day
                                    </th>
                                    <th class="hidden-xs" >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

             <!-- <tr ng-repeat="client in filtered = (clients | filter:customFilter | orderBy :  sortKey :reverse 	)  | startFrom:(currentPage-1)*itemsPerPage | limitTo:itemsPerPage">-->
                                <tr ng-repeat="intake in intakes | filter:customFilter | orderBy :  sortKey :reverse ">    
                                    <td>
                                        {{intake.gender}}
                                    </td>

                                    <td>
                                        {{intake.age_from}} - {{intake.age_to}}
                                    </td>
                                    <td>
                                        {{intake.height_in_cm}}
                                    </td>
                                    <td>
                                        {{intake.weight_in_kgs}} 
                                    </td>
                                    <td>
                                        {{intake.kcal_daily}}
                                    </td>
                                    <td>
                                        {{intake.kcal_per_kg}} 
                                    </td>

                                    <td>
                                        {{intake.kcal_per_cm}} 
                                    </td>

                                    <td>
                                        {{intake.prot_gram_per_day}} 
                                    </td>
                                    <td>
                                        {{intake.prot_gram_per_cm}} 
                                    </td>
                                    <td>
                                        {{intake.prot_gram_per_kg}} 
                                    </td>
                                    <td>
                                        {{intake.calc_mg_daily}} 
                                    </td>

                                    <td>
                                        <a tooltip="Edit Weight" tooltip-placement="bottom"  class="fa fa-edit" ng-click="editIntake(intake.id)"></a> | <a tooltip="Delete Weight" tooltip-placement="bottom"  class="fa fa-trash-o" ng-click="deleteIntake(intake.id)"></a>
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
                    </div>
                    <!-- portlet body end -->
                                          
                    
                </div>
            </div>

        </div>

<!-- END MAIN CONTENT -->