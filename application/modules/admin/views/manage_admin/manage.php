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
                                    <span class="caption-subject bold uppercase"> Manage Administrator</span>
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
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="ent_categories" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending"> ID </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Username </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Email </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Created By </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Created Date </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($admins as $admin) { ?>
                                        <tr id="row_<?php echo $admin['id'] ?>">
                                            <td style="width: 5%">
                                                <?php echo $admin['id'] ?>
                                            </td>
                                            <td><?php echo $admin['username'] ?></td>
                                            <td><?php echo $admin['email'] ?></td>
                                            <td><?php echo $admin['created_by'] ?></td>
                                            <td><?php echo date('m-d-Y',strtotime($admin['created_date'])); ?></td>
                                            <td style="text-align: center;">
                                                <div class="row-actions">
                                                    <span class="delete">
                                                        <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/manage_admin/view/<?php echo $admin['id'] ?>">View</a>
                                                    </span>
                                                    <span class="edit">
                                                        <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/manage_admin/edit/<?php echo $admin['id'] ?>">Edit</a>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/manage_admin/delete/<?php echo $admin['id'] ?>">Delete</a>
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
        $("#ent_categories").dataTable({
            "ordering": false
        } );
    });

    $(document).on('click','.delete_form',function(){
        var form_id = $(this).attr('data-form-id');
        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/ent_category/delete_record",
                data: 'id=' + form_id,
                success: function(response){
                    if(response == '1'){
                        $('#row_' + form_id).remove();
                        setTimeout(function(){
                            swal({
                                title: 'Data Deleted!',
                                type: "success"
                            });
                        }, 900);
                    }
                }
            });
        }
        );
    });
</script>
