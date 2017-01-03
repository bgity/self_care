<div class="row">
<div class="col-sm-12">
	<div class="portlet-body form">
        <form class="form-horizontal" valid-submit="changeupass()" name="frmcp" novalidate>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-md-4">Current Password:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control input-inline input_full" placeholder="" ng-model="frm.current_pass" name="current_pass" required id="current_pass">
						<div style="color:#f3565d;" class="custom-error" ng-show="frmcp.current_pass.$invalid">
							<span ng-show="frmcp.$submitted && frmcp.current_pass.$error.required">Current Password is required.</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4">New Password:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control input-inline input_full" placeholder="" ng-model="frm.new_pass" name="new_pass" required id="new_pass">
						<div style="color:#f3565d;" class="custom-error" ng-show="frmcp.new_pass.$invalid">
							<span ng-show="frmcp.$submitted && frmcp.new_pass.$error.required">New Password is required.</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4">Confirm Password:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control input-inline input_full" placeholder="" ng-model="frm.confirm_pass" name="confirm_pass" required id="confirm_pass">
						<div style="color:#f3565d;" class="custom-error" ng-show="frmcp.confirm_pass.$invalid">
							<span ng-show="frmcp.$submitted && frmcp.confirm_pass.$error.required">Confirm Password is required.</span>
						</div>
					</div>
				</div>
				<div class="form-group">                                        
                    <div  class="form-actions">
                    <button class="btn blue" type="submit" >Submit</button>
					<button class="btn default" type="button" ng-click="$modalCancel()">Cancel</button>
                </div>
			</div>
		</form>
	</div>
</div>
</div>