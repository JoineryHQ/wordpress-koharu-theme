jQuery(function($) {
  $('.site-nav-hamburger-wrapper').on('click', function() {
    $('nav.site-nav').slideDown('fast');
  });
  $('svg#site-nav-close').on('click', function() {
    $('nav.site-nav').slideUp('fast');
  });
});