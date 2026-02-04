
</footer>
    <!-- End Footer Area -->
    <!-- JS ============================================ -->
    <script src="{{asset('website1/assets/js/vendor/custome.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/jquery.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/modernizer.min.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/feather.min.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/bootstrap.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/text-type.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/wow.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/aos.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/particles.js')}}"></script>
    <script src="{{asset('website1/assets/js/vendor/jquery-one-page-nav.js')}}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{asset('website1/assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
    $(document).on('submit', 'form.formSubmit1', function(e) {

        e.preventDefault();
        var data = new FormData(this);
        $('.loderIcon').show();
        $('.loderButton').prop("disabled", true);
        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            dataType: "json",
            data: data,
            beforeSend: function() {
                $('.preloader').show();
            },
            complete: function() {
                $('.preloader').hide();
            },
            success: function(response) {
                $('.loderIcon').hide();
                $('.loderButton').prop("disabled", false);
                if (response.responseCode == 200) {
                    toastr.success(response.responseMessage);
                    if (response.responseUrl) {
                        location.href = response.responseUrl;
                    } else {
                        location.reload();
                    }

                } else {
                    toastr.error(response.responseMessage);
                    if(response.responseUrl)
                        {
                            location.href = response.responseUrl;
                        }
                }
            }
        });
    });

</script>
<script type="text/javascript">
    $(document).on('submit', 'form.formSubmit2', function(e) {

        e.preventDefault();
        var data = new FormData(this);
        $('.loderIcon2').show();
        $('.loderButton2').prop("disabled", true);
        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            dataType: "json",
            data: data,
            beforeSend: function() {
                $('.preloader2').show();
            },
            complete: function() {
                $('.preloader2').hide();
            },
            success: function(response) {
                $('.loderIcon2').hide();
                $('.loderButton2').prop("disabled", false);
                if (response.responseCode == 200) {
                    toastr.success(response.responseMessage);
                    if (response.responseUrl) {
                        location.href = response.responseUrl;
                    } else {
                        location.reload();
                    }

                } else {
                    toastr.error(response.responseMessage);
                    if(response.responseUrl)
                        {
                            location.href = response.responseUrl;
                        }
                }
            }
        });
    });

</script>
    {{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
    <script>
    AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-in-out'
    });
    </script>
<script>
document.addEventListener("DOMContentLoaded", () => {

    const section = document.querySelector(".case-section");
    const items   = [...document.querySelectorAll(".case-item")];
    const tabs    = [...document.querySelectorAll(".tab-features")];

    const total = items.length;

    // 🔑 slides count se height set
    section.style.setProperty("--slides", total);

    function activate(i){
        items.forEach(el => el.classList.remove("active"));
        tabs.forEach(el => el.classList.remove("active"));

        items[i]?.classList.add("active");
        tabs[i]?.classList.add("active");
    }

    activate(0);

    window.addEventListener("scroll", () => {
        const rect = section.getBoundingClientRect();
        const vh = window.innerHeight;

        // jab section viewport me ho
        if(rect.top <= 0 && rect.bottom >= vh){
            const progress = Math.abs(rect.top) / ((total - 1) * vh);
            const index = Math.min(
                total - 1,
                Math.floor(progress * total)
            );
            activate(index);
        }
    });

    // tabs click support
    tabs.forEach((tab, i) => {
        tab.addEventListener("click", () => {
            window.scrollTo({
                top: section.offsetTop + i * window.innerHeight,
                behavior: "smooth"
            });
        });
    });

});
</script>






    {{-- <script>
    const tabsFeatures = document.querySelectorAll(".tab-features");
    const items = document.querySelectorAll(".case-item");

    function activateTab(tab) {
        // remove all actives
        tabsFeatures.forEach(t => t.classList.remove("active"));
        items.forEach(i => i.classList.remove("active"));

        // activate current
        tab.classList.add("active");
        const targetId = tab.getAttribute("data-tab");
        const targetItem = document.getElementById(targetId);

        if (targetItem) {
            targetItem.classList.add("active");
        }
    }

    // CLICK
    tabsFeatures.forEach(tab => {
        tab.addEventListener("click", () => activateTab(tab));
    });

    // HOVER (optional but smart)
    tabsFeatures.forEach(tab => {
        tab.addEventListener("mouseenter", () => activateTab(tab));
    });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function () {

        const track = document.querySelector(".navy-slider-track");
        const cards = document.querySelectorAll(".navy-testimonial-card");
        const nextBtn = document.getElementById("navyNext");
        const prevBtn = document.getElementById("navyPrev");

        if (!track || !cards.length || !nextBtn || !prevBtn) {
            console.warn("Slider elements missing");
            return;
        }

        let index = 0;
        let visible = 3;
        const gap = 24;

        function updateVisible() {
            if (window.innerWidth < 600) visible = 1;
            else if (window.innerWidth < 900) visible = 2;
            else visible = 3;
        }

        function slide() {
            const cardWidth = cards[0].offsetWidth + gap;
            track.style.transform = `translateX(-${index * cardWidth}px)`;
        }

        nextBtn.addEventListener("click", () => {
            updateVisible();
            if (index < cards.length - visible) {
            index++;
            slide();
            }
        });

        prevBtn.addEventListener("click", () => {
            if (index > 0) {
            index--;
            slide();
            }
        });

        window.addEventListener("resize", () => {
            index = 0;
            updateVisible();
            slide();
        });

        });
        </script>
<script>
document.addEventListener("DOMContentLoaded", function () {

  const modal = document.getElementById("navyVideoModal");
  const modalVideo = document.getElementById("navyModalVideo");
  const overlay = document.querySelector(".navy-video-modal__overlay");
  const cards = document.querySelectorAll(".navy-testimonial-card");

  cards.forEach(card => {
    card.addEventListener("click", () => {
      const videoSrc = card.getAttribute("data-video");
      if (!videoSrc) return;

      modalVideo.src = videoSrc;
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    });
  });

  overlay.addEventListener("click", closeModal);
  document.addEventListener("keydown", e => {
    if (e.key === "Escape") closeModal();
  });

  function closeModal(){
    modal.style.display = "none";
    modalVideo.pause();
    modalVideo.src = "";
    document.body.style.overflow = "auto";
  }

const closeBtn = document.querySelector(".navy-video-modal__close");

closeBtn.addEventListener("click", closeModal);

});
</script>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const popup = document.getElementById("hpPopup");
        const openButtons = document.querySelectorAll(".open-popup");

        // Open popup on both buttons
        openButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                popup.style.display = "flex";
                document.body.style.overflow = "hidden";
            });
        });

        // Close popup on outside click
        popup.addEventListener("click", (e) => {
            if (e.target === popup) {
                popup.style.display = "none";
                document.body.style.overflow = "auto";
            }
        });});
    </script>

    <script>
        function openPopup() {
            document.getElementById("popupOverlay").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("popupOverlay").style.display = "none";
        }
    </script>
    <script>
        /* =========================
              POPUP SLIDER SCRIPT
           ========================= */

        const popupSlides = document.querySelectorAll(".homepage-slide");
        const popupDotBox = document.querySelector(".homepage-slider-dots");
        let popupIndex = 0;

        popupSlides.forEach((s, idx) => {
            let dot = document.createElement("span");
            if (idx === 0) dot.classList.add("active");
            dot.onclick = () => popupShowSlide(idx);
            popupDotBox.appendChild(dot);
        });

        const popupDots = document.querySelectorAll(".homepage-slider-dots span");

        function popupShowSlide(n) {
            popupSlides.forEach(s => s.classList.remove("active"));
            popupDots.forEach(d => d.classList.remove("active"));

            popupSlides[n].classList.add("active");
            popupDots[n].classList.add("active");

            popupIndex = n;
        }

        setInterval(() => {
            popupIndex = (popupIndex + 1) % popupSlides.length;
            popupShowSlide(popupIndex);
        }, 4000);


        function closePopup() {
            document.getElementById("hpPopup").style.display = "none";
            document.body.style.overflow = "auto";
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {

            /* ========== SWIPER SLIDER ========== */
            var swiper = new Swiper(".myVideoSlider", {
                slidesPerView: 3,
                spaceBetween: 25,
                slidesPerGroup: 3,
                loop: false,

                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },

                breakpoints: {
                    0: { slidesPerView: 1, slidesPerGroup: 1 },
                    768: { slidesPerView: 2, slidesPerGroup: 2 },
                    1200: { slidesPerView: 3, slidesPerGroup: 3 }
                }
            });



            /* ========== TESTIMONIAL POPUP ========== */

            const testimonialCards = document.querySelectorAll(".homepage-testimonial-card");
            const testimonialPopup = document.querySelector(".homepage-testimonial-popup");
            const testimonialVideo = document.getElementById("homepage-testimonial-video");
            const testimonialClose = document.querySelector(".homepage-testimonial-close");


            /* OPEN */
            testimonialCards.forEach(card => {
                card.addEventListener("click", () => {
                    testimonialVideo.src = card.getAttribute("data-video");
                    testimonialPopup.style.display = "flex";
                    testimonialVideo.play();
                });
            });


            /* CLOSE FUNCTION */
            function closeTestimonialPopup() {
                testimonialPopup.style.display = "none";
                testimonialVideo.pause();
                testimonialVideo.currentTime = 0;
            }


            /* CLOSE BUTTON CLICK */
            testimonialClose.addEventListener("click", closeTestimonialPopup);


            /* CLICK OUTSIDE TO CLOSE */
            testimonialPopup.addEventListener("click", e => {
                if (e.target === testimonialPopup) {
                    closeTestimonialPopup();
                }
            });

        });
    </script>



    <script>
        const tabs = document.querySelectorAll(".tab");
        const contents = document.querySelectorAll(".content");

        function activate(tab) {
            tabs.forEach(t => t.classList.remove("active"));
            tab.classList.add("active");

            contents.forEach(c => c.classList.remove("active"));
            document.getElementById(tab.dataset.tab).classList.add("active");
        }

        tabs.forEach(tab => {
            tab.addEventListener("click", () => activate(tab));
            tab.addEventListener("mouseover", () => activate(tab));
        });
    </script>


<script>
  const toggleMobile = document.querySelector('.mobile-toggle');
  const menuMobile = document.querySelector('.menu');

  toggleMobile.addEventListener('click', () => {
    menuMobile.classList.toggle('active');
  });
</script>

<script>
document.querySelectorAll('.menu .nav-link').forEach(link=>{
    link.addEventListener('click',()=>{
        document.querySelectorAll('.menu .nav-link')
        .forEach(l=>l.classList.remove('active'));
        link.classList.add('active');
    });
});
</script>
<script>
const counters = document.querySelectorAll('.counter');

const speed = 220;

const startCounter = (counter) => {
    const target = +counter.getAttribute('data-target');
    let count = 0;

    const updateCount = () => {
        const increment = Math.max(1, Math.floor(target / speed));

        if (count < target) {
            count += increment;
            counter.innerText = count;
            setTimeout(updateCount, 35);
        } else {
            counter.innerText = target + '+';
        }
    };

    updateCount();
};

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            startCounter(entry.target);
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.6 });

counters.forEach(counter => observer.observe(counter));
</script>


<script>
let steps11 = 0;
const roadmap = document.querySelector(".roadmap-exceptional-indusrty-page-fitness-process");
const steps11 = roadmap.querySelectorAll(".roadmap-exceptional-indusrty-page-fitness-step");
const boxes = roadmap.querySelectorAll(".roadmap-exceptional-indusrty-page-fitness-box");

function activate(step11){
  steps11.forEach(s => s.classList.remove("active"));
  boxes.forEach(b => b.classList.remove("active"));

  step11.classList.add("active");
  roadmap.querySelector("#step" + step11.dataset.step11).classList.add("active");
}

steps11.forEach(step11 => {
  step11.addEventListener("mouseenter", () => activate(step11));
});
</script>


 <script>
const track = document.querySelector(".power-packed-feature-industry-page-track");
const bar = document.querySelector(".power-packed-feature-industry-page .progress-bar span");
const nextBtn = document.querySelector(".power-packed-feature-industry-page .next");
const prevBtn = document.querySelector(".power-packed-feature-industry-page .prev");

const cardWidth = 350;
const totalCards = track.children.length / 2;   // original 6
let index = 0;

nextBtn.onclick = () => {
  index++;
  move();
};

prevBtn.onclick = () => {
  index--;
  move();
};

function move(){
  track.scrollTo({
    left: index * cardWidth,
    behavior: "smooth"
  });

  // 🔥 correct full width progress
  let visible = index % totalCards;
  if(visible < 0) visible = totalCards - 1;

  let percent = ((visible + 1) / totalCards) * 100;
  bar.style.width = percent + "%";

  // 🔁 infinite loop
  if(index >= totalCards){
    setTimeout(()=>{
      track.scrollLeft = 0;
      index = 0;
    },400);
  }

  if(index < 0){
    track.scrollLeft = totalCards * cardWidth;
    index = totalCards - 1;
  }
}
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {

  const modal = document.getElementById("navyVideoModal");
  const modalVideo = document.getElementById("navyModalVideo");
  const overlay = document.querySelector(".navy-video-modal__overlay");
  const cards = document.querySelectorAll(".navy-testimonial-card");

  cards.forEach(card => {
    card.addEventListener("click", () => {
      const videoSrc = card.getAttribute("data-video");
      if (!videoSrc) return;

      modalVideo.src = videoSrc;
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    });
  });

  overlay.addEventListener("click", closeModal);
  document.addEventListener("keydown", e => {
    if (e.key === "Escape") closeModal();
  });

  function closeModal(){
    modal.style.display = "none";
    modalVideo.pause();
    modalVideo.src = "";
    document.body.style.overflow = "auto";
  }

const closeBtn = document.querySelector(".navy-video-modal__close");

closeBtn.addEventListener("click", closeModal);

});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {

  const triggers = document.querySelectorAll(".video-trigger");
  const popup = document.getElementById(
    "buid-service-videosection-service-page-videoPopup"
  );
  const closeBtn = document.querySelector(
    ".buid-service-videosection-service-page-close-video"
  );
  const iframe = document.getElementById(
    "buid-service-videosection-service-page-videoFrame"
  );

  if (!triggers.length || !popup || !closeBtn || !iframe) return;

  /* OPEN */
  triggers.forEach(trigger => {
    trigger.addEventListener("click", () => {
      popup.style.display = "flex";
      iframe.src =
        "https://youtu.be/P96xEX9AJzM?si=A6pVpD4HGeDC1xNV";
    });
  });

  /* CLOSE */
  closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
    iframe.src = "";
  });

  popup.addEventListener("click", (e) => {
    if (e.target === popup) {
      popup.style.display = "none";
      iframe.src = "";
    }
  });

});

</script>

<script>
document.querySelectorAll(".ai-powered-fitness-app-industry-ai-tab").forEach(tab=>{
  tab.addEventListener("click",()=>{

    // remove active
    document.querySelectorAll(".ai-powered-fitness-app-industry-ai-tab").forEach(t=>t.classList.remove("active"));
    document.querySelectorAll(".ai-powered-fitness-app-industry-ai-content").forEach(c=>c.classList.remove("active"));

    // add active
    tab.classList.add("active");
    document.getElementById(tab.dataset.tab).classList.add("active");

  });
});
</script>

<script>
const container = document.querySelector(".launch-your-dream-fitness-industry-page");
const tabList = container.querySelectorAll(".launch-your-dream-fitness-industry-page-gym-app-tab");
const contentList = container.querySelectorAll(".launch-your-dream-fitness-industry-page-gym-app-content");

function switchTab(currentTab) {
  tabList.forEach(item => item.classList.remove("active"));
  contentList.forEach(item => item.classList.remove("active"));

  currentTab.classList.add("active");
  container
    .querySelector("#" + currentTab.dataset.tab)
    .classList.add("active");
}

tabList.forEach(tab => {
  tab.addEventListener("mouseenter", () => switchTab(tab));
  tab.addEventListener("click", () => switchTab(tab));
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function(){

  const wrapper = document.querySelector(".our-succes-story-of-fitness-industry-page.case-study-slider");
  if(!wrapper) return;

  const slides = wrapper.querySelectorAll(".case-slide");
  const next = wrapper.querySelector(".next");
  const prev = wrapper.querySelector(".prev");

  let index = 0;

  next.addEventListener("click", ()=>{
    slides[index].classList.remove("active");
    index = (index + 1) % slides.length;
    slides[index].classList.add("active");
  });

  prev.addEventListener("click", ()=>{
    slides[index].classList.remove("active");
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add("active");
  });

});
</script>


<script>
document.querySelectorAll(".AI-powered-Recommendations-industry-page-tab").forEach(tab=>{
  tab.addEventListener("mouseenter",()=>{
    document.querySelectorAll(".AI-powered-Recommendations-industry-page-tab").forEach(t=>t.classList.remove("active"));
    document.querySelectorAll(".AI-powered-Recommendations-industry-page-panel").forEach(p=>p.classList.remove("active"));

    tab.classList.add("active");
    document.getElementById(tab.dataset.tab).classList.add("active");
  });
});
</script>

 <script>
const modelTabs = document.querySelectorAll(".choose-the-right-model-service-page-tab");
const modelContents = document.querySelectorAll(".choose-the-right-model-service-page-content");

function activateModelTab(tab){
  modelTabs.forEach(t=>t.classList.remove("active"));
  modelContents.forEach(c=>c.classList.remove("active"));

  tab.classList.add("active");
  document.getElementById(tab.dataset.tab).classList.add("active");
}

modelTabs.forEach(tab=>{
  tab.addEventListener("mouseenter",()=>activateModelTab(tab));
  tab.addEventListener("click",()=>activateModelTab(tab));
});
 </script>

<!-- both are same use  -->
 <script>
document.addEventListener("DOMContentLoaded", function(){

  const wrapper = document.querySelector(".the-behind-company-succese-service-page-tech-system");
  if(!wrapper) return;   // 🔥 agar section page me nahi hai → exit safely

  const tabs = wrapper.querySelectorAll(".the-behind-company-succese-service-page-tech-tab");
  const sliders = wrapper.querySelectorAll(".the-behind-company-succese-service-page-tech-slider");

  function activateTechTab(tab){
    tabs.forEach(t=>t.classList.remove("active"));
    sliders.forEach(s=>s.classList.remove("active"));

    tab.classList.add("active");
    const target = wrapper.querySelector("#"+tab.dataset.tab);
    if(target) target.classList.add("active");   // safe
  }

  tabs.forEach(tab=>{
    tab.addEventListener("click", ()=> activateTechTab(tab));
    tab.addEventListener("mouseenter", ()=> activateTechTab(tab));
  });

});
 </script>
 <script>
document.addEventListener("DOMContentLoaded", function(){

  document.querySelectorAll(".the-behind-company-succese-service-page-slider-track").forEach(track=>{

    const items = Array.from(track.children);

    /* minimum 12 items chahiye smooth loop ke liye */
    if(items.length < 12){
      items.forEach(item=>{
        track.appendChild(item.cloneNode(true));
      });
    }

  });

});
 </script>
<!-- both are same use  -->

<script>
const section = document.querySelector(
".enterprise-custome-softawere-devlopment-software-service-page-pagination-section"
);

const tracksoftware = section.querySelector(".software-pagination-track");
const cards123 = section.querySelectorAll(".software-page-card");
const next = section.querySelector(".software-page-btn.next");
const prev = section.querySelector(".software-page-btn.prev");

const perPage = 4;
let page = 0;

function moveSlider(){
  const cardWidth = cards123[0].offsetWidth + 30;
  tracksoftware.style.transform = `translateX(-${page * perPage * cardWidth}px)`;
}

next.addEventListener("click", ()=>{
  const maxPage = Math.ceil(cards123.length / perPage) - 1;
  if(page < maxPage){
    page++;
    moveSlider();
  }
});

prev.addEventListener("click", ()=>{
  if(page > 0){
    page--;
    moveSlider();
  }
});
</script>
<script>
  const wrapper = document.querySelector(
    ".service-page-below-the-counter-service-tabs"
  );

  if (wrapper) {
    const tabs = wrapper.querySelectorAll(
      ".service-page-below-the-counter-tab-item"
    );

    const contents = wrapper.querySelectorAll(
      ".service-page-below-the-counter-content"
    );

    function activateTab(tab) {
      const targetId = tab.dataset.tab;

      tabs.forEach(t => t.classList.remove("active"));
      contents.forEach(c => c.classList.remove("show"));

      tab.classList.add("active");
      wrapper.querySelector("#" + targetId)?.classList.add("show");
    }

    tabs.forEach(tab => {
      tab.addEventListener("mouseenter", () => activateTab(tab));
      tab.addEventListener("click", () => activateTab(tab));
    });
  }
</script>


 <script>
document.querySelectorAll(".process-title-servicepage").forEach(title=>{
  title.addEventListener("click",()=>{

    const item = title.closest(".process-item-servicepage");

    document.querySelectorAll(".process-item-servicepage").forEach(i=>{
      i.classList.remove("active");
    });

    item.classList.add("active");
  });
});
 </script>
<script>
let indexourwall = 0;

const trackourwall = document.querySelector(
  '.our-wall-of-fame-home-page-award-track'
);

const dotsourwalls = document.querySelectorAll(
  '.our-wall-of-fame-home-page-award-dots span'
);

const card = document.querySelector('.our-wall-of-fame-home-page-award-card');
const cardWidth1 = card.offsetWidth + 20;

const cardsPerSlide = 2;   // 👈 IMPORTANT
const totalSlides = dotsourwalls.length;

/* ===== MOVE SLIDER ===== */
function moveOurWallSlider() {
  // dots active
  dotsourwalls.forEach(d => d.classList.remove('active'));
  dotsourwalls[indexourwall].classList.add('active');

  // scroll
  trackourwall.scrollTo({
    left: indexourwall * cardWidth1 * cardsPerSlide,
    behavior: 'smooth'
  });
}

/* ===== DOT CLICK ===== */
dotsourwalls.forEach(dot => {
  dot.addEventListener('click', () => {
    indexourwall = Number(dot.dataset.indexourwall);
    moveOurWallSlider();
  });
});

setInterval(() => {
  indexourwall++;

  if (indexourwall >= totalSlides) {
    indexourwall = 0;
  }

  moveOurWallSlider();
}, 3000);
</script>


<script>
const commonSectionEverypageTrack = document.querySelector(
  ".common-section-everypage-blog-listing-track"
);

let commonSectionEverypageCards = Array.from(
  commonSectionEverypageTrack.querySelectorAll(
    ".common-section-everypage-blog-listing-card"
  )
);

const commonSectionEverypageNextBtn = document.querySelector(
  ".common-section-everypage-blog-listing-nav-btn.next"
);

const commonSectionEverypagePrevBtn = document.querySelector(
  ".common-section-everypage-blog-listing-nav-btn.prev"
);

/* RESPONSIVE COUNT */
function commonSectionEverypageVisibleCards() {
  if (window.innerWidth <= 768) return 1;
  if (window.innerWidth <= 1024) return 2;
  return 3;
}

let commonSectionEverypageVisible =
  commonSectionEverypageVisibleCards();

/* 🔁 CLONE CARDS (SEAMLESS LOOP) */
const commonSectionEverypageFirstClones =
  commonSectionEverypageCards
    .slice(0, commonSectionEverypageVisible)
    .map(card => card.cloneNode(true));

const commonSectionEverypageLastClones =
  commonSectionEverypageCards
    .slice(
      commonSectionEverypageCards.length -
        commonSectionEverypageVisible
    )
    .map(card => card.cloneNode(true));

commonSectionEverypageLastClones.forEach(clone =>
  commonSectionEverypageTrack.prepend(clone)
);

commonSectionEverypageFirstClones.forEach(clone =>
  commonSectionEverypageTrack.append(clone)
);

commonSectionEverypageCards = Array.from(
  commonSectionEverypageTrack.querySelectorAll(
    ".common-section-everypage-blog-listing-card"
  )
);

/* START FROM REAL FIRST CARD */
let commonSectionEverypageIndex = commonSectionEverypageVisible;

/* SLIDE FUNCTION */
function commonSectionEverypageSlide(noAnim = false) {
  const gap = 24;
  const cardWidth =
    commonSectionEverypageCards[0].offsetWidth + gap;

  commonSectionEverypageTrack.style.transition = noAnim
    ? "none"
    : "transform .6s cubic-bezier(.22,.61,.36,1)";

  commonSectionEverypageTrack.style.transform =
    `translateX(-${commonSectionEverypageIndex * cardWidth}px)`;
}

commonSectionEverypageSlide(true);

/* NEXT */
commonSectionEverypageNextBtn.addEventListener("click", () => {
  commonSectionEverypageIndex++;
  commonSectionEverypageSlide();

  if (
    commonSectionEverypageIndex ===
    commonSectionEverypageCards.length -
      commonSectionEverypageVisible
  ) {
    setTimeout(() => {
      commonSectionEverypageIndex =
        commonSectionEverypageVisible;
      commonSectionEverypageSlide(true);
    }, 600);
  }
});

/* PREV */
commonSectionEverypagePrevBtn.addEventListener("click", () => {
  commonSectionEverypageIndex--;
  commonSectionEverypageSlide();

  if (commonSectionEverypageIndex === 0) {
    setTimeout(() => {
      commonSectionEverypageIndex =
        commonSectionEverypageCards.length -
        commonSectionEverypageVisible * 2;
      commonSectionEverypageSlide(true);
    }, 600);
  }
});

/* RESIZE */
window.addEventListener("resize", () => {
  commonSectionEverypageVisible =
    commonSectionEverypageVisibleCards();
  commonSectionEverypageSlide(true);
});

/* VIDEO POPUP */
const commonSectionEverypagePopup = document.querySelector(
  ".common-section-everypage-blog-listing-video-popup"
);

const commonSectionEverypageIframe =
  commonSectionEverypagePopup.querySelector("iframe");

document.querySelectorAll(
  ".common-section-everypage-blog-listing-play-btn"
).forEach(btn => {
  btn.addEventListener("click", () => {
    commonSectionEverypagePopup.classList.add("active");
    commonSectionEverypageIframe.src =
      "https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1";
  });
});

/* CLOSE POPUP */
commonSectionEverypagePopup
  .querySelector(
    ".common-section-everypage-blog-listing-popup-close"
  )
  .addEventListener("click", commonSectionEverypageClosePopup);

commonSectionEverypagePopup
  .querySelector(
    ".common-section-everypage-blog-listing-popup-overlay"
  )
  .addEventListener("click", commonSectionEverypageClosePopup);

function commonSectionEverypageClosePopup() {
  commonSectionEverypagePopup.classList.remove("active");
  commonSectionEverypageIframe.src = "";
}
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {

  const isMobileView = window.matchMedia("(max-width: 991px)").matches;

  const caseSlideSection = document.querySelector(".case-section-section-slide");
  const caseSlideItems   = [...document.querySelectorAll(".case-item-section-slide")];
  const caseSlideTabs    = [...document.querySelectorAll(".tab-features-section-slide")];

  if (!caseSlideSection || !caseSlideItems.length || !caseSlideTabs.length) return;

  let caseSlideIndex = 0;
  let caseSlideLocked = false;
  let caseSlideAnimating = false;
  let caseSlideScrollBuffer = 0;

  const CASE_SLIDE_SCROLL_THRESHOLD = 80;
  const CASE_SLIDE_ANIM_DURATION = 900;

  function caseSlideActivate(i){
    caseSlideItems.forEach(el => el.classList.remove("active"));
    caseSlideTabs.forEach(el => el.classList.remove("active"));

    caseSlideItems[i]?.classList.add("active");
    caseSlideTabs[i]?.classList.add("active");
  }

  caseSlideActivate(0);

  function caseSlideLock(){
    if (caseSlideLocked || isMobileView) return;
    document.body.style.overflow = "hidden";
    caseSlideLocked = true;
  }

  function caseSlideUnlock(){
    document.body.style.overflow = "";
    caseSlideLocked = false;
    caseSlideScrollBuffer = 0;
  }

  /* 🔒 LOCK WHEN SECTION IS CENTERED (DESKTOP ONLY) */
  const caseSlideObserver = new IntersectionObserver(
    ([entry]) => {
      if (isMobileView) return;
      entry.isIntersecting ? caseSlideLock() : caseSlideUnlock();
    },
    { threshold: 0.65 }
  );

  caseSlideObserver.observe(caseSlideSection);

  /* 🖱️ DESKTOP SCROLL CONTROL */
  window.addEventListener("wheel", (e) => {

    if (isMobileView || !caseSlideLocked) return;

    e.preventDefault();

    caseSlideScrollBuffer += e.deltaY;

    if (caseSlideAnimating) return;
    if (Math.abs(caseSlideScrollBuffer) < CASE_SLIDE_SCROLL_THRESHOLD) return;

    caseSlideAnimating = true;

    if (caseSlideScrollBuffer > 0) {
      if (caseSlideIndex < caseSlideItems.length - 1) {
        caseSlideIndex++;
        caseSlideActivate(caseSlideIndex);
      } else {
        caseSlideUnlock();
        caseSlideAnimating = false;
        return;
      }
    } else {
      if (caseSlideIndex > 0) {
        caseSlideIndex--;
        caseSlideActivate(caseSlideIndex);
      } else {
        caseSlideUnlock();
        caseSlideAnimating = false;
        return;
      }
    }

    caseSlideScrollBuffer = 0;

    setTimeout(() => {
      caseSlideAnimating = false;
    }, CASE_SLIDE_ANIM_DURATION);

  }, { passive:false });

  /* 🖱️ TAB CLICK (DESKTOP + MOBILE) */
  caseSlideTabs.forEach((tab, i) => {
    tab.addEventListener("click", () => {
      if (i === caseSlideIndex) return;

      caseSlideIndex = i;
      caseSlideActivate(i);

      if (isMobileView) {
        caseSlideItems[i].scrollIntoView({
          behavior: "smooth",
          block: "start"
        });
      }
    });
  });

});
</script>
</body>
</html>
