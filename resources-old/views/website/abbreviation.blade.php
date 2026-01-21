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
                                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Abbreviation</h4>
                                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                                        <li class="breadcrumb-item"><a href="{{route('web_home')}}" class="text-white">Home</a></li>
                                        <li class="breadcrumb-item active text-primary">Abbreviation</li>
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


        <!-- Abbreviation Start -->
        <div class="container-fluid abbrev py-5 px-5">
            <div class="row">
                <div class="col-xl-8 col-lg-8 mb-4">
                    <div class="accordion" id="accordionExample">
                        @foreach ($abbreviation as $key => $abbreviation1)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="head{{$abbreviation1->id ?? ''}}">
                                    <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$abbreviation1->id ?? ''}}" aria-expanded="true" aria-controls="collapse{{$abbreviation1->id ?? ''}}">
                                        {{$key+1}}. {{$abbreviation1->title ?? ''}}
                                    </button>
                                </h2>
                                <div id="collapse{{$abbreviation1->id ?? ''}}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="head{{$abbreviation1->id ?? ''}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="abbreviation">
                                            <p>
                                                {{$abbreviation1->description ?? ''}}
                                            </p>
                                            <div  data-bs-toggle="modal" data-bs-target="#abbreviation-image">
                                                <img src="{{ asset($abbreviation1->image ?? '#') }}" style="width: 150px;height:180px" class="img-fluid" loading="lazy">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                      </div>
                </div>

                <div class="col-xl-4 col-lg-4 h-100">
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
        <!-- Abbreviation End -->

        <div class="modal fade" id="abbreviation-image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close border rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <img id="dynamic-modal-image" src="" class="img-fluid" loading="lazy" style="height: 350px; width: 300px">
                </div>
            </div>
            </div>
        </div>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-bs-toggle='modal']").forEach(item => {
        item.addEventListener("click", function () {
            const imageSrc = this.querySelector("img").getAttribute("src");
            document.getElementById("dynamic-modal-image").setAttribute("src", imageSrc);
        });
    });
});

</script>
