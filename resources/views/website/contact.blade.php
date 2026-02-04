@extends('website.layout.app')
@section('content')



<section class="our-offices-branch-contact-page">
  <div class="offices-container-branch-contact-page">

    <!-- LEFT CONTENT -->
    <div class="offices-text-branch-contact-page">
      <h2>Our Offices</h2>
      <p>
        With international offices, we deliver outstanding IT
        services and customized digital solutions worldwide.
      </p>
    </div>

    <!-- MAP -->
    <div class="offices-map-branch-contact-page">
      <img src="assets/images/offices-bg1.png" alt="World Map">

      <!-- PINS
      <span class="pin usa"></span>
      <span class="pin uk"></span>
      <span class="pin uae"></span>
      <span class="pin india"></span> -->
    </div>

  </div>

  <!-- CARDS -->
  <div class="office-cards-branch-contact-page">
<div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/usa.png" class="office-icon-branch-contact-page" alt="USA">
      <h4>UNITED STATES</h4>
    </div>
    <p>42 Broadway, New York,<br> NY 10004, United States</p>
  </div>

  <div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/uae.png" class="office-icon" alt="UK">
      <h4>United Kingdom</h4>
    </div>
    <p>71–75 Shelton Street, Covent<br>Garden, London, WC2H 9JQ</p>
  </div>

  <div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/uae.png" class="office-icon" alt="UAE">
      <h4>UNITED ARAB EMIRATES</h4>
    </div>
    <p>One Central, Level 3,<br>DWTC, Sheikh Zayed Road, Dubai</p>
  </div>

  <div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/india.png" class="office-icon" alt="India">
      <h4>INDIA</h4>
    </div>
    <p>3rd Floor, C-127, Phase-8,<br>Sector 73, Punjab 160071</p>
  </div>

  </div>
</section>


<section class="let-build-somthing-hero-wrapper">
  <div class="let-build-somthing-hero-inner">

    <div class="let-build-somthing-hero-image">
      <img src="./assets/images/contactus-ctabg.png" alt="Hero Image">
    </div>

    <div class="let-build-somthing-hero-content">
      <h1>Let’s build Something</h1>
      <p>brilliant Together</p>
      <a href="#" class="let-build-somthing-hero-btn">Let's Start →</a>
    </div>

  </div>
</section>




@include('website.contact-form')
@endsection
