<?php $this->load->view('common/header') ?>
<main>
  <div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
    <?php $this->load->view('user/navigation') ?>
  </div>
  <div class="container form-container">
    <section class='faq-group form-section col-xs-12 mobile-padding-z'>
      <div class="col-xs-12 mobile-padding-z">
        <div class="col-xs-12 no-padding">
          <h2 class="col-xs-6 col-sm-4 pull-left">Properties</h2>
          <div class="col-lg-3  pull-right buy-block">
            <a href="<?php echo base_url(); ?>sell" class="anchaoredit">Add Property</a>
          </div>
        </div>  
        <div class="col-xs-12 no-padding">
        <div class="col-md-12">
          <?php 
          if ($this->session->flashdata('success_msg')) {
            ?>
            <div class="form-group marg20">
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success_msg') ?>
              </div>
            </div>
            <?php 
          }?>
          <?php 
          if ($this->session->flashdata('error_msg')) {
            ?>
            <div class="form-group marg20">
              <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error_msg') ?>
              </div>
            </div>
            <?php 
          }?>
        </div>
      </div>
        <div class="col-xs-12">
          <?php if (empty($details)): ?>
            <div class="col-md-12 no-padding">
              <h4>No property listed yet</h4>
            </div>
          <?php endif ?>
          <?php foreach ($details as $detail) {?>
          <div class="col-sm-6 col-md-4 marg20 box">
            <div class="card">
              <div class="ribbon">
                <span>
                  <?php if ($detail['is_approved'] == "Y") {
                    echo "Published";
                  }else if ($detail['publish_approve'] == "Y") {
                    echo "Pending";
                  }else if ($detail['draft'] == "Y") {
                    echo "Draft";
                  } else if ($detail['is_sold'] == "Y") {
                    echo "Sold";
                  }?>
                </span>
              </div>
              <div class="card-image">
                <a href="<?php echo base_url() ?>user/property/view/<?php echo $detail['sell_id'] ?>"> <img class="img-responsive" src="<?php echo base_url() ?>uploads/images/<?php echo (!empty($detail['feature_img']))?$detail['feature_img']:"noimg.jpg"; ?>"></a>

              </div><!-- card image -->

              <div class="card-content">
                <p class="dummytextclass"><?php echo $detail['home_address'] ?></p> 
                <p class="dummyprice">$<?php echo number_format($detail['home_worth']) ?></p>                    
              </div><!-- card content -->
              <div class="card-action col-xs-12" style="margin-top: 0px;padding-bottom:10px">
               <a href="javascript:void(0)" class="col-xs-4"><i class="iclass fa fa-bath" aria-hidden="true"></i>
                &nbsp <?php echo $detail['bathrooms'] ?></a>
                <a href="javascript:void(0)"  class="col-xs-4" class="pad10"><i class="iclass fa fa-bed" aria-hidden="true"></i>
                  &nbsp <?php echo $detail['bedrooms'] ?></a>                    
                  <a href="javascript:void(0)"  class="col-xs-4 no-padding" class="pad10"><img src="<?php echo base_url() ?>assets/faxon/img/lotsize.png" style="width: 20px;">&nbsp <?php echo $detail['lotsize_sqft'] ?></a>

                </div><!-- card actions -->
                <!-- card reveal -->
              </div>
            </div>
            <?php } ?>   
          </div>
        </div>
        <div class="">
          <div class="row">
            <!-- <div class="col-lg-3  center-block">
              <a href="<?php echo base_url(); ?>sell" class="anchaoredit">Add New Property</a>
            </div> -->
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php $this->load->view('common/footer') ?>
</body>

</html>
