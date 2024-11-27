$(document).ready(function ($) {
  $(".events-slider").slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    adaptiveHeight: true,
  });
});

$(document).ready(function ($) {
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

// photo gallery
$(".gallery-wrapper").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 1000,
  autoplay: true,
  autoplaySpeed: 2000,
  centerMode: true,
  centerPadding: "25%", // or 350px;
  infinite: true,
  // arrows: true,
});

// activities n cultural exchange
$(".cards-content-wrapper").slick({
  slidesToShow: 2.83,
  slidesToScroll: 1,
  speed: 1000,
  infinite: true,
  variableWidth: false,
  centerMode: false,
});
$(".prev-btn").click(function () {
  $(".cards-content-wrapper").slick("slickPrev");
});
$(".next-btn").click(function () {
  $(".cards-content-wrapper").slick("slickNext");
});
$(".prev-btn").addClass("slick-disabled");
$(".cards-content-wrapper").on("afterChange", function () {
  if ($(".slick-prev").hasClass("slick-disabled")) {
    $(".prev-btn").addClass("slick-disabled");
  } else {
    $(".prev-btn").removeClass("slick-disabled");
  }
  if ($(".slick-next").hasClass("slick-disabled")) {
    $(".next-btn").addClass("slick-disabled");
  } else {
    $(".next-btn").removeClass("slick-disabled");
  }
});

$(".criteria-card-wrapper").slick({
  slidesToShow: 2.9,
  slidesToScroll: 1,
  speed: 1000,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: false,
  infinite: true,
});

// for past achievements IMAGE slider
$(document).ready(function ($) {
  $(".achievement-card .pa-images-wrapper").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false, //temporarily disabled
    adaptiveHeight: true,
  });
});

// for past achievements CARD slider
$(document).ready(function ($) {
  $(".achievements-slider").slick({
    slidesToShow: 2.8,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    adaptiveHeight: true,
  });
});
