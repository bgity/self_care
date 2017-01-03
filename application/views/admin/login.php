<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Selfcare | Admin Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<base href="<?php echo base_url();?>">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'material design' style just load 'components-md.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<div style="width:400px; margin:0 auto; background-color:#e6ddd2; display:inline-block; box-shadow: inset 0px 12px 0px #fff, inset 0px -12px 0px #fff;">
		<div style="width:80%; float:left; height:70px; padding-top:20px;  padding-left:20px; font-size:18px; text-align:left">Health Design by Suman Agarwal</div>
		<div style="width:20%; float:left; height:70px; line-height:70px; text-align:center;padding-right:50px;">
			<img alt="" src="assets/admin/layout/img/Suman-Agarwal.png" style="border:#fff solid 2px; margin-bottom:5px; " class="img-circle" >
		</div>
	</div>
</div><div class="clearfix"></div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content" ng-app="userLogin">
	<!-- BEGIN LOGIN FORM -->
	<!--<form class="login-form" action="index.html" method="post">-->
	
	<?php $attributes = array('class' => 'login-form', 'ng-controller'=>'FormController', 'ng-submit'=>'submitForm()'); ?>
    <?php //echo form_open('login/login_ang', $attributes); ?>
	<div class="login-form">
	<form class="form-group" ng-controller="LoginController" ng-submit="submitForm()" role="form" method="post" name="frmlogin" id="frmlogin">
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger <?php if(validation_errors() != false) { echo 'display-show';} else { echo 'display-hide';}?>">
			<button class="close" data-close="alert"></button>
			<span><?php if(validation_errors() != false) { echo validation_errors(); } else { echo 'Enter username and password'; }?></span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" ng-model="username" required />
			
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" ng-model="password" required />
			
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
			<!--<input type="checkbox" name="remember" value="1"/>Remember </label>-->
			<a href="javascript:;" id="forgot-password" class="forgot-password">Forgot Password?</a>
		</div>
		
		
	</form>
	</div>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forgotpass_form" ng-controller="LoginController" ng-submit="forgotPass()" method="post" name="forgotPassForm" id="forgotPassForm">
		<h3>Forgot Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<!--<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>-->
			<input class="form-control placeholder-no-fix" name="email" type="email" ng-model="email" required>
			<!--<div ng-messages="forgetPassForm.email.$error" ng-messages-include="error-messages" ng-if="forgetPassForm.$submitted">
				<div ng-message="pattern">Please enter a valid email address!</div>
			</div>-->
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="index.html" method="post">
		<h3>Sign Up</h3>
		<p class="hint">
			 Enter your personal details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Full Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="fullname"/>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Address</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Address" name="address"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">City/Town</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="City/Town" name="city"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Country</label>
			<select name="country" class="form-control">
				<option value="">Country</option>
			</select>
		</div>
		<p class="hint">
			 Enter your account details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
		</div>
		<div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="tnc"/> I agree to the <a href="javascript:;">
			Terms of Service </a>
			& <a href="javascript:;">
			Privacy Policy </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="register-back-btn" class="btn btn-default">Back</button>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
	 2015 © SelfCare.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="assets/admin/pages/scripts/ui-toastr.js"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>

<script src="assets/js/angular/angular.min.js" type="text/javascript"></script>	
<script src="assets/global/plugins/angularjs/plugins/ui-bootstrap-tpls.min.js" type="text/javascript"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.9.0/ui-bootstrap-tpls.min.js"></script>-->
<script src="assets/js/script.js" type="text/javascript"></script>
<script src="assets/js/angular/angular-messages.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>