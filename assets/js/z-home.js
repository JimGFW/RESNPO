//map switch
document.querySelectorAll(".location-card").forEach((locCard) => {
  locCard.addEventListener("click", function () {
    const location = this.getAttribute("data-location");
    const iframe = document.getElementById("map-frame");
    iframe.src = location;
  });
});
