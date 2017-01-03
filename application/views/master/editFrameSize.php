
<div class="row" >
    <div class="col-sm-12">
     <div class="portlet-body form">
        <form class="form-horizontal" valid-submit="processedit()" name="frmbw" novalidate>
        <div class="col-md-12">

                
                <div class="gap_lable_tiny"></div>
                <div class="form-group">
                 <label class="col-md-4 control-label">Gender</label>
                    <div class="col-md-8">
                        <select class="custom-dropdown__select custom-dropdown__select--emerald moveto_dd_sel" ng-model="frm.gender" name="gender" id="gender" required>
                                    <option value="">Select Gender</option>                                   
                                    <option value="Female">Female</option>
                                     <option value="Male">Male</option>
                                </select>
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.gender.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.gender.$error.required">Gender is required.</span>
                        </div>
                        
                    </div>
                </div>
                <div class="form-group">
                 <label class="col-md-4 control-label">Operator</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Operator " ng-model="frm.operator" name="operator" required >
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.operator.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.operator.$error.required">Operator is required.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Value </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="Start Value" ng-model="frm.value1" name="value1" required ng-pattern="/^[0-9 .-]+$/" id="height_in_cm">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.value1.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.value1.$error.required">Start Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.value1.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="End Value" ng-model="frm.value2" name="value2" required ng-pattern="/^[0-9 .-]+$/" id="height_in_inches">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.value2.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.value2.$error.required">End Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.value2.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                    
                <div class="gap_lable_small"></div>

                <div class="form-group">                                        
                    <div  class="form-actions">
                    <button class="btn blue" type="submit" >Submit</button>
					<button class="btn default" type="button" ng-click="$modalCancel()">Cancel</button>
                </div>
                </div>                         
            </div>
        
       </form>
     </div>
  </div>
</div>
