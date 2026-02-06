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
                @foreach ($blogsList as $blogsData)
                    <div class="col-md-6">
                        <div class="blog-card">
                            <img src="{{ asset($blogsData->image ?? 'notImage.jpg') }}">
                            <div class="blog-card-body">
                                <h5>{{ $blogsData->title }}</h5>
                                <p>{{ $blogsData->short_detail ?? '' }}</p>
                                <a href="{{ route('blog-details',$blogsData->seo_slug) }}" class="blog-btn">Read More →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                    <h4 class="mb-4">Blogs Category</h4>
                </div>
                @if(isset($blogCateId))
                    <a href="{{ route('blog')}}"
                        class="category-item d-flex align-items-center text-decoration-none">
                        <span class="category-icon me-2">▸</span>
                        <h6 class="mb-0">
                            All
                        </h6>
                    </a>
                @else
                    <a href="javascript:void(0)"
                        class="category-item d-flex align-items-center text-decoration-none active">
                        <span class="category-icon me-2">▸</span>
                        <h6 class="mb-0">
                            All
                        </h6>
                    </a>
                @endif
                @php
                    $activeCategoryId = isset($blogCateId) ? base64_decode($blogCateId) : null;
                @endphp
                @foreach ($blogCategoryList as $blogCategorydata)
                    <a href="{{ route('blog',base64_encode($blogCategorydata->id)) }}"
                    class="category-item d-flex align-items-center text-decoration-none {{ $activeCategoryId == $blogCategorydata->id ? 'active' : '' }}">

                        <span class="category-icon me-2">▸</span>

                        <h6 class="mb-0">
                            {{ $blogCategorydata->name }}
                            <small class="text-muted">
                                ({{ $blogCategorydata->blogItems->count() }})
                            </small>
                        </h6>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>



@include('website.contact-form')
@endsection
