<!-- BEGIN MAIN CONTENT -->
<div class="row" class='export-table'>
	<div class="col-md-12">
		<!-- BEGIN TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					Diet Details
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-3">
						<p>Name: {{clientdietdet.main.first_name}}</p>
					</div>
					<div class="col-md-3">
						<p>File No: </p>
					</div>
					<div class="col-md-3">
						<p>Frame Size: {{clientdietdet.profile.body_fat}}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<p>Gender: {{clientdietdet.main.gender}}</p>
					</div>
					<div class="col-md-2">
						<p>DOB: {{clientdietdet.main.birth_date}}</p>
					</div>
					<div class="col-md-2">
						<p>City: {{clientdietdet.main.city}}</p>
					</div>
					<div class="col-md-2">
						<p>Food Pref: {{clientdietdet.main.sdesc}}</p>
					</div>
					<div class="col-md-2">
						<p>Status: {{clientdietdet.main.status}}</p>
					</div>
					<div class="col-md-2">
						<p>Consultation: {{clientdietdet.profile.consultation_date}}</p>
					</div>
				</div>
				
			</div>
		</div>
		<!-- END TABLE PORTLET-->
		
	</div>
</div>
<!-- END MAIN CONTENT -->