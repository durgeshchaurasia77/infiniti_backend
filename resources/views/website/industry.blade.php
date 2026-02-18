@extends('website.layout.app')

@section('title', $industryData->seo_title ?? $industryData->title . ' | Infinit Tech Solution')
@section('meta_description',$industryData->seo_description?? Str::limit(strip_tags($industryData->short_description), 160))
@section('meta_keywords',$industryData->seo_keywords ?? 'web development, mobile apps, seo services, infinit tech')
@section('canonical',url()->current())
@section('og_image',$industryData->seo_image? asset($industryData->seo_image): asset('images/default-og.jpg'))

@section('content')

  <section class="turn-your-fitness-idea-industry-page-hero-main">

  <div class="turn-your-fitness-idea-industry-page-hero-inner">

    <!-- LEFT -->
    <div class="turn-your-fitness-idea-industry-page-hero-left">
      <h1>{{$industryData->header_title ?? ''}}</h1>

      <p>
        {{$industryData->header_short_description ?? ''}}
      </p>

      <a href="{{ route('contact') }}" class="turn-your-fitness-idea-industry-page-btn">
        Discuss Your App Idea →
      </a>
    </div>

    <!-- RIGHT -->
    <div class="turn-your-fitness-idea-industry-page-hero-right">

      <div class="turn-your-fitness-idea-industry-page-circle">
        <img src="{{ asset($industryData->image ?? 'notImage.jpg') }}">
      </div>

        @if($industryData->features_one != null)
            <div class="turn-your-fitness-idea-industry-page-card sleep">
                {{-- <small>Sleep</small> --}}
                    <strong>{{ $industryData->features_one  ?? ''}}</strong>
            </div>
        @endif

        @if($industryData->features_two != null)
            <div class="turn-your-fitness-idea-industry-page-card calories">
                {{-- <small>Calories</small> --}}
                    <strong>{{ $industryData->features_two ?? '' }}</strong>
            </div>
        @endif

    </div>

  </div>

</section>

<!-- end  -->
 <!-- trusted statrt  -->
    <section class="trusted">

    <div class="trusted-wrap">

      <div class="trusted-badge">Trusted by</div>

      <div class="logo-slider">
        <div class="logos">

          <div class="logo-box"><img src="./assets/images/andamen.png"></div>
          <div class="logo-box"><img src="./assets/images/craftslane.png"></div>
          <div class="logo-box"><img src="./assets/images/deebaco.png"></div>
          <div class="logo-box"><img src="./assets/images/fly-high.png"></div>
          <div class="logo-box"><img src="./assets/images/kahira.png"></div>
          <div class="logo-box"><img src="./assets/images/dorganizer.png"></div>
          <div class="logo-box"><img src="./assets/images/taragram.png"></div>
          <div class="logo-box"><img src="./assets/images/keydroid.png"></div>

          <!-- repeat for scrolling -->
          <div class="logo-box"><img src="./assets/images/preeminent.png"></div>
          <div class="logo-box"><img src="./assets/images/puneet.png"></div>
          <div class="logo-box"><img src="./assets/images/maharishi-university.png"></div>
          <div class="logo-box"><img src="./assets/images/inferrix.png"></div>
          <div class="logo-box"><img src="./assets/images/oceedee.png"></div>
          <div class="logo-box"><img src="./assets/images/andamen.png"></div>
          <div class="logo-box"><img src="./assets/images/taragram.png"></div>
          <div class="logo-box"><img src="./assets/images/keydroid.png"></div>

        </div>
      </div>


    </div>

    </section>
  <!-- truted end  -->


  <!-- homepage-statssection-stats bg-image -->
   <section class="homepage-statssection-stats bg-image">

    <div class="homepage-stat-card">
      <h2>35+</h2>
      <p>Industry Excellence</p>
    </div>

    <div class="homepage-stat-card">
      <h2>2500+</h2>
      <p>Empowered Clients</p>
    </div>

    <div class="homepage-stat-card">
      <h2>25+</h2>
      <p>Countries Served</p>
    </div>

    <div class="homepage-stat-card">
      <h2>300+</h2>
      <p>Tech Engineers</p>
    </div>

    <div class="homepage-stat-card">
      <h2>2000+</h2>
      <p>Digital Solutions Launched</p>
    </div>

   </section>
  <!-- homepage-statssection-stats bg-image -->


@php
    preg_match(
        '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
        $industryData->video ?? '',
        $matches
    );
    $youtubeId = $matches[1] ?? null;
@endphp

<div class="buid-service-videosection-service-page-cta">

    <!-- LEFT CONTENT -->
    <div class="buid-service-videosection-service-page-cta-content">
        <h2>{{ $industryData->title ?? '' }}</h2>
        <p>{{ $industryData->short_description ?? '' }}</p>

        @if($youtubeId)
            <a href="https://www.youtube.com/watch?v={{ $youtubeId }}"
               target="_blank"
               class="buid-service-videosection-service-page-btn">
                Watch Now →
            </a>
        @endif
    </div>

    <!-- RIGHT VIDEO -->
    @if($youtubeId)
        <a href="https://www.youtube.com/watch?v={{ $youtubeId }}"
           target="_blank"
           class="buid-service-videosection-service-page-video-banner">

            <img
                src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg"
                alt="Video Thumbnail"
                class="youtube-thumbnail"
            >

            <div class="buid-service-videosection-service-page-play-btn">
                ▶
            </div>
        </a>
    @endif

</div>



   <!-- wall-of-fame -->
    {{-- <section class="wall-of-fame ">
            <div class="container">

                <h2>Our Wall of Fame as a Mobile App<br>Development Company</h2>

                <div class="awards-wrapper">
                    <div class="awards-row" id="awardTrack">

                        <!-- CARD -->
                        <div class="award-card">
                            <img src="assets/images/portfolio/portfolio-01.jpg">
                            <h5>Appfutura</h5>
                            <p>Top App<br>Development Company</p>
                        </div>

                        <div class="award-card">
                            <img src="assets/images/portfolio/portfolio-01.jpg">
                            <h5>GoodFirms</h5>
                            <p>Top Mobile App<br>Developers UK</p>
                        </div>

                        <div class="award-card">
                            <img src="assets/images/portfolio/portfolio-01.jpg">
                            <h5>Clutch</h5>
                            <p>Top 100<br>Companies 2022</p>
                        </div>

                        <div class="award-card">
                            <img src="assets/images/portfolio/portfolio-01.jpg">
                            <h5>ITFirms</h5>
                            <p>World’s Top Mobile App<br>Development Companies 2022</p>
                        </div>

                        <div class="award-card">
                            <img src="assets/images/portfolio/portfolio-01.jpg">
                            <h5>Clutch</h5>
                            <p>Top Developers in<br>India 2022</p>
                        </div>

                        <div class="award-card">
                            <img src="assets/images/portfolio/portfolio-01.jpg">
                            <h5>Feedspot</h5>
                            <p>Mobile App Development<br>Blogs by Feedspot</p>
                        </div>

                    </div>
                </div>

                <div class="dots" id="dots"></div>

            </div>
    </section> --}}
    @if(count($fameMobileAppList) > 0)
        <section class="wall-of-fame ">
            <div class="container">

                <h2>Our Wall of Fame as a Mobile App<br>Development Company</h2>

                <div class="awards-wrapper">
                    <div class="awards-row" id="awardTrack">
                        @foreach ($fameMobileAppList as $fameMobileApp)

                            <div class="award-card">
                                <img src="{{ asset($fameMobileApp->image ?? 'notImage.jpg') }}">
                                <h5>{{ $fameMobileApp->name ?? '' }}</h5>
                                <p>{{ $fameMobileApp->title ?? '' }}</p>
                            </div>

                        @endforeach
                    </div>
                </div>

                <div class="dots" id="dots"></div>

            </div>
        </section>
    @endif
  <!-- wall-of-fame end  -->




   <section class="grow-with-you-service-page">
  <div class="grow-with-you-service-page-overlay">

    <div class="grow-with-you-service-page-content">
      <h2>{{ $industryData->about_title ?? '' }}</h2>

      <p>
        {{ $industryData->about_description ?? '' }}
      </p>

      <a href="#" class="grow-with-you-service-page-btn">
        Talk to Our Experts Today →
      </a>
    </div>

  </div>
   </section>


   {{-- <section class="launch-your-dream-fitness-industry-page">

        <div class="launch-your-dream-fitness-industry-page-gym-app-tabs">

            <!-- Tabs -->
            <div class="launch-your-dream-fitness-industry-page-gym-app-tab-bar">
            <div class="launch-your-dream-fitness-industry-page-gym-app-tab active" data-tab="customer">Customer App</div>
            <div class="launch-your-dream-fitness-industry-page-gym-app-tab" data-tab="business">Business Website</div>
            <div class="launch-your-dream-fitness-industry-page-gym-app-tab" data-tab="admin">Admin Panel</div>
            <div class="launch-your-dream-fitness-industry-page-gym-app-tab" data-tab="gym">Gym App</div>
            <div class="launch-your-dream-fitness-industry-page-gym-app-tab" data-tab="trainer">Trainer App</div>
            </div>

            <!-- CUSTOMER -->
            <div class="launch-your-dream-fitness-industry-page-gym-app-content active" id="customer">
            <div class="launch-your-dream-fitness-industry-page-gym-left">
                <h2>Customer App</h2>
                <p class="launch-your-dream-fitness-industry-page-subtitle">
                Users can book workouts, trainers and track progress.
                </p>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>📅</span><div><h4>Class Booking</h4><p>Book fitness classes easily.</p></div>
                </div>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>📊</span><div><h4>Progress Tracking</h4><p>Monitor your workout stats.</p></div>
                </div>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>💳</span><div><h4>Payments</h4><p>Secure subscription & payments.</p></div>
                </div>
            </div>

            <div class="launch-your-dream-fitness-industry-page-gym-right">
                <img src="./assets/images/airlane.jpg">
            </div>
            </div>

            <!-- BUSINESS -->
            <div class="launch-your-dream-fitness-industry-page-gym-app-content" id="business">
            <div class="launch-your-dream-fitness-industry-page-gym-left">
                <h2>Business Website</h2>
                <p class="launch-your-dream-fitness-industry-page-subtitle">
                Grow your gym business online.
                </p>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>🌐</span><div><h4>Website</h4><p>Professional online presence.</p></div>
                </div>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>📈</span><div><h4>Lead Generation</h4><p>Convert visitors to customers.</p></div>
                </div>
            </div>

            <div class="launch-your-dream-fitness-industry-page-gym-right">
                <img src="./assets/images/aws1_icon.png">
            </div>
            </div>

            <!-- ADMIN -->
            <div class="launch-your-dream-fitness-industry-page-gym-app-content" id="admin">
            <div class="launch-your-dream-fitness-industry-page-gym-left">
                <h2>Admin Panel</h2>
                <p class="launch-your-dream-fitness-industry-page-subtitle">
                Manage your entire fitness business.
                </p>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>👥</span><div><h4>User Management</h4><p>Control users & roles.</p></div>
                </div>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>📁</span><div><h4>Content</h4><p>Manage workouts & diet.</p></div>
                </div>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>💳</span><div><h4>Finance</h4><p>Payments & revenue.</p></div>
                </div>
            </div>

            <div class="launch-your-dream-fitness-industry-page-gym-right">
                <img src="./assets/images/background-about.jpeg">
            </div>
            </div>

            <!-- GYM -->
            <div class="launch-your-dream-fitness-industry-page-gym-app-content" id="gym">
            <div class="launch-your-dream-fitness-industry-page-gym-left">
                <h2>Gym App</h2>
                <p class="launch-your-dream-fitness-industry-page-subtitle">
                Gym operations simplified.
                </p>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>🏋️</span><div><h4>Equipment</h4><p>Track machines usage.</p></div>
                </div>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>⏱️</span><div><h4>Check-in</h4><p>Member entry tracking.</p></div>
                </div>
            </div>

            <div class="launch-your-dream-fitness-industry-page-gym-right">
                <img src="./assets/images/bnr-img.png">
            </div>
            </div>

            <!-- TRAINER -->
            <div class="launch-your-dream-fitness-industry-page-gym-app-content" id="trainer">
            <div class="launch-your-dream-fitness-industry-page-gym-left">
                <h2>Trainer App</h2>
                <p class="launch-your-dream-fitness-industry-page-subtitle">
                Trainer & client management.
                </p>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>🧑‍🏫</span><div><h4>Clients</h4><p>Manage trainee progress.</p></div>
                </div>

                <div class="launch-your-dream-fitness-industry-page-gym-feature">
                <span>📅</span><div><h4>Schedules</h4><p>Workout & sessions.</p></div>
                </div>
            </div>

            <div class="launch-your-dream-fitness-industry-page-gym-right">
                <img src="./assets/images/bnr-img.png">
            </div>
            </div>

        </div>

   </section> --}}



  {{-- <section class="reson-to-trust-industry-page">
  <div class="reson-to-trust-industry-page-container">



    <!-- RIGHT -->
   <div class="reson-to-trust-industry-page-right">
      <h2>
        <span>{{ $featuresData->name ?? '' }}</span><br>
        <span class="blue">{{ $featuresData->title ?? '' }}</span>

      </h2>

      <p>
        {{ $featuresData->short_description ?? '' }}
      </p>
        @php
            if (is_string($featuresData->details)) {
                $details = json_decode($featuresData->details, true);
            } else {
                $details = $featuresData->details;
            }

            $details = $details ?? [];
        @endphp
        <div class="reson-to-trust-industry-page-pills">
            @foreach($details as $index => $item)
                <div class="pill {{ ['pink','purple','green','blue'][$index % 4] }}">
                    {{ $item['heading'] ?? '' }}
                </div>
            @endforeach
        </div>

      <a href="{{ route('contact') }}" class="reson-to-trust-industry-page-btn">Get started! →</a>
    </div>
  <!-- LEFT -->
    <div class="reson-to-trust-industry-page-left">
      <div class="reson-to-trust-industry-page-circle"></div>

      <img src="{{ asset($featuresData->image ?? 'notImage.jpg') }}" class="reson-to-trust-industry-page-runner">
    </div>
  </div>
  </section>  --}}

<!-- end  -->

  <section class="our-succes-story-of-fitness-industry-page case-study-slider">

  <div class="our-succes-story-of-fitness-industry-page case-study-wrapper">

    <!-- SLIDE 1 -->
    @foreach ($caseStudyList as $key => $caseStudy)
        <div class="our-succes-story-of-fitness-industry-page case-slide @if($key == 0)active @endif">

        <div class="our-succes-story-of-fitness-industry-page case-content">
            <div class="our-succes-story-of-fitness-industry-page logo">{{ mb_strtoupper(mb_substr($caseStudy->name ?? 'W', 0, 1)) }}</div>
            <h2>- {{$caseStudy->name ?? ''}}</h2>
            <p>
            {{$caseStudy->short_description ?? ''}}
            </p>

            <div class="our-succes-story-of-fitness-industry-page case-meta">
            <div><span>Country</span><br>{{$caseStudy->country ?? ''}}</div>
            <div><span>Platforms</span><br>{{$caseStudy->plateform ?? ''}}</div>
            </div>

            <a href="{{ route('contact') }}" class="our-succes-story-of-fitness-industry-page case-btn">
            View Case Study →
            </a>
        </div>

        <div class="our-succes-story-of-fitness-industry-page case-image">
            <div class="our-succes-story-of-fitness-industry-page case-phone-bg">
            <img src="{{ asset($caseStudy->image ?? 'notImage.jpg') }}" alt="">
            </div>
            <img src="{{ asset($caseStudy->image ?? 'notImage.jpg') }}"
                class="our-succes-story-of-fitness-industry-page case-phone">
        </div>

        </div>
    @endforeach
  </div>

  <!-- ARROWS -->
  <div class="our-succes-story-of-fitness-industry-page case-nav">
    <button class="our-succes-story-of-fitness-industry-page prev">←</button>
    <button class="our-succes-story-of-fitness-industry-page next">→</button>
  </div>

   </section>
<!-- end  -->



    <section class="ai-powered-fitness-app-industry-ai-section">
        <div class="ai-powered-fitness-app-industry-ai-container">
            <h2>Leveraging AI in Fitness App Development</h2>
            <p class="ai-powered-fitness-app-industry-ai-subtext">
            Harness the power of artificial intelligence in fitness mobile app development.
            </p>
            <div class="ai-powered-fitness-app-industry-ai-box">
                <div class="ai-powered-fitness-app-industry-ai-left">
                    @foreach ($LeverageAiList as $key => $LeverageAi)
                        <div class="ai-powered-fitness-app-industry-ai-content @if($key== 0)active @endif" id="ai-tab{{ $key+1 }}">
                            <div class="ai-powered-fitness-app-industry-ai-icon">🚀</div>
                            <h3>{{ $LeverageAi->name ?? '' }}</h3>
                            <p>
                                {{ $LeverageAi->short_description ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
                <!-- RIGHT TABS -->
                <div class="ai-powered-fitness-app-industry-ai-right">
                    @foreach ($LeverageAiList as $key1 => $LeverageAi1)
                        <div class="ai-powered-fitness-app-industry-ai-tab @if($key1== 0)active @endif" data-tab="ai-tab{{ $key1+1 }}">{{ $LeverageAi1->name ?? '' }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

  <section class="reson-to-trust-industry-page">
  <div class="reson-to-trust-industry-page-container">

    <!-- LEFT -->
    <div class="reson-to-trust-industry-page-left">
      <div class="reson-to-trust-industry-page-circle"></div>

      <img src="{{ asset($featuresData->image ?? 'notImage.jpg') }}" class="reson-to-trust-industry-page-runner">
    </div>

    <!-- RIGHT -->
    <div class="reson-to-trust-industry-page-right">
      <h2>
        {{ $featuresData->name ?? '' }}<br>
        <span class="blue">{{ $featuresData->title ?? '' }}</span>
      </h2>

      <p>
        {{ $featuresData->short_description ?? '' }}
      </p>
        @php
        if (is_string($featuresData->details)) {
            $details = json_decode($featuresData->details, true);
        } else {
            $details = $featuresData->details;
        }

        $details = $details ?? [];
        @endphp
        <div class="reson-to-trust-industry-page-pills">
        @foreach($details as $index => $item)
            <div class="pill {{ ['pink','purple','green','blue'][$index % 4] }}">
                {{ $item['heading'] ?? '' }}
            </div>
        @endforeach
        </div>
      <a href="{{ route('contact') }}" class="reson-to-trust-industry-page-btn">Get started! →</a>
    </div>

  </div>
  </section>

<!-- end  -->


<section class="AI-powered-Recommendations-industry-page">
  <div class="AI-powered-Recommendations-industry-page-container">

    <!-- LEFT TABS -->
    <div class="AI-powered-Recommendations-industry-page-tabs">
        @foreach ($advanceTechnologyList as $key => $advanceTechnology)
            <div class="AI-powered-Recommendations-industry-page-tab @if($key == 0) active @endif" data-tab="tab1{{ $key+1 }}">
                {{ $advanceTechnology->name ?? '' }}
            </div>
        @endforeach


    </div>

    <!-- RIGHT CONTENT -->
    <div class="AI-powered-Recommendations-industry-page-content">

      <!-- TAB 1 -->
      @foreach ($advanceTechnologyList as $key1 => $advanceTechnology1)
      <div class="AI-powered-Recommendations-industry-page-panel @if($key1 == 0) active @endif" id="tab1{{ $key1+1 }}">
        <span>0{{ $key1+1 }}</span>
        <h3>{{ $advanceTechnology1->name ?? '' }}</h3>
        <p>
          {{$advanceTechnology1->short_description ?? ''}}
        </p>
        <ul>
            @foreach($advanceTechnology1->details as $item)
                <li>{{ rtrim($item['titles'], '1') }}</li>
            @endforeach
        </ul>
      </div>
      @endforeach
    </div>
  </div>
   </section>


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
                <span class="common-section-everypage-blog-listing-play-btn" data-video="{{ asset($testimonial->video_path ?? '') }}"></span>
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



  <!--   @if(count($testimonials) > 0)
        <section class="navy-testimonial-slider">
        <div class="navy-testimonial-header">
            <h2>Client Testimonials</h2>
            <div class="navy-slider-controls">
            <button id="navyPrev">‹</button>
            <button id="navyNext">›</button>
            </div>
        </div>

        <div class="navy-slider-viewport">
            <div class="navy-slider-track"> -->

            <!-- CARD -->
            <!-- @foreach ($testimonials as $testimonial) -->
           <!--      <div class="navy-testimonial-card" data-video="{{ asset($testimonial->video_path ?? 'notImage.jpg') }}">
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
    @endif

      <!-- end  -->


   <section class="power-packed-feature-industry-page">
        <h2>Power-Packed Features for Fitness <br/>App Development </h2>
        <p>Transform your vision into reality with Apptunix, a top fitness app development company. Our expert fitness app <br/>developers create engaging fitness applications packed with essential features. Build your fitness app and empower users on their health <br/> wellness journeys!</p>

        <div class="power-packed-feature-industry-page-features">

            <div class="power-packed-feature-industry-page-track">
                @foreach ($powerPackedList as $powerPacked)
                    <div class="power-packed-feature-industry-page-card">
                        <div class="power-packed-feature-industry-page-corner"></div>
                        <div class="power-packed-feature-industry-page-icon">💬</div>
                        <h3>{{ $powerPacked->name ?? ''  }}</h3>
                        <p>{{ $powerPacked->short_description ?? ''  }}</p>
                    </div>
                @endforeach
            </div>
            <div class="power-packed-feature-industry-page-controls">
            <button class="prev">←</button>
            <div class="progress-bar"><span></span></div>
            <button class="next">→</button>
            </div>

        </div>
   </section>




   <section class="roadmap-exceptional-indusrty-page-fitness-process">

  <div class="roadmap-exceptional-indusrty-page-fitness-process-wrapper">

    <!-- LEFT -->
    <div class="roadmap-exceptional-indusrty-page-fitness-steps">
        @foreach ($roadMapList as $key => $roadMap)
            <div class="roadmap-exceptional-indusrty-page-fitness-step @if($key == 0) active @endif" data-step="{{ $key+1 }}">
                <span class="roadmap-exceptional-indusrty-page-icon">➲</span>
                <p>{{ $roadMap->name ?? '' }}</p>
            </div>
        @endforeach
    </div>

    <!-- RIGHT -->
    <div class="roadmap-exceptional-indusrty-page-fitness-content">
    @foreach ($roadMapList as $key1 => $roadMap1)
        <div class="roadmap-exceptional-indusrty-page-fitness-box @if($key1 == 0) active @endif" id="step{{$key1+1}}">
            <h1>0{{$key1+1}}</h1>
            <h2>{{ $roadMap1->title ?? '' }}</h2>
            <p>{{ $roadMap1->short_description ?? '' }}</p>
            <ul>
                @foreach($roadMap1->details as $item)
                    <li>{{ rtrim($item['titles'], '1') }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
    </div>
  </div>
</section>


@if(count($fAQList) > 0)
    <div class="faq-top-section" style=" margin-top: 35px;" >
        <h2 class="mt-2">Turning Your Questions into Confidence</h2>
        <div class="faq">
            @foreach ($fAQList as $key => $fAQData)
                <label class="faq-item">
                    <input type="radio" name="faq" @if($key == 0) checked @endif>
                    <div class="question">{{ $fAQData->question ?? '' }}</div>
                    <div class="answer">{{ $fAQData->answer ?? '' }}</div>
                </label>
            @endforeach

        </div>
    </div>
@endif

@include('website.contact-form')
@endsection
