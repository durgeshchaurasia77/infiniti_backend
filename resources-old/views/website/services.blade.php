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
                            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Services</h4>
                                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                                    <li class="breadcrumb-item"><a href="{{route('web_home')}}" class="text-white">Home</a></li>
                                    <li class="breadcrumb-item active text-primary">Our Services</li>
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

    <!-- Our-services Start -->
    <div class="container-fluid our-services">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 mb-4">
                    @foreach($ourservicesdetails as $ourservicesdetail)
                    <div class="row mb-5">
                        <div class="col-lg-4">
                            <img src="{{asset($ourservicesdetail->image ?? '#')}}" class="img-fluid w-100 rounded" alt="Visa Requirements" style="height: 200px;">
                        </div>
                        <div class="col-lg-8 pt-4">
                            <h4>
                                {{ $ourservicesdetail->title ?? '' }}
                            </h4>
                            <p class="mb-2">
                                {{ $ourservicesdetail->description ?? '' }}
                            </p>
                            <p><a href="{{ route('our-services-details',['id' => base64_encode($ourservicesdetail->id)]) }}" class="btn btn-primary rounded-pill pb-2 px-4 my-3 my-lg-0 flex-shrink-0">Read more</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-xl-4 col-lg-4">
                    <form>
                        <div class="form-container pb-2 pt-2 mx-md-0 form-container-sticky">
                            <h3 class="form-title">GET YOUR QUESTION</h3>
                            <p class="form-subtitle">ANSWERED BY OUR IMMIGRATION EXPERT</p>
                            <form>
                                <div class="form-group mt-2">
                                    <input type="text" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" placeholder="Your Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="phone" placeholder="Your Phone" required>
                                </div>
                                <div class="form-group">
                                    <textarea id="question" placeholder="Your Question" rows="1"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <select id="services">
                                        <option value="">FRRO Registration - Visa Extension - Over Stay
                                        </option>
                                        <option value="">Visa Extension</option>
                                        <option value="">Exit Visa</option>
                                        <option value="">Overstay</option>
                                        <option value="">OCI Card</option>
                                        <option value="">COA Passport</option>
                                        <option value="">Change of Address</option>
                                        <option value="">Dependent or Family Visa Due to MarriageDependent or Family Visa Due to Marriage</option>
                                        <option value="">Dependent or Family Visa for a Child with Non-Inidan Passport</option>
                                        <option value="">Other</option>
                                    </select>
                                </div>
                                <a type="submit" class="btn btn-primary w-100 mt-2 rounded-0">GET YOUR FREE REPORT &
                                    CONSULTATION</a>
                            </form>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Our-services End -->
@endsection
