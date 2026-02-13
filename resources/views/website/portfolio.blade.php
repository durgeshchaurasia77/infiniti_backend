@extends('website.layout.app')

{{-- @section('title', $serviceData->seo_title ?? $serviceData->title . ' | Infinit Tech Solution')
@section('meta_description',$serviceData->seo_description?? Str::limit(strip_tags($serviceData->short_description), 160))
@section('meta_keywords',$serviceData->seo_keywords ?? 'web development, mobile apps, seo services, infinit tech')
@section('canonical',url()->current())
@section('og_image',$serviceData->seo_image? asset($serviceData->seo_image): asset('images/default-og.jpg')) --}}

@section('content')

<section class="digital-marketing-page-marketing-strategies-main">

  <div class="digital-marketing-page-marketing-strategies-case-wrapper">

    <!-- LEFT -->
      <div class="digital-marketing-page-marketing-strategies-case-left">
     <h2>
    Marketing Strategies<br>
    That Produce Quantifiable<br>
    Results
  </h2>

  <div class="digital-marketing-page-marketing-strategies-case-image">
    <img id="digital-marketing-page-marketing-strategies-caseImg" src="{{ asset('website1/assets/images/turpentine-oil.jpeg') }}" alt="">
  </div>
</div>

    <!-- RIGHT -->
    <div class="digital-marketing-page-marketing-strategies-case-right">

      <!-- TABS -->
      <ul class="digital-marketing-page-marketing-strategies-case-tabs">
        <li data-tab="fit">Williamson Fit</li>
        <li data-tab="app" class="active">AppDukaan</li>
        <li data-tab="expo">Expo City Eats</li>
      </ul>

      <!-- STATS -->
      <div class="digital-marketing-page-marketing-strategies-stats">
        <div class="digital-marketing-page-marketing-strategies-stat-box">
          <h3 id="stat1">75%</h3>
          <p id="stat1Text">Increase Traffic by</p>
        </div>
        <div class="digital-marketing-page-marketing-strategies-stat-box">
          <h3 id="digital-marketing-page-marketing-strategies-stat2">90 Days</h3>
          <p id="digital-marketing-page-marketing-strategies-stat2Text">Time Improvement</p>
        </div>
      </div>

      <!-- TEXT -->
      <p id="digital-marketing-page-marketing-strategies-caseDesc">
        AppDukaan is among the leading providers of on-demand app solutions...
      </p>

      <a href="#" class="btn">Start Building →</a>

    </div>

  </div>
</section>


<section class="digital-marketing-page-satisfide-clients-stats-section">
  <div class="digital-marketing-page-satisfide-clients-stats-container">

    <!-- LEFT STATS -->
    <div class="digital-marketing-page-satisfide-clients-stats-left">
      <div class="digital-marketing-page-satisfide-clients-stat-box">
        <h2>250+</h2>
        <p>Satisfied Clients</p>
      </div>
      <div class="digital-marketing-page-satisfide-clients-stat-box">
        <h2>500+</h2>
        <p>Projects Delivered</p>
      </div>
    </div>

    <!-- RIGHT CIRCLES -->
    <div class="digital-marketing-page-satisfide-clients-stats-right">
      <div class="digital-marketing-page-satisfide-clients-circle circle-one">
        <h3>98%</h3>
        <span>Customer Success</span>
      </div>

      <div class="digital-marketing-page-satisfide-clients-circle circle-two">
        <h3>12+</h3>
        <span>Years of Experience</span>
      </div>

      <div class="digital-marketing-page-satisfide-clients-circle circle-three">
        <h3>1K+</h3>
        <span>Campaigns</span>
      </div>
    </div>

  </div>
</section>



<section class="digital-marketing-page-why-partner-section">
  <h2>Why Partner With Us?</h2>
  <p class="digital-marketing-page-why-partner-subtitle">
    We are Experts in Making Your Brand Visible Across Platforms
  </p>

  <div class="digital-marketing-page-why-partner-partner-cards">
    <div class="digital-marketing-page-why-partner-partner-card card-orange">
     <div class="digital-marketing-page-why-partner-partner-icon-box orange-card">
  <img src="{{ asset('website1/assets/images/campaign.png') }}" alt="Dedicated Management icon">
</div>

      <h3>Dedicated Management</h3>
      <p>
        Keep connected with a dedicated account manager to stay up-to-date
        with updates in strategy and implementation.
      </p>
    </div>

    <div class="digital-marketing-page-why-partner-partner-card card-pink">
      <div class="digital-marketing-page-why-partner-partner-icon-box pink">
        <img src="{{ asset('website1/assets/images/models.png') }}" alt="Dedicated Management icon">
      </div>
      <h3>Optimized Campaign Creation</h3>
      <p>
        Get weekly audits and monthly or bimonthly reports to improve the
        efficiency of your ad campaigns and increase customer retention rate
        and profitability.
      </p>
    </div>

    <div class="digital-marketing-page-why-partner-partner-card card-blue">
      <div class="digital-marketing-page-why-partner-partner-icon-box blue">
        <img src="{{ asset('website1/assets/images/dedicated.png') }}" alt="Dedicated Management icon">
      </div>
      <h3>Simple Pricing Models</h3>
      <p>
        We offer different pricing models to suit different business,
        strategy, market, and implementation requirements.
      </p>
    </div>

  </div>
</section>


<section class="bespok-digital-marketing-page-ppc-section">
  <h1>Bespoke Digital Marketing Consulting Services to Cater to All Your Business Needs</h1>
  <div class="bespok-digital-marketing-page-ppc-container">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">PPC</span>

      <h2>Pay Per Click</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/ppc.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>


<section class="bespok-digital-marketing-page-ppc-section">
  <div class="bespok-digital-marketing-page-ppc-container reverse">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">SEO</span>

      <h2>Serch Engine Optimeze</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/seo.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>



<section class="bespok-digital-marketing-page-ppc-section">
  <div class="bespok-digital-marketing-page-ppc-container ">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">SEO</span>

      <h2>Serch Engine Optimeze</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/ppc.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>


<section class="bespok-digital-marketing-page-ppc-section">
  <div class="bespok-digital-marketing-page-ppc-container reverse">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">SEO</span>

      <h2>Serch Engine Optimeze</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/seo.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>








<section class="digital-marketing-page-services-slider-section">

  <div class="digital-marketing-page-services-slider-wrapper">

    <!-- TRACK -->
    <div class="digital-marketing-page-services-slider-track" id="servicesTrack">

      <!-- SLIDE 1 -->
      <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/ppc.png') }}">
        </div>
      </div>

      <!-- SLIDE 2 -->
       <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>
      <!-- SLIDE 3 -->
       <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
           <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

      <!-- SLIDE 4 -->
    <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

      <!-- SLIDE 5 -->
      <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

      <!-- SLIDE 6 --> <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
           <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

    </div>

    <!-- NAV BUTTONS -->
    <div class="digital-marketing-page-slider-nav">
      <button onclick="prevSlide()">←</button>
      <button onclick="nextSlide()">→</button>
    </div>

  </div>

</section>


<section class="digital-marketing-page-our-process">
  <div class="digital-marketing-page-process-wrap">

    <h2>Our Process</h2>
    <p class="digital-marketing-page-process-desc">
      Our professionals are adept in increasing your online presence, visibility,
      and brand awareness along with helping you boost your ROI. We make outsourcing
      digital marketing services a breeze. All of this happens in just four simple steps.
    </p>

    <!-- CARDS -->
    <div class="digital-marketing-page-process-cards">
      <div class="digital-marketing-page-card pink">
        <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Preparation<br>and Brainstorming</h4>
        <p>We start with a detailed business analysis and define objectives.</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card orange">
        <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Planning<br>and Researching</h4>
        <p>Competitor and audience research with channel planning.</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card blue">
       <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Testing<br>Everything</h4>
        <p>We test, analyze and optimize campaigns continuously.</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card green">
       <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Implementing<br>and Execution</h4>
        <p>Execution with scaling and performance tracking.</p>
        <span class="arrow"></span>
      </div>
    </div>

    <!-- CURVE -->
    <div class="digital-marketing-page-curve-area">
      <svg viewBox="0 0 1200 220" preserveAspectRatio="none">
        <path d="M0,140 C250,60 500,200 750,130 950,80 1100,100 1200,60"
          stroke="url(#g)" stroke-width="4" fill="none"/>
        <defs>
          <linearGradient id="g" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#ff4d8d"/>
            <stop offset="30%" stop-color="#ff9f1c"/>
            <stop offset="60%" stop-color="#4dabf7"/>
            <stop offset="100%" stop-color="#2ecc71"/>
          </linearGradient>
        </defs>
      </svg>

      <div class="digital-marketing-page-step s1">Step 01</div>
      <div class="digital-marketing-page-step s2">Step 02</div>
      <div class="digital-marketing-page-step s3">Step 03</div>
      <div class="digital-marketing-page-step s4">Step 04</div>
       <img src="{{ asset('website1/assets/images/cta.png')}}" class="rocket">

      <!-- <img src="rocket.png') }}" class="rocket"> -->
    </div>

    <!-- CTA -->
    <div class="digital-marketing-page-process-cta">
      <div>
        <h4>Add SEO, SEM, and SMM in a</h4>
        <p>Comprehensive Marketing Package to Generate Quality Results, Quickly.</p>
        <a href="#">Know How We Do It</a>
      </div>
      <img src="{{ asset('website1/assets/images/cta.png')}}">
    </div>

  </div>
</section>





@include('website.contact-form')
@endsection
