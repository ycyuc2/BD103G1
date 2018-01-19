window.addEventListener("load", function () {
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
	}
	var date = document.querySelectorAll('.date select');
	for (var i = 0; i < date.length; i++) {
		for (var j = 0; j < 31; j++) {
			var optD = document.createElement("option");
			optD.value = 1+j;
			optD.innerText = 1+j;
			date[i].appendChild(optD);
		}
	}
	document.querySelector('.chooseBirthday').style.display = "none";
	document.querySelector('span.single').addEventListener("click", function () {
		document.querySelector('.chooseBirthday').style.display = "block";
		document.querySelector('form.pair').style.display = "none";
		document.querySelector('form.single').style.display = "block";
        $('html,body').animate({ scrollTop: $('.chooseBirthday').offset().top-250 }, 1000);
	});
	document.querySelector('span.pair').addEventListener("click", function () {
		document.querySelector('.chooseBirthday').style.display = "block";
		document.querySelector('form.single').style.display = "none";
		document.querySelector('form.pair').style.display = "block";
        $('html,body').animate({ scrollTop: $('.chooseBirthday').offset().top-250 }, 1000);
	});


	// resultArea


	document.querySelector('.resultArea').style.display = "none";
	document.querySelector('.singleSubmit').addEventListener("click", function () {
		document.querySelector('.resultArea').style.display = "block";
		document.querySelector('.matchResult').style.display = "none";
		document.querySelector('.singleResult').style.display = "block";
		document.querySelector('.pairResult').style.display = "none";
        $('html,body').animate({ scrollTop: $('.star').offset().top-100 }, 1000);
	});
	document.querySelector('.pairSubmit').addEventListener("click", function () {
		document.querySelector('.resultArea').style.display = "block";
		document.querySelector('.matchResult').style.display = "block";
		document.querySelector('.singleResult').style.display = "block";
		document.querySelector('.pairResult').style.display = "block";
        $('html,body').animate({ scrollTop: $('.star').offset().top-100 }, 1000);
	});
	window.addEventListener("resize", blurImgChange());
	window.addEventListener("load", blurImgChange());
	function blurImgChange() {
		var windowWidth = window.innerWidth;
		var blurImg = document.querySelectorAll('.blurImg');

		if( windowWidth > 480){
			for (var i = 0; i < blurImg.length; i++) {
				blurImg[i].setAttribute("src", "../img/index/blur_words_666H200.png");
			}
		}else{
			for (var j = 0; j < blurImg.length; j++) {
				blurImg[j].setAttribute("src", "../img/index/blur_words_235H390.png");
			}
		}
	}
});

    

