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

            </div>
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

        @if(count($ourJourneyList) > 0)
            <section class="navy-services" id="features">
                <div class="container">

                    <div class="navy-services__heading">
                        <h2>
                            Empower Your Journey In the Digital World<br>
                            with Services You Can Trust
                        </h2>
                    </div>

                    <div class="navy-services__grid">
                        @foreach ($ourJourneyList as $ourJourney)
                            <div class="navy-service-card">
                                <i data-feather="menu"></i>
                                <h5>{{ $ourJourney->title ?? '' }}</h5>
                                <p>{{ $ourJourney->sub_title ?? '' }}</p>
                                <span class="navy-arrow">→</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

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



        @if(count($industryList) > 0)
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
                    @foreach ($industryList as $industryData)

                    <div class="industry-card">
                        <div class="thumbnail">
                            <img src="{{ asset($industryData->image ?? 'notImage.jpg') }}" alt="{{$industryData->title ?? ''}}">
                        </div>
                        <div class="content1">
                            <h4 class="title">{{$industryData->title ?? ''}}</h4>
                            {{-- <ul class="feature-list">
                                <li>AI in Healthcare</li>
                                <li>Augmented Reality</li>
                                <li>IoMT in Healthcare</li>
                            </ul> --}}
                            <div class="feature-list sub-description">
                                {!! nl2br(e($industryData->short_description ?? '')) !!}
                            </div>
                            <div class="card-overlay">
                                <a href="#" class="explore-btn">Explore →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- End Resume Area -->
        @endif


        <!-- why area section start  -->
        @if($whyBusinessChoose->status == 1)
        <section class="why-area  rn-section-gap ">
            <h2>Why Businesses Choose Infiniti for AI Transformation?</h2>
            <div class="why-grid">

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-users"></i></div>
                    <h3>{{ $whyBusinessChoose->ai_title?? '' }}</h3>
                    <p>{{ $whyBusinessChoose->ai_description ?? '' }}</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-lightbulb"></i></div>
                    <h3>{{ $whyBusinessChoose->scalable_title ?? '' }}</h3>
                    <p>{{ $whyBusinessChoose->scalable_description ?? '' }}</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-shield-heart"></i></div>
                    <h3>{{ $whyBusinessChoose->reliable_title ?? '' }}</h3>
                    <p>{{ $whyBusinessChoose->reliable_description ?? '' }}</p>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-microchip"></i></div>
                    <h3>{{ $whyBusinessChoose->security_title ?? '' }}</h3>
                    <p>{{ $whyBusinessChoose->security_description ?? '' }}</p>
                </div>

            </div>
        </section>
        <!-- why section end  -->
        @endif

    @if(count($testimonials) > 0)
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
                <div class="navy-testimonial-card" data-video="{{ asset($testimonial->video_path ?? 'notImage.jpg') }}">
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

        </section>
    @endif
        <!-- home cert section start  -->
        @if(count($certificateSoftwareList) > 0)
        <section class="home-cert-section  rn-section-gap">

            <div class="container">
                <h2> Industry Standard Certified Software <br />and Mobile App Development Company </h2>
                <div class="row justify-content-center aws">
                    @foreach ($certificateSoftwareList as $certificateSoftware)
                        <div class="col-md-2 col-6 home-cert-box">
                            <div class="home-cert-card">
                                <img src="{{ asset($certificateSoftware->image ?? 'notImage.jpg') }}">
                                <h4>{{ $certificateSoftware->name ?? '' }}</h4>
                                <p>{{ $certificateSoftware->sub_title ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!-- home cert section end  -->

        <!-- Start News Area -->
        @if(count($blogsList) > 0)
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
                    @foreach ($blogsList as $key => $blogsData)
                        <div class="col-lg-4 col-md-6 mt--30" data-aos="fade-up" data-aos-delay="{{ $key+1 }}*100">
                            <div class="rn-blog smart-blog-card">
                                <div class="thumbnail">
                                    <img src="{{ asset($blogsData->image ?? 'notImage.jpg') }}" alt="Blog Image">
                                    <span class="tag">{{ optional($blogsData->category)->name }}</span>
                                </div>
                                <div class="content">
                                    <div class="meta">
                                        <i class="feather-clock"></i> 2 min read
                                    </div>
                                    <h4 class="title">
                                        {{ $blogsData->title ?? '' }}
                                    </h4>
                                    <a href="{{ $blogsData->seo_slug ?? '' }}" class="read-more">
                                        Read More <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endif
        <!-- ENd Mews Area -->


        <!-- faq section start  -->
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
        <!-- faq section end  -->


        <!-- consult-section-start  -->
        @include('website.contact-form')

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
