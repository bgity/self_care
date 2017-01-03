<!-- BEGIN FOOD FORM PORTLET-->
<div class="row">
    <div class="col-md-12">  
            <div class="portlet box">
				<div class="portlet-body form">
					<form class="form-horizontal" valid-submit="processadd()" name="frmfooditem" novalidate>
				
					<div class="form-body">
						
						<div class="form-group">
							<label class="col-md-3 control-label">Name</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Name*" ng-model="frm.name" name="name" required id="name">
								<div style="color:#f3565d;" ng-messages="frmfooditem.name.$error" ng-if="frmfooditem.$submitted">
									<p ng-message="required">Name is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Category</label>
							<div class="col-md-9">
								<select class="layout-style-option form-control input-sm" ng-model="frm.food_category" name="food_category" id="food_category" ng-init="food_cateogries" ng-options="category.id as category.name for category in food_categories" required>
                                    <option value="">Select Category</option>                                   
                                </select>
								<div style="color:#f3565d;" ng-messages="frmfooditem.food_category.$error" ng-if="frmfooditem.$submitted">
									<p ng-message="required">Category is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Macro Nut</label>
							<div class="col-md-9">
								<select class="layout-style-option form-control input-sm" ng-model="frm.macro_nut" name="macro_nut" id="macro_nut" ng-options="nut.name for nut in nuts track by nut.value" required multiple>
									<!--<option value="CARBS">CARBS</option>
									<option value="PROTEIN">PROTEIN</option>
									<option value="FATS">FATS</option>
									<option value="FIBRE">FIBRE</option>-->
                                </select>
								<!--<select ng-model="selectedItems" multiple ng-multiple="true" class="form-control">
								  <option ng-repeat="macro_nut.value as macro_nut.name for macro_nut in macro_nutrients" 
										  ng-selected="isSelected(selectedItems, macro_nut.value)"
										  value="{{macro_nut.value}}">
								  {{macro_nut.name}}
								  </option>
								</select>-->
								
								<div style="color:#f3565d;" ng-messages="frmfooditem.macro_nut.$error" ng-if="frmfooditem.$submitted">
									<p ng-message="required">Macro Nut is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Calorie Calc Base</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-inline input_full" placeholder="Calorie Calc Base*" ng-model="frm.calorie_calc_base" name="calorie_calc_base" required id="calorie_calc_base">
								<div style="color:#f3565d;" ng-messages="frmfooditem.calorie_calc_base.$error" ng-if="frmfooditem.$submitted">
									<p ng-message="required">Calorie Calc Base is required.</p>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Calc Base</label>
							<div class="col-md-9">
								
								<select ng-model="frm.calc_base" name="calc_base" class="form-control input-small input-inline" ng-options="calcs.name for calcs in base_calcs track by calcs.value" required multiple>
								<option value=''>Select</option>
								</select>
								
								<div style="color:#f3565d;" ng-messages="frmfooditem.calc_base.$error" ng-if="frmfooditem.$submitted">
									<p ng-message="required">Calc Base is required.</p>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<div class="col-md-4">
								<label class="col-md-4 control-label">Number</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Number*" ng-model="frm.number_meas" name="number_meas" required id="number_meas">
									<div style="color:#f3565d;" ng-messages="frmfooditem.number_meas.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Number is required.</p>
									</div>
								</div>
							</div>
						
						
							<div class="col-md-4">
								<label class="col-md-4 control-label">Cup</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Cup*" ng-model="frm.cup_meas" name="cup_meas" required id="cup_meas">
									<div style="color:#f3565d;" ng-messages="frmfooditem.cup_meas.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Cup is required.</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<label class="col-md-4 control-label">Gm/Ml</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Gm/Ml*" ng-model="frm.gm_ml_meas" name="gm_ml_meas" required id="gm_ml_meas">
									<div style="color:#f3565d;" ng-messages="frmfooditem.gm_ml_meas.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Gm/Ml is required.</p>
									</div>
								</div>
							</div>
						</div>	
						
						<hr>
						<div class="form-group">
							<div class="col-md-4">
								<label class="col-md-4 control-label">Protein</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Protein*" ng-model="frm.protein" name="protein" required id="protein">
									<div style="color:#f3565d;" ng-messages="frmfooditem.protein.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Protein is required.</p>
									</div>
								</div>
							</div>
						
							<div class="col-md-4">
								<label class="col-md-4 control-label">Fat</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Fat*" ng-model="frm.fat" name="fat" required id="fat">
									<div style="color:#f3565d;" ng-messages="frmfooditem.fat.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Fat is required.</p>
									</div>
								</div>
							</div>
						
							<div class="col-md-4">
								<label class="col-md-4 control-label">Carbs</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Carbs*" ng-model="frm.carbs" name="carbs" required id="carbs">
									<div style="color:#f3565d;" ng-messages="frmfooditem.carbs.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Carbs is required.</p>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-6">
								<label class="col-md-4 control-label">Kcal</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Kcal*" ng-model="frm.kcal" name="kcal" required id="kcal">
									<div style="color:#f3565d;" ng-messages="frmfooditem.kcal.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Kcal is required.</p>
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<label class="col-md-4 control-label">Fibre</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Fibre*" ng-model="frm.fibre" name="fibre" required id="fibre">
									<div style="color:#f3565d;" ng-messages="frmfooditem.fibre.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Fibre is required.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label class="col-md-4 control-label">Calcium</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Calcium*" ng-model="frm.calcium" name="calcium" required id="calcium">
									<div style="color:#f3565d;" ng-messages="frmfooditem.calcium.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Calcium is required.</p>
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<label class="col-md-4 control-label">Iron</label>
								<div class="col-md-8">
									<input type="text" class="form-control input-inline input-xsmall" placeholder="Iron*" ng-model="frm.iron" name="iron" required id="iron">
									<div style="color:#f3565d;" ng-messages="frmfooditem.iron.$error" ng-if="frmfooditem.$submitted">
										<p ng-message="required">Iron is required.</p>
									</div>
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