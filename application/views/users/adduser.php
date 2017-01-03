<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="row">
         <div class="col-md-12">  
            <div class="portlet box blue">
				<div class="portlet-body form">
					<form class="form-horizontal" valid-submit="processadd()" name="frmuser" novalidate>
					
					<div class="form-body">
					<h4 class="form-section">Personal Info</h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">First Name</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="First Name*" ng-model="frm.firstname" name="firstname"  required id="firstname" >
										<div style="color:#f3565d;" ng-messages="frmuser.firstname.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">First Name is required.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Last Name</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="Last Name*" ng-model="frm.lastname" name="lastname" required id="lastname" >
										<div style="color:#f3565d;" ng-messages="frmuser.lastname.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">Last Name is required.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Gender</label>
									<div class="col-md-8">
										<div class="radio-list">
											<label class="radio-inline">
											<div class="radio-sp"><input type="radio" value="male" ng-model="frm.gender" name="gender" ng-required="!gender"></div>
											Male </label>
											<label class="radio-inline">
											<div class="radio-sp"><input type="radio" value="female" ng-model="frm.gender" name="gender" ng-required="!gender"></div>
											Female </label>
										</div>
										<div style="color:#f3565d;" ng-messages="frmuser.gender.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">Gender is required.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">DOB</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" ui-mask="99/99/9999" ng-model="frm.dob" name="dob" required id="dob" >
										<div style="color:#f3565d;" ng-messages="frmuser.dob.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">DOB is required.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Phone no.</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="Phone No.*" ng-model="frm.contact_no" name="contact_no"  required id="contact_no" ng-minlength="10" ng-maxlength="10" ng-pattern="phoneNumbr" >
										<div style="color:#f3565d;" ng-messages="frmuser.contact_no.$error" ng-if="frmuser.contact_no.$touched || frmuser.$submitted">
											<p ng-message="required">Phone no. is required.</p>
											<p ng-message="pattern">Phone no. is invalid.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Alt. Phone no.</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="Alt. Phone no.*" ng-model="frm.alt_contact_no" name="alt_contact_no" required id="alt_contact_no" ng-minlength="10" ng-maxlength="10" ng-pattern="phoneNumbr">
										<div style="color:#f3565d;" ng-messages="frmuser.alt_contact_no.$error" ng-if="frmuser.alt_contact_no.$touched || frmuser.$submitted">
											<p ng-message="required">Alt. Phone no. is required.</p>
											<p ng-message="pattern">Alt. Phone no. is invalid.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Email</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="Email*" ng-model="frm.email" name="email" required unique-value ng-pattern="/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" id="email" mod-type="users-email">
										<div style="color:#f3565d;" ng-messages="frmuser.email.$error" ng-if="frmuser.email.$touched || frmuser.$submitted">
											<p ng-message="required">Email is required.</p>
											<p ng-message="pattern">Email is invalid.</p>
											<p ng-message="unique">Email already used.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Username</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="Username*" ng-model="frm.username" name="username" required unique-value id="username" mod-type="users-username">
										<div style="color:#f3565d;" ng-messages="frmuser.username.$error" ng-if="frmuser.username.$touched || frmuser.$submitted">
											<p ng-message="required">Username is required.</p>
											<p ng-message="unique">Username already used.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<h4 class="form-section">Address Info</h4>	
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Address</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="Address*" ng-model="frm.address" name="address" required id="address">
										<div style="color:#f3565d;" ng-messages="frmuser.address.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">Address is required.</p>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">City</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="City*" ng-model="frm.city" name="city" required id="city">
										<div style="color:#f3565d;" ng-messages="frmuser.city.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">City is required.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">State</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="State*" ng-model="frm.state" name="state" required id="address">
										<div style="color:#f3565d;" ng-messages="frmuser.state.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">State is required.</p>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-4">Post Code</label>
									<div class="col-md-8">
										<input type="text" class="form-control input-inline input_full" placeholder="Post Code*" ng-model="frm.post_code" name="post_code" required ng-pattern="/^\d{6}$/" id="post_code">
										<div style="color:#f3565d;" ng-messages="frmuser.post_code.$error" ng-if="frmuser.post_code.$touched || frmuser.$submitted">
											<p ng-message="required">Postcode is required.</p>
											<p ng-message="pattern">Postcode is invalid.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<h4 class="form-section">Role</h4>	
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-4 margin-bottom-10" ng-repeat="role in roles">
										<label class="control-label">{{role.name}}</label>
											
										<!--<input type="checkbox" bootstrap-switch data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" checklist-model="selected.roles" checklist-value="role.id" name="roles" id="roles" ng-checked="editroles.indexOf(role.id) != -1">>-->
										
										<!--<input type="checkbox" checklist-model="selected.roles" checklist-value="role.id" ng-checked="editroles.indexOf(role.id) != -1" ng-click="toggleCheck(role.id)" />-->
										
										<input type="checkbox" bootstrap-switch  gcheck-list selected-items-array="editroles" value="{{role.id}}">
										
									</div>
								</div>
							</div>
						</div>
						
							
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-2">
										<h4 class="form-section">School Info</h4>
									</div>
									<div class="col-md-6">
										<input autocomplete=off type="text" name="school" ng-model="frm.school" placeholder="Select School" typeahead="school as school.name for school in Schools | filter:{name:$viewValue}" typeahead-no-results="noResults" class="form-control" required valid-school typeahead-editable="false" />
										<div ng-show="noResults">
										  <i class="glyphicon glyphicon-remove"></i> No Results Found
										</div>
										<div style="color:#f3565d;" ng-messages="frmuser.school.$error" ng-if="frmuser.$submitted">
											<p ng-message="required">School is required.</p>
											<p ng-message="valid">Invalid School. Select school from list.</p>
										</div>
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