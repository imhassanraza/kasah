<?php $this->load->view('common/header') ?>
<main>
  <div class='pricing-page inner'>
    <div class='cost'>
      <div class='process-heading'>
        <h2>How much does Kasah cost?</h2>
        <p>Sellers pay 0% of their Listing price.</p>
      </div>
      <div class='cost-cards'>
        <div class='cost-card cost-card-primary'>
          <div class='cost-card-title'>
            Kasah
          </div>
          <div class='cost-card-content'>
            <div class='cost-card-percentage'>
              0%
            </div>
            <div class='cost-card-description'>
              We don't take a single peny from you!
              <!-- Paid during escrow, only if your home sells. -->
            </div>
          </div>
        </div>
        <div class='cost-card cost-card-default'>
          <div class='cost-card-title'>
            Traditional agent
          </div>
          <div class='cost-card-content'>
            <div class='cost-card-percentage'>
              6%
            </div>
            <div class='cost-card-description'>
              Agent fees are the largest expense of your home sale.
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class='included'>
      <div class='included-heading'>
        <h2>All of this is included</h2>
        <p>There is no charge to get started.</p>
      </div>
      <div class='included-items'>
        <article class='included-item'>
          <div class='included-item-icon'>
            <img src="assets/images/pricing/expert-support-ca2e2fcc.png" alt="Expert support" />
          </div>
          <div class='included-item-main'>
            <h3 class='included-item-title'>Expert Support</h3>
            <div class='included-item-content'>Kasah team members with real estate experience are available to give you personalized advice on your home sale or purchase.</div>
          </div>
        </article>
        <article class='included-item'>
          <div class='included-item-icon'>
            <img src="assets/images/pricing/manage-documents-dbf8d191.png" alt="Manage documents" />
          </div>
          <div class='included-item-main'>
            <h3 class='included-item-title'>The Paperwork</h3>
            <div class='included-item-content'>Kasah provides the documents you need for your transaction from offer documents to disclosures.</div>
          </div>
        </article>
        <article class='included-item'>
          <div class='included-item-icon'>
            <img src="assets/images/pricing/compare-negotiate-32d14f9b.png" alt="Compare negotiate" />
          </div>
          <div class='included-item-main'>
            <h3 class='included-item-title'>Online Offer Management</h3>
            <div class='included-item-content'>You can review documents, offers, and contracts within your account dashboard.</div>
          </div>
        </article>
        <article class='included-item'>
          <div class='included-item-icon'>
            <img src="assets/images/pricing/help-prepping-6ff98603.png" alt="Help prepping" />
          </div>
          <div class='included-item-main'>
            <h3 class='included-item-title'>Help Prepping Your Home</h3>
            <div class='included-item-content'>You’ll get personalized advice for preparing your home for sale from improving your pictures to writing a good home descripton.</div>
          </div>
        </article>
      </div>
    </section>
    <div class='cta'>
      <a href="<?php echo base_url() ?>signup" class=" btn-blue btn-new-round">Let’s get started</a>
    </div>
    <div class='pricing-featured-image'>
      <img src="assets/images/pricing/pool-scene-pricing-e92ccf43.jpg" alt="Pool scene pricing" />
    </div>
    <div class='included'>
      <div class='included-heading net-sheet-heading'>
        <h2>How much will you save with Kasah?</h2>
        <p>Use the calculator to see the estimated total costs of selling your home with traditional agent vs selling with Kasah.</p>
      </div>
    </div>
    <div class='net-sheet-container'>
      <div class='net-sheet-inputs'>
        <label for='agent-fee'>
          Agent fee percentage
        </label>
        <div class='agent-fee' id='agent-fee'></div>
        <div class='slider' id='slider'></div>
        <div class='net-sheet-input-group'>
          <label for='sale-price'>
            Sale price
          </label>
          <div class='input-container'>
            <input id='sale-price' name='sale-price' type='number' value='100000'>
            <div class='input-symbol'>
              $
            </div>
          </div>
        </div>
        <div class='net-sheet-input-group'>
          <label for='outstanding-mortgage'>
            Outstanding mortgage/loans
          </label>
          <div class='input-container'>
            <input id='outstanding-mortgage' name='outstanding-mortgage' type='number' value='2000'>
            <div class='input-symbol'>
              $
            </div>
          </div>
        </div>
        <div class='net-sheet-input-group'>
          <label for='taxes-due'>
            Taxes due
          </label>
          <div class='input-container'>
            <input id='taxes-due' name='taxes-due' type='number' value='15000'>
            <div class='input-symbol'>
              $
            </div>
          </div>
        </div>
        <div class='net-sheet-input-group'>
          <label for='other-fees'>
            Other fees and costs
          </label>
          <div class='input-container'>
            <input id='other-fees' name='other-fees' type='number' value='15000'>
            <div class='input-symbol'>
              $
            </div>
          </div>
        </div>
      </div>
      <div class='net-sheet-results'>
        <div class='net-sheet-result-section'>
          <div class='net-sheet-featured-result primary-result'>
            <h3>
              Take home with Kasah
            </h3>
            <div class='featured-result' id='kasah-take-home'></div>
          </div>
          <div class='net-sheet-result bold-result'>
            <div class='title'>
              You save
            </div>
            <div id='kasah-savings'></div>
          </div>
          <div class='net-sheet-result'>
            <div class='title'>
              Total costs
            </div>
            <div id='kasah-total-costs'></div>
          </div>
        </div>
        <div class='net-sheet-result-section'>
          <div class='net-sheet-featured-result'>
            <h3>
              Take home with agent
            </h3>
            <div class='featured-result' id='agent-take-home'></div>
          </div>
          <div class='net-sheet-result'>
            <div class='title'>
              Agent commission
            </div>
            <div id='agent-commission'></div>
          </div>
          <div class='net-sheet-result'>
            <div class='title'>
              Total costs
            </div>
            <div id='agent-total-costs'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class='footer-cta'>
    <h3>
      Ready to get started?
    </h3>
    <a href="<?php echo base_url() ?>signup" class="btn-new-round">Sign up now</a>
  </div>
</main>
<?php $this->load->view('common/footer') ?>
</body>
</html>
