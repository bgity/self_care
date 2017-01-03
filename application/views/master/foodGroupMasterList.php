<style>
    #editMasterFood .modal-dialog { width : 50%}    
     
</style>

<!-- BEGIN MAIN CONTENT -->
<div class="margin-top-10" ng-controller="MasterFoodGroup"> 
    <div class="col-md-12 col-sm-12" style="padding-bottom:50px;">
        <h2 class="head_one">Food Group Master</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Food Group List
                        </div>
                        <div class="actions">
                            
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="row" >
                            <div class="col-md-6 col-sm-12">
                                <div class="dataTables_filter">
                                    <label>Search:<input type="text" class="form-control input-small input-inline" placeholder="search" ng-model="search"></label>
                                    <!-- ng-model="search.name" ng-change="filter()" -->
                                </div>
                            </div>
                            <!--                            <div class="col-md-6 col-sm-12">
                                                            <label style="float:right;">Limit:
                                                                <select ng-model="itemsPerPage" class="form-control input-xsmall input-inline" name="itemsPerPage" ng-options="toInt(key) as value for (key,value) in limitOptions"></select>
                                                            </label>
                                                        </div>-->
                        </div>




                        <table class="table table-striped table-bordered table-hover" id="sample_4"> 
                            <thead>
                                <tr>
                                    <th ng-click="sort('name')"> Food Group 
<!--                                        <span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse"}></span>-->
                                    </th>
                                    <th ng-click="sort('weight_per_serving')"> Weight Per Serving 
<!--                                        <span class="glyphicon sort-icon" ng-show="sortKey=='name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse"}></span>-->
                                    </th>
                                    <th ng-click="sort('prot_per_serving')">
                                        Protein
<!--                                        <span class="glyphicon sort-icon" ng-show="sortKey=='gender'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse"}></span>-->
                                    </th>
                                    <th  ng-click="sort('fat_per_serving')">
                                        Fat
<!--                                        <span class="glyphicon sort-icon" ng-show="sortKey=='age'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse"}></span>-->
                                    </th>
                                    <th  ng-click="sort('chol_per_serving')">
                                        Cho
<!--                                        <span class="glyphicon sort-icon" ng-show="sortKey=='height'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse"}></span>-->
                                    </th>
                                    <th  ng-click="sort('calo_per_serving')">
                                        Calories
<!--                                        <span class="glyphicon sort-icon" ng-show="sortKey=='weight'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse"}></span>-->
                                    </th>
                                    <th  ng-click="sort('calc_per_serving')">
                                        Calcium
<!--                                        <span class="glyphicon sort-icon" ng-show="sortKey=='wrist'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse"}></span>-->
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

<!--                                <tr ng-repeat="client in filtered = (clients| filter:search | orderBy : predicate :reverse) | startFrom:(currentPage - 1) * itemsPerPage | limitTo:itemsPerPage">-->
                                <tr ng-repeat="client in clients | filter: search | orderBy : sortKey :reverse">
                                    <td>
                                        {{client.name}}
                                    </td>

                                    <td>
                                        {{client.weight_per_serving}}
                                    </td>
                                    <td>
                                        {{client.prot_per_serving}}
                                    </td>
                                    <td>
                                        {{client.fat_per_serving}} 
                                    </td>
                                    <td>
                                        {{client.chol_per_serving}}
                                    </td>
                                    <td>
                                        {{client.calo_per_serving}}
                                    </td>

                                    <td>
                                        {{client.calc_per_serving}}
                                    </td>

                                    <td>
                                        <button class="btn grey-cascade pull-right editbtn responsive_btn_right" ng-click="editMasterFoodGrpView(client.id)" type="button">Edit Details</button>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                    <!--    Pagination Start From Here   -->
                    <div class="pagi_wrap" ng-if="totalItems > itemsPerPage" >
                                            <div class="dataTables_paginate paging_simple_numbers" style="float:right;">                                                                              
                                            <pagination total-items="totalItems" items-per-page="itemsPerPage" ng-model="currentPage" page="$parent.currentPage" boundary-links="true" max-size="3"></pagination>                
                                            </div>
                                         </div>
                                          <div class="gap_div"></div>
                                          
                    <!--    Pagination End Here   -->  
                </div>
            </div>

        </div>

    </div>	

    <!-- END MAIN CONTENT -->
</div>
