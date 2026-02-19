@extends('website.layout.app')

{{-- @section('title', $serviceData->seo_title ?? $serviceData->title . ' | Infinit Tech Solution')
@section('meta_description',$serviceData->seo_description?? Str::limit(strip_tags($serviceData->short_description), 160))
@section('meta_keywords',$serviceData->seo_keywords ?? 'web development, mobile apps, seo services, infinit tech')
@section('canonical',url()->current())
@section('og_image',$serviceData->seo_image? asset($serviceData->seo_image): asset('images/default-og.jpg')) --}}

@section('content')

<section class="digital-marketing-hero">

  <!-- Dynamic Background Image -->
  <img
    src="{{ asset($digitalData->banner_image ?? 'website1/assets/images/download.jpeg') }}"
    alt="Banner Image"
    class="digital-marketing-hero-bg"
  >
  <div class="digital-marketing-hero-content">
    <h1>{{ $digitalData->banner_title ?? '' }}</h1>
    <p>
      {{ $digitalData->banner_description ?? '' }}
    </p>
    <a href="{{ route('contact') }}" class="digital-marketing-hero-btn">Get a Quote</a>
  </div>

</section>
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
            <img id="caseImg"
                 src="{{ asset($portfolioBannerList->first()->image ?? '') }}"
                 alt="">
        </div>
    </div>

    <!-- RIGHT -->
    <div class="digital-marketing-page-marketing-strategies-case-right">

      <!-- TABS -->
      <ul class="digital-marketing-page-marketing-strategies-case-tabs">
        @foreach($portfolioBannerList as $key => $item)
            <li
                class="{{ $key == 0 ? 'active' : '' }}"
                data-image="{{ asset($item->image) }}"
                data-growth="{{ $item->growth }}"
                data-result="{{ $item->result }}"
                data-desc="{{ $item->short_description }}"
            >
                {{ $item->name }}
            </li>
        @endforeach
      </ul>

      <!-- STATS -->
      <div class="digital-marketing-page-marketing-strategies-stats">
        <div class="digital-marketing-page-marketing-strategies-stat-box">
          <h3 id="stat1">{{ $portfolioBannerList->first()->growth ?? '' }}%</h3>
          <p>Growth</p>
        </div>

        <div class="digital-marketing-page-marketing-strategies-stat-box">
          <h3 id="stat2">{{ $portfolioBannerList->first()->result ?? '' }}Days</h3>
          <p>Result</p>
        </div>
      </div>

      <!-- TEXT -->
      <p id="caseDesc">
        {{ $portfolioBannerList->first()->short_description ?? '' }}
      </p>

      <a href="{{ route('contact') }}" class="btn">Start Building →</a>

    </div>

  </div>
</section>

<section class="digital-marketing-page-satisfide-clients-stats-section">
  <div class="digital-marketing-page-satisfide-clients-stats-container">

    <!-- LEFT STATS -->
    <div class="digital-marketing-page-satisfide-clients-stats-left">
      <div class="digital-marketing-page-satisfide-clients-stat-box">
        <h2>{{ $excellanceCounting->industry_count ?? 1 }}+</h2>
        <p>Industry Excellence</p>
      </div>
      <div class="digital-marketing-page-satisfide-clients-stat-box">
        <h2>{{ $excellanceCounting->empowered_count ?? 1 }}+</h2>
        <p>Empowered Clients</p>
      </div>
    </div>

    <!-- RIGHT CIRCLES -->
    <div class="digital-marketing-page-satisfide-clients-stats-right">
      <div class="digital-marketing-page-satisfide-clients-circle circle-one">
        <h3>{{ $excellanceCounting->coutries_count ?? 1 }}+</h3>
        <span>Countries Served</span>
      </div>

      <div class="digital-marketing-page-satisfide-clients-circle circle-two">
        <h3>{{ $excellanceCounting->teach_engineer_count ?? 1 }}+</h3>
        <span>Tech Engineers</span>
      </div>

      <div class="digital-marketing-page-satisfide-clients-circle circle-three">
        <h3>{{ $excellanceCounting->digital_solution_count ?? 1 }}+</h3>
        <span>Digital Solutions Launched</span>
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
            <img src="{{ asset('website1/assets/images/campaign.png') }}" alt="{{ $whyPartnerData->heading_one ?? '' }} icon">
        </div>

      <h3>{{ $whyPartnerData->heading_one ?? '' }}</h3>
      <p>
        {{ $whyPartnerData->short_description_one ?? '' }}
      </p>
    </div>

    <div class="digital-marketing-page-why-partner-partner-card card-pink">
      <div class="digital-marketing-page-why-partner-partner-icon-box pink">
        <img src="{{ asset('website1/assets/images/models.png') }}" alt="{{ $whyPartnerData->heading_two ?? '' }} icon">
      </div>
      <h3>{{ $whyPartnerData->heading_two ?? '' }}</h3>
      <p>
        {{ $whyPartnerData->short_description_two ?? '' }}
      </p>
    </div>

    <div class="digital-marketing-page-why-partner-partner-card card-blue">
      <div class="digital-marketing-page-why-partner-partner-icon-box blue">
        <img src="{{ asset('website1/assets/images/dedicated.png') }}" alt="{{ $whyPartnerData->heading_three ?? '' }} icon">
      </div>
      <h3>{{ $whyPartnerData->heading_three ?? '' }}</h3>
      <p>
        {{ $whyPartnerData->short_description_three ?? '' }}
      </p>
    </div>

  </div>
</section>

@if(count($firstFourServices) > 0)
    @foreach ($firstFourServices as $key => $consultService)
        @if($key % 2 == 0 )
            <section class="bespok-digital-marketing-page-ppc-section">
                @if($key == 0)
                    <h1>Bespoke Digital Marketing Consulting Services to Cater to All Your Business Needs</h1>
                @endif
                <div class="bespok-digital-marketing-page-ppc-container">

                    <!-- LEFT CONTENT -->
                    <div class="bespok-digital-marketing-page-ppc-content">
                    <span class="bespok-digital-marketing-page-ppc-tag">{{ $consultService->name ?? '' }}</span>

                    <h2>{{ $consultService->title ?? '' }}</h2>
                        @php
                            $consultServiceItem = is_string($consultService->features)
                                ? json_decode($consultService->features, true)
                                : $consultService->features;
                        @endphp

                        @if(!empty($consultServiceItem))
                            <ul class="bespok-digital-marketing-page-ppc-list">
                                @foreach($consultServiceItem as $item1)
                                    @if(!empty($item1['titles']))
                                        <li>{{ preg_replace('/\d+$/', '', $item1['titles']) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                    <a href="{{ route('contact') }}" class="bespok-digital-marketing-page-ppc-btn">Build a {{ $consultService->name ?? '' }} Campaign →</a>
                    </div>

                    <!-- RIGHT IMAGE -->
                    <div class="bespok-digital-marketing-page-ppc-image">
                    <img src="{{ asset($consultService->image ?? 'notImage.jpg') }}" alt="{{ $consultService->title ?? '' }}">
                    </div>

                </div>
            </section>
        @else
            <section class="bespok-digital-marketing-page-ppc-section">
                <div class="bespok-digital-marketing-page-ppc-container reverse">

                    <!-- LEFT CONTENT -->
                    <div class="bespok-digital-marketing-page-ppc-content">
                    <span class="bespok-digital-marketing-page-ppc-tag">{{ $consultService->name ?? '' }}</span>

                    <h2>{{ $consultService->title ?? '' }}</h2>
                    @php
                            $consultServiceItem = is_string($consultService->features)
                                ? json_decode($consultService->features, true)
                                : $consultService->features;
                        @endphp

                        @if(!empty($consultServiceItem))
                            <ul class="bespok-digital-marketing-page-ppc-list">
                                @foreach($consultServiceItem as $item1)
                                    @if(!empty($item1['titles']))
                                        <li>{{ preg_replace('/\d+$/', '', $item1['titles']) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                    <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a {{ $consultService->name ?? '' }} Campaign →</a>
                    </div>

                    <!-- RIGHT IMAGE -->
                    <div class="bespok-digital-marketing-page-ppc-image">
                    <img src="{{ asset($consultService->image ?? 'notImage.jpg') }}" alt="{{ $consultService->title ?? '' }}">
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endif

@if(count($sliderServices) > 0)
<section class="digital-marketing-page-services-slider-section">

  <div class="digital-marketing-page-services-slider-wrapper">

    <!-- TRACK -->
    <div class="digital-marketing-page-services-slider-track" id="servicesTrack">
    @foreach ($sliderServices as $sliderServicesData)
        <!-- SLIDE 1 -->
        <div class="digital-marketing-page-service-slide">
            <div class="digital-marketing-page-service-left">
            <span class="digital-marketing-page-service-tag">{{ $sliderServicesData->name ?? '' }}</span>
            <h2>{{ $sliderServicesData->title ?? '' }}</h2>
            @php
                $sliderServicesDataItem = is_string($sliderServicesData->features)
                    ? json_decode($sliderServicesData->features, true)
                    : $sliderServicesData->features;
            @endphp

            @if(!empty($sliderServicesDataItem))
                <ul >
                    @foreach($sliderServicesDataItem as $item2)
                        @if(!empty($item2['titles']))
                            <li>{{ preg_replace('/\d+$/', '', $item2['titles']) }}</li>
                        @endif
                    @endforeach
                </ul>
            @endif
            <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
            </div>
            <div class="digital-marketing-page-service-right">
            <img src="{{ asset($sliderServicesData->image ?? 'notImage.jpg') }}" alt="{{ $sliderServicesData->title ?? '' }}">
            </div>
        </div>
    @endforeach
    </div>

    <!-- NAV BUTTONS -->
    <div class="digital-marketing-page-slider-nav">
      <button onclick="prevSlide()">←</button>
      <button onclick="nextSlide()">→</button>
    </div>

  </div>

</section>
@endif

<section class="digital-marketing-page-our-process">
  <div class="digital-marketing-page-process-wrap">

    <h2>Our Process</h2>
    <p class="digital-marketing-page-process-desc">
      {{ $ourProcessData->title_header_one ?? '' }}
    </p>

    <!-- CARDS -->
    <div class="digital-marketing-page-process-cards">
      <div class="digital-marketing-page-card pink">
        <img src="{{ asset($ourProcessData->image_step_one ?? 'notImage.jpg')}}">
        <h4>{{ $ourProcessData->title_step_one ?? '' }}</h4>
        <p>{{ $ourProcessData->short_description_step_one ?? '' }}</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card orange">
        <img src="{{ asset($ourProcessData->image_step_two ?? 'notImage.jpg')}}">
        <h4>{{ $ourProcessData->title_step_two ?? '' }}</h4>
        <p>{{ $ourProcessData->short_description_step_two ?? '' }}</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card blue">
       <img src="{{ asset($ourProcessData->image_step_three ?? 'notImage.jpg')}}">
        <h4>{{ $ourProcessData->title_step_three ?? '' }}</h4>
        <p>{{ $ourProcessData->short_description_step_three ?? '' }}</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card green">
       <img src="{{ asset($ourProcessData->image_step_four ?? 'notImage.jpg')}}">
        <h4>{{ $ourProcessData->title_step_four ?? '' }}</h4>
        <p>{{ $ourProcessData->short_description_step_four ?? '' }}</p>
        <span class="arrow"></span>
      </div>
    </div>

    <!-- CURVE -->
    <div class="digital-marketing-page-curve-area">
      <svg viewBox="0 0 1200 220" preserveAspectRatio="none">
        <path d="M0,140 C250,40 500,220 750,150 1100,70 1100,110 1200,140"
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
       {{-- <img src="{{ asset('website1/assets/images/cta.png')}}" class="rocket"> --}}

      <!-- <img src="rocket.png') }}" class="rocket"> -->
    </div>

    <!-- CTA -->
    <div class="digital-marketing-page-process-cta">
      <div>
        <h4>{{ $ourProcessData->title_header_two ?? '' }}</h4>
        <p>{{ $ourProcessData->short_description_two ?? '' }}</p>
        <a href="{{ route('contact') }}">Know How We Do It</a>
      </div>
      {{-- <img src="{{ asset('website1/assets/images/cta.png')}}"> --}}
    </div>

  </div>
</section>

@include('website.contact-form')
@endsection
