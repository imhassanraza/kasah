
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
                    <p>No Listing Fount in Database</p>
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
