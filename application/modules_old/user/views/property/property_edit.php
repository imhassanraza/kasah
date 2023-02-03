<?php $this->load->view('common/header') ?>
<main>
  <div class="hero sell-hero">
  </div>
  <div class='who-we-are' id="property-edit">
    <div class="container">
      <div class="row">
        <div class="col-xs-12" id="form-main-col">
          <form role="form" action="<?php echo base_url() ?>user/property/updateProperty" method="post" enctype="multipart/form-data">
            <div class="col-xs-12">
              <h2 class="content-h2-heading">Edit your listing</h2>
            </div>
            <div class="col-xs-12">
              <a class="btn btn-primary nextBtn  pull-right" href="<?php echo base_url() ?>user/property/view/<?php echo $listing['sell_id'] ?>">Back</a>
            </div>
            <div class="col-xs-12">
              <p class="content-p-heading">Upload Your Photos</p>
            </div>
            <!-- photos thumbnail -->
            <div class="col-xs-12 photo-thumbnail card no-box">
              <?php foreach ($listing['images'] as $img): ?>
                <div class=" col-xs-12 col-sm-4 paddinghalf row_<?php echo $img['id'] ?>">
                  <div class="thumbnail col-xs-12">
                    <div class="card-image">
                      <img src="<?php echo base_url() ?>uploads/images/<?php echo $img['photo_name'] ?>" class="img-responsive center-block" alt="<?php echo $img['img_type'] ?>">
                    </div>  
                    <div class="caption">
                      <div class="col-xs-12 col-sm-12 col-md-8 nopadding">
                        <p class="text-center img_name"></p>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4">
                        <button data-row-id="<?php echo $img['id'] ?>" data-sell-id="<?php echo $listing['sell_id'] ?>" data-img-name="<?php echo $img['photo_name'] ?>" class="btn btn-primary nextBtn  pull-right deletebtn imgDeleteBtn" type="button">Delete</button>
                      </div>
                      <div class="col-xs-12 nopadding featured_img property_view_block">
                        <input <?php echo ($listing['feature_img'] == $img['photo_name'])?"checked":"" ?> data-sell-id="<?php echo $listing['sell_id'] ?>" data-img-name="<?php echo $img['photo_name'] ?>" class="featureImgUpdate" type="radio" name="featured_img" id="<?php echo $img['photo_name'] ?>">
                        <label for="<?php echo $img['photo_name'] ?>">
                          Use as Featured Image
                        </label>
                            <!-- <div class="btn-group" data-toggle="buttons">
                              <label class="btn btn-primary">
                                  <input type="radio" name="options" id="option1" autocomplete="off">
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>
                              </div> -->  
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>
                  </div>
                  <div class="col-xs-12">
                   <!--  <input name="listingPhotos[]" class="btn btn-primary nextBtn  pull-left" type="file" multiple=""> -->
                   <input type="file" name="imageUpload[]" id="imageUpload" class="hide alfa" multiple="" /> 
                   <label for="imageUpload" class="btn btn-large upload-btn nextBtn alfa">Upload Photos</label>
                   <div class="col-xs-12 selected-files">
                    <p><span id="number">0</span> Files Selected</p>
                  </div>
                </div>
                <!-- <div class="col-xs-12 margin-top-15">
                  <p class="content-p-heading">Documents</p>
                </div>
                <div class="col-xs-12">
                  <button class="btn btn-primary nextBtn  pull-left margin-top-15" type="button">Upload Documents</button>
                </div> -->
                <div class="col-xs-12 margin-top-15">
                  <p class="content-p-heading">Details About your home</p>
                </div>
                <input type="hidden" name="sell_id" value="<?php echo $listing['sell_id'] ?>">
                <div class="col-xs-12">
                  <div class="form-group col-xs-12 margin-top-15">
                    <input title="Your Home Address" class="form-control tip-right" name="home_address" placeholder="965 US-1, York, ME 03909, USA" type="text" value="<?php echo $listing['home_address'] ?>">
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <select class="form-control tip-right" name="property_id" title="Property Type">
                      <?php 
                      $data = getAll('ref_property_type');
                      foreach ($data as $type) {?>
                      <option <?php echo ($listing['property_id'] == $type['id'])?"selected":""; ?> value="<?php echo $type['id'] ?>"><?php echo $type['property_type'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                    <div class="form-group">
                      <input class="form-control tip-right numberonly" title="Square Feet" value="<?php echo $listing['square_feet']; ?>" name="square_feet" placeholder="Square Feet" type="text">
                    </div>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <select class="form-control tip-right" name="bedrooms" title="Bedrooms">
                      <option <?php echo ($listing['bedrooms'] == 1)?"selected":""; ?> value="1" selected="selected">1 Bedroom</option>
                      <option <?php echo ($listing['bedrooms'] == 2)?"selected":""; ?> value="2">2 Bedrooms</option>
                      <option <?php echo ($listing['bedrooms'] == 3)?"selected":""; ?> value="3">3 Bedrooms</option>
                      <option <?php echo ($listing['bedrooms'] == 4)?"selected":""; ?> value="4">4 Bedrooms</option>
                      <option <?php echo ($listing['bedrooms'] == 5)?"selected":""; ?> value="5">5 Bedrooms</option>
                    </select>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                    <div class="form-group">
                      <input class="form-control tip-right numberonly" title="Lot Size (sqft)" value="<?php echo $listing['lotsize_sqft'] ?>" name="lotsize_sqft" placeholder="Lot Size  (sqft)" type="text">                
                    </div>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <select class="form-control tip-right" name="bathrooms" title="Bathrooms">
                      <option <?php echo ($listing['bathrooms'] == 1)?"selected":""; ?> value="1" selected="selected">1 Bathroom</option>
                      <option <?php echo ($listing['bathrooms'] == 2)?"selected":""; ?> value="2" selected="selected">2 Bathrooms</option>
                      <option <?php echo ($listing['bathrooms'] == 3)?"selected":""; ?> value="3" selected="selected">3 Bathrooms</option>
                      <option <?php echo ($listing['bathrooms'] == 4)?"selected":""; ?> value="4" selected="selected">4 Bathrooms</option>
                      <option <?php echo ($listing['bathrooms'] == 5)?"selected":""; ?> value="5" selected="selected">5 Bathrooms</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <input class="form-control numberonly tip-right" title="Year Build" value="<?php echo $listing['yearbuilt'] ?>" name="yearbuilt" placeholder="Year Built" type="text">
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <select class="form-control tip-right" name="partial_baths" title="Partial Baths">
                      <option <?php echo ($listing['partial_baths'] == 1)?"selected":""; ?> value="1" selected="selected">1 Partial Bath</option>
                      <option <?php echo ($listing['partial_baths'] == 2)?"selected":""; ?> value="2" selected="selected">2 Partial Baths</option>
                      <option <?php echo ($listing['partial_baths'] == 3)?"selected":""; ?> value="3" selected="selected">3 Partial Baths</option>
                      <option <?php echo ($listing['partial_baths'] == 4)?"selected":""; ?> value="4" selected="selected">4 Partial Baths</option>
                      <option <?php echo ($listing['partial_baths'] == 5)?"selected":""; ?> value="5" selected="selected">5 Partial Baths</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <select class="form-control tip-right" name="occupancy_id" title="Occupancy Type">
                      <?php 
                      $data = getAll('ref_occupancy');
                      foreach ($data as $type) {?>
                      <option <?php echo ($listing['occupancy_id'] == $type['id'])?"selected":""; ?> value="<?php echo $type['id'] ?>"><?php echo $type['occupancy'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12 custom-col-md-6">
                    <select class="form-control tip-right" name="fireplace_id" title="Fireplace Type">
                      <?php 
                      $data = getAll('ref_fireplace');
                      foreach ($data as $type) {?>
                      <option <?php echo ($listing['fireplace_id'] == $type['id'])?"selected":""; ?> value="<?php echo $type['id'] ?>"><?php echo $type['fireplace_type'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12 custom-col-md-6">
                    <select class="form-control tip-right" name="heating_id" title="Heating Type">
                      <?php 
                      $data = getAll('ref_heating');
                      foreach ($data as $type) {?>
                      <option <?php echo ($listing['heating_id'] == $type['id'])?"selected":""; ?> value="<?php echo $type['id'] ?>"><?php echo $type['heating_type'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <select class="form-control tip-right" name="cooling_id" title="Cooling Type">
                      <?php 
                      $data = getAll('ref_cooling');
                      foreach ($data as $type) {?>
                      <option <?php echo ($listing['cooling_id'] == $type['id'])?"selected":""; ?> value="<?php echo $type['id'] ?>"><?php echo $type['cooling_type'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-xs-12 margin-top-15">
                  <p class="content-p-heading">Dining Room Features (select all that apply)<span class="content-p-heading-span">How do i know what i have ?</span></p>
                </div>
                <div class="col-xs-12">
                  <?php 
                  $data = getAll('ref_dining_room');
                  foreach ($data as $type){
                    if (in_array($type['id'], $listing['int_feature']['dining'])) {
                      $check = "checked";
                    }else{
                      $check = "";
                    }?>
                    <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                      <div class="checkbox checkbox-danger pull-left">
                        <input value="<?php echo $type['id']?>" name="dining[]" class="dining-room-feature-chick-box" id="dining<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                        <label class="checkbox-mini-label" for="dining<?php echo $type['id']?>"><?php echo $type['dining_type']?></label>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Family Room Features (select all that apply)</p>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <?php 
                    $data = getAll('ref_family_room');
                    foreach ($data as $type){
                      if (in_array($type['id'], $listing['int_feature']['family'])) {
                        $check = "checked";
                      }else{
                        $check = "";
                      }?>
                      <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="checkbox checkbox-danger pull-left">
                          <input value="<?php echo $type['id']?>" name="family[]" class="dining-room-feature-chick-box" id="family<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                          <label class="checkbox-mini-label" for="family<?php echo $type['id']?>"><?php echo $type['family_room_type']?></label>
                        </div>
                      </div>
                      <?php 
                    } ?>
                    <div class="col-xs-12 nopadding margin-top-15">
                      <div class="form-group col-sm-6 col-xs-12">
                        <select class="form-control tip-right" name="horse_property" title="Horse Property">
                          <option value="">Horse Property</option>
                          <option <?php echo ($listing['horse_property'] == "Y")? "selected" : "" ?> value="Y">Yes</option>
                          <option <?php echo ($listing['horse_property'] == "N")? "selected" : "" ?> value="N">No</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                        <select class="form-control tip-right" name="carport" title="Carport">
                          <option value="">Carport</option>
                          <option <?php echo ($listing['carport'] == 1)? "selected" : "" ?> value="1">1</option>
                          <option <?php echo ($listing['carport'] == 2)? "selected" : "" ?> value="2">2</option>
                          <option <?php echo ($listing['carport'] == 3)? "selected" : "" ?> value="3">3</option>
                          <option <?php echo ($listing['carport'] == 4)? "selected" : "" ?> value="4">4</option>
                          <option <?php echo ($listing['carport'] == 5)? "selected" : "" ?> value="5">5</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                        <select class="form-control tip-right" name="pool" title="Pool">
                          <option value="">Pool</option>
                          <option <?php echo ($listing['pool'] == "Y")? "selected" : "" ?> value="Y">Yes</option>
                          <option <?php echo ($listing['pool'] == "N")? "selected" : "" ?> value="N">No</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                        <select class="form-control tip-right" name="garage_space" title="Garage Spaces">
                          <option value="">Garage Spaces</option>
                          <option <?php echo ($listing['garage_space'] == 1)? "selected" : "" ?> value="1">1</option>
                          <option <?php echo ($listing['garage_space'] == 2)? "selected" : "" ?> value="2">2</option>
                          <option <?php echo ($listing['garage_space'] == 3)? "selected" : "" ?> value="3">3</option>
                          <option <?php echo ($listing['garage_space'] == 4)? "selected" : "" ?> value="4">4</option>
                          <option <?php echo ($listing['garage_space'] == 5)? "selected" : "" ?> value="5">5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Parking Features (select all that apply)</p>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <?php 
                    $data = getAll('ref_parking_feature');
                    foreach ($data as $type){
                      if (in_array($type['id'], $listing['ext_feature']['parking'])) {
                        $check = "checked";
                      }else{
                        $check = "";
                      }?>
                      <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="checkbox checkbox-danger pull-left">
                          <input value="<?php echo $type['id']?>" name="parking[]" class="dining-room-feature-chick-box" id="parking<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                          <label class="checkbox-mini-label" for="parking<?php echo $type['id']?>"><?php echo $type['parking_type']?></label>
                        </div>
                      </div>
                      <?php 
                    } ?>

                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Foundation (select all that apply)</p>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <?php 
                    $data = getAll('ref_foundation');
                    foreach ($data as $type){
                      if (in_array($type['id'], $listing['ext_feature']['foundation'])) {
                        $check = "checked";
                      }else{
                        $check = "";
                      }?>
                      <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="checkbox checkbox-danger pull-left">
                          <input value="<?php echo $type['id']?>" name="foundation[]" class="dining-room-feature-chick-box" id="foundation<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                          <label class="checkbox-mini-label" for="foundation<?php echo $type['id']?>"><?php echo $type['foundation_type']?></label>
                        </div>
                      </div>
                      <?php 
                    } ?>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Roof (select all that apply)</p>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <?php 
                    $data = getAll('ref_roof');
                    foreach ($data as $type){
                      if (in_array($type['id'], $listing['ext_feature']['roof'])) {
                        $check = "checked";
                      }else{
                        $check = "";
                      }?>
                      <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="checkbox checkbox-danger pull-left">
                          <input value="<?php echo $type['id']?>" name="roof[]" class="dining-room-feature-chick-box" id="roof<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                          <label class="checkbox-mini-label" for="roof<?php echo $type['id']?>"><?php echo $type['roof_type']?></label>
                        </div>
                      </div>
                      <?php 
                    } ?>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Utilities (select all that apply)</p>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <?php 
                    $data = getAll('ref_utilities');
                    foreach ($data as $type){
                      if (in_array($type['id'], $listing['ext_feature']['utilities'])) {
                        $check = "checked";
                      }else{
                        $check = "";
                      }?>
                      <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="checkbox checkbox-danger pull-left">
                          <input value="<?php echo $type['id']?>" name="utilities[]" class="dining-room-feature-chick-box" id="utilities<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                          <label class="checkbox-mini-label" for="utilities<?php echo $type['id']?>"><?php echo $type['utilities']?></label>
                        </div>
                      </div>
                      <?php 
                    } ?>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Water (select all that apply)</p>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <?php 
                    $data = getAll('ref_water');
                    foreach ($data as $type){
                      if (in_array($type['id'], $listing['ext_feature']['water'])) {
                        $check = "checked";
                      }else{
                        $check = "";
                      }?>
                      <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="checkbox checkbox-danger pull-left">
                          <input value="<?php echo $type['id']?>" name="water[]" class="dining-room-feature-chick-box" id="water<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                          <label class="checkbox-mini-label" for="water<?php echo $type['id']?>"><?php echo $type['water_system']?></label>
                        </div>
                      </div>
                      <?php 
                    } ?>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Sewer (select all that apply)</p>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <?php 
                    $data = getAll('ref_sewer');
                    foreach ($data as $type){
                      if (in_array($type['id'], $listing['ext_feature']['sewer'])) {
                        $check = "checked";
                      }else{
                        $check = "";
                      }?>
                      <div class="funkyradio col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="checkbox checkbox-danger pull-left">
                          <input value="<?php echo $type['id']?>" name="sewer[]" class="dining-room-feature-chick-box" id="sewer<?php echo $type['id']?>" type="checkbox" <?php echo $check; ?>>
                          <label class="checkbox-mini-label" for="sewer<?php echo $type['id']?>"><?php echo $type['sewer_type']?></label>
                        </div>
                      </div>
                      <?php 
                    } ?>
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <p class="content-p-heading">Schedule your home inspection</p>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <input type="text" name="contact_date"  class="form-control date-input tip-right" value="<?php echo date('m/d/Y',strtotime($listing['contact_date'])) ?>" title="Date">
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <input type="text" name="start_time"  class="form-control tip-right" value="<?php echo $listing['start_time'] ?>" title="Start Time">
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <input type="text" name="end_time" class="form-control tip-right" value="<?php echo $listing['end_time'] ?>" title="End Time">
                  </div>
                  <div class="col-xs-12 margin-top-15">
                    <div class="col-xs-12 col-sm-6">
                      <div class="col-xs-12 col-sm-8 nopadding">
                        <p class="hoa_text">Do you have an HOA ?</p>
                      </div>
                      <div class="col-xs-12 col-sm-4">
                        <div class="col-xs-6 nopadding">
                          <input <?php echo ($listing['hoa_check'] == "Y")? "checked" : ""; ?> value="Y" type="radio" name="hoa_check" class="hoa_rad">Yes
                        </div>
                        <div class="col-xs-6 nopadding">
                          <input <?php echo ($listing['hoa_check'] == "N")? "checked" : ""; ?> value="N" type="radio" name="hoa_check" class="hoa_rad">No
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="col-xs-12 col-sm-8 nopadding">
                        <p class="hoa_text">Would you be interested in a Lease Option?</p>
                      </div>
                      <div class="col-xs-12 col-sm-4">
                        <div class="col-xs-6 nopadding">
                          <input <?php echo ($listing['lease_option'] == "Y")? "checked" : ""; ?> value="Y" type="radio" name="lease_option" class="hoa_rad">Yes
                        </div>
                        <div class="col-xs-6 nopadding">
                          <input <?php echo ($listing['lease_option'] == "N")? "checked" : ""; ?> value="N" type="radio" name="lease_option" class="hoa_rad">No
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12">
                      <input class="form-control tip-right" name="esd" placeholder="Elementary school district" type="text" value="<?php echo $listing['esd'] ?>" title="Elementary school District">
                    </div>
                    <!-- <div class="form-group col-sm-6 col-xs-12">
                      <input class="form-control" name="neighboorhood" placeholder="Neighboorhood" type="text" value="<?php echo $listing['hsd'] ?>">
                    </div> -->
                    <div class="form-group col-sm-6 col-xs-12">
                      <input class="form-control tip-right" name="hsd" placeholder="High school district" type="text" value="<?php echo $listing['hsd'] ?>" title="High school District">
                    </div>
                    <div class="form-group col-xs-12">
                      <textarea class="form-control tip-right" name="home_desc" placeholder="Home Decription" rows="10" title="Home Description"><?php echo $listing['home_desc'] ?></textarea>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label pull-left custom-label">What Do you think your home is worth ?</label>
                        <input class="form-control tip-right price-worth-q-control numberonly" id="home_worth" name="home_worth" placeholder="" type="text" value="<?php echo number_format($listing['home_worth']) ?>" title="Home Worth">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label pull-left custom-label">
                          What’s great about your home?
                        </label>
                        <textarea rows="1" name="about_home" class="form-control tip-right price-worth-q-control" title="Anything Great about your home"><?php echo $listing['about_home'] ?></textarea>
                      </div>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12">
                      <input class="form-control tip-right" name="contact_name" placeholder="Primary Contact Name" type="text" value="<?php echo $listing['contact_name'] ?>" title="Name">
                    </div>
                    <div class="form-group col-sm-6 col-xs-12">
                      <input class="form-control tip-right" name="contact_email" placeholder="Primary Contact Email" type="text" value="<?php echo $listing['contact_email'] ?>" title="Email">
                    </div>
                    <div class="form-group col-xs-12">
                      <textarea class="form-control tip-right" name="instruction_to_buyer" placeholder="Do you have any special instruction for Inspecting Agent?" rows="10" title="Instruction to Inspection Agent"><?php echo $listing['instruction_to_buyer'] ?></textarea>
                    </div>
                    <div class="col-xs-12">
                      <button class="btn btn-primary nextBtn  pull-right" type="submit">Update</button>
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
  </body>
  <script type="text/javascript">
    $(document).on('click','.imgDeleteBtn', function(){
      var img_name = $(this).attr('data-img-name');
      var sell_id = $(this).attr('data-sell-id');
      var row_id = $(this).attr('data-row-id');
      $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>user/property/deleteFeatureImg",
        data: "photo_name=" + img_name + "&sell_id=" + sell_id,
        success: function(result){
          $(".row_"+row_id).remove();
        }
      });
    });

    $(document).on('change','.featureImgUpdate', function(){
      var img_name = $(this).attr('data-img-name');
      var sell_id = $(this).attr('data-sell-id');
      $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>user/property/updateFeatureImg",
        data: "photo_name=" + img_name + "&sell_id=" + sell_id,
        success: function(result){
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".tip-right").tooltip({
        placement : 'top'
      });
    });


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
  });
  </script>
  </html>
