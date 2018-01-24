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
			<form>
				<textarea id="replyArea"></textarea>
				<input class="btnM btnText btnText2" type="submit" value="回　覆">
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
	 	<?php }?>
	



<!-- 檢舉燈箱 -->
	<div class="articleLightBox">
		<div class="content">
			<div class="cancelBtn">
				<i class="fa fa-times"></i>
			</div>
			<p>請輸入檢舉原因</p>
			<form>
				<textarea></textarea>
				<input class="reportSubmit" type="submit" value="送出">
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
			//宣告一堆變數
			var reportBtn, lightBox, cancelBtn, reportSubmit;
			//這是檢舉按鈕
			reportBtn = document.getElementsByClassName('report');
			console.log(reportBtn);
			//這是檢舉燈箱
			lightBox = document.getElementsByClassName('reportLightBox')[0];
			//這是燈箱關閉按鈕
			cancelBtn = document.getElementsByClassName('cancelBtn')[0];
			//這是燈箱送出按鈕
			reportSubmit = document.getElementsByClassName('reportSubmit')[0];
			//燈箱關閉按鈕按了關閉燈箱
			cancelBtn.addEventListener('click', function(){
					closeReport();
			}, false);

			//送出按鈕按了會顯示送出訊息，然後關閉燈箱
			reportSubmit.addEventListener('click', function(){
					alert('已送出檢舉');
					closeReport();
			}, false);

			//將所有檢舉按鈕建立click事件
			for (var i = 0; i < reportBtn.length; i++) {
				reportBtn[i].addEventListener('click', showReport, false);
			};
			//關閉燈箱的function
			function closeReport(){
				lightBox.style.visibility = 'hidden';
				lightBox.style.opacity = 0;

			}
			//打開燈箱的function
			function showReport(){
				lightBox.style.visibility = 'visible';
				lightBox.style.opacity = 1;
			}

			var reply = document.getElementById('replyArea');

			reply.onclick = function(){
				this.style.height = '300px';
			}
		
	</script>
</body>
</html>