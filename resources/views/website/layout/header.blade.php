@php
    $settingData    = App\Models\Setting::select('id', 'header_logo')->first();
    $serviceHeaderList    = App\Models\Service::select('id','name','seo_slug')->where('status',1)->get();
    $industryHeaderList    = App\Models\Industry::select('id','title','seo_slug')->where('status',1)->get();
@endphp
<div class="homepage-popup-overlay" id="hpPopup" style="display:none;">

    <div class="homepage-popup-wrapper">

        <span class="homepage-popup-close" onclick="closePopup()">✕</span>
        <div class="homepage-popup-left">

            <h2>Ready to Transform Your Ideas?</h2>
            <p>Get a quick expert response in under 5 minutes.</p>

            <div id="homepage-slider">

                <div class="homepage-slide active">
                    <div class="homepage-test-box">
                        <p>
                            Apptunix delivered two fully integrated applications for our business…
                        </p>
                        <div class="homepage-test-user">
                            <img src="https://i.pravatar.cc/100">
                            <div><b>Jocelyn Pettitt</b><br>CEO - HiVibe</div>
                        </div>
                    </div>
                </div>

                <div class="homepage-slide">
                    <div class="homepage-test-box">
                        <p>Amazing engineering team. Highly reliable & responsive.</p>
                        <div class="homepage-test-user">
                            <img src="https://i.pravatar.cc/101">
                            <div><b>Michael Ross</b><br>Founder - startupX</div>
                        </div>
                    </div>
                </div>

                <div class="homepage-slide">
                    <div class="homepage-test-box">
                        <p>We scaled our product with their support & guidance.</p>
                        <div class="homepage-test-user">
                            <img src="https://i.pravatar.cc/102">
                            <div><b>Anna Smith</b><br>COO - GrowthHub</div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="homepage-slider-dots"></div>

        </div>


        <!-- RIGHT -->
        <div class="homepage-popup-right">

            <form action="{{ route('get-enquery-form') }}" method="post"  class="formSubmit2" enctype="multipart/form-data">
             @csrf

                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <input type="phone" name="phone" id="phone" placeholder="Phone" required>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
                <textarea name="subject" placeholder="Description *"></textarea>

                <ul class="homepage-popup-points">
                    <li>✔ NDA Protected</li>
                    <li>✔ Trusted by 2000+ Entrepreneurs</li>
                </ul>

                {{-- <button class="homepage-popup-btn">Submit</button> --}}
                <button class="btn btn-primary  loderButton2 homepage-popup-btn" style="justify-content: center;">
                    <span class="spinner-grow spinner-grow-sm loderIcon2" role="status" aria-hidden="true" style="display: none;"></span>Send Message
                </button>
            </form>

        </div>

    </div>

</div>


<body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">
<header class="navbar">
<!-- LEFT -->
<div class="logo header-logo">
    <a href="{{ route('web_home') }}">
        <img src="{{ asset($settingData->header_logo ?? 'website1/assets/images/infiniti-logo.png') }}" alt=""></div>
    </a>
<!-- CENTER -->
    <div class="mobile-toggle">
    <i class="fa-solid fa-bars"></i>
    </div>

<ul class="menu">
    <span class="menu-close">&times;</span>
    <li><a href="#" class="nav-link action">Portfolio</a></li>
    <li class="has-mega {{ request()->routeIs('services') ? 'open' : '' }}">
        <a href="javascript:void(0)" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services ▾</a>
        <div class="mega-menu">
            <div class="mega-wrap">
                <div class="left">
                    @php
                        $serviceChunks = $serviceHeaderList->chunk(
                            ceil($serviceHeaderList->count() / 3)
                        );
                    @endphp
                @foreach ($serviceChunks as $chunk)
                    <div class="col">
                        <h4>Services</h4>

                        @foreach ($chunk as $service)
                            <div class="item">
                                <i class="fa-solid fa-circle-dot"></i>
                                <a href="{{ route('services',$service->seo_slug) }}">
                                    {{ $service->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="col">
                    <h4>Marketing</h4>
                        <div class="item">
                            <i class="fa-solid fa-circle-dot"></i>
                            <a href="{{ route('digital-marketing') }}">Digital Marketing</a>
                        </div>
                </div>
            </div>

                <div class="right">

                    <div class="carousel">
                        <div class="slides">
                            <img src="./assets/images/airplane.png">
                            <img src="./assets/images/airlane.jpg">
                            <img src="./assets/images/mobile-app-image.png">
                        </div>

                        <div class="dots">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="crousel-caption">
                        <h3>Clutch</h3>
                        <p>Top Developers in India 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="has-mega {{ request()->routeIs('industries') ? 'open' : '' }}">
        <a href="javascript:void(0)" class="nav-link {{ request()->routeIs('industries') ? 'active' : '' }}">Industries ▾</a>
        <div class="mega-menu">
            <div class="mega-wrap">
                <div class="left">
                    @php
                        $industryChunks = $industryHeaderList->chunk(
                            ceil($industryHeaderList->count() / 3)
                        );
                    @endphp
                    @foreach ($industryChunks as $chunk1)
                    <div class="col">
                        <h4>Services</h4>
                        @foreach ($chunk1 as $industry)
                            <div class="item">
                                <i class="fa-solid fa-circle-dot"></i>
                                <a href="{{ route('industry',$industry->seo_slug) }}">
                                    {{ $industry->title ?? '' }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                </div>

                <div class="right">

                    <div class="carousel">
                        <div class="slides">
                            <img src="./assets/images/airplane.png">
                            <img src="./assets/images/airlane.jpg">
                            <img src="./assets/images/mobile-app-image.png">
                        </div>

                        <div class="dots">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="crousel-caption">
                        <h3>Clutch</h3>
                        <p>Top Developers in India 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li><a href="{{ route('about-us') }}" class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}">About</a></li>
    <li><a href="{{ route('blog') }}" class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a></li>
    <div class="nav-right">
        <a href="{{ route('contact') }}" class="btn-primary" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Get In Touch</a>
        <a class="btn-outline"></a>
    </div>
</ul>
<!-- RIGHT BUTTONS -->
</header>
