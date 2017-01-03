<!-- BEGIN MAIN CONTENT -->
<div class="row">
	<div class="col-md-12">
		
				<div class="row">
					<div class="col-md-12">
						<h4 style="font-weight:bold;">Diseases:
							<span ng-repeat="(key, value) in guidelines">
								{{key}}{{$last ? '' : ($index==guidelines.length-2) ? ' and ' : ', '}}
							</span>
							<hr class="dotted" style="margin:5px 0;">
						</h4>
					</div>
				</div>
				<div class="row" ng-repeat="(key, gvalue) in guidelines">
					<div class="col-md-12 text-center">
						<h4>Recommendations for supporting {{key}}</h4>
					</div>
					<div class="col-md-12" ng-repeat="guideline in gvalue">
						<input type="checkbox" id="{{value.name}}_{{guideline.id}}" class="regular-checkbox" ng-model="formData.guidelines[$index].checked" ng-click="checkedDis(key,guideline,$index,guideline.checked)" ng-show={{guideline.checked}} ng-checked=true />
						<input type="checkbox" id="{{value.name}}_{{guideline.id}}" class="regular-checkbox" ng-model="formData.guidelines[$index].checked" ng-click="checkedDis(key,guideline,$index,guideline.checked)" ng-hide={{guideline.checked}} />
						{{guideline.recommendation}}
					</div>

					<div class="clearfix">&nbsp;</div>
					<div class="col-md-12">
						<hr style="padding:0 5px; border:1px solid #1CAF9A;">
					</div>
					
				</div>
				
				<a class="btn btn-sm blue" ng-click="$modalSuccess()">Done</a>
	</div>
</div>
<!-- END MAIN CONTENT -->