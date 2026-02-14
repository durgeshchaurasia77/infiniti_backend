@extends('website.layout.app')
@section('content')
<style>
/* ===== SECTION ===== */
.portfolio-section-tab-top{
  padding:70px 0;
}
h2{
    color: #173b82e4;
}
h3{
    color: #173b82e4;
}
/* ===== WRAPPER ===== */
.portfolio-wrapper-tab-top{
  max-width:1300px;
  margin:auto;
  display:flex;
  gap:40px;
  align-items:flex-start;
}

/* ===== LEFT TABS ===== */
.portfolio-tabs-tab-top{
  width:28%;
  background:#eef6ff;
  border-radius:20px;
  padding:24px;
  position:sticky;
  top:120px;
  align-self:flex-start;
}

/* Search */
.tab-search{
  margin-bottom:18px;
}

.tab-search input{
  width:100%;
  padding:11px 14px;
  border-radius:10px;
  /* border:1px solid #4073dae4; */
  outline:none;
  font-size:14px;
  color: #173b82e4;
}

/* .tab-search input:focus{
  border-color:#173b82e4;
} */
.tab-search input:focus {
  outline: none;
  border-color: #0a2a66;
  box-shadow: 0 0 0 3px rgba(10, 42, 102, 0.1);
}
.tab-search input {
  background: #ffffff;
  border: 1px solid #cddcff;
  border-radius: 10px;
}
/* Tabs list */
.portfolio-tabs-tab-top ul{
  list-style:none;
  padding:0;
  margin:0;
}

.portfolio-tabs-tab-top li{
  padding:12px 14px;
  margin-bottom:6px;
  cursor:pointer;
  border-radius:10px;
  font-size:14px;
  color:#333;
  transition:0.3s;
}

.portfolio-tabs-tab-top li:hover{
  background:#ffffff;
}

.portfolio-tabs-tab-top li.active{
  background:#ffffff;
  color:#173b82e4;
  font-weight:600;
  box-shadow:0 6px 18px rgba(0,0,0,0.08);
}

/* ===== RIGHT CONTENT ===== */
.portfolio-content-tab-top{
  width:72%;
  margin-top: --18px;
}

.portfolio-heading{
  font-size:34px;
  font-weight:700;
  margin:0 0 35px;
  color: #173b82e4;
}

/* ===== CARD ===== */
.portfolio-card-tab-top{
  display:none;
  align-items:center;
  justify-content:space-between;
  gap:40px;
  padding:44px 48px;
  border-radius:28px;
  background: linear-gradient(135deg, #f4f8ff 0%, #e3ecff 100%);
  margin-bottom:22px;
}

.portfolio-card-tab-top.active{
  display:flex;
}

/* ===== CARD TEXT ===== */
.portfolio-text-tab-top{
  width:58%;
}

.portfolio-text-tab-top h2{
  font-size:24px;
  margin:0 0 10px;
  color: #0a2a66;   /* Deep logo blue */
  font-weight: 700;
}

.portfolio-text-tab-top p{
  font-size:15px;
  color: #475569;
  line-height:1.6;
}
.portfolio-text h2{
  font-size:24px;
  margin:0 0 10px;
  color: #0a2a66;   /* Deep logo blue */
  font-weight: 700;
}
.portfolio-text p{
  font-size:15px;
  color: #475569;
  line-height:1.6;
}
/* ===== META ===== */
.meta-tab-top{
  display:flex;
  gap:30px;
  margin-top:18px;
}

.meta-tab-top span{
  display:block;
  font-size:12px;
  color:#666;
}

.meta-tab-top strong{
  font-size:14px;
  font-weight:600;
}

/* ===== IMAGE ===== */
.portfolio-image-tab-top{
  width:42%;
  text-align:right;
}

.portfolio-image-tab-top img{
  max-width:260px;
  width:100%;
  object-fit:contain;
}


.portfolio-section-second-crousel{
  padding:70px 0;
  background:#f9fafc;
}

.portfolio-container-second-crousel{
  max-width:1200px;
  margin:auto;
  padding:0 20px;
}

.main-title-second-crousel{
  text-align:center;
  font-size:36px;
  font-weight:700;
}

.main-title-second-crousel span{
  color:#0066ff ;
}
.main-title-second-crousel h2{
  color:#0a4398ce !important;
}
.sub-title-second-crousel{
  text-align:center;
  margin:10px 0 40px;
  color:#555;
}

.featured-title-second-crousel{
  font-size:24px;
  margin-bottom:20px;
}

/* ===== SLIDER ===== */
.slider-wrapper-second-crousel{
  overflow:hidden;
  width:100%;
}

.slider-track-second-crousel{
  display:flex;
  gap:20px;
  will-change:transform;
}

/* ===== CARD ===== */
.project-card-second-crousel{
  min-width:320px;
  flex-shrink:0;
  border-radius:18px;
  padding:25px;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:space-between;
  transition: all 0.3s ease;
}
.project-card-second-crousel:hover{
  transform: translateY(-6px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.08);
}
.project-card-second-crousel img{
  width:100%;
  max-height:180px;
  object-fit:contain;
}

.project-card-second-crousel h4{
  margin:12px 0 0;
  font-size:18px;
}

.project-card-second-crousel button{
  margin-top:18px;
  padding:10px 22px;
  border-radius:30px;
  /* border:1px solid #111; */
  background:#0C2347;
  cursor:pointer;
  font-size:14px;
  transition: all 0.3s ease;
}

.project-card-second-crousel button:hover{
  /* background:#111; */
  /* color:#0b5ed7; */
  background: #0b5ed7;
}
.project-card-second-crousel h4{
  margin:15px 0 0;
  font-size:18px;
  font-weight:600;
  color:#111;
}
/* ===== COLORS ===== */
.pink{
  background: linear-gradient(135deg,#f7dedd,#fceaea);
}

.mint{
  background: linear-gradient(135deg,#e5faf7,#f3fffd);
}

.white{
  background:#ffffff;
  border:1px solid #e5e7eb;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/*.dots{
  display:flex;
  justify-content:center;
  gap:8px;
  margin-top:25px;
}

.dot{
  width:8px;
  height:8px;
  background:#ccc;
  border-radius:50%;
}
.dot.active{background:#0066ff;}*/


/* ================= RESPONSIVE ================= */

/* ===== Tablets (<= 1024px) ===== */
@media (max-width: 1024px) {

  .portfolio-wrapper-tab-top{
    flex-direction:column;
  }

  .portfolio-tabs-tab-top{
    width:100%;
    position:relative;
    top:0;
  }

  .portfolio-content-tab-top{
    width:100%;
  }

  .portfolio-card-tab-top{
    padding:30px;
  }

  .portfolio-text-tab-top,
  .portfolio-image-tab-top{
    width:50%;
  }
}

/* ===== Mobile (<= 768px) ===== */
@media (max-width: 768px) {

  /* Headings */
  .portfolio-heading{
    font-size:26px;
    margin-bottom:20px;
  }

  .main-title-second-crousel{
    font-size:28px;
  }

  .featured-title-second-crousel{
    font-size:20px;
  }

  /* Tabs */
  .portfolio-tabs-tab-top ul{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
  }

  .portfolio-tabs-tab-top li{
    flex:1 1 auto;
    text-align:center;
    background:#fff;
    border:1px solid #dbe6ff;
  }

  /* Cards stack */
  .portfolio-card-tab-top{
    flex-direction:column;
    text-align:center;
    gap:20px;
  }

  .portfolio-text-tab-top,
  .portfolio-image-tab-top{
    width:100%;
  }

  .portfolio-image-tab-top{
    text-align:center;
  }

  .portfolio-image-tab-top img{
    max-width:180px;
  }

  /* Slider */
  .project-card-second-crousel{
    min-width:260px;
  }
}

/* ===== Small Mobile (<= 480px) ===== */
@media (max-width: 480px) {

  .portfolio-section-tab-top,
  .portfolio-section-second-crousel{
    padding:40px 0;
  }

  .tab-search input{
    font-size:13px;
    padding:8px 10px;
  }

  .portfolio-card-tab-top{
    padding:22px;
    border-radius:18px;
  }

  .project-card-second-crousel{
    min-width:220px;
    padding:15px;
  }

  .project-card-second-crousel h4{
    font-size:16px;
  }
  /* COMMON SIDE PADDING */
.portfolio-container-second-crousel,
.portfolio-wrapper-tab-top{
  padding-left:20px;
  padding-right:20px;
}

/* Mobile me thoda aur tight */
@media (max-width: 768px){
  .portfolio-container-second-crousel,
  .portfolio-wrapper-tab-top{
    padding-left:15px;
    padding-right:15px;
  }
}

/* Small mobile */
@media (max-width: 480px){
  .portfolio-container-second-crousel,
  .portfolio-wrapper-tab-top{
    padding-left:12px;
    padding-right:12px;
  }
}

}

</style>

<section class="portfolio-section-second-crousel">
  <div class="portfolio-container-second-crousel">

    <h2 class="main-title-second-crousel">
      <span>Transform</span> The World With Your Idea.
    </h2>
    <p class="sub-title-second-crousel">
      From dream to reality, here are some apps we are proud to be part of.
    </p>

    <h3 class="featured-title-second-crousel">Featured Projects</h3>
        @if(count($featureProductList) > 0)
            <div class="slider-wrapper-second-crousel">
                <div class="slider-track-second-crousel" id="sliderTrack">
                    @foreach ($featureProductList as $featureProduct)
                        <div class="project-card-second-crousel">
                        <img src="https://via.placeholder.com/260x160" alt="">
                        <h4>{{ $featureProduct->name ?? '' }}p</h4>
                        <button>View Case Study →</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
  </div>
</section>







<section class="portfolio-section-tab-top">

  <div class="portfolio-wrapper-tab-top">

    <!-- LEFT 30% -->
 <aside class="portfolio-tabs-tab-top">

  <div class="tab-search">
    <input type="text" id="tabSearch-tab-top" placeholder="Search..." />
  </div>

  <ul>
    <li class="active" data-key="all">ALL</li>
    @foreach ($featureProductList as $featureProduct1)
    <li data-key="itemportfolio{{ $featureProduct1->id }}">{{ $featureProduct1->name ?? '' }}</li>
    @endforeach
    {{-- <li data-key="astrology">Astrology App</li>
    <li data-key="beauty">Beauty App</li>
    <li data-key="dating">Dating App</li> --}}
  </ul>
</aside>


<div class="portfolio-content-tab-top">
    <h1 class="portfolio-heading">ALL</h1>

    @foreach ($productList as $product)
        <div class="portfolio-card-tab-top active"
             data-key="itemportfolio{{ $product->category_id ?? ''}}">

            <div class="portfolio-text-tab-top">
                <h2>{{ $product->title ?? ''}}</h2>
                <p>{{ $product->short_description ?? ''}}</p>

                <div class="meta-tab-top">
                    <div>
                        <span>Country</span>
                        <strong>{{ $product->contry ?? ''}}</strong>
                    </div>
                    <div>
                        <span>Platforms</span>
                        <strong>{{ $product->platform ?? ''}}</strong>
                    </div>
                </div>
            </div>

            <div class="portfolio-image-tab-top">
                <img src="{{ asset($product->image ?? 'notImage.jpg') }}">
            </div>
        </div>
    @endforeach

</div>

  </div>

</section>


@include('website.contact-form')


{{-- <script>
const tabs = document.querySelectorAll(
  ".portfolio-tabs-tab-top li"
);
const cards = document.querySelectorAll(
  ".portfolio-card-tab-top"
);
const heading = document.querySelector(
  ".portfolio-heading"
);
const searchInput = document.getElementById(
  "tabSearch-tab-top"
);

/* ===== SEARCH ===== */
searchInput.addEventListener("input", e => {
  const value = e.target.value.toLowerCase();

  tabs.forEach(tab => {
    tab.style.display = tab.textContent
      .toLowerCase()
      .includes(value) ? "block" : "none";
  });

  cards.forEach(card => {
    card.style.display = card.textContent
      .toLowerCase()
      .includes(value) ? "flex" : "none";
  });
});

/* ===== TAB CLICK ===== */
tabs.forEach(tab => {
  tab.addEventListener("click", () => {

    searchInput.value = "";

    tabs.forEach(t => t.classList.remove("active"));
    tab.classList.add("active");

    const key = tab.dataset.key;
    heading.textContent = tab.textContent;

    cards.forEach(card => {
      card.classList.remove("active");

      if (key === "all" || card.dataset.key === key) {
        card.classList.add("active");
      }
    });

    document
      .querySelector(".portfolio-content-tab-top")
      .scrollIntoView({ behavior: "smooth" });
  });
});
</script> --}}

<script>
const portfolioTabsTabTop = document.querySelectorAll(
  ".portfolio-tabs-tab-top li"
);

const portfolioCardsTabTop = document.querySelectorAll(
  ".portfolio-card-tab-top"
);

const portfolioHeadingTabTop = document.querySelector(
  ".portfolio-heading"
);

const tabSearchTabTop = document.getElementById(
  "tabSearch-tab-top"
);

/* ===== SEARCH ===== */
tabSearchTabTop.addEventListener("input", e => {
  const searchValueTabTop = e.target.value.toLowerCase();

  portfolioTabsTabTop.forEach(tabItemTabTop => {
    tabItemTabTop.style.display = tabItemTabTop.textContent
      .toLowerCase()
      .includes(searchValueTabTop) ? "block" : "none";
  });

  portfolioCardsTabTop.forEach(cardItemTabTop => {
    cardItemTabTop.style.display = cardItemTabTop.textContent
      .toLowerCase()
      .includes(searchValueTabTop) ? "flex" : "none";
  });
});

/* ===== TAB CLICK ===== */
// portfolioTabsTabTop.forEach(tabItemTabTop => {
//   tabItemTabTop.addEventListener("click", () => {

//     tabSearchTabTop.value = "";

//     portfolioTabsTabTop.forEach(tabLoopTabTop =>
//       tabLoopTabTop.classList.remove("active")
//     );

//     tabItemTabTop.classList.add("active");

//     const tabKeyTabTop = tabItemTabTop.dataset.key;

//     portfolioHeadingTabTop.textContent = tabItemTabTop.textContent;

//     portfolioCardsTabTop.forEach(cardLoopTabTop => {
//       cardLoopTabTop.classList.remove("active");

//       if (tabKeyTabTop === "all" || cardLoopTabTop.dataset.key === tabKeyTabTop) {
//         cardLoopTabTop.classList.add("active");
//       }
//     });

//     document
//       .querySelector(".portfolio-content-tab-top")
//       .scrollIntoView({ behavior: "smooth" });
//   });
// });
portfolioTabsTabTop.forEach(tabItemTabTop => {

  tabItemTabTop.addEventListener("click", () => {

    tabSearchTabTop.value = "";

    portfolioTabsTabTop.forEach(t => t.classList.remove("active"));
    tabItemTabTop.classList.add("active");

    const tabKeyTabTop = tabItemTabTop.dataset.key;

    portfolioHeadingTabTop.textContent = tabItemTabTop.textContent;

    portfolioCardsTabTop.forEach(card => {

      card.classList.remove("active");

      if (tabKeyTabTop === "all") {
        card.classList.add("active");
      } else if (card.dataset.key === tabKeyTabTop) {
        card.classList.add("active");
      }

    });

  });

});
</script>


{{-- <script>
const sliderTrack = document.getElementById("sliderTrack");

// duplicate cards for infinite loop
sliderTrack.innerHTML += sliderTrack.innerHTML;

let position = 0;
const speed = 0.5; // adjust speed here

function infiniteScroll(){
  position -= speed;

  const trackWidth = sliderTrack.scrollWidth / 2;

  if (Math.abs(position) >= trackWidth){
    position = 0;
  }

  sliderTrack.style.transform = `translateX(${position}px)`;
  requestAnimationFrame(infiniteScroll);
}

infiniteScroll();
</script> --}}
<script>
document.addEventListener("DOMContentLoaded", function(){

  const sliderTrackSecondCrousel = document.getElementById("sliderTrack");

  if(!sliderTrackSecondCrousel) return; // safety check

  // duplicate cards
  sliderTrackSecondCrousel.innerHTML += sliderTrackSecondCrousel.innerHTML;

  let sliderPositionSecondCrousel = 0;
  const sliderSpeedSecondCrousel = 0.5;

  function infiniteScrollSecondCrousel(){

    sliderPositionSecondCrousel -= sliderSpeedSecondCrousel;

    const sliderTrackWidthSecondCrousel =
      sliderTrackSecondCrousel.scrollWidth / 2;

    if (Math.abs(sliderPositionSecondCrousel) >= sliderTrackWidthSecondCrousel){
      sliderPositionSecondCrousel = 0;
    }

    sliderTrackSecondCrousel.style.transform =
      `translateX(${sliderPositionSecondCrousel}px)`;

    requestAnimationFrame(infiniteScrollSecondCrousel);
  }

  infiniteScrollSecondCrousel();

});
</script>

@endsection
