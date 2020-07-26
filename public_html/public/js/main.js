$(function() {

  if (window.location.search.indexOf('book=true') >= 0) {

    $('input[name=email]').focus();
  }

  $('#slider').slick({
    autoplay: true,
    dots: true,
    centerMode: true
  });
});