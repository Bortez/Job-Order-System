<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
<title>TREESERV | Lay Away</title>
<?php
	$css = array();
	$css['custom_level'] = $this->load->view('custom_level_css','',TRUE);
?>
<?php echo $this->load->view('tpl/scripts/req_css',$css,TRUE); ?>
</head>
<body class="page-md page-header-fixed">
<?php echo $this->load->view('tpl/static/header','',TRUE); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php echo $this->load->view('tpl/static/sidebar',array('module'=>'accres'),TRUE); ?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<?php echo $content; ?>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php echo $this->load->view('tpl/static/footer','',TRUE); ?>
<?php
	$scripts = array();
	$scripts['custom_level'] = $this->load->view('custom_level_js','',TRUE);

?>   
<?php echo $this->load->view('tpl/scripts/req_js',$scripts,TRUE); ?>
</body>
</html>