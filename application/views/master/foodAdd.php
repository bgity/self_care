<!-- BEGIN FOOD FORM PORTLET-->
<div class="row">
    <div class="col-md-12">  
            <div class="portlet box">
				<div class="portlet-body form">
					<form class="form-horizontal" valid-submit="processadd()" name="frmfood" novalidate>
				
					<div class="form-body">
						
						<div class="form-group">
							<label class="col-md-3 control-label">Name</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Name*" ng-model="frm.name" name="name" required id="name">
								<div style="color:#f3565d;" ng-messages="frmfood.name.$error" ng-if="frmfood.$submitted">
									<p ng-message="required">Name is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Amt/Serving</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Amt/Serving*" ng-model="frm.weight_per_serving" name="weight_per_serving" required id="weight_per_serving">
								<div style="color:#f3565d;" ng-messages="frmfood.weight_per_serving.$error" ng-if="frmfood.$submitted">
									<p ng-message="required">Amt/Serving is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Protein</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Protein*" ng-model="frm.prot_per_serving" name="prot_per_serving" required id="prot_per_serving">
								<div style="color:#f3565d;" ng-messages="frmfood.prot_per_serving.$error" ng-if="frmfood.$submitted">
									<p ng-message="required">Protein is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Fat</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Fat*" ng-model="frm.fat_per_serving" name="fat_per_serving" required id="fat_per_serving">
								<div style="color:#f3565d;" ng-messages="frmfood.fat_per_serving.$error" ng-if="frmfood.$submitted">
									<p ng-message="required">Fat is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Cholestrol</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Cholestrol*" ng-model="frm.chol_per_serving" name="chol_per_serving" required id="chol_per_serving">
								<div style="color:#f3565d;" ng-messages="frmfood.chol_per_serving.$error" ng-if="frmfood.$submitted">
									<p ng-message="required">Cholestrol is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Calorie</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Calorie*" ng-model="frm.calo_per_serving" name="calo_per_serving" required id="calo_per_serving">
								<div style="color:#f3565d;" ng-messages="frmfood.calo_per_serving.$error" ng-if="frmfood.$submitted">
									<p ng-message="required">Calorie is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Calcium</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Calcium*" ng-model="frm.calc_per_serving" name="calc_per_serving" required id="calc_per_serving">
								<div style="color:#f3565d;" ng-messages="frmfood.calc_per_serving.$error" ng-if="frmfood.$submitted">
									<p ng-message="required">Calcium is required.</p>
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