@extends('website.layout.app')
@section('content')


<section class="aboutpage-we-transform-ai-hero-banner">
  <div class="aboutpage-we-transform-ai-hero-inner">

    <!-- Floating Tags -->
    <span class="aboutpage-we-transform-ai-tag aboutpage-tag-clients">Clients</span>
    <span class="aboutpage-we-transform-ai-tag aboutpage-tag-users">Users</span>
    <span class="aboutpage-we-transform-ai-tag aboutpage-tag-brand">Apptunix</span>

    <h1>
      We Transform Your <span class="aboutpage-glass">ideas</span> Into <br>
      <span class="aboutpage-ai-gradient">AI-Powered</span>
      <span class="aboutpage-glass">Software</span>
      That People <span class="aboutpage-glass">Love</span>
    </h1>

    <p>Helping Businesses Leverage Tomorrow’s Tech, Today</p>

    <a href="#" class="aboutpage-ai-btn">Consult Our Experts →</a>

  </div>
</section>





 <!-- trusted statrt  -->
  <section class="trusted">

    <div class="trusted-wrap">

      <div class="trusted-badge">Trusted by</div>

      <div class="logo-slider">
        <div class="logos">

            <div class="logo-box"><img src="{{ asset('dubai/assets/images/andamen.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/craftslane.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/deebaco.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/fly-high.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/kahira.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/dorganizer.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/taragram.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/keydroid.png')}}"></div>

            <!-- repeat for scrolling -->
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/preeminent.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/puneet.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/maharishi-university.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/inferrix.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/oceedee.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/andamen.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/taragram.png')}}"></div>
            <div class="logo-box"><img src="{{ asset('dubai/assets/images/keydroid.png')}}"></div>

        </div>
      </div>


    </div>

  </section>
  <!-- truted end  -->

<section class="who-we-are-about-page who-we-are">
  <div class="who-we-are-about-page-container who-container">

    <!-- LEFT CONTENT -->
    <div class="who-we-are-about-page-left who-left">
      <h2>Who Are We</h2>
      <p>
        Apptunix, the #1 Tech Partner, empowers success for<br>
        500+ businesses globally, helping them innovate,<br>
        scale, and lead industries.
      </p>
    </div>

    <!-- RIGHT STATS -->
    <div class="who-we-are-about-page-stats who-stats">
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="12">0</h3>
        <span>Years of Experience</span>
      </div>
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="2000">0</h3>
        <span>Products Delivered</span>
      </div>
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="25">0</h3>
        <span>Countries Served</span>
      </div>
      <div class="who-we-are-about-page-stat stat">
        <h3 data-count="300">0</h3>
        <span>Tech Enthusiasts</span>
      </div>
    </div>

  </div>

  <!-- CARDS -->
  <div class="who-we-are-about-page-cards who-cards">

    <div class="who-we-are-about-page-card who-card">
      <div class="icon blue"></div>
      <h4>Human Centric</h4>
      <p>We work hand-in-hand with you to ensure clear communication and collaboration.</p>
    </div>

    <div class="who-we-are-about-page-card who-card">
      <div class="icon purple"></div>
      <h4>Exceptional Expertise</h4>
      <p>Our seasoned team brings top-tier innovation and best-in-class development methodologies.</p>
    </div>

    <div class="who-we-are-about-page-card who-card">
      <div class="icon cyan"></div>
      <h4>End-to-End Support</h4>
      <p>From concept to launch and beyond, Apptunix provides continuous maintenance support.</p>
    </div>

  </div>
</section>





<div class="our-journey-about-page">

  <div class="our-journey-about-page-timeline-section">

    <div class="our-journey-about-page-timeline-bg">
      <img id="yearImage" src="{{ asset('website1/assets/images/custom-industries2.png') }}">
      <div class="our-journey-about-page-overlay"></div>
    </div>

    <div class="our-journey-about-page-timeline-content">
      <h1 id="yearTitle">2025</h1>
      <p id="yearText">2025 got multiple global recognitions.</p>
    </div>

    <div class="our-journey-about-page-timeline-years simple-timeline">
      <span onclick="changeYear(2015,this)">2015</span>
      <span onclick="changeYear(2016,this)">2016</span>
      <span onclick="changeYear(2017,this)">2017</span>
      <span onclick="changeYear(2018,this)">2018</span>
      <span onclick="changeYear(2019,this)">2019</span>
      <span onclick="changeYear(2020,this)">2020</span>
      <span onclick="changeYear(2021,this)">2021</span>
      <span onclick="changeYear(2022,this)">2022</span>
      <span onclick="changeYear(2023,this)">2023</span>
      <span onclick="changeYear(2024,this)">2024</span>
      <span class="active" onclick="changeYear(2025,this)">2025</span>
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

      <a href="#" class="grow-with-you-service-page-btn">
        Talk to Our Experts Today →
      </a>
    </div>

  </div>
</section>





<section class="our-success-celebration-about-page company-gallery-carousel">
  <div class="our-success-celebration-about-page-carousel-track carousel-track">

    <!-- Slides -->
    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/background-about.jpeg">
    </div>

    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/bnr-img.png">
    </div>

    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/case_bg6.webp">
    </div>

    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/custom-cta1-img.png">
    </div>

    <!-- Duplicate for infinite loop -->
    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/case_bg6.webp">
    </div>

    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/bnr-img.png">
    </div>

    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/custom-cta1-img.png">
    </div>

    <div class="our-success-celebration-about-page-carousel-card carousel-card">
      <img src="./assets/images/background-about.jpeg">
    </div>

  </div>
</section>













  <!-- wall-of-fame -->
    <section class="wall-of-fame ">
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
    </section>
  <!-- wall-of-fame end  -->

        <!-- mobile-app-devlopment-dubai-partner-section start here  -->
        <section class="mobile-app-devlopment-dubai-partner-section">
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
        </section>
        <!-- mobile-app-devlopment-dubai-partner-section end here  -->

<section class="our-team-leadership-about-page">

  <div class="our-team-leadership-about-page-leadership-section">

    <div class="our-team-leadership-about-page-leader-card">

      <div class="our-team-leadership-about-page-leader-content">
        <span class="our-team-leadership-about-page-badge">Our Leadership Team</span>

        <h2>
          Nikhil Bansal – <br />
          <strong>The Mind Behind Apptunix</strong>
        </h2>

        <p class="our-team-leadership-about-page-designation">
          (Founder and CEO, Apptunix)
        </p>

        <p class="our-team-leadership-about-page-description">
          Bringing over 15 years of hands-on experience in mobile app development
          and product engineering. He leads Apptunix’s strategic vision — merging
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
          <span>Founder and CEO, Apptunix</span>
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

</section>



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

  </section>


  

      

      <!--  faq section start  -->
        <div class="faq-top-section">
            <h2>Turning Your Questions into Confidence</h2>
            <div class="faq">

                <label class="faq-item">
                    <input type="radio" name="faq" checked>
                    <div class="question">How do you ensure the security of the app?</div>
                    <div class="answer">We follow secure coding standards & audits.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">How do you handle project management?</div>
                    <div class="answer">We use agile methodology & tools.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">How do you ensure a seamless user experience?</div>
                    <div class="answer">We follow UI/UX design principles.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">What mobile app services do you offer?</div>
                    <div class="answer">We develop Android, iOS & hybrid apps.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">What makes your company different?</div>
                    <div class="answer">Strong experience & reliable support.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">What is the average cost?</div>
                    <div class="answer">Cost depends on features & complexity.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">Do you provide maintenance?</div>
                    <div class="answer">Yes, we provide long-term support.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">How long does it take to build an app?</div>
                    <div class="answer">Typically 2-6 months depending on scope.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">Do you sign NDA?</div>
                    <div class="answer">Yes, we ensure full confidentiality.</div>
                </label>

                <label class="faq-item">
                    <input type="radio" name="faq">
                    <div class="question">Do you help with publishing apps?</div>
                    <div class="answer">Yes, we assist with App Store & Play Store.</div>
                </label>

            </div>
        </div>
      <!-- faq section end  -->


      
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
  2015:{ img:"{{ asset('website1/assets/images/background-about.jpeg')}}", text:"Company founded with small team" },
  2016:{ img:"{{ asset('website1/assets/images/blockchain-1.png')}}", text:"First international clients" },
  2017:{ img:"{{ asset('website1/assets/images/bnr-img.png')}}", text:"Mobile & Web development focus" },
  2018:{ img:"{{ asset('website1/assets/images/custom-industries2.png')}}", text:"Product launches & partnerships" },
  2019:{ img:"{{ asset('website1/assets/images/background-about.jpeg')}}", text:"Strong global growth" },
  2020:{ img:"{{ asset('website1/assets/images/background-about.jpeg')}}", text:"Digital transformation year" },
  2021:{ img:"{{ asset('website1/assets/images/blockchain-1.png')}}", text:"Cloud, AI, Blockchain expansion" },
  2022:{ img:"{{ asset('website1/assets/images/custom-industries2.png')}}", text:"Leading SaaS provider" },
  2023:{ img:"{{ asset('website1/assets/images/blockchain-1.png')}}", text:"50+ global products delivered" },
  2024:{ img:"{{ asset('website1/assets/images/bnr-img.png')}}", text:"Fortune enterprise clients" },
  2025:{ img:"{{ asset('website1/assets/images/background-about.jpeg')}}", text:"Top Clutch awards & recognitions" }
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
  autoTimer = setInterval(autoSlide, 4000); // 4 sec
}

window.onload = ()=>{
  const spans = document.querySelectorAll(".our-journey-about-page-timeline-years span");
  changeYear(2025, spans[years.length - 1]);
  autoTimer = setInterval(autoSlide, 4000);
};
</script>
@include('website.contact-form')
@endsection
