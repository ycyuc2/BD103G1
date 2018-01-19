<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php require_once("publicHeader.php") ?>
	<title>發表文章</title>
	<link rel="stylesheet" type="text/css" href="../css/specialColumn.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
</head>
<body>

	<?php require_once("header.php") ?>

	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash rt1">
		<img src="../img/lightening/flash4.png" alt="" class="flash rt2">
		
	</div>
	<div class="headerBlank"></div>


	<div class="teacher">
		<div class="border"></div>
		<div class="teacherBorder">
			<h1>發表文章</h1>
			<form action="articleInsert.php" method="post" enctype="multipart/form-data">
				<p class="intro">請輸入文章標題</p>
				<input class="inputTopic" type="text" name="title" required>

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