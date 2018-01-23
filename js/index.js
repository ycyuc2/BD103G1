
window.addEventListener("load", function(){
	
    $('html,body').animate({ scrollTop: -100 }, 0);
	var year = document.querySelectorAll('.year select');
	for (var i = 0; i < year.length; i++) {
		for (var j = 0; j < 49; j++) {
			var optY = document.createElement("option");
			optY.value = 1970+j;
			optY.innerText = 1970+j;
			year[i].appendChild(optY);
		}
	}
	var month = document.querySelectorAll('.month select');
	for (var i = 0; i < month.length; i++) {
		for (var j = 0; j < 12; j++) {
			var optM = document.createElement("option");
			optM.value = 1+j;
			optM.innerText = 1+j;
			month[i].appendChild(optM);
		}
		month[i].addEventListener("change", function () {
			var targetDate = this.parentNode.nextSibling.nextSibling.firstChild;
			switch(this.value){
				case '1':	case '3':	case '5':	case '7':	case '8':	case '10':	case '12':
					dayGenerater(31, targetDate);
					break;
				case '4':	case '6':	case '9':	case '11':
					dayGenerater(30, targetDate);
					break;
				default:
					var leapYear = parseInt(this.parentNode.previousSibling.previousSibling.firstChild.value);
					if(leapYear%100 == 0){
						dayGenerater(28, targetDate);
					}else if(leapYear%4 == 0){
						dayGenerater(29, targetDate);
					}else{
						dayGenerater(28, targetDate);
					}
					break;
			}
		});
	}
	function dayGenerater(dayCount, day) {
		if(day){
			day.options.length = 0;
			for (var j = 0; j < dayCount; j++) {
				var optD = document.createElement("option");
				optD.value = 1+j;
				optD.innerText = 1+j;
				day.appendChild(optD);
			}
		}else{
			var date = document.querySelectorAll('.date select');
			for (var i = 0; i < date.length; i++) {
				for (var j = 0; j < dayCount; j++) {
					var optD = document.createElement("option");
					optD.value = 1+j;
					optD.innerText = 1+j;
					date[i].appendChild(optD);
				}
			}
		}
	}
	dayGenerater(31, null);
	
		// choosebirthday
	


		// resultArea

	
	
	blurImgChange();
	window.addEventListener("resize", blurImgChange);


	function blurImgChange() {
		var blurImg = document.querySelectorAll('.blurImg');

		if( window.innerWidth > 480){
			for (var i = 0; i < blurImg.length; i++) {
				blurImg[i].setAttribute("src", "../img/index/blur_words_666H200.png");
			}
		}else{
			for (var j = 0; j < blurImg.length; j++) {
				blurImg[j].setAttribute("src", "../img/index/blur_words_235H390.png");
			}
		}
	}	//blurImgChange end

	
	
	
});
function generateResult(className) {
		console.log(className);
	var cancelSwitch = document.querySelectorAll('.chooseBtn .btnM');
	for (var i = 0; i < cancelSwitch.length; i++) {
		cancelSwitch[i].style.display = 'none';
	}
	var data_type = className.split(' ')[2].slice(0, -6);	//single or pair
	var allSelect = document.querySelectorAll('form.'+data_type+' p select');
	var singleBirthday = paddingLeft(allSelect[1].value, 2)+paddingLeft(allSelect[2].value, 2);
	var singleConstelation = constelation(singleBirthday);
	if(data_type == 'single'){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector('.resultArea').innerHTML = this.responseText;
	    		//location.reload();
	    		$('html,body').animate({ scrollTop: $('.star').offset().top-100 }, 1000);
			}
		};
		xhttp.open("GET", "fortuneResult.php?data_type=1&singleConstelation="+singleConstelation);
		xhttp.send();
	}else{
		var pairBirthday = paddingLeft(allSelect[4].value, 2)+paddingLeft(allSelect[5].value, 2);
		console.log(singleBirthday, pairBirthday);
		var pairConstelation = constelation(pairBirthday);
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector('.resultArea').innerHTML = this.responseText;
	    		//location.reload();
	    		$('html,body').animate({ scrollTop: $('.star').offset().top-100 }, 1000);
			}
		};
		xhttp.open("GET", "fortuneResult.php?data_type=0&singleConstelation="+singleConstelation+"&pairConstelation="+pairConstelation);
		xhttp.send();
	}	
}	//printResult end


function printResult(fort_no, obj_fort_no = 0) {
	console.log(fort_no, obj_fort_no);
	if (obj_fort_no != 0) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector('.resultArea').innerHTML = this.responseText;
	    		$('html,body').animate({ scrollTop: $('.star').offset().top-100 }, 1000);
			}
		};
		xhttp.open("GET", "fortuneResult.php?data_type=0&singleConstelation="+fort_no+"&pairConstelation="+obj_fort_no);
		xhttp.send();
	}else{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector('.resultArea').innerHTML = this.responseText;
	    		$('html,body').animate({ scrollTop: $('.star').offset().top-100 }, 1000);
			}
		};
		xhttp.open("GET", "fortuneResult.php?data_type=1&singleConstelation="+fort_no);
		xhttp.send();
	}
		
}	//printResult end
function paddingLeft(str, length) {
	if(str.length < length){
		return paddingLeft("0"+str, length);
	}
	return str;
}	//paddingLeft end

function constelation(birthday) {
	if(birthday>1220 || birthday < 121){
	    return 0;
	}else if(birthday< 221){
	    return 1;
	}else if(birthday< 321){
	    return 2;
	}else if(birthday< 421){
	    return 3;
	}else if(birthday< 521){
	    return 4;
	}else if(birthday< 621){
	    return 5;
	}else if(birthday< 721){
	    return 6;
	}else if(birthday< 821){
	    return 7;
	}else if(birthday< 921){
	    return 8;
	}else if(birthday< 1021){
	    return 9;
	}else if(birthday< 1121){
	    return 10;
	}else{
	    return 11;
	}
}

    

