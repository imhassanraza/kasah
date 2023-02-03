<?php $this->load->view('admin_common/header.php');?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php $this->load->view('admin_common/sidebar.php');?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" id="edit-booking-sheet">
            <!-- BEGIN PAGE HEADER-->
            <div class="col-xs-12">
                <form  action="<?php echo base_url();?>admin/buyer/emailToBuyer" method="POST" >
                    <div class="row review-email">
                        <div class="col-xs-12">
                            <h3 class="review-email-h3">Send Message to Buyer</h3>
                        </div>
                        <div class="col-xs-12 ent_email_container">
                            <div class="form-group">
                                <label for="to">To:</label>
                                <input class="input-field form-control" id="to" type="text" name="email" value="<?php echo $detail['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input class="input-field form-control" id="subject" type="text" name="subject" value="Message By Kasah Management">
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-xs-12 no-padding marg20">Your Message:</label>
                                <div class="col-md-12 no-padding">
                                    <textarea  name="message" id="message">

                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'message' );
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <input type="submit" name="emailToBuyer" class="btn" value="Send Email">
                        </div>
                    </div>
                    <div class="row">
                        <img src="img/statuskeys.png" class="img-responsive pull-right">
                    </div>
                </form>
            </div>
            <!-- END PAGE HEADER-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php $this->load->view('admin_common/footer.php');?>
