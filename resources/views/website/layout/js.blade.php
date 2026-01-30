
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
  const toggle = document.querySelector('.mobile-toggle');
  const menu = document.querySelector('.menu');

  toggle.addEventListener('click', () => {
    menu.classList.toggle('active');
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
const roadmap = document.querySelector(".roadmap-exceptional-indusrty-page-fitness-process");
const steps = roadmap.querySelectorAll(".roadmap-exceptional-indusrty-page-fitness-step");
const boxes = roadmap.querySelectorAll(".roadmap-exceptional-indusrty-page-fitness-box");

function activate(step){
  steps.forEach(s => s.classList.remove("active"));
  boxes.forEach(b => b.classList.remove("active"));

  step.classList.add("active");
  roadmap.querySelector("#step" + step.dataset.step).classList.add("active");
}

steps.forEach(step => {
  step.addEventListener("mouseenter", () => activate(step));
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
const page = document.querySelector(".launch-your-dream-fitness-industry-page");
const tabs = page.querySelectorAll(".launch-your-dream-fitness-industry-page-gym-app-tab");
const contents = page.querySelectorAll(".launch-your-dream-fitness-industry-page-gym-app-content");

function activateTab(tab){
  tabs.forEach(t=>t.classList.remove("active"));
  contents.forEach(c=>c.classList.remove("active"));

  tab.classList.add("active");
  page.querySelector("#"+tab.dataset.tab).classList.add("active");
}

tabs.forEach(tab=>{
  tab.addEventListener("mouseenter",()=>activateTab(tab));
  tab.addEventListener("click",()=>activateTab(tab));
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

const track = section.querySelector(".software-pagination-track");
const cards = section.querySelectorAll(".software-page-card");
const next = section.querySelector(".software-page-btn.next");
const prev = section.querySelector(".software-page-btn.prev");

const perPage = 4;
let page = 0;

function moveSlider(){
  const cardWidth = cards[0].offsetWidth + 30;
  track.style.transform = `translateX(-${page * perPage * cardWidth}px)`;
}

next.addEventListener("click", ()=>{
  const maxPage = Math.ceil(cards.length / perPage) - 1;
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

    const tabs = wrapper.querySelectorAll(
      ".service-page-below-the-counter-tab-item"
    );

    const contents = wrapper.querySelectorAll(
      ".service-page-below-the-counter-content"
    );

    tabs.forEach(tab => {
      tab.addEventListener("mouseover", function () {

        tabs.forEach(t => t.classList.remove("active"));
        this.classList.add("active");

        contents.forEach(c => c.classList.remove("show"));
        wrapper.querySelector("#" + this.dataset.tab).classList.add("show");

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


</body>
</html>
