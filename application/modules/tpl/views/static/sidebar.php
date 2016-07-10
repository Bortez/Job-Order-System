<?php

/*
|----------------------------------
| Declare menu array as false.
|----------------------------------
*/

$menu = array(
	'dashboard'=>array('active'=>FALSE,'selected'=>FALSE),
	'customers'=>array('active'=>FALSE,'selected'=>FALSE),
	'joborder'=>array('active'=>FALSE,'selected'=>FALSE),
	'lay'=>array('active'=>FALSE,'selected'=>FALSE),
	'accounts'=>array('active'=>FALSE,'selected'=>FALSE),
	'accres'=>array('active'=>FALSE,'selected'=>FALSE)
);

/*
|----------------------------------
| Declare selected output.
| Declare selected module.
|----------------------------------
*/
$selected = "<span class=\"selected\"></span>";

if($module == 'dashboard'){
	$menu['dashboard']['active'] = 'active';
	$menu['dashboard']['selected'] = $selected;
}elseif($module == 'joborder'){
	$menu['joborder']['active'] = 'active';
	$menu['joborder']['selected'] = $selected;
}elseif($module == 'manage'){
	$menu['manage']['active'] = 'active';
	
	$menu['items']['active'] = 'active';
	$menu['items']['arrow'] = 'open';
	$menu['items']['selected'] = $selected;
}elseif($module == 'customers'){
	$menu['customers']['active'] = 'active';
	$menu['customers']['selected'] = $selected;
}elseif($module == 'lay'){
	$menu['lay']['active'] = 'active';
	$menu['lay']['selected'] = $selected;
}elseif($module == 'accres'){
	$menu['accres']['active'] = 'active';
	$menu['accres']['selected'] = $selected;
}else{
	$menu['accounts']['active'] = 'active';
	$menu['accounts']['selected'] = $selected;
}

?>
<!-- MENU STARTS HERE -->
<div class="page-sidebar-wrapper">
<div class="page-sidebar navbar-collapse collapse">
	<ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
		<li class="sidebar-toggler-wrapper">
			<div class="sidebar-toggler">
			</div>
		</li>
		<li class="start <?php echo $menu['dashboard']['active']; ?>">
			<a href="<?php echo base_url(''); ?>">
			<i class="icon-home"></i>
			<span class="title">Dashboard</span>
				<?php echo $menu['dashboard']['selected']; ?>
			</a>
		</li>
		<li class="<?php echo $menu['customers']['active']; ?>">
			<a href="<?php echo base_url('customers'); ?>">
			<i class="icon-users"></i>
			<span class="title">Customers</span>
				<?php echo $menu['customers']['selected']; ?>
			</a>
		</li>
		<li class="<?php echo $menu['joborder']['active']; ?>">
			<a href="<?php echo base_url('joborder'); ?>">
			<i class="icon-calendar"></i>
			<span class="title">Job Order</span>
				<?php echo $menu['joborder']['selected']; ?>
			</a>
		</li>
		<li class="<?php echo $menu['lay']['active']; ?>">
			<a href="<?php echo base_url('layaway'); ?>">
			<i class="icon-social-dropbox"></i>
			<span class="title">Lay Away</span>
				<?php echo $menu['lay']['selected']; ?>
			</a>
		</li>
		<li class="<?php echo $menu['accres']['active']; ?>">
			<a href="<?php echo base_url('accres'); ?>">
			<i class="icon-wallet "></i>
			<span class="title">Account Receivable</span>
				<?php echo $menu['accres']['selected']; ?>
			</a>
		</li>
		<?php if($this->encrypt->decode($this->session->access) == 1): ?>
		<li class="heading">
			<h3 class="uppercase">Accounts</h3>
		</li>
		<li class="<?php echo $menu['accounts']['active']; ?>">
			<a href="<?php echo base_url('accounts'); ?>">
			<i class="icon-user"></i>
			<span class="title">System User</span>
				<?php echo $menu['accounts']['selected']; ?>
			</a>
		</li>
		<?php endif; ?>
	</ul>
</div>
</div>
<!-- END OF MENU -->