@extends('website.layout.app')
@section('content')

    <section class="hero page-hero">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="{{ asset('website1/video/home_banner_video.mp4') }}" type="video/mp4">
        </video>
        <div class="overlay"></div>
        <div class="hero-content">

            @php
                $title = trim($homeBanner->title ?? '');

                if ($title === '') {
                    $title = 'Build AI-Powered Digital Products That Scale';
                }

                $words = explode(' ', $title);
            @endphp

            <h1>
                {{ $words[0] }}

                @if(count($words) > 1)
                    <span>
                        {{ $words[1] }}
                        @if(count($words) > 2)
                            {{ ' ' . $words[2] }}
                        @endif
                    </span>
                @endif

                @if(count($words) > 3)
                    {{ ' ' . implode(' ', array_slice($words, 3)) }}
                @endif
            </h1>


            {{-- <ul class="stats">
                <li>✔ Trusted by 500+ Global Brands</li>
                <li>✔ $200M+ Client Value Delivered</li>
                <li>✔ 12+ Years of Innovation</li>
            </ul> --}}
            @php
                $bannerData = is_string($homeBanner->detais)
                    ? json_decode($homeBanner->detais, true)
                    : $homeBanner->detais;
            @endphp

            @if(!empty($bannerData))
                <ul class="stats">
                    @foreach($bannerData as $item)
                        @if(!empty($item['titles']))
                            <li>✔ {{ preg_replace('/\d+$/', '', $item['titles']) }}</li>
                        @endif
                    @endforeach
                </ul>
            @endif

            <!-- <div class="btn-wrap">
                <a class="btn primary">Book an Enterprise Strategy Call</a>
                <a class="btn secondary">Get My Project Estimate</a>
            </div> -->
            <div class="btn-wrap">
                <a class="btn primary open-popup">Book an Enterprise Strategy Call</a>
                <a class="btn secondary open-popup">Get My Project Estimate</a>
            </div>

        </div>
    </section>

    <section class="trusted">

        <div class="trusted-wrap">
            @if(count($trustedByList) > 0)
            <div class="trusted-badge">Trusted by</div>

            <div class="logo-slider">
                <div class="logos">
                    @foreach ($trustedByList as $trustedBy)

                    <div class="logo-box"><img src="{{ asset($trustedBy->image ?? 'notImage.jpg') }}" alt="{{ $trustedBy->name ?? '' }}"></div>
                    @endforeach
                </div>
            </div>
            @endif


        </div>

    </section>

    <main class="main-page-wrapper">
        <section class="inf-hero">
            <div class="inf-hero-container">
                <div class="inf-hero-grid">

                    <!-- LEFT -->
                    <div class="inf-hero-content">
                        <h6 class="inf-hero-eyebrow">We Are Your Turnkey Partners In</h6>

                        <h1 class="inf-hero-title">{{ $trunkeyPartner->title ?? 'AI DISRUPTION' }}</h1>

                        <p class="inf-hero-text">
                            {{ $trunkeyPartner->short_description ?? '' }}
                        </p>

                        <div class="inf-hero-wide-img">
                            <img src="{{ asset($trunkeyPartner->image_one ?? 'notImage.jpg') }}" alt="Team">
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="inf-hero-video">
                        <video autoplay muted loop playsinline>
                            <source src="https://media.apptunix.com/wp-content/uploads/2025/12/03064758/website.mp4"
                                type="video/mp4">
                        </video>
                    </div>

                </div>
            </div>
        </section>
        <!-- close about Area -->


        <!-- trusted client section start       -->

        <section class="homepage-statssection-stats mt-4">

            <div class="homepage-stat-card">
                <h2>{{ $excellanceCounting->industry_count ?? '1'}}+</h2>
                <p>Industry Excellence</p>
            </div>

            <div class="homepage-stat-card">
                <h2>{{ $excellanceCounting->empowered_count ?? '1' }}+</h2>
                <p>Empowered Clients</p>
            </div>

            <div class="homepage-stat-card">
                <h2>{{ $excellanceCounting->coutries_count ?? '1' }}+</h2>
                <p>Countries Served</p>
            </div>

            <div class="homepage-stat-card">
                <h2>{{ $excellanceCounting->teach_engineer_count ?? '1' }}+</h2>
                <p>Tech Engineers</p>
            </div>

            <div class="homepage-stat-card">
                <h2>{{ $excellanceCounting->digital_solution_count ?? '1' }}+</h2>
                <p>Digital Solutions Launched</p>
            </div>

        </section>
        <!-- trusted client section start   end    -->

        <!-- Start Client Area -->
        <section class="tab-section">
            @if(count($technologyUsedList) > 0)
            <!-- LEFT SIDE -->
            <div class="tabs">
                {{-- <div class="tabs"> --}}
                @foreach($technologyUsedList as $index => $tech)
                    <div class="tab {{ $index === 0 ? 'active' : '' }}"
                        data-tab="tab-{{ $index }}">
                        <span>{{ $tech['name'] }}</span>
                        <span class="arrow">➜</span>
                    </div>
                @endforeach
                {{-- </div> --}}
                {{-- <div class="tab active" data-tab="microsoft">
                    <img src="https://cdn-icons-png.flaticon.com/512/732/732221.png">
                    <span>Microsoft</span>
                    <span class="arrow">➜</span>
                </div>

                <div class="tab" data-tab="database">
                    <img src="https://cdn-icons-png.flaticon.com/512/4248/4248443.png">
                    <span>Database</span>
                    <span class="arrow">➜</span>
                </div>

                <div class="tab" data-tab="bigdata">
                    <img src="https://cdn-icons-png.flaticon.com/512/2933/2933245.png">
                    <span>Big Data</span>
                    <span class="arrow">➜</span>
                </div>

                <div class="tab" data-tab="frontend">
                    <img src="https://cdn-icons-png.flaticon.com/512/919/919827.png">
                    <span>Frontend</span>
                    <span class="arrow">➜</span>
                </div>

                <div class="tab" data-tab="backend">
                    <img src="https://cdn-icons-png.flaticon.com/512/2721/2721295.png">
                    <span>Backend</span>
                    <span class="arrow">➜</span>
                </div>

                <div class="tab" data-tab="devops">
                    <img src="https://cdn-icons-png.flaticon.com/512/906/906324.png">
                    <span>DevOps</span>
                    <span class="arrow">➜</span>
                </div> --}}

            </div>
{{-- @dd($technologyUsedList) --}}
            <!-- RIGHT SIDE -->
            <div class="tab-content">
                @foreach($technologyUsedList as $index => $tech)

                    @php
                        $images = [];
                        if (!empty($tech['images'])) {
                            $images = is_string($tech['images'])
                                ? json_decode($tech['images'], true)
                                : $tech['images'];
                        }
                    @endphp

                    <div class="content {{ $index === 0 ? 'active' : '' }}"
                        id="tab-{{ $index }}">

                        @foreach($images as $img)
                            <div class="card">
                                <img src="{{ asset($img) }}" alt="{{ $tech['name'] }}">
                            </div>
                        @endforeach

                    </div>

                @endforeach
                </div>


            @endif
        </section>
        <!-- End client section -->

    <section class="case-section">
        <div class="container" style="margin-top: -36px;">

            <div class="case-top">
                <div class="case-title">
                    <h1>
                        Inspiring the Next, Powered By <br>
                        <span>Our People and Precision</span>
                    </h1>
                </div>

                <div class="case-actions">
                    <!-- <button class="btn-outline" data-tab="tech-tab">Skip</button> -->
                    <a href="#tech-tab" class="btn-outline">Skip</a>
                    <button class="btn-primary">View all case studies →</button>
                </div>
            </div>
            <!-- Tabs -->
            @if(count($ourPeopleList) > 0)
            <div class="case-tabs">
                @foreach ($ourPeopleList as $index => $ourPeople)
                    <button class="tab-features {{ $index === 0 ? 'active' : '' }}" data-tab="features{{ $ourPeople->id }}">{{ $ourPeople->name ?? '' }}</button>
                @endforeach
            </div>
            @endif
            <!-- Content -->
            <div class="case-content">
                @foreach ($ourPeopleList as $index => $ourPeople1)
                    <!-- ITEM -->
                    <div class="case-item {{ $index === 0 ? 'active' : '' }}" id="features{{ $ourPeople1->id }}"
                        style="background-image:url({{ asset($ourPeople1->image ?? 'notImage.jpg') }})">
                        <div class="case-overlay">
                            <h3>{{ $ourPeople1->title ?? '' }}</h3>
                            <p>{{ $ourPeople1->sub_title ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @if(count($craftingTechnologyList) > 0)
        <section class="mt-4" id="tech-tab">
            <!-- tech wrapper  -->
            <div class="tech-wrapper" >
                <h2>Crafting Solutions with Technology<br /> that Works For You</h2>
                <div class="tech-slider">
                @foreach ($craftingTechnologyList as $craftingTechnology)
                    <div class="tech-card">
                        <img src="{{ asset($craftingTechnology->image ?? 'notImage.jpg') }}">
                        <h3>{{ $craftingTechnology->name ?? '' }}</h3>
                        <p>{{ $craftingTechnology->title ?? '' }}</p>
                    </div>
                @endforeach
                </div>

            </div>
            <!-- tech wrapper end  -->
        </section>
    @endif

        <!-- home below banner start two -->
        <div class="home-below-banner-carousel-two">
            <section class="hero-banner-two">
                <div class="hero-content-two">
                    <h1>
                        We’ve Built Some of the Most-Loved<br>
                        Software and Mobile Apps in the World
                    </h1>

                    <a href="#" class="hero-btn">
                        Let’s Work Together
                        <span>➜</span>
                    </a>

                </div>
            </section>

        </div>
        <!-- home below banner two end  -->
        <!-- Start Service Area -->
        <!-- <div class="rn-service-area rn-section-pga section-separator" id="features"> -->

        <!-- End Service Area  -->

        <style>
            /* SECTION */
            .navy-services {
                background: linear-gradient(180deg, #05132b, #071c3e);
                padding: 80px 0 60px;
            }

            /* HEADING */
            .navy-services__heading h2 {
                color: #fff;
                font-size: 32px;
                line-height: 1.25;
                margin-bottom: 45px;
            }

            /* GRID */
            .navy-services__grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
            }

            /* CARD */
            .navy-service-card {
                background: rgba(255, 255, 255, 0.06);
                border-radius: 16px;
                padding: 26px 22px;
                border: 1px solid rgba(255, 255, 255, 0.08);

                transition: 0.35s ease;
                position: relative;
                overflow: hidden;
            }

            /* ICON */
            .navy-service-card i {
                width: 22px;
                height: 22px;
                color: #ffffff;
                margin-bottom: 16px;
            }

            /* TITLE */
            .navy-service-card h5 {
                font-size: 18px;
                color: #ffffff;
                margin-bottom: 10px;
            }

            /* TEXT */
            .navy-service-card p {
                font-size: 14px;
                color: rgba(255, 255, 255, 0.75);
                line-height: 1.5;
            }

            /* ARROW */
            .navy-arrow {
                display: inline-block;
                margin-top: 16px;
                font-size: 18px;
                color: #ffffff;
                transition: 0.3s;
            }

            /* HOVER */
            .navy-service-card:hover {
                transform: translateY(-6px);
                background: rgba(255, 255, 255, 0.1);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
            }

            .navy-service-card:hover .navy-arrow {
                transform: translateX(6px);
            }

            /* RESPONSIVE */
            @media(max-width: 991px) {
                .navy-services__grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media(max-width: 576px) {
                .navy-services__grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        <section class="navy-services" id="features">
            <div class="container">

                <div class="navy-services__heading">
                    <h2>
                        Empower Your Journey In the Digital World<br>
                        with Services You Can Trust
                    </h2>
                </div>

                <div class="navy-services__grid">

                    <!-- Card -->
                    <div class="navy-service-card">
                        <i data-feather="menu"></i>
                        <h5>Business Strategy</h5>
                        <p>I throw myself down among the tall grass by the stream.</p>
                        <span class="navy-arrow">→</span>
                    </div>

                    <div class="navy-service-card">
                        <i data-feather="book-open"></i>
                        <h5>App Development</h5>
                        <p>It uses a dictionary of over 200 Latin words.</p>
                        <span class="navy-arrow">→</span>
                    </div>

                    <div class="navy-service-card">
                        <i data-feather="tv"></i>
                        <h5>App Development</h5>
                        <p>I throw myself down among the tall grass.</p>
                        <span class="navy-arrow">→</span>
                    </div>

                    <div class="navy-service-card">
                        <i data-feather="twitch"></i>
                        <h5>Mobile App</h5>
                        <p>There are many variations of passages available.</p>
                        <span class="navy-arrow">→</span>
                    </div>

                    <div class="navy-service-card">
                        <i data-feather="wifi"></i>
                        <h5>CEO Marketing</h5>
                        <p>Always free from repetition and injected humour.</p>
                        <span class="navy-arrow">→</span>
                    </div>

                    <div class="navy-service-card">
                        <i data-feather="slack"></i>
                        <h5>Personal Portfolio</h5>
                        <p>Combined with a handful of model sentences.</p>
                        <span class="navy-arrow">→</span>
                    </div>

                </div>
            </div>
        </section>


        <!-- ================= SLIDER START ================= -->

        <!-- ================= SLIDER END ================= -->

        <!-- ================= POPUP ================= -->

        <div class="homepage-testimonial-popup">
            <div class="homepage-testimonial-popup-content">
                <span class="homepage-testimonial-close">✖</span>
                <video id="homepage-testimonial-video" controls></video>
            </div>
        </div>



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


        <!-- home-below-banner-carousel-one -->
        <div class="home-below-banner-carousel-one">

            <section class="hero-banner-one">
                <div class="hero-content-one">

                    <h1>
                        We’ve Built Some of the Most-Loved<br>
                        Software and Mobile Apps in the World
                    </h1>

                    <a href="#" class="hero-btn">
                        Let’s Work Together
                        <span>➜</span>
                    </a>

                </div>
            </section>

        </div>
        <!-- home-below-banner-carousel-one -->




        <!-- Start Resume Area -->
        <div class="rn-resume-area rn-section-gap section-separator" id="resume">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <!-- <span class="subtitle">7+ Years of Experience</span> -->
                            <h5 class="title">A Seamless Vision that Adapts to Every <br />Industry’s Demands</h5>
                        </div>
                    </div>
                </div>

                <div class="industry-grid  ">
                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Healthcare">
                        </div>
                        <div class="content1">
                            <h4 class="title">Healthcare</h4>
                            <ul class="feature-list">
                                <li>AI in Healthcare</li>
                                <li>Augmented Reality</li>
                                <li>IoMT in Healthcare</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Logistics">
                        </div>
                        <div class="content1">
                            <h4 class="title">Logistics</h4>
                            <ul class="feature-list">
                                <li>AI in Logistics</li>
                                <li>Challenges in Logistics</li>
                                <li>AI in Demand Forecasting</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Gaming">
                        </div>
                        <div class="content1">
                            <h4 class="title">Gaming</h4>
                            <ul class="feature-list">
                                <li>AI in Gaming</li>
                                <li>Game Streaming</li>
                                <li>Generative AI in Gaming</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Fintech">
                        </div>
                        <div class="content1">
                            <h4 class="title">Fintech</h4>
                            <ul class="feature-list">
                                <li>AI in Fintech</li>
                                <li>Cybersecurity in Fintech</li>
                                <li>Blockchain in Fintech</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Retail">
                        </div>
                        <div class="content1">
                            <h4 class="title">Retail</h4>
                            <ul class="feature-list">
                                <li>IoT in Retail</li>
                                <li>Data Analytics</li>
                                <li>Inventory Management</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Retail">
                        </div>
                        <div class="content1">
                            <h4 class="title">Retail</h4>
                            <ul class="feature-list">
                                <li>IoT in Retail</li>
                                <li>Data Analytics</li>
                                <li>Inventory Management</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Retail">
                        </div>
                        <div class="content1">
                            <h4 class="title">Retail</h4>
                            <ul class="feature-list">
                                <li>IoT in Retail</li>
                                <li>Data Analytics</li>
                                <li>Inventory Management</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="assets/images/portfolio/portfolio-01.jpg" alt="Retail">
                        </div>
                        <div class="content1">
                            <h4 class="title">Retail</h4>
                            <ul class="feature-list">
                                <li>IoT in Retail</li>
                                <li>Data Analytics</li>
                                <li>Inventory Management</li>
                            </ul>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Resume Area -->



        <!-- why area section start  -->

        <section class="why-area  rn-section-gap ">
            <h2>Why Businesses Choose Apptunix for AI Transformation?</h2>
            <div class="why-grid">

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-users"></i></div>
                    <h3>Expert Team of AI Engineers</h3>
                    <p>Our in-house AI specialists craft custom software solutions and intelligent systems tailored to
                        your business requirements and objectives.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-lightbulb"></i></div>
                    <h3>Scalable Solutions</h3>
                    <p>From startups to global enterprises, our AI-powered solutions grow with your business, ensuring
                        smooth performance at each stage.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-shield-heart"></i></div>
                    <h3>Reliable Data & Insights</h3>
                    <p>From startups to global enterprises, our AI-powered solutions grow with your business, ensuring
                        smooth performance at each stage.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-microchip"></i></div>
                    <h3>AI Security & Compliance</h3>
                    <p>Your trust is our top priority. Our AI smart solutions are built on enterprise-grade security and
                        global compliance standards.</p>
                </div>

            </div>
        </section>
        <!-- why section end  -->



        <style>
           .navy-testimonial-slider{
                padding: 100px 20px;
                background: linear-gradient(180deg,#05142e,#071c3e);
                }

                /* Header */
                .navy-testimonial-header{
                display:flex;
                justify-content:space-between;
                align-items:center;
                margin-bottom:40px;
                }

                .navy-testimonial-header h2{
                color:#fff;
                font-size:32px;
                }

                /* Controls */
                .navy-slider-controls button{
                width:42px;
                height:42px;
                border-radius:50%;
                border:1px solid rgba(255,255,255,.2);
                background:rgba(255,255,255,.08);
                color:#fff;
                font-size:22px;
                cursor:pointer;
                transition:.3s;
                }

                .navy-slider-controls button:hover{
                background:#fff;
                color:#05142e;
                }

                /* Slider */
                .navy-slider-viewport{
                overflow:visible;
                }

                .navy-slider-track{
                display:flex;
                gap:24px;
                transition:transform .5s ease;
                }

                /* Card */
                .navy-testimonial-card{
                min-width: calc(33.333% - 16px);
                background:rgba(255,255,255,.06);
                border:1px solid rgba(255,255,255,.08);
                border-radius:18px;
                padding:16px;
                text-align:center;
                position:relative;
                transition:.3s;
                cursor: pointer;
                }

                .navy-testimonial-card:hover{
                transform:translateY(-6px);
                background:rgba(255,255,255,.1);
                }

                .navy-testimonial-card img{
                width:100%;
                height:200px;
                object-fit:cover;
                border-radius:14px;
                }

                .navy-testimonial-card .play{
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                width:54px;
                height:54px;
                background:rgba(0,0,0,.55);
                color:#fff;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                pointer-events: none;
                }

                .navy-testimonial-card h3{
                margin-top:14px;
                color:#fff;
                font-size:17px;
                }

                .navy-testimonial-card p{
                font-size:13px;
                color:rgba(255,255,255,.7);
                }

                /* Responsive */
                @media(max-width:900px){
                .navy-testimonial-card{
                    min-width: calc(50% - 12px);
                    cursor: pointer;
                }
                }

                @media(max-width:600px){
                .navy-testimonial-card{
                    min-width:100%;
                    cursor: pointer;
                }
                }
.navy-video-modal{
  position: fixed;
  inset: 0;
  z-index: 99999;
  display: none;
  align-items: center;
  justify-content: center;
}

.navy-video-modal__overlay{
  position: absolute;
  inset: 0;
  background: rgba(255,255,255,0.75);
  backdrop-filter: blur(12px);
}

.navy-video-modal__content{
  position: relative;
  width: 80%;
  max-width: 900px;
  background: #000;
  border-radius: 18px;
  overflow: hidden;
  box-shadow: 0 40px 90px rgba(0,0,0,0.45);
  z-index: 2;
}

.navy-video-modal video{
  width: 100%;
  height: auto;
  display: block;
}
.navy-video-modal__close{
  position: absolute;
  top: 12px;
  right: 12px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  border: none;
  background: rgba(255,255,255,0.15);
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  z-index: 3;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.25s;
}

.navy-video-modal__close:hover{
  background: #ffffff;
  color: #000;
}

        </style>
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

        <!-- home cert section start  -->
        <section class="home-cert-section  rn-section-gap">

            <div class="container">
                <h2> Industry Standard Certified Software <br />and Mobile App Development Company </h2>
                <div class="row justify-content-center aws">

                    <div class="col-md-2 col-6 home-cert-box">
                        <div class="home-cert-card">
                            <img src="./assets/images/aws1_icon.png">
                            <h4>AWS</h4>
                            <p>Solution Architect,<br>Associate</p>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 home-cert-box">
                        <div class="home-cert-card">
                            <img src="./assets/images/aws1_icon.png">
                            <h4>AWS</h4>
                            <p>Security,<br>Speciality</p>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 home-cert-box">
                        <div class="home-cert-card">
                            <img src="./assets/images/aws1_icon.png">
                            <h4>Microsoft</h4>
                            <p>Dynamic 365<br>Fundamentals</p>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 home-cert-box">
                        <div class="home-cert-card">
                            <img src="./assets/images/aws1_icon.png">
                            <h4>Microsoft</h4>
                            <p>Associate</p>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 home-cert-box">
                        <div class="home-cert-card">
                            <img src="./assets/images/aws1_icon.png">
                            <h4>AWS</h4>
                            <p>Developer<br>Associate</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- home cert section end  -->

<style>
    /* Blog Theme */
.navy-blog {
    background: #0a2540;
}

.section-title .subtitle {
    color: #ffffff !important;
    letter-spacing: 1px;
    font-weight: 500;
    font-size: 35px !important;
}

.section-title .title {
    color: #ffffff;
}

/* Blog Card */
.smart-blog-card {
    background: #081c33;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.smart-blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(59, 130, 246, 0.3);
}

/* Thumbnail */
.smart-blog-card .thumbnail {
    position: relative;
    overflow: hidden;
}

.smart-blog-card img {
    width: 100%;
    transition: transform 0.5s ease;
}

.smart-blog-card:hover img {
    transform: scale(1.08);
}

/* Tag */
.smart-blog-card .tag {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #1e3a8a;
    color: #fff;
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 12px;
}

/* Content */
.smart-blog-card .content {
    padding: 25px;
}

.smart-blog-card .meta {
    color: #9ca3af;
    font-size: 14px;
    margin-bottom: 10px;
}

.smart-blog-card .title {
    color: #ffffff;
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 20px;
}

/* Read More */
.smart-blog-card .read-more {
    color: #3b82f6;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
}

.smart-blog-card .read-more:hover {
    color: #60a5fa;
    gap: 10px;
}

    </style>
        <!-- Start News Area -->
        <div class="rn-blog-area rn-section-gap section-separator navy-blog" id="blog">
            <div class="container" style=" margin-top: -35px;">
                <div class="row " style=" margin-bottom: 30px;">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="700"
                            class="section-title text-center">
                            <span class="subtitle">Insights & Articles</span>
                            <!-- <h2 class="title">My Blog</h2> -->
                        </div>
                    </div>
                </div>

                <div class="row row--25 mt--30">

                    <!-- Blog Card -->
                    <div class="col-lg-4 col-md-6 mt--30" data-aos="fade-up" data-aos-delay="100">
                        <div class="rn-blog smart-blog-card">
                            <div class="thumbnail">
                                <img src="assets/images/blog/blog-01.jpg" alt="Blog Image">
                                <span class="tag">Canada</span>
                            </div>
                            <div class="content">
                                <div class="meta">
                                    <i class="feather-clock"></i> 2 min read
                                </div>
                                <h4 class="title">
                                    T-shirt design is the part of modern branding
                                </h4>
                                <a href="#" class="read-more">
                                    Read More <i class="feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Card -->
                    <div class="col-lg-4 col-md-6 mt--30" data-aos="fade-up" data-aos-delay="200">
                        <div class="rn-blog smart-blog-card">
                            <div class="thumbnail">
                                <img src="assets/images/blog/blog-02.jpg" alt="Blog Image">
                                <span class="tag">Development</span>
                            </div>
                            <div class="content">
                                <div class="meta">
                                    <i class="feather-clock"></i> 2 hour read
                                </div>
                                <h4 class="title">
                                    Services that elevate your digital product
                                </h4>
                                <a href="#" class="read-more">
                                    Read More <i class="feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Card -->
                    <div class="col-lg-4 col-md-6 mt--30" data-aos="fade-up" data-aos-delay="300">
                        <div class="rn-blog smart-blog-card">
                            <div class="thumbnail">
                                <img src="assets/images/blog/blog-03.jpg" alt="Blog Image">
                                <span class="tag">Application</span>
                            </div>
                            <div class="content">
                                <div class="meta">
                                    <i class="feather-clock"></i> 5 min read
                                </div>
                                <h4 class="title">
                                    Mobile app landing & long-term maintenance
                                </h4>
                                <a href="#" class="read-more">
                                    Read More <i class="feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ENd Mews Area -->


        <!-- faq section start  -->
        <div class="faq-top-section" style=" margin-top: 35px;" >
            <h2 class="mt-2">Turning Your Questions into Confidence</h2>
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


        <!-- consult-section-start  -->
        <section class="consult-section">
            <div class="consult-wrapper">

                <!-- LEFT SIDE -->
                <div class="left-consult">
                    <p class="tag">
                        Partner with tech catalysts who transform ideas into impact.
                    </p>

                    <p class="sub-tag">Book your free consultation with us.</p>

                    <h1>Let’s Talk!</h1>

                    <div class="country-slider">
                        <div class="country-track">

                            <div class="country active">
                                <h3>UNITED ARAB EMIRATES</h3>
                                <p>One Central, The Offices 3, Level 3,</p>
                                <p>DWTC, Sheikh Zayed Road, Dubai</p>
                                <p>+971 50 782 1690</p>
                            </div>

                            <div class="country">
                                <h3>UNITED STATES</h3>
                                <p>42 Broadway, New York, NY 10004</p>
                                <p>+1 (512) 872 3364</p>
                            </div>

                            <div class="country">
                                <h3>UNITED KINGDOM</h3>
                                <p>Covent Garden, London WC2H 9JQ</p>
                                <p>+44 20 7183 9424</p>
                            </div>

                        </div>

                        <div class="nav">
                            <button class="prev">←</button>
                            <button class="next">→</button>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE -->
                <div class="right-consult">
                    <div class="form-box">
                        <h2>Speak With Our Experts</h2>

                        <form>
                            <input type="text" placeholder="Full Name">
                            <input type="text" placeholder="+91  Mobile Number">
                            <input type="email" placeholder="Business Email">

                            <select>
                                <option>When do you want to launch a solution?</option>
                                <option>Immediately</option>
                                <option>1–3 Months</option>
                                <option>3–6 Months</option>
                            </select>

                            <textarea placeholder="About Project"></textarea>

                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!-- Modal Portfolio Body area Start -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">

                            <div class="col-lg-6">
                                <div class="portfolio-popup-thumbnail">
                                    <div class="image">
                                        <img class="w-100" src="assets/images/portfolio/portfolio-04.jpg" alt="slide">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="text-content">
                                    <h3>
                                        <span>Featured - Design</span> App Design Development.
                                    </h3>
                                    <p class="mb--30">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Cupiditate distinctio assumenda explicabo veniam temporibus eligendi.
                                    </p>
                                    <p>Consectetur adipisicing elit. Cupiditate distinctio assumenda. dolorum
                                        alias suscipit rerum maiores aliquam earum odit, nihil culpa quas iusto
                                        hic minus!</p>
                                    <div class="button-group mt--20">
                                        <a href="#" class="rn-btn thumbs-icon">
                                            <span>LIKE THIS</span>
                                            <i data-feather="thumbs-up"></i>
                                        </a>
                                        <a href="#" class="rn-btn">
                                            <span>VIEW PROJECT</span>
                                            <i data-feather="chevron-right"></i>
                                        </a>
                                    </div>

                                </div>
                                <!-- End of .text-content -->
                            </div>
                        </div>
                        <!-- End of .row Body-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Portfolio area -->


        <!-- Modal Blog Body area Start -->
        <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-news" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>

                    <!-- End of .modal-header -->

                    <div class="modal-body">
                        <img src="assets/images/blog/blog-big-01.jpg" alt="news modal" class="img-fluid modal-feat-img">
                        <div class="news-details">
                            <span class="date">2 May, 2021</span>
                            <h2 class="title">Digital Marketo to Their New Office.</h2>
                            <p>Nobis eleifend option congue nihil imperdiet doming id quod mazim placerat
                                facer
                                possim assum.
                                Typi non
                                habent claritatem insitam; est usus legentis in iis qui facit eorum
                                claritatem.
                                Investigationes
                                demonstraverunt
                                lectores legere me lius quod ii legunt saepius. Claritas est etiam processus
                                dynamicus, qui
                                sequitur
                                mutationem consuetudium lectorum.</p>
                            <h4>Nobis eleifend option conguenes.</h4>
                            <p>Mauris tempor, orci id pellentesque convallis, massa mi congue eros, sed
                                posuere
                                massa nunc quis
                                dui.
                                Integer ornare varius mi, in vehicula orci scelerisque sed. Fusce a massa
                                nisi.
                                Curabitur sit
                                amet
                                suscipit nisl. Sed eget nisl laoreet, suscipit enim nec, viverra eros. Nunc
                                imperdiet risus
                                leo,
                                in rutrum erat dignissim id.</p>
                            <p>Ut rhoncus vestibulum facilisis. Duis et lorem vitae ligula cursus venenatis.
                                Class aptent
                                taciti sociosqu
                                ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc vitae
                                nisi
                                tortor. Morbi
                                leo
                                nulla, posuere vel lectus a, egestas posuere lacus. Fusce eleifend hendrerit
                                bibendum. Morbi
                                nec
                                efficitur ex.</p>
                            <h4>Mauris tempor, orci id pellentesque.</h4>
                            <p>Nulla non ligula vel nisi blandit egestas vel eget leo. Praesent fringilla
                                dapibus dignissim.
                                Pellentesque
                                quis quam enim. Vestibulum ultrices, leo id suscipit efficitur, odio lorem
                                rhoncus dolor, a
                                facilisis
                                neque mi ut ex. Quisque tempor urna a nisi pretium, a pretium massa
                                tristique.
                                Nullam in
                                aliquam
                                diam. Maecenas at nibh gravida, ornare eros non, commodo ligula. Sed
                                efficitur
                                sollicitudin
                                auctor.
                                Quisque nec imperdiet purus, in ornare odio. Quisque odio felis, vestibulum
                                et.</p>
                        </div>

                        <!-- Comment Section Area Start -->
                        <div class="comment-inner">
                            <h3 class="title mb--40 mt--50">Leave a Reply</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group"><input type="text" placeholder="Name">
                                        </div>
                                        <div class="rnform-group"><input type="email" placeholder="Email">
                                        </div>
                                        <div class="rnform-group"><input type="text" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group">
                                            <textarea placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <a class="rn-btn" href="#"><span>SUBMIT NOW</span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Comment Section End -->
                    </div>
                    <!-- End of .modal-body -->
                </div>
            </div>
        </div>
        <!-- End Modal Blog area -->


        <!-- Back to  top Start -->
        <div class="backto-top">
            <div>
                <i data-feather="arrow-up"></i>
            </div>
        </div>
        <!-- Back to top end -->



        <!-- Start Modal Area  -->
        <div class="demo-modal-area">
            <div class="wrapper">
                <div class="close-icon">
                    <button class="demo-close-btn"><span class="feather-x"></span></button>
                </div>
                <div class="rn-modal-inner">
                    <div class="demo-top text-center">
                        <h4 class="title">InBio</h4>
                        <p class="subtitle">Its a personal portfolio template. You can built any personal
                            website easily.</p>
                    </div>
                    <ul class="popuptab-area nav nav-tabs" id="popuptab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active demo-dark" id="demodark-tab" data-bs-toggle="tab" href="#demodark"
                                role="tab" aria-controls="demodark" aria-selected="true">Dark
                                Demo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link demo-light" id="demolight-tab" data-bs-toggle="tab" href="#demolight"
                                role="tab" aria-controls="demolight" aria-selected="false">Light Demo</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="popuptabContent">
                        <div class="tab-pane show active" id="demodark" role="tabpanel" aria-labelledby="demodark-tab">
                            <div class="content">
                                <div class="row">

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index.html">
                                                        <img class="w-100" src="assets/images/demo/main-demo.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index.html">Main Demo</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-technician.html">
                                                        <img class="w-100" src="assets/images/demo/index-technician.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-technician.html">Technician</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-model.html">
                                                        <img class="w-100" src="assets/images/demo/home-model-v2.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-model.html">Model</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-consulting.html">
                                                        <img class="w-100" src="assets/images/demo/home-consulting.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-consulting.html">Consulting</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="fashion-designer.html">
                                                        <img class="w-100" src="assets/images/demo/fashion-designer.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="fashion-designer.html">Fashion
                                                            Designer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-developer.html">
                                                        <img class="w-100" src="assets/images/demo/developer.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-developer.html">Developer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="instructor-fitness.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/instructor-fitness.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="instructor-fitness.html">Fitness
                                                            Instructor</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->
                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-web-Developer.html">
                                                        <img class="w-100" src="assets/images/demo/home-model.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-web-Developer.html">Web
                                                            Developer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-designer.html">
                                                        <img class="w-100" src="assets/images/demo/home-video.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-designer.html">Designer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-content-writer.html">
                                                        <img class="w-100" src="assets/images/demo/text-rotet.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-content-writer.html">Content
                                                            Writter</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-instructor.html">
                                                        <img class="w-100" src="assets/images/demo/index-boxed.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-instructor.html">Instructor</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-freelancer.html">
                                                        <img class="w-100" src="assets/images/demo/home-sticky.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-freelancer.html">Freelancer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-photographer.html">
                                                        <img class="w-100" src="assets/images/demo/index-bg-image.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-photographer.html">Photographer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-politician.html">
                                                        <img class="w-100" src="assets/images/demo/front-end.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-politician.html">Politician</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo coming-soon">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="#">
                                                        <img class="w-100" src="assets/images/demo/coming-soon.png"
                                                            alt="Personal Portfolio">
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="#">Accountant</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="demolight" role="tabpanel" aria-labelledby="demolight-tab">
                            <div class="content">
                                <div class="row">

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/main-demo-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-white-version.html">Main
                                                            Demo</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-technician-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/index-technician-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="index-technician-white-version.html">Technician</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-model-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/home-model-v2-white.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-model-white-version.html">Model</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-consulting-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/home-consulting-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="home-consulting-white-version.html">Consulting</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="fashion-designer-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/fashion-designer-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="fashion-designer-white-version.html">Fashion
                                                            Designer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-developer-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/developer-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="index-developer-white-version.html">Developer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->
                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="instructor-fitness-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/instructor-fitness-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="instructor-fitness-white-version.html">Fitness
                                                            Instructor</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->
                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-web-developer-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/home-model-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="home-web-developer-white-version.html">Web
                                                            Developer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-designer-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/home-video-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="home-designer-white-version.html">Designer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-content-writer-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/text-rotet-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="home-content-writer-white-version.html">Content
                                                            Writter</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-instructor-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/index-boxed-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="home-instructor-white-version.html">Instructor</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-freelancer-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/home-sticky-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="home-freelancer-white-version.html">Freelancer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-photographer-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/index-bg-image-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="home-photographer-white-version.html">Photographer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-politician-white-version.html">
                                                        <img class="w-100"
                                                            src="assets/images/demo/front-end-white-version.png"
                                                            alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                            <span class="overlay-text">View Demo <i
                                                                    class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a
                                                            href="index-politician-white-version.html">Politician</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo coming-soon">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="#">
                                                        <img class="w-100" src="assets/images/demo/coming-soon.png"
                                                            alt="Personal Portfolio">
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="#">Accountant</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Area  -->





        <div class="navy-video-modal" id="navyVideoModal">
            <div class="navy-video-modal__overlay"></div>

            <div class="navy-video-modal__content">
                <button class="navy-video-modal__close" aria-label="Close">✕</button>
                <video id="navyModalVideo" controls autoplay></video>
            </div>
        </div>

    </main>
@endsection
