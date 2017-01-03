<style>
    #addFrame .modal-dialog  {width:50%;}
     #editFrame .modal-dialog  {width:50%;}
   
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
			<a href="#/foodMaster">Frame Size Master</a>
		</li>
	</ul>
	<div class="page-toolbar">
		<button class="btn grey-cascade btn-fit-height" type="button" ng-click="addFrameSize();">Add</button>
	</div>
</div>
<!-- END PAGE HEADER-->
        
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Frame Size Master
                        </div>
                        <div class="actions">
                            
                        </div>
                    </div>
                    <div class="portlet-body hwmaster">

                       
                        <div class="table-responsive">
                        <!--<div ng-repeat="gender in frames | groupBy:'gender'">
                        <b>{{gender}}</b>-->
                        <table class="table table-striped table-bordered table-hover" > 
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center"> Frame Size 
                                    </th>
                                    <th colspan="2" class="text-center"> Female
                                    </th>
                                    <th colspan="2" class="text-center"> Male
                                    </th>
                                    
                                   
                                </tr>
                                <tr>
                                    
                                    
                                    <th class="text-center">
                                        Value  
                                    </th>
                                    <th class="hidden-xs" >
                                        Action
                                    </th>
                                    
                                    <th class="text-center">
                                        Value  
                                    </th>
                                    <th class="hidden-xs" >
                                        Action
                                    </th>
                                   
                                </tr>
                            </thead>
                            <tbody>

	   					<tr ng-repeat="(key, value) in frames">
	   						
	   						<td class="text-center">
	   							  {{value[0].operator}}
	   						</td>
	   						<td class="text-center">
	   							<span editable-text="value[0].value1" e-name="value1" e-form="rowform" e-required>
	   							  {{value[0].value1}} 
	   							</span>
	   							<span editable-text="value[0].value2" e-name="value2" e-form="rowform" e-required>
	   							   - {{value[0].value2}}
	   							</span>
	   						</td>
   						<td style="white-space: nowrap">
   							<!-- form -->
   							<form editable-form name="rowform" onbeforesave="saveDet($data, value[0].id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="inserted == value">
   							  <button type="submit" ng-disabled="rowform.$waiting" class="fa fa-save"></button>
   							  <a type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="fa fa-times"></a>
   							</form>
   							<div class="buttons" ng-show="!rowform.$visible">
   							  <a  ng-click="rowform.$show()"><i class="fa fa-edit"></i></a>
   							</div>  
   						</td>
	   						
	   						<td class="text-center">
	   							<span editable-text="value[1].value1" e-name="value1" e-form="growform" e-required>
	   							  {{value[1].value1}} 
	   							</span>
	   							<span editable-text="value[1].value2" e-name="value2" e-form="growform" e-required>
	   							   - {{value[1].value2}}
	   							</span>
	   						</td>
		 						<td style="white-space: nowrap">
		 							<!-- form -->
		 							<form editable-form name="growform" onbeforesave="saveDet($data, value[1].id)" ng-show="growform.$visible" class="form-buttons form-inline" shown="inserted == value">
		 							  <button type="submit" ng-disabled="growform.$waiting" class="fa fa-save"></button>
		 							  <a type="button" ng-disabled="growform.$waiting" ng-click="growform.$cancel()" class="fa fa-times"></a>
		 							</form>
		 							<div class="buttons" ng-show="!growform.$visible && value[1].value1">
		 							  <a  ng-click="growform.$show()"><i class="fa fa-edit"></i></a>
		 							</div>  
		 						</td>
						</tr>
						<!--<td class="text-center">
							<span editable-text="value[1].height_in_cms" e-name="height_in_cms" e-form="growform" e-required>
							  {{value[1].gender}}
							</span>
						</td>
						<td class="text-center">
							<span editable-text="value[1].weight_in_kgs" e-name="weight_in_kgs" e-form="growform" e-required>
							  {{value[1].operator}}
							</span>
						</td>
   						<td class="text-center">
   							<span editable-text="value[0].weight_in_kgs" e-name="weight_in_kgs" e-form="rowform" e-required>
   							  {{value[1].value1}} - {{value[1].value2}}
   							</span>
   						</td>-->
                                <!--<tr ng-repeat="frame in frames | filter: gender">
                                    
                                    <td>
                                        {{frame.gender}}
                                    </td>

                                    <td>
                                        {{frame.operator}}
                                    </td>
                                    <td>
                                        {{frame.value1}} - {{frame.value2}} 
                                    </td>
                                 
                                    <td>
                                        <a tooltip="Edit Weight" tooltip-placement="bottom" class="fa fa-edit" ng-click="editFrameSize(frame.id)"></a>
                                    </td>
                                </tr>-->
                          
                            </tbody>
                        </table>
                     <!--</div>-->    
                          </div>
                           
                    </div>
                    <!-- portlet body end -->
                                          
                    
                </div>
            </div>

        </div>

<!-- END MAIN CONTENT -->