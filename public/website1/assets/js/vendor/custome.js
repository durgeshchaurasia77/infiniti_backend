


let index1 = 0;
const slides = document.querySelector(".slides");
const dots1 = document.querySelectorAll(".dot");

function showSlide(i){
  index1 = i;
  slides.style.transform = `translateX(-${index1 * 230}px)`;

  dots1.forEach(d=>d.classList.remove("active"));
  dots1[index1].classList.add("active");
}

dots1.forEach((dot,i)=>{
  dot.addEventListener("click", ()=>showSlide(i));
});

setInterval(()=>{
  index1 = (index1 + 1) % dots1.length;
  showSlide(index1);
},3000);

const cards = document.querySelectorAll(".tech-card");

cards.forEach(card => {
  card.addEventListener("mouseenter", () => {
    cards.forEach(c => c.classList.remove("active"));
    card.classList.add("active");
  });

  card.addEventListener("mouseleave", () => {
    cards.forEach(c => c.classList.remove("active"));
  });
});





// one end 

 const customerAwardTrack = document.getElementById("awardTrack");
    const customerAwardCards = document.querySelectorAll(".award-card");

    let customerScrollPosition = 0;
    const customerGap = 20;

    // calculate single card width
    const customerCardWidth =
        customerAwardCards[0].offsetWidth + customerGap;

    // duplicate cards for infinite effect
    customerAwardCards.forEach(card => {
        customerAwardTrack.appendChild(card.cloneNode(true));
    });

    function customerAutoScroll() {
        customerScrollPosition += 1;

        // move slider
        customerAwardTrack.style.transform =
        `translateX(-${customerScrollPosition}px`;

        // reset smoothly when half scrolled
        if (
        customerScrollPosition >=
        customerCardWidth * customerAwardCards.length
        ) {
        customerScrollPosition = 0;
        customerAwardTrack.style.transform = `translateX(0px)`;
        }
    }

    // START AUTO SCROLL
    setInterval(customerAutoScroll, 20);
   
  
    // two end 


   
const toggle = document.querySelector('.mobile-toggle');
const menu = document.querySelector('.menu');
const closeBtn = document.querySelector('.menu-close');

// open
toggle.onclick = () => {
  menu.classList.add('active');
  document.body.style.overflow = 'hidden';
};

// close
closeBtn.onclick = () => {
  menu.classList.remove('active');
  document.body.style.overflow = '';
};

// mega click mobile
document.querySelectorAll('.has-mega > a').forEach(link => {
  link.addEventListener('click', e => {
    if (window.innerWidth < 992) {
      e.preventDefault();
      link.parentElement.classList.toggle('open');
    }
  });
});

// three end 

document.addEventListener("DOMContentLoaded", function () {

  const header = document.querySelector(".navbar");
  const hero = document.querySelector(".page-hero");

  if (!header) return; // safety

  let triggerHeight = 100;

  if (hero) {
    triggerHeight = hero.offsetHeight - header.offsetHeight;
  }

  window.addEventListener("scroll", function () {
    if (window.scrollY > triggerHeight) {
      header.classList.add("is-fixed");
    } else {
      header.classList.remove("is-fixed");
    }
  });

});

// four 

document.addEventListener("DOMContentLoaded", () => {

  const slides = document.querySelectorAll(".country");
  const prevBtn = document.querySelector(".consult-prev-btn");
  const nextBtn = document.querySelector(".consult-next-btn");

  let index = 0;
  let autoTimer;

//   function showSlide(i){
//     slides.forEach((slide, idx) => {
//       slide.classList.toggle("active", idx === i);
//     });
//   }
function showSlide(i){
  slides.forEach((slide, idx) => {
    slide.classList.remove("active");
  });

  // tiny delay for smooth transition
  setTimeout(() => {
    slides[i].classList.add("active");
  }, 30);
}

  function nextSlide(){
    index = (index + 1) % slides.length;
    showSlide(index);
  }

  function prevSlide(){
    index = (index - 1 + slides.length) % slides.length;
    showSlide(index);
  }

  function startAuto(){
    autoTimer = setInterval(nextSlide, 4500); // auto slide
  }

  function resetAuto(){
    clearInterval(autoTimer);
    startAuto();
  }

  nextBtn.addEventListener("click", () => {
    nextSlide();
    resetAuto();
  });

  prevBtn.addEventListener("click", () => {
    prevSlide();
    resetAuto();
  });

  // init
  showSlide(index);
  startAuto();
});
