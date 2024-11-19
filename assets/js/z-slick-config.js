// jQuery(document).ready(function ($) {
//   $(".bg-container").slick({
//     dots: true,
//     infinite: true,
//     speed: 1000,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     autoplay: true,
//     autoplaySpeed: 2500,
//   });
// });

jQuery(document).ready(function ($) {
  $(".events-slider").slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    adaptiveHeight: true,
  });
});

jQuery(document).ready(function ($) {
  $(".slider-wrapper").slick({
    slidesToShow: 1.2,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    infinite: false,
    speed: 300,
    cssEase: "linear",
    centerMode: false,
  });

  function updateContent(currentSlide) {
    var currentSlideElement = $(currentSlide);
    var title = currentSlideElement.data("title");
    var detail = currentSlideElement.data("detail");

    $("[data-activity-title]").text(title);
    $("[data-activity-detail]").text(detail);
  }

  $(".slider-wrapper").on("afterChange", function (event, slick, currentSlide) {
    updateContent(slick.$slides[currentSlide]);
  });

  updateContent($(".slider-wrapper").slick("getSlick").$slides[0]);
});

$(document).ready(function () {
  let isDragging = false;

  $(".impressions-slider").on("mousedown touchstart", function () {
    isDragging = false;
  });

  $(".impressions-slider").on("mousemove touchmove", function () {
    isDragging = true;
  });

  $(".impressions-slider").on("mouseup touchend", function () {
    const wasDragging = isDragging;
    setTimeout(() => {
      isDragging = false;
    }, 50); // Add a slight delay before resetting isDragging
    if (wasDragging) {
      return;
    }
  });

  $(".impression-image a").on("click", function (e) {
    if (isDragging) {
      e.preventDefault();
    }
  });

  $(".impressions-slider").slick({
    slidesToShow: 2.7,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  });

  const lightbox = GLightbox({
    selector: ".glightbox",
  });
});

// $(document).ready(function () {
//   $(".impressions-slider").slick({
//     dots: true,
//     infinite: true,
//     speed: 300,
//     slidesToShow: 3,
//     adaptiveHeight: true,
//     centerMode: true,
//   });
//   const lightbox = GLightbox({
//     selector: ".glightbox",
//   });
// });
