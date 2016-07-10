<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption font-green-sharp">
						<i class="fa fa-list-alt font-green-sharp"></i>List of Customers
					</div>
					<?php if($this->sess_acces == 1 || $this->sess_acces == 2): ?>
					<div class="actions">
						<a href="customers/add" class="btn default yellow-stripe">
							<i class="fa fa-plus"></i>
							<span class="hidden-480">New</span>
						</a>
					</div>
					<?php endif; ?>
				</div>
				<div class="portlet-body">
					<div class="table-container">
						<table class="table table-striped table-hover table-bordered table-responsive" id="grid">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Address</th>
									<th>Telephone</th>
									<?php if($this->sess_acces == 1 || $this->sess_acces == 2): ?>
										<th width="17%">Actions</th>
									<?php else: ?>
										<th style="display:none;">Actions</th>
									<?php endif; ?>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div> <!-- END OF PORTLET -->
		</div> <!-- END OF COL-MD-12 -->
	</div> <!-- END OF ROW -->
</div> <!-- END OF PAGE CONTENT -->