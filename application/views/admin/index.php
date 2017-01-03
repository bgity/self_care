<!-- BEGIN CONTAINER -->
<div class="container">
	<div class="page-container">
	
		<!-- Begin Include Page Sidebar -->
		<?php $this->load->view("admin/page_sidebar.php"); ?>
		<!-- End Include Page Sidebar -->	

		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">
				Dashboard</h3>
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php/admin">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Dashboard</a>
						</li>
					</ul>
				</div>
				<!-- END PAGE HEADER-->
				<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-institution"></i>
						</div>
						<div class="details">
							<div class="desc">
								 School Management
							</div>
						</div>
						<a href="javascript:;" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="desc">
								 User Management
							</div>
						</div>
						<a href="javascript:;" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="desc">
								 Fees Management
							</div>
						</div>
						<a href="javascript:;" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-bus"></i>
						</div>
						<div class="details">
							<div class="desc">
								 Transport Management
							</div>
						</div>
						<a href="javascript:;" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>

				
				
			<!-- BEGIN QUICK SIDEBAR -->
					<?php //$this->load->view("admin/quick_sidebar.php"); ?>
			<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->