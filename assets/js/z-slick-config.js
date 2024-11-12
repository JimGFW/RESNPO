jQuery(document).ready(function ($) {
  $(".bg-container").slick({
    dots: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
  });
});

jQuery(document).ready(function ($) {
  $(".events-slider").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    adaptiveHeight: true,
  });
});
