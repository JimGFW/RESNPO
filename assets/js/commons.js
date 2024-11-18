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
document.addEventListener("DOMContentLoaded", function () {
  const dropdownContents = document.querySelectorAll(".dropdown-content a");

  dropdownContents.forEach((content) => {
    const originalContent = content.querySelector("span").innerHTML;

    content.addEventListener("mouseover", function () {
      const playIcon = content.querySelector("span");
      if (playIcon) {
        playIcon.innerHTML =
          '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" id="svg-55190279_572" class="padding-indicator" style="--padding-box-shadow: inset 0 0px 0 0 var(--light-green), inset -0px 0 0 0 var(--light-green), inset 0 -0px 0 0 var(--light-green), inset 0px 0 0 0 var(--light-green); --hover-padding-box-shadow: inset 0 0px 0 0 var(--dark-green), inset -0px 0 0 0 var(--dark-green), inset 0 -0px 0 0 var(--dark-green), inset 0px 0 0 0 var(--dark-green);"><circle opacity="0.5" cx="20" cy="20" r="20" fill="#AA402A" class="padding-indicator" style="--padding-box-shadow: inset 0 0px 0 0 var(--light-green), inset -0px 0 0 0 var(--light-green), inset 0 -0px 0 0 var(--light-green), inset 0px 0 0 0 var(--light-green); --hover-padding-box-shadow: inset 0 0px 0 0 var(--dark-green), inset -0px 0 0 0 var(--dark-green), inset 0 -0px 0 0 var(--dark-green), inset 0px 0 0 0 var(--dark-green);"></circle><circle cx="20" cy="20" r="16" fill="#AA402A" class="padding-indicator" style="--padding-box-shadow: inset 0 0px 0 0 var(--light-green), inset -0px 0 0 0 var(--light-green), inset 0 -0px 0 0 var(--light-green), inset 0px 0 0 0 var(--light-green); --hover-padding-box-shadow: inset 0 0px 0 0 var(--dark-green), inset -0px 0 0 0 var(--dark-green), inset 0 -0px 0 0 var(--dark-green), inset 0px 0 0 0 var(--dark-green);"></circle><path d="M19.6133 24.3867L23.0666 20.9333C23.1902 20.81 23.2883 20.6635 23.3552 20.5022C23.4221 20.3409 23.4565 20.168 23.4565 19.9933C23.4565 19.8187 23.4221 19.6458 23.3552 19.4845C23.2883 19.3232 23.1902 19.1767 23.0666 19.0533L19.6133 15.6C18.7733 14.7733 17.3333 15.36 17.3333 16.5467V23.44C17.3333 24.64 18.7733 25.2267 19.6133 24.3867Z" fill="white" class="padding-indicator" style="--padding-box-shadow: inset 0 0px 0 0 var(--light-green), inset -0px 0 0 0 var(--light-green), inset 0 -0px 0 0 var(--light-green), inset 0px 0 0 0 var(--light-green); --hover-padding-box-shadow: inset 0 0px 0 0 var(--dark-green), inset -0px 0 0 0 var(--dark-green), inset 0 -0px 0 0 var (--dark-green), inset 0px 0 0 0 var(--dark-green);"></path></svg>';
      }
    });

    content.addEventListener("mouseout", function () {
      const playIcon = content.querySelector("span");
      if (playIcon) {
        playIcon.innerHTML = originalContent; // Reset to the original content
      }
    });
  });
});
