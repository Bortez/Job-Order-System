<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption font-green-sharp">
						<i class="fa fa-list-alt font-green-sharp"></i>List of Lay Away
					</div>
					<?php if($this->sess_acces == 1 || $this->sess_acces == 2): ?>
					<div class="actions">
						<a href="layaway/add" class="btn default yellow-stripe">
							<i class="fa fa-plus"></i>
							<span class="hidden-480">New</span>
						</a>
					</div>
					<?php endif;?>
				</div>
				<div class="portlet-body">
					<div class="table-container">
						<table class="table table-striped table-hover table-bordered table-responsive" id="grid">
							<thead>
								<tr>
									<th>Customer</th>
									<th>Description</th>
									<th>OR #</th>
									<th>Date</th>
									<th>Total Amount</th>
									<th>Status</th>
									<th width="20%">Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div> <!-- END OF PORTLET -->
		</div> <!-- END OF COL-MD-12 -->
	</div> <!-- END OF ROW -->
</div> <!-- END OF PAGE CONTENT -->