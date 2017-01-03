
<div class="row" >
    <div class="col-sm-12">
     <div class="portlet-body form">
        <form class="form-horizontal" valid-submit="processedit()" name="frmbw" novalidate>
        <div class="col-md-12">
                
                <div class="gap_lable_tiny"></div>
                <div class="form-group">
                 <label class="col-md-3 control-label">Disease</label>
                    <div class="col-md-9">
                        <select class="custom-dropdown__select custom-dropdown__select--emerald moveto_dd_sel" ng-model="frm.disease_id" name="disease_id" id="disease_id" ng-init="diseases" ng-options="disease.id as disease.name for disease in diseases" required>
                                    <option value="">Select Disease</option>                                   
                                    
                                </select>
                        <div style="color:#f3565d;" class="error" ng-show="frmbw.disease_id.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.disease_id.$error.required">Disease is required.</span>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group">
                <label class="col-md-3 control-label">Recommendation</label>
                    <div class="col-md-9">
                        <textarea  class="form-control input-inline input_full" placeholder="Disease Recommendation" ng-model="frm.recommendation" name="recommendation" required  id="recommendation" rows='4' cols='30'></textarea>
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.recommendation.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.recommendation.$error.required">Disease Recommendations is required.</span>
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
