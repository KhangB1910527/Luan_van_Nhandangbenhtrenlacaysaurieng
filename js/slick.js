$(document).ready(function(){
    $('.image-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow:
        `<button type='button' class='slick-prev pull-left'><ion-icon name="chevron-back-sharp"></ion-icon></button>`,
        nextArrow:
        `<button type='button' class='slick-next pull-right'><ion-icon name="chevron-forward-sharp"></ion-icon></button>`,
    });
  });

  $(document).ready(function(){
    $('.image-slider-tintuc').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow:
        `<button type='button' class='slick-prev pull-left'><ion-icon name="chevron-back-sharp"></ion-icon></button>`,
        nextArrow:
        `<button type='button' class='slick-next pull-right'><ion-icon name="chevron-forward-sharp"></ion-icon></button>`,
    });
  });