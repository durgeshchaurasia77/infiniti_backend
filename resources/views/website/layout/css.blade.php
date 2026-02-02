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
  grid-template-columns: 1.2fr 1.2fr 1.2fr 1.2fr 1.2fr;
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
@media (max-width: 768px) {

  .apptunix-footer {
    padding: 60px 15px;
    text-align: left;
  }

  .footer-container {
    grid-template-columns: 1fr;
    gap: 40px;
  }

  .brand .logo {
    font-size: 28px;
  }

  .brand p {
    font-size: 14px;
  }

  .footer-col ul li a {
    font-size: 14px;
  }

  /* Button full width */
  .footer-btn {
    width: 100%;
    text-align: center;
  }

  /* Subscribe form stack */
  .subscribe-form {
    flex-direction: column;
  }

  .subscribe-form input {
    border-radius: 6px;
    margin-bottom: 10px;
  }

  .subscribe-form button {
    border-radius: 6px;
    width: 100%;
  }

  .social {
    justify-content: flex-start;
  }
}
</style>
<style>
   
.case-section {
    background: linear-gradient(180deg, #071a2f, #0a2540);
    padding: 90px 0;
    color: #fff;
}


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
    scroll-margin-top: 100px;
}

</style>
        <style>
    /* SECTION */
.navy-services{

  padding:10px 10px;
}

/* HEADING */
.navy-services__heading h2 {
    font-size: 40px;
    font-weight: 700;
    line-height:60px;
    /* max-width: 720px; */
    margin-bottom: 70px;
    color: #0C2347;
}
.navy-services__heading{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:20px;
  margin-bottom:60px;
}

.navy-services-btn {
    display: inline-flex;
    align-items: center;
    gap: 29px;
    padding: 15px 40px;
    background: #0E2A52;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    border-radius: 30px;
    text-decoration: none;
    box-shadow: 0 8px 18px rgba(0, 0, 0, .25);
    transition: .3s ease;
}

/* ICON CIRCLE */
.navy-services-btn .btn-icon{
  width:26px;
  height:26px;
  background:#1f6bff;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:14px;
}

/* HOVER */
.navy-services-btn:hover{
  transform:translateY(-2px);
  box-shadow:0 14px 30px rgba(0,0,0,.35);
}

/* MOBILE */
@media(max-width:768px){
  .navy-services__heading{
    flex-direction:column;
    align-items:flex-start;
  }
}

/* GRID */
.navy-services__grid{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:30px;
}

/* CARD */
.navy-service-card {
    position: relative;
    background: #102442;
    backdrop-filter: blur(6px);
    border-radius: 10px;
    padding: 53px 17px 33px;
    min-height: 229px;
    border: 1px solid rgba(255, 255, 255, .08);
    transition: .35s ease;
    width: 380px;
}

/* ICON */
.service-icon{
  position:absolute;
  top:-17px;
  right:-17px;
  width:70px;
  height:70px;
  border-radius:50%;
  background:#1f6bff;
  display:flex;
  align-items:center;
  justify-content:center;
  box-shadow:0 10px 30px rgba(31,107,255,.55);
}

.service-icon svg{
  width:40px;
  height:40px;
  color:#fff;
}

/* TITLE */
.navy-service-card h5{
  font-size:35px;
  font-weight:600;
  color:#fff;
  margin-bottom:14px;
}

/* TEXT */
.navy-service-card p{
  font-size:15px;
  color:rgba(255,255,255,.72);
  line-height:1.6;
  max-width:90%;
}

/* ARROW */
.navy-arrow{
  position:absolute;
  bottom:26px;
  right:30px;
  font-size:20px;
  color:#fff;
  transition:.3s;
}

/* HOVER */
.navy-service-card:hover{
  transform:translateY(-6px);
  border-color:#1f6bff;
  box-shadow:0 25px 50px rgba(0,0,0,.45);
}

.navy-service-card:hover .navy-arrow{
  transform:translateX(8px);
}

/* RESPONSIVE */
@media(max-width:991px){
  .navy-services__grid{
    grid-template-columns:repeat(2,1fr);
  }
}

@media(max-width:576px){
  .navy-services__grid{
    grid-template-columns:1fr;
  }

  .navy-services__heading h2{
    font-size:30px;
  }
}

        </style>

        <style>
           .navy-testimonial-slider{
                padding: 100px 20px;
                /* background: linear-gradient(180deg,#05142e,#071c3e); */
                }

                /* Header */
                .navy-testimonial-header{
                display:flex;
                justify-content:space-between;
                align-items:center;
                margin-bottom:40px;
                }

                .navy-testimonial-header h2{
                color:#102442;
                font-size:40px;
                }

                /* Controls */
                .navy-slider-controls button{
                width:42px;
                height:42px;
                border-radius:50%;
                border:1px solid #102442;
                background:rgba(255,255,255,.08);
                color:#102442;
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
                /* background:rgba(255,255,255,.06); */
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
                /* background:rgba(255,255,255,.1); */
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
    color: #0C2347 !important;
    letter-spacing: 1px;
    font-weight: 500;
    font-size: 35px !important;
}
.section-title h5 {
    font-size: 30px;
    font-weight: 400;
    color: #0C2347;
}
.section-title span {
    font-weight: 600;
    color: #1778FF;
    font-size: 55px;
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






<style>
  
@media (max-width: 768px){

  /* Tabs → horizontal scroll */
  .launch-your-dream-fitness-industry-page-gym-app-tab-bar{
    overflow-x:auto;
    gap:8px;
    padding:10px;
  }

  .launch-your-dream-fitness-industry-page-gym-app-tab-bar::-webkit-scrollbar{
    display:none;
  }

  .launch-your-dream-fitness-industry-page-gym-app-tab{
    flex:0 0 auto;
    padding:12px 18px;
    font-size:14px;
    white-space:nowrap;
  }

  /* Content */
  .launch-your-dream-fitness-industry-page-gym-app-content{
    padding:20px;
    gap:30px;
  }

  .launch-your-dream-fitness-industry-page-gym-left h2{
    font-size:20px !important;
  }

  .launch-your-dream-fitness-industry-page-subtitle{
    font-size:14px;
    margin:10px 0 20px;
  }

  .launch-your-dream-fitness-industry-page-gym-right img{
    max-width:100%;
  }
  .launch-your-dream-fitness-industry-page-gym-feature h4 {
    color: #000;
    font-size: 20px !important;
}
}


@media (max-width: 768px){

  /* .enterprise-custome-softawere-devlopment-software-service-page-pagination-section{
    padding:50px 15px;
  } */
.brand-slider-section-service-page h2 {
    font-size: 30px;}
    
  .software-pagination-track{
    gap:20px;
  }

  .software-page-card{
        flex: 0 0 100% !important;
        max-width: 100% !important;
    padding:26px 20px;
  }

  .enterprise-custome-softawere-devlopment-software-service-page-pagination-section h2{
    font-size:26px;
    line-height:1.3;
  }

  .enterprise-custome-softawere-devlopment-software-service-page-pagination-section p.itlc{
    font-size:14px;
  }

  .software-page-card h3{
    font-size:18px;
  }

  .software-page-card p{
    font-size:14px;
  }

  .software-page-btn{
    bottom:-45px;
    width:46px;
    height:46px;
    font-size:22px;
  }

  .software-page-btn.prev{
    transform:translateX(-55px);
  }

  .software-page-btn.next{
    transform:translateX(10px);
  }
}

@media (max-width: 768px){

  .advance-technoloy-in-service-page{
    padding:60px 15px;
  }

  .advance-technoloy-in-service-page-grid{
    grid-template-columns:1fr;
    gap:20px;
  }

  .advance-technoloy-in-service-page-card{
    height:auto;
    min-height:260px;
  }

  .advance-technoloy-in-service-page-front{
    bottom:20px;
    left:20px;
  }

  .advance-technoloy-in-service-page-front h3{
    font-size:20px;
  }

  .advance-technoloy-in-service-page-icon{
    width:45px;
    height:45px;
    font-size:20px;
  }

  .advance-technoloy-in-service-page h2{
    font-size:26px;
    line-height:1.3;
  }

  .advance-technoloy-in-service-page p{
    font-size:14px;
  }
}

@media (max-width: 992px){

  .software-devlopment-soluction-servicepage{
    padding:30px 15px;
  }

  .software-devlopment-soluction-servicepage-software-hero{
    padding:40px 40px;
    border-radius:20px;
  }

  .software-devlopment-soluction-servicepage-software-hero-content{
    max-width:100%;
  }

  .software-devlopment-soluction-servicepage-software-hero-content h2{
    font-size:28px;
    line-height:1.3;
  }

  .software-devlopment-soluction-servicepage-software-hero-content p{
    font-size:16px;
    margin-bottom:25px;
  }
}
@media (max-width: 576px){

  .service-page-below-the-counter-tab-item{
    font-size:16px;
    line-height:1.3;
  }

  .service-page-below-the-counter-content h2{
    font-size:22px;
  }

  .service-page-below-the-counter-content p{
    font-size:14px;
  }

  .service-page-below-the-counter-content img{
    width:48px;
    height:48px;
  }
}
@media (max-width: 576px){

  .buid-service-videosection-service-page-cta{
    padding:22px 18px;
    border-radius:22px;
  }

  .buid-service-videosection-service-page-cta-content h2{
    font-size:22px;
    line-height:1.3;
  }

  .buid-service-videosection-service-page-cta-content p{
    font-size:14px;
  }

  a.buid-service-videosection-service-page-btn{
    padding:12px 20px;
    font-size:14px;
  }

  .buid-service-videosection-service-page-video-banner img{
    height:220px;
  }

  .buid-service-videosection-service-page-play-btn{
    width:56px;
    height:56px;
    font-size:22px;
  }
   .buid-service-videosection-service-page-video-popup-content{
    width:90%;
  }

  .buid-service-videosection-service-page-video-popup-content iframe{
    height:240px;
  }
}


@media (max-width: 768px){

  .reson-to-trust-industry-page-container{
    grid-template-columns:1fr;
    text-align:center;
  }

  /* IMAGE SECTION */
  .reson-to-trust-industry-page-left{
    order:1;
    height:320px;
    margin-bottom:20px;
  }

  .reson-to-trust-industry-page-circle{
    width:260px;
    height:260px;
    top:20px;
    left:50%;
    transform:translateX(-50%);
  }

  .reson-to-trust-industry-page-runner{
    width:280px;
    left:50%;
    transform:translateX(-50%);
    bottom:0;
  }

  /* TEXT SECTION */
  .reson-to-trust-industry-page-right{
    order:2;
  }

  .reson-to-trust-industry-page-right h2{
    font-size:26px;
    line-height:1.3;
  }

  .reson-to-trust-industry-page-right p{
    font-size:14px;
    max-width:100%;
  }

  .reson-to-trust-industry-page-pills{
    grid-template-columns:1fr;
    justify-items:center;
  }

  .reson-to-trust-industry-page .pill{
    width:100%;
    max-width:320px;
    text-align:center;
  }

  .reson-to-trust-industry-page-btn{
    padding:14px 26px;
    font-size:14px;
  }
}


@media (max-width: 768px){

  .AI-powered-Recommendations-industry-page{
    padding:50px 0;
  }

  .AI-powered-Recommendations-industry-page-container{
    flex-direction:column;
  }

  /* TABS */
  .AI-powered-Recommendations-industry-page-tabs{
    width:100%;
    display:flex;
    overflow-x:auto;
    border-right:none;
    border-bottom:1px solid #e6e6e6;
  }

  .AI-powered-Recommendations-industry-page-tabs::-webkit-scrollbar{
    display:none;
  }

  .AI-powered-Recommendations-industry-page-tab{
    flex:0 0 auto;
    white-space:nowrap;
    font-size:14px;
    padding:14px 18px;
    border-bottom:none;
  }

  /* CONTENT */
  .AI-powered-Recommendations-industry-page-content{
    width:100%;
    padding:25px 20px;
  }

  .AI-powered-Recommendations-industry-page-panel span{
    font-size:36px;
  }

  .AI-powered-Recommendations-industry-page-panel h3{
    font-size:20px;
  }

  .AI-powered-Recommendations-industry-page-panel p{
    font-size:14px;
  }

  .AI-powered-Recommendations-industry-page-panel li{
    font-size:14px;
  }
}



@media (max-width: 768px){

  .roadmap-exceptional-indusrty-page-fitness-process{
    padding:50px 15px;
  }

  .roadmap-exceptional-indusrty-page-fitness-process-wrapper{
    flex-direction:column;
    padding:30px 20px;
    gap:30px;
  }

  /* LEFT STEPS → horizontal scroll */
  .roadmap-exceptional-indusrty-page-fitness-steps{
    width:100%;
    flex-direction:row;
    gap:20px;
    padding:20px;
    overflow-x:auto;
  }

  .roadmap-exceptional-indusrty-page-fitness-steps::before{
    display:none;
  }

  .roadmap-exceptional-indusrty-page-fitness-step{
    flex-direction:column;
    min-width:120px;
    text-align:center;
  }

  .roadmap-exceptional-indusrty-page-fitness-step p{
    max-width:none;
    font-size:14px;
  }

  /* RIGHT CONTENT */
  .roadmap-exceptional-indusrty-page-fitness-content{
    width:100%;
    text-align:left;
  }

  .roadmap-exceptional-indusrty-page-fitness-box h1{
    font-size:80px;
  }

  .roadmap-exceptional-indusrty-page-fitness-box h2{
    font-size:26px;
    margin-top:-40px;
  }

  .roadmap-exceptional-indusrty-page-fitness-box p{
    font-size:14px;
  }

  .roadmap-exceptional-indusrty-page-fitness-box ul li{
    font-size:14px;
    padding-left:22px;
  }

  .roadmap-exceptional-indusrty-page-fitness-box ul li::before{
    font-size:22px;
    top:0;
  }
}

</style>


<style>



/* our-offices-branch-contact-page SECTION */
.our-offices-branch-contact-page{
  background:linear-gradient(180deg,#031b3a,#052f63);
  padding:10px 20px;
  color:#fff;
  font-family:system-ui,sans-serif;
}

/* TOP CONTAINER */
.offices-container-branch-contact-page{
  max-width:1200px;
  margin:auto;
  display:flex;
  align-items:center;
  gap:40px;
}

/* LEFT TEXT */
.offices-text-branch-contact-page{
  flex:1;
}
.offices-text-branch-contact-page h2{
  font-size:42px;
  margin-bottom:15px;
}
.offices-text-branch-contact-page p{
  font-size:16px;
  line-height:1.6;
  color:#cfe4ff;
}

.offices-map-branch-contact-page{
  flex:1.2;
  position:relative;
}
.offices-map-branch-contact-page img{
  width:100%;
  opacity:0.7;
}

.our-offices-branch-contact-page .pin{
  position:absolute;
  width:16px;
  height:16px;
  background:#1e90ff;
  border-radius:50%;
  box-shadow:0 0 0 6px rgba(30,144,255,.3);
}
.our-offices-branch-contact-page .pin::after{
  content:"";
  position:absolute;
  top:18px;
  left:6px;
  width:4px;
  height:10px;
  background:#1e90ff;
}

/* PIN POSITIONS */
.our-offices-branch-contact-page .usa{top:45%;left:28%;}
.our-offices-branch-contact-page .uk{top:30%;left:50%;}
.our-offices-branch-contact-page .uae{top:48%;left:62%;}
.our-offices-branch-contact-page .india{top:42%;left:70%;}

/* CARDS WRAPPER */
.office-cards-branch-contact-page{
  max-width:1200px;
  margin:60px auto 0;
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:20px;
}

/* SINGLE CARD */
.office-card-branch-contact-page{
  background:#0a5fd7;
  padding:25px;
  border-radius:14px;
}

/* ICON + HEADING */
.office-head-branch-contact-page{
  display:flex;
  align-items:center;
  gap:12px;
  margin-bottom:10px;
}

.office-icon-branch-contact-page{
  width:28px;
  height:28px;
  border-radius:50%;
  background:#fff;
  padding:3px;
  object-fit:contain;
}

.office-head-branch-contact-page h4{
  margin:0;
  font-size:16px;
  font-weight:600;
  color:#fff;
}

/* ADDRESS TEXT */
.office-card-branch-contact-page p{
  font-size:14px;
  line-height:1.6;
  color:#eaf3ff;
}

/* RESPONSIVE */
@media(max-width:992px){
  .offices-container-branch-contact-page{
    flex-direction:column;
    text-align:center;
  }
  .office-cards-branch-contact-page{
    grid-template-columns:repeat(2,1fr);
  }
}

@media(max-width:576px){
  .office-cards-branch-contact-page{
    grid-template-columns:1fr;
  }
}





.let-build-somthing-hero-wrapper{
  background:#022859;
  padding:10px 30px;
}


.let-build-somthing-hero-inner{
  position:relative;        
  background:#022859;
  border-radius:30px;
  min-height:420px;
  overflow:hidden;
  display:flex;
  align-items:center;
}

/* IMAGE — RIGHT SIDE, CARD KE ANDAR */
.let-build-somthing-hero-image{
  position:absolute;
  top:0;
  right:0;
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;
  z-index:1;
}

.let-build-somthing-hero-image img{
  max-width:100%;
  height:auto;
  display:block;
}

/* CONTENT — IMAGE KE UPAR */
.let-build-somthing-hero-content{
  position:relative;
  z-index:2;
  max-width:520px;
  padding:60px;
  color:#fff;
}

.let-build-somthing-hero-content h1{
  font-size:48px;
  margin:0;
  font-weight:700;
}

.let-build-somthing-hero-content p{
  font-size:30px;
  margin:10px 0 30px;
  font-weight:300;
}

.let-build-somthing-hero-btn{
  display:inline-flex;
  align-items:center;
  background:#0d6efd;
  color:#fff;
  padding:14px 28px;
  border-radius:40px;
  text-decoration:none;
  font-size:16px;
}

/* MOBILE */
@media(max-width:768px){
  .let-build-somthing-hero-inner{
    flex-direction:column;
  }

  .let-build-somthing-hero-image{
    position:relative;
    width:100%;
    height:auto;
  }

  .let-build-somthing-hero-content{
    padding:40px 25px;
  }

  .let-build-somthing-hero-content h1{
    font-size:34px;
  }

  .let-build-somthing-hero-content p{
    font-size:22px;
  }
}


</style>


<style>
  .latest-insight-section{
  position:relative;
  padding:80px 0;
  background-image:url("images/bg-insight.jpg");
  background-size:cover;
  background-position:center;
}

/* overlay */
.latest-insight-section::before{
  content:"";
  position:absolute;
  inset:0;
  background:rgba(6,20,52,0.85);
}

.latest-insight-container{
  position:relative;
  z-index:2;
  max-width:1200px;
  margin:auto;
  padding:0 20px;
}

/* TOP BAR */
.latest-insight-top{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:40px;
}

.latest-insight-top h2 {
    color: #fff;
    font-size: 40px;
    margin: 0;
    font-weight: 700;
}

.view-btn{
  background:#fff;
  padding:10px 18px;
  border-radius:30px;
  font-size:14px;
  text-decoration:none;
  color:#000;
  font-weight:500;
}

/* CARDS */
.latest-insight-cards{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:24px;
}

.insight-card{
  background:#fff;
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 15px 40px rgba(0,0,0,0.2);
}

/* IMAGE */
.card-img{
  position:relative;
}
.card-img img{
  width:100%;
  height:180px;
  object-fit:cover;
}

.date{
  position:absolute;
  top:12px;
  right:12px;
  background:#2b6cff;
  color:#fff;
  padding:6px 10px;
  border-radius:8px;
  font-size:12px;
  text-align:center;
  line-height:1.2;
}

/* CONTENT */
.card-content{
  padding:18px;
}
.card-content h3{
  font-size:16px;
  margin:0 0 8px;
  color:#292929;
}
.card-content p{
  font-size:13px;
  color:#666;
  margin:0;
}

/* RESPONSIVE */
@media(max-width:992px){
  .latest-insight-cards{
    grid-template-columns:repeat(2,1fr);
  }
}
@media(max-width:576px){
  .latest-insight-cards{
    grid-template-columns:1fr;
  }
  .latest-insight-top{
    flex-direction:column;
    gap:16px;
    align-items:flex-start;
  }
}
</style>



<style>
.our-wall-of-fame-home-page-award-section{
  background:#bcdcff;
  padding:60px 0 40px;
}

.our-wall-of-fame-home-page-award-track{
  display:flex;
  gap:20px;
  padding:0 20px;
  overflow-x:auto;
  scroll-snap-type:x mandatory;
  scrollbar-width:none;
}

.our-wall-of-fame-home-page-award-track::-webkit-scrollbar{
  display:none;
}

/* .our-wall-of-fame-home-page-award-card{
  min-width:220px;
  background:#cfe6ff;
  border:2px solid #2b6fff;
  border-radius:18px;
  padding:30px 20px;
  text-align:center;
  scroll-snap-align:start;
  flex-shrink:0;
} */

.our-wall-of-fame-home-page-award-card {
    min-width: 298px;
    background: #cfe6ff;
    border: 2px solid #2b6fff;
    border-radius: 18px;
    padding: 30px 20px;
    text-align: center;
    scroll-snap-align: unset;
    flex-shrink: 14;
}

.our-wall-of-fame-home-page-award-card img{
  width:90px;
  margin-bottom:16px;
}

.our-wall-of-fame-home-page-award-card h3{
  font-size:18px;
  margin-bottom:6px;
}

.our-wall-of-fame-home-page-award-card p{
  font-size:14px;
  line-height:1.6;
  color:#333;
}

/* dots */
.our-wall-of-fame-home-page-award-dots{
  display:flex;
  justify-content:center;
  gap:8px;
  margin-top:20px;
}

.our-wall-of-fame-home-page-award-dots span{
  width:8px;
  height:8px;
  background:#c7d6e6;
  border-radius:50%;
  cursor:pointer;
}

.our-wall-of-fame-home-page-award-dots span.active{
  background:#1f6fff;
}
.our-wall-of-fame-home-page-award-section h1 {
    text-align: center;
    font-size: 40px;
    font-weight: 700;
    color: #0C2347;
}
</style>