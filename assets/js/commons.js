//aos animate
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

//dropdown header
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

    document.addEventListener("click", function (event) {
      if (!toggle.contains(event.target) && !content.contains(event.target)) {
        content.classList.remove("show");
      }
    });
  });
});

// change color hover dropdown list
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

document.addEventListener("DOMContentLoaded", function () {
  const sendIconElements = document.querySelectorAll(".wpforms-submit");
  const svgIcon = `
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="32" height="32" rx="16" fill="white"/>
<path d="M16.5434 16.1315L11.5221 16.9682C11.4643 16.9778 11.4101 17.0025 11.365 17.0397C11.3198 17.0769 11.2852 17.1254 11.2647 17.1802L9.53339 21.8189C9.36805 22.2455 9.81405 22.6522 10.2234 22.4469L22.2234 16.4469C22.3063 16.4053 22.3761 16.3415 22.4248 16.2625C22.4735 16.1836 22.4994 16.0926 22.4994 15.9999C22.4994 15.9071 22.4735 15.8161 22.4248 15.7372C22.3761 15.6583 22.3063 15.5944 22.2234 15.5529L10.2234 9.55286C9.81405 9.3482 9.36805 9.75486 9.53339 10.1809L11.2654 14.8195C11.2859 14.8743 11.3205 14.9228 11.3656 14.96C11.4108 14.9972 11.465 15.0219 11.5227 15.0315L16.5441 15.8682C16.5754 15.8732 16.6039 15.8892 16.6245 15.9133C16.6451 15.9375 16.6564 15.9681 16.6564 15.9999C16.6564 16.0316 16.6451 16.0623 16.6245 16.0864C16.6039 16.1105 16.5754 16.1265 16.5441 16.1315" fill="#AA402A"/>
</svg>

  `;

  sendIconElements.forEach(function (element) {
    element.innerHTML = element.innerHTML + svgIcon;
  });
});
