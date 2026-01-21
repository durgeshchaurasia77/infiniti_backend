@extends('website.layout.app')
@section('content')
        <!-- Carousel Start -->
        <div class="header-carousel header-carousel-doub owl-carousel">
            <div class="header-carousel-item">
                <img src="{{asset($pageBanner->image ?? '#')}}" class="img-fluid w-100" loading="lazy" alt="Image">
                <div class="carousel-caption carousel-caption-one">
                    <div class="container">
                        <div class="row g-5 banner-carousel-text-one">
                            <div class="col-xl-12 col-lg-12 mt-0">
                                <h4 class="text-white display-4 mb-2 wow fadeInDown" data-wow-delay="0.1s">{{$expcatServices->title ?? ''}}</h4>
                                <h5 class="text-primary mb-2 wow fadeInDown" data-wow-delay="0.2s">{{$expcatServices->subtitle ?? ''}}</h5>
                                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                                        <li class="breadcrumb-item"><a href="{{route('web_home')}}" class="text-white">Home</a></li>
                                        <li class="breadcrumb-item active text-primary">{{$expcatServices->title ?? ''}}</li>
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

        <!-- Start -->
        <div class="container-fluid refund_policy py-5 px-5">
            <div class="row">
                <div class="col-xl-8 col-lg-8 mb-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 class="mb-4">
                                {{$expcatServices->title ?? ''}}
                            </h4>
                        </div>
                        <div class="col-xl-12 mb-3">
                            @foreach($expcatServices->details as $key => $detail)
                            <p>
                                <i class="bi bi-check2-circle fw-bolder text-primary fs-5 me-2"></i>
                                <span class="fs-5">
                                    {{ $detail['titles'] ?? ''}}
                                </span>
                            </p>
                            @endforeach
                        </div>
                        <div class="col-xl-10">
                            <div class="video-container border border-3 rounded">
                                <iframe width="100%" height="315" class="rounded" src="{{asset($expcatServices->youtube_link ?? '#')}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4">
                    <p class="mb-0">
                        Need Assistance with Change of Address,
                    </p>
                    <h4 class="mb-4 text-primary wow zoomIn">Call  Now: +91-{{$settingfooter->phone ?? ''}}</h4>
                        <div class="form-container pb-2 pt-2 mx-md-0 frro-form-container">
                            <h3 class="form-title">GET YOUR QUESTION</h3>
                            <p class="form-subtitle">ANSWERED BY OUR IMMIGRATION EXPERT</p>
                            <form action="{{ route('get-expact-form') }}" method="post"  class="formSubmit2" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-2">
                                    <input type="text" id="name" placeholder="Your Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" placeholder="Your Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="phone" placeholder="Your Phone" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <select id="services" name="expact_type" required>
                                        <option value="{{$expcatServices->id ?? ''}}" selected>{{$expcatServices->title ?? ''}}
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-2 rounded-0 loderButton">
                                      <span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Submit
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <!-- Change Of Address End -->

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
                            <img src="{{asset($testimonial->image ?? '#')}}" class="img-fluid" alt="Image">
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
