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
                                <i class="fa fa-gift"></i>Add </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="<?php echo base_url(); ?>admin/manage_admin/add" id="add_form" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username <strong>*</strong></label>
                                            <div class="col-md-8">
                                                <input type="text" id="username" name="username" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email <strong>*</strong></label>
                                            <div class="col-md-8">
                                                <input type="email" id="email" name="email" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">First Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="first_name" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Last Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="last_name" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password <strong>*</strong></label>
                                            <div class="col-md-8">
                                                <input type="password" name="password" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Send Admin Notification</label>
                                            <div class="col-md-8">
                                                <input name="send_admin_notification" id="send_user_notification" value="Y" type="checkbox">
                                                <label for="send_user_notification">Send the new admin an email about their account.</label>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Save</button>
                                                    <a href="<?php echo base_url() ?>admin/manage_admin" class="btn grey-salsa btn-outline">Cancel</a>
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

    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#add_form').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "<?php echo base_url() ?>admin/manage_admin/emailCheck",
                            type: "post",
                            data: {
                                   email: function () {
                                       return $("#email").val();
                                   },
                                   username: function () {
                                       return $("#username").val();
                                   }
                               }
                        }
                    },
                    username: {
                        required: true,
                        remote: {
                            url: "<?php echo base_url() ?>admin/manage_admin/emailCheck",
                            type: "post",
                            data: {
                                   email: function () {
                                       return $("#email").val();
                                   },
                                   username: function () {
                                       return $("#username").val();
                                   }
                               }
                        }
                    }
                },
                messages: {
                    email: "Email is not valid or its already in use!",
                    username: "This username is already in use or not allowed!"
                }
            });
        });
    </script>
