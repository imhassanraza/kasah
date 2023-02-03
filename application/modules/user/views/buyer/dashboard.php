<?php $this->load->view('common/header') ?>
<main>
  <div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
    <?php $this->load->view('user/navigation') ?>
  </div>
  <div class="container form-container">
    <section class='faq-group form-section'>
      <?php 
      if ($this->session->flashdata('success_msg')) {
        ?>
        <div class="form-group">
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success_msg') ?>
          </div>
        </div>
        <?php 
      }?>
      <?php 
      if ($this->session->flashdata('error_msg')) {
        ?>
        <div class="form-group">
          <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error_msg') ?>
          </div>
        </div>
        <?php 
      }?>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="cost-card cost-card-default" id="dashboard_percentage">
            <div class="cost-card-title">
             Total Applicatons
           </div>
           <div class="cost-card-content">
            <div class="cost-card-percentage">
              <?php echo $count ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</main>

<?php $this->load->view('common/footer') ?>
</body>

</html>
