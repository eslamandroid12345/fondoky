
$(document).ready(function(){
    var testH = $(window).height();
    var navH = $('.navbar').innerHeight();
    var Footer = $('.footer').innerHeight();
    var reservation = $('.reservation').innerHeight();

$('.reservation').css({marginTop: $('.navbar').height()})
 $('.offcanvas-body,.carousel-inner .one,.carousel-inner .two,.carousel-inner .three,.head-login,.head-login .row,.announce-head,.contact,.contact .row').height(testH-navH);
 $('.nav')
$('.announce-head,.header1,.search-head,.search2-head,.contact,.head-login,.section2222').css({marginTop: $('.navbar').innerHeight()});
$('.section-two,.header,.products1-head,.products1-read,.products2-read,.products3-read,.products4-read,.products2-head,.products3-head,.products4-head,.products5-head,.products6-head,.description').css({marginTop: $('.navbar').innerHeight()});



})


$(".dropdown").click(function(){

$(".dropdown .dropdown-menu").slideToggle(500);

})


$(document).ready(function(){

$('.contact1').click(function(){

$('body,html').animate({scrollTop: $("#contact").offset().top})



})



})

function Search(){

location.assign("search2.html");

}

function Real(){

location.assign("search.html");
}

function Login(){

location.assign("login.html")

}



//loading screen

	
	
$(window).on('load', function() 
			 
 { 
$("body").css("overflow","auto");	
	

$(".preloader .lds-ellipsis").fadeOut(2000, function()
									  
{$(".preloader").fadeOut(500, function()
									   
{$(".preloader").remove();
	
	
	
})
	
	
	
	
});			 
			 
			 
});


$(window).on('load', function() 
			 
 { 
$("body").css("overflow","auto");	
	

$(".loading2").fadeOut(2500);
									  
	 
			 
});



	
	
$(window).on('load', function() 
			 
 { 
$("body").css("overflow","auto");	

$(".preloader2").fadeOut(3000);
	 
			 
			 
});

