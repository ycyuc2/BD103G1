var container = document.getElementById('moveContainer');

	var theScroll;

	function scroll() {
	    theScroll = new IScroll(container,{
	    	scrollX : true,
	    	scrollY : true,
	    	freeScroll : true,
	    	bindToWrapper : true,
	    	mouseWheelSpeed : 3,
	    	deceleration : 0.02,
	    	scrollbars : true,
	    	interactiveScrollbars : true
	    });
	    
	    var screenWidth = window.innerWidth;
		if (screenWidth > 480 ) {
				theScroll.scrollTo(-1600,-1000);
			}
	}

	document.addEventListener('DOMContentLoaded', scroll, false);
