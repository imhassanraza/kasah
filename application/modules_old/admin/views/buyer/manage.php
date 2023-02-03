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
                                    <span class="caption-subject bold uppercase"> Manage Buyer Applications</span>
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
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="buyer" role="grid" aria-describedby="sample_1_info">
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
                                        <?php foreach ($details as $detail) { ?>
                                        <tr id="row_<?php echo $detail['app_id'] ?>">
                                            <td style="width: 5%">
                                                <?php echo $detail['app_id'] ?>
                                            </td>
                                            <td><?php echo $detail['fullname'] ?></td>
                                            <td><?php echo $detail['email'] ?></td>
                                            <?php if ($detail['b_is_approved'] == "Y"){ ?>
                                            <td style="text-align: center;">
                                                <span class="label label-sm label-success"> Approved </span>
                                            </td>
                                            <?php }elseif ($detail['is_complete'] == "Y") {?>
                                            <td style="width: 18%">
                                                <div class="btn-group btn-group-circle div_<?php echo $detail['app_id'] ?>">
                                                    <button type="button"data-op="update" data-column="is_approved" data-id="<?php echo $detail['app_id'] ?>" data-table-name="buyer_application" name="is_approved" data-val="Y" class="margr0 btn btn-outline btn_<?php echo $detail['app_id'] ?> green btn-sm status">Approve</button>

                                                    <button type="button" data-op="update" data-column="is_approved" data-id="<?php echo $detail['app_id'] ?>" data-table-name="buyer_application" data-val="N" name="is_approved" class="btn btn-outline btn_<?php echo $detail['app_id'] ?> red btn-sm status">Reject</button>
                                                </div>
                                            </td>
                                            <?php } ?>
                                    <!-- <td>
                                        <select data-op="update" data-column="is_approved" data-id="<?php echo $detail['app_id'] ?>" data-table-name="buyer_application" name="is_approved" class="form-control form-filter input-sm status">
                                            <option <?php echo ($detail['b_is_approved'] == "Y")?"selected":"" ?> value="Y">Approve</option>
                                            <option <?php echo ($detail['b_is_approved'] == "N")?"selected":"" ?> value="N">Not Approve</option>
                                        </select>
                                    </td> -->
                                    <td style="text-align: center;">
                                        <div class="row-actions">
                                            <span class="view">
                                                <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/buyer/view/<?php echo $detail['app_id'] ?>">View</a>
                                            </span>
                                            <span class="edit">
                                                <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/buyer/edit/<?php echo $detail['app_id'] ?>">Edit</a>
                                            </span>
                                            <span class="delete">
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/buyer/delete/<?php echo $detail['app_id'] ?>">Delete</a>
                                            </span>
                                            <span class="emailtobuyer">
                                                <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/buyer/email/<?php echo $detail['app_id'] ?>">Email To Buyer</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#buyer").dataTable({
            "ordering": false
        } );
    });

    $(document).on('click','.status',function(){
        var id = $(this).attr('data-id');
        var action = $(this).attr('data-op');
        var table = $(this).attr('data-table-name');
        var column = $(this).attr('data-column');
        var value = $(this).attr('data-val');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/buyer/ajax_call",
            data: 'id=' + id + '&table=' +table+ '&col='+column + '&action='+action + '&val='+value,
            success: function(response){
                if(value == 'Y'){
                    swal("Approved!", "The record has been approved successfully.", "success");
                    $('.div_'+id).parent('td').addClass('text-center');
                    $('.div_'+id).replaceWith('<span class="label label-sm label-success"> Approved </span>');
                }else if(value == 'N'){
                    swal("Rejected!", "The record has been rejected.", "error");
                    $('#row_'+id).remove();
                }
            }
        });
    });
</script>