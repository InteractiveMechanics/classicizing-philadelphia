$(document).ready(function(){


  $('.jumbotron-slider').slick({
  	fade: true,
  	arrows: false,
    dots: false
  });


  $('.search-input-container').hide();

 
  $('.search-btn').click(function(event) {
  		event.preventDefault();
  		$('.search-input-container').show().addClass('search-input-show');
  		$(this).addClass('search-btn-move');
  		$('.navbar-text').hide();
  	});

  $('.reset-btn').click(function(event) {
  		event.preventDefault();
  		$('.search-input-container').hide().removeClass('search-input-show');
  		$('.search-btn').removeClass('search-btn-move');
  		$('.navbar-text').show();
  	});
  
  
  $(window).on('resize', function(){
      var win = $(this); //this = window
	    if (window.matchMedia("(max-width: 536px)").matches) {
	      $('.no-collapse').removeClass('pull-right').addClass('.pull-left');
	      // $('.filters-container').hide();
	    }
	    if (window.matchMedia("(min-width: 700px)").matches) {
		  $('.no-collapse').addClass('pull-right').removeClass('pull-left');
	    }

	    if (window.matchMedia("(max-width: 756px)").matches) {
	      $('.filters-container').hide();
	    }    
  });

   

});
				