<?php $this->load->view('common/header') ?>
<div class="u-relative u-flexCenter u-marginTop60 u-backgroundSizeCover u-fullWidth u-fullHeight u-minHeight990" style="background:url('<?php echo base_url() ?>assets/faxon/img/contactus.jpg');">
  <div class="u-width600 u-backgroundWhite u-borderRadius5">
    <div class="u-margin40">
      <div class="u-fontSize30 u-centerTextHorizontal u-marginBottom40">Contact Us</div>
      <?php 
      if ($this->session->flashdata('error_msg')) {
        ?>
        <div class="form-group">
          <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error_msg') ?>
          </div>
        </div>
        <?php }
        ?>
        <?php 
        if ($this->session->flashdata('success_msg')) {
          ?>
          <div class="form-group">
            <div class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('success_msg') ?>
            </div>
          </div>
          <?php }
          ?>
          <form action="<?php echo base_url() ?>contactus" method="post" id="contactForm">
           <div class="u-textLight u-textSmallCaps u-marginBottom5">Name</div>
           <div class="form-group">
            <input class="form-control new-form-control" name="name" placeholder="Enter your name here" type="text" required="">
          </div>
          <div class="u-textLight u-textSmallCaps u-marginBottom5">Email</div>
          <div class="form-group">
            <input class="form-control new-form-control" name="email" placeholder="Enter your email here" type="email" required="">
          </div>
          <div class="u-textLight u-textSmallCaps u-marginBottom5">Phone</div>
          <div class="form-group">
            <input id="number" class="form-control new-form-control" name="number" placeholder="Enter your number here" type="text" required="">
          </div>
          <div class="u-textLight u-textSmallCaps u-marginBottom5">Subject</div>
          <div class="form-group">
            <input class="form-control new-form-control" name="subject" placeholder="Enter query subject here" type="text" required="">
          </div>
          <div class="u-textLight u-textSmallCaps u-marginBottom5">Message</div>
          <div class="form-group">
            <textarea class="form-control" name="message" required="" placeholder="Enter your message here" rows="8"></textarea>
          </div>
          <div class="u-relative u-height20 u-marginBottom15 u-textAlertColorTransparent">
            <div class="u-fullWidth u-centerVertical u-centerTextHorizontal"></div>
          </div>
          <button type="submit" class="button__btn___2Ytq4 u-block u-centerHorizontal u-fullWidth u-height50 u-backgroundLightTeal u-border0 button__primary___1aOT2">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view('common/footer') ?>
</body>
<script type="text/javascript">
  $('#contactForm').validate();

  $("#number").keypress(function (e) {
     //if the letter is not digit then don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        return false;
      }
    });
  </script>
  </html>
