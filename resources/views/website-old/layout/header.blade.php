@php
    // $expactServicesDropdown = App\Models\ExpactServices::pluck('id', 'slug','title')->get();
    $expactServicesDropdown    = App\Models\ExpactServices::select('id', 'slug', 'title')->where('status',1)->get();
    $chunks = [
        $expactServicesDropdown->take(10),               // First 8 items
        $expactServicesDropdown->skip(10)->take(10),      // Next 8 items
        $expactServicesDropdown->skip(20)->take(10),     // Next 14 items
    ];
@endphp

<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
<div class="container-fluid position-relative px-0 pb-5">
    <nav class="navbar navbar-expand-lg navbar-light home-navbar px-xl-5 px-lg-3 px-md-0 px-sm-0">
        <a href="{{route('web_home')}}" class="navbar-brand p-0 mx-xl-2 mx-lg-2 mx-md-2 mx-0">
            <img src="{{asset('website/assets/img/logo-img-three.png')}}" class="logonoscroll" loading="lazy" alt="Logo" width="230px" height="45px">
            <img src="{{asset('website/assets/img/logo-img-one.png')}}" class="scrollogo" loading="lazy" alt="Logoscroll" width="210px" height="45px">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">

                <!-- Home Nav -->
                <a href="{{route('web_home')}}" class="nav-item nav-link {{ Route::is('web_home') ? 'active' : '' }}">Home</a>
                <!-- About Nav -->
                <a href="{{route('about')}}" class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}">About</a>
                <!-- FRRO Location Nav -->
                <a href="{{route('frrolocation')}}" class="nav-item nav-link {{ Route::is('frrolocation') ? 'active' : '' }}">FRRO Location</a>
                <!-- Destination Services Nav -->
                <a href="{{route('destination-services')}}" class="nav-item nav-link {{ Route::is('destination-services') ? 'active' : '' }}">Destination Services</a>
                <!-- Expact Services Nav -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Expact Services</span>
                    </a>
                    <div class="dropdown-menu expact-services-dropdown-menu m-0">
                        <div class="row">
                            @foreach($chunks as $index => $chunk)
                                <div class="col-lg-{{ $index === 4 ? 4 : 4 }}" style="width: auto">
                                    @foreach($chunk as $service)
                                        <a href="{{ route('expact-service', ['slug' => $service->slug]) }}" class="dropdown-item">
                                            {{ $service->title }}
                                        </a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Resources Nav -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link {{ Route::is('blog-news','faq','abbreviation','video-library') ? 'active' : '' }}" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Resources</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-two m-0">
                        <a href="{{route('services')}}" class="dropdown-item {{ Route::is('services') ? 'active' : '' }}">Our Services</a>
                        <a href="{{route('blog-news')}}" class="dropdown-item {{ Route::is('blog-news') ? 'active' : '' }}">Blog & News</a>
                        <a href="{{route('faq')}}" class="dropdown-item {{ Route::is('faq') ? 'active' : '' }}">FAQ</a>
                        <a href="{{route('abbreviation')}}" class="dropdown-item {{ Route::is('abbreviation') ? 'active' : '' }}">Abreviation</a>
                        <a href="{{route('video-library')}}" class="dropdown-item {{ Route::is('video-library') ? 'active' : '' }}">Video Library</a>
                    </div>

                </div>
            </div>
            <!-- Contacts Nav -->
            <a href="{{route('contactUs')}}" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Contact</a>
        </div>
    </nav>
{{-- </div> --}}
