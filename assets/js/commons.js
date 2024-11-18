AOS.init({
  startEvent: "load",
  offset: 50,
  once: false,
});

// top button
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
document.addEventListener("DOMContentLoaded", function () {
  const dropdownToggles = document.querySelectorAll("#header .dropdown-toggle");
  const dropdownContents = document.querySelectorAll(
    "#header .dropdown-content"
  );

  dropdownToggles.forEach((toggle, index) => {
    const content = dropdownContents[index];

    toggle.addEventListener("click", function (event) {
      event.preventDefault();
      content.classList.toggle("show");
    });

    // Optional: Close the dropdown when clicking outside of it
    document.addEventListener("click", function (event) {
      if (!toggle.contains(event.target) && !content.contains(event.target)) {
        content.classList.remove("show");
      }
    });
  });
});
