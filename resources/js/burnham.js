jQuery(document).ready(function($){

  // Hide Header on on scroll down
  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarHeight = $('.bar').outerHeight();

  $(window).scroll(function(event){
      didScroll = true;
  });

  setInterval(function() {
      if (didScroll) {
          hasScrolled();
          didScroll = false;
      }
  }, 250);

  function hasScrolled() {
      var st = $(this).scrollTop();

      // Make sure they scroll more than delta
      if(Math.abs(lastScrollTop - st) <= delta)
          return;

      if (st > lastScrollTop && st > navbarHeight){
          // Scroll Down
          $('.bar').removeClass('bar-down').addClass('bar-up');
          $('.wrapper').css('margin-top', '0px');
          $('body').css('margin-top', '0px');
      } else {
          // Scroll Up
          if(st + $(window).height() < $(document).height()) {
              $('.bar').removeClass('bar-up').addClass('bar-down');
              $('.wrapper').css('margin-top', '40px');
              $('body').css('margin-top', '40px');
              $('.page-id-879 .wrapper').css('margin-top', '0px');
              $('.page-id-17 .wrapper').css('margin-top', '0px');
          }
      }

      lastScrollTop = st;
  }

// change bar-down contents for mobile

if (window.innerWidth < 767) {
  $('.bar').empty();
  $('.bar').append("Call now <span>(303) 625-9193</span>");
  $('.barLink').attr("href", "tel:303-625-9193");
}

}); //jquery document close
