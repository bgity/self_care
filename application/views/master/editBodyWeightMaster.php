
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
                 <label class="col-md-4 control-label">Height In Feet</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Height In Feet" ng-model="frm.height_in_feet" name="height_in_feet" required id="height_in_feet">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.height_in_feet.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.height_in_feet.$error.required">Height in feet is required.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-4 control-label">Height In Cm</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-inline input_full" placeholder="Height In Cm" ng-model="frm.height_in_cm" name="height_in_cm" required ng-pattern="/^[0-9 .-]+$/" id="height_in_cm">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.height_in_cm.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.height_in_cm.$error.required">Height in cm is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.height_in_cm.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label">Height In Inches</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-inline input_full" placeholder="Height In Inches" ng-model="frm.height_in_inches" name="height_in_inches" required ng-pattern="/^[0-9 .-]+$/" id="height_in_inches">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.height_in_inches.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.height_in_inches.$error.required">Height in inches is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.height_in_inches.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label">Height In Sq. Meter</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-inline input_full" placeholder="Height In Meter" ng-model="frm.height_in_meter" name="height_in_meter" required ng-pattern="/^[0-9 .-]+$/" id="height_in_meter">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.height_in_meter.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.height_in_meter.$error.required">Height in meter is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.height_in_meter.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label">I.B.W. FOR SMALL FRAME</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="Start Value" ng-model="frm.bw_small_frame" name="bw_small_frame" required ng-pattern="/^[0-9 .-]+$/" id="bw_small_frame">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.bw_small_frame.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.bw_small_frame.$error.required">Start Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.bw_small_frame.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="End Value" ng-model="frm.bw_small_frame_maxval" name="bw_small_frame_maxval" required ng-pattern="/^[0-9 .-]+$/" id="bw_small_frame_maxval">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.bw_small_frame_maxval.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.bw_small_frame_maxval.$error.required">End Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.bw_small_frame_maxval.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                   
                    <div class="form-group">
                    <label class="col-md-4 control-label">I.B.W. FOR MEDIUM FRAME </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="Start Value" ng-model="frm.bw_medium_frame" name="bw_medium_frame" required ng-pattern="/^[0-9 .-]+$/" id="bw_medium_frame">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.bw_medium_frame.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.bw_medium_frame.$error.required">Start Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.bw_medium_frame.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="End Value" ng-model="frm.bw_medium_frame_maxval" name="bw_medium_frame_maxval" required ng-pattern="/^[0-9 .-]+$/" id="bw_medium_frame_maxval">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.bw_medium_frame_maxval.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.bw_medium_frame_maxval.$error.required">End Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.bw_medium_frame_maxval.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label">I.B.W. FOR LARGE FRAME</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="Start Value" ng-model="frm.bw_large_frame" name="bw_large_frame" required ng-pattern="/^[0-9 .-]+$/" id="bw_large_frame">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.bw_large_frame.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.bw_large_frame.$error.required">Start Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.bw_large_frame.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="End Value" ng-model="frm.bw_large_frame_maxval" name="bw_large_frame_maxval" required ng-pattern="/^[0-9 .-]+$/" id="bw_large_frame_maxval">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.bw_large_frame_maxval.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.bw_large_frame_maxval.$error.required">End Value is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.bw_large_frame_maxval.$error.pattern">No Special Character Allowed</span>
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
