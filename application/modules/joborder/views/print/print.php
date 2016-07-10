<div class="page-content">
	<div class='col-md-12 print-preview'>
		<row>
			<div class='col-md-12 text-center'>
				<a><img src="<?php echo base_url('assets/media/zt-black-logo.png'); ?>" alt="logo" class="logo-default" width="250" height="auto"/></a>
			</div>
		</row>
		<row>
			<div class='col-md-12 text-center header-text'>
				<p>JOHN NICOLAS A. JAVIER - Prop.</p>
				<p>Ground Floor Plaza Mart Mall, San Juan St., Bacolod City</p>
				<p>TIN 921-740-012-00 VAT • Tel. No. 433-8797</p>
			</div>
		</row>
		<row>
			<div class='col-md-6'><h3><b>JOB ORDER</b></h3></div>
			<div class='col-md-6 text-right'><h3><b>No. </b><span style="color:red;"><?php echo isset($data['jo_number']) ? $data['jo_number'] : 'N/A' ?></span></h3></div>
		</row>
		<row>
			<div class='col-md-8 b-top b-left b-bottom b-right mar'><b>Customer:</b> Chester Paul O. Danao</div>
			<div class='col-md-4 b-top b-right b-bottom mar'><b>Date:</b> <?php echo isset($data['date_due']) ? date("F j, Y",strtotime($data['date_due'])) : 'N/A' ?></div>
		</row>
		<row>
			<div class='col-md-8 b-left b-bottom b-right mar'><b>Address:</b> Bacolod City</div>
			<div class='col-md-4 b-right b-bottom mar'><b>Tel No:</b> 09494117192</div>
		</row>
		<row>
			<div class='col-md-6 b-left b-bottom b-right mar'><b>Brand &amp; Model:</b> <?php echo isset($data['brand']) ? $data['brand'] : 'N/A' ?></div>
			<div class='col-md-6 b-right b-bottom mar'><b>IMEI / Serial No.</b> <?php echo isset($data['serial']) ? $data['serial'] : 'N/A' ?></div>
		</row>
		<row>
			<div class='col-md-6 b-left b-right mar' style="line-height:20px"><b>Warranty Information:</b> </div>
			<div class='col-md-6 b-right mar'>

				<div class='col-md-6'>
					<div class='md-checkbox'>
						<input id="checkbox6" type="checkbox" class="md-check">
						<label for="checkbox6">
							<span></span>
							<span class="check"></span>
							<span class="box"></span>
							Backjob
						</label>
					</div>
				</div>
				<div class='col-md-6'>
					<b>Previous J.O.</b>
				</div>

			</div>
		</row>
		<row>
			<div class='col-md-12 text-center b-top b-left b-right b-bottom mar'><b>ACCESSORIES</b></div>
		</row>
		<row class="md-checkbox-inline">
			<div class="col-md-2 b-left mar">
				<div class='md-checkbox'>
					<input id="checkbox1" type="checkbox" class="md-check">
					<label for="checkbox1">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Battery
					</label>
				</div>
			</div>
			<div class="col-md-2 mar">
				<div class='md-checkbox'>
					<input id="checkbox2" type="checkbox" class="md-check">
					<label for="checkbox2">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Charger
					</label>
				</div>
			</div>
			<div class="col-md-3 mar">
				<div class='md-checkbox'>
					<input id="checkbox3" type="checkbox" class="md-check">
					<label for="checkbox3">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Memory Card
					</label>
				</div>
			</div>
			<div class="col-md-3 mar">
				<div class='md-checkbox'>
					<input id="checkbox4" type="checkbox" class="md-check">
					<label for="checkbox4">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Sim
					</label>
				</div>
			</div>
			<div class="col-md-2 b-right mar">
				<div class='md-checkbox'>
					<input id="checkbox5" type="checkbox" class="md-check">
					<label for="checkbox5">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Others
					</label>
				</div>
			</div>
			<!-- <div class='col-md-2'>
				<input type="checkbox"><b>Charger</b>
			</div>
			<div class='col-md-3'>
				<input type="checkbox"><b>Memory Card</b>
			</div>
			<div class='col-md-2'>
				<input type="checkbox"><b>Slim</b>
			</div>
			<div class='col-md-3'>
				<input type="checkbox"><b>Others</b>
			</div> -->
		</row>
		<row>
			<div class='col-md-12 text-center b-top b-left b-bottom b-right mar'><b>COMPLAINTS</b></div>
		</row>
		<row>
			<div class='col-md-12 b-left b-right b-bottom mar'>&nbsp;</div>
		</row>
		<row>
			<div class='col-md-12 text-center b-left b-right b-bottom mar'><b>REMARKS</b></div>
		</row>
		<row>
			<div class='col-md-12 b-left b-right b-bottom mar'>&nbsp;</div>
		</row>
		<row>
			<div class='col-md-12 b-left b-right b-bottom mar terms_condition'>
				<p>TERMS &amp; CONDITIONS</p>
				<p>I. BEARER OF THIS UNIT CERTIFIES THAT:</p>
				<ul class='terms'>
					<li>1. I have authorized ZEAL TEXT TRADING to perform the jobs above.</li>
					<li>2. Agree to terms and conditions listed here under.</li>
					<ul>
						<li>a) ZEAL TEXT TRADING shall not be responsible for the loss or damage of this unit in the event of robbery, fire, typhoon, flood and similar natural calamities or acts of God </li>
						<li>b) ZEAL TEXT TRADING shall not be responsible for any loss of data, phone book memory, configuration, and other phone settings while it is under repair. </li>
						<li>c) The complaints so stated above will not in any way limit ZEAL TEXT TRADING to do repairs it deemed necessary. I will pay for all repair costs, labor and parts incurred in the repair of my unit even in the case of my unit is subsequently diagnosed as beyond repair.</li>
						<li>d) Failure to neglect to confirm or claim any job within 30 days from date of receipt shall be deemed as an abandonment of customer's right or interest thereon. In such case, ZEAL TEXT TRADING shall have the right to dispose of unit(s) in any manner it deems fit to recover expenses to repair and safekeeping without on the part of ZEAL TEXT TRADING for such act. </li>
					    <li>e) Unit(s) will be release only upon presentation of this documents. ZEAL TEXT TRADING will not release the unit(s) to bearer other than one named on this documents unless there is a written authorization from the owner. </li>
					    <li>f) All repairs will have a corresponding diagnostic fee of P150.00 in the event that the unit was deemed pull-out or breyond economical repair. </li>
					</ul>
				</ul>
			</div>
		</row>
		<row>
			<div class='col-md-6 b-left mar'><b>CONFORME:</b></div>
			<div class='col-md-6 b-right mar'><b>RECEIVED BY:</b></div>
		</row>
		<row>
			<div class='col-md-6 b-left mar'>________________________________</div>
			<div class='col-md-6 b-right mar'>________________________________</div>
		</row>
		<row>
			<div class='col-md-6 b-left b-bottom mar'><small>Customer's Signature</small></div>
			<div class='col-md-6 b-right b-bottom mar'>&nbsp;</div>
		</row>
		<row>
			<div class='col-md-6 text-left'>
				<a onclick="javascript:window.close()" class="btn btn-lg gray hidden-print margin-bottom-5" style="margin-top:10px">Cancel</a>
			</div>
			<div class='col-md-6 text-right'>
				<a onclick="javascript:window.print();" class="btn btn-lg blue hidden-print margin-bottom-5" style="margin-top:10px">Print <i class="fa fa-print"></i></a>
			</div>
		</row>
	</div>
	
	<div style="clear:both;"></div>
</div> <!-- END OF PAGE CONTENT -->