
<div class="row" >
    <div class="col-sm-12">
     <div class="portlet-body form">
        <form class="form-horizontal" valid-submit="processedit()" name="frmbw" novalidate>
        <div class="col-md-12">
                
                <div class="gap_lable_tiny"></div>
                
                
                <div class="form-group">
                <label class="col-md-5 control-label">Disease Name</label>
                    <div class="col-md-7">
                        <input  class="form-control input-inline input_full" placeholder="Disease Name" ng-model="frm.name" name="name" required  id="name">
                        <div style="color:#f3565d;" class="custom-error" ng-show="frmbw.name.$invalid">
                            <span ng-show="frmbw.$submitted && frmbw.name.$error.required">Disease is required.</span>
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
