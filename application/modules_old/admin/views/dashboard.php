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
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="">
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Dashboard
                <small>dashboard & statistics</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url() ?>admin/manage_user/seller">
                        <div class="visual">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $sellers ?>"><?php echo $sellers ?></span>
                            </div>
                            <div class="desc"> Total Sellers </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo base_url() ?>admin/manage_user/buyer">
                        <div class="visual">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $buyers ?>"></span><?php echo $buyers ?></div>
                                <div class="desc"> Total Buyers </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo base_url() ?>admin/listing">
                            <div class="visual">
                                <i class="fa fa-building"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?php echo $properties ?>"><?php echo $properties ?></span>
                                </div>
                                <div class="desc"> Total Properties </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo base_url() ?>admin/buyer/applications">
                            <div class="visual">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?php echo $apps ?>"><?php echo $apps ?></span></div>
                                    <div class="desc"> Total Application </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->

    <?php $this->load->view('admin_common/footer');?>

