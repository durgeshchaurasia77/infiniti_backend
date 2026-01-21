    @php
    // $pageBanners = App\Models\PageBanner::pluck('image', 'page_name')->toArray();
    // $settingfooter = App\Models\Setting::first();
    @endphp
    @php
        $settingData    = App\Models\Setting::select('id', 'header_logo')->first();
    @endphp
    <link rel="icon" type="image/png" href="{{asset($settingData->favicon ?? 'website1/assets/images/infiniti-logo.png')}}" loading="lazy">

    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('website1/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website1/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('website1/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('website1/assets/css/vendor/aos.css')}}">
    <link rel="stylesheet" href="{{asset('website1/assets/css/vendor/feature.css')}}">
    <!-- Style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="{{asset('website1/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website1/assets/css/custome.css')}}">
    <link rel="stylesheet" href="{{asset('website1/assets/css/responsive.css')}}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

    {{-- <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"/>

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="{{asset('website/assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('website/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('website/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/scss/main.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
<style>
    html {
        scroll-behavior: smooth !important;
    }
    * {
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .homepage-popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(6, 15, 35, 0.7);
        backdrop-filter: blur(8px);
        display: none;
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .homepage-popup-wrapper {
        width: 700px;
        max-width: 95%;
        background: #ffffff;
        border-radius: 26px;
        box-shadow: 0 40px 90px rgba(0, 0, 0, 0.45);
        display: flex;
        overflow: hidden;
        position: relative;
        height: 551px;
    }

    /* .homepage-popup-left h2 {
    font-size: 20px;
} */

    .homepage-popup-close {
        position: absolute;
        right: 18px;
        top: 12px;
        font-size: 24px;
        cursor: pointer;
        color: black;
    }


    /* .homepage-popup-left{
  width:50%;
  padding:40px;
  background:linear-gradient(180deg,#07387a,#0e4ea3);
  color:#fff;
} */
    .homepage-popup-left {
        width: 50%;
        padding: 45px 40px;
        background: linear-gradient(180deg, #06152b, #0b2a5a);
        color: #ffffff;
    }

    .homepage-popup-left h2 {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .homepage-popup-left p {
        font-size: 15px;
        opacity: 0.85;
    }

    .homepage-slide {
        display: none;
    }

    .homepage-slide.active {
        display: block;
    }

    /* .homepage-test-box{
  background:#0a4fa8;
  padding:20px;
  border-radius:18px;
  margin-top:25px;
}

.homepage-test-user{
  display:flex;
  gap:10px;
  align-items:center;
  margin-top:10px;
} */

    .homepage-test-box {
        background: rgba(255, 255, 255, 0.08);
        padding: 22px;
        border-radius: 18px;
        margin-top: 28px;
    }

    .homepage-test-box p {
        font-size: 14px;
        line-height: 1.6;
    }

    .homepage-test-user img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
    }


    .homepage-slider-dots {
        text-align: center;
        margin-top: 15px;
    }

    /* .homepage-slider-dots span{
  width:10px;
  height:10px;
  border-radius:50%;
  display:inline-block;
  margin:0 4px;
  background:#9fbeff;
  cursor:pointer;
  opacity:.6;
}

.homepage-slider-dots span.active{
  background:#fff;
  opacity:1;
} */
    .homepage-slider-dots span {
        width: 8px;
        height: 8px;
        background: #6c8ecf;
        opacity: 0.5;
    }

    .homepage-slider-dots span.active {
        background: #ffffff;
        opacity: 1;
    }

    /* .homepage-popup-right{
  width:50%;
  padding:35px 30px;
  background:#fff;
} */
    .homepage-popup-right {
        width: 50%;
        padding: 45px 40px;
        background: #575361;
    }

    /* .homepage-popup-right input,
.homepage-popup-right textarea{
  width:100%;
  border-radius:15px;
  border:1px solid #dcdcdc;
  padding:14px 18px;
  font-size:15px;
  margin-bottom:15px;
  color: #000;
}

.homepage-popup-right textarea{
  min-height:110px;
  resize:none;
} */

    .homepage-popup-right input,
    .homepage-popup-right textarea {
        width: 100%;
        border-radius: 14px;
        border: 1px solid #d5dbea;
        padding: 14px 18px;
        font-size: 15px;
        margin-bottom: 16px;
        transition: 0.25s;
    }

    .homepage-popup-right input:focus,
    .homepage-popup-right textarea:focus {
        /* outline:none; */
        border-color: #0b2a5a;
        box-shadow: 0 0 0 2px rgba(11, 42, 90, 0.15);
    }

    /* .homepage-popup-btn{
  background:linear-gradient(135deg,#1f75ff,#0057e7);
  color:#fff;
  font-size:18px;
  border:none;
  padding:14px 50px;
  border-radius:40px;
  cursor:pointer;
} */

    .homepage-popup-btn {
        background: linear-gradient(135deg, #0b2a5a, #123d8c);
        color: #fff;
        font-size: 17px;
        border: none;
        padding: 14px 60px;
        border-radius: 40px;
        cursor: pointer;
        margin-top: 10px;
        transition: 0.3s;
    }

    .homepage-popup-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(11, 42, 90, 0.35);
    }

    /* .homepage-popup-points{
  font-size:14px;
  color:#444;
  margin-top:10px;
} */
    .homepage-popup-points {
        font-size: 14px;
        color: #2a2a2a;
        margin: 12px 0 5px;
    }

    @media(max-width:900px) {
        .homepage-popup-wrapper {
            flex-direction: column;
        }

        .homepage-popup-left,
        .homepage-popup-right {
            width: 100%;
        }
    }
</style>

    <style>
        .apptunix-footer{
  background: radial-gradient(circle at top left,#0b1d3a,#020814);
  padding:80px 20px;
  color:#fff;
  font-family:Arial, Helvetica, sans-serif;
}

.footer-container{
  max-width:1400px;
  margin:auto;
  display:grid;
  grid-template-columns: 1.5fr 1.3fr 1.3fr 1.3fr;
  gap:50px;
}

.footer-col h4{
  margin-bottom:20px;
  font-size:18px;
}

.footer-col ul{
  list-style:none;
  padding:0;
}

.footer-col ul li{
  margin-bottom:14px;
}

.footer-col ul li a{
  color:#cfd8e3;
  text-decoration:none;
  font-size:15px;
  line-height:1.6;
}

.footer-col ul li a:hover{
  color:#0a7cff;
}

.footer-col .highlight{
  color:#0a7cff;
}

.brand .logo{
  font-size:34px;
  font-weight:700;
  margin-bottom:15px;
}

.brand p{
  color:#cfd8e3;
  margin-bottom:25px;
}

.footer-btn{
  display:inline-block;
  background:#0a7cff;
  padding:12px 28px;
  border-radius:30px;
  color:#fff;
  text-decoration:none;
  font-weight:600;
  margin-bottom:25px;
}

.sales{
  margin:20px 0;
}

.sales a{
  display:block;
  margin-top:5px;
  color:#fff;
}

.dmca{
  margin-top:20px;
  width:120px;
}

.subscribe p{
  margin-bottom:15px;
  color:#cfd8e3;
}

.subscribe-form{
  display:flex;
  margin-bottom:10px;
}

.subscribe-form input{
  flex:1;
  padding:12px;
  border:none;
  outline:none;
  border-radius:6px 0 0 6px;
}

.subscribe-form button{
  background:#0a7cff;
  color:#fff;
  border:none;
  padding:12px 20px;
  border-radius:0 6px 6px 0;
  cursor:pointer;
}

.subscribe small{
  display:block;
  margin-bottom:20px;
  color:#8aa0b6;
}

.social{
  display:flex;
  gap:12px;
}

.social a{
  width:38px;
  height:38px;
  border-radius:50%;
  background:#0a7cff;
  display:flex;
  align-items:center;
  justify-content:center;
  color:#fff;
  text-decoration:none;
}
</style>
<style>
    /* =========================
   CASE SECTION
========================= */
.case-section {
    background: linear-gradient(180deg, #071a2f, #0a2540);
    padding: 90px 0;
    color: #fff;
}

/* =========================
   TOP
========================= */
.case-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

.case-title h1 {
    font-size: 42px;
    font-weight: 600;
    line-height: 1.2;
}

.case-title span {
    color: #60a5fa;
}

/* =========================
   TABS
========================= */
.case-tabs {
    display: flex;
    gap: 28px;
    border-bottom: 1px solid #1e3a8a;
    margin-bottom: 40px;
}

.tab-features {
    background: none;
    border: none;
    color: #9ca3af;
    padding-bottom: 12px;
    font-size: 15px;
    cursor: pointer;
    position: relative;
}

.tab-features.active {
    color: #fff;
}

.tab-features.active::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 3px;
    background: #3b82f6;
    bottom: -1px;
    left: 0;
    border-radius: 4px;
}

/* =========================
   CONTENT SCROLL BEHAVIOUR
========================= */
.case-content {
    position: relative;
    height: 420px;
    overflow: hidden;
}

.case-item {
    position: absolute;
    inset: 0;
    opacity: 0;
    transform: translateY(40px);
    pointer-events: none;
    transition: all 0.6s ease;
}

.case-item.active {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}



/* =========================
   CASE ITEM (IMPORTANT)
========================= */
/* .case-item {
    height: 420px;
    margin-bottom: 100px;
    border-radius: 20px;
    background-size: cover;
    background-position: center;
    position: relative;

    opacity: 0;
    transform: translateY(60px);
    pointer-events: none;

    transition: all 0.6s ease;
    scroll-snap-align: start;

    box-shadow: 0 25px 60px rgba(0,0,0,0.45);
} */

/* Overlay */
.case-item::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(7,26,47,0.95) 0%,
        rgba(7,26,47,0.75) 40%,
        rgba(7,26,47,0.2) 100%
    );
    border-radius: 20px;
}

/* =========================
   TEXT
========================= */
.case-overlay {
    position: relative;
    z-index: 2;
    width: 45%;
    padding: 60px;
}

.case-overlay h3 {
    font-size: 30px;
    margin-bottom: 15px;
}

.case-overlay p {
    color: #cbd5e1;
    line-height: 1.7;
}

</style>
<style>
#tech-tab {
    scroll-margin-top: 100px; /* navbar height + gap */
}

</style>
        <style>
            /* SECTION */
            .navy-services {
                background: linear-gradient(180deg, #05132b, #071c3e);
                padding: 80px 0 60px;
            }

            /* HEADING */
            .navy-services__heading h2 {
                color: #fff;
                font-size: 32px;
                line-height: 1.25;
                margin-bottom: 45px;
            }

            /* GRID */
            .navy-services__grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
            }

            /* CARD */
            .navy-service-card {
                background: rgba(255, 255, 255, 0.06);
                border-radius: 16px;
                padding: 26px 22px;
                border: 1px solid rgba(255, 255, 255, 0.08);

                transition: 0.35s ease;
                position: relative;
                overflow: hidden;
            }

            /* ICON */
            .navy-service-card i {
                width: 22px;
                height: 22px;
                color: #ffffff;
                margin-bottom: 16px;
            }

            /* TITLE */
            .navy-service-card h5 {
                font-size: 18px;
                color: #ffffff;
                margin-bottom: 10px;
            }

            /* TEXT */
            .navy-service-card p {
                font-size: 14px;
                color: rgba(255, 255, 255, 0.75);
                line-height: 1.5;
            }

            /* ARROW */
            .navy-arrow {
                display: inline-block;
                margin-top: 16px;
                font-size: 18px;
                color: #ffffff;
                transition: 0.3s;
            }

            /* HOVER */
            .navy-service-card:hover {
                transform: translateY(-6px);
                background: rgba(255, 255, 255, 0.1);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
            }

            .navy-service-card:hover .navy-arrow {
                transform: translateX(6px);
            }

            /* RESPONSIVE */
            @media(max-width: 991px) {
                .navy-services__grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media(max-width: 576px) {
                .navy-services__grid {
                    grid-template-columns: 1fr;
                }
            }

            .sub-description {
                margin-top: 10px;
                font-size: 14px;
                color: #e4e9f1;
                line-height: 1.7;
                text-align: justify;
            }

            .sub-description p {
                margin-bottom: 6px;
            }

            .sub-description br {
                display: block;
                margin-bottom: 6px;
            }

        </style>

        <style>
           .navy-testimonial-slider{
                padding: 100px 20px;
                background: linear-gradient(180deg,#05142e,#071c3e);
                }

                /* Header */
                .navy-testimonial-header{
                display:flex;
                justify-content:space-between;
                align-items:center;
                margin-bottom:40px;
                }

                .navy-testimonial-header h2{
                color:#fff;
                font-size:32px;
                }

                /* Controls */
                .navy-slider-controls button{
                width:42px;
                height:42px;
                border-radius:50%;
                border:1px solid rgba(255,255,255,.2);
                background:rgba(255,255,255,.08);
                color:#fff;
                font-size:22px;
                cursor:pointer;
                transition:.3s;
                }

                .navy-slider-controls button:hover{
                background:#fff;
                color:#05142e;
                }

                /* Slider */
                .navy-slider-viewport{
                overflow:visible;
                }

                .navy-slider-track{
                display:flex;
                gap:24px;
                transition:transform .5s ease;
                }

                /* Card */
                .navy-testimonial-card{
                min-width: calc(33.333% - 16px);
                background:rgba(255,255,255,.06);
                border:1px solid rgba(255,255,255,.08);
                border-radius:18px;
                padding:16px;
                text-align:center;
                position:relative;
                transition:.3s;
                cursor: pointer;
                }

                .navy-testimonial-card:hover{
                transform:translateY(-6px);
                background:rgba(255,255,255,.1);
                }

                .navy-testimonial-card img{
                width:100%;
                height:200px;
                object-fit:cover;
                border-radius:14px;
                }

                .navy-testimonial-card .play{
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                width:54px;
                height:54px;
                background:rgba(0,0,0,.55);
                color:#fff;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                pointer-events: none;
                }

                .navy-testimonial-card h3{
                margin-top:14px;
                color:#fff;
                font-size:17px;
                }

                .navy-testimonial-card p{
                font-size:13px;
                color:rgba(255,255,255,.7);
                }

                /* Responsive */
                @media(max-width:900px){
                .navy-testimonial-card{
                    min-width: calc(50% - 12px);
                    cursor: pointer;
                }
                }

                @media(max-width:600px){
                .navy-testimonial-card{
                    min-width:100%;
                    cursor: pointer;
                }
                }
.navy-video-modal{
  position: fixed;
  inset: 0;
  z-index: 99999;
  display: none;
  align-items: center;
  justify-content: center;
}

.navy-video-modal__overlay{
  position: absolute;
  inset: 0;
  background: rgba(255,255,255,0.75);
  backdrop-filter: blur(12px);
}

.navy-video-modal__content{
  position: relative;
  width: 80%;
  max-width: 900px;
  background: #000;
  border-radius: 18px;
  overflow: hidden;
  box-shadow: 0 40px 90px rgba(0,0,0,0.45);
  z-index: 2;
}

.navy-video-modal video{
  width: 100%;
  height: auto;
  display: block;
}
.navy-video-modal__close{
  position: absolute;
  top: 12px;
  right: 12px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  border: none;
  background: rgba(255,255,255,0.15);
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  z-index: 3;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.25s;
}

.navy-video-modal__close:hover{
  background: #ffffff;
  color: #000;
}
.video-thumb {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 12px;
}
</style>

<style>
    /* Blog Theme */
.navy-blog {
    background: #0a2540;
}

.section-title .subtitle {
    color: #ffffff !important;
    letter-spacing: 1px;
    font-weight: 500;
    font-size: 35px !important;
}

.section-title .title {
    color: #ffffff;
}

/* Blog Card */
.smart-blog-card {
    background: #081c33;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.smart-blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(59, 130, 246, 0.3);
}

/* Thumbnail */
.smart-blog-card .thumbnail {
    position: relative;
    overflow: hidden;
}

.smart-blog-card img {
    width: 100%;
    transition: transform 0.5s ease;
}

.smart-blog-card:hover img {
    transform: scale(1.08);
}

/* Tag */
.smart-blog-card .tag {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #1e3a8a;
    color: #fff;
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 12px;
}

/* Content */
.smart-blog-card .content {
    padding: 25px;
}

.smart-blog-card .meta {
    color: #9ca3af;
    font-size: 14px;
    margin-bottom: 10px;
}

.smart-blog-card .title {
    color: #ffffff;
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 20px;
}

/* Read More */
.smart-blog-card .read-more {
    color: #3b82f6;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
}

.smart-blog-card .read-more:hover {
    color: #60a5fa;
    gap: 10px;
}

    </style>
