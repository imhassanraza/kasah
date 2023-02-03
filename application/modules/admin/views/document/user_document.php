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
									<span class="caption-subject bold "> Documents [ ID# <?php echo $detail['id'] ?> - <?php echo $detail['fullname'] ?> ]</span>
								</div>
								<div class="btn-group pull-right">
									<div class="btn-group pull-right">
										<button data-id="<?php echo $detail['id'] ?>" type="button" class="btn btn-success btn-sm" id="" data-toggle="modal" data-target="#myModal">Upload Document</button>
									</div>
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
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Document Name </th>
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Document Type </th>
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Document Size </th>
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Uploaded By </th>
											<th class="sorting" tabindex="0" aria-controls="sample_1"> Uploaded Date </th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach ($detail['documents'] as $doc) {?>
										<tr id="row_<?php echo $doc['id']?>">
											<td><?php echo $doc['id']; ?></td>
											<td><?php echo $doc['custom_name'] ?></td>
											<td><?php echo $doc['file_type']; ?></td>
											<td><?php echo $doc['file_size']; ?> kb</td>
											<td style="text-align: center;">
												<?php if ($doc['uploaded_by'] == "admin"){ ?>
												<span class="label label-xs label-success">
													Admin
												</span>
												<?php }else{ ?>
												<span class="label label-xs label-info">
													<?php echo $detail['fullname'] ?>
												</span>
												<?php } ?>
											</td>
											<td><?php echo $doc['uploaded_date']; ?></td>
											<?php 
											if(!empty($doc['custom_name'])){
												$file_name = $doc['custom_name'].$doc['file_type'] ;
											}else{
												$file_name = "document".$doc['file_type'] ;
											} ?>
											<td class="text-center">
												<div class="row-actions">
													<span class="download">
														<a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>uploads/shared_document/<?php echo $doc['file_name'] ?>" download="<?php echo $file_name ?>"><span class="fa fa-download"></span></a>
													</span>
													<span class="delete">
														<a data-id="<?php echo $doc['id']?>" class="btn btn-danger btn-xs deleteBtn" href="javascript:void(0)"><span class="glyphicon glyphicon-trash"></span></a>
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
<div id="show_model">
</div>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title">Upload Documents</h2>
			</div>
			<div class="modal-body">
				<form id="my-awesome-dropzone" action="<?php echo base_url() ?>admin/manage_user/uploadDocuments" class="dropzone">  
					<div class="preview-files fileupload dropzone-preview"></div>
					<div class="dz-message" data-dz-message><span>Click here to upload files</span></div>
					<div class="fallback"> <!-- this is the fallback if JS isn't working -->
						<input name="file" type="file" multiple />
					</div>
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $detail['id'] ?>">
				</form>
				<div id='preview-template' style='display: none;'>
					<div class='dz-preview dz-file-preview'>
						<div class='dz-image center-block'>
							<img data-dz-thumbnail=''>
						</div>
						<div class='dz-details'>
							<div class='dz-size margin-bottom-5' data-dz-size=''></div>
							<div class='dz-filename'>
								<span data-dz-name=''></span>
							</div>
						</div>
						<div class='dz-progress'>
							<span class='dz-upload' data-dz-uploadprogress=''></span>
						</div>
						<div class='dz-custom'>
							<input type="text" name="doc_name[]" class="form-control requiredFields" style="margin-top: 5px" placeholder="Document Name">
						</div>
						<div class='dz-error-message'>
							<span data-dz-errormessage=''></span>
						</div>
						<div class='dz-success-mark'>
							<span></span>
						</div>
						<div class='dz-error-mark' style='margin-top:-10px'>
							<span></span>
						</div>
						<a class='btn btn-default dz-remove' data-dz-remove=''>
							<i class='glyphicon glyphicon-trash'></i>
							Remove
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="submit-all" type="button" class="btn btn-success" data-dismiss="modal">Upload</button>
			</div>
		</div>

	</div>
</div>


<?php $this->load->view('admin_common/footer');?>

<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$("#users").dataTable({
			"ordering": false
		} );
	});

	$('.deleteBtn').click(function(){
		var id = $(this).attr('data-id');
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this file!",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "Cancel"
		},
		function(isConfirm) {
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>admin/manage_user/deleteDocument",
					data: 'id=' + id ,
					success: function(response){
						$('#row_'+id).remove();
						swal("Deleted!", "This document is delete.", "success");
					}
				});
			}
		});
	})
</script>
<script type="text/javascript">
	var count = 0;
  Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        autoProcessQueue: false,
        previewTemplate: document.getElementById('preview-template').innerHTML,
        previewsContainer: ".dropzone-preview",

        // The setting up of the dropzone
        init: function() {
        	var myDropzone = this;

        	myDropzone.on("sending", function(file, xhr, formData) {
        		var name = "post_data";
        		var doc_name = document.getElementsByName("doc_name[]")[count].value;
        		formData.append(name, doc_name);
        		count++;
        	});

        	myDropzone.on("complete", function(file, xhr, formData) {
        		myDropzone.processQueue();
        	});
        	myDropzone.on("queuecomplete", function (file) {
        		var id =  $('#user_id').val();
        		$.ajax({
        			type: "POST",
        			url: "<?php echo base_url(); ?>admin/manage_user/mailFunction",
        			data: 'id=' + id ,
        			success: function(response){
        				if (response == "done") {
        					location.reload();
        				}
        			}
        		});
        	});
         // Here's the change from enyo's tutorial...

         $("#submit-all").click(function (e) {
         	e.preventDefault();
         	e.stopPropagation();
         	var $emptyFields = $('.requiredFields').filter(function() {
         		return $.trim(this.value) === "";
         	});

         	if($emptyFields.length<2)
         	{
         		myDropzone.processQueue();
         	}else{
         		swal('Error','Please enter name for all the documents.','error');
         	}
         });

     }

 }
</script>