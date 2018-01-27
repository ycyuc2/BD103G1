<?php
ob_start();
session_start();
?>
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

	<?php
		require_once("connectBD103G1.php");
		require_once("header.php");
		$_SESSION["where"] = "articleEdit.php";
	 ?>
	<?php 
		$teacherNo = $_REQUEST["teacher_no"];
		$artNo = $_REQUEST["art_no"];
		require_once("connectBD103G1.php");
		$sql = "select * from article where teacher_no = $teacherNo and art_no = $artNo";
		$article = $pdo->query($sql);
		$articleRow = $article->fetch();



	 ?>

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
			<form action="articleUpdate.php" method="post" enctype="multipart/form-data">
				<p class="intro">請輸入文章標題</p>
				<input class="inputTopic" type="text" name="title" value=
				<?php echo $articleRow["art_title"]?> 
				required>

				<p class="intro line">請選擇文章圖片1</p>
				<input class="inputImg first" type="file" name="contentImg1" required>

				<p class="intro">請輸入文章段落1</p>
				<textarea class="inputContent first" name="content1" required><?php echo $articleRow["art_content_1"]?></textarea>

				<p class="intro line">請選擇文章圖片2</p>
				<input class="inputImg second" type="file" name="contentImg2">

				<p class="intro">請輸入文章段落2</p>
				<textarea class="inputContent second" name="content2"><?php echo $articleRow["art_content_2"]?></textarea>

				<p class="intro line">請選擇文章圖片3</p>
				<input class="inputImg third" type="file" name="contentImg3">

				<p class="intro">請輸入文章段落3</p>
				<textarea class="inputContent third" name="content3"><?php echo $articleRow["art_content_3"]?></textarea>
				
				<input type="hidden" name="teacherNo" value=<?php echo '"'.$teacherNo.'"' ?>>
				<input type="hidden" name="artNo" value=<?php echo '"'.$artNo.'"' ?>>

				<input class="btnM btnText btnText2 submit" type="submit" name="" value="發表">
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
<script>
	window.addEventListener('load', function(){
		var imgInput = document.getElementsByClassName('inputImg');
		for (var i = 0; i < imgInput.length; i++) {
			imgInput[i].addEventListener('change', function(e){
				var fileName = this.value;
				var fileType = fileName.substring(fileName.lastIndexOf('.') + 1, fileName.length);
				if (!(fileType == 'jpg' || fileType == 'jpeg' || fileType == 'png' || fileType == 'gif')) {
					alert('檔案格式須為jpg、jpeg、png或gif');
					this.value = null;
				}


			});
		};



	});


</script>
</body>
</html>