<!-- BEGIN FOOD FORM PORTLET-->
<div class="row">
    <div class="col-md-12">  
            <div class="portlet box">
				<div class="portlet-body form">
					<form class="form-horizontal" valid-submit="processadd()" name="frmex" novalidate>
				
					<div class="form-body">
						
						<div class="form-group">
							<label class="col-md-4 control-label">Exercise</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-inline input_full" placeholder="Name*" ng-model="frm.desc" name="desc" required id="desc">
								<div style="color:#f3565d;" ng-messages="frmex.desc.$error" ng-if="frmex.$submitted">
									<p ng-message="required">Exercise is required.</p>
								</div>
							</div>
						</div>
						
					
						
						<div class="form-group">
							<label class="col-md-4 control-label">Ex Def (50-59 kgs)</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-inline input_full" placeholder="Ex Def (50-59 kgs)*" ng-model="frm.wt_50" name="wt_50" required id="wt_50">
								<div style="color:#f3565d;" ng-messages="frmex.wt_50.$error" ng-if="frmex.$submitted">
									<p ng-message="required">Ex Def (50-59 kgs) is required.</p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Ex Def (60-69 kgs)</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-inline input_full" placeholder="Ex Def (60-69 kgs)*" ng-model="frm.wt_60" name="wt_60" required id="wt_60">
								<div style="color:#f3565d;" ng-messages="frmex.wt_60.$error" ng-if="frmex.$submitted">
									<p ng-message="required">Ex Def (60-69 kgs) is required.</p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Ex Def (70-79 kgs)</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-inline input_full" placeholder="Ex Def (70-79 kgs)*" ng-model="frm.wt_70" name="wt_70" required id="wt_70">
								<div style="color:#f3565d;" ng-messages="frmex.wt_70.$error" ng-if="frmex.$submitted">
									<p ng-message="required">Ex Def (70-79 kgs) is required.</p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Ex Def (80-89 kgs)</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-inline input_full" placeholder="Ex Def (80-89 kgs)*" ng-model="frm.wt_80" name="wt_80" required id="wt_80">
								<div style="color:#f3565d;" ng-messages="frmex.wt_80.$error" ng-if="frmex.$submitted">
									<p ng-message="required">Ex Def (80-89 kgs) is required.</p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Ex Def (90-99 kgs)</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-inline input_full" placeholder="Ex Def (90-99 kgs)*" ng-model="frm.wt_90" name="wt_90" required id="wt_90">
								<div style="color:#f3565d;" ng-messages="frmex.wt_90.$error" ng-if="frmex.$submitted">
									<p ng-message="required">Ex Def (90-99 kgs) is required.</p>
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