$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 50) {
	    $(".header").css("background" , "#333");
	  }

	  else{
		  $(".header").css("background" , "none");  	
	  }
  })
})