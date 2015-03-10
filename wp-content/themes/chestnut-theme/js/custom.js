jQuery(document).ready(function($){
    var headerHeight = $('#masthead').outerHeight();
    $('#go-top, .next-page').localScroll({
        offset: {
        top: -headerHeight
     }
    });

    $(window).scroll(function(){
        if($(window).scrollTop() > 200){
            $('#go-top').fadeIn();
        }else{
            $('#go-top').fadeOut();
        }
    });

	$('.parallax-on.home .nav').onePageNav({
		currentClass: 'current',
    	changeHash: false,
    	scrollSpeed: 1500,
    	scrollOffset: headerHeight,
    	scrollThreshold: 0.5,
	});

	$(window).resize(function(){
    var headerHeight = $('#masthead').outerHeight();
    $('.parallax-on #content').css('padding-top', headerHeight);

    $('.slider-caption').each(function(){
    var cap_height = $(this).actual( 'outerHeight' );
    $(this).css('margin-top',-(cap_height/2));
    });

    }).resize();

    $('#main-slider .overlay').prependTo('#main-slider .slides');


    $('.menu-toggle').click(function(){
        $(this).next('ul').slideToggle();
    });

    $("#content").fitVids();

    $(window).on('load',function(){
        $('.blank_template').each(function(){
        $(this).parallax('50%',0.4, true);
        });
        
        $('.action_template').each(function(){
        $(this).parallax('50%',0.3, true);
        });
    });
    
});