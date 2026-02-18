@extends('website.layout.app')
@section('content')



<section class="our-offices-branch-contact-page">
  <div class="offices-container-branch-contact-page">

    <!-- LEFT CONTENT -->
    <div class="offices-text-branch-contact-page">
      <h2>Our Offices</h2>
      <p>
        {{ $contactdata->office_about ?? '' }}
      </p>
    </div>

    <!-- MAP -->
    <div class="offices-map-branch-contact-page">
      <img src="{{ asset($contactdata->office_map_image_one ?? 'notImage.jpg') }}" alt="World Map">
    </div>

  </div>

  <!-- CARDS -->
  <div class="office-cards-branch-contact-page">

    @if(!empty($contactdata->multiple_address))
        @foreach ($contactdata->multiple_address as $office)
            <div class="office-card-branch-contact-page">
                <div class="office-head-branch-contact-page">

                    @if(!empty($office['address_logo']))
                        <img src="{{ asset($office['address_logo']) }}"
                             class="office-icon-branch-contact-page"
                             alt="{{ $office['name'] }}">
                    @else
                        <img src="{{ asset('assets/images/default-office.png') }}"
                             class="office-icon-branch-contact-page"
                             alt="Office">
                    @endif

                    <h4>{{ strtoupper($office['name']) }}</h4>
                </div>

                <p>{!! nl2br(e($office['address'])) !!}</p>
            </div>
        @endforeach
    @endif

</div>

</section>


<section class="let-build-somthing-hero-wrapper">
  <div class="let-build-somthing-hero-inner">

    <div class="let-build-somthing-hero-image">
      <img src="{{ asset($contactdata->office_map_image_two ?? 'notImage.jpg') }}" alt="Hero Image">
    </div>

    <div class="let-build-somthing-hero-content">
      <h1>Let’s build Something</h1>
      <p>brilliant Together</p>
      <a href="#" class="let-build-somthing-hero-btn">Let's Start →</a>
    </div>

  </div>
</section>




@include('website.contact-form')
@endsection
