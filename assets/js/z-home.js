//map switch
document.querySelectorAll(".location-card").forEach((locCard) => {
  locCard.addEventListener("click", function () {
    document.querySelectorAll(".location-card").forEach((card) => {
      card.classList.remove("__active");
    });
    this.classList.add("__active");
    const location = this.getAttribute("data-location");
    const iframe = document.getElementById("map-frame");
    iframe.src = location;
  });
});
