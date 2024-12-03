// ue lightbox
function openModalUE(imageUrl, title, description) {
  var modal = document.getElementById("customLightbox");
  var modalImage = document.getElementById("modalImage");
  var modalTitle = document.getElementById("modalTitle");
  var modalDescription = document.getElementById("modalDescription");

  modalImage.src = imageUrl;
  modalTitle.textContent = title;
  modalDescription.textContent = description;

  modal.style.display = "block";
}

// close modal
var customLightboxCloseButton = document.querySelector(
  "#customLightbox .close"
);
if (customLightboxCloseButton) {
  customLightboxCloseButton.onclick = function () {
    document.getElementById("customLightbox").style.display = "none";
  };

  window.onclick = function (event) {
    var customLightbox = document.getElementById("customLightbox");
    if (event.target == customLightbox) {
      customLightbox.style.display = "none";
    }
  };
}
// lightbox for achievements
function openModalAchievements(achievementId) {
  const modal = document.getElementById("achievementModal");
  const modalSlider = modal.querySelector(".modal-slider");
  const card = document.querySelector(
    `[data-achievement-id="${achievementId}"]`
  );

  modalSlider.innerHTML = "";

  const images = card.querySelectorAll(".pa-carousels");
  images.forEach((img) => {
    const slide = document.createElement("div");
    const newImg = document.createElement("img");
    newImg.src = img.src;
    newImg.classList.add("glightbox"); // Add the glightbox class
    slide.appendChild(newImg);
    modalSlider.appendChild(slide);
  });

  $(".modal-slider").slick({
    dots: true,
    arrows: false,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    adaptiveHeight: true,
  });

  const locationElement = card.querySelector(
    ".achievement-description:nth-child(3) h6"
  );
  const location = locationElement.getAttribute("data-location");

  document.getElementById("modalCategory").textContent = card.querySelector(
    ".achievement-description h6"
  ).textContent;
  document.getElementById("modalDateTime").textContent = card.querySelectorAll(
    ".achievement-description h6"
  )[1].textContent;
  document.getElementById("modalLocation").textContent = location;

  modal.style.display = "block";

  // Initialize GLightbox
  const lightbox = GLightbox({
    selector: ".glightbox",
  });

  // Close achievementModal
  document.querySelector(".modal-close").onclick = function () {
    const modal = document.getElementById("achievementModal");
    $(".modal-slider").slick("unslick");
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    const achievementModal = document.getElementById("achievementModal");
    if (event.target == achievementModal) {
      $(".modal-slider").slick("unslick");
      achievementModal.style.display = "none";
    }
  };
}
