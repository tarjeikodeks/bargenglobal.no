$(document).foundation();

$(document).ready(function(){

	$(window).scroll(function(){
		if( $(window).scrollTop() > $('header#top').offset().top + 200 && !($('header').hasClass('stickyheader'))){
	        $('header#top').addClass('stickyheader');
	        $('header#top').addClass('minified');
	    } else if ($(window).scrollTop() == 0){
	        $('header#top').removeClass('stickyheader');
	        $('header#top').removeClass('minified');
	    }
	});
	
	$(window).scroll(function(){
    	var st = $(this).scrollTop();
		if( st >= 20){
			$('body').addClass('scrolled');
    	}else{
			$('body').removeClass('scrolled');
		}
	});
	
	
	$(window).scroll(function() {
		$(".scrollOut").css({
			'opacity' : 1-(($(this).scrollTop())/250)
		});         
	});
	
	$('.menuToggle').on('click', function(){
		$('.mainNav').toggleClass('open');
	});
	
	$('.searchToggle').on('click', function(){
		$('.searchBox').toggleClass('open');
	});
	

	$(window).scroll(function() {
	    if($(window).scrollTop() > 0) {
	
	        var parallaxDistance = ($(window).scrollTop()/2), 
	            parallaxCSS = "translate3d(0, "+ parallaxDistance +"px , 0)";
	
	        $('.frontSliderLarge .slide').css('transform', parallaxCSS);
	
	    } else {
	
	        $('.frontSliderLarge .slide').css('transform', 'translate3d(0, 0, 0)');
	    }
	});
	
	$(window).scroll(function () {
	    var topDivHeight = $(".topdiv").height();
	    var viewPortSize = $(window).height();
	
	    var triggerAt = 150;
	    var triggerHeight = (topDivHeight - viewPortSize) + triggerAt;
	
	    if ($(window).scrollTop() >= triggerHeight) {
	        $('.fadethisdiv').css('visibility', 'visible').hide().fadeIn();
	        $(this).off('scroll');
	    }
	});

});