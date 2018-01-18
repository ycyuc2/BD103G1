window.onload = function () {
	// 初始化
	backToLogin();
	// 開燈箱
	var openLightbox = document.querySelector(".memArea ul li:first-of-type a");
	openLightbox.addEventListener("click",function (){
		 document.querySelector("#loginControl").checked = true;
	});
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
}