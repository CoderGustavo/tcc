!(function($) {
  "use strict";

  // Preloader
  $(window).on('load', function() {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function() {
        $(this).remove();
      });
    }
  });

  // Smooth scroll for the navigation menu and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 1;
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Activate smooth scroll on page load with hash links in the url
  $(document).ready(function() {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
      }
    }
  });

  // Mobile Navigation
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('.mobile-nav').prepend('<button type="button" class="mobile-nav-close"><i class="icofont-close"></i></button>');
    $('#header').append('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav-close', function(e) {
      $('body').removeClass('mobile-nav-active');
      $('.mobile-nav-overly').fadeOut();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

  // Toggle .header-scrolled class to #header when page is scrolled
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
      $('#topbar').addClass('topbar-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
      $('#topbar').removeClass('topbar-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
    $('#topbar').addClass('topbar-scrolled');
  }

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.nav-menu, .mobile-nav');

  $(window).on('scroll', function() {
    var cur_pos = $(this).scrollTop() + 200;

    nav_sections.each(function() {
      var top = $(this).offset().top,
        bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        if (cur_pos <= bottom) {
          main_nav.find('li').removeClass('active');
        }
        main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
      }
      if (cur_pos < 300) {
        $(".nav-menu ul:first li:first").addClass('active');
      }
    });
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Menu list isotope and filter
  $(window).on('load', function() {
    var menuIsotope = $('.menu-container').isotope({
      itemSelector: '.menu-item',
      layoutMode: 'fitRows'
    });

    $('#menu-flters li').on('click', function() {
      $("#menu-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');

      menuIsotope.isotope({
        filter: $(this).data('filter')
      });
      aos_init();
    });
  });

  // Events carousel (uses the Owl Carousel library)
  $(".events-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    autoplayTimeout: 6000,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      900: {
        items: 3
      }
    }
  });

  // Initiate venobox lightbox
  $(document).ready(function() {
    $('.venobox').venobox();
  });

  // Init AOS
  function aos_init() {
    AOS.init({
      duration: 1000,
      once: true
    });
  }
  $(window).on('load', function() {
    aos_init();
  });

  $(".btn-formapagamento.div-pix").find(".position-absolute").removeClass("d-none");

  $(".btn-formapagamento").on('click',function(){
    $(".btn-formapagamento").find(".position-absolute").addClass("d-none");
    $(this).find(".position-absolute").removeClass("d-none");
  });
})(jQuery);

$(document).ready(function(){

  $("#data").mask("99/99/9999");
  $("#hora").mask("99:99");
  
  $('.stars').on('click', function(){
    var id = $(this).attr('id');
    var numberStar = id.substr(5);
    for (let a = 1; a <= numberStar; a++) {
        if($('#starm-'+a).hasClass('far')){
            $('#starm-'+a).addClass('fas');
        }else{
            $('#starm-'+a).addClass('far');
        }
    }  
  });
  $('.stars').on('mouseover', function(){
      var id = $(this).attr('id');
      var numberStar = id.substr(5);
      for (let i = 1; i <= numberStar; i++) {
          if($('#star-'+i).hasClass('far')){
              $('#star-'+i).addClass('fas');
          }else{
              $('#star-'+id).addClass('far');
          }
      }  
  });
  $('.stars').on('mouseout', function(){
      var id = $(this).attr('id');
      var numberStar = id.substr(5);
      var manter = $('#estrela').val();
      for (let i = 1; i <= numberStar; i++) {
          if($('#star-'+i).hasClass('far')){
              $('#star-'+i).removeClass('fas');
          }else{
              $('#star-'+id).removeClass('far');
          }
      }
      if(manter < 5){
          $('.stars').removeClass('fas');
          $('.stars').addClass('far');
      }
      for (let i = 1; i <= manter; i++) {
          if($('#star-'+i).hasClass('far')){
              $('#star-'+i).removeClass('far');
              $('#star-'+i).addClass('fas');
          }
      }  
  });
  $('.stars').on('click', function(){
    var id = $(this).attr('id');
    var numberStar = id.substr(5);
    $('#estrela').val(numberStar);
    for (let a = 1; a <= numberStar; a++) {
        if($('#starm-'+a).hasClass('far')){
            $('#starm-'+a).removeClass('far');
            $('#starm-'+a).addClass('fas');
        }
    }
  });

  $('.menu-conta').hide();
  $('.btn-minhaconta').on('click', function(e){
    e.preventDefault();
    $('.btn-minhaconta').toggleClass('active');
    $('.menu-conta').toggle(100);
    if($('.btn-minhaconta i').hasClass('fa-chevron-down')){
      $('.btn-minhaconta i').removeClass('fa-chevron-down')
      $('.btn-minhaconta i').addClass('fa-chevron-up')
    }else{
      $('.btn-minhaconta i').removeClass('fa-chevron-up')
      $('.btn-minhaconta i').addClass('fa-chevron-down')
    }
  });
});