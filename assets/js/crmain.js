function toggleMenuBurger() {
  var menuBtn = document.querySelector(".menu-icon");
  var menuBurger = document.querySelector(".main-menu_burger");
  var menu = document.getElementById("menu");

  menuBtn.classList.toggle("open");
  menu.classList.toggle("active");
}

var mBtn = document.querySelector(".menu-icon");
mBtn.addEventListener("click", function (event) {
  event.stopPropagation();
  toggleMenuBurger();
});
window.addEventListener("resize", function () {
  var screenWidth = window.innerWidth;
  var hamburgerMenu = document.querySelector(".main-menu_burger");
  if (screenWidth >= 950) {
    hamburgerMenu.classList.remove("active");
  }
});

window.addEventListener("load", function () {
  window.dispatchEvent(new Event("resize"));
});

window.addEventListener("DOMContentLoaded", function () {
  adjustFooterPosition();
});

window.addEventListener("resize", function () {
  adjustFooterPosition();
});

function adjustFooterPosition() {
  var headerHeight = document.querySelector("header").offsetHeight;
  var mainHeight = document.querySelector("main").offsetHeight;

  if (mainHeight + headerHeight + 100 < window.innerHeight) {
    document.querySelector(".actual-footer").classList.add("fixed-footer");
  } else {
    document.querySelector(".actual-footer").classList.remove("fixed-footer");
  }
}
document.querySelectorAll("a.smooth-scroll").forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
    });
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const scrollToTopBtn = document.getElementById("scrollToTopBtn");

  // Show or hide the scroll-to-top button based on scroll position
  window.addEventListener("scroll", function () {
    if (window.scrollY < 800) {
      scrollToTopBtn.style.display = "none";
    } else {
      scrollToTopBtn.style.display = "flex";
    }
  });

  // Smooth scroll to top when the button is clicked
  scrollToTopBtn.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var inputs = document.querySelectorAll(".form-control");

  inputs.forEach(function (input) {
    input.addEventListener("focus", function () {
      this.nextElementSibling.classList.add("active");
    });

    input.addEventListener("blur", function () {
      if (this.value === "") {
        this.nextElementSibling.classList.remove("active");
      }
    });

    if (input.value !== "") {
      input.nextElementSibling.classList.add("active");
    }
  });
});

let slideIndex = 1;
let slideInterval = setInterval(() => plusSlides(1), 7000); // Auto switch every 7s
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  clearInterval(slideInterval); // Clear existing interval
  showSlides((slideIndex += n));
  slideInterval = setInterval(() => plusSlides(1), 7000); // Restart interval
}

// Thumbnail image controls
function currentSlide(n) {
  clearInterval(slideInterval); // Clear existing interval
  showSlides((slideIndex = n));
  slideInterval = setInterval(() => plusSlides(1), 7000); // Restart interval
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");

  // Ensure slideIndex wraps around if out of bounds
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }

  // Hide all slides but do not set display:none, use visibility instead
  for (i = 0; i < slides.length; i++) {
    slides[i].classList.remove("fade-in");
    slides[i].classList.add("fade-out");
    slides[i].style.visibility = "hidden"; // Hide instead of display:none
  }

  // Prepare and fade-in the current slide
  slides[slideIndex - 1].style.visibility = "visible";
  slides[slideIndex - 1].classList.remove("fade-out");
  slides[slideIndex - 1].classList.add("fade-in");
}
