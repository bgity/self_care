<!-- BEGIN PAGE HEADER-->
<h3 class="page-title text-center">
Create Diet
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet box">
			<div class="portlet-title text-center">
				<a class="btn btn-primary grey" ng-class="{'red':selectedTab === 'client'}" ng-click="selectedTemplate.path = 'diet/clientDetails'; selectedTab='client';">Client Details</a>
				<a class="btn btn-primary grey" ng-class="{'red':selectedTab === 'intake'}" ng-click="selectedTemplate.path = 'diet/intakeAllocation';selectedTab='intake';">Intake Allocation</a>
				<a class="btn btn-primary grey" ng-class="{'red':selectedTab === 'meal'}" ng-click="selectedTemplate.path = 'diet/mealExchange';selectedTab='meal';">Meal Exchange</a>
				<a class="btn btn-primary grey" ng-class="{'red':selectedTab === 'plan'}" ng-click="selectedTemplate.path = 'diet/createPlans';selectedTab='plan';">Create Plans</a>
				
				<a class="btn btn-primary grey" ng-class="{'red':selectedTab === 'exercise'}" ng-click="selectedTemplate.path = 'diet/scheduleExercise';selectedTab='exercise';">Exercises</a>
			</div>
			<div class="portlet-body form">
				<form id="dietform" name="dietform" ng-submit="processForm()">
					<div class="form-wizard">
						<div class="form-body">
							<div ng-include="selectedTemplate.path"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->