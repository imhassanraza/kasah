<?php $this->load->view('common/header') ?>
<div class="u-relative u-flexCenter u-marginTop60 u-backgroundSizeCover u-fullWidth u-fullHeight u-minHeight700" style="background:url('<?php echo base_url() ?>assets/faxon/img/recovery.jpg');">
    <div class="u-width400 u-backgroundWhite u-borderRadius5">
        <div class="u-margin40">
        <div class="u-fontSize30 u-centerTextHorizontal u-marginBottom40">Recover Account</div>
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
            <form action="<?php echo base_url() ?>recoveraccount" method="post" id="recoveryForm">
                <div class="u-textLight u-textSmallCaps u-marginBottom5">Email address</div>
                <div class="form-group">
                    <input class="form-control new-form-control" name="email" placeholder="Enter your email here" type="email">
                </div>
                  <div class="u-relative u-height20 u-marginBottom15 u-textAlertColorTransparent">
                    <div class="u-fullWidth u-centerVertical u-centerTextHorizontal"></div>
                </div>
                <button type="submit" class="button__btn___2Ytq4 u-block u-centerHorizontal u-fullWidth u-height50 u-backgroundLightTeal u-border0 button__primary___1aOT2">Get Recovery Link on Email</button>
            </form>
            <div class="u-relative u-height20 u-marginTop40">
                <div class="u-fullWidth u-centerVertical u-centerTextHorizontal">
                    <div class="u-marginTop10">
                        <!-- react-text: 174 -->Not registered yet?
                        <!-- /react-text --><a href="<?php echo base_url() ?>signup">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('common/footer') ?>
</body>
<script type="text/javascript">
  $('#recoveryForm').validate({
    rules:{
      email: {
        required: true,
        email: true
      }
    }
  })
</script>
</html>
