<?php $this->load->view('admin_common/header'); ?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php $this->load->view('admin_common/sidebar'); ?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<!-- BEGIN CONTENT BODY -->
		<div class="page-content" id="booking-sheet">
			<div class="row">
				<?php if($this->session->flashdata('success_msg') != ''){ ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
				<?php } ?>
				<?php if($this->session->flashdata('error_msg') != ''){ ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Edit buyer Application </div>
							</div>
							<div class="portlet-body form">
								<form action="<?php echo base_url(); ?>admin/buyer/update" id="add_form" method="POST" class="form-horizontal" enctype='multipart/form-data'>
									<div class="form-body">
										<div class="form-group">
											<label class="col-md-3 control-label">First Name</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="firstname" value="<?php echo $detail['firstname'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Middle Initial</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="middleinitial" value="<?php echo $detail['middleinitial'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Last Name</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="lastname" value="<?php echo $detail['lastname'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Suffix</label>
											<div class="col-md-8">
												<select name="suffix" id="suffix" class="form-control my-select">
													<option <?php echo ($detail['suffix'] == "none" )?"selected":"" ?> value="none">None</option>
													<option <?php echo ($detail['suffix'] == "2" )?"selected":"" ?> value="2">II</option>
													<option <?php echo ($detail['suffix'] == "3" )?"selected":"" ?> value="3">III</option>
													<option <?php echo ($detail['suffix'] == "4" )?"selected":"" ?> value="4">IV</option>
													<option <?php echo ($detail['suffix'] == "5" )?"selected":"" ?> value="5">V</option>
													<option <?php echo ($detail['suffix'] == "jr" )?"selected":"" ?> value="jr">Jr</option>
													<option <?php echo ($detail['suffix'] == "sr" )?"selected":"" ?> value="sr">Sr</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Email</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="email" value="<?php echo $detail['app_email'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Home Address</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="homeaddress" value="<?php echo $detail['homeaddress'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Unit/Aprt#</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="unitnumber" value="<?php echo $detail['unitnumber'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">State</label>
											<div class="col-md-8">
												<select class="form-control" name="state_app">
													<option value="">Select State</option>
													<?php  
													$states = getAll('ref_states');
													foreach ($states as $state) {
														if ($detail['app_state_id'] == $state['id']) {
															$check = "selected";
														}else{
															$check = "";
														}
														?>
														<?php if ($state['state_code'] == "CA"): ?>
															<option <?php echo $check ?> value="<?php echo $state['id'] ?>"><?php echo $state['state_name']; ?></option>
														<?php endif ?>
														<?php 
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">City Name</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="city_name" value="<?php echo $detail['app_city_name'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Zip Code</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="zipcode" value="<?php echo $detail['zipcode'] ?>">
											</div>
										</div>
										<hr>
										<div class="form-group">
											<label class="col-md-3 control-label">Does your household have any of the following acceptable forms to verify your income?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['accepted_form'] == "Y")?"checked='checked'":""; ?> type="radio" name="accepted_form" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['accepted_form'] == "N")?"checked='checked'":""; ?> type="radio" name="accepted_form" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label"></label>
											<div class="col-md-8">
												<?php 
												$froms = getAll('ref_forms');
												foreach ($froms as $form) {?>
												<label class="col-xs-12"><?php echo $form['form_name'] ?></label>
												<?php } ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Does your household make a minimum of $50,000 per year?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['yearly_amount'] == "Y")?"checked='checked'":""; ?> type="radio" name="yearly_amount" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['yearly_amount'] == "N")?"checked='checked'":""; ?> type="radio" name="yearly_amount" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Do you have at least twice your target rent amount available in a bank account?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['rent_amount'] == "Y")?"checked='checked'":""; ?> type="radio" name="rent_amount" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['rent_amount'] == "N")?"checked='checked'":""; ?> type="radio" name="rent_amount" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Do you or any household member have an open/unsatisfied Chapter 7 Bankruptcy or pending bankruptcy? If Bankruptcy is satisfied or discharged please answer 'no:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['bankruptcy'] == "Y")?"checked='checked'":""; ?> type="radio" name="bankruptcy" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['bankruptcy'] == "N")?"checked='checked'":""; ?> type="radio" name="bankruptcy" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Have you or any household member ever been evicted or have or had any outstanding apartment collections?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['apartment_collections'] == "Y")?"checked='checked'":""; ?> type="radio" name="apartment_collections" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['apartment_collections'] == "N")?"checked='checked'":""; ?> type="radio" name="apartment_collections" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Are you or any household member a registered sex offender or sexual predator or otherwise subject to reporting requirements of any state, territorial, or tribal sex offender registry?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['sex_offender'] == "Y")?"checked='checked'":""; ?> type="radio" name="sex_offender" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['sex_offender'] == "N")?"checked='checked'":""; ?> type="radio" name="sex_offender" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Are you or any household member currently in default under a lease agreement?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['lease_agreement'] == "Y")?"checked='checked'":""; ?> type="radio" name="lease_agreement" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['lease_agreement'] == "N")?"checked='checked'":""; ?> type="radio" name="lease_agreement" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Have you or any household member ever been reported for a damage to a property in the last 5 years?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['reported_damage'] == "Y")?"checked='checked'":""; ?> type="radio" name="reported_damage" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['reported_damage'] == "N")?"checked='checked'":""; ?> type="radio" name="reported_damage" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Do you intend to carry on any business, profession, or trade of any kind from home (i.e. will anyone be visiting the home for business purposes)?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['home_business'] == "Y")?"checked='checked'":""; ?> type="radio" name="home_business" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['home_business'] == "N")?"checked='checked'":""; ?> type="radio" name="home_business" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Do you have any pets?:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['have_pets'] == "Y")?"checked='checked'":""; ?> type="radio" name="have_pets" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['have_pets'] == "N")?"checked='checked'":""; ?> type="radio" name="have_pets" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">I understand that Kasah’ process can generally take 35-45 days from the time Kasah’ goes under contract to buy a home until I may be able to move in. I have sufficient time in my moving plans for this general timeframe and understand it may change depending on the circumstances of a particular situation:</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['process_days'] == "Y")?"checked='checked'":""; ?> type="radio" name="process_days" value="Y"> Yes
													<span></span>
												</label>
												<label class="mt-checkbox">
													<input <?php echo ($detail['process_days'] == "N")?"checked='checked'":""; ?> type="radio" name="process_days" value="N"> No
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">State of Interest:</label>
											<div class="col-md-8">
												<select class="form-control" name="state_id">
													<option value="">Select State</option>
													<?php  
													$states = getAll('ref_states');
													foreach ($states as $state) {
														if ($detail['ba_state_id'] == $state['id']) {
															$check = "selected";
														}else{
															$check = "";
														}
														?>
														<?php if ($state['state_code'] == "CA"): ?>
															<option <?php echo $check ?> value="<?php echo $state['id'] ?>"><?php echo $state['state_name']; ?></option>
														<?php endif; ?>
														<?php 
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">City of Interest:</label>
											<div class="col-md-8">
												<select class="form-control" name="city_id">
													<option value="">Select City</option>
													<?php  
													$cities = getAll('ref_cities');
													foreach ($cities as $city) {
														if ($detail['city_id'] == $city['id']) {
															$check = "selected";
														}else{
															$check = "";
														}
														?>
														<?php if ($city['city_name'] == "San Diego" && $city['state_code'] == "CA"): ?>
															<option <?php echo $check ?> value="<?php echo $city['id'] ?>"><?php echo $city['city_name']; ?></option>
														<?php endif ?>
														<?php 
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Target rent/month:</label>
											<div class="col-md-8">
												<input class="form-control" type="text" name="rent_permonth" value="<?php echo $detail['rent_permonth'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Desired Date to move in:</label>
											<div class="col-md-8">
												<div id="datetimepicker" class="input-group date form_datetime">
													<input name="movein_date" type="text" size="16" class="form-control" value="<?php echo date('F d Y H:i',strtotime($detail['movein_date'])) ?>">
													<span class="input-group-btn">
														<button class="btn default date-reset" type="button">
															<i class="fa fa-times"></i>
														</button>
														<button class="btn default date-set" type="button">
															<i class="fa fa-calendar"></i>
														</button>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">This application MUST BE COMPLETED by the applicant. By checking this box, under penalties of applicable laws, I certify that I am the actual applicant completing this application and that all information I provided is true, complete, and correct. *</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['disclosure'] == "Y")?"checked='checked'":""; ?> type="radio" name="disclosure" value="Y"> Yes
													<span></span>
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">I have read and agree to the Kasah Application Policies</label>
											<div class="col-md-8">
												<label class="mt-checkbox">
													<input <?php echo ($detail['policies'] == "Y")?"checked='checked'":""; ?> type="radio" name="policies" value="Y"> Yes
													<span></span>
												</label>
											</div>
										</div>
										<input type="hidden" name="app_id" value="<?php echo $detail['app_id'] ?>">
										<hr>
										<div class="form-group">
											<div class="col-md-3">
												<h3>Documents</h3>
											</div>
										</div>
										<div class="form-group">
											<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="buyer" role="grid" aria-describedby="sample_1_info">
												<thead>
													<tr role="row">
														<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending"> ID </th>
														<th class="sorting" tabindex="0" aria-controls="sample_1"> Name </th>
														<th class="sorting" tabindex="0" aria-controls="sample_1"> Document Type </th>
														<th class="sorting" tabindex="0" aria-controls="sample_1"> Annual Amount </th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($detail['document'] as $doc) { ?>
													<tr id="row_<?php echo $doc['doc_id'] ?>">
														<td><?php echo $doc['doc_id'] ?></td>
														<td><?php echo $doc['file_name'] ?></td>
														<td><?php echo $doc['form_name'] ?></td>
														<td><?php echo $doc['price'] ?></td>
														<td>
															<span class="edit">
																<a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>uploads/document/<?php echo $doc['file_name'] ?>" download><span class="fa fa-download"></span></a>
															</span>
															<span class="delete">
																<a data-id="<?php echo $doc['doc_id'] ?>" class="btn btn-danger btn-xs dltBtn" href="javascript:void(0)"><span class="glyphicon glyphicon-trash"></span></a>
															</span>
														</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-offset-3 col-md-9">
													<button type="submit" class="btn green">Save</button>
													<a href="<?php echo base_url() ?>admin/buyer/applications" class="btn grey-salsa btn-outline">Cancel</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('admin_common/footer'); ?>
	<script src="<?php echo base_url() ?>assets/js/jquery.colorbox.js"></script>
	<script type="text/javascript">
		$('#datetimepicker').datetimepicker({
			format: 'MM dd yyyy hh:ii'
		});
		$(document).on('click','.dltBtn',function(){
			var id = $(this).attr('data-id');
			$.ajax({
				type: "POST",
				data: 'id='+id,
				url: '<?php echo base_url() ?>admin/buyer/deleteDocument',
				success: function(output){
					$('#row_'+ id).remove();
				}
			})
		})

		$('#add_form').validate();
	</script>