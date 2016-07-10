<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--[if lt IE 9]>
<script src="<?php echo base_url('assets/plugins/respond.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/excanvas.min.js'); ?>"></script> 
<![endif]-->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-migrate.min.js'); ?>"></script>
<!-- Req/Core Javascript -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.blockui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.cokie.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/uniform/jquery.uniform.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-toastr/toastr.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootbox/bootbox.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/global.js'); ?>"></script>
<?php echo isset($custom_core) ? $custom_core : ''; ?>
<!-- End of Req/Core Javascript -->
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/metronic.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/layout.js'); ?>"></script>
<?php echo isset($custom_level) ? $custom_level : ''; ?>