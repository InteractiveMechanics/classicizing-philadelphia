$(document).ready(function(){

/*
	if (window.matchMedia("(max-width: 756px)")) {
		var viewportWidth = window.innerWidth;
		var newWidth = viewportWidth - 140;
		alert(newWidth);
		$('.search-input').css('width', newWidth + 'px !important');
	}
*/

	

  $('.jumbotron-slider').slick({
  	fade: true,
  	arrows: false,
    dots: false
  });


  $('.search-input-container').hide();

 
  $('.search-btn').click(function(event) {
  		if ($(this).hasClass('search-btn-move')) {
	  		return true;
  		} else {
	  		$('.search-input-container').show().addClass('search-input-show');
	  		$(this).addClass('search-btn-move');
	  		$('.navbar-text').hide();
	  		return false;
  		}
  	});

  $('.reset-btn').click(function(event) {
  		event.preventDefault();
  		$('.search-input-container').hide().removeClass('search-input-show');
  		$('.search-btn').removeClass('search-btn-move');
  		$('.navbar-text').show();
  	});
  
  $
  
    if (window.matchMedia("(max-width: 699px)").matches) {
      $('.no-collapse').removeClass('pull-right').addClass('.pull-left');
      // $('.filters-container').hide();
    }
    if (window.matchMedia("(max-width: 756px)").matches) {
      $('.filters-container').hide();
    }
  
  
  $(window).on('resize', function(){
      var win = $(this); //this = window
	    if (window.matchMedia("(max-width: 537px)").matches) {
	      $('.no-collapse').removeClass('pull-right').addClass('pull-left');
	      // $('.filters-container').hide();
	    }
	    if (window.matchMedia("(min-width: 538px)").matches) {
		  $('.no-collapse').addClass('pull-right').removeClass('pull-left');
	    }

	    if (window.matchMedia("(max-width: 756px)").matches) {
	      $('.filters-container').hide();
	    }	    
	        
  });


	$(window).on('resize', function() {
		if (window.matchMedia("(max-width: 768px)").matches) {
			console.log('your function is working');
		} 
	})

});


				