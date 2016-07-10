<div class="page-content">
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo base_url(''); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<i class="fa fa-list-alt"></i>
			<a href="<?php echo base_url('accounts'); ?>">Other Accounts</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="javascript:;"><?php echo $type; ?></a>
		</li>
	</ul>
</div>
<?php if($type == 'add'): ?>
<div class="portlet light">
<div class="portlet-title">
	<div class="caption font-green-sharp">
		<i class="icon-plus font-green-sharp"></i>
		<span class="caption-subject bold uppercase"> New Account</span>
	</div>
	<div class="actions">
		<a title="" data-original-title="" href="javascript:;" class="btn btn-circle btn-icon-only btn-default fullscreen">
		</a>
	</div>
</div>
<div class="portlet-body form">
	<form role="form" id="form_add" method="post" action="" novalidate="novalidate" enctype="multipart/form-data">
		<div class="form-body">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="username" type="text" placeholder="This field is required" id="form_control_1" class="form-control">
						<label for="form_control_1">Username</label>
						<span class="help-block">Add user username here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="password" type="password" placeholder="This field is required" id="form_control_2" class="form-control">
						<label for="form_control_2">Password</label>
						<span class="help-block">Add user password here.</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input unline-input">
						<select id="form_control_6" class="form-control select2me" name="access_level">
							<option value="1">Administrator</option>
							<option value="2">Standard User</option>
							<option value="3">Viewing User</option>
						</select>
						<label for="form_control_6">Access Level</label>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					
				</div>
			</div>
		<div class="form-actions noborder">
			<button class="btn green-haze pull-right btn-save" type="submit">Save</button>
		</div>
		</div>
	</form>
</div>
</div>
<?php elseif($type == 'edit'): ?>
<div class="portlet light">
<div class="portlet-title">
	<div class="caption font-green-sharp">
		<i class="icon-pencil font-green-sharp"></i>
		<span class="caption-subject bold uppercase"> Edit Account</span>
	</div>
	<div class="actions">
		<a title="" data-original-title="" href="javascript:;" class="btn btn-circle btn-icon-only btn-default fullscreen">
		</a>
	</div>
</div>
<div class="portlet-body form">
	<?php $row_id = $data['row_id']; ?>
	<form role="form" id="form_update" method="post" action="" novalidate="novalidate" enctype="multipart/form-data" update_link="<?php echo base_url('accounts/update/'.$row_id); ?>">
		<div class="form-body">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" name="username" type="text" placeholder="This field is required" id="form_control_1" class="form-control">
						<label for="form_control_1">Username</label>
						<span class="help-block">Add user username here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="password" value="<?php echo isset($data['pasword']) ? $data['pasword'] : ''; ?>" type="password" placeholder="This field is required" id="form_control_2" class="form-control">
						<label for="form_control_2">Password</label>
						<span class="help-block">Add user password here.</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input unline-input">
						<select id="form_control_6" class="form-control select2me" name="access_level">
							<?php 
								$options = array(
									1=>'Administrator',
									2=>'Standard User',
									3=>'Viewing User'
								); 
							?>
							<?php $access = isset($data['access_level']) ? $data['access_level'] : ''; ?>
							<?php foreach($options as $k=>$v): ?>
								<?php if($k == $access): ?>
									<option value="<?php echo $k;?>" selected><?php echo $v;?></option>
								<?php else: ?>
									<option value="<?php echo $k;?>"><?php echo $v;?></option>
								<?php endif; ?>	
							<?php endforeach; ?>
						</select>
						<label for="form_control_6">Access Level</label>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					
				</div>
			</div>
		<div class="form-actions noborder">
			<button class="btn green-haze pull-right btn-save" type="submit">Save</button>
		</div>
		</div>
	</form>
</div>
</div>
<?php else: ?> <!-- VIEW -->
<div class="portlet light">
<div class="portlet-title">
	<div class="caption font-green-sharp">
		<i class="fa fa-file-text-o  font-green-sharp"></i>
		<span class="caption-subject bold uppercase"> View Job Order</span>
	</div>
	<div class="actions">
		<a title="" data-original-title="" href="javascript:;" class="btn btn-circle btn-icon-only btn-default fullscreen">
		</a>
	</div>
</div>
<div class="portlet-body">
	<div class="panel-group accordion" id="accordion1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#order_info">
			Order Information </a>
			</h4>
		</div>
		<div id="order_info" class="panel-collapse in">
			<div class="panel-body form">
				<form role="form" class="form-horizontal">
				<div class="form-body" style="margin:10px">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Item Type:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										<?php echo isset($data['type']) ? $data['type'] : ''; ?>
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Serial:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										<?php echo isset($data['serial']) ? $data['serial'] : ''; ?>
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Brand:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										<?php echo isset($data['brand']) ? $data['brand'] : ''; ?>
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Model:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										<?php echo isset($data['model']) ? $data['model'] : ''; ?>
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Due Date:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <?php echo isset($data['date_due']) ? $data['date_due'] : ''; ?>
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Costing:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										<?php echo isset($data['costing']) ? '&#8369; '.number_format($data['costing'],2) : ''; ?>

									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#customer_info">
			Customer Information </a>
			</h4>
		</div>
		<div id="customer_info" class="panel-collapse collapse">
			<div class="panel-body form">
			<form role="form" class="form-horizontal">
			<?php
				$customer = array();

				$customer_id = $data['customer_id'];
				$query = $this->db->get_where('customer', array('id' => $customer_id),1);
				if($query->num_rows() > 0){
					$customer = $query->row();
				}

			?>
			<div class="form-body" style="margin:10px">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Name:</label>
							<div class="col-md-9">
								<p class="form-control-static">
									  <?php echo $customer->name; ?>
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Email:</label>
							<div class="col-md-9">
								<p class="form-control-static">
									<a href="mailto:<?php echo $customer->email; ?>"><?php echo $customer->email; ?></a>
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Address:</label>
							<div class="col-md-9">
								<p class="form-control-static">
									 <?php echo $customer->address; ?>
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Telephone:</label>
							<div class="col-md-9">
								<p class="form-control-static">
									 	<?php echo $customer->telephone; ?>
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<!--/row-->
			</div>
			</form>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#status_remarks">
			Status &amp; Remarks </a>
			</h4>
		</div>
		<div id="status_remarks" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="table-scrollable">
				<table class="table table-hover">
				<thead>
				<tr>
					<th>Status</th>
					<th>Image</th>
					<th>Remarks</th>
					<th>Lastupdated</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$status = array(
					'',
					'<span class="label label-sm label-warning">pending</span>',
					'<span class="label label-sm label-success">completed</span>',
					'<span class="label label-sm label-success">released</span>',
					'<span class="label label-sm label-success">pullout</span>',
					'<span class="label label-sm label-success">paid</span>',
					'<span class="label label-sm label-warning">collectable</span>',
					'<span class="label label-sm label-info">on-process</span>'
				);

				$id = $this->uri->segment(3);

				$sql = "Select
						  order_status.*,
						  status.name
						From
						  order_status Inner Join
						  status
						    On order_status.status_id = status.id
						Where order_status.order_id = ".$id." Order By order_status.last_updated DESC";

				$query = $this->db->query($sql);

				if($query->num_rows() > 0){
					foreach($query->result() as $row){
						$image = $row->img ? $row->img : 'N/A';
						$remarks = $row->remarks ? $row->remarks : 'N/A';
						echo "<tr>";
							echo "<td>".$status[$row->status_id]."</td>";
							echo "<td>".$image."</td>";
							echo "<td>".$remarks."</td>";
							echo "<td><small>".date("F j, Y h:i A",strtotime($row->last_updated))."</small></td>";
						echo "</tr>";
					}
				}
				?>
				</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php endif; ?>
</div>