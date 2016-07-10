<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="This system (Job order System) helps you to manage or track your joborder." name="description"/>
<meta content="Treeserv Solutions | Sequencer" name="author"/>
<!-- Req/Core Css -->
<?php
echo link_tag(base_url('assets/plugins/google-fonts/fonts.css'));
echo link_tag(base_url('assets/plugins/font-awesome/css/font-awesome.min.css'));
echo link_tag(base_url('assets/plugins/simple-line-icons/simple-line-icons.min.css'));
echo link_tag(base_url('assets/plugins/bootstrap/css/bootstrap.min.css'));
echo link_tag(base_url('assets/plugins/uniform/css/uniform.default.css'));
echo link_tag(base_url('assets/plugins/bootstrap-switch/css/bootstrap-switch.min.css'));
echo link_tag(base_url('assets/plugins/bootstrap-toastr/toastr.min.css'));

echo isset($custom_level) ? $custom_level : '';
?>
<!-- End of Req/Core Css -->
<!-- Theme Css -->
<?php
echo link_tag(base_url('assets/custom/css/components-md.css'));
echo link_tag(base_url('assets/custom/css/plugins-md.css'));	
echo link_tag(base_url('assets/custom/css/layout.css'));
echo link_tag(base_url('assets/custom/css/themes/darkblue.css'));
echo link_tag(base_url('assets/custom/css/custom.css'));
?>
<!-- End of Theme Css -->
<!-- Favicon Css -->
<?php
echo link_tag(base_url('assets/media/treeserv.ico'), 'shortcut icon', 'image/ico');
?>
<!-- End of Favicon Css -->
