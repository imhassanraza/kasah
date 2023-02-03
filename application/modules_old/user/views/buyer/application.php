<?php echo $this->load->view('common/header') ?>
<main>
  <div class='faq-hero' style="background: #d10606 url('<?php echo base_url() ?>assets/faxon/img/buy-bg.jpg'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
    <?php $this->load->view('user/navigation') ?>
  </div>
  <div class="container form-container">
    <section class='faq-group form-section'>
      <h2>Pre-Qualification Application</h2>
      <form action="<?php echo base_url() ?>user/application/insertApplication" method="post">

        <!-- application form -->
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12 form-group">
            <div class="form-group">
              <label for="happy" class="buy-label">Does your household have any of the following acceptable forms to verify your income?</label>
              <div class="input-group">
                <div id="radioBtn" class="btn-group">
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy0" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy0" data-title="N">NO</a>
                </div>
                <input type="hidden" name="accepted_form" id="happy0" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="N">NO</a>
                </div>
                <input type="hidden" name="yearly_amount" id="happy" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy1" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy1" data-title="N">NO</a>
                </div>
                <input type="hidden" name="rent_amount" id="happy1" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy2" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy2" data-title="N">NO</a>
                </div>
                <input type="hidden" name="bankruptcy" id="happy2" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy3" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy3" data-title="N">NO</a>
                </div>
                <input type="hidden" name="apartment_collections" id="happy3" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy4" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy4" data-title="N">NO</a>
                </div>
                <input type="hidden" name="sex_offender" id="happy4" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy5" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy5" data-title="N">NO</a>
                </div>
                <input type="hidden" name="lease_agreement" id="happy5" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy6" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy6" data-title="N">NO</a>
                </div>
                <input type="hidden" name="reported_damage" id="happy6" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy7" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy7" data-title="N">NO</a>
                </div>
                <input type="hidden" name="home_business" id="happy7" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy8" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy8" data-title="N">NO</a>
                </div>
                <input type="hidden" name="have_pets" id="happy8" value="N">
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
                  <a class="btn btn-primary btn-sm notActive" data-toggle="happy9" data-title="Y">YES</a>
                  <a class="btn btn-primary btn-sm active" data-toggle="happy9" data-title="N">NO</a>
                </div>
                <input type="hidden" name="process_days" id="happy9" value="N">
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12">
            <select class="form-control my-select" id="state" name="state_id">
              <option>State of Interest</option>
              <?php foreach ($states as $state) {?>
              <option code="<?php echo $state['state_code'] ?>" value="<?php echo $state['id'] ?>"><?php echo $state['state_name'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12" id="cities">
            <select class="form-control my-select" name="city_id">
              <option>City of Interest</option>
            </select>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-input" name="rent_permonth" placeholder="Target Rent Amount/Month">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-input date-input" name="movein_date" placeholder="Select move in date">
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col-xs-12">
            <div class="form-group remove-form-group-margin">
              <div class="funkyradio">
                <div class="checkbox checkbox-danger pull-left">
                  <input type="checkbox" name="disclosure" id="checkbox7" checked value="Y" />
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
                  <input type="checkbox" name="policies" id="checkbox8" checked value="Y" />
                  <label for="checkbox8" class="buy-label">I have read and agree to the Kasah Application Policies</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-padding-remover form-row">
          <div class="col-lg-3  center-block">
            <button type="submit" class="submit-btn">Submit</button>
          </div>
        </div>
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
</html>
