jQuery(function($) {
  $('.site-nav-hamburger').on('click', function() {
    $('nav.site-nav').slideDown('fast');
  });
  $('svg#site-nav-close').on('click', function() {
    $('nav.site-nav').slideUp('fast');
  });
});