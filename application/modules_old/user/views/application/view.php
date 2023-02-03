<?php echo $this->load->view('common/header') ?>
<main>
	<div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
		<?php $this->load->view('user/navigation') ?>
	</div>
	<div class="container form-container">
		<section class='faq-group form-section col-xs-12'>
			<div class="col-xs-12 no-padding">
				<div class="col-md-12">
					<div class="col-md-4 pull-right buy-block">
						<a href="<?php echo base_url(); ?>user/application/add" class="anchaoredit">New Application</a>
					</div>
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
			<div class="col-xs-12 no-padding">
				<?php 
				if (!empty($detail)) {
				$w = 1;
				foreach ($detail as $app){ ?>
				<div class="col-xs-12 col-sm-6 col-md-4 marg20">
					<?php if ($app['is_complete'] == "N" && $app['is_approved'] == "N") {?>
					<div class="ribbon_dashboard"><span>Draft</span></div>
					<?php }else if ($app['is_complete'] == "Y" && $app['is_approved'] == "N"){ ?>
					<div class="ribbon_dashboard"><span>Pending</span></div>
					<?php }else if ($app['is_complete'] == "N" && $app['is_approved'] == "Y"){ ?>
					<div class="ribbon_dashboard"><span>Approved</span></div>
					<?php } ?>
					<a href="<?php echo base_url() ?>user/application/edit/<?php echo $app['id'] ?>">
						<div class="cost-card cost-card-default" id="dashboard_percentage">
							<div class="cost-card-title">
								Application
							</div>
							<div class="cost-card-content">
								<div class="cost-card-percentage">
									<?php echo $w; ?>
								</div>
								<?php if ($app['is_complete'] != "Y" && $app['is_approved'] != "Y"): ?>
									<a href="<?php echo base_url() ?>user/application/document/<?php echo $app['id'] ?>" class="btn btn-primary nextBtn  pull-right">My Documents</a>
								<?php endif; ?>
							</div>
						</div>
					</a>
					<!-- <div style="text-align: center"><a href="<?php echo base_url() ?>user/application/document/<?php echo $app['id'] ?>" class="anchaoredit">My Document</a></div> -->
				</div>
				<?php 
				$w++;
			} 
		} else{?>
			<div class="col-md-12">
				<h4>You have not submitted any Application yet!</h4>
			</div>
		<?php }?>
		</div> 
	</section>
</div>
</main>

<?php $this->load->view('common/footer') ?>
</body>

</html>
