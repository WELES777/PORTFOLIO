  $(document).ready(function() {
    document.documentElement.setAttribute("data-browser", navigator.userAgent);
    // Preview works (always on top of preloader(blocking))
    // and don't use tooltip class (substituted by jq)
    $(".tooltip-custom").tooltipster({
      animation: 'fade',
      delay: 200,
      theme: 'tooltipster-noir',
      trigger: "hover",
      title: "Nothing"
    });

    // Stick header
    $("header").sticky({ topSpacing: 0 });
    // Smooth scrolling
    smoothScroll.init({ offset: 45 });
    AOS.init({
      offset: 100,
      duration: 1000,
      easing: 'ease-in-out-back',
      delay: 200,
      once: true,
      placement: 'bottom-bottom',
    });

    // Scrolling to top
    $('#scrollup img').mouseover(function() {
      $(this).animate({ opacity: 0.65 }, 100);
    }).mouseout(function() {
      $(this).animate({ opacity: 1 }, 100);
    }).click(function() {
      $("html, body").animate({ scrollTop: 650 }, "slow");
      return false;
    });
    $(window).scroll(function() {
      if ($(document).scrollTop() > 675) {
        $('#scrollup').fadeIn();
      } else {
        $('#scrollup').fadeOut();
      }
    });

    // More works
    $(".more").click(function() {
      $(".in-progress").animate({
        opacity: "toggle"
      }, 1000, "swing");
    });


    // $("html").getNiceScroll().hide();







    //  Preloader

    var minWidth = 480 // minimum width of screen
    if ($(window).width() <= minSize) {
      // do nothing
    } else {
       $("#status").fadeIn();
    $("#preloader").fadeIn();
    $.get(url, datra, function() {
      $("#status").fadeOut();
      $("#preloader").fadeOut();
    });
    }



  });
