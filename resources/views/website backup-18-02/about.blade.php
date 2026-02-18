@extends('website.layout.app')
@section('content')


<section class="aboutpage-we-transform-ai-hero-banner">
  <div class="aboutpage-we-transform-ai-hero-inner">

    <!-- Floating Tags -->
    <span class="aboutpage-we-transform-ai-tag aboutpage-tag-clients">Clients</span>
    <span class="aboutpage-we-transform-ai-tag aboutpage-tag-users">Users</span>
    {{-- <span class="aboutpage-we-transform-ai-tag aboutpage-tag-brand">Infiniti</span> --}}

    {{-- <h1>
      We Transform Your <span class="aboutpage-glass">ideas</span> Into <br>
      <span class="aboutpage-ai-gradient">AI-Powered</span>
      <span class="aboutpage-glass">Software</span>
      That People <span class="aboutpage-glass">Love</span>
    </h1> --}}
    @if($aboutusData->title)
    <h1>
        @php

        $titleWords = explode(' ', $aboutusData->title);
        @endphp
            @foreach ($titleWords as $index => $word)

                @if ($index % 6 == 0)
                    <span class="aboutpage-ai-gradient">{{ $word }}</span>
                @elseif ($index % 3 == 0)
                    <span class="aboutpage-glass">{{ $word }}</span><br>
                @else
                    {{ $word }}
                @endif

            @endforeach
    </h1>
    @endif
    <p>{{ $aboutusData->sub_title ?? '' }}</p>

    <a href="#" class="aboutpage-ai-btn">Consult Our Experts →</a>

  </div>
</section>




@if(count($trustedByList) > 0)
 <!-- trusted statrt  -->
  <section class="trusted">

    <div class="trusted-wrap">

      <div class="trusted-badge" style="z-index: 999;">Trusted by</div>

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
@endif
<section class="who-we-are-about-page who-we-are">
  <div class="who-we-are-about-page-container who-container">

    <!-- LEFT CONTENT -->
    <div class="who-we-are-about-page-left who-left">
      <h2>Who Are We</h2>
      <p style="white-space: pre-wrap;">{{ $aboutusData->short_description ?? '' }}</p>
    </div>

    <!-- RIGHT STATS -->
    <div class="who-we-are-about-page-stats who-stats">
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="{{ $aboutusData->experience ?? '' }}">{{ $aboutusData->experience ?? '' }}</h3>
        <span>Years of Experience</span>
      </div>
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="{{ $aboutusData->delivered ?? '' }}">{{ $aboutusData->delivered ?? '' }}</h3>
        <span>Products Delivered</span>
      </div>
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="{{ $aboutusData->countries ?? '' }}">{{ $aboutusData->countries ?? '' }}</h3>
        <span>Countries Served</span>
      </div>
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="{{ $aboutusData->enthusiasts ?? '' }}">{{ $aboutusData->enthusiasts ?? '' }}</h3>
        <span>Tech Enthusiasts</span>
      </div>
    </div>

  </div>

  <!-- CARDS -->
  @if($aboutusData->status == 1)
    <div class="who-we-are-about-page-cards who-cards">

        <div class="who-we-are-about-page-card who-card">
        <div class="icon blue"></div>
        <h4>{{ $aboutusData->human_centric_title ?? '' }}</h4>
        <p>{{ $aboutusData->human_centric_description ?? '' }}</p>
        </div>

        <div class="who-we-are-about-page-card who-card">
        <div class="icon purple"></div>
        <h4>{{ $aboutusData->exceptional_expertis_title ?? '' }}</h4>
        <p>{{ $aboutusData->exceptional_expertise_description ?? '' }}</p>
        </div>

        <div class="who-we-are-about-page-card who-card">
        <div class="icon cyan"></div>
        <h4>{{ $aboutusData->end_to_end_support_title ?? '' }}</h4>
        <p>{{ $aboutusData->end_to_end_support_description ?? '' }}</p>
        </div>

    </div>
  @endif
</section>

<div class="our-journey-about-page">
  <div class="our-journey-about-page-timeline-section">

    {{-- Background --}}
    <div class="our-journey-about-page-timeline-bg">
      <img id="yearImage"
           src="{{ asset(optional($ourJourneysList->last())->image) }}">
      <div class="our-journey-about-page-overlay"></div>
    </div>

    {{-- Content --}}
    <div class="our-journey-about-page-timeline-content">
      <h1 id="yearTitle">
        {{ optional($ourJourneysList->last())->year }}
      </h1>
      <p id="yearText">
        {{ optional($ourJourneysList->last())->short_description }}
      </p>
    </div>

    {{-- Years Dynamic --}}
    <div class="our-journey-about-page-timeline-years simple-timeline">
      @foreach($ourJourneysList as $index => $journey)
        <span
          class="{{ $loop->last ? 'active' : '' }}"
          onclick="changeYear('{{ $journey->year }}',this)">
          {{ $journey->year }}
        </span>
      @endforeach
    </div>

  </div>
</div>

<section class="grow-with-you-service-page">
  <div class="grow-with-you-service-page-overlay">

    <div class="grow-with-you-service-page-content">
      <h2>Struggling to Scale? Let’s Build a Solution That Grows with You</h2>

      <p>
        Get 30% off your first custom software project, designed to boost
        efficiency, cut costs, and scale your business seamlessly.
      </p>

      <a href="{{ route('contact') }}" class="grow-with-you-service-page-btn">
        Talk to Our Experts Today →
      </a>
    </div>

  </div>
</section>





<section class="our-success-celebration-about-page company-gallery-carousel">
  <div class="our-success-celebration-about-page-carousel-track carousel-track">

    <!-- Slides -->
    @foreach ($ourSuccessList as $ourSuccess)
        <div class="our-success-celebration-about-page-carousel-card carousel-card">
            <img src="{{ asset($ourSuccess->image ?? 'notImage.jpg') }}" alt="{{ $ourSuccess->name ?? '' }}">
        </div>
    @endforeach
  </div>
</section>



  <!-- wall-of-fame -->
@if(count($fameMobileAppList) > 0)
    <section class="wall-of-fame ">
        <div class="container">

            <h2>Our Wall of Fame as a Mobile App<br>Development Company</h2>

            <div class="awards-wrapper">
                <div class="awards-row" id="awardTrack">

                    <!-- CARD -->
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

        <!-- mobile-app-devlopment-dubai-partner-section start here  -->
        {{-- <section class="mobile-app-devlopment-dubai-partner-section">
        <div class="mobile-app-devlopment-dubai-partner-container">

    <!-- LEFT CONTENT -->
    <div class="mobile-app-devlopment-dubai-partner-content">
      <h2>Dubai’s No.1 Trusted Partner for<br>Digital Transformation</h2>
      <p>
        Over the years, we’ve helped businesses in Dubai and across the UAE grow
        with reliable, high-quality mobile app development and digital innovation
        solutions. Our presence at events like GITEX Dubai reflects our expertise
        and the trust startups, enterprises, and government brands place in us.
      </p>
      <a href="#" class="cta-btn">Get a Free Project Estimate</a>
    </div>

    <!-- RIGHT SLIDER -->
    <div class="mobile-app-devlopment-dubai-partner-slider">
      <div class="mobile-app-devlopment-dubai-slider-track">
        <div class="mobile-app-devlopment-dubai-slide"><img src="./assets/images/background-about.jpeg"></div>
        <div class="mobile-app-devlopment-dubai-slide"><img src="./assets/images/airlane.jpg"></div>
        <div class="mobile-app-devlopment-dubai-slide"><img src="./assets/images/mdbnr_image.png"></div>
        <div class="mobile-app-devlopment-dubai-slide"><img src="./assets/images/background-about.jpeg"></div>

        <!-- duplicate for smooth loop -->
        <div class="mobile-app-devlopment-dubai-slide"><img src="./assets/images/slider/banner-01.png"></div>
        <div class="mobile-app-devlopment-dubai-slide"><img src="./assets/images/mdbnr_image.png"></div>
      </div>
    </div>

  </div>
        </section> --}}
        <!-- mobile-app-devlopment-dubai-partner-section end here  -->

{{-- <section class="our-team-leadership-about-page">

  <div class="our-team-leadership-about-page-leadership-section">

    <div class="our-team-leadership-about-page-leader-card">

      <div class="our-team-leadership-about-page-leader-content">
        <span class="our-team-leadership-about-page-badge">Our Leadership Team</span>

        <h2>
          Nikhil Bansal – <br />
          <strong>The Mind Behind Infiniti</strong>
        </h2>

        <p class="our-team-leadership-about-page-designation">
          (Founder and CEO, Infiniti)
        </p>

        <p class="our-team-leadership-about-page-description">
          Bringing over 15 years of hands-on experience in mobile app development
          and product engineering. He leads Infiniti’s strategic vision — merging
          UX, scalable engineering, and emerging technologies like AI and blockchain —
          to turn bold ideas into market-ready products.
        </p>

        <a href="#" class="our-team-leadership-about-page-btn">
          Schedule a Meeting →
        </a>
      </div>

      <div class="our-team-leadership-about-page-leader-image">
        <img src="images/nikhil.png" alt="Nikhil Bansal">

        <div class="our-team-leadership-about-page-leader-name">
          <h4>Nikhil Bansal</h4>
          <span>Founder and CEO, Infiniti</span>
        </div>
      </div>

    </div>

    <div class="our-team-leadership-about-page-team-grid">

      <div class="our-team-leadership-about-page-team-card">
        <img src="images/reena.png" alt="">
        <h5>Reena Bhagat</h5>
        <span>Head Of Delivery</span>
      </div>

      <div class="our-team-leadership-about-page-team-card">
        <img src="images/rishi.png" alt="">
        <h5>Rishi Pahwa</h5>
        <span>Project Manager</span>
      </div>

      <div class="our-team-leadership-about-page-team-card">
        <img src="images/diksha.png" alt="">
        <h5>Diksha Verma</h5>
        <span>Head Of HR</span>
      </div>

      <div class="our-team-leadership-about-page-team-card">
        <img src="images/sandeep.png" alt="">
        <h5>Sandeep Singh</h5>
        <span>Design Lead</span>
      </div>

    </div>

  </div>

</section> --}}



  {{-- <section class="navy-testimonial-slider">

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
          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>David Ams</h3>
              <p>Co Founder – Luxbubble</p>
          </div>

          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Marco Perez</h3>
              <p>Co Founder – Bancreach</p>
          </div>

          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Mishari</h3>
              <p>CEO – Logibids</p>
          </div>

          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Sarah Kim</h3>
              <p>Founder – BrandPro</p>
          </div>

          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>John Carter</h3>
              <p>CTO – FinTech Hub</p>
          </div>

          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Maria Lopez</h3>
              <p>Director – Bright Labs</p>
          </div>
          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Maria Lopez</h3>
              <p>Director – Bright Labs</p>
          </div>
          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Maria Lopez</h3>
              <p>Director – Bright Labs</p>
          </div>
          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Maria Lopez</h3>
              <p>Director – Bright Labs</p>
          </div>
          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Maria Lopez</h3>
              <p>Director – Bright Labs</p>
          </div>
          <div class="navy-testimonial-card" data-video="./video/home_banner_video.mp4">
              <img src="./assets/images/airlane.jpg">
              <span class="play">▶</span>
              <h3>Maria Lopez</h3>
              <p>Director – Bright Labs</p>
          </div>

          </div>
      </div>

  </section> --}}



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



      <!--  faq section start  -->
      @if(count($fAQList) > 0)
        <section class="faq-top-section" >
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
        </section>
        @endif
      <!-- faq section end  -->



@include('website.contact-form')




<section class="common-section-everypage-blog-listing-video-popup" id="videoPopup">
    <div class="common-section-everypage-blog-listing-popup-overlay"></div>

    <div class="common-section-everypage-blog-listing-popup-content">
        <span class="common-section-everypage-blog-listing-popup-video-icon">▶</span>
        <span class="common-section-everypage-blog-listing-popup-close">&times;</span>

        <iframe
            id="popupVideo"
            allow="autoplay; fullscreen"
            allowfullscreen>
        </iframe>
    </div>
</section>
        <section class="navy-video-modal" id="navyVideoModal">
            <div class="navy-video-modal__overlay"></div>

            <div class="navy-video-modal__content">
                <button class="navy-video-modal__close" aria-label="Close">✕</button>
                <video id="navyModalVideo" controls autoplay></video>
            </div>
        </section>
      <script>
const counters = document.querySelectorAll(".who-we-are-about-page-stat h3");

const startCounter = () => {
  counters.forEach(counter => {
    const target = +counter.getAttribute("data-count");
    let count = 0;
    const speed = target / 60;

    const update = () => {
      count += speed;
      if(count < target){
        counter.innerText = Math.floor(count) + "+";
        requestAnimationFrame(update);
      } else {
        counter.innerText = target + "+";
      }
    };
    update();
  });
};

const observer = new IntersectionObserver(entries => {
  if(entries[0].isIntersecting){
    startCounter();
    observer.disconnect();
  }
},{ threshold:0.5 });

observer.observe(document.querySelector(".who-we-are-about-page-stats"));
</script>
<script>
const data = {
@foreach($ourJourneysList as $journey)
  "{{ $journey->year }}" : {
      img: "{{ asset($journey->image) }}",
      text: "{{ addslashes($journey->short_description) }}",
      title: "{{ addslashes($journey->title) }}"
  },
@endforeach
};

const years = Object.keys(data);
let currentIndex = years.length - 1;
let autoTimer;

function changeYear(year, el){

  const img = document.getElementById("yearImage");
  img.style.opacity = "0";

  setTimeout(()=>{
    document.getElementById("yearTitle").innerText = year;
    document.getElementById("yearText").innerText = data[year].text;
    img.src = data[year].img;
    img.style.opacity = "1";
  },300);

  const spans = document.querySelectorAll(".our-journey-about-page-timeline-years span");
  spans.forEach(s=>s.classList.remove("active"));
  el.classList.add("active");

  currentIndex = years.indexOf(String(year));
  restartAutoSlide();
}

function autoSlide(){
  currentIndex = (currentIndex + 1) % years.length;
  const year = years[currentIndex];
  const spans = document.querySelectorAll(".our-journey-about-page-timeline-years span");

  changeYear(year, spans[currentIndex]);
}

function restartAutoSlide(){
  clearInterval(autoTimer);
  autoTimer = setInterval(autoSlide, 4000);
}

window.onload = ()=>{
  const spans = document.querySelectorAll(".our-journey-about-page-timeline-years span");
  changeYear(years[years.length - 1], spans[years.length - 1]);
  autoTimer = setInterval(autoSlide, 4000);
};
</script>
@endsection
