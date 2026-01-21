@extends('website.layout.app')
@section('content')

        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <img src="{{asset($pageBanner->image ?? '#')}}" class="img-fluid w-100" loading="lazy" alt="Image2">
                <div class="carousel-caption carousel-caption-two">
                    <div class="container">
                        <div class="row gy-0 gx-5 banner-carousel-text-two">
                            <div class="col-xl-7 col-lg-7 animated fadeInRight">
                                <div class="text-sm-center text-md-start">
                                    <h5 class="text-primary fw-bold mb-2">{{$homeBanner->title ?? ''}}
                                    </h5>
                                    <h2 class="text-bold text-uppercase text-white mb-xl-2 mb-3">
                                        {{$homeBanner->subtitle ?? ''}}
                                    </h2>
                                    <p class="mb-xl-2 mb-4 fs-6 d-grid banner-text">
                                        @foreach($homeBannerDetails as $key => $homeBannerDetail)
                                            <i class="bi bi-check2-circle text-primary fs-5"></i>
                                            <span class="text-start">
                                                {{ $homeBannerDetail->titles ?? ''}}
                                            </span>
                                        @endforeach
                                    </p>
                                    <div
                                        class="d-xl-flex d-lg-flex d-md-block d-sm-block justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                        @if(isset($homeBanner->youtube_link))
                                                <a
                                                    class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2 mb-2 w-xl-0 w-lg-0 w-md-100 w-sm-100"
                                                    href="javascript:void(0)"
                                                    data-youtube-link="{{ $homeBanner->youtube_link ?? '' }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#videoModal"
                                                    onclick="updateVideo(this)">
                                                    <i class="fas fa-play-circle me-2"></i> Watch Video
                                                </a>
                                        @endif
                                        <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2 mb-2 w-xl-0 w-lg-0 w-md-100 w-sm-100" href="{{route('about')}}">Learn
                                            More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5">
                                    <div class="form-container pb-2 pt-2">
                                        <h3 class="form-title">GET YOUR QUESTION</h3>
                                        <p class="form-subtitle">ANSWERED BY OUR IMMIGRATION EXPERT</p>
                                        <form action="{{ route('get-enquery-form') }}" method="post"  class="formSubmit1" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group mt-2">
                                            <input type="text" id="name" placeholder="Your Name" name="name" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" id="email" placeholder="Your Email" name="email" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="phone" placeholder="Your Phone" name="phone" >
                                        </div>
                                        <div class="form-group">
                                            <textarea id="question" placeholder="Your Question" name="question" rows="1"
                                                ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select id="services" name="query_type">
                                                <option value="">Select Type</option>
                                                @foreach($getenquerytypes as $getenquerytype)
                                                <option value="{{$getenquerytype->id ?? ''}}">{{$getenquerytype->name ?? ''}}</option>
                                                <@endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mt-2 rounded-0 loderButton">
                                          <span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>GET YOUR FREE REPORT &
                                            CONSULTATION</button>
                                    </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->

    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="mb-4 fw-bold">{{$ourservicesheader->heading ?? ''}}</h1>
                <p class="mb-0">
                    {{$ourservicesheader->description ?? ''}}
                </p>
            </div>
            <!--  -->
            <div class=" service-carousel owl-carousel owl-theme">
                @foreach ($ourservices as $ourservice)
                <div class="item">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{asset($ourservice->image)}}" class="img-fluid rounded-top w-100 h-100" loading="lazy" alt="Image">
                        </div>
                        <div class="rounded-bottom service-body p-4">
                            <div class="services-text-sec-one">
                                <a href="{{ route('our-services-details',['id' => base64_encode($ourservice->id)]) }}" class="h4 d-inline-block mb-4">{{$ourservice->title ??''}}
                                </a>
                            </div>
                            <div class="services-text-sec-two">
                                <p class="mb-4 scroll-container">
                                    {{$ourservice->description ?? ''}}
                                </p>
                            </div>
                        </div>
                        <div class="service-footer ps-4 mt-3">
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('our-services-details',['id' => base64_encode($ourservice->id)]) }}">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Our Mission Start -->
     <div class="container-fluid our-mission pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-xl-1 order-lg-1 order-md-2 order-2">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center justify-content-center mb-3">
                            <div class="mission-img">
                                <img src="{{asset($ourmissions->image_one ?? '#')}}" class="img-fluid wow fadeInLeft" loading="lazy"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mission-img mission-img-one mb-3">
                                <img src="{{asset($ourmissions->image_two ?? '#')}}" class="img-fluid wow fadeInDown" loading="lazy"/>
                            </div>
                            <div class="mission-img mission-img-two mb-3">
                                <img src="{{asset($ourmissions->image_three ?? '#')}}" class="img-fluid wow fadeInUp" loading="lazy"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-xl-2 order-lg-2 order-md-1 order-1">
                    <div class="our-mission-text text-center mx-auto pb-5 wow fadeInRight" data-wow-delay="0.2s" style="max-width: 800px;">
                        <h4 class="text-primary">Our Mission</h4>
                        <h1 class="fw-bold mb-4">{{$ourmissions->title ?? ''}}</h1>
                        <p class="mb-0">{{$ourmissions->description ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
     </div>
    <!-- Our Mission End -->

    <!-- Video Start -->
    <div class="container-fluid offer-section pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5"  style="max-width: 800px;">
                <h4 class="text-primary">Our Expertise</h4>
                <h1 class="fw-bold mb-4">{{$ourexperties->title ?? ''}} </h1>
                <p class="mb-0">
                    {{$ourexperties->description ??''}}
                </p>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-xl-5" >
                    <div class="nav nav-pills bg-light rounded p-5">
                        @foreach ($ourexpertiesdetails as $key => $ourexpertiesdetail)
                            <a class="accordion-link p-4 {{ $key == 0 ? 'active' : '' }} mb-4" data-bs-toggle="pill" href="#video{{ $ourexpertiesdetail->id ?? '' }}">
                                <h5 class="mb-0">{{ $ourexpertiesdetail->title ?? '' }}</h5>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-7 " >
                    <div class="tab-content">
                        @foreach ($ourexpertiesdetails as $key => $ourexpertiesdetail)
                            <div id="video{{$ourexpertiesdetail->id ?? ''}}" class="tab-pane fade show p-0 {{ $key == 0 ? 'active' : '' }}">
                                <div class="row g-4">
                                    <div class="col-md-12">
                                        <div class="video-container">
                                            <iframe id="videoOne" preload="none" width="100%" height="450"
                                                src="{{$ourexpertiesdetail->video_url ?? '#'}}"
                                                title="YouTube video" style="border-radius: 10px;" frameborder="0"
                                                allow="autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->

    <!-- Empowering Global Careers Start -->
    <div class="container-fluid empowering-global-careers-sec pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center mb-5">
                    <div class="img-sec wow fadeInLeft">
                        <img src="{{asset($empoweringcareers->image ?? '#')}}" class="img-fluid" loading="lazy"/>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="empowering-global-careers-text text-center h-100" >
                        <h4 class="text-primary">Empowering Global Careers</h4>
                        <h1 class="fw-bold mb-4">{{$empoweringcareers->title ?? ''}}</h1>
                        <p class="mb-0">
                            {{$empoweringcareers->description ?? ''}}
                        </p>
                        @foreach ($empoweringcareersdetails as $empoweringcareersdetail)
                            <div class="progress-bar-sec mt-5 w-100">
                                <div class="row">
                                    <!-- Title Section -->
                                    <div class="col-lg-6 col-md-6 col-9 d-flex justify-content-start">
                                        <p>{{ $empoweringcareersdetail->title ?? '' }}</p>
                                    </div>
                                    <!-- Percentage Section -->
                                    <div class="col-lg-6 col-md-6 col-3 d-flex justify-content-end">
                                        <p>{{ $empoweringcareersdetail->percentage ?? 0 }}%</p>
                                    </div>
                                </div>
                                <!-- Progress Bar -->
                                <div class="progress">
                                    <div  class="progress-bar" role="progressbar"
                                        style="width: {{ $empoweringcareersdetail->percentage ?? 0 }}%;"
                                        aria-valuenow="{{ $empoweringcareersdetail->percentage ?? 0 }}"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
     </div>
     <!-- Empowering Global Careers End -->

    <!-- Global Career Start -->
     <div class="container-fluid bg-success expore-sec pb-0">
        <div class="text-center mx-auto wow fadeInUp pt-5" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-black"></h4>
            <h1 class="fw-bold text-white">Let's turn your global career aspirations into reality!</h1>
        </div>
        <div class="container pt-3">
            <div class="owl-carousel global-career-carousel wow fadeInUp">
                @foreach ($global_careers as $global_career)
                    <div class="expore-item mb-5">
                        <article class="card__article">
                            <img src="{{asset($global_career->image ?? '#')}}" alt="image" class="card__img img-fluid rounded" loading="lazy" style="height: 400px">
                            <div class="card__data bg-primary text-white">
                            <h1 class="card__title mb-0">{{$global_career->title ?? ''}}</h1>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
     </div>
     <!-- Global Career Start -->

    <!-- Why Choose Us Start -->
    <div class="container py-5 overflow-hidden pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Why Choose Us?</h4>
            <h1 class="fw-bold mb-4">{{$why_choose->title ?? ''}}</h1>
            <p class="mb-0">{{$why_choose->description ?? ''}}</p>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="accordion accordion-flush bg-light rounded p-5" id="accordionFlushSection">
                    @foreach ($why_choose_details as $key => $why_choose_detail)
                        <div class="accordion-item {{ $key == 0 ? 'rounded-top' : '' }}">
                            <h2 class="accordion-header" id="flush-heading{{$why_choose_detail->id}}">
                                <button class="accordion-button collapsed {{ $key == 0 ? 'rounded-top' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-{{$why_choose_detail->id}}" aria-expanded="false"
                                    aria-controls="flush-{{$why_choose_detail->id}}">
                                    {{$why_choose_detail->question ?? ''}}
                                </button>
                            </h2>
                            <div id="flush-{{$why_choose_detail->id}}" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading{{$why_choose_detail->id}}" data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">{{$why_choose_detail->answer ?? ''}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded">
                    <img src="{{$why_choose->image ?? '#'}}" class="img-fluid w-100" alt="FAQ Image" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us End -->

    <!-- Contact us Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Contact us to Explore Opportunities In</h4>
                <h1 class="fw-bold mb-4">{{$exploreopportunities->title ?? ''}}</h1>
                <p class="mb-0">{{$exploreopportunities->description ?? ''}}</p>
            </div>
            <div class="owl-carousel team-carousel">
                @foreach ($exploreopportunitiesdetails as $exploreopportunitiesdetail)
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset($exploreopportunitiesdetail->image ?? '#')}}" class="img-fluid" alt="" loading="lazy">
                    </div>
                    <div class="team-title">
                        <h4 class="mb-0" style="overflow-y: scroll; height: 2rem;">{{$exploreopportunitiesdetail->name ?? ''}}</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-xl-12 d-flex justify-content-end mt-3">
                <a href="{{route('contactUs')}}" class="btn btn-primary rounded-pill my-3 my-lg-0 flex-shrink-0 px-5 py-3 fw-bold fs-6 contact-btn">Contact Us</a>
            </div>
        </div>
    </div>
    <!-- Contact us End -->

    <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-1">
            <div class="text-center mx-auto pb-1"  style="max-width: 800px;">
                <h4 class="text-primary">Our Blog & News</h4>
                <h1 class="fw-bold mb-4">{{$blogsheader->title ?? ''}}</h1>
                <p class="mb-0">{{$blogsheader->description ?? ''}}</p>
            </div>
            <div class="owl-carousel blog-carousel" >
                @foreach ($blogsnews as $blognews)
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="{{asset($blognews->blog_image ?? '#')}}" class="img-fluid w-100 rounded" loading="lazy" alt="Visa Requirements" style="height: 240px;">
                            <div class="blog-title">
                                <a href="{{ route('blog-news-details',['id' => base64_encode($blognews->id)]) }}" class="btn">{{$blognews->title ?? ''}}</a>
                            </div>
                        </div>
                        <div class="blog-para-sec">
                            <a href="{{ route('blog-news-details',['id' => base64_encode($blognews->id)]) }}" class="h4 d-inline-block mb-3">{{$blognews->title ?? ''}}</a>

                            <a href="{{ route('blog-news-details',['id' => base64_encode($blognews->id)]) }}">
                                <p class="mb-4 text-dark">{{$blognews->description ?? ''}}</p>
                            </a>
                        </div>
                        <div class="blog-bottom-sec">
                            <div class="d-flex align-items-center">
                                <img src="{{asset($blognews->image ?? '#')}}" class="img-fluid rounded-circle" loading="lazy" style="width: 60px; height: 60px;" alt="Admin">
                                <a href="{{ route('blog-news-details',['id' => base64_encode($blognews->id)]) }}">
                                    <div class="ms-3">
                                        <h5 class="me-1">{{$blognews->name ?? ''}}</h5>
                                        {{-- <p class="mb-0 text-dark">30 August 2018 - 19:25</p> --}}
                                        <p class="mb-0 text-dark">
                                            {{ $blognews->updated_at ? \Carbon\Carbon::parse($blognews->updated_at)->format('d F Y - H:i') : '' }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-1 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Testimonial</h4>
                <h1 class="fw-bold mb-1">Our Clients Reviews</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <div class="testimonial-quote-left">
                            <i class="fas fa-quote-left fa-2x"></i>
                        </div>
                        <div class="testimonial-img">
                            <img src="{{asset($testimonial->image ?? '#')}}" class="img-fluid" loading="lazy" alt="Image">
                        </div>
                        <div class="testimonial-text">
                            <p class="mb-0">{{$testimonial->description ?? ''}}
                            </p>
                        </div>
                        <div class="testimonial-title">
                            <div>
                                <h4 class="mb-0">{{$testimonial->name ?? ''}}</h4>
                                <p class="mb-0">{{$testimonial->designation ?? ''}}</p>
                            </div>
                            <div class="d-flex text-primary">
                                @php
                                    $rating = $testimonial->rating ?? 0;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $rating ? '' : '-o' }}"></i>
                                @endfor
                                <span>({{ $rating }})</span>
                            </div>
                        </div>
                        <div class="testimonial-quote-right">
                            <i class="fas fa-quote-right fa-2x"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
<script>
    function updateVideo(button) {
        // Get the YouTube link from the button's data attribute
        const youtubeLink = button.getAttribute('data-youtube-link');
        const iframe = document.getElementById('videoIframe');

        if (youtubeLink) {
            iframe.src = youtubeLink + "?autoplay=1&controls=1";
        } else {
            iframe.src = '';
        }
    }

    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        const iframe = document.getElementById('videoIframe');
        iframe.src = '';
    });
</script>
