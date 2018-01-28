<?php 
ob_start();
session_start();
require_once 'php/connectBD103G1.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/loginLightbox.css">
	<link rel="stylesheet" type="text/css" href="css/guide.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/btn.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/lightening.css"> -->
	<title>導引頁</title>
</head>
<body>
	<!-- 背景 -->
	<div class="bg"></div>

	<!-- LOGO -->
	<div class="logo">
		<img src="img/guide/LOGO.png">
	</div>

	<!-- 標題 -->
	<div class="title">
		<img src="img/guide/index_title.png">
	</div>

	<!-- 打雷閃電 -->
	<div class="background">
		<img src="img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="img/lightening/flash4.png" alt="" class="flash lt4">	
	</div>

	<!-- 前後端按鈕 -->
	<div class="btn">
		<span class="btnL"><a href="php/realIndex.php" class="btnText btnText2">前端</a></span>
		<span class="btnL"><p class="btnText btnText2 back">後端</p></span>
	</div>
	<input type="checkbox" id="loginControl">
		<div class="loginLightbox">
			<div class="boxContent">
                <label for="loginControl">
				    <i class="fa fa-times fa-2x loginClose cursorHand"></i>
                </label>
                <form class="loginForm form" id="form">
                    <p>登入管理員</p>
                    <p>
                        <span>帳號：</span>
                        <span><input type="text" name="mem_acc" class="mId" maxlength="12" value="" required></span>
                    </p>
                    <p>
                        <span>密碼：</span>
                        <span><input type="password" name="mem_psw" class="mPsd" maxlength="12" value="" required></span>
                    </p>
                    <p>
                        <input type="button" value="登入" class="loginBtn cursorHand">
                    </p>
				</form>
			</div>
		</div>
	<script>
	window.addEventListener("load", function(){
		var back=document.querySelector('.back');
		back.onclick=function(){
			document.querySelector("#loginControl").checked = true;
		}
		var submitBtn=document.querySelector('.loginBtn');
		submitBtn.onclick=function(){
			var inputValue = document.querySelectorAll('.loginForm p span input');
			var input1=inputValue[0];
			var input2=inputValue[1];
			if(inputValue[0].value == 'master' && inputValue[1].value =='zxc987' ){
				document.querySelector('#form').reset();
				document.querySelector("#loginControl").checked = false;
				window.location.href="php/bk_index.php"; 
			}else{
				alert('您輸入的帳號或密碼不正確。');
			}
		}

	});

	</script>
	
</body>
</html>