@extends('website.layout.app')
@section('content')

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
</head>

<body>
{{-- 
<section class="innovation-section">
  <div class="overlay"></div>

  <div class="innovation-container">

    <!-- LEFT -->
    <div class="innovation-left">
      <h1>Take the first step<br>towards innovation</h1>

      <p class="sub">What happens next?</p>

      <ul class="steps">
        <li><span>1</span> One of our experts will reach out to you.</li>
        <li><span>2</span> We’ll listen to your ideas with full attention.</li>
        <li><span>3</span> You’ll receive a <strong>FREE</strong> expert consultation.</li>
      </ul>

      <p class="note">
        Fill out the form and our experts will contact you within minutes.
        You can also email us at
        <a href="mailto:sales@apptunix.com">sales@apptunix.com</a>
      </p>
    </div>

    <!-- RIGHT FORM -->
    <div class="innovation-form">
      <h3>Turn your vision into reality</h3>

      <form>
        <input type="text" placeholder="Full Name">

     <div class="phone-field">
  <div class="country-dropdown">
    <button type="button" class="selected">
      🇮🇳 <span>+91</span> ▾
    </button>

    <ul class="country-list">
      <li data-code="+91">🇮🇳 India (+91)</li>
      <li data-code="+1">🇺🇸 USA (+1)</li>
      <li data-code="+44">🇬🇧 UK (+44)</li>
      <li data-code="+971">🇦🇪 UAE (+971)</li>
      <li data-code="+61">🇦🇺 Australia (+61)</li>
      <li data-code="+81">🇯🇵 Japan (+81)</li>
      <li data-code="+49">🇩🇪 Germany (+49)</li>
      <li data-code="+33">🇫🇷 France (+33)</li>
      <li data-code="+39">🇮🇹 Italy (+39)</li>
      <li data-code="+86">🇨🇳 China (+86)</li>
      <li data-code="+92">🇵🇰 Pakistan (+92)</li>
      <li data-code="+880">🇧🇩 Bangladesh (+880)</li>
      <li data-code="+94">🇱🇰 Sri Lanka (+94)</li>
      <li data-code="+7">🇷🇺 Russia (+7)</li>
    </ul>
  </div>

  <input type="tel" placeholder="Mobile Number">
</div>



        <input type="email" placeholder="Business Email">
        <textarea placeholder="Requirement"></textarea>

        <div class="form-checks">
          <label class="check">
            <input type="checkbox" checked>
            <span></span>
            I want to protect my business idea by signing an NDA
          </label>

          <label class="check">
            <input type="checkbox" checked>
            I agree to receive SMS and Whatsapp
          </label>
        </div>

        <button type="submit">Submit</button>
      </form>
    </div>

  </div>
</section> --}}





<section class="our-offices-branch-contact-page">
  <div class="offices-container-branch-contact-page">

    <!-- LEFT CONTENT -->
    <div class="offices-text-branch-contact-page">
      <h2>Our Offices</h2>
      <p>
        With international offices, we deliver outstanding IT
        services and customized digital solutions worldwide.
      </p>
    </div>

    <!-- MAP -->
    <div class="offices-map-branch-contact-page">
      <img src="assets/images/offices-bg1.png" alt="World Map">

      <!-- PINS
      <span class="pin usa"></span>
      <span class="pin uk"></span>
      <span class="pin uae"></span>
      <span class="pin india"></span> -->
    </div>

  </div>

  <!-- CARDS -->
  <div class="office-cards-branch-contact-page">
<div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/usa.png" class="office-icon-branch-contact-page" alt="USA">
      <h4>UNITED STATES</h4>
    </div>
    <p>42 Broadway, New York,<br> NY 10004, United States</p>
  </div>

  <div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/uae.png" class="office-icon" alt="UK">
      <h4>United Kingdom</h4>
    </div>
    <p>71–75 Shelton Street, Covent<br>Garden, London, WC2H 9JQ</p>
  </div>

  <div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/uae.png" class="office-icon" alt="UAE">
      <h4>UNITED ARAB EMIRATES</h4>
    </div>
    <p>One Central, Level 3,<br>DWTC, Sheikh Zayed Road, Dubai</p>
  </div>

  <div class="office-card-branch-contact-page">
    <div class="office-head-branch-contact-page">
      <img src="assets/images/india.png" class="office-icon" alt="India">
      <h4>INDIA</h4>
    </div>
    <p>3rd Floor, C-127, Phase-8,<br>Sector 73, Punjab 160071</p>
  </div>

  </div>
</section>


<section class="let-build-somthing-hero-wrapper">
  <div class="let-build-somthing-hero-inner">

    <div class="let-build-somthing-hero-image">
      <img src="./assets/images/contactus-ctabg.png" alt="Hero Image">
    </div>

    <div class="let-build-somthing-hero-content">
      <h1>Let’s build Something</h1>
      <p>brilliant Together</p>
      <a href="#" class="let-build-somthing-hero-btn">Let's Start →</a>
    </div>

  </div>
</section>




{{-- 
<script>
const dropdown = document.querySelector(".country-dropdown");
const selected = dropdown.querySelector(".selected");
const list = dropdown.querySelector(".country-list");

selected.addEventListener("click", () => {
  list.style.display = list.style.display === "block" ? "none" : "block";
});

list.querySelectorAll("li").forEach(item => {
  item.addEventListener("click", () => {
    const flagText = item.innerText.split(" ")[0];
    const code = item.dataset.code;

    selected.innerHTML = `${flagText} <span>${code}</span> ▾`;
    list.style.display = "none";
  });
});

document.addEventListener("click", e => {
  if (!dropdown.contains(e.target)) {
    list.style.display = "none";
  }
});
</script> --}}




@include('website.contact-form')
@endsection
