    @php
        $settingData    = App\Models\Setting::first();
        $serviceFooterList    = App\Models\Service::select('id','name','seo_slug')->where('status',1)->get();
        $industryFooterList    = App\Models\Industry::select('id','title','seo_slug')->where('status',1)->get();
    @endphp
<footer class="apptunix-footer">
  <div class="footer-container">

    <!-- BRAND -->
    <div class="footer-col brand">
      {{-- <h2 class="logo">Apptunix</h2> --}}
      <div class="logo header-logo">
            <img src="{{ asset($settingData->footer_logo ?? 'website1/assets/images/infiniti-logo.png') }}" alt=""></div>
      <p>{{ $settingData->footer_about ?? '' }}</p>

      <a href="#" class="footer-btn">Contact Now!</a>

      <div class="sales">
        <strong>For sales enquiries:</strong>
        <a href="mailto:{{ $settingData->email ?? 'example@email.com' }}">{{ $settingData->email ?? 'example@email.com' }}</a>
      </div>

      <img src="assets/images/dmca.png" class="dmca" alt="DMCA">
    </div>

    <!-- RECENT GUIDES -->
    {{-- <div class="footer-col">
      <h4>Recent e-guides</h4>
      <ul>
        <li><a href="#">App Monetization Strategies: How to Make Money From an App?</a></li>
        <li><a href="#">A Comprehensive Guide To Mobile App Development in 2025 – 2026</a></li>
        <li><a href="#">Telemedicine 2.0 – A Comprehensive Guide</a></li>
        <li><a href="#">Electric Vehicle Software Development – A Comprehensive Guide</a></li>
      </ul>
    </div> --}}

    <!-- SERVICES -->
    <div class="footer-col">
        @if(count($serviceFooterList) > 0)
            <h4>Services</h4>
            <ul>
            @foreach ($serviceFooterList as $serviceFooter)
                <li><a href="{{ $serviceFooter->seo_slug }}">{{ $serviceFooter->name ?? '' }}</a></li>
            @endforeach
            </ul>
        @endif
    </div>

    <!-- EXPERTISE -->
    <div class="footer-col">
        @if(count($industryFooterList) > 0)
            <h4>Industries</h4>
            <ul>
            @foreach ($industryFooterList as $industryFooter)
                <li><a href="{{ $industryFooter->seo_slug }}">{{ $industryFooter->title ?? '' }}</a></li>
            @endforeach
            </ul>
        @endif
    </div>

    <!-- SUBSCRIBE -->
    <div class="footer-col subscribe">
      <h4>Subscribe US</h4>
      <p>Make the right business move.</p>

      <form class="subscribe-form">
        <input type="email" placeholder="Email address">
        <button type="submit">Send</button>
      </form>

      <small>Your email ID is confidential.</small>

      <div class="social">
        <a href="{{ $settingData->twitter_url ?? 'javascript:void(0)' }}"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="{{ $settingData->facebook_url ?? 'javascript:void(0)' }}"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="{{ $settingData->linkedin_url ?? 'javascript:void(0)' }}"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="{{ $settingData->website_url ?? 'javascript:void(0)' }}"><i class="fa-brands fa-youtube"></i></a>
        <a href="{{ $settingData->instagram_url ?? 'javascript:void(0)' }}"><i class="fa-brands fa-instagram"></i></a>
      </div>
    </div>

  </div>
