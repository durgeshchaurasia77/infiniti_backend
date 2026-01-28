@extends('website.layout.app')
@section('content')




<!-- ================== BANNER ================== -->
<section class="blog-banner">
  <div class="blog-banner-content">
    <h1>Our Latest Blogs</h1>
    <p>Stay updated with technology, business & digital trends</p>
  </div>
</section>

<!-- ================== BLOG SECTION ================== -->
<section class="py-5">
<div class="container">
<div class="row">

  <!-- ===== LEFT : BLOG CARDS ===== -->
  <div class="col-md-8">
    <div class="row g-4">

      <!-- Card 1 -->
      <div class="col-md-6">
        <div class="blog-card">
          <img src="https://images.unsplash.com/photo-1492724441997-5dc865305da7">
          <div class="blog-card-body">
            <h5>How AI Is Changing Business</h5>
            <p>Discover how artificial intelligence is reshaping industries worldwide.</p>
            <a href="#" class="blog-btn">Read More →</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6">
        <div class="blog-card">
          <img src="https://images.unsplash.com/photo-1509395176047-4a66953fd231">
          <div class="blog-card-body">
            <h5>Top Web Design Trends</h5>
            <p>Modern UI/UX trends that every website should follow.</p>
            <a href="#" class="blog-btn">Read More →</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-6">
        <div class="blog-card">
          <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085">
          <div class="blog-card-body">
            <h5>Future of Software Development</h5>
            <p>What will software development look like in the next 5 years?</p>
            <a href="#" class="blog-btn">Read More →</a>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-6">
        <div class="blog-card">
          <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d">
          <div class="blog-card-body">
            <h5>Digital Marketing Secrets</h5>
            <p>Learn how top brands grow using digital marketing.</p>
            <a href="#" class="blog-btn">Read More →</a>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-6">
        <div class="blog-card">
          <img src="https://images.unsplash.com/photo-1535223289827-42f1e9919769">
          <div class="blog-card-body">
            <h5>Why Startups Fail</h5>
            <p>Common mistakes that lead startups to failure.</p>
            <a href="#" class="blog-btn">Read More →</a>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-6">
        <div class="blog-card">
          <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">
          <div class="blog-card-body">
            <h5>UI UX Best Practices</h5>
            <p>Design principles to create beautiful and usable interfaces.</p>
            <a href="#" class="blog-btn">Read More →</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- ===== RIGHT : SIDEBAR ===== -->
  <div class="col-md-4">
    <div class="blog-sidebar">

      <!-- Search -->
  <div class="blog-search">
 <i class="fa-solid fa-magnifying-glass"></i>
  <input type="text" placeholder="Search blog...">
</div>


<div class="latest-blog-heading">
      <h4 class="mb-4">Latest Blogs</h4>
</div>
      <div class="latest-blog">
        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085">
        <div>
          <h6>AI in Healthcare</h6>
          <span>Jan 12, 2026</span>
        </div>
      </div>

      <div class="latest-blog">
        <img src="https://images.unsplash.com/photo-1509395176047-4a66953fd231">
        <div>
          <h6>Future of Web Apps</h6>
          <span>Jan 10, 2026</span>
        </div>
      </div>

      <div class="latest-blog">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">
        <div>
          <h6>UI Design Tips</h6>
          <span>Jan 08, 2026</span>
        </div>
      </div>

      <div class="latest-blog">
        <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d">
        <div>
          <h6>Marketing Hacks</h6>
          <span>Jan 05, 2026</span>
        </div>
      </div>

    </div>
  </div>

</div>
</div>
</section>



@include('website.contact-form')
@endsection
