<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>專欄文章</title>
	<script src="../js/countDown.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/article1.css">
	<link rel="stylesheet" type="text/css" href="../css/starRatingForArticle.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<?php require_once("publicHeader.php") ?>
</head>
<body>
	
	<?php 
		require_once("connectBD103G1.php");
		require_once("header.php");
		$_SESSION["where"] = 'article.php?art_no='.$_REQUEST["art_no"];
	?>

	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="../img/lightening/flash4.png" alt="" class="flash lt4">
		
	</div>
	<div class="headerBlank"></div>
	<?php 
		$sql = "select * from article join teacher using(teacher_no) where art_no = :art_no";
		$art = $pdo->prepare($sql);
		$art->bindValue(":art_no", $_REQUEST["art_no"]);
		$art->execute();
		$artRow = $art->fetchObject();
	 ?>
<!-- 標題 -->
	<h2><?php echo $artRow->art_title; ?></h2>

	<div class="specialColumn">
<!-- 外框專用 -->
		<div class="border"></div>
		<div class="columnBorder">
			<div class="authorIntro">
				<div class="authorPhoto">
					<img src="../img/findTeacher/horseman.jpg">
				</div>
<!-- 作者區 -->
				<div class="author">
					<div class="intro">
						<a href=""><?php echo $artRow->teacher_nn; ?></a>
						<p><?php echo $artRow->art_post_time; ?></p>
					</div>
					<div class="links">
						<div class="btns">
							<span class="btnM">
								<a href="" class="btnText btnText2">收藏</a>
							</span>
						</div>
						<div class="stars">
	<!-- 評價星等 -->
	<fieldset class="rating">
	    <input type="radio" id="star5" name="rating" value="5" class="starIcon">
	    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
	    <input type="radio" id="star4" name="rating" value="4" class="starIcon">
	    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
	    <input type="radio" id="star3" name="rating" value="3" class="starIcon">
	    <label class = "full" for="star3" title="Meh - 3 stars"></label>
	    <input type="radio" id="star2" name="rating" value="2" class="starIcon">
	    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
	    <input type="radio" id="star1" name="rating" value="1" class="starIcon">
	    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
	</fieldset>
	<script type="text/javascript">
		var starIcon = document.querySelectorAll('.starIcon');
		for (var i = 0; i < starIcon.length; i++) {
			starIcon[i].addEventListener('click',function () {
				<?php if (isset($_SESSION["mem_no"])) {?>
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							// 燈箱
						}
					};
					xhttp.open("GET", "star.php?type=article&action=review&target_no="+<?php echo $_REQUEST["art_no"]; ?>+"&value="+this.value);
					xhttp.send();
				<?php }else{?>
					document.querySelector('#loginControl').checked = true;
				<?php } ?>
					
			});	//starIcon addEvent end
		}
	</script>
						</div>
					</div>
				</div>
			</div>
<!-- 文章區 -->
			<article>
				<p><?php echo $artRow->art_content_1; ?></p>
				<p><?php echo $artRow->art_content_2; ?></p>
				<p><?php echo $artRow->art_content_3; ?></p>
			</article>
		</div>
	</div>

<!-- 會員回復 -->
	<div class="memberReply">
		<div class="border"></div>
		<div class="columnBorder">
			<h3>撰寫留言</h3>
			<form action="msgReply.php" method="post">
				<input type="hidden" name="art_no" value="<?php echo $_REQUEST["art_no"];?>">
				<textarea id="replyArea" name="msg_content"></textarea>
				<span class="btnM"><input class="btnText btnText2" type="submit" value="回覆"></span>
			</form>
		</div>
	</div>



	
	<!-- 留言區 -->

	<?php 
		$sql = "select * from message join member using(mem_no) where art_no = :art_no";
		$msg = $pdo->prepare($sql);
		$msg->bindValue(":art_no", $_REQUEST["art_no"]);
		$msg->execute();
		$msgRows = $msg->fetchAll();
	 	foreach ($msgRows as $i => $msgRow) {?>
	 		<div class="replys">
				<div class="border"></div>
				<div class="columnBorder">
					<div class="authorIntro">
						<div class="authorPhoto">
							<img src="../img/specialColumn/heisenberg.jpg">
						</div>
						<div class="author">
							<div class="intro">
								<a href=""><?php echo $msgRow["mem_nn"]; ?></a>
								<p><?php echo $msgRow["msg_time"]; ?></p>
							</div>
							<div class="links">
								<div class="btns">
									<span class="btnM report"><p class="btnText btnText2">檢舉<input type="hidden" value="<?php echo $msgRow["msg_no"];?>"></p></span>
								</div>
							</div>
						</div>
					</div>
					
					<article>
						<p><?php echo $msgRow["msg_content"]; ?></p>
					</article>
				</div>
			</div>
	 	<?php } //foreach end
	 	if ($msg->rowCount() != 0) {?>
	 		
	 			<script type="text/javascript">
	 			var report = document.querySelectorAll('.report p');
	 			for (var i = 0;i<report.length; i++) {
	 				report[i].addEventListener('click', function () {
		 				<?php if (isset($_SESSION["mem_no"])) {?>
		 					var xhttp = new XMLHttpRequest();
							xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
						    		document.querySelector('.articleLightBox').innerHTML = this.responseText;
						    		document.querySelector('#articleLightBoxControl').checked = true;
								}
							}
							xhttp.open("GET", "articleReport.php?action=show&msg_no="+this.lastChild.value);
							xhttp.send();
		 				<?php }else{?>
							document.querySelector('#loginControl').checked = true;
		 				<?php }?>
		 			});
	 			}	//for end
	 		</script>
	 		
	 	<?php }?>
	



<!-- 檢舉燈箱 -->
	<input type="checkbox" name="" id="articleLightBoxControl">
	<div class="articleLightBox">
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