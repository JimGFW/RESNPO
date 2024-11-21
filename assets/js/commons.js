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
        playIcon.innerHTML = `
<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="10" cy="10" r="10" fill="#ffffff"/> <!-- Brown Circle -->
  <path d="M9.75828 12.7418L11.9166 10.5834C11.9939 10.5063 12.0552 10.4148 12.097 10.314C12.1388 10.2131 12.1603 10.1051 12.1603 9.99593C12.1603 9.88679 12.1388 9.77872 12.097 9.67791C12.0552 9.5771 11.9939 9.48553 11.9166 9.40843L9.75828 7.2501C9.23328 6.73343 8.33328 7.1001 8.33328 7.84176V12.1501C8.33328 12.9001 9.23328 13.2668 9.75828 12.7418Z" fill="#AA402A"/> <!-- White Triangle -->
</svg>

        `;
      }
    });

    content.addEventListener("mouseout", function () {
      const playIcon = content.querySelector("span");
      if (playIcon) {
        playIcon.innerHTML = originalContent;
      }
    });
  });
});

// donation switch tabs

document.addEventListener("DOMContentLoaded", function () {
  const hashLinks = document.querySelectorAll(".hash-donation");
  const tabs = document.querySelectorAll(".tab");

  window.showTab = function (e, targetHash) {
    e.preventDefault();

    tabs.forEach((tab) => {
      tab.classList.add("d-none");
    });

    const targetTab = document.getElementById(targetHash);
    if (targetTab) {
      targetTab.classList.remove("d-none");
    }

    hashLinks.forEach((link) => {
      link.classList.remove("active");
      link.style.backgroundColor = "";
      link.style.color = "";
    });

    e.currentTarget.classList.add("active");
    e.currentTarget.style.backgroundColor = "var(--lightbrown)";
    e.currentTarget.style.color = "#fff";
  };

  if (hashLinks.length > 0) {
    hashLinks[0].classList.add("active");
    hashLinks[0].style.backgroundColor = "var(--lightbrown)";
    hashLinks[0].style.color = "#fff";
    tabs[0].classList.remove("d-none");
  }
});
