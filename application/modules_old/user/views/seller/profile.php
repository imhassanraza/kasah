<?php $this->load->view('common/header') ?>
<main>
  <div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
    <?php $this->load->view('user/navigation') ?>
  </div>
  <div class="container form-container">
    <section class='faq-group form-section'>
     <!--/forms-->
     <div class="row rowb">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-xs-12  colborder">
          <h2>Change Password</h2>
          <?php 
          if ($this->session->flashdata('pass_msg')) {
            ?>
            <div class="form-group">
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('pass_msg') ?>
              </div>
            </div>
            <?php 
          }?>
          <form id="formpassword" action="<?php echo base_url() ?>user/profile/updatePassword" method="post">
            <div class="form-group">
              <label class="control-label buy-label">Old Password <strong>*</strong></label>
              <input class="form-control  bordrad" id="oldpassword" name="oldpassword" placeholder="Enter old password here" type="password" required="">
            </div>
            <div class="form-group">
              <label class="control-label buy-label">New Password <strong>*</strong></label>
              <input class="form-control  bordrad" id="newpassword" name="newpassword" placeholder="Enter new password here" type="password" required="">
            </div>
            <div class="form-group">
              <label class="control-label buy-label">Confirm Password <strong>*</strong></label>
              <input class="form-control  bordrad" id="conpassword" name="conpassword" placeholder="Confirm Password" type="password" required="">
            </div>
            <div class="row row-padding-remover form-row">
              <div class="col-lg-6"></div>
              <div class="col-lg-6 ">
                <button type="submit" class="submit-btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="col-xs-12  colborder">
          <h2>Change User Detail</h2>
          <?php 
          if ($this->session->flashdata('detail_msg')) {
            ?>
            <div class="form-group">
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('detail_msg') ?>
              </div>
            </div>
            <?php 
          }?>
          <form action="<?php echo base_url() ?>user/profile/updateDetail" method="post">
            <div class="form-group">
              <label class="control-label buy-label">Name</label>
              <input class="form-control  bordrad" name="name" placeholder="Enter your Full name here" type="text" value="<?php echo $detail['fullname'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label buy-label">Email Address</label>
              <input disabled="" class="form-control  bordrad" name="email" placeholder="Etner your Email here" type="text" value="<?php echo $detail['email'] ?>">
            </div>
            <div class="row row-padding-remover form-row">
              <div class="col-lg-6"></div>
              <div class="col-lg-6 ">
                <button type="submit" class="submit-btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/forms-->
    <div class="clear"></div>
  </section>
</div>
</main>

<?php $this->load->view('common/footer') ?>
</body>
<script type="text/javascript">

  $('#formpassword').validate({
    rules: {
      newpassword:{
        required: true,
        minlength: 8,
      },
      conpassword: {
        required: true,
        minlength: 8,
        equalTo: "#newpassword"
      }
    },
    messages: {
      conpassword:{
        equalTo: "Password Does not match"
      }
    }
  });
</script>
</html>
