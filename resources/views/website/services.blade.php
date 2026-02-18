@extends('website.layout.app')

@section('title', $serviceData->seo_title ?? $serviceData->title . ' | Infinit Tech Solution')
@section('meta_description',$serviceData->seo_description?? Str::limit(strip_tags($serviceData->short_description), 160))
@section('meta_keywords',$serviceData->seo_keywords ?? 'web development, mobile apps, seo services, infinit tech')
@section('canonical',url()->current())
@section('og_image',$serviceData->seo_image? asset($serviceData->seo_image): asset('images/default-og.jpg'))

@section('content')


  <!-- service page banner start  -->
  <section class="service-page-software-hero">
    <div class="service-page-hero-container">

      <!-- LEFT TEXT -->
      <div class="service-page-hero-left page-hero">

        <h1>
          {{-- Custom <span>Software</span><br>
          <span>Development</span> Services --}}
          <span>{{ $serviceData->name ?? '' }}</span>
        </h1>

        <h2>{{ $serviceData->title ?? '' }}</h2>

        <p>
          {{ $serviceData->short_description ?? '' }}
        </p>

        <ul>
            @foreach($serviceData->features as $item)
                <li>{{ rtrim($item['titles'], '1') }}</li>
            @endforeach
        </ul>

        <a href="{{ route('contact') }}" class="service-page-cta-btn">Get in Touch!</a>

      </div>

      <!-- RIGHT IMAGE -->
      <div class="service-page-hero-right">
        <div class="service-page-big-card">
          <img src="{{ asset($serviceData->image ?? 'notImage.jpg') }}">
        </div>
      </div>

    </div>
  </section>

  <!-- service page banner end  -->

  <!-- trusted statrt  -->
  <section class="trusted">

    <div class="trusted-wrap">

      <div class="trusted-badge">Trusted by</div>

      <div class="logo-slider">
        <div class="logos">
            @foreach ($trustedByList as $trustedBy)
                <div class="logo-box"><img src="{{ asset($trustedBy->image ?? 'notImage.jpg') }}" alt="{{ $trustedBy->name ?? '' }}"></div>
            @endforeach

        </div>
      </div>
    </div>

  </section>
  <!-- truted end  -->


  <!-- homepage-statssection-stats bg-image -->
  <section class="homepage-statssection-stats bg-image">

    <div class="homepage-stat-card">
            <h2 class="counter" data-target="{{ $excellanceCounting->industry_count ?? 1 }}">0</h2>
            <p>Industry Excellence</p>
        </div>

        <div class="homepage-stat-card">
            <h2 class="counter" data-target="{{ $excellanceCounting->empowered_count ?? 1 }}">0</h2>
            <p>Empowered Clients</p>
        </div>

        <div class="homepage-stat-card">
            <h2 class="counter" data-target="{{ $excellanceCounting->coutries_count ?? 1 }}">0</h2>
            <p>Countries Served</p>
        </div>

        <div class="homepage-stat-card">
            <h2 class="counter" data-target="{{ $excellanceCounting->teach_engineer_count ?? 1 }}">0</h2>
            <p>Tech Engineers</p>
        </div>

        <div class="homepage-stat-card">
            <h2 class="counter" data-target="{{ $excellanceCounting->digital_solution_count ?? 1 }}">0</h2>
            <p>Digital Solutions Launched</p>
        </div>

  </section>
  <!-- homepage-statssection-stats bg-image -->

  <!-- ================= TABS START ================= -->
<div class="service-page-below-the-counter-service-tabs-top">
  <h2>End-to-end Custom Software Development<br/> Services We Offer</h2>
  <p>Explore our tailored custom software development services, designed to meet unique business<br/> needs with innovative solutions and seamless execution.</p>
</div>

    <div class="service-page-below-the-counter-service-tabs">
        <!-- LEFT -->
        <div class="service-page-below-the-counter-tab-menu">

            @foreach ($serviceWeOfferList as $key => $serviceWeOffer)
                <div class="service-page-below-the-counter-tab-item @if($key == 0) active @endif" data-tab="tabeservice{{$key+1}}">
                    {{ $key+1 }}. {{ $serviceWeOffer->name }}
                </div>
            @endforeach

        </div>

        <!-- RIGHT -->
        <div class="service-page-below-the-counter-tab-content">

            @foreach ($serviceWeOfferList as $key1 => $serviceWeOffer1)
                <div class="service-page-below-the-counter-content @if($key1 == 0) show @endif" id="tabeservice{{$key1+1}}">
                    <img src="https://cdn-icons-png.flaticon.com/512/2821/2821623.png">
                    <h2>{{ $serviceWeOffer1->name }}</h2>
                    <p>{{ $serviceWeOffer1->short_description ?? '' }}</p>
                </div>
            @endforeach

        </div>
    </div>
  <!-- ================= TABS END ================= -->


  <!-- software-devlopment-soluction-servicepage -->
  <section class="software-devlopment-soluction-servicepage">
    <div class="software-devlopment-soluction-servicepage-software-hero">
      <div class="software-devlopment-soluction-servicepage-software-hero-content">
        <h2>We Create The Most Innovative<span class="br"> Software Development Solutions In</span> Just <span class="c_primary">90 days</span> or less!</h2>
        <p> Unlock your business potential with our software development company today! </p> <a href="{{ route('contact') }}"
          class="hero-btn"> Contact Now → </a>
      </div>
    </div>
  </section>
<!-- software-devlopment-soluction-servicepage -->


<!-- service-with-right-enginnering-service-page -->
<section class="service-with-right-enginnering-service-page">

  <div class="service-with-right-enginnering-service-page-hover-card-section">
      <p>A New Dawn of Efficiency, Innovation, &amp; Customer Satisfaction!</p>
<h2>Infiniti Serves with the<span class="br"> Right Engineering</span></h2>
    <div class="service-with-right-enginnering-service-page-hover-card-grid">

        @foreach ($clientSatisfationList as $clientSatisfation)
            <div class="service-with-right-enginnering-service-page-hover-card">
                <img src="{{ asset($clientSatisfation->image ?? 'notImage.jpg') }}" alt="">
                <div class="service-with-right-enginnering-service-page-card-front">
                <h3>{{ $clientSatisfation->name ?? '' }}</h3>
                </div>
                <div class="service-with-right-enginnering-service-page-card-hover">
                <p>{{ $clientSatisfation->short_description ?? '' }}</p>
                </div>
            </div>
        @endforeach
    </div>
  </div>

</section>
<!-- service-with-right-enginnering-service-page -->

<!-- VIDEO CTA SECTION -->
<div class="buid-service-videosection-service-page-cta">

  <!-- LEFT CONTENT -->
  <div class="buid-service-videosection-service-page-cta-content">
    <h2>
      Curious to Know How Much it<br>
      Costs to Build Software!
    </h2>

    <p>
      Explore the key factors that influence software<br/>
      development costs.
    </p>

  <a href="javascript:void(0)"
   class="buid-service-videosection-service-page-btn video-trigger">
  Watch Now →
</a>

  </div>

  <!-- RIGHT VIDEO IMAGE -->
<div class="buid-service-videosection-service-page-video-banner video-trigger">

  <img src="./assets/images/custom-cta1-img.png" alt="Software Video">

  <div class="buid-service-videosection-service-page-play-btn">
    ▶
  </div>

</div>


</div>
<!-- VIDEO CTA SECTION -->

<!-- buid-service-videosection-service-page-video-popup -->
<div class="buid-service-videosection-service-page-video-popup"
     id="buid-service-videosection-service-page-videoPopup">

  <div class="buid-service-videosection-service-page-video-popup-content">

    <span class="buid-service-videosection-service-page-close-video">
      &times;
    </span>

    <iframe
      id="buid-service-videosection-service-page-videoFrame"
      src=""
      frameborder="0"
      allow="autoplay; encrypted-media"
      allowfullscreen>
    </iframe>

  </div>
</div>
<!-- buid-service-videosection-service-page-video-popup -->



<!-- process acording servicpage  -->
<div class="process-accordion-servicepage">
<h2>Our Proven Custom Software Development<br/> Process That Delivers Success</h2>
<p>As one of the best custom software development companies, our agile software development<br/> allows organizations to tailor solutions that meet specific business needs, enhance user experience,<br/> and drive innovation.</p>
  <!-- 1. DISCOVERY -->
  @foreach ($ourProvenList as $ourProven)
        <div class="process-item-servicepage active">
            <div class="process-title-servicepage">
            <h3>{{ $ourProven->name ?? '' }}</h3>
            <span class="arrow">⌄</span>
            </div>

            <div class="process-content-servicepage">
            <div class="process-blackbox-servicepage">

                <div class="process-blackbox-left-servicepage">
                <h4>{{ $ourProven->name ?? '' }}</h4>
                <p>
                    {{ $ourProven->short_description ?? '' }}
                </p>
                </div>
                <div class="process-blackbox-right-servicepage">
                <ul>
                    @foreach($ourProven->features as $item)
                        <li>{{ rtrim($item['titles'], '1') }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
            </div>
        </div>
  @endforeach

</div>
<!-- process acording servicepage  -->


<!-- advance-technoloy-in-service-page-card -->
<section class="advance-technoloy-in-service-page">
<h2>Advanced AI Technologies Used by Our Custom<br/> Software Development Solutions</h2>
<p>Being one of the best Software Development companies, we’re passionate<br/> about helping businesses worldwide!</p>
  <div class="advance-technoloy-in-service-page-container">

    <div class="advance-technoloy-in-service-page-grid">

      <!-- CARD 1 -->
      @foreach ($advanceAiList as $advanceAi)
        <div class="advance-technoloy-in-service-page-card">
            <div class="advance-technoloy-in-service-page-card-inner">
            <img src="{{ asset($advanceAi->image ?? 'notImage.jpg') }}" class="advance-technoloy-in-service-page-bg">
            <div class="advance-technoloy-in-service-page-dark"></div>
            <!-- Front -->
            <div class="advance-technoloy-in-service-page-front">
                <div class="advance-technoloy-in-service-page-icon">🤖</div>
                <h3>{{ $advanceAi->name ?? '' }}</h3>
            </div>

            <!-- Hover -->
            <div class="advance-technoloy-in-service-page-hover">
                <p>
                {{ $advanceAi->short_description ?? '' }}
                </p>
                <ul>
                @foreach($advanceAi->features as $item)
                    <li>{{ rtrim($item['titles'], '1') }}</li>
                @endforeach
                </ul>
            </div>

            </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- advance-technoloy-in-service-page-card -->


<div class="enterprise-custome-softawere-devlopment-software-service-page-pagination-section">
<h2>Enterprise Custom Software Development Solutions <br/>We Deliver to Help Businesses Stay Modern </h2>
<p class="itlc">At Apptunix, we specialize in delivering a wide range of enterprise <br/>softwaredevelopment services to help businesses stay future-ready. Here’s what we offer:</p>
  <div class="software-pagination-wrapper">
    <button class="software-page-btn prev">←</button>
    <div class="software-pagination-window">
      <div class="software-pagination-track">

        @foreach ($weDeliverList as $weDeliver)
            <div class="software-page-card">
                <img src="{{ asset($weDeliver->image ?? 'notImage.jpg') }}">
                <h3>{{ $weDeliver->name ?? '' }}</h3>
                <p>{{ $weDeliver->sub_description ?? '' }}</p>
            </div>
        @endforeach
      </div>
    </div>
    <button class="software-page-btn next">→</button>
  </div>
</div>



    <!-- @if(count($testimonials) > 0)
        <section class="navy-testimonial-slider">
        <div class="navy-testimonial-header">
            <h2>Client Testimonials</h2>
            <div class="navy-slider-controls">
            <button id="navyPrev">‹</button>
            <button id="navyNext">›</button>
            </div>
        </div>

        <div class="navy-slider-viewport">
            <div class="navy-slider-track">

            <!-- CARD -->
            @foreach ($testimonials as $testimonial)
               <!--  <div class="navy-testimonial-card" data-video="{{ asset($testimonial->video_path ?? 'notImage.jpg') }}">
                    {{-- <img src="./assets/images/airlane.jpg"> --}}
                    <video class="video-thumb"
                        src="{{ asset($testimonial->video_path ?? '') }}"
                        preload="metadata"
                        muted
                        playsinline>
                    </video>
                    <span class="play">▶</span>
                    <h3>{{ $testimonial->name ?? '' }}</h3>
                    <p>{{ $testimonial->designation ?? '' }}</p>
                </div>
            @endforeach
            </div>
        </div>

        </section> -->
    <!-- @endif -->
    @if(count($testimonials) > 0)
<section class="common-section-everypage-blog-listing-section">
    <h2>Our Clients Love Us</h2>

    <div class="common-section-everypage-blog-listing-wrapper">
    <button class="common-section-everypage-blog-listing-nav-btn prev">‹</button>

    <div class="common-section-everypage-blog-listing-track">
    @foreach ($testimonials as $testimonial)
        <div class="common-section-everypage-blog-listing-card">
            <div class="common-section-everypage-blog-listing-video-thumb">
                <img src="{{ asset('website1/assets/images/thumbnail.png') }}">
                <!-- <span class="common-section-everypage-blog-listing-play-btn" data-video="{{ asset($testimonial->video_path ?? '') }}"></span> -->
            </div>
            <p>"Amazing experience working with this team."</p>
            <div class="common-section-everypage-blog-listing-user">
                <img src="assets/images/home_cta.png">
                <div><strong>{{ $testimonial->name ?? '' }}</strong><span>({{ $testimonial->rating ?? '' }})</span></div>
            </div>
        </div>
    @endforeach
    </div>
    <button class="common-section-everypage-blog-listing-nav-btn next">›</button>
    </div>
</section>
 @endif

 
{{-- <section class="brand-slider-section-service-page">
  <h2>
    Custom Software Development Solutions<br>
    Developed By Apptunix Have Been Featured In
  </h2>

  <div class="brand-slider-service-page">

    <!-- 👇 ADD THESE TWO LAYERS -->
    <div class="brand-fade-left-service-page"></div>
    <div class="brand-fade-right-service-page"></div>

    <div class="brand-track-service-page">

      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>

      <!-- duplicate for infinite loop -->
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>
      <div class="brand-item-service-page"><img src="./assets/images/aws1_icon.png"></div>

    </div>
  </div>
</section> --}}


{{-- <section class="unlock-limitless-scalability-service-page">
  <div class="unlock-limitless-scalability-service-page-scalability-box">

    <!-- LEFT -->
    <div class="unlock-limitless-scalability-service-page-scalability-content">
      <span class="unlock-limitless-scalability-service-page-scalability-step">01</span>
      <h2>Unlock Limitless Scalability</h2>
      <p>
        Our customized software development company builds scalable
        custom software development solutions to ensure your platform can
        grow effortlessly. No matter how many users you acquire, your
        software will handle the surge with ease.
      </p>

      <ul>
        <li>Future-Proof Growth</li>
        <li>Unlimited Feature Flexibility</li>
        <li>Expand Without Constraints</li>
      </ul>
    </div>

    <!-- RIGHT -->
    <div class="unlock-limitless-scalability-service-page-scalability-image">
      <img src="./assets/images/contact/contact1.png" alt="">
    </div>

  </div>
</section> --}}




{{-- <section class="reduce-cost-service-page">
  <div class="reduce-cost-service-page-box">

    <!-- LEFT IMAGE -->
    <div class="reduce-cost-service-page-image">
      <img src="./assets/images/blog/blog-01.jpg" alt="">
    </div>

    <!-- RIGHT CONTENT -->
    <div class="reduce-cost-service-page-content">
      <span class="reduce-cost-service-page-step">02</span>
      <h2>Reduce Costs & Optimize Resources</h2>

      <p>
        Building software shouldn't break the bank. If you are looking for
        custom software development near me then our efficient development
        processes can help you deliver high-quality software without
        wasting time or resources.
      </p>

      <ul>
        <li>Eliminate Monthly Costs</li>
        <li>Optimize Tech Infrastructure</li>
        <li>Streamline Operations</li>
      </ul>
    </div>

  </div>
</section> --}}


{{-- <section class="lighting-speed-service-page">
  <div class="lighting-speed-service-page-box">

    <!-- LEFT CONTENT -->
    <div class="lighting-speed-service-page-content">
      <span class="lighting-speed-service-page-step">03</span>
      <h2>Lightning Speed, Lag-Free Results</h2>

      <p>
        Ditch the customized software development services delays! Our agile
        team uses cutting-edge tools to deliver your solution in record time.
        We're talking about launching your dream platform in months, not years.
      </p>

      <ul>
        <li>Performance-Optimized Code</li>
        <li>Cloud-Based Infrastructure</li>
        <li>Rigorous Testing & Optimization</li>
      </ul>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="lighting-speed-service-page-image">
      <img src="./assets/images/blog/blog-01.jpg" alt="">
    </div>

  </div>
</section> --}}


{{-- <section class="out-of-the-box-solution-service-page">
  <div class="out-of-the-box-solution-service-page-overlay">

    <div class="out-of-the-box-solution-service-page-content">
      <h2>Have an Out-of-the-Box Software Solution Requirement?</h2>

      <p>
        With our Top Software development company – you can just
        share your idea and we help you build it!
      </p>

      <a href="#" class="out-of-the-box-solution-service-page-btn">
        Let’s Build Together →
      </a>
    </div>

  </div>
</section> --}}




{{-- <section class="choose-the-right-model-service-page">

  <!-- TOP TABS -->
  <div class="choose-the-right-model-service-page-tabs">
    <div class="choose-the-right-model-service-page-tab active" data-tab="model1">
      Fixed Price Model
    </div>
    <div class="choose-the-right-model-service-page-tab" data-tab="model2">
      Time and Material Model
    </div>
    <div class="choose-the-right-model-service-page-tab" data-tab="model3">
      Build Operate Transfer Model
    </div>
  </div>

  <!-- CONTENT AREA -->
  <div class="choose-the-right-model-service-page-content-wrapper">

    <!-- TAB 1 -->
    <div class="choose-the-right-model-service-page-content active" id="model1">
      <div class="choose-the-right-model-service-page-grid">
        <div class="choose-the-right-model-service-page-image">
          <img src="./assets/images/background-about.jpeg">
        </div>
        <div class="choose-the-right-model-service-page-text">
          <h2>Fixed Price Model</h2>
          <p>
            This model is ideal for projects with clearly defined features, timelines, and budgets.
          </p>
          <ul>
            <li>✔ Predictable Costs</li>
            <li>✔ Clear Timeline</li>
            <li>✔ Minimal Risk of Budget Overruns</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- TAB 2 -->
    <div class="choose-the-right-model-service-page-content" id="model2">
      <div class="choose-the-right-model-service-page-grid">
        <div class="choose-the-right-model-service-page-image">
          <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f">
        </div>
        <div class="choose-the-right-model-service-page-text">
          <h2>Time & Material Model</h2>
          <p>Perfect for projects with evolving requirements and flexible scope.</p>
          <ul>
            <li>✔ Pay as you go</li>
            <li>✔ Flexible scope</li>
            <li>✔ Agile development</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- TAB 3 -->
    <div class="choose-the-right-model-service-page-content" id="model3">
      <div class="choose-the-right-model-service-page-grid">
        <div class="choose-the-right-model-service-page-image">
          <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786">
        </div>
        <div class="choose-the-right-model-service-page-text">
          <h2>Build Operate Transfer Model</h2>
          <p>We build, operate, and then transfer the project ownership to you.</p>
          <ul>
            <li>✔ Long-term partnership</li>
            <li>✔ Dedicated team</li>
            <li>✔ Full ownership transfer</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</section> --}}

{{-- <div class="the-behind-company-succese-service-page-tech-system">

  <div class="the-behind-company-succese-service-page-tech-top-tabs">
    <div class="the-behind-company-succese-service-page-tech-tab active" data-tab="lang">Programming Languages</div>
    <div class="the-behind-company-succese-service-page-tech-tab" data-tab="framework">Frameworks</div>
    <div class="the-behind-company-succese-service-page-tech-tab" data-tab="db">Databases</div>
    <div class="the-behind-company-succese-service-page-tech-tab" data-tab="devops">DevOps</div>
    <div class="the-behind-company-succese-service-page-tech-tab" data-tab="payment">Payment Gateways</div>
    <div class="the-behind-company-succese-service-page-tech-tab" data-tab="cloud">Clouds</div>
  </div>

  <div class="the-behind-company-succese-service-page-tech-sliders">

    <div class="the-behind-company-succese-service-page-tech-slider active" id="lang">
      <div class="the-behind-company-succese-service-page-slider-track">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/client/png/client1.png">
        <img src="./assets/images/client/png/client2.png">
        <img src="./assets/images/client/png/client3.png">
        <img src="./assets/images/client/png/client4.png">
        <img src="./assets/images/client/png/client5.png">
        <img src="./assets/images/client/png/client1.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
      </div>
    </div>

    <div class="the-behind-company-succese-service-page-tech-slider" id="framework">
        <div class="the-behind-company-succese-service-page-slider-track">
        <img src="./assets/images/icons/icons-01.png">
        <img src="./assets/images/icons/icons-02.png">
        <img src="./assets/images/icons/icons-03.png">
        <img src="./assets/images/icons/tech_logo17.png">
        <img src="./assets/images/icons/tech_logo52.png">
        <img src="./assets/images/icons/tech_logo53.png">
        <img src="./assets/images/icons/tech_logo54.png">
        <img src="./assets/images/icons/tech_logo52.png">
        <img src="./assets/images/icons/tech_logo54.png">
        <img src="./assets/images/icons/tech_logo51.png">
      </div>
    </div>

    <div class="the-behind-company-succese-service-page-tech-slider" id="db">
        <div class="the-behind-company-succese-service-page-slider-track">
        <img src="./assets/images/client/png/client1.png">
        <img src="./assets/images/client/png/client2.png">
        <img src="./assets/images/client/png/client3.png">
        <img src="./assets/images/client/png/client4.png">
        <img src="./assets/images/client/png/client5.png">
        <img src="./assets/images/client/png/client1.png">
        <img src="./assets/images/client/png/client2.png">
        <img src="./assets/images/client/png/client3.png">
        <img src="./assets/images/client/png/client4.png">
        <img src="./assets/images/client/png/client5.png">
      </div>
    </div>

    <div class="the-behind-company-succese-service-page-tech-slider" id="devops">
      <div class="the-behind-company-succese-service-page-slider-track">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
      </div>
    </div>

    <div class="the-behind-company-succese-service-page-tech-slider" id="payment">
       <div class="the-behind-company-succese-service-page-slider-track">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
      </div>
    </div>

    <div class="the-behind-company-succese-service-page-tech-slider" id="cloud">
        <div class="the-behind-company-succese-service-page-slider-track">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/airlane.jpg">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
        <img src="./assets/images/aws1_icon.png">
      </div>
    </div>

  </div>
</div> --}}
<!-- end  -->




<section class="grow-with-you-service-page">
  <div class="grow-with-you-service-page-overlay">

    <div class="grow-with-you-service-page-content">
      <h2>Struggling to Scale? Let’s Build a Solution That Grows with You</h2>

      <p>
        Get 30% off your first custom software project, designed to boost
        efficiency, cut costs, and scale your business seamlessly.
      </p>

      <a href="#" class="grow-with-you-service-page-btn">
        Talk to Our Experts Today →
      </a>
    </div>

  </div>
</section>

@include('website.contact-form')
@endsection
