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
                    <?php if($this->session->flashdata('success_msg') != ''){ ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                    <?php } ?>
                    <?php if($this->session->flashdata('error_msg') != ''){ ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase"> Search</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form action="<?php echo base_url() ?>admin/reporting" method="post" id="ajaxFilter">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label><b>Start Date:</b></label>
                                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd-mm-yyyy">
                                            <input class="form-control form-filter input-sm" name="from" placeholder="" type="text">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label><b>End Date:</b></label>
                                            <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                <input class="form-control form-filter input-sm" name="to" placeholder="" type="text">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label><b>Inspection:</b></label>
                                            <div class="">
                                                <select name="inspection" class="table-group-action-input form-control input-inline input-medium input-sm">
                                                    <option value="">Select...</option>
                                                    <option value="open">Open</option>
                                                    <option value="close">Close</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label><b>Property Status:</b></label>
                                            <div class="">
                                                <select name="status" class="table-group-action-input form-control input-inline input-medium input-sm">
                                                    <option value="">Select...</option>
                                                    <option value="draft">Draft</option>
                                                    <option value="is_approved">Published</option>
                                                    <option value="publish_approve">Waiting for Approval</option>
                                                    <option value="is_sold">Sold</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-success pull-right ajaxFilter" type="button">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <div class="row" id="ajaxResult">

                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase"> Listing</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="somedata">
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
                                        <?php 
                                        if (empty($listing)) {?>
                                        <p>No Listing Found in Database</p>
                                        <?php }
                                        foreach ($listing as $list) { ?>
                                        <tr id="row_<?php echo $list['sell_id'] ?>">
                                            <td style="width: 5%">
                                                <?php echo $list['sell_id'] ?>
                                            </td>
                                            <td><?php echo $list['fullname']?></td>
                                            <td><?php echo $list['property_type'] ?></td>
                                            <td><?php echo "$".$list['home_worth'] ?></td>
                                            <?php if ($list['draft'] == "Y") {?>
                                            <td class="text-center">
                                                <span class="label label-sm label-warning"> Draft </span>
                                            </td>
                                            <?php }elseif ($list['publish_approve'] == "Y") {?>
                                            <td class="text-center">
                                                <span class="label label-sm label-primary"> Waiting for Approval </span>
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
    $(document).on('click','.ajaxFilter',function(){
        var formdata = $('#ajaxFilter').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>admin/reporting/ajaxFilter",
            data: formdata,
            success: function(output){
                var result = $.parseJSON(output);
                $('#ajaxResult').html(result.html);
            }
        });
    });
</script>
