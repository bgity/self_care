
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
                                     <option value="Children">Children</option>
                                </select>
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.gender.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.gender.$error.required">Gender is required.</span>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group">
                <label class="col-md-4 control-label">Age Limit </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="Age From" ng-model="frm.age_from" name="age_from" required ng-pattern="/^[0-9 .-]+$/" id="age_from">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.age_from.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.age_from.$error.required">Age From is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.age_from.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-inline input_full" placeholder="Age To" ng-model="frm.age_to" name="age_to" required ng-pattern="/^[0-9 .-]+$/" id="age_to">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.age_to.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.age_to.$error.required">Age To is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.age_to.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                 <label class="col-md-4 control-label">Height in cm</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Height in cm " ng-model="frm.height_in_cm" name="height_in_cm" required ng-pattern="/^[0-9 .-]+$/" id="height_in_cm">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.height_in_cm.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.height_in_cm.$error.required">Height in cm is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.height_in_cm.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                 <label class="col-md-4 control-label">Weight in kgs</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Weight in kgs" ng-model="frm.weight_in_kgs" name="weight_in_kgs" required ng-pattern="/^[0-9 .-]+$/" id="weight_in_kgs">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.weight_in_kgs.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.weight_in_kgs.$error.required">Weight in kgs is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.weight_in_kgs.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                 <label class="col-md-4 control-label">Kcal per day</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Kcal/day" ng-model="frm.kcal_daily" name="kcal_daily" required ng-pattern="/^[0-9 .-]+$/" id="kcal_daily">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.kcal_daily.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.kcal_daily.$error.required">Kcal per day is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.kcal_daily.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                 <label class="col-md-4 control-label">Kcal per kg</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Kcal/kg " ng-model="frm.kcal_per_kg" name="kcal_per_kg" required ng-pattern="/^[0-9 .-]+$/" id="kcal_per_kg">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.kcal_per_kg.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.kcal_per_kg.$error.required">Kcal/kg is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.kcal_per_kg.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                 <label class="col-md-4 control-label">Kcal per cm</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Kcal/cm" ng-model="frm.kcal_per_cm" name="kcal_per_cm" required ng-pattern="/^[0-9 .-]+$/" id="kcal_per_cm">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.kcal_per_cm.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.kcal_per_cm.$error.required">Kcal/cm is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.kcal_per_cm.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                 <label class="col-md-4 control-label">Protein gram per day</label>
                    <div class="col-md-8">
                    
                        <input type="text" class="form-control input-inline input_full" placeholder="Protein gram/day" ng-model="frm.prot_gram_per_day" name="prot_gram_per_day" required ng-pattern="/^[0-9 .-]+$/" id="prot_gram_per_day">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.prot_gram_per_day	.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.prot_gram_per_day.$error.required">Protein gram/day is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.prot_gram_per_day.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                 <label class="col-md-4 control-label">Protein gram per cm</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Protein gram/cm" ng-model="frm.prot_gram_per_cm" name="prot_gram_per_cm" required ng-pattern="/^[0-9 .-]+$/" id="prot_gram_per_cm">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.prot_gram_per_cm.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.prot_gram_per_cm.$error.required">Protein gram/cm is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.prot_gram_per_cm.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                 <label class="col-md-4 control-label">Protein gram per kg</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Protein gram/kg" ng-model="frm.prot_gram_per_kg" name="prot_gram_per_kg" required ng-pattern="/^[0-9 .-]+$/" id="prot_gram_per_kg">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.prot_gram_per_kg.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.prot_gram_per_kg.$error.required">Protein gram/kg is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.prot_gram_per_kg.$error.pattern">No Special Character Allowed</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                 <label class="col-md-4 control-label">Calcium mg per day</label>
                    <div class="col-md-8">
                       
                        <input type="text" class="form-control input-inline input_full" placeholder="Calcium mg/day" ng-model="frm.calc_mg_daily" name="calc_mg_daily" required ng-pattern="/^[0-9 .-]+$/" id="calc_mg_daily">
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.calc_mg_daily.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.calc_mg_daily.$error.required">Calcium mg/day is required.</span>
                            <span ng-show="frmbw.$submitted && frmbw.calc_mg_daily.$error.pattern">No Special Character Allowed</span>
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
