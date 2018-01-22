window.addEventListener("load", function () {
	// 初始化
	backToLogin();
	
	var logInOut = document.querySelector(".memArea ul li:first-of-type *");
		if(logInOut.tagName == "P"){
			logInOut.addEventListener("click",function (){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.querySelector('.memArea ul li:first-of-type').innerHTML = this.responseText;
					}
				};
				xhttp.open("GET", "login.php");
				xhttp.send();
				location.reload();
			});
		}else{
			logInOut.addEventListener("click",function (){
				document.querySelector("#loginControl").checked = true;
			});
		}
		
			






	// 切換註冊
	var registerBtn = document.querySelector(".loginForm p .loginBtn+.loginBtn");
	registerBtn.addEventListener("click",function (e){
		e.preventDefault();
		document.querySelector(".loginLightbox .boxContent .registerForm").style.display = "block";
		document.querySelector(".loginLightbox .boxContent .backToLogin").style.display = "block";
		document.querySelector(".loginLightbox .boxContent .loginForm").style.display = "none";
	});
	// 返回登入
	function backToLogin() {
		document.querySelector(".loginLightbox .boxContent .registerForm").style.display = "none";
		document.querySelector(".loginLightbox .boxContent .backToLogin").style.display = "none";
		document.querySelector(".loginLightbox .boxContent .loginForm").style.display = "block";
	}
	document.querySelector(".loginLightbox .boxContent .backToLogin").addEventListener("click",backToLogin);
	document.querySelector("#loginControl").addEventListener("change",function(){
		setTimeout(backToLogin, 200);
	});
	document.querySelector('.loginBtn[type=submit]').addEventListener("click", function (e) {
		e.preventDefault();
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector('.memArea ul li:first-of-type').innerHTML = this.responseText;
			}
		};
		var inputValue = document.querySelectorAll('.loginForm p span input[type=text]');
		xhttp.open("GET", "login.php?mem_acc="+inputValue[0].value+"&mem_psw="+inputValue[1].value);
		xhttp.send();
    	location.reload();
	});


});