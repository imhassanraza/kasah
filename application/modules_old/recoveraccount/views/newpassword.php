<?php $this->load->view('common/header') ?>
<div class="u-relative u-flexCenter u-marginTop60 u-backgroundSizeCover u-fullWidth u-fullHeight u-minHeight700" style="background:url('<?php echo base_url() ?>assets/faxon/img/370fW2e.jpg');">
  <div class="u-width400 u-backgroundWhite u-borderRadius5">
    <div class="u-margin40">
      <div class="u-fontSize30 u-centerTextHorizontal u-marginBottom40">Reset Password</div>
      <form id="password_form" action="<?php echo base_url() ?>recoveraccount/updatePassword" method="post">
        <div class="u-textLight u-textSmallCaps u-marginBottom5">New Password</div>
        <div class="form-group">
          <input class="form-control new-form-control" id="password" name="password" placeholder="Enter New password here" type="password">
        </div>
        <div class="u-textLight u-textSmallCaps u-marginBottom5">Confirm Password</div>
        <div class="form-group">
          <input class="form-control new-form-control" name="conpassword" placeholder="Re Enter your new password" type="password">
        </div>
        <input type="hidden" name="token" value="<?php echo $token ?>">
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
  $(document).ready(function () {
    $('#password_form').validate({
      rules: {
        password:{
          required: true,
          minlength: 8
        },
        conpassword: {
          equalTo: "#password"
        }
      },
      messages: {
        conpassword:{
          equalTo: "Password Does not match"
        }
      }
    });
  });
</script>

</html>
