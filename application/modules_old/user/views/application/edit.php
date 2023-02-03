<?php echo $this->load->view('common/header') ?>
<main>
  <div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
    <?php $this->load->view('user/navigation') ?>
  </div>
  <div class="container form-container">
    <section class='faq-group form-section'>
      <h2>Pre-Qualification Application</h2>
      <?php if($application['is_approved'] == "N" && $application['is_complete'] == "Y"){ ?>
        <div class="alert alert-info">
          <b>Pending!</b> This application is waiting for approval.
        </div>
      <?php }else if($application['is_approved'] == "Y" && $application['is_complete'] == "N"){ ?>
        <div class="alert alert-info">
          <b>Approved!</b> This application is approved.
        </div>
      <?php } ?>
      <form action="<?php echo base_url() ?>user/application/updateApplication" method="post" id="appUpdateForm">

        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="firstname" class="buy-label">Legal First Name</label>
              <input type="text" id="firstname" class="form-control required" name="firstname" placeholder="Enter First Name Here" value="<?php echo $buyer_detail['firstname'] ?>">
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="middleinitial" class="buy-label">Middle Initial</label>
              <input type="text" id="middleinitial" class="form-control required" name="middleinitial" placeholder="Enter Middle Initial Here" value="<?php echo $buyer_detail['middleinitial'] ?>">
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="lastname" class="buy-label">Last Name</label>
              <input type="text" id="lastname" class="form-control required" name="lastname" placeholder="Enter Last Name Here" value="<?php echo $buyer_detail['lastname'] ?>">
            </div>
          </div>
        </div>

        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="suffix" class="buy-label">Suffix</label>
              <select name="suffix" id="suffix" class="form-control required my-select">
                <option <?php echo ($buyer_detail['suffix'] == "none" )?"selected":"" ?> value="none">None</option>
                <option <?php echo ($buyer_detail['suffix'] == "2" )?"selected":"" ?> value="2">II</option>
                <option <?php echo ($buyer_detail['suffix'] == "3" )?"selected":"" ?> value="3">III</option>
                <option <?php echo ($buyer_detail['suffix'] == "4" )?"selected":"" ?> value="4">IV</option>
                <option <?php echo ($buyer_detail['suffix'] == "5" )?"selected":"" ?> value="5">V</option>
                <option <?php echo ($buyer_detail['suffix'] == "jr" )?"selected":"" ?> value="jr">Jr</option>
                <option <?php echo ($buyer_detail['suffix'] == "sr" )?"selected":"" ?> value="sr">Sr</option>
              </select>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="email" class="buy-label">Email</label>
              <input type="email" id="email" class="form-control required" name="email" placeholder="Enter Email Address Here" value="<?php echo $buyer_detail['email'] ?>">
            </div>
          </div>
        </div>

        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="homeaddress" class="buy-label">Home Address</label>
              <input type="text" id="homeaddress" class="form-control required" name="homeaddress" placeholder="Enter Your Home Address Here" value="<?php echo $buyer_detail['homeaddress'] ?>">
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="unitnumber" class="buy-label required">Unit/Apt#</label>
              <input type="text" id="unitnumber" class="form-control" name="unitnumber" placeholder="Enter Apt.# Here" value="<?php echo $buyer_detail['unitnumber'] ?>">
            </div>
          </div>
        </div>

        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="state_app" class="buy-label">State</label>
              <select class="form-control my-select required" id="state_app" name="state_app">
                <option value="">Select Your State</option>
                <?php foreach ($states as $state) {?>
                <?php if ($state['state_code'] == "CA"): ?>
                  <option <?php echo ($buyer_detail['state_id'] == $state['id'] )?"selected":"" ?> code="<?php echo $state['state_code'] ?>" value="<?php echo $state['id'] ?>"><?php echo $state['state_name'] ?></option>
                <?php endif ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="city_name" class="buy-label">City</label>
              <input type="text" id="city_name" class="form-control required" name="city_name" placeholder="Enter City Here" value="<?php echo $buyer_detail['city_name'] ?>">
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="zipcode" class="buy-label">Zip Code</label>
              <input type="text" id="zipcode" class="form-control required" name="zipcode" placeholder="Enter Zip Code Here" value="<?php echo $buyer_detail['zipcode'] ?>">
            </div>
          </div>
        </div>

        <!-- application form -->
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="happy" class="buy-label">Does your household have any of the following acceptable forms to verify your income?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['accepted_form'] == "Y")?"active":"notActive"; ?>" data-toggle="happy0" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['accepted_form'] == "N")?"active":"notActive"; ?>" data-toggle="happy0" data-title="N">NO</a>
                </div>
                <input type="hidden" name="accepted_form" id="happy0" value="<?php echo $application['accepted_form'] ?>">
              </div>
              <?php foreach ($forms as $form): ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
                  <label class="buy-label"><?php echo $form['form_name'] ?></label>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy" class="buy-label">Does  your household make a minimum of $50,000 per year?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['yearly_amount'] == "Y")?"active":"notActive"; ?>" data-toggle="happy" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['yearly_amount'] == "N")?"active":"notActive"; ?>" data-toggle="happy" data-title="N">NO</a>
                </div>
                <input type="hidden" name="yearly_amount" id="happy" value="<?php echo $application['yearly_amount'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy2" class="buy-label">Do you have at least twice your target rent amount available in a bank account?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['rent_amount'] == "Y")?"active":"notActive"; ?>" data-toggle="happy1" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['rent_amount'] == "N")?"active":"notActive"; ?>" data-toggle="happy1" data-title="N">NO</a>
                </div>
                <input type="hidden" name="rent_amount" id="happy1" value="<?php echo $application['rent_amount'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy2" class="buy-label">Do you or any household member have an open/unsatisfied Chapter 7 Bankruptcy or pending bankruptcy? If Bankruptcy is satisfied or discharged please answer 'no</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['bankruptcy'] == "Y")?"active":"notActive"; ?>" data-toggle="happy2" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['bankruptcy'] == "N")?"active":"notActive"; ?>" data-toggle="happy2" data-title="N">NO</a>
                </div>
                <input type="hidden" name="bankruptcy" id="happy2" value="<?php echo $application['bankruptcy'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy3" class="buy-label">Have  you or any household member ever been evicted or have or had any outstanding apartment collections?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['apartment_collections'] == "Y")?"active":"notActive"; ?>" data-toggle="happy3" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['apartment_collections'] == "N")?"active":"notActive"; ?>" data-toggle="happy3" data-title="N">NO</a>
                </div>
                <input type="hidden" name="apartment_collections" id="happy3" value="<?php echo $application['apartment_collections'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy4" class="buy-label">Are you or any household member a registered sex offender or sexual predator or otherwise subject to  reporting requirements of any state, territorial, or tribal sex offender  registry?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['sex_offender'] == "Y")?"active":"notActive"; ?>" data-toggle="happy4" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['sex_offender'] == "N")?"active":"notActive"; ?>" data-toggle="happy4" data-title="N">NO</a>
                </div>
                <input type="hidden" name="sex_offender" id="happy4" value="<?php echo $application['sex_offender'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy5" class="buy-label">Are you or any household member currently in default under a lease agreement?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['lease_agreement'] == "Y")?"active":"notActive"; ?>" data-toggle="happy5" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['lease_agreement'] == "N")?"active":"notActive"; ?>" data-toggle="happy5" data-title="N">NO</a>
                </div>
                <input type="hidden" name="lease_agreement" id="happy5" value="<?php echo $application['lease_agreement'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy6" class="buy-label">Have you or any household member ever been reported for a damage to a property in the last 5 years?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['reported_damage'] == "Y")?"active":"notActive"; ?>" data-toggle="happy6" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['reported_damage'] == "N")?"active":"notActive"; ?>" data-toggle="happy6" data-title="N">NO</a>
                </div>
                <input type="hidden" name="reported_damage" id="happy6" value="<?php echo $application['reported_damage'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy7" class="buy-label">Do you intend to carry on any business, profession, or trade of any kind from home (i.e. will anyone be visiting the home for business purposes)?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['home_business'] == "Y")?"active":"notActive"; ?>" data-toggle="happy7" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['home_business'] == "N")?"active":"notActive"; ?>" data-toggle="happy7" data-title="N">NO</a>
                </div>
                <input type="hidden" name="home_business" id="happy7" value="<?php echo $application['home_business'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy8" class="buy-label">Do you have any pets?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['have_pets'] == "Y")?"active":"notActive"; ?>" data-toggle="happy8" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['have_pets'] == "N")?"active":"notActive"; ?>" data-toggle="happy8" data-title="N">NO</a>
                </div>
                <input type="hidden" name="have_pets" id="happy8" value="<?php echo $application['have_pets'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <label for="happy9" class="buy-label">I understand that Kasah process can generally take 35-45 days from the time Kasah goes under contract to buy a home until I may be able to move  in. I have sufficient time in my moving plans for this general timeframe and understand it may change depending on the circumstances of a particular situation</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm <?php echo ($application['process_days'] == "Y")?"active":"notActive"; ?>" data-toggle="happy9" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm <?php echo ($application['process_days'] == "N")?"active":"notActive"; ?>" data-toggle="happy9" data-title="N">NO</a>
                </div>
                <input type="hidden" name="process_days" id="happy9" value="<?php echo $application['process_days'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12">
            <select class="form-control my-select required" id="state" name="state_id">
              <option value="">State of Interest</option>
              <?php foreach ($states as $state) {?>
              <?php if ($state['state_code'] == "CA"): ?>
                <option <?php echo ($application['state_id'] == $state['id'])?"selected":""; ?> code="<?php echo $state['state_code'] ?>" value="<?php echo $state['id'] ?>"><?php echo $state['state_name'] ?></option>
              <?php endif ?>
              <?php } ?>
            </select>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12" id="cities">
            <select class="form-control my-select required" name="city_id">
              <option value="">City of Interest</option>
              <?php foreach ($cities as $city) {?>
              <?php if ($city['city_name'] == "San Diego" && $city['state_code'] == "CA"): ?>
                <option <?php echo ($application['city_id'] == $city['id'])?"selected":""; ?> value="<?php echo $city['id'] ?>"><?php echo $city['city_name'] ?></option>
              <?php endif ?>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control number required form-input" name="rent_permonth" placeholder="Target Monthly Payment" value="<?php echo $application['rent_permonth'] ?>">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control required form-input date-input" name="movein_date" placeholder="Select move in date" value="<?php echo date('m/d/Y',strtotime($application['movein_date'])); ?>">
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group remove-form-group-margin">
              <div class="funkyradio">
                <div class="checkbox checkbox-danger pull-left">
                  <input type="checkbox" name="disclosure" id="checkbox7" <?php echo ($application['disclosure'] == "Y")?"checked":""; ?> value="Y" />
                  <label for="checkbox7" class="buy-label">This application MUST BE COMPLETED by the applicant. By checking this box, under penalties of applicable laws, I certify that I am the actual applicant completing this application and that all information I provided  is true, complete, and correct. *</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group remove-form-group-margin">
              <div class="funkyradio">
                <div class="checkbox checkbox-danger pull-left">
                  <input type="checkbox" name="policies" id="checkbox8" <?php echo ($application['policies'] == "Y")?"checked":""; ?> value="Y" />
                  <label for="checkbox8" class="buy-label">I have read and agree to the Kasah Application Policies</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if ($application['is_approved'] == "N" && $application['is_complete'] == "N"){ ?>
        <input type="hidden" name="appid" value="<?php echo $application['id'] ?>">
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12  center-block marg20 edit-submit">
            <button type="submit" class="submit-btn marg20 " name="approval" value="Y">Save & Request for Approval</button>
            <button type="submit" class="submit-btn marg20 " name="approval" value="N">Save</button>
          </div>
        </div>
        <?php } ?>
      </form>
      <div class="clear"></div>
    </section>
  </div>
</main>

<?php $this->load->view('common/footer') ?>
</body>

<script type="text/javascript">
  $(document).on('change','#state',function(){
    var state = $(this).find('option:selected').attr("code");
    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>user/loadCities",
      data: "state_code=" + state,
      datatype: "JSON",
      success: function(output){
        var response = $.parseJSON(output);
        $('#cities').html(response.select);
      }
    });
  });
</script>
<script type="text/javascript">
  $("#appUpdateForm").validate();
  $(".number").keypress(function (e) {
     //if the letter is not digit then don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        return false;
      }
    });
  </script>
  </html>
