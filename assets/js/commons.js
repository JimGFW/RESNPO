AOS.init({
  startEvent: "load",
  offset: 200,
  once: false,
});

// top button
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
