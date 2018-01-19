<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>發表文章</title>
	<script src="../js/countDown.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/specialColumn.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<link rel="stylesheet" type="text/css" href="../css/dozen_nav.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>
<body>

	<!-- 漢堡選單 -->
		<input type="checkbox" name="" id="menuControl">

		<label for="menuControl" class="hamburger">
				<div></div>
				<div></div>
				<div></div>
		</label for="menuControl">

	<div class="menu">
		<!-- logo -->
		<a  href="index.html"><img  class="logo" src="../img/share/LOGO-08.png" ></a>

		<!-- 右邊的title區塊 -->

			<div class="left">
				<p>距離下次水星逆行還有</p>
				<table class="countdownContainer">
						<tr class="info">
							<td class="days">120</td><td>天</td>
							<td class="hours">4</td><td>時</td>
							<td class="minutes">12</td><td>分</td>
							<td class="seconds">22</td><td>秒</td>
						</tr>
						
					</table>
			</div>
		<!-- 中間的line -->
			<div class="line"></div>
			<!-- 右邊的time區塊 -->
			<div class="right">
				<a class="title" href="findTeacher.html">
					<span class="findTeacher"></span>
				</a>
				<a class="title" href="dozen_store.html">
					<span class="store"></span>
				</a>
				<a class="title" href="member.html">
					<span class="member"></span>
				</a>
			</div>	
	</div>

	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash rt1">
		<img src="../img/lightening/flash4.png" alt="" class="flash rt2">
		
	</div>



<!-- header -->
	<div class="header">

		<!-- 中間logo -->
		<div class="logo">
			<a href="#">
				<img src="../img/share/LOGO-08.png">
			</a>
		</div>
		
		<!-- 右邊會員專區 -->
		<div class="memArea">
			<ul>
				<li><a href="#">註冊</a></li>
				<li><a href="#">登入</a></li>
				<li><a href="#">購物車(<span class="cartNo">0</span>)</a></li>
			</ul>
		</div>

		<!-- 右邊水逆倒數 -->
		<div class="countdown">
			<table class="countdownContainer">
					<tr class="info">
						<td>水星逆行倒數 :</td>
						<td class="days">120</td><td>天</td>
						<td class="hours">4</td><td>時</td>
						<td class="minutes">12</td><td>分</td>
					</tr>
					
				</table>
		</div>
	</div>


	<div class="headerBlank"></div>


	<div class="teacher">
		<div class="border"></div>
		<div class="teacherBorder">
			<h1>發表文章</h1>
			<form action="../php/articleInsert.php" method="get" >
				<p class="intro">請輸入文章標題</p>
				<input class="inputTopic" type="text" name="title" required="">

				<p class="intro line">請選擇文章圖片1</p>
				<input class="inputImg first" type="file" name="contentImg1">

				<p class="intro">請輸入文章段落1</p>
				<textarea class="inputContent first" name="content1"></textarea>

				<p class="intro line">請選擇文章圖片2</p>
				<input class="inputImg second" type="file" name="contentImg2">

				<p class="intro">請輸入文章段落2</p>
				<textarea class="inputContent second" name="content2"></textarea>

				<p class="intro line">請選擇文章圖片3</p>
				<input class="inputImg third" type="file" name="contentImg3">

				<p class="intro">請輸入文章段落3</p>
				<textarea class="inputContent third" name="content3"></textarea>
				
				<input type="hidden" name="teacherNo" value=<?php echo '"'.$_REQUEST["teacherNo"].'"' ?>>

				<input class="submit" type="submit" name="" value="發表">
			</form>
		</div>
	</div>


	<!-- ====================footer==================== -->
	<div class="footer">

	
		<div class="copyright">
			<p>
			點算©Copyright DOZEN, 2018.
			</p>
		</div>
		
	</div>

</body>
</html>