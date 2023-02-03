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
               <!--  <div class="row">
                    <h2 class="first-h2">Manage Properties</h2>
                </div> -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase"> Manage Properties</span>
                                </div>
                                <div class="btn-group pull-right">
                                    <select id="view_changer" class="table-group-action-input form-control input-inline input-small input-sm">
                                        <option value="">Select...</option>
                                        <option value="draft">Draft</option>
                                        <option value="is_approved">Published</option>
                                        <option value="publish_approve">Waiting for Approval</option>
                                        <option value="is_sold">Sold</option>
                                    </select>
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
                            <div class="portlet-body" id="ajax_return">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending"> ID </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Seller Name </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Property Type </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Home Worth </th>
                                            <th style="width: 18%" class="sorting" tabindex="0" aria-controls="sample_1"> Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listing as $list) { ?>
                                        <tr id="row_<?php echo $list['sell_id'] ?>">
                                            <td style="width: 5%">
                                                <?php echo $list['sell_id'] ?>
                                            </td>
                                            <td><?php echo $list['fullname']?></td>
                                            <td><?php echo $list['property_type'] ?></td>
                                            <td><?php echo "$".number_format($list['home_worth']) ?></td>
                                            <?php if ($list['draft'] == "Y") {?>
                                            <td class="text-center">
                                                <span class="label label-sm label-warning"> Draft </span>
                                            </td>
                                            <?php }elseif ($list['publish_approve'] == "Y") {?>
                                            <td>
                                                <div class="btn-group btn-group-circle div_<?php echo $list['sell_id'] ?>">
                                                    <button type="button" data-id="<?php echo $list['sell_id'] ?>" data-value="Y" class="margr0 btn btn-outline btn_<?php echo $list['sell_id'] ?> green btn-sm status">Approve</button>
                                                    <button type="button" data-id="<?php echo $list['sell_id'] ?>" data-value="N" class="btn btn-outline btn_<?php echo $list['sell_id'] ?> red btn-sm status">Reject</button>
                                                </div>
                                            </td>
                                            <?php }elseif ($list['is_sold'] == "Y") {?>
                                            <td style="text-align: center;">
                                                <span class="label label-sm label-danger"> Sold </span>
                                            </td>
                                            <?php }elseif ($list['is_approved'] == "Y") {?>
                                            <td style="text-align: center;">
                                                <span class="label label-sm label-success"> Published </span>
                                            </td>
                                            <?php }?>
                                            <td class="text-center">
                                                <div class="row-actions">
                                                    <span class="view">
                                                        <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/listing/view/<?php echo $list['sell_id'] ?>">View</a>
                                                    </span>
                                                    <?php if ($list['draft'] != "Y" && $list['is_sold'] != "Y" ) {?>
                                                    <span class="edit">
                                                        <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/listing/edit/<?php echo $list['sell_id'] ?>">Edit</a>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/listing/delete/<?php echo $list['sell_id']?>">Delete</a>
                                                    </span>
                                                    <?php if ($list['is_approved'] == "Y"): ?>
                                                        <span class="email">
                                                            <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/listing/senddetails/<?php echo $list['sell_id']?>">Email to Buyer
                                                            </a>
                                                        </span>
                                                    <?php endif ?>
                                                    <?php } ?>
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
                <!-- <div class="row">
                    <div class="">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="listing" role="grid" aria-describedby="sample_1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending"> ID </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1"> Seller Name </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1"> Property Type </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1"> Square ft </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1"> Home Worth </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1"> Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listing as $list) { ?>
                                <tr id="row_<?php echo $list['sell_id'] ?>">
                                    <td style="width: 5%">
                                        <?php echo $list['sell_id'] ?>
                                    </td>
                                    <td><?php echo $list['fullname']?></td>
                                    <td><?php echo $list['property_type'] ?></td>
                                    <td><?php echo $list['square_feet'] ?></td>
                                    <td><?php echo $list['home_worth'] ?></td>
                                    <td>
                                        <select data-op="update" data-column="is_approved" data-id="<?php echo $list['sell_id'] ?>" data-table-name="sell_basic" name="is_approved" class="form-control form-filter input-sm status">
                                            <option <?php echo ($list['is_approved'] == "Y")?"selected":"" ?> value="Y">Approve</option>
                                            <option <?php echo ($list['is_approved'] == "N")?"selected":"" ?> value="N">Not Approve</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="row-actions">
                                            <span class="edit">
                                                <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/listing/edit/<?php echo $list['sell_id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                            </span>
                                            <span class="delete">
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/listing/delete/<?php echo $list['sell_id']?>"><span class="glyphicon glyphicon-trash"></span></a>
                                            </span>
                                            <span class="view">
                                                <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/listing/view/<?php echo $list['sell_id'] ?>">View</a>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div> -->
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
    $("#listing").dataTable({
        "ordering": false
    });

    $(document).on('click','.status',function(){
        var id = $(this).attr('data-id');
        $(".btn_"+id).removeClass('active');
        var value = $(this).attr('data-value');
        //var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/listing/updatePropertyStatus",
            data: 'id=' + id + '&val='+value,
            success: function(response){
                //$(this).addClass('active');
                if(value == 'Y'){
                    swal("Approved!", "The record has been approved successfully.", "success");
                    $('.div_'+id).parent('td').addClass('text-center');
                    $('.div_'+id).replaceWith('<span class="label label-sm label-success"> Published </span>');
                }else if(value == 'N'){
                    swal("Rejected!", "The record has been rejected.", "error");
                    $('.div_'+id).parent('td').addClass('text-center');
                    $('.div_'+id).replaceWith('<span class="label label-sm label-warning"> Draft </span>');
                }
            }
        });
    });

    $(document).on('change','#view_changer', function(){
        var column = $(this).find(":selected").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/listing/getListingByAjax",
            data: 'column=' + column,
            datatype: "JSON",
            success: function(response){
                var output = $.parseJSON(response);
                $('#ajax_return').html(output.view);
            }
        });
    });
</script>