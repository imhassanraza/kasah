<?php $this->load->view('admin_common/header');?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php $this->load->view('admin_common/sidebar');?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<!-- BEGIN CONTENT BODY -->
		<div class="page-content" id="booking-sheet">
			<!-- BEGIN PAGE HEADER-->
			<div class="col-xs-12">
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase"> Manage Users</span>
								</div>
							</div>
							<div class="row">
								<?php if($this->session->flashdata('success_msg') != ''){ ?>
								<div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('error_msg') != ''){ ?>
								<div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
								<?php } ?>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="users" role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending"> ID </th>
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Name </th>
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Email </th>
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Status </th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($users as $user) { ?>
										<tr id="row_<?php echo $user['id'] ?>">
											<td style="width: 5%">
												<?php echo $user['id'] ?>
											</td>
											<td><?php echo $user['fullname'] ?></td>
											<td><?php echo $user['email'] ?></td>
											<td>
												<select data-op="update" data-column="is_approved" data-id="<?php echo $user['id'] ?>" data-table-name="users" name="is_approved" class="form-control form-filter input-sm status">
													<option <?php echo ($user['is_approved'] == "Y")?"selected":"" ?> value="Y">Approve</option>
													<option <?php echo ($user['is_approved'] == "N")?"selected":"" ?> value="N">Not Approve</option>
												</select>
											</td>
											<td style="text-align: center;">
												<div class="row-actions">
													<span class="document">
														<a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/manage_user/document/<?php echo $user['id'] ?>">View Document</a>
													</span>
													<span class="view">
														<a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/manage_user/view/<?php echo $user['id'] ?>">View</a>
													</span>
													<span class="edit">
														<a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/manage_user/edit/<?php echo $user['id'] ?>">Edit</a>
													</span>
													<span class="delete">
														<a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/manage_user/delete/<?php echo $user['id'] ?>">Delete</a>
													</span>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
		</div>
		<!-- END CONTENT BODY -->
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('admin_common/footer');?>

<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$("#users").dataTable({
			"ordering": false
		} );
	});

	$(document).on('change','.status',function(){
		var id = $(this).attr('data-id');
		var action = $(this).attr('data-op');
		var table = $(this).attr('data-table-name');
		var column = $(this).attr('data-column');
		var value = $(this).val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>admin/manage_user/ajax_call",
			data: 'id=' + id + '&table=' +table+ '&col='+column + '&action='+action + '&val='+value,
			success: function(response){
			}
		});
	});
</script>
