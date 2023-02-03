<?php $this->load->view('common/header') ?>
<main>
	<div class='hero sell-hero'>
  </div>
  <div class='who-we-are'>
  	<div class="container">
  		<div class="row rowb">
  			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sell-property-left-col">
  				<div class='company-content-item'>
  					<img src='assets/images/about/light-bulb-2d73c9ab.png'>
  					<h2>Sell your property</h2>
  				</div>
  			</div>
  			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" id="form-main-col">
  				<div class="stepwizard">
  					<div class="stepwizard-row setup-panel">
  						<div class="stepwizard-step">
  							<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
  							<p>Step 1</p>
  						</div>
  						<div class="stepwizard-step">
  							<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
  							<p>Step 2</p>
  						</div>
  						<div class="stepwizard-step">
  							<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
  							<p>Step 3</p>
  						</div>
  						<div class="stepwizard-step">
  							<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
  							<p>Step 4</p>
  						</div>
  						<div class="stepwizard-step">
  							<a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
  							<p>Step 5</p>
  						</div>
  						<div class="stepwizard-step">
  							<a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
  							<p>Step 6</p>
  						</div>
  						<div class="stepwizard-step">
  							<a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
  							<p>Step 7</p>
  						</div>
  					</div>
  				</div>
  				<form role="form" name="sell_form" action="<?php echo base_url() ?>sell/insertListing" id="sell_form" method="post" enctype="multipart/form-data">
  					<div class="row setup-content" id="step-1">
  						<div class="col-xs-12">
  							<div class="col-md-12">
  								<h2 class="fs-title">Details  About your  home</h2>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control" required="required" name="property_type" >
  											<option value="">-- Select any Property Type --</option>
  											<?php foreach ($ref_property_type as $type) {?>
  											<option value="<?php echo $type['id'] ?>"><?php echo $type['property_type'] ?></option>
  											<?php } ?>
  										</select>
  									</div>
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control" name="bedrooms" required="required">
  											<option value="">-- Select Bedrooms --</option>
  											<option value="1">1 Bedroom</option>
  											<option value="2">2 Bedrooms</option>
  											<option value="3">3 Bedrooms</option>
  											<option value="4">4 Bedrooms</option>
  											<option value="5">5 Bedrooms</option>
  										</select>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control" name="bathrooms" required="required">
  											<option value="">-- Select Bathrooms --</option>
  											<option value="1">1 Bathroom</option>
  											<option value="2">2 Bathrooms</option>
  											<option value="3">3 Bathrooms</option>
  											<option value="4">4 Bathrooms</option>
  											<option value="5">5 Bathrooms</option>
  										</select>
  									</div>
  									<div class="form-group col-lg-6 col-sm-6 col-md-6 col-xs-12">
  										<select class="form-control" name="partial_baths" required="required">
  											<option value="" selected="selected">-- Select Partial Baths --</option>
  											<option value="1">1 Partial Bath</option>
  											<option value="2">2 Partial Baths</option>
  											<option value="3">3 Partial Baths</option>
  											<option value="4">4 Partial Baths</option>
  											<option value="5">5 Partial Baths</option>
  										</select>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<div class="form-group">
  											<input class="form-control numberonly" required="required" type="text" min="1" name="square_feet" placeholder="Square Feet" />
  										</div>
  									</div>
  									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<div class="form-group">
  											<input class="form-control numberonly" type="text" min="1" required="required" name="lot_size_sqft" placeholder="Lot Size  (sqft)" />                
  										</div>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control full-width-select" name="occupancy" required="required">
  											<option value="">-- Select Occupancy --</option>
  											<?php foreach ($ref_occupancy as $type) {?>
  											<option value="<?php echo $type['id'] ?>"><?php echo $type['occupancy'] ?></option>
  											<?php } ?>
  										</select>
  									</div>
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<input class="form-control numberonly" type="text" min="1900" required="required" name="year_built" id="year_built" placeholder="Year Built"/>
  									</div>
  									<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
  										<input class="form-control" type="text" required="required" name="home_address" placeholder="What is your Home address" />
  									</div>
  								</div>
  								<div class="pull-right">
  									<button class="btn btn-primary nextBtn  pull-right" type="button" >Next</button>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="row setup-content" id="step-2">
  						<div class="col-xs-12">
  							<div class="col-md-12">
  								<h2 class="fs-title">Details  about your  community</h2>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<div class="form-group remove-form-group-margin">
  											<div class="funkyradio">
  												<div class="checkbox checkbox-danger pull-left">
  													<input type="checkbox" name="hoa_check" id="checkbox6" value="N" />
  													<label for="checkbox6">Do you have an HOA ?</label>
  												</div>
  											</div>
  										</div>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<div class="form-group">
  											<input  type="text" class="form-control" name="elementary_school_district" required="required" placeholder="Elementary School  District" />
  										</div>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<div class="form-group">
  											<input  type="text" class="form-control" name="high_school_district" required="required" placeholder="High School  District" />
  										</div>
  									</div>
  								</div>
  								<div class="pull-right">
  									<button class="btn btn-primary prevBtn" type="button" >Prev</button>
  									<button class="btn btn-primary nextBtn" type="button" >Next</button>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="row setup-content" id="step-3">
  						<div class="col-xs-12">
  							<div class="col-md-12">
  								<h2 class="fs-title">Your homes interior</h2>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 custom-col-md-6">
  										<select class="form-control" required="required" name="fireplace">
  											<option value="">-- Select Fireplace --</option>
  											<?php foreach ($ref_fireplace as $type) {?>
  											<option value="<?php echo $type['id'] ?>"><?php echo $type['fireplace_type'] ?></option>
  											<?php } ?>
  										</select>

  									</div>
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 custom-col-md-6">
  										<select class="form-control" required="required" name="heating">
  											<option value="">-- Select Heating --</option>
  											<?php foreach ($ref_heating as $type) {?>
  											<option value="<?php echo $type['id'] ?>"><?php echo $type['heating_type'] ?></option>
  											<?php } ?>
  										</select>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12 custom-col-md-6">
  										<select class="form-control full-width-select" required="required" name="cooling">
  											<option value="">-- Select Cooling --</option>
  											<?php foreach ($ref_cooling as $type) {?>
  											<option value="<?php echo $type['id'] ?>"><?php echo $type['cooling_type'] ?></option>
  											<?php } ?>
  										</select>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Dining Room Features</label>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<div class="form-group remove-form-group-margin">
  											<div class="funkyradio">
  												<div class="checkbox checkbox-danger pull-left">
  													<input type="checkbox" name="checkbox_select_all" id="feature_checkbox_select_all"/>
  													<label for="feature_checkbox_select_all" id="btn-select-all-1">Select all</label>
  												</div>
  											</div>
  										</div>
  									</div>
  								</div>
  								<div class="col-xs-12 " style="padding:0px;">
  									<?php 
  									foreach ($ref_dining_room as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input  type="checkbox" name="dining_room[]" class="dining-room-feature-chick-box" id="dining_room_<?php echo $type['id']?>" value="<?php echo $type['id'] ?>" />
  											<label class="checkbox-mini-label" for="dining_room_<?php echo $type['id']?>"><?php echo $type['dining_type'] ?></label>
  										</div>
  									</div>
  									<?php } ?>
  								</div>
  								<div class="col-xs-12 row-padding-remover " style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Family Room Features</label>
  									</div>
  								</div>
  								<div class="col-xs-12 row-padding-remover " style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<div class="form-group remove-form-group-margin">
  											<div class="funkyradio">
  												<div class="checkbox checkbox-danger pull-left">
  													<input type="checkbox" name="checkbox_select_all" id="family_room_features_checkbox_select_all"/>
  													<label for="family_room_features_checkbox_select_all" id="btn-select-all-2">Select all</label>
  												</div>
  											</div>
  										</div>
  									</div>
  									<?php 
  									foreach ($ref_family_room as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input type="checkbox" name="ref_family_room[]" class="family-room-features-chick-box" id="ref_family_room_<?php echo $type['id']?>" value="<?php echo $type['id']?>"/>
  											<label class="checkbox-mini-label" for="ref_family_room_<?php echo $type['id']?>"><?php echo $type['family_room_type'] ?></label>
  										</div>
  									</div>
  									<?php } ?>
  								</div>
  								<div class="pull-right">
  									<button class="btn btn-primary prevBtn" type="button" >Prev</button>
  									<button class="btn btn-primary nextBtn" type="button" >Next</button>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="row setup-content" id="step-4">
  						<div class="col-xs-12">
  							<div class="col-md-12">
  								<h2 class="fs-title">Your home’s exterior features</h2>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control" required="required" name="horse_property">
  											<option value="">-- Horse Property --</option>
  											<option value="Y">Yes</option>
  											<option value="N">No</option>
  										</select>
  									</div>
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control" required="required" name="carport">
  											<option value="">-- Carport --</option>
  											<option value="1">1</option>
  											<option value="2">2</option>
  											<option value="3">3</option>
  											<option value="4">4</option>
  											<option value="5">5</option>
  										</select>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control" required="required" name="pool">
  											<option value="">-- Pool --</option>
  											<option value="Y">Yes</option>
  											<option value="N">No</option>
  										</select>
  									</div>
  									<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<select class="form-control" required="required" name="garage_spaces">
  											<option value="">-- Garage Spaces --</option>
  											<option value="1">1</option>
  											<option value="2">2</option>
  											<option value="3">3</option>
  											<option value="4">4</option>
  											<option value="5">5</option>
  										</select>
  									</div>
  								</div>
  								<!-- Parking features -->
  								<div class="row-padding-remover checkbox-row-margin-remover"  style="padding:0px;">
  									<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding-left: 0px;">
  										<label class="pull-left">Parking features</label>
  									</div>
  									<?php 
  									foreach ($ref_parking_feature as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input type="checkbox" name="ref_parking_feature[]" id="ref_parking_feature_<?php echo $type['id']?>" value="<?php echo $type['id']?>" />
  											<label class="checkbox-mini-label" for="ref_parking_feature_<?php echo $type['id']?>"><?php echo $type['parking_type'] ?></label>
  										</div>
  									</div>
  									<?php }
  									?>
  								</div>
  								<!-- Foundation -->
  								<div class="row-padding-remover row-margin-remover" style="padding:0px;">
  									<div class="col-md-12 col-lg-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Foundation</label>  
  									</div>
  									<?php 
  									foreach ($ref_foundation as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input type="checkbox" name="ref_foundation[]" id="ref_foundation_<?php echo $type['id']?>" value="<?php echo $type['id'] ?>"/>
  											<label class="checkbox-mini-label" for="ref_foundation_<?php echo $type['id']?>"><?php echo $type['foundation_type'] ?></label>
  										</div>
  									</div>
  									<?php }
  									?>
  								</div>
  								<!-- roof -->
  								<div class="row-padding-remover row-margin-remover" style="padding:0px;">
  									<div class="col-md-12 col-lg-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Roof</label>  
  									</div>
  									<?php 
  									foreach ($ref_roof as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input type="checkbox" name="ref_roof[]" id="ref_roof_<?php echo $type['id']?>" value="<?php echo $type['id'] ?>"/>
  											<label class="checkbox-mini-label" for="ref_roof_<?php echo $type['id']?>"><?php echo $type['roof_type'] ?></label>
  										</div>
  									</div>
  									<?php }
  									?>
  								</div>
  								<!-- Utilities -->
  								<div class="row-padding-remover row-margin-remover" style="padding:0px;">
  									<div class="col-md-12 col-lg-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Utilities</label>
  									</div>
  									<?php 
  									foreach ($ref_utilities as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input type="checkbox" value="<?php echo $type['id']; ?>" name="ref_utilities[]" id="ref_utilities_<?php echo $type['id']; ?>"/>
  											<label class="checkbox-mini-label" for="ref_utilities_<?php echo $type['id']; ?>"><?php echo $type['utilities'] ?></label>
  										</div>
  									</div>
  									<?php }
  									?>
  								</div>
  								<!-- Water -->
  								<div class="row-padding-remover row-margin-remover" style="padding:0px;">
  									<div class="col-md-12 col-lg-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Water</label>
  									</div>
  									<?php 
  									foreach ($ref_water as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input type="checkbox" value="<?php echo $type['id'] ?>" name="ref_water[]" id="ref_water_<?php echo $type['id'] ?>"/>
  											<label class="checkbox-mini-label" for="ref_water_<?php echo $type['id'] ?>"><?php echo $type['water_system'] ?></label>
  										</div>
  									</div>
  									<?php }
  									?>
  								</div>
  								<!-- Sewer -->
  								<div class="row-padding-remover row-margin-remover" style="padding:0px;">
  									<div class="col-md-12 col-lg-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Sewer</label>
  									</div>
  									<?php 
  									foreach ($ref_sewer as $type) {?>
  									<div class="funkyradio col-lg-4 col-sm-6 col-xs-12 padding-remover">
  										<div class="checkbox checkbox-danger pull-left checkboxHeight">
  											<input type="checkbox" value="<?php echo $type['id'] ?>" name="ref_sewer[]" id="ref_sewer_<?php echo $type['id'] ?>"/>
  											<label class="checkbox-mini-label" for="ref_sewer_<?php echo $type['id'] ?>"><?php echo $type['sewer_type'] ?></label>
  										</div>
  									</div>
  									<?php }
  									?>
  								</div>
  								<div class="pull-right">
  									<button class="btn btn-primary prevBtn" type="button" >Prev</button>
  									<button class="btn btn-primary nextBtn" type="button" >Next</button>
  								</div>
  							</div>
  						</div>
  					</div>                  
  					<div class="row setup-content" id="step-5">
  						<div class="col-xs-12">
  							<div class="col-md-12">
  								<h2 class="fs-title">Description</h2>
  								<!-- <h3 class="fs-subtitle">Your presence on the social network</h3> -->
  								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-left: 0px;">
  									<div class="form-group">
  										<label class="pull-left custom-label">Would you be interested in a Lease Option?</label>
  										<select class="form-control" required="required" name="lease_option">
  											<option value="Y">Yes</option>
  											<option value="N">No</option>
  										</select>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-left:0px;">
  										<div class="form-group">
  											<label class="pull-left custom-label">What Do you think your home is worth ?</label>
  											<input type="text" class="form-control numberonly price-worth-q-control" required="required" number name="home_worth" id="home_worth" />
  										</div>
  									</div>
  								</div>  
  								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px;">
  									<div class="form-group">
  										<label class="pull-left custom-label">What’s great about your home?</label>
  										<input type="text" class="form-control" required="required" name="about_home" />
  									</div>
  								</div>                    
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<div class="form-group">
  											<label class="pull-left custom-label" >Home Description</label>
  											<textarea class="form-control" required="required" name="home_description" rows="8"></textarea>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="pull-right">
  								<button class="btn btn-primary prevBtn" type="button" >Prev</button>
  								<button class="btn btn-primary nextBtn" type="button" >Next</button>
  							</div>
  						</div>
  					</div>
  					<div class="row setup-content" id="step-6">
  						<div class="col-xs-12">
  							<div class="col-md-12">
  								<h2 class="fs-title">Inspection</h2>
  								<!-- <h3 class="fs-subtitle">Your presence on the social network</h3> -->
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<label class="pull-left">Schedule your home inspection</label>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<div class="form-group">
  											<label class="pull-left custom-label">Contact Name</label>
  											<input type="text" required="required" class="form-control" name="contact_name">
  										</div>
  									</div>
  									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  										<div class="form-group">
  											<label class="pull-left custom-label">Contact email</label>
  											<input type="text" class="form-control" required="required" name="contact_email">
  										</div>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
  										<div class="row-padding-remover" style="padding:0px;">
  											<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  												<label class="pull-left">Schedule your home inspection</label>
  											</div>
  										</div>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
  										<div class="form-group">
  											<label class="pull-left custom-label">Date</label>
  											<input type="text" name="contact_date" required="required" class="form-control date-input">
  										</div>
  									</div>
  									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
  										<div class="form-group">
  											<label class="pull-left custom-label">Time(start)</label>
  											<input type="text" name="start_time" required="required" class="form-control">
  										</div>
  									</div>
  									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
  										<div class="form-group">
  											<label class="pull-left custom-label">Time(end)</label>
  											<input type="text" name="end_time" required="required" class="form-control">
  										</div>
  									</div>
  								</div>
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
  										<div class="form-group">
  											<label class="pull-left custom-label">
  												Do you have any special instruction for Inspecting Agent? 
  											</label>
  											<textarea class="form-control" name="instruction_to_buyer" required="required"></textarea>
  										</div>
  									</div>
  								</div>
  								<div class="pull-right">
  									<button class="btn btn-primary prevBtn" type="button" >Prev</button>
  									<button class="btn btn-primary nextBtn" type="button" >Next</button>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="row setup-content" id="step-7">
  						<div class="col-xs-12">
  							<div class="col-md-12">
  								<h2 class="fs-title">Upload Photos</h2>
  								<!-- <h3 class="fs-subtitle">Your presence on the social network</h3> -->
  								<div class="row-padding-remover" style="padding:0px;">
  									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  										<div class="form-group">
  											<div class="col-xs-12">
  												<!--  <input name="listingPhotos[]" class="btn btn-primary nextBtn  pull-left" type="file" multiple=""> -->
  												<input type="file" name="listingPhotos[]" id="imageUpload" class="hide alfa" multiple="" style="display: none !important" /> 
  												<label for="imageUpload" class="btn btn-large upload-btn nextBtn alfa">Upload Photos</label>
  												<div class="col-xs-12 selected-files">
  													<p><span id="number">0</span> Files Selected</p>
  												</div>
  											</div>
  											<!-- <div class="row-padding-remover" style="padding:0px;">
  												<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
  													<label class="pull-left custom-label">Add photos</label>                        
  												</div>
  											</div>
  											<div class="input-group">
  												<span class="input-group-btn">
  													<button id="fake-file-button-browse" type="button" class="btn btn-default btn-margin-bottom">
  														<span class="glyphicon glyphicon-file"></span>
  													</button>
  												</span>
  												<input multiple type="file" id="files-input-upload" name="listingPhotos[]" style="display:none">
  												<input multiple type="text" id="fake-file-input-name" disabled="disabled" placeholder="File not selected" class="form-control">
  												<span class="input-group-btn">
  													<button type="button" class="btn btn-default btn-margin-bottom" disabled="disabled" id="fake-file-button-upload">
  														<span class="glyphicon glyphicon-upload"></span>
  													</button>
  												</span>
  											</div> -->
  										</div>

  									</div>
  									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
  										<button class="btn btn-primary prevBtn" type="button" >Prev</button>
  										<button class="btn btn-danger nextBtn pull-right" type="submit">Save Listing</button>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>
  <script type="text/javascript">
        // Fake file upload
        document.getElementById('fake-file-button-browse').addEventListener('click', function() {
        	document.getElementById('files-input-upload').click();
        });

        document.getElementById('files-input-upload').addEventListener('change', function() {
        	document.getElementById('fake-file-input-name').value = this.value;

        	document.getElementById('fake-file-button-upload').removeAttribute('disabled');
        });
    </script>
</main>
<?php $this->load->view('common/footer') ?>
<script type="text/javascript">
	$('.alfa').change(function(){     
      var numFiles = $("input:file")[0].files.length;
      $('#number').text(numFiles);
    });

  $(".numberonly").keypress(function (e){
    var charCode = (e.which) ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
  });

  $(function() {
    $('#home_worth').maskMoney({prefix:'$ ', allowNegative: false, thousands:',', decimal:'.', precision: 0, affixesStay : false });
  })
</script>

</body>

</html>
