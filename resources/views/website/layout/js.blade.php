
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
{{-- <script>
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
</script> --}}



<script>
document.addEventListener("DOMContentLoaded", () => {

    const caseSection = document.querySelector(".case-section");

    /* 🔒 Guard: section nahi hai to exit */
    if (!caseSection) return;

    const caseItems = [
      ...caseSection.querySelectorAll(".case-item")
    ];

    const caseTabs = [
      ...document.querySelectorAll(".tab-features")
    ];

    const totalSlides = caseItems.length;

    /* Extra safety */
    if (!totalSlides) return;

    // 🔑 slides count se height set
    caseSection.style.setProperty("--slides", totalSlides);

    function activateSlide(index){
        caseItems.forEach(el => el.classList.remove("active"));
        caseTabs.forEach(el => el.classList.remove("active"));

        caseItems[index]?.classList.add("active");
        caseTabs[index]?.classList.add("active");
    }

    activateSlide(0);

    window.addEventListener("scroll", () => {
        const rect = caseSection.getBoundingClientRect();
        const vh = window.innerHeight;

        // section viewport ke andar ho
        if (rect.top <= 0 && rect.bottom >= vh) {
            const progress =
              Math.abs(rect.top) / ((totalSlides - 1) * vh);

            const activeIndex = Math.min(
                totalSlides - 1,
                Math.floor(progress * totalSlides)
            );

            activateSlide(activeIndex);
        }
    });

    // tabs click support
    caseTabs.forEach((tab, i) => {
        tab.addEventListener("click", () => {
            window.scrollTo({
                top: caseSection.offsetTop + i * window.innerHeight,
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
 <!--        
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
 -->


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
  if (typeof Swiper !== "undefined") {
    new Swiper(".myVideoSlider", {
      slidesPerView: 3,
      spaceBetween: 25,
      slidesPerGroup: 3,
      loop: false,

      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },

      breakpoints: {
        0:    { slidesPerView: 1, slidesPerGroup: 1 },
        768:  { slidesPerView: 2, slidesPerGroup: 2 },
        1200: { slidesPerView: 3, slidesPerGroup: 3 }
      }
    });
  }

  /* ========== TESTIMONIAL POPUP ========== */
  const popup = document.querySelector(".homepage-testimonial-popup");
  const video = document.getElementById("homepage-testimonial-video");
  const closeBtn = document.querySelector(".homepage-testimonial-close");

  /* ❗ SAFETY CHECK */
  if (!popup || !video) return;

  /* ✅ OPEN POPUP (DYNAMIC SAFE) */
  document.addEventListener("click", function (e) {
    const card = e.target.closest(".homepage-testimonial-card");
    if (!card) return;

    const videoSrc = card.dataset.video;
    if (!videoSrc) return;

    popup.style.display = "flex";

    // iframe + video safe
    video.src = videoSrc.includes("youtube")
      ? videoSrc + "?autoplay=1"
      : videoSrc;
  });

  /* ❌ CLOSE POPUP */
  function closeTestimonialPopup() {
    popup.style.display = "none";
    video.src = ""; // iframe + video both stop
  }

  /* SAFE EVENTS */
  closeBtn?.addEventListener("click", closeTestimonialPopup);

  popup.addEventListener("click", e => {
    if (e.target === popup) closeTestimonialPopup();
  });

  document.addEventListener("keydown", e => {
    if (e.key === "Escape") closeTestimonialPopup();
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
document.addEventListener('click', function (e) {

    const clickedLink = e.target.closest('.nav-link');
    const clickedInsideMega = e.target.closest('.mega-menu');
    if (clickedLink) {
        const li = clickedLink.closest('li.has-mega');
        document.querySelectorAll('.menu li.has-mega.open')
            .forEach(item => item.classList.remove('open'));

        if (li && window.innerWidth <= 991) {
            li.classList.add('open');
        }
        return;
    }
    document.querySelectorAll('.menu li.has-mega.open')
        .forEach(li => li.classList.remove('open'));
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
/* Parent wrapper */
const fitnessRoadmap = document.querySelector(
  ".roadmap-exceptional-indusrty-page-fitness-process"
);

if (fitnessRoadmap) {

  const fitnessSteps = fitnessRoadmap.querySelectorAll(
    ".roadmap-exceptional-indusrty-page-fitness-step"
  );

  const fitnessBoxes = fitnessRoadmap.querySelectorAll(
    ".roadmap-exceptional-indusrty-page-fitness-box"
  );

  function activateFitnessStep(activeStep) {

    fitnessSteps.forEach(step =>
      step.classList.remove("active")
    );

    fitnessBoxes.forEach(box =>
      box.classList.remove("active")
    );

    activeStep.classList.add("active");

    const targetBox = fitnessRoadmap.querySelector(
      "#fitness-step-" + activeStep.dataset.step
    );

    if (targetBox) {
      targetBox.classList.add("active");
    }
  }

  fitnessSteps.forEach(step => {
    step.addEventListener("mouseenter", () => {
      activateFitnessStep(step);
    });
  });

}
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {

  const track = document.querySelector(
    ".power-packed-feature-industry-page-track"
  );
  const bar = document.querySelector(
    ".power-packed-feature-industry-page .progress-bar span"
  );
  const nextBtn = document.querySelector(
    ".power-packed-feature-industry-page .next"
  );
  const prevBtn = document.querySelector(
    ".power-packed-feature-industry-page .prev"
  );

  /* 🔒 SAFETY CHECK */
  if (!track || !bar || !nextBtn || !prevBtn) return;

  const cardWidth = 350;
  const totalCards = track.children.length / 2;
  let sliderIndex = 0;

  nextBtn.onclick = () => {
    sliderIndex++;
    moveSlider();
  };

  prevBtn.onclick = () => {
    sliderIndex--;
    moveSlider();
  };

  function moveSlider() {
    track.scrollTo({
      left: sliderIndex * cardWidth,
      behavior: "smooth"
    });

    let visible = sliderIndex % totalCards;
    if (visible < 0) visible = totalCards - 1;

    const percent = ((visible + 1) / totalCards) * 100;
    bar.style.width = percent + "%";

    /* Infinite loop fix */
    if (sliderIndex >= totalCards) {
      setTimeout(() => {
        track.scrollLeft = 0;
        sliderIndex = 0;
      }, 400);
    }

    if (sliderIndex < 0) {
      track.scrollLeft = totalCards * cardWidth;
      sliderIndex = totalCards - 1;
    }
  }

});
</script>


<!-- 
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
 -->

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
document.addEventListener("DOMContentLoaded", () => {

  const gymContainer = document.querySelector(
    ".launch-your-dream-fitness-industry-page"
  );

  /* 🔒 Guard */
  if (!gymContainer) return;

  const gymTabs = gymContainer.querySelectorAll(
    ".launch-your-dream-fitness-industry-page-gym-app-tab"
  );

  const gymContents = gymContainer.querySelectorAll(
    ".launch-your-dream-fitness-industry-page-gym-app-content"
  );

  function switchGymTab(activeTab) {

    gymTabs.forEach(tab => tab.classList.remove("active"));
    gymContents.forEach(content => content.classList.remove("active"));

    activeTab.classList.add("active");

    const targetContent = gymContainer.querySelector(
      "#" + activeTab.dataset.tab
    );

    if (targetContent) {
      targetContent.classList.add("active");
    }
  }

  gymTabs.forEach(tab => {
    tab.addEventListener("mouseenter", () => switchGymTab(tab));
    tab.addEventListener("click", () => switchGymTab(tab));
  });

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
 <script>
document.addEventListener("DOMContentLoaded", () => {

  const softwareSection = document.querySelector(
    ".enterprise-custome-softawere-devlopment-software-service-page-pagination-section"
  );

  /* 🔒 Guard */
  if (!softwareSection) return;

  const softwareTrack = softwareSection.querySelector(
    ".software-pagination-track"
  );

  const softwareCards = softwareSection.querySelectorAll(
    ".software-page-card"
  );

  const nextBtn = softwareSection.querySelector(
    ".software-page-btn.next"
  );

  const prevBtn = softwareSection.querySelector(
    ".software-page-btn.prev"
  );

  /* Extra safety */
  if (!softwareTrack || !softwareCards.length || !nextBtn || !prevBtn) return;

  const perPage = 4;
  let currentPage = 0;

  function moveSoftwareSlider(){
    const cardWidth =
      softwareCards[0].offsetWidth + 30;

    softwareTrack.style.transform =
      `translateX(-${currentPage * perPage * cardWidth}px)`;
  }

  nextBtn.addEventListener("click", () => {
    const maxPage =
      Math.ceil(softwareCards.length / perPage) - 1;

    if (currentPage < maxPage) {
      currentPage++;
      moveSoftwareSlider();
    }
  });

  prevBtn.addEventListener("click", () => {
    if (currentPage > 0) {
      currentPage--;
      moveSoftwareSlider();
    }
  });

});
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
document.addEventListener("DOMContentLoaded", function () {

  let indexourwall = 0;

  const trackourwall = document.querySelector(
    ".our-wall-of-fame-home-page-award-track"
  );

  const dotsourwalls = document.querySelectorAll(
    ".our-wall-of-fame-home-page-award-dots span"
  );

  const cards = document.querySelectorAll(
    ".our-wall-of-fame-home-page-award-card"
  );

  /* ❗ SAFETY CHECK */
  if (!trackourwall || !dotsourwalls.length || !cards.length) {
    console.warn("Our wall slider elements not found");
    return;
  }

  const gap = 20;
  const cardWidth = cards[0].offsetWidth + gap;

  const cardsPerSlide = 2;   // 👈 IMPORTANT
  const totalSlides = dotsourwalls.length;

  /* ===== MOVE SLIDER ===== */
  function moveOurWallSlider() {

    dotsourwalls.forEach(d => d.classList.remove("active"));
    dotsourwalls[indexourwall].classList.add("active");

    trackourwall.scrollTo({
      left: indexourwall * cardWidth * cardsPerSlide,
      behavior: "smooth"
    });
  }

  /* ===== DOT CLICK ===== */
  dotsourwalls.forEach(dot => {
    dot.addEventListener("click", () => {
      indexourwall = Number(dot.dataset.indexourwall);
      moveOurWallSlider();
    });
  });

  /* ===== AUTO SLIDE ===== */
  setInterval(() => {
    indexourwall++;
    if (indexourwall >= totalSlides) indexourwall = 0;
    moveOurWallSlider();
  }, 3000);

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

  /* ===== SLIDER ===== */
  const track = document.querySelector(
    ".common-section-everypage-blog-listing-track"
  );

  const cards = track
    ? Array.from(track.querySelectorAll(
        ".common-section-everypage-blog-listing-card"
      ))
    : [];

  const nextBtn = document.querySelector(
    ".common-section-everypage-blog-listing-nav-btn.next"
  );

  const prevBtn = document.querySelector(
    ".common-section-everypage-blog-listing-nav-btn.prev"
  );

  if (!track || !cards.length || !nextBtn || !prevBtn) return;

  function getVisible() {
    if (window.innerWidth <= 768) return 1;
    if (window.innerWidth <= 1024) return 2;
    return 3;
  }

  let visible = getVisible();

  /* CLONE */
  const firstClones = cards.slice(0, visible).map(c => c.cloneNode(true));
  const lastClones  = cards.slice(cards.length - visible).map(c => c.cloneNode(true));

  lastClones.forEach(c => track.prepend(c));
  firstClones.forEach(c => track.append(c));

  let allCards = Array.from(
    track.querySelectorAll(".common-section-everypage-blog-listing-card")
  );

  let index = visible;

  function slide(noAnim = false) {
    const gap = 24;
    const width = allCards[0].offsetWidth + gap;

    track.style.transition = noAnim ? "none" : "transform .6s ease";
    track.style.transform = `translateX(-${index * width}px)`;
  }

  slide(true);

  nextBtn.addEventListener("click", () => {
    index++;
    slide();

    if (index === allCards.length - visible) {
      setTimeout(() => {
        index = visible;
        slide(true);
      }, 600);
    }
  });

  prevBtn.addEventListener("click", () => {
    index--;
    slide();

    if (index === 0) {
      setTimeout(() => {
        index = allCards.length - visible * 2;
        slide(true);
      }, 600);
    }
  });

  window.addEventListener("resize", () => {
    visible = getVisible();
    slide(true);
  });

  /* ===== VIDEO POPUP ===== */
  const popup = document.querySelector(
    ".common-section-everypage-blog-listing-video-popup"
  );

  if (!popup) return;

  const iframe = popup.querySelector("iframe");
  const closeBtn = popup.querySelector(
    ".common-section-everypage-blog-listing-popup-close"
  );
  const overlay = popup.querySelector(
    ".common-section-everypage-blog-listing-popup-overlay"
  );

  document.addEventListener("click", e => {
    const btn = e.target.closest(
      ".common-section-everypage-blog-listing-play-btn"
    );
    if (!btn) return;

    const videoUrl = btn.dataset.video;
    if (!videoUrl) return;

    popup.classList.add("active");
    iframe.src = videoUrl.includes("youtube")
      ? videoUrl + "?autoplay=1"
      : videoUrl;
  });

  function closePopup() {
    popup.classList.remove("active");
    iframe.src = "";
  }

  closeBtn?.addEventListener("click", closePopup);
  overlay?.addEventListener("click", closePopup);

});
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
<script>
document.querySelectorAll('.hidden-video').forEach((video, index) => {
    const img = document.querySelectorAll('.video-thumbnail')[index];

    video.addEventListener('loadedmetadata', () => {
        video.currentTime = 1; // capture at 1s
    });

    video.addEventListener('seeked', () => {
        const canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        img.src = canvas.toDataURL('image/jpeg');
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

  const track = document.getElementById("servicesTrack");
  const sliderWrapper = document.querySelector(
    ".digital-marketing-page-services-slider-wrapper"
  );

  if (!track || !sliderWrapper) {
    console.warn("Digital marketing slider elements not found");
    return;
  }

  let slides = Array.from(
    track.querySelectorAll(".digital-marketing-page-service-slide")
  );

  if (!slides.length) return;

  /* ===== CLONE SLIDES ===== */
  slides.forEach(slide => {
    track.appendChild(slide.cloneNode(true));
  });

  slides = Array.from(
    track.querySelectorAll(".digital-marketing-page-service-slide")
  );

  let index = 0;
  const totalSlides = slides.length / 2;
  let autoSlideInterval = null;

  function nextSlide() {
    index++;
    track.style.transition = "transform 0.6s ease";
    track.style.transform = `translateX(-${index * 100}%)`;

    if (index === totalSlides) {
      setTimeout(() => {
        track.style.transition = "none";
        index = 0;
        track.style.transform = "translateX(0)";
      }, 600);
    }
  }

  function prevSlide() {
    if (index === 0) {
      track.style.transition = "none";
      index = totalSlides;
      track.style.transform = `translateX(-${index * 100}%)`;

      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          track.style.transition = "transform 0.6s ease";
          index--;
          track.style.transform = `translateX(-${index * 100}%)`;
        });
      });
    } else {
      index--;
      track.style.transition = "transform 0.6s ease";
      track.style.transform = `translateX(-${index * 100}%)`;
    }
  }

  function startAutoSlide() {
    if (autoSlideInterval) return;
    autoSlideInterval = setInterval(nextSlide, 4000);
  }

  function stopAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = null;
  }

  /* START */
  startAutoSlide();

  /* PAUSE ON HOVER (SAFE) */
  sliderWrapper.addEventListener("mouseenter", stopAutoSlide);
  sliderWrapper.addEventListener("mouseleave", startAutoSlide);

  /* OPTIONAL: if buttons use onclick */
  window.nextSlide = nextSlide;
  window.prevSlide = prevSlide;

});
</script>




{{-- <script>
const tabDatamarketingstrategie = {
  app: {
    img: "{{ asset('website1/assets/images/turpentine-oil.jpeg') }}",
    stat1: "75%",
    stat1Text: "Increase Traffic by",
    stat2: "90 Days",
    stat2Text: "Time Improvement",
    desc: "AppDukaan is among the leading providers of on-demand app solutions..."
  },
  expo: {
    img: "{{ asset('website1/assets/images/turpentine-oil.jpeg') }}",
    stat1: "45%",
    stat1Text: "Increase in Downloads",
    stat2: "58%",
    stat2Text: "Boost in Brand Awareness",
    desc: "Expo City Eats is the food ordering platform for denizens of Expo City Dubai."
  },
  fit: {
    img: "{{ asset('website1/assets/images/understanding-astigmatism.png') }}",
    stat1: "60%",
    stat1Text: "Fitness Growth",
    stat2: "45 Days",
    stat2Text: "Results Achieved",
    desc: "Williamson Fit focuses on personalized fitness and digital wellness programs."
  }
};

const tabsDatamarketingstrategie  = document.querySelectorAll(
  ".digital-marketing-page-marketing-strategies-case-tabs li"
);

const imgEl = document.getElementById(
  "digital-marketing-page-marketing-strategies-caseImg"
);

tabsDatamarketingstrategie.forEach(tab => {
  tab.addEventListener("mouseenter", () => {

    // active tab
    tabsDatamarketingstrategie.forEach(t => t.classList.remove("active"));
    tab.classList.add("active");

    const data = tabDatamarketingstrategie[tab.dataset.tab];

    // LEFT IMAGE CHANGE
    imgEl.style.opacity = "0";
    setTimeout(() => {
      imgEl.src = data.img;
      imgEl.style.opacity = "1";
    }, 150);

    // RIGHT CONTENT CHANGE
    document.getElementById("stat1").innerText = data.stat1;
    document.getElementById("stat1Text").innerText = data.stat1Text;
    document.getElementById("digital-marketing-page-marketing-strategies-stat2").innerText = data.stat2;
    document.getElementById("digital-marketing-page-marketing-strategies-stat2Text").innerText = data.stat2Text;
    document.getElementById("digital-marketing-page-marketing-strategies-caseDesc").innerText = data.desc;
  });
});
</script> --}}
<script>
document.addEventListener("DOMContentLoaded", function () {

    const tabs = document.querySelectorAll(
        ".digital-marketing-page-marketing-strategies-case-tabs li"
    );

    const imgEl = document.getElementById("caseImg");
    const stat1 = document.getElementById("stat1");
    const stat2 = document.getElementById("stat2");
    const desc  = document.getElementById("caseDesc");

    tabs.forEach(tab => {

        const changeContent = () => {

            tabs.forEach(t => t.classList.remove("active"));
            tab.classList.add("active");

            imgEl.style.opacity = "0";

            setTimeout(() => {
                imgEl.src = tab.dataset.image;
                imgEl.style.opacity = "1";
            }, 150);

            stat1.innerText = tab.dataset.growth;
            stat2.innerText = tab.dataset.result;
            desc.innerText  = tab.dataset.desc;
        };

        // Hover
        tab.addEventListener("mouseenter", changeContent);

        // Click (for mobile)
        tab.addEventListener("click", changeContent);
    });

});
</script>


</body>
</html>
