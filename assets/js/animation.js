document.addEventListener("DOMContentLoaded", function () {
  const fadeLeftElements = document.querySelectorAll(".fade-left");
  const fadeRightElements = document.querySelectorAll(".fade-right");
  const fadeUpElements = document.querySelectorAll(".fade-up");
  const fadeDownElements = document.querySelectorAll(".fade-down");

  function checkElementsInView() {
    const allElements = [
      ...fadeLeftElements,
      ...fadeRightElements,
      ...fadeUpElements,
      ...fadeDownElements,
    ];

    allElements.forEach((el) => {
      const rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight && rect.bottom >= 0) {
        el.classList.add("active");
      } else {
        el.classList.remove("active");
      }
    });
  }

  window.addEventListener("scroll", checkElementsInView);
  checkElementsInView();
});
