window.onload = initial;
function initial(){
	var iframeBtn = window.document.getElementsByClassName('iframeBtn');
	for (var i = 0; i < iframeBtn.length; i++) {
		iframeBtn[i].addEventListener("click", function(){
			window.document.getElementById('lightBoxControl').checked = true;
		});
	}
	
}