<?php $this->load->view('common/header') ?>
<main>
  <header class='full sticky-header' id='sticky-header'>
    <nav>
      <a href="index.html" class="logo"><img src="assets/images/logo.png" alt="Kasah" /></a>
      <ul>
        <li>
          <a href="<?php echo base_url() ?>signup" class="btn btn-round btn-teal-dark">Get started listing your home &rarr;</a>
        </li>
      </ul>
    </nav>
  </header>
  <div class='seller-timeline-hero'>
    <div class='seller-timeline-heading'>
      <h1>Sell or buy your home with Kasah</h1>
      <a href="<?php echo base_url().'signup' ?>" class="btn-white-new">Get started</a>
    </div>
  </div>
  <div class='seller-timline'>
    <div class='inner'>
      <div class='timeline-divider'>
        <img src="assets/images/seller-timeline/timeline-1-b23849e1.png" alt="Timeline 1" />
      </div>
      <section class='timeline-section timeline-section-blue'>
        <h2>Get your home on the market</h2>
        <div class='timeline-section-items'>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/notepad-0a93d371.png" alt="Notepad" />
            <h3>Tell us about your home</h3>
            <p>You give us your address & some descriptive info about your home to start the listing page.</p>
          </article>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/camera-f73ba906.png" alt="Camera" />
            <h3>Get ready to sell</h3>
            <p>We give you personalized to-dos and you clean up and declutter, and get pictures taken.</p>
          </article>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/clipboard-48c0366f.png" alt="Clipboard" />
            <h3>Prep and inspect</h3>
            <p>Prep your home and a Kasah Team member will come and visit your home for a preliminary inspection.</p>
          </article>
        </div>
      </section>
      <div class='timeline-divider'>
        <img src="assets/images/seller-timeline/timeline-2-4e46a3b2.png" alt="Timeline 2" />
      </div>
      <section class='timeline-section timeline-section-purple'>
        <h2>Marketing</h2>
        <div class='timeline-section-items'>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/mls-1eabff8a.png" alt="Mls" />
            <h3>Put your home on the market</h3>
            <p>Kasah will market your home on the MLS and other Real Estate websites.</p>
          </article>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/social-media-978c4b73.png" alt="Social media" />
            <h3>Buyers</h3>
            <p>Buyers schedule times to visit listings.</p>
          </article>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/for-sale-66a04792.png" alt="For sale" />
            <h3>Show it off</h3>
            <p>You host open houses and private showings to buyers. We’ll send you brochures and For Sale signs.</p>
          </article>
        </div>
      </section>
      <div class='timeline-divider'>
        <img src="assets/images/seller-timeline/timeline-3-ea7e5fd6.png" alt="Timeline 3" />
      </div>
      <section class='timeline-section timeline-section-primary'>
        <h2>Review & Accept Offer</h2>
        <div class='timeline-section-items'>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/in-hand-5aa48b98.png" alt="In hand" />
            <h3>Buyers submit offers</h3>
            <p>Offers will be submitted via email so you can review immediately.</p>
          </article>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/scale-2853ae65.png" alt="Scale" />
            <h3>Review & compare</h3>
            <p>Accepts offer</p>
          </article>
          <article class='timeline-section-item'>
            <img src="assets/images/seller-timeline/handshake-11a26631.png" alt="Handshake" />
            <h3>Open Title & Escrow</h3>
            <p>Close and enjoy your new home.</p>
          </article>
        </div>
      </section>
      <div class='seller-timeline-footer-cta'>
        <h2>Step 1: List your home with kasah or get pre-qualified to buy a home</h2>
        <a href="<?php echo base_url().'signup'; ?>" class="btn-white-new">Get started</a>
        <!-- <a href="resources.html" class="secondary-cta">I'm just browsing, show me your resources</a> -->
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('common/footer') ?>
</body>
</html>
