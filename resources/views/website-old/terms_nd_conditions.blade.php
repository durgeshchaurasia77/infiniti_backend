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
                            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Terms & Conditions</h4>
                                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                                    <li class="breadcrumb-item"><a href="{{route('web_home')}}" class="text-white">Home</a></li>
                                    <li class="breadcrumb-item active text-primary">Terms & Conditions</li>
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

        <!-- Terms & Conditions Start -->
        <div class="container-fluid terms-nd-conditions py-5 px-5">
            <div class="row">
                <div class="col-xl-8 col-lg-8 mb-4">
                   {!! $cmsterm->details ?? '' !!}
                </div>

                <div class="col-xl-4 col-lg-4">
                        <div class="form-container pb-2 pt-2 mx-md-0 form-container-sticky">
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
        <!-- Terms & Conditions End -->
    @endsection
