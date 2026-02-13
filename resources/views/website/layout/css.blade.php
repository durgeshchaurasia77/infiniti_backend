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
  padding:24px 50px;
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
    margin-bottom: 0px;
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
  font-size:25px;
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


    .navy-services__heading h2 {
        font-size: 25px;
        line-height: 30px;
    }
    .navy-service-card {
    width: 335px;
}
.our-wall-of-fame-home-page-award-section h1 {
    font-size: 25px !important;
}

}

        </style>

        <style>
           .navy-testimonial-slider{
                padding: 100px 20px;
                }


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


                .navy-slider-viewport{
                overflow:visible;
                }

                .navy-slider-track{
                display:flex;
                gap:24px;
                transition:transform .5s ease;
                }


                .navy-testimonial-card{
                min-width: calc(33.333% - 16px);
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


.offices-text-branch-contact-page{
  flex:1;
}
.offices-text-branch-contact-page h2{
  font-size:40px;
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


.our-offices-branch-contact-page .usa{top:45%;left:28%;}
.our-offices-branch-contact-page .uk{top:30%;left:50%;}
.our-offices-branch-contact-page .uae{top:48%;left:62%;}
.our-offices-branch-contact-page .india{top:42%;left:70%;}

.office-cards-branch-contact-page{
  max-width:1200px;
  margin:60px auto 0;
  display:flex;
  grid-template-columns:repeat(4,1fr);
  gap:20px;
}

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

.office-card-branch-contact-page p{
  font-size:16px;
  line-height:1.6;
  color:#eaf3ff;

}

@media(max-width:992px){
  .offices-container-branch-contact-page{
    flex-direction:column;
    text-align:center;
  }
  .office-cards-branch-contact-page {
    max-width: 1200px;
    margin: 28px auto 0px;
    display: block;
}
.office-card-branch-contact-page {
    background: #0a5fd7;
    padding: 25px;
    border-radius: 14px;
    margin: 15px;
}
.offices-text-branch-contact-page p {
    padding: 0px 10px;
}

}



/* ===== WRAPPER ===== */
.let-build-somthing-hero-wrapper{
  background:#022859;
  padding:10px 30px;
}

/* ===== HERO CARD ===== */
.let-build-somthing-hero-inner{
  position:relative;
  background:#022859;
  border-radius:30px;
  min-height:420px;
  overflow:hidden;
  display:flex;
  align-items:center;
}

/* ===== IMAGE (NOT FULL SECTION) ===== */
.let-build-somthing-hero-image{
  position:absolute;
  top:0;
  right:0;
  width:55%;              /* ❗ NOT FULL */
  height:100%;
  z-index:1;
  position:relative;
}

.let-build-somthing-hero-image img{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
  position:relative;
  z-index:1;
}

/* ===== SOFT GRADIENT (LIMITED) ===== */
.let-build-somthing-hero-image::after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(
    90deg,
    rgba(2,40,89,0.95) 0%,
    rgba(2,40,89,0.85) 25%,
    rgba(2,40,89,0.55) 45%,
    rgba(13,110,253,0.25) 65%,
    rgba(13,110,253,0.10) 85%,
    rgba(13,110,253,0.05) 100%
  );
  z-index:2;
}

/* ===== CONTENT (LEFT + OVER IMAGE) ===== */
.let-build-somthing-hero-content{
  position:relative;
  z-index:3;
  max-width:520px;
  padding:60px;
  color:#fff;
  text-align:left;
}

/* ===== TEXT ===== */
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

/* ===== BUTTON ===== */
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

/* ===== MOBILE ===== */
@media(max-width:768px){
  .let-build-somthing-hero-inner{
    flex-direction:column;
    min-height:auto;
  }

  .let-build-somthing-hero-image{
    width:100%;
    height:240px;
  }

  .let-build-somthing-hero-content{
    padding:30px 20px;
    text-align:center;
  }

  .let-build-somthing-hero-content h1{
    font-size:32px;
  }

  .let-build-somthing-hero-content p{
    font-size:20px;
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
  background:#102442;
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
    color: #fff;
}
</style>



<style>
.common-section-everypage-blog-listing-section{
  padding:70px 0;
  background:#f8f9fc;
}

.common-section-everypage-blog-listing-section h2{
  text-align:center;
  margin-bottom:40px;
  font-size:40px;
     color: #102442;
}

.common-section-everypage-blog-listing-wrapper{
  position:relative;
  max-width:1200px;
  margin:auto;
  overflow:hidden;
}

.common-section-everypage-blog-listing-track{
  display:flex;
  gap:24px;
  transition:transform .6s cubic-bezier(.22,.61,.36,1);
}
.common-section-everypage-blog-listing-card{
  flex:0 0 calc(100% / 3 - 16px);
  background:#fff;
  border-radius:14px;
  padding:16px;
  box-shadow:0 10px 30px rgba(0,0,0,.08);
  transition:.3s;
}

.common-section-everypage-blog-listing-card:hover{
  transform:translateY(-6px);
  box-shadow:0 18px 40px rgba(0,0,0,.12);
}

.common-section-everypage-blog-listing-video-thumb{
  position:relative;
  border-radius:8px;
  overflow:hidden;
}

.common-section-everypage-blog-listing-video-thumb img{
  width:100%;
  display:block;
}

.common-section-everypage-blog-listing-play-btn{
  position:absolute;
  inset:0;
  display:flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
  background:rgba(0,0,0,.25);
}

.common-section-everypage-blog-listing-play-btn::before{
  content:"▶";
  width:64px;
  height:64px;
  border-radius:50%;
  background:rgba(0,0,0,.65);
  color:#fff;
  font-size:28px;
  display:flex;
  align-items:center;
  justify-content:center;
  transition:.3s;
}

.common-section-everypage-blog-listing-play-btn:hover::before{
  transform:scale(1.12);
}

.common-section-everypage-blog-listing-card p{
  font-size:18px;
  line-height:1.6;
  margin:16px 0;
  color:#102442;
}

.common-section-everypage-blog-listing-user{
  display:flex;
  align-items:center;
  gap:10px;
}

.common-section-everypage-blog-listing-user img{
  width:40px;
  height:40px;
  border-radius:50%;
  display: none;
}

.common-section-everypage-blog-listing-user span{
  display:block;
  font-size:13px;
  color:#666;
}

.common-section-everypage-blog-listing-nav-btn{
  position:absolute;
  top:45%;
  width:45px;
  height:45px;
  border-radius:50%;
  border:none;
  background:#fff;
  font-size:32px;
  cursor:pointer;
  box-shadow:0 5px 15px rgba(0,0,0,.15);
  z-index:5;
}

.common-section-everypage-blog-listing-nav-btn.prev{left:-20px; color: #022859;}
.common-section-everypage-blog-listing-nav-btn.next{right:-20px; color: #022859;}

.common-section-everypage-blog-listing-video-popup{
  position:fixed;
  inset:0;
  display:none;
  align-items:center;
  justify-content:center;
  z-index:9999;
}

.common-section-everypage-blog-listing-video-popup.active{
  display:flex;
}


.common-section-everypage-blog-listing-popup-overlay{
  position:absolute;
  inset:0;
  background:rgba(0,0,0,.75);
}


.common-section-everypage-blog-listing-popup-content{
  position:relative;
  width:90%;
  max-width:900px;
  aspect-ratio:16 / 9;
  background:#000;
  border-radius:12px;
  overflow:hidden;
  box-shadow:0 20px 60px rgba(0,0,0,.6);
}

.common-section-everypage-blog-listing-popup-content iframe{
  width:100%;
  height:100%;
  border:none;
  background:#000;
}


.common-section-everypage-blog-listing-popup-close{
  position:absolute;
  top: 0px;
  right: 16px;
  font-size:32px;
  color:#fff;
  cursor:pointer;
}


.common-section-everypage-blog-listing-popup-video-icon{
  position:absolute;
  top:-58px;
  left:50%;
  transform:translateX(-50%);
  width:70px;
  height:70px;
  border-radius:50%;
  background:rgba(0,0,0,.65);
  color:#fff;
  font-size:40px;
  display:flex;
  align-items:center;
  justify-content:center;
  pointer-events:none;
}
@media (max-width: 768px){

  .common-section-everypage-blog-listing-wrapper{
    padding: 0 48px;
  }

  .common-section-everypage-blog-listing-track{
    gap:16px;
  }

  .common-section-everypage-blog-listing-card{
    flex: 0 0 100%;
  }


  .common-section-everypage-blog-listing-nav-btn{
    top:50%;
    transform: translateY(-50%);
    width:38px;
    height:38px;
    font-size:26px;
  }

  .common-section-everypage-blog-listing-nav-btn.prev{
    left:8px;
  }

  .common-section-everypage-blog-listing-nav-btn.next{
    right:8px;
  }
}


</style>


    <style>

html{
  scroll-behavior:smooth;
}

.case-section-section-slide{
  position:relative;
  height:calc(var(--slides) * 100vh);
  background:linear-gradient(180deg,#071a2f,#0a2540);
  color:#fff;
}

.case-inner-section-slide{
  padding:80px 0 30px;
}
.container-section-slide{
  max-width:1200px;
  margin:auto;
  padding:0 20px;
}
.case-top-section-slide{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:40px;
}
.case-title-section-slide h1{
  font-size:44px;
  line-height:1.2;
}

.case-actions-section-slide{
  display:flex;
  gap:14px;
}

.btn-primary-case-actions-section{
  background:#fff;
  border:none;
  padding:12px 28px;
  border-radius:999px;
  color:#2563eb;
  font-size:13px;
  box-shadow:0 10px 25px rgba(37,99,235,.35);
  text-decoration: none;
  font-weight: 400;
}
.btn-outline-case-actions-section{
  padding:12px 28px;
  border-radius:999px;
  font-size:13px;
  color:#fff;
  border:1px solid rgba(255,255,255,.35);
  background:transparent;
  text-decoration: none;
  font-weight: 400;
}

.case-tabs-section-slide{
  display:flex;
  gap:26px;
  border-bottom:1px solid rgba(255,255,255,.2);
}
.tab-features-section-slide{
  background:none;
  border:none;
  color:#fff;
  font-size:14px;
  padding-bottom:12px;
  cursor:pointer;
  position:relative;
}
.tab-features-section-slide.active{
  color:#fff;
}
.tab-features-section-slide.active::after{
  content:"";
  position:absolute;
  left:50%;
  bottom:-10px;
  width:100%;
  height:2px;
  transform:translateX(-50%);
  background:#fff;
}

.case-content-section-slide{
  position: relative;
  top: -50px;
  height:calc(100vh - 260px);
  overflow:hidden;
}

.case-item-section-slide{
  position:absolute;
  inset:0;
  display:flex;
  align-items:center;
  opacity:0;
  pointer-events:none;
  transition:opacity .6s ease;
}
.case-item-section-slide.active{
  opacity:1;
  pointer-events:auto;
}

.case-overlay-section-slide{
  max-width:1200px;
  margin:auto;
  padding:0 20px;
  display:grid;
  grid-template-columns:0.4fr 0.6fr;
  gap:60px;
}

.case-text-section-slide h3{
  font-size:34px;
  font-weight:700;
  margin-bottom:16px;
}
.case-text-section-slide p{
  max-width:420px;
  font-size:15px;
  line-height:1.7;
  color:#cbd5e1;
  margin-bottom:24px;
}
.case-buttons-section-slide{
  display:flex;
  gap:16px;
  flex-wrap:wrap;
}
.case-media-section-slide img{
  width:100%;
  border-radius:5px;
  box-shadow:0 30px 80px rgba(0,0,0,.45);
  max-height: 350px;
}
.case-text-section-slide > *{
  opacity:1;
  transform:translateY(20px);
  transition:.6s ease;
}
.case-item-section-slide.active .case-text-section-slide > *{
  opacity:1;
  transform:translateY(0);
}
.case-item-section-slide.active h3{ transition-delay:.2s }
.case-item-section-slide.active p{ transition-delay:.35s }
.case-item-section-slide.active .case-buttons-section-slide{ transition-delay:.5s }
@media (max-width:991px){

  .case-title-section-slide h1{
    font-size:26px;
  }

  .case-inner-section-slide{
    padding:50px 0 20px;
  }


  .case-section-section-slide{
    height:auto;
  }

  .case-content-section-slide{
    position:relative;
    top:0;
    height:auto;
  }

  .case-item-section-slide{
    position:relative;
    opacity:1;
    pointer-events:auto;
    margin-bottom:60px;
  }

  .case-item-section-slide.active{
    opacity:1;
  }



  .case-tabs-section-slide{
    gap:14px;
    overflow-x:auto;
    white-space:nowrap;
    overflow-y: hidden;
  }

  .case-overlay-section-slide{
    grid-template-columns:1fr;
    gap:24px;
  }

  .btn-primary,
  .btn-outline{
    padding:10px 20px;
    font-size:13px;
  }
}

@media (max-width:480px){

  .case-content-section-slide{
    top:45px;
  }

  .case-title-section-slide h1{
    font-size:22px;
  }

  .case-top-section-slide{
    flex-direction:column;
    align-items:flex-start;
    gap:20px;
  }
  .navy-services {
    padding: 10px 32px !important;
}
}



</style>


<style>
  body {
  font-family: 'Poppins', sans-serif;
}

 /* ===== MAIN SECTION ===== */
.digital-marketing-page-marketing-strategies-main{
  padding: 80px 20px;
  background:#fff;
}

/* ===== WRAPPER ===== */
.digital-marketing-page-marketing-strategies-case-wrapper{
  max-width:1200px;
  margin:auto;
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:60px;
  align-items:center;
}

/* ===== LEFT ===== */
.digital-marketing-page-marketing-strategies-case-left h2{
  font-size:36px;
  line-height:1.25;
  margin-bottom:40px;
  color: #0C2347;
}

.digital-marketing-page-marketing-strategies-case-image{
  border-radius:24px;
  padding:40px;
  position:relative;
  overflow:hidden;
}

.digital-marketing-page-marketing-strategies-case-image img{
  width:100%;
  display:block;
  transition:opacity .3s ease;
}

/* ===== RIGHT ===== */
.digital-marketing-page-marketing-strategies-case-tabs{
  list-style:none;
  padding:0;
  margin:0 0 40px;
}

.digital-marketing-page-marketing-strategies-case-tabs li{
  padding:10px 0 10px 16px;
  cursor:pointer;
  color:#333;
  position:relative;
  font-size:15px;
}

.digital-marketing-page-marketing-strategies-case-tabs li::before{
  content:"";
  position:absolute;
  left:0;
  top:0;
  width:2px;
  height:100%;
  background:#ddd;
}

.digital-marketing-page-marketing-strategies-case-tabs li.active{
  color:#1e88e5;
  font-weight:600;
}

.digital-marketing-page-marketing-strategies-case-tabs li.active::before{
  background:#1e88e5;
}

/* ===== STATS ===== */
.digital-marketing-page-marketing-strategies-stats{
  display:flex;
  gap:20px;
  margin-bottom:25px;
}

.digital-marketing-page-marketing-strategies-stat-box{
  background:#1e88e5;
  color:#fff;
  padding:26px 22px;
  border-radius:18px;
  width:180px;
}

.digital-marketing-page-marketing-strategies-stat-box h3{
  margin:0;
  font-size:32px;
  font-weight:700;
}

.digital-marketing-page-marketing-strategies-stat-box p{
  margin:6px 0 0;
  font-size:14px;
  line-height:1.3;
}

/* ===== DESCRIPTION ===== */
#digital-marketing-page-marketing-strategies-caseDesc{
  max-width:420px;
  color:#555;
  line-height:1.6;
  margin-bottom:24px;
}

/* ===== BUTTON ===== */
.digital-marketing-page-marketing-strategies-case-right .btn{
  display:inline-block;
  background:#1e88e5;
  color:#fff;
  padding:12px 26px;
  border-radius:30px;
  font-size:14px;
  text-decoration:none;
}

/* ===== RESPONSIVE ===== */
@media(max-width:900px){
  .digital-marketing-page-marketing-strategies-case-wrapper{
    grid-template-columns:1fr;
    text-align:center;
  }

  .digital-marketing-page-marketing-strategies-stats{
    justify-content:center;
  }

  .digital-marketing-page-marketing-strategies-case-tabs{
    text-align:left;
    max-width:280px;
    margin:0 auto 30px;
  }
}


/* ================= SECTION ================= */
.digital-marketing-page-satisfide-clients-stats-section{
  background:
    radial-gradient(circle at center, rgba(0,30,60,0.6), #020817 70%),
    url("./img/count_cta.png') }}");
  background-size: cover;
  background-position: left bottom;
  background-repeat: no-repeat;
  padding: 80px 0;
  color: #fff;
}

/* ================= CONTAINER ================= */
.digital-marketing-page-satisfide-clients-stats-container{
  max-width: 1200px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
}

/* ================= LEFT STATS ================= */
.digital-marketing-page-satisfide-clients-stats-left{
  display: flex;
  gap: 60px;
}

.digital-marketing-page-satisfide-clients-stat-box h2{
  font-size: 48px;
  margin: 0;
  font-weight: 700;
}

.digital-marketing-page-satisfide-clients-stat-box p{
  margin-top: 6px;
  font-size: 14px;
  color: #cbd5e1;
}

/* ================= RIGHT CIRCLES WRAPPER ================= */
.digital-marketing-page-satisfide-clients-stats-right{
  position: relative;
  width: 360px;
  height: 280px;
}

/* ================= COMMON CIRCLE ================= */
.digital-marketing-page-satisfide-clients-circle{
  position: absolute;
  border-radius: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-weight: 600;
  box-sizing: border-box;
}

.digital-marketing-page-satisfide-clients-circle h3{
  margin: 0;
  font-size: 32px;
}

.digital-marketing-page-satisfide-clients-circle span{
  font-size: 12px;
}

/* ================= INDIVIDUAL CIRCLES ================= */
.circle-one{
  width: 206px;
  height: 193px;
  background: #7cf9ff;
  color: #000;
  top: 0;
  left: -16px;
  border: 2px solid rgba(0,0,0,0.4);
}

.circle-two{
  width: 160px;
  height: 160px;
  background: #4dbbff;
  color: #000;
  top: 56px;
  right: 28px;
  border: 2px solid rgba(0,0,0,0.4);
}

.circle-three{
  width: 130px;
  height: 130px;
  background: #ffc83d;
  color: #000;
  bottom: 0;
  left: 33px;
  border: 2px solid rgba(0,0,0,0.4);
}

@media (max-width: 767px){

  /* SECTION */
  .digital-marketing-page-satisfide-clients-stats-section{
    padding: 60px 0;
    background-position: center bottom;
  }

  /* STACK LAYOUT */
  .digital-marketing-page-satisfide-clients-stats-container{
    flex-direction: column;
    text-align: center;
    gap: 50px;
  }

  /* LEFT STATS */
  .digital-marketing-page-satisfide-clients-stats-left{
    justify-content: center;
    gap: 30px;
  }

  .digital-marketing-page-satisfide-clients-stat-box h2{
    font-size: 36px;
  }

  /* CIRCLES CENTER */
  .digital-marketing-page-satisfide-clients-stats-right{
    width: 280px;
    height: 240px;
  }

  /* SCALE DOWN CIRCLES */
  .circle-one{
    width: 180px;
    height: 170px;
    left: 10px;
  }

  .circle-two{
    width: 145px;
    height: 145px;
    right: 0;
    top: 50px;
  }

  .circle-three{
    width: 120px;
    height: 120px;
    left: 40px;
  }

  /* TEXT SCALE */
  .digital-marketing-page-satisfide-clients-circle h3{
    font-size: 26px;
  }

  .digital-marketing-page-satisfide-clients-circle span{
    font-size: 11px;
  }
}



.digital-marketing-page-why-partner-section {
  padding: 70px 20px;
  text-align: center;
}

.digital-marketing-page-why-partner-section h2 {
  font-size: 36px;
  margin-bottom: 10px;
  color: #000;
}

.digital-marketing-page-why-partner-subtitle {
  color: #666;
  max-width: 600px;
  margin: 0 auto 50px;
}

.digital-marketing-page-why-partner-partner-cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
  max-width: 1200px;
  margin: auto;
}

.digital-marketing-page-why-partner-partner-card {
   position: relative;
     padding: 42px 23px 23px;
  border-radius: 14px;
  height: 200px;
}
.digital-marketing-page-why-partner-partner-card:nth-child(2) {
  height: 255px;
}
.digital-marketing-page-why-partner-partner-card:nth-child(2) {
  transform: translateY(10px);
}
.digital-marketing-page-why-partner-partner-card h3 {
    font-size: 25px;
    margin-bottom: 15px;
    font-weight: 600;
    color: #000;
}

.digital-marketing-page-why-partner-partner-card p {
  font-size: 18px;
  color: #555;
  line-height: 1.6;
}


.card-orange { background: #fff2e6; }
.card-pink   { background: #ffe9ee;     margin-top: 32px}
.card-blue   { background: #e9f7ff; }


.digital-marketing-page-why-partner-partner-icon-box {
  position: absolute;
  top: -28px;
  left: 50%;
  transform: translateX(-50%);
  width: 56px;
  height: 56px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 22px;
}
.digital-marketing-page-why-partner-partner-icon-box img {
    width: 89px;
    height: 59px;
    /* object-fit: contain; */
}


/*.icon-box.orange-card { background: #f4a261; }
.icon-box.pink        { background: #f76c8c; }
.icon-box.blue */       { background: #4dabf7; }


@media (max-width: 900px) {
  .digital-marketing-page-why-partner-partner-cards {
    grid-template-columns: 1fr;
  }

  .digital-marketing-page-why-partner-partner-card {
    height: auto;
  }
}










.bespok-digital-marketing-page-ppc-section {
  padding: 30px 20px;
  background: #fff;
}

.bespok-digital-marketing-page-ppc-section h1 {
  text-align: center;
  max-width: 900px;
  margin: 0 auto 60px;
  color: #0C2347;
  font-size: 36px;
}

.bespok-digital-marketing-page-ppc-container {
  max-width: 1200px;
  margin: auto;
  display: flex;
  align-items: center;
  gap: 60px;
}


.bespok-digital-marketing-page-ppc-content {
  flex: 0 0 40%;
  max-width: 40%;
}


.bespok-digital-marketing-page-ppc-image {
  flex: 0 0 60%;
  max-width: 60%;
  display: flex;
  justify-content: center;
}

.bespok-digital-marketing-page-ppc-tag {
  font-size: 60px;
  font-weight: 700;
  color: #e6e6e6;
  display: block;
  margin-bottom: 10px;
}

.bespok-digital-marketing-page-ppc-content h2 {
  font-size: 34px;
  margin-bottom: 25px;
  color: #000;
}

.bespok-digital-marketing-page-ppc-list {
  list-style: none;
  padding: 0;
  margin: 0 0 30px;
}

.bespok-digital-marketing-page-ppc-list li {
  position: relative;
  padding-left: 28px;
  margin-bottom: 18px;
  font-size: 16px;
  color: #333;
  line-height: 1.6;
}

.bespok-digital-marketing-page-ppc-list li::before {
  content: "";
  width: 10px;
  height: 10px;
  background: #0a66ff;
  border-radius: 50%;
  position: absolute;
  left: 0;
  top: 8px;
}


.bespok-digital-marketing-page-ppc-btn {
  display: inline-block;
  background: #0a66ff;
  color: #fff;
  padding: 14px 28px;
  border-radius: 30px;
  text-decoration: none;
}


.bespok-digital-marketing-page-ppc-image img {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.bespok-digital-marketing-page-ppc-container.reverse {
  flex-direction: row-reverse;
}


@media (max-width: 900px) {
  .bespok-digital-marketing-page-ppc-container {
    flex-direction: column;
    text-align: center;
  }

  .bespok-digital-marketing-page-ppc-content,
  .bespok-digital-marketing-page-ppc-image {
    flex: 0 0 100%;
    max-width: 100%;
  }

  .bespok-digital-marketing-page-ppc-list li {
    padding-left: 0;
  }

  .bespok-digital-marketing-page-ppc-list li::before {
    display: none;
  }
}









.digital-marketing-page-services-slider-section{
  padding:70px 0;
}

.digital-marketing-page-services-slider-wrapper{
  max-width:1200px;
  margin:auto;
  position:relative;
  overflow:hidden;
}

.digital-marketing-page-services-slider-track{
  display:flex;
  transition:0.6s ease;
}

.digital-marketing-page-service-slide{
  min-width:100%;
  display:grid;
  grid-template-columns:1fr 1fr;
  align-items:center;
  gap:40px;
}

/* LEFT CONTENT */
.digital-marketing-page-service-left{
  max-width:480px;
}

.digital-marketing-page-service-tag{
  font-size:72px;
  font-weight:800;
  color:#e6e6e6;
  display:block;
  line-height:1;
  margin-bottom:10px;
}

.digital-marketing-page-service-left h2{
  font-size:32px;
  margin-bottom:18px;
  color: #0C2347;
}

/* BULLET LIST */
.digital-marketing-page-service-left ul{
  list-style:none;
  padding:0;
  margin:22px 0;
}

.digital-marketing-page-service-left ul li{
  position:relative;
  padding-left:26px;
  margin-bottom:14px;
  line-height:1.6;
  color: #000;
}

.digital-marketing-page-service-left ul li::before{
  content:"";
  width:10px;
  height:10px;
  background:#0b5cff;
  border-radius:50%;
  position:absolute;
  left:0;
  top:8px;
}

/* BUTTON */
.digital-marketing-page-service-btn{
  display:inline-block;
  margin-top:20px;
  background:#0b5cff;
  color:#fff;
  padding:12px 28px;
  border-radius:30px;
  text-decoration:none;
  font-size:14px;
}

/* RIGHT IMAGE */
.digital-marketing-page-service-right img{
  max-width:100%;
  display:block;
}

/* NAV */
.digital-marketing-page-slider-nav{
  display:flex;
  justify-content:center;
  gap:20px;
  margin-top:30px;
}

.digital-marketing-page-slider-nav button{
  width:44px;
  height:44px;
  border-radius:50%;
  border:1px solid #333;
  background:#0C2347;
  cursor:pointer;
}





.digital-marketing-page-our-process{
  background:#0c0b1e;
  padding:80px 0 160px;
  color:#fff;
  overflow:hidden;
}

.digital-marketing-page-process-wrap{
  max-width:1200px;
  margin:auto;
  text-align:center;
  position:relative;
}

.digital-marketing-page-our-process h2{
  font-size:34px;
  margin-bottom:10px;
}

.digital-marketing-page-process-desc{
  max-width:780px;
  margin:0 auto 50px;
  font-size:13px;
  opacity:.85;
}

/* ================= CARDS ================= */
.digital-marketing-page-process-cards{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:26px;
  position:relative;
  z-index:10;
  margin-bottom:-70px;
}

.digital-marketing-page-card{
  background:#fff;
  color:#000;
  padding:22px;
  border-radius:10px;
  position:relative;
  min-height:230px;
}

.digital-marketing-page-card img{
  width:30px;
  margin-bottom:10px;
}

.digital-marketing-page-card h4{
  font-size:14px;
  margin-bottom:8px;
}

.digital-marketing-page-card p{
  font-size:12px;
  color:#555;
}

.digital-marketing-page-card .arrow{
  position:absolute;
  bottom:-12px;
  left:50%;
  transform:translateX(-50%);
  border-left:9px solid transparent;
  border-right:9px solid transparent;
  border-top:12px solid #fff;
}

/* ================= CURVE ================= */
.digital-marketing-page-curve-area{
  margin-top:65px;
  position:relative;
  z-index:5;
}

.digital-marketing-page-curve-area svg{
  width:100%;
  height:150px;
}

/* ================= STEPS ================= */
.digital-marketing-page-step{
  position:absolute;
  bottom:95px;
  font-size:11px;
  font-weight:600;
  color:#fff;
}

.digital-marketing-page-step::before{
  content:'';
  width:44px;
  height:44px;
  border-radius:50%;
  display:inline-block;
  margin-right:6px;
}

.digital-marketing-page-step.s1{
  left:10%;
  top:21px;
}
.digital-marketing-page-step.s2{
  left:36%;
  top:50px;
}
.digital-marketing-page-step.s3{
  left:61%;
  top:40px;
}
.digital-marketing-page-step.s4{
  left:87%;
  top:20px;
}

.digital-marketing-page-step.s1::before{background:#ff4d8d;}
.digital-marketing-page-step.s2::before{background:#ff9f1c;}
.digital-marketing-page-step.s3::before{background:#4dabf7;}
.digital-marketing-page-step.s4::before{background:#2ecc71;}

/* ================= ROCKET ================= */
.digital-marketing-page-curve-area .rocket{
  position:absolute;
  right:-30px;
  top:-17px;
  width:85px;
  transform:rotate(10deg);
}

/* ================= CTA ================= */
.digital-marketing-page-process-cta{
  background:#fff;
  color:#000;
  max-width:820px;
  margin:-25px auto 0;
  padding:26px;
  border-radius:12px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  box-shadow:0 10px 30px rgba(0,0,0,.35);
  position:relative;
  z-index:9;
}
.digital-marketing-page-process-cta h4{
color: #0C2347
}
.digital-marketing-page-process-cta p{
color: #000
}
.digital-marketing-page-process-cta img{
  width:150px;
}

.digital-marketing-page-process-cta a{
  display:inline-block;
  background:#2563eb;
  color:#fff;
  padding:8px 16px;
  border-radius:20px;
  font-size:12px;
  text-decoration:none;
}

/* ================= RESPONSIVE ================= */
@media(max-width:992px){
  .digital-marketing-page-process-cards{
    grid-template-columns:repeat(2,1fr);
    margin-bottom:-40px;
  }
}

@media(max-width:576px){
  .digital-marketing-page-process-cards{
    grid-template-columns:1fr;
    margin-bottom:0;
  }
  .digital-marketing-page-curve-area{
    display:none;
  }
  .digital-marketing-page-process-cta{
    margin:30px auto 0;
    flex-direction:column;
    text-align:center;
    gap:15px;
  }
}



</style>
