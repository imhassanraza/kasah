<?php $this->load->view('common/header') ?>
<div class="u-relative u-flexCenter u-flexColumn u-marginTop60 u-backgroundSizeCover u-fullWidth u-fullHeight u-minHeight800" style="background:url('<?php echo base_url() ?>assets/img/sign-up-bg.jpg');">
	<div class="u-width400 u-backgroundWhite u-borderRadius5">
		<div class="u-margin40">
			<div class="u-fontSize30 u-centerTextHorizontal u-marginBottom40">Sign up</div>
			<?php 
			if ($this->session->flashdata('error_msg')) {?>
			<div class="form-group">
				<div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('error_msg') ?>
				</div>
			</div>
			<?php }
			?>                        
			<form id="signup" action="<?php echo base_url() ?>signup" method="post">
				<div class="form-group">
					<input class="form-control new-form-control" value="" id="name" name="name" placeholder="Your name" type="text">
				</div>
				<div class="form-group">
					<input class="form-control new-form-control" value="" id="email" name="email" placeholder="Email address" type="email">
				</div>
				<div class="form-group">
					<input class="form-control new-form-control" value="" id="password" name="password" placeholder="Password" type="password">
				</div>
				<div class="form-group">
					<div class="" data-toggle="buttons">
						<label class="btn active col-md-6">
							<input type="radio" name='user_roll' <?php echo ($roll == "")?"checked":""?> value="seller"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span> Seller</span>
						</label>
						<label class="btn col-md-6">
							<input type="radio" name='user_roll' <?php echo ($roll == "buyer")?"checked":""?>  value="buyer"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> Buyer</span>
						</label>
					</div>
				</div>
				<div class="checkboxGroup__checkboxRow___24B3D">
					<span class="u-fullWidth u-fontSize14 u-marginTop10 u-marginBottom15">
						<div style="float: left; width: 30px;">
							<input name="acceptterms" id="acceptterms" class="checkboxGroup__checkbox___3JkBB" type="checkbox">
						</div>
						<label class=" terms-c checkboxGroup__checkbox___3JkBB" for="accept-terms"><span>I agree to the<a class="link-color" href="<?php echo base_url() ?>privacypolicy" target="_blank" rel="noopener noreferrer"> Privacy Policy</a> and <a class="link-color" href="<?php echo base_url() ?>terms" target="_blank" rel="noopener noreferrer">Terms of Service</a></span></label>
				</span>
			</div>
			<div id="termerror">
				
			</div>
			<div class="u-relative u-height20 u-marginBottom15 u-textAlertColorTransparent">
				<div class="u-fullWidth u-centerVertical u-centerTextHorizontal"></div>
			</div>
			<button id="postme" type="submit" class="button__btn___2Ytq4 u-block u-centerHorizontal u-fullWidth u-height50 u-backgroundLightTeal u-border0 button__primary___1aOT2">Sign up</button>
		</form>
		<div class="u-relative u-height50 u-marginTop20">
			<div class="u-fullWidth u-centerVertical u-centerTextHorizontal">
				<div>
					<div>
						Already have a Kasah account?
						<a href="<?php echo base_url() ?>login" class="link-color">Log in</a></div>
            <!-- <div class="u-marginTop10">
              Looking to buy, instead?
              <a href="<?php echo base_url() ?>buyer/signup" class="link-color">Sign up here</a>
          </div> -->
      </div>
  </div>
</div>
</div>
</div>
</div>

<?php $this->load->view('common/footer') ?>
</body>

<script type="text/javascript">
	$("#signup").validate({
    // Specify validation rules
    rules: {
    	name: "required",
    	acceptterms: "required",
    	email: {
    		required: true,
    		email: true
    	},
    	password: {
    		required: true,
    		minlength: 8
    	},
    },
    messages: {
    	firstname: "Please enter your firstname",
    	lastname: "Please enter your lastname",
    	acceptterms: "You must agree to the terms and conditions before register.",
    	password: {
    		required: "Please provide a password",
    		minlength: "Your password must be at least 8 characters long"
    	},
    	email: "Please enter a valid email address"
    },
    errorPlacement: function(error, element) {
    	if (element.attr("name") == 'acceptterms') {
    		error.appendTo("#termerror");
    	}
    	else {
    		error.insertAfter(element);
    	}
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
    	form.submit();
    }
});

	// $(document).on('click','#acceptterms',function(){
	// 	alert($(this).val());
	// })
</script>
</html>
