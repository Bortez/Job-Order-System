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
			<a href="<?php echo base_url('joborder'); ?>">Job Order</a>
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
		<span class="caption-subject bold uppercase"> New Job Order</span>
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
						<input name="jo_number" type="text" placeholder="This field is required" id="form_control_12" class="form-control">
						<label for="form_control_12">JO Number</label>
						<span class="help-block">Add jo number here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="type" type="text" placeholder="This field is required" id="form_control_1" class="form-control">
						<label for="form_control_1">Item Type</label>
						<span class="help-block">Add item type here. EX. cellphone,computer,etc.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="serial" type="text" placeholder="This field is required" id="form_control_2" class="form-control">
						<label for="form_control_2">Serial</label>
						<span class="help-block">Add item serial number here.</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea name="brand" id="form_control_3" placeholder="Item brand is optional" rows="3" class="form-control"></textarea>
						<label for="form_control_3">Brand</label>
						<span class="help-block">Add item brand name here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea id="form_control_4" name="model" placeholder="Item model is optional" rows="3" class="form-control"></textarea>
						<label for="form_control_4">Model</label>
						<span class="help-block">Add item model here.</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input has-success">
						<div class="input-icon right">
							<input id="form_control_5" name="date_due" type="text" placeholder="Due date is optional" class="form-control date date-picker" data-date-format="yyyy-mm-dd">
							<label for="form_control_5">Due Date</label>
							<!-- <span class="help-block">Choose Due date here.</span> -->
							<i class="icon-calendar"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input unline-input">
						<select id="form_control_6" class="form-control select2me" name="customer_id">
							<?php echo $this->load->view('options',array('source'=>'customer'),TRUE); ?>
						</select>
						<label for="form_control_6">Customer List</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<div class="input-group">
							<span class="input-group-addon">&#8369;</span>
							<input name="costing" placeholder="This field is required" type="text" class="form-control" id="form_control_7">
							<span class="input-group-addon">.00</span>
							<label for="form_control_7">Costing</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h3 class="form-section">Remarks Section</h3>
		<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea name="remarks" id="form_control_8" placeholder="Item remarks is optional" rows="3" class="form-control"></textarea>
						<label for="form_control_8">Remarks</label>
						<span class="help-block">Add item remarks name here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">

				</div>
		</div>
		<div class="form-actions noborder">
			<button class="btn green-haze pull-right btn-save" type="submit">Save</button>
		</div>
	</form>
</div>
</div>
<?php elseif($type == 'edit'): ?>
<div class="portlet light">
<div class="portlet-title">
	<div class="caption font-green-sharp">
		<i class="icon-pencil font-green-sharp"></i>
		<span class="caption-subject bold uppercase"> Edit Job Order</span>
	</div>
	<div class="actions">
		<a title="" data-original-title="" href="javascript:;" class="btn btn-circle btn-icon-only btn-default fullscreen">
		</a>
	</div>
</div>
<div class="portlet-body form">
	<?php $row_id = $data['row_id']; ?>
	<form role="form" id="form_update" method="post" action="" novalidate="novalidate" enctype="multipart/form-data" update_link="<?php echo base_url('joborder/update/'.$row_id); ?>">
		<div class="form-body">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="jo_number" type="text" placeholder="This field is required" id="form_control_12" class="form-control" value="<?php echo isset($data['jo_number']) ? $data['jo_number'] : ''; ?>">
						<label for="form_control_12">JO Number</label>
						<span class="help-block">Add jo number here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="type" type="text" placeholder="This field is required" id="form_control_1" class="form-control" value="<?php echo isset($data['type']) ? $data['type'] : ''; ?>">
						<label for="form_control_1">Item Type</label>
						<span class="help-block">Add item type here. EX. cellphone,computer,etc.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<input name="serial" type="text" placeholder="This field is required" id="form_control_2" class="form-control" value="<?php echo isset($data['serial']) ? $data['serial'] : ''; ?>">
						<label for="form_control_2">Serial</label>
						<span class="help-block">Add item serial number here.</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea name="brand" id="form_control_3" placeholder="Item brand is optional" rows="3" class="form-control"><?php echo isset($data['brand']) ? $data['brand'] : ''; ?></textarea>
						<label for="form_control_3">Brand</label>
						<span class="help-block">Add item brand name here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea id="form_control_4" name="model" placeholder="Item model is optional" rows="3" class="form-control"><?php echo isset($data['model']) ? $data['model'] : ''; ?></textarea>
						<label for="form_control_4">Model</label>
						<span class="help-block">Add item model here.</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input has-success">
						<div class="input-icon right">
							<input id="form_control_5" name="date_due" type="text" placeholder="Due date is optional" class="form-control date date-picker" data-date-format="yyyy-mm-dd" value="<?php echo isset($data['date_due']) ? $data['date_due'] : ''; ?>">
							<label for="form_control_5">Date</label>
							<!-- <span class="help-block">Choose Due date here.</span> -->
							<i class="icon-calendar"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input unline-input">
						<select id="form_control_6" class="form-control select2me" name="customer_id">
							<?php echo $this->load->view('options',array('source'=>'customer','selected'=>$data['customer_id']),TRUE); ?>
						</select>
						<label for="form_control_6">Customer List</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<div class="input-group">
							<span class="input-group-addon">&#8369;</span>
							<input name="costing" placeholder="This field is required" type="text" class="form-control" id="form_control_7" value="<?php echo isset($data['costing']) ? $data['costing'] : ''; ?>">
							<span class="input-group-addon">.00</span>
							<label for="form_control_7">Costing</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h3 class="form-section">Remarks Section</h3>
		<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea name="remarks" id="form_control_8" placeholder="Item remarks is optional" rows="3" class="form-control"><?php echo isset($data['remarks']) ? $data['remarks'] : ''; ?></textarea>
						<label for="form_control_8">Remarks</label>
						<span class="help-block">Add item remarks name here.</span>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input unline-input">
						<select id="form_control_9" class="form-control select2me" name="status_id">
							<?php echo $this->load->view('options',array('source'=>'status','selected'=>$data['status_id']),TRUE); ?>
						</select>
						<label for="form_control_9">Status</label>
					</div>
				</div>
		</div>
		<div class="form-actions noborder">
			<button class="btn green-haze pull-right btn-save" type="submit">Save</button>
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
			Order Information <small style="float:right;"><b>JO #: </b><?php echo isset($data['jo_number']) ? $data['jo_number'] : ''; ?></small></a>
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
				<table class="table table-striped table-bordered table-advance table-hover">
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
					'<span class="label label-sm label-info">on-process</span>',
					'<span class="label label-sm label-danger">follow-up</span>',
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