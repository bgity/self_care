<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="row">
    <div class="col-md-12">  
            <div class="portlet box">
				<div class="portlet-body form">
					<form class="form-horizontal" valid-submit="processadd()" name="frmheightweight" novalidate>
				
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Gender</label>
							<div class="col-md-9">
								<div class="radio-list">
									<label class="radio-inline">
									<div class="radio-sp"><input type="radio" value="boy" ng-model="frm.gender" name="gender" ng-required="!gender"></div>
									Boy </label>
									<label class="radio-inline">
									<div class="radio-sp"><input type="radio" value="girl" ng-model="frm.gender" name="gender" ng-required="!gender"></div>
									Girl </label>
								</div>
								<div style="color:#f3565d;" ng-messages="frmheightweight.gender.$error" ng-if="frmheightweight.$submitted">
									<p ng-message="required">Gender is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Age in years</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Age*" ng-model="frm.age_in_years" name="age_in_years" required id="age_in_years">
								<div style="color:#f3565d;" ng-messages="frmheightweight.age_in_years.$error" ng-if="frmheightweight.$submitted">
									<p ng-message="required">Age is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Height in cms</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Height*" ng-model="frm.height_in_cms" name="height_in_cms" required id="height_in_cms">
								<div style="color:#f3565d;" ng-messages="frmheightweight.height_in_cms.$error" ng-if="frmheightweight.$submitted">
									<p ng-message="required">Height is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Weight in kg</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Weight*" ng-model="frm.weight_in_kgs" name="weight_in_kgs" required id="weight_in_kgs">
								<div style="color:#f3565d;" ng-messages="frmheightweight.weight_in_kgs.$error" ng-if="frmheightweight.$submitted">
									<p ng-message="required">Weight is required.</p>
								</div>
							</div>
						</div>
						
					</div>
					<div class="form-actions">
						<button class="btn blue" type="submit">Submit</button>
						<button class="btn default" type="button" ng-click="$modalCancel()">Cancel</button>
					</div>
					
					</form>
				</div>
			</div>
        </div>
    </form>
</div>