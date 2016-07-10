<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>TREESERV | 404 Page Not Found</title>
<?php $CI = &get_instance(); ?>
<?php echo $CI->load->view('tpl/scripts/req_css','',TRUE); ?>
<?php echo link_tag(base_url('assets/custom/css/error.css')); ?>
</head>
<body class="page-md page-404-3">
	<div class="page-inner">
		<img src="<?php echo base_url('assets/media/404.jpg'); ?>" class="img-responsive" alt="">
	</div>
	<div class="container error-404">
		<h1>404</h1>
		<h2><?php echo str_replace('404','',$heading); ?></h2>
		<p><?php echo $message; ?></p>
		<p><a href="javascript:history.back()">Return home </a></p>
	</div>

</body>
</html>