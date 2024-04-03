const localStorageTheme = localStorage.getItem("theme");
const systemSettingDark = window.matchMedia("(prefers-color-scheme: dark)");
const initialTheme = calculateSettingAsThemeString({
  localStorageTheme,
  systemSettingDark,
});

let currentThemeSetting = initialTheme;

document.querySelector("html").setAttribute("data-theme", initialTheme);

const buttons = document.querySelectorAll(".dark-mode-switch");

const sunSvgPath =
  wpData.baseUrl + "/wp-content/themes/blue-doe/assets/images/sun.svg";
const moonSvgPath =
  wpData.baseUrl + "/wp-content/themes/blue-doe/assets/images/moon.svg";

buttons.forEach((button) => {
  const initialIconSrc = initialTheme === "dark" ? moonSvgPath : sunSvgPath;
  button.querySelector("img").src = initialIconSrc;
  button.addEventListener("click", () => {
    const newTheme = currentThemeSetting === "dark" ? "light" : "dark";
    document.querySelector("html").setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
    currentThemeSetting = newTheme;
    const newSrc = newTheme === "dark" ? moonSvgPath : sunSvgPath;
    button.querySelector("img").src = newSrc;
  });
});

function calculateSettingAsThemeString({
  localStorageTheme,
  systemSettingDark,
}) {
  if (localStorageTheme !== null) {
    return localStorageTheme;
  }
  if (systemSettingDark.matches) {
    return "dark";
  }
  return "light";
}
function toggleDropdown() {
  var dropdownContent = document.getElementById("userDropdownContent");
  dropdownContent.classList.toggle("show");
}

window.addEventListener("click", function (event) {
  var userDrop = document.getElementById("userDropdown");
  var dropdownContent = document.getElementById("userDropdownContent");
  var hamburgerMenu = document.querySelector(".hamburger-menu");
  if (!userDrop.contains(event.target)) {
    dropdownContent.classList.remove("show");
  }

  if (
    !event.target.classList.contains("hamburger-icon") &&
    !hamburgerMenu.contains(event.target)
  ) {
    hamburgerMenu.classList.remove("active");
  }
});

function toggleMenu() {
  var menu = document.querySelector(".hamburger-menu");
  menu.classList.toggle("active");
  console.log(menu === document.querySelector(".hamburger-menu.active"));
}

window.addEventListener("resize", function () {
  var screenWidth = window.innerWidth;
  var hamburgerMenu = document.querySelector(".hamburger-menu");
  if (screenWidth >= 730) {
    hamburgerMenu.classList.remove("active");
  }
});

var hamburgerIcon = document.querySelector(".hamburger-icon");
hamburgerIcon.addEventListener("click", function (event) {
  event.stopPropagation();
  toggleMenu();
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
// Smooth scroll function
document.addEventListener("DOMContentLoaded", function () {
  const smoothScrollLinks = document.querySelectorAll(".smooth-scroll");

  smoothScrollLinks.forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      const targetId = this.getAttribute("href").substring(1);
      const targetElement = document.getElementById(targetId);
      const offsetTop = targetElement.offsetTop;

      window.scrollTo({
        top: offsetTop,
        behavior: "smooth",
      });
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
