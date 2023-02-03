<?php 
$user = $this->session->userdata('user');
if ($user['roll'] == "buyer") {?>
<div class="container">
  <div class="icon-bar">
    <a class="<?php echo ($this->uri->segment(2) == "dashboard")?"active":""; ?>" href="<?php echo base_url() ?>user/dashboard">
      <i class="fa fa-tachometer" aria-hidden="true"><span>Dashboard</span></i>
    </a>
    <a class="<?php echo ($this->uri->segment(2) == "application")?"active":""; ?>" href="<?php echo base_url() ?>user/application">
      <i class="fa fa-wpforms" aria-hidden="true"><span>My Application</span></i>
    </a>
    <a href="<?php echo base_url() ?>user/profile" class="<?php echo ($this->uri->segment(2) == "profile")?"active":""; ?>">
      <i class="fa fa-user" aria-hidden="true"><span>My Profile</span></i>
    </a>
    <a href="<?php echo base_url() ?>user/document" class="<?php echo ($this->uri->segment(2) == "document")?"active":""; ?>">
      <i class="fa fa-file-text" aria-hidden="true"><span>My Documents</span></i>
    </a>
  </div>
</div>
<?php } else {
  ?>
  <div class="container">
    <div class="icon-bar">
      <a class="<?php echo ($this->uri->segment(2) == "dashboard")?"active":""; ?>" href="<?php echo base_url() ?>user/dashboard">
        <i class="fa fa-tachometer" aria-hidden="true"><span>Dashboard</span></i>
      </a>
      <a href="<?php echo base_url() ?>user/properties" class="<?php echo ($this->uri->segment(2) == "properties")?"active":""; ?>">
        <i class="fa fa-building-o" aria-hidden="true"><span>Properties</span></i>
      </a>
      <a href="<?php echo base_url() ?>user/profile" class="<?php echo ($this->uri->segment(2) == "profile")?"active":""; ?>">
        <i class="fa fa-user" aria-hidden="true"><span>My Profile</span></i>
      </a>
      <a href="<?php echo base_url() ?>user/document" class="<?php echo ($this->uri->segment(2) == "document")?"active":""; ?>">
      <i class="fa fa-file-text" aria-hidden="true"><span>My Documents</span></i>
    </a>
    </div>
  </div>
  <?php } ?>