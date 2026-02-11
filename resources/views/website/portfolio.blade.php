@extends('website.layout.app')

{{-- @section('title', $serviceData->seo_title ?? $serviceData->title . ' | Infinit Tech Solution')
@section('meta_description',$serviceData->seo_description?? Str::limit(strip_tags($serviceData->short_description), 160))
@section('meta_keywords',$serviceData->seo_keywords ?? 'web development, mobile apps, seo services, infinit tech')
@section('canonical',url()->current())
@section('og_image',$serviceData->seo_image? asset($serviceData->seo_image): asset('images/default-og.jpg')) --}}

@section('content')
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
<section class="digital-marketing-page-marketing-strategies-main">

  <div class="digital-marketing-page-marketing-strategies-case-wrapper">

    <!-- LEFT -->
      <div class="digital-marketing-page-marketing-strategies-case-left">
     <h2>
    Marketing Strategies<br>
    That Produce Quantifiable<br>
    Results
  </h2>

  <div class="digital-marketing-page-marketing-strategies-case-image">
    <img id="digital-marketing-page-marketing-strategies-caseImg" src="{{ asset('website1/assets/images/turpentine-oil.jpeg') }}" alt="">
  </div>
</div>

    <!-- RIGHT -->
    <div class="digital-marketing-page-marketing-strategies-case-right">

      <!-- TABS -->
      <ul class="digital-marketing-page-marketing-strategies-case-tabs">
        <li data-tab="fit">Williamson Fit</li>
        <li data-tab="app" class="active">AppDukaan</li>
        <li data-tab="expo">Expo City Eats</li>
      </ul>

      <!-- STATS -->
      <div class="digital-marketing-page-marketing-strategies-stats">
        <div class="digital-marketing-page-marketing-strategies-stat-box">
          <h3 id="stat1">75%</h3>
          <p id="stat1Text">Increase Traffic by</p>
        </div>
        <div class="digital-marketing-page-marketing-strategies-stat-box">
          <h3 id="digital-marketing-page-marketing-strategies-stat2">90 Days</h3>
          <p id="digital-marketing-page-marketing-strategies-stat2Text">Time Improvement</p>
        </div>
      </div>

      <!-- TEXT -->
      <p id="digital-marketing-page-marketing-strategies-caseDesc">
        AppDukaan is among the leading providers of on-demand app solutions...
      </p>

      <a href="#" class="btn">Start Building →</a>

    </div>

  </div>
</section>


<section class="digital-marketing-page-satisfide-clients-stats-section">
  <div class="digital-marketing-page-satisfide-clients-stats-container">

    <!-- LEFT STATS -->
    <div class="digital-marketing-page-satisfide-clients-stats-left">
      <div class="digital-marketing-page-satisfide-clients-stat-box">
        <h2>250+</h2>
        <p>Satisfied Clients</p>
      </div>
      <div class="digital-marketing-page-satisfide-clients-stat-box">
        <h2>500+</h2>
        <p>Projects Delivered</p>
      </div>
    </div>

    <!-- RIGHT CIRCLES -->
    <div class="digital-marketing-page-satisfide-clients-stats-right">
      <div class="digital-marketing-page-satisfide-clients-circle circle-one">
        <h3>98%</h3>
        <span>Customer Success</span>
      </div>

      <div class="digital-marketing-page-satisfide-clients-circle circle-two">
        <h3>12+</h3>
        <span>Years of Experience</span>
      </div>

      <div class="digital-marketing-page-satisfide-clients-circle circle-three">
        <h3>1K+</h3>
        <span>Campaigns</span>
      </div>
    </div>

  </div>
</section>



<section class="digital-marketing-page-why-partner-section">
  <h2>Why Partner With Us?</h2>
  <p class="digital-marketing-page-why-partner-subtitle">
    We are Experts in Making Your Brand Visible Across Platforms
  </p>

  <div class="digital-marketing-page-why-partner-partner-cards">
    <div class="digital-marketing-page-why-partner-partner-card card-orange">
     <div class="digital-marketing-page-why-partner-partner-icon-box orange-card">
  <img src="{{ asset('website1/assets/images/campaign.png') }}" alt="Dedicated Management icon">
</div>

      <h3>Dedicated Management</h3>
      <p>
        Keep connected with a dedicated account manager to stay up-to-date
        with updates in strategy and implementation.
      </p>
    </div>

    <div class="digital-marketing-page-why-partner-partner-card card-pink">
      <div class="digital-marketing-page-why-partner-partner-icon-box pink">
        <img src="{{ asset('website1/assets/images/models.png') }}" alt="Dedicated Management icon">
      </div>
      <h3>Optimized Campaign Creation</h3>
      <p>
        Get weekly audits and monthly or bimonthly reports to improve the
        efficiency of your ad campaigns and increase customer retention rate
        and profitability.
      </p>
    </div>

    <div class="digital-marketing-page-why-partner-partner-card card-blue">
      <div class="digital-marketing-page-why-partner-partner-icon-box blue">
        <img src="{{ asset('website1/assets/images/dedicated.png') }}" alt="Dedicated Management icon">
      </div>
      <h3>Simple Pricing Models</h3>
      <p>
        We offer different pricing models to suit different business,
        strategy, market, and implementation requirements.
      </p>
    </div>

  </div>
</section>


<section class="bespok-digital-marketing-page-ppc-section">
  <h1>Bespoke Digital Marketing Consulting Services to Cater to All Your Business Needs</h1>
  <div class="bespok-digital-marketing-page-ppc-container">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">PPC</span>

      <h2>Pay Per Click</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/ppc.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>


<section class="bespok-digital-marketing-page-ppc-section">
  <div class="bespok-digital-marketing-page-ppc-container reverse">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">SEO</span>

      <h2>Serch Engine Optimeze</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/seo.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>



<section class="bespok-digital-marketing-page-ppc-section">
  <div class="bespok-digital-marketing-page-ppc-container ">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">SEO</span>

      <h2>Serch Engine Optimeze</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/ppc.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>


<section class="bespok-digital-marketing-page-ppc-section">
  <div class="bespok-digital-marketing-page-ppc-container reverse">

    <!-- LEFT CONTENT -->
    <div class="bespok-digital-marketing-page-ppc-content">
      <span class="bespok-digital-marketing-page-ppc-tag">SEO</span>

      <h2>Serch Engine Optimeze</h2>

      <ul class="bespok-digital-marketing-page-ppc-list">
        <li>Get more qualified leads with well-planned and research-backed campaigns</li>
        <li>Empower your organic SEO efforts with relevant and cost-efficient pay-per-click campaigns.</li>
        <li>Our digital marketing consultants help optimize PPC campaigns, reduce CPL, and increase qualified leads.</li>
      </ul>

      <a href="#" class="bespok-digital-marketing-page-ppc-btn">Build a PPC Campaign →</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="bespok-digital-marketing-page-ppc-image">
      <img src="{{ asset('website1/assets/images/seo.png') }}" alt="PPC Marketing">
    </div>

  </div>
</section>








<section class="digital-marketing-page-services-slider-section">

  <div class="digital-marketing-page-services-slider-wrapper">

    <!-- TRACK -->
    <div class="digital-marketing-page-services-slider-track" id="servicesTrack">

      <!-- SLIDE 1 -->
      <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/ppc.png') }}">
        </div>
      </div>

      <!-- SLIDE 2 -->
       <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>
      <!-- SLIDE 3 -->
       <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
           <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

      <!-- SLIDE 4 -->
    <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

      <!-- SLIDE 5 -->
      <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
          <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

      <!-- SLIDE 6 --> <div class="digital-marketing-page-service-slide">
        <div class="digital-marketing-page-service-left">
          <span class="digital-marketing-page-service-tag">MAM</span>
          <h2>Mobile App Marketing</h2>
          <ul>
            <li>Increase app installs & visibility</li>
            <li>Improve ratings & reviews</li>
          </ul>
          <a href="#" class="digital-marketing-page-service-btn">Explore Service</a>
        </div>
        <div class="digital-marketing-page-service-right">
           <img src="{{ asset('website1/assets/images/content_marketing.png') }}">
        </div>
      </div>

    </div>

    <!-- NAV BUTTONS -->
    <div class="digital-marketing-page-slider-nav">
      <button onclick="prevSlide()">←</button>
      <button onclick="nextSlide()">→</button>
    </div>

  </div>

</section>


<section class="digital-marketing-page-our-process">
  <div class="digital-marketing-page-process-wrap">

    <h2>Our Process</h2>
    <p class="digital-marketing-page-process-desc">
      Our professionals are adept in increasing your online presence, visibility,
      and brand awareness along with helping you boost your ROI. We make outsourcing
      digital marketing services a breeze. All of this happens in just four simple steps.
    </p>

    <!-- CARDS -->
    <div class="digital-marketing-page-process-cards">
      <div class="digital-marketing-page-card pink">
        <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Preparation<br>and Brainstorming</h4>
        <p>We start with a detailed business analysis and define objectives.</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card orange">
        <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Planning<br>and Researching</h4>
        <p>Competitor and audience research with channel planning.</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card blue">
       <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Testing<br>Everything</h4>
        <p>We test, analyze and optimize campaigns continuously.</p>
        <span class="arrow"></span>
      </div>

      <div class="digital-marketing-page-card green">
       <img src="{{ asset('website1/assets/images/cta.png')}}">
        <h4>Implementing<br>and Execution</h4>
        <p>Execution with scaling and performance tracking.</p>
        <span class="arrow"></span>
      </div>
    </div>

    <!-- CURVE -->
    <div class="digital-marketing-page-curve-area">
      <svg viewBox="0 0 1200 220" preserveAspectRatio="none">
        <path d="M0,140 C250,60 500,200 750,130 950,80 1100,100 1200,60"
          stroke="url(#g)" stroke-width="4" fill="none"/>
        <defs>
          <linearGradient id="g" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#ff4d8d"/>
            <stop offset="30%" stop-color="#ff9f1c"/>
            <stop offset="60%" stop-color="#4dabf7"/>
            <stop offset="100%" stop-color="#2ecc71"/>
          </linearGradient>
        </defs>
      </svg>

      <div class="digital-marketing-page-step s1">Step 01</div>
      <div class="digital-marketing-page-step s2">Step 02</div>
      <div class="digital-marketing-page-step s3">Step 03</div>
      <div class="digital-marketing-page-step s4">Step 04</div>
       <img src="{{ asset('website1/assets/images/cta.png')}}" class="rocket">

      <!-- <img src="rocket.png') }}" class="rocket"> -->
    </div>

    <!-- CTA -->
    <div class="digital-marketing-page-process-cta">
      <div>
        <h4>Add SEO, SEM, and SMM in a</h4>
        <p>Comprehensive Marketing Package to Generate Quality Results, Quickly.</p>
        <a href="#">Know How We Do It</a>
      </div>
      <img src="{{ asset('website1/assets/images/cta.png')}}">
    </div>

  </div>
</section>





@include('website.contact-form')
@endsection
