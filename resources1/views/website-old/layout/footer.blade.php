@php

$settingfooter = App\Models\Setting::first();
// $cmsFooter     = App\Models\ContentManagement::get();
@endphp
<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5 border-start-0 border-end-0"
        style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item">
                    <a href="{{route('web_home')}}" class="p-0">
                        <img src="{{asset($settingfooter->footer_image ?? '#')}}" alt="Logo" loading="lazy" height="45px" width="230px">
                    </a>
                    <p class="mb-4 text-white mt-4" style="line-height: 1.5rem;">
                    {{$settingfooter->footer_about ?? ''}}
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a href="{{route('about')}}"><i class="fa-solid fa-circle-small"></i> About Us</a>
                    <a href="{{route('frrolocation')}}"><i class="fa-solid fa-circle-small"></i> FRRO Locations</a>
                    <a href="{{route('destination-services')}}" style="white-space: nowrap;"><i class="fa-solid fa-circle-small"></i> Destination
                        Services</a>
                    <a href="{{route('contactUs')}}"><i class="fa-solid fa-circle-small"></i> Contact us</a>
                    <a href="{{route('blog-news')}}"><i class="fa-solid fa-circle-small"></i> Blog & News</a>
                    <a href="{{route('services')}}"><i class="fa-solid fa-circle-small"></i> Our Services</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item ms-lg-3">
                    <h4 class="text-white mb-4">Support</h4>
                    <a href="{{route('privacypolicy')}}"><i class="fa-solid fa-circle-small"></i> Privacy Policy</a>
                    <a href="{{route('termcondition')}}"><i class="fa-solid fa-circle-small"></i> Terms & Conditions</a>
                    <a href="{{route('disclaimer')}}"><i class="fa-solid fa-circle-small"></i> Disclaimer</a>
                    <a href="{{route('video-library')}}"><i class="fa-solid fa-circle-small"></i> Video Support</a>
                    <a href="{{route('faq')}}"><i class="fa-solid fa-circle-small"></i> FAQ</a>
                    <a href="{{route('abbreviation')}}"><i class="fa-solid fa-circle-small"></i> Abbreviation</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Contact Info</h4>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt text-primary me-3"></i>
                        <p class="text-white mb-0">{{$settingfooter->address ?? ''}}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope text-primary me-3"></i>
                        <p class="text-white mb-0">
                            <a href="mailto:{{$settingfooter->email ?? ''}}">
                                {{$settingfooter->email ?? ''}}
                            </a>
                        </p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-phone text-primary me-3"></i>
                        <p class="text-white mb-0">+91 {{$settingfooter->phone ?? ''}}</p>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fab fa-firefox-browser text-primary me-3"></i>
                        <p class="text-white mb-0">
                            <a href="{{$settingfooter->website_url ?? '#'}}" target="_blank">
                                {{$settingfooter->website_url ?? ''}}
                            </a>
                         </p>
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{$settingfooter->facebook_url ?? ''}}" target="_blank"><i
                                class="fab fa-facebook-f text-white"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{$settingfooter->twitter_url ?? ''}}" target="_blank"><i
                             class="fa-brands fa-x-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{$settingfooter->instagram_url ?? ''}}" target="_blank"><i
                                class="fab fa-instagram text-white"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href="{{$settingfooter->linkedin_url ?? ''}}" target="_blank"><i
                                class="fab fa-linkedin-in text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-1">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                <span class="text-body"><a href="{{route('web_home')}}" class="text-white">Copyright ©{{ now()->year }} S2 Logistix Solutions</span>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="{{route('web_home')}}" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe
                        id="videoIframe"
                        src=""
                        title="YouTube video"
                        allow="autoplay; encrypted-media"
                        allowfullscreen
                        style="border-radius: 10px;">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>


