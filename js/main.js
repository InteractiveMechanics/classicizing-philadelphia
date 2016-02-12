$(document).ready(function(){

  $('.jumbotron-slider').slick({
  	fade: true,
  	arrows: false,
    dots: true
  });

  $('.search-input-container').hide();

  $(function() {
  	$('.search-btn').click(function(event) {
  		event.preventDefault();
  		$('.search-input-container').show().addClass('search-input-show');
  		$(this).addClass('search-btn-move');
  		$('.navbar-text').hide();
  	});
  });

  $(function() {
  	$('.reset-btn').click(function(event) {
  		event.preventDefault();
  		$('.search-input-container').hide().removeClass('search-input-show');
  		$('.search-btn').removeClass('search-btn-move');
  		$('.navbar-text').show();
  	});
  });

  $(function() {
    if (window.matchMedia("(max-width: 536px)").matches) {
      $('.no-collapse').removeClass('pull-right').addClass('.pull-left');
      $('.filters-container').hide();
    }
  });
  

});
				