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
		$_SESSION["where"] = "articlePost.php";
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
		<div class="teacherBorder" style="position: relative;">
			<div style="top:10px;left:10px;" id="backToPreviousPage">
		        <i class="fa fa-arrow-left"></i>
		      </div>
		      <script>
		        window.addEventListener('load',function(){
		            var backBtn = document.querySelector('#backToPreviousPage');
		            backBtn.addEventListener('click', function(){
		              window.history.back();
		            }, false)


		        })
		      </script>
			<h1>發表文章</h1>
			<form action="articleInsert.php" method="post" enctype="multipart/form-data">
				<p class="intro">請輸入文章標題</p>
				<input class="inputTopic" type="text" name="title" required>

				<p class="intro line">請選擇文章圖片1</p>
				<label class="fileLabel" for="inputImg1">請選擇檔案</label>
				<input id="inputImg1" class="inputImg first" type="file" name="contentImg1" required>

				<p class="intro">請輸入文章段落1</p>
				<textarea class="inputContent first" name="content1" required></textarea>

				<p class="intro line">請選擇文章圖片2</p>
				<label class="fileLabel" for="inputImg2">請選擇檔案</label>
				<input id="inputImg2" class="inputImg second" type="file" name="contentImg2">

				<p class="intro">請輸入文章段落2</p>
				<textarea class="inputContent second" name="content2"></textarea>

				<p class="intro line">請選擇文章圖片3</p>
				<label class="fileLabel" for="inputImg3">請選擇檔案</label>
				<input id="inputImg3" class="inputImg third" type="file" name="contentImg3">

				<p class="intro">請輸入文章段落3</p>
				<textarea class="inputContent third" name="content3"></textarea>
				
				<input type="hidden" name="teacherNo" value=<?php echo '"'.$_REQUEST["teacherNo"].'"' ?>>

				<span class="btnM"><input class="btnText btnText2" type="submit" name="" value="發表"></span>
			</form>
		</div>
	</div>

<script>
	window.addEventListener('load', function(){
		var imgInput = document.getElementsByClassName('inputImg');
		var labels = document.querySelectorAll('form label');

		for (var i = 0; i < imgInput.length; i++) {
			
			imgInput[i].addEventListener('change', function(){
				var fileName = this.value;
				var fileType = fileName.substring(fileName.lastIndexOf('.') + 1, fileName.length);
				this.previousSibling.previousSibling.textContent = '已選擇檔案';
				if (!(fileType == 'jpg' || fileType == 'jpeg' || fileType == 'png' || fileType == 'gif')) {
					alert('檔案格式須為jpg、jpeg、png或gif');
					this.value = null;
					this.previousSibling.previousSibling.textContent = '請選擇檔案';
				}


			});
		};
		


	});


</script>

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