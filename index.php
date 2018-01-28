<?php 
ob_start();
session_start();
require_once 'php/connectBD103G1.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
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
		<span class="btnL"><a href="php/bk_index.php" class="btnText btnText2 back">後端</a></span>
	</div>


	
</body>
</html>