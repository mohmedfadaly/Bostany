$(document).ready(function () {
  $(function () {
    var scrollDownDistance = 1;

    $('html, body').animate({ scrollTop: scrollDownDistance }, 0);

    $(document).scroll(function () {
      var $nav = $('.navbar');
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });

  $('.hamburger').click(function () {
    $('.hamburger').toggleClass('active');
    $('.navbar-nav').toggleClass('active-nav');
    $('body').toggleClass('overflowNone');
  });

  var swiper = new Swiper('.swiper-features', {
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      260: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      360: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      500: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      700: {
        slidesPerView: 4,
        spaceBetween: 18,
      },
      860: {
        slidesPerView: 5,
        spaceBetween: 18,
      },
      1000: {
        slidesPerView: 6,
        spaceBetween: 5,
      },
      1140: {
        slidesPerView: 7,
        spaceBetween: 5,
      },
      1400: {
        slidesPerView: 8,
        spaceBetween: 5,
      },
    },
  });

  var swiper = new Swiper('.swiper-articles', {
    spaceBetween: 10,
    // loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 18,
      },
      840: {
        slidesPerView: 3,
        spaceBetween: 18,
      },
      1100: {
        slidesPerView: 4,
        spaceBetween: 5,
      },
    },
  });

  var swiper = new Swiper('.swiper-more-articles', {
    spaceBetween: 10,
    // loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      520: {
        slidesPerView: 2,
        spaceBetween: 18,
      },
      840: {
        slidesPerView: 3,
        spaceBetween: 18,
      },
      1100: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });

  $('[data-fancybox]').fancybox({
    selector: '[data-fancybox="images"]',
    loop: true,
  });

  var link = document.querySelector('.fixed-icon a.icon');
  var button = document.querySelector('.fixed-icon button.btn');

  link.addEventListener('mouseover', function () {
    button.textContent = 'Whats App';
  });

  link.addEventListener('mouseout', function () {
    button.textContent = 'كيف أقدر أساعدك؟';
  });
});
