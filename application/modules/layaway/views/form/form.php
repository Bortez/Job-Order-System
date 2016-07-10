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
			<a href="<?php echo base_url('layaway'); ?>">Lay Away</a>
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
		<span class="caption-subject bold uppercase"> New Lay Away</span>
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
					<div class="form-group form-md-line-input unline-input">
						<select id="form_control_6" class="form-control select2me" name="customer_id">
							<?php echo $this->load->view('options',array('source'=>'customer'),TRUE); ?>
						</select>
						<label for="form_control_6">Customer List</label>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<!-- <div class="form-group form-md-line-input">
						<input name="or_number" type="text" placeholder="OR number is required" id="form_control_2" class="form-control">
						<label for="form_control_2">OR Number</label>
						<span class="help-block">Add item order number here.</span>
					</div> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea name="description" id="form_control_3" placeholder="Item description is optional" rows="3" class="form-control"></textarea>
						<label for="form_control_3">Description</label>
						<span class="help-block">Add item description here.</span>
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
		<span class="caption-subject bold uppercase"> Edit Lay Away</span>
	</div>
	<div class="actions">
		<a title="" data-original-title="" href="javascript:;" class="btn btn-circle btn-icon-only btn-default fullscreen">
		</a>
	</div>
</div>
<div class="portlet-body form">
	<?php $row_id = $data['row_id']; ?>
	<?php $cus_id = $data['customer_id']?>
	<form role="form" id="form_update" method="post" action="" novalidate="novalidate" enctype="multipart/form-data" update_link="<?php echo base_url('layaway/update/'.$row_id); ?>">
		<div class="form-body">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input unline-input">
						<select id="form_control_6" class="form-control select2me" name="customer_id">
							<?php echo $this->load->view('options',array('source'=>'customer','selected'=>$cus_id),TRUE); ?>
						</select>
						<label for="form_control_6">Customer List</label>
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<!-- <input value="<?php echo isset($data['or_number']) ? $data['or_number'] : ''; ?>" name="or_number" type="text" placeholder="OR number is required" id="form_control_2" class="form-control">
						<label for="form_control_2">OR Number</label>
						<span class="help-block">Add item order number here.</span> -->
						<?php $status = array(0=>'Active',1=>'Canceled',2=>'Claim'); ?>
						<select id="form_control_6" class="form-control select2me" name="status">
							<?php foreach($status as $k=>$v): ?>
								<?php if($k == $data['status']): ?>
									<option value="<?php echo $k; ?>" selected><?php echo $v;?></option>
								<?php else: ?>
									<option value="<?php echo $k; ?>"><?php echo $v;?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
						<label for="form_control_6">Status</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="form-group form-md-line-input">
						<textarea name="description" id="form_control_3" placeholder="Item description is optional" rows="3" class="form-control"><?php echo isset($data['description']) ? $data['description'] : ''; ?></textarea>
						<label for="form_control_3">Description</label>
						<span class="help-block">Add item description here.</span>
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
		<span class="caption-subject bold uppercase"> View Lay Away</span>
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
			Payment Information </a>
			</h4>
		</div>
		<div id="order_info" class="panel-collapse in">
			<div class="panel-body">
				<a href="javascript:;" class="btn default yellow-stripe" id="editable_new">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">Add</span>
				</a>
				<div class="table-responsive">
				<table class="table table-condensed table-hover" id="editable">
				<thead>
				<tr>
					<th>ID</th>
					<th>Layaway ID</th>
					<th>Payment Date</th>
					<th width="20%">Payment Date</th>
					<th width="20%">OR Number</th>
					<th width="20%">Amount</th>
					<?php if($this->sess_acces == 1 || $this->sess_acces == 2): ?>
					<th width="10%">Edit</th>
					<th width="10%">Delete</th>
					<?php endif;?>
				</tr>
				</thead>
				<tbody>
				<?php

				$id = $this->uri->segment(3);

				$sql = "Select * From payment Where lay_away_id = ".$id." Order by payment_date desc";

				$query = $this->db->query($sql);
				$grand_total = 0;
				if($query->num_rows() > 0){
					foreach($query->result() as $row){
						
						$amm = $row->amount;
						echo "<tr>";
							echo "<td>".$row->id."</td>";
							echo "<td>".$row->lay_away_id."</td>";
							echo "<td>".$row->payment_date."</td>";
							echo "<td>".date("F j, Y",strtotime($row->payment_date))."</td>";
							echo "<td>".$row->or_number."</td>";
							echo "<td>".'&#8369; '.number_format($amm,2)."</td>";
						if($this->sess_acces == 1 || $this->sess_acces == 2){
							echo "<td><a class=\"edit\" href=\"javascript:;\">Edit </a></td>";
							echo "<td><a class=\"delete\" href=\"javascript:;\">Delete </a></td>";
						}
						echo "</tr>";

						$grand_total = $grand_total + $amm;
					}

					echo "<tr>";
						echo "<td></td><td></td><td></td>";
						echo "<td class=\"highlight\"><a>Total Amount: </a></td>";
						echo '<td></td>';
						echo "<td><b>".'&#8369; <span id="total_payment">'.number_format($grand_total,2)."</span></b></td>";
						if($this->sess_acces == 1 || $this->sess_acces == 2){
							echo "<td></td><td></td>";
						}
					echo "</tr>";
				}
				?>
				</tbody>
				</table>
			</div>
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
</div>
</div>
</div>
<?php endif; ?>
</div>