
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
    const items = [...document.querySelectorAll(".case-item")];
    const tabs  = [...document.querySelectorAll(".tab-features")];

    let index = 0;
    let locked = false;
    let animating = false;
    let lastScrollY = window.scrollY;

    function activate(i) {
        items.forEach(el => el.classList.remove("active"));
        tabs.forEach(el => el.classList.remove("active"));

        items[i].classList.add("active");
        if (tabs[i]) tabs[i].classList.add("active");
    }

    activate(0);

    function lock() {
        document.body.style.overflow = "hidden";
        locked = true;
    }

    function unlock() {
        document.body.style.overflow = "";
        locked = false;
    }

    /* 🔹 AUTO LOCK WHEN SECTION IS CENTERED */
    const observer = new IntersectionObserver(
        ([entry]) => {
            if (!entry.isIntersecting || locked) return;

            lock();

            // detect direction of entry
            if (window.scrollY > lastScrollY) {
                index = 0;                     // coming from top
            } else {
                index = items.length - 1;     // coming from bottom
            }

            activate(index);
        },
        {
            threshold: 0.65
        }
    );

    observer.observe(section);

    /* 🔹 STEP SCROLL CONTROL */
    window.addEventListener("wheel", (e) => {

        lastScrollY = window.scrollY;
        if (!locked || animating) return;

        e.preventDefault();
        animating = true;

        if (e.deltaY > 0) {
            // SCROLL DOWN
            if (index < items.length - 1) {
                index++;
                activate(index);
            } else {
                unlock(); // allow move to next section
            }
        } else {
            // SCROLL UP
            if (index > 0) {
                index--;
                activate(index);
            } else {
                unlock(); // allow move to previous section
            }
        }

        setTimeout(() => animating = false, 700);

    }, { passive: false });

    /* 🔹 TAB CLICK SUPPORT */
    tabs.forEach((tab, i) => {
        tab.addEventListener("click", () => {
            index = i;
            activate(i);
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




</body>

</html>
