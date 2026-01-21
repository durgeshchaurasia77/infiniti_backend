@extends('website.layout.app')
@section('content')
        <!-- Carousel Start -->
        <div class="header-carousel header-carousel-doub owl-carousel">
            <div class="header-carousel-item">
                <img src="{{asset($pageBanner->image ?? '#')}}" class="img-fluid w-100" loading="lazy" alt="Image1">
                <div class="carousel-caption carousel-caption-one">
                    <div class="container">
                        <div class="row g-5 banner-carousel-text-one">
                            <div class="col-xl-12 col-lg-12">
                                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>
                                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                                        <li class="breadcrumb-item"><a href="{{route('web_home')}}" class="text-white">Home</a></li>
                                        <li class="breadcrumb-item active text-primary">About</li>
                                    </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        </div>
        <!-- Navbar & Hero End -->

        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-8 wow fadeInLeft" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">About Us</h4>
                            <h1 class="display-5 mb-4">{{$aboutus->title ?? ''}}</h1>
                            <p class="mb-4">
                            {{$aboutus->description ?? ''}}
                            </p>
                            <div class="row g-4">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="d-flex">
                                        <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                        <div class="ms-4">
                                            <h4>Achievement</h4>
                                            <p class="mb-0 fs-5">{{$aboutus->achievement ?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="d-flex">
                                        <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                        <div class="ms-4">
                                            <h4>Year Of Expertise</h4>
                                            <p class="mb-0 fs-5">{{$aboutus->experties ?? '0'}} years</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{route('contactUs')}}" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Contact Us</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <i class="fas fa-phone fa-2x text-primary me-4"></i>
                                        <div>
                                            <h4>Call Us</h4>
                                            <p class="mb-0 fs-5" style="letter-spacing: 1px;">+91-{{$aboutus->contact_no ?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="rounded position-relative overflow-hidden">
                            <img src="{{asset($aboutus->image ?? '#')}}" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Our Mission Start -->
    <div class="container-fluid our-mission mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-xl-1 order-lg-1 order-md-2 order-2">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center justify-content-center mb-3">
                            <div class="mission-img">
                                <img src="{{asset($ourmissions->image_one ?? '#')}}" class="img-fluid wow fadeInLeft"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mission-img mission-img-one mb-3">
                                <img src="{{asset($ourmissions->image_two ?? '#')}}" class="img-fluid wow fadeInDown"/>
                            </div>
                            <div class="mission-img mission-img-two mb-3">
                                <img src="{{asset($ourmissions->image_three ?? '#')}}" class="img-fluid wow fadeInUp"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-xl-2 order-lg-2 order-md-1 order-1">
                    <div class="our-mission-text text-center mx-auto pb-5 wow fadeInRight" data-wow-delay="0.2s" style="max-width: 800px;">
                        <h4 class="text-primary">Our Mission</h4>
                        <h1 class="fw-bold mb-4">{{$ourmissions->title ?? ''}}</h1>
                        <p class="mb-0">
                            {{$ourmissions->description ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <!-- Our Mission End -->

        <!-- Services Start -->
    {{-- <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="mb-4 fw-bold">{{$ourservicesheader->heading ?? ''}}</h1>
                <p class="mb-0">
                    {{$ourservicesheader->description ?? ''}}
                </p>
            </div>
            <div class=" service-carousel owl-carousel owl-theme">
                @foreach ($ourservices as $ourservice)
                    <div class="item">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{asset($ourservice->image)}}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom service-body p-4">
                                <div class="services-text-sec-one">
                                    <a href="#" class="h4 d-inline-block mb-4">{{$ourservice->title ??''}}
                                    </a>
                                </div>
                                <div class="services-text-sec-two">
                                    <p class="mb-4">
                                        {{$ourservice->description ?? ''}}
                                    </p>
                                </div>
                            </div>
                            <div class="service-footer ps-4">
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- Services End -->

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
                            <img src="{{asset($ourservice->image)}}" class="img-fluid rounded-top w-100" loading="lazy" alt="Image">
                        </div>
                        <div class="rounded-bottom service-body p-4">
                            <div class="services-text-sec-one">
                                <a href="{{ route('our-services-details',['id' => base64_encode($ourservice->id)]) }}" class="h4 d-inline-block mb-4">{{$ourservice->title ??''}}
                                </a>
                            </div>
                            <div class="services-text-sec-two">
                                <p class="mb-4">
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

    @endsection
