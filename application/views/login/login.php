<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
<title>TREESERV | Sign-in</title>
<?php
	$css = array();
	$css['custom_level'] = $this->load->view('login/scripts/level_css','',TRUE);
?>
<?php echo $this->load->view('tpl/scripts/req_css',$css,TRUE); ?>
</head>
<body class="page-md login">
<div class="logo">
	<a target='_self' href="<?php base_url('login'); ?>">
		<img src="<?php echo base_url('assets/media/zt-white-logo.png'); ?>" alt="" width="300" height="auto" title="Zeal Text Trading"/>
	</a>
</div>
<div class="content">
	<form class="login-form" action="<?php echo base_url('login/authenticate'); ?>" method="post">
		<h3 class="form-title">Sign In</h3>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>
		</div>
	</form>
</div>
<div class="copyright">
	Powered By: <a target='_blank' href="http://treeservsolutions.com/">TREESERV Solutions </a>&copy; <small>(Sequencer)</small>
</div>
<?php
	$scripts = array();
	$scripts['custom_core'] = $this->load->view('login/scripts/core_js','',TRUE);
	$scripts['custom_level'] = $this->load->view('login/scripts/level_js','',TRUE);
?>
<?php echo $this->load->view('tpl/scripts/req_js',$scripts,TRUE); ?>
</body>
</html>