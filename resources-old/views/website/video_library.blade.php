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
                            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Video Library</h4>
                                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                                    <li class="breadcrumb-item"><a href="{{route('web_home')}}" class="text-white">Home</a></li>
                                    <li class="breadcrumb-item active text-primary">Video Library</li>
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


        <!-- Video Start -->
        <div class="container-fluid video_lib offer-section py-5 px-5">
            <div class="row mb-4">
                <div class="col-xl-1 col-lg-1 col-md-1 col-3 d-flex align-items-center">
                    <i class="bi bi-pencil-fill text-primary fs-2 pe-4 py-1 border-bottom border-2 border-primary"></i>
                </div>
                <div class="col-xl-11 col-lg-11 col-md-11 col-9 border-start border-2 border-secondary">
                    <h3 class="mb-0 mt-2">Video Section</h3>
                    {{-- <p>
                        <strong>28 November 2018 - 14:37, by Sandeep Sharma ,
                            in ,
                        </strong>
                        <br/>
                        <strong>
                            No comments
                        </strong>
                    </p> --}}
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="nav nav-pills bg-light rounded p-5">
                        @foreach ($VideoLibrary as $key => $VideoLibrary1 )
                            <a class="accordion-link p-4 {{ $key == 0 ? 'active' : '' }} mb-4" data-bs-toggle="pill" href="#collapse{{$VideoLibrary1->id ?? ''}}">
                                <h5 class="mb-0">{{$VideoLibrary1->title ?? ''}}</h5>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="tab-content">
                        @foreach ($VideoLibrary as $key => $VideoLibrary2 )
                            <div id="collapse{{$VideoLibrary2->id ?? ''}}" class="tab-pane fade p-0 {{ $key == 0 ? 'active' : '' }} show">
                                <div class="row g-4">
                                    <div class="col-md-12">
                                        <div class="video-container">
                                            <iframe id="videoOne" preload="none" width="100%" height="450"
                                                src="{{$VideoLibrary2->video_url ?? ''}}"
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="text-primary mb-3">Leave Comment</h4>
                        <form action="{{ route('comment-form') }}" method="post"  class="formSubmit1" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name">
                                        <label for="">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="email" name="email"  placeholder="Your Email">
                                        <label for="">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="url" class="form-control border-0" id="website" name="website"  placeholder="Website">
                                        <label for="Website">Website</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a comment here" name="comment"  id="message" style="height: 160px"></textarea>
                                        <label for="Comment">Comment</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3 loderButton">
                                        <span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>
                                        Send Comment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video End -->
        @endsection
