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
		date_default_timezone_set("Asia/Taipei");
	    if(isset($_SESSION["mem_no"])){
	    	$sql = "update message set last_view = :last_view where art_no = :art_no and mem_no = :mem_no";
			$update = $pdo->prepare($sql);
			$update->bindValue(':last_view', date('Y-m-d H:i:s') );
			$update->bindValue(':art_no', $_REQUEST["art_no"]);
			$update->bindValue(':mem_no', $_SESSION["mem_no"]);
			$update->execute();
			$sql = "update art_collection set last_view = :last_view where art_no = :art_no and mem_no = :mem_no";
			$update = $pdo->prepare($sql);
			$update->bindValue(':last_view', date('Y-m-d H:i:s'));
			$update->bindValue(':art_no', $_REQUEST["art_no"]);
			$update->bindValue(':mem_no', $_SESSION["mem_no"]);
			$update->execute();
	    }
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
		$sql = "SELECT * FROM article join teacher USING(teacher_no) join member USING(mem_no) where art_no = :art_no";
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
		<div class="columnBorder" style="position: relative;">
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
			<div class="authorIntro">
				<div class="authorPhoto">
					<?php echo '<img src="../img/member/',$artRow->mem_pic,'" alt="">' ?>
				</div>
<!-- 作者區 -->
				<div class="author">
					<div class="intro">
						<a href="specialColumn.php?teacher_no=<?php echo $artRow->teacher_no;?>"><p><?php echo $artRow->teacher_nn; ?></p></a>
						<p><?php echo $artRow->art_post_time; ?></p>
					</div>
					<div class="links">
						<div class="btns">
							<span class="btnM">
								<p class="btnText btnText2">收藏</p>
								<script type="text/javascript">
									var artCollectBtn = document.querySelector('.authorIntro .author .links p');
									artCollectBtn.addEventListener("click", artCollect);
									artCollect('show');
									document.querySelector('#loginControl').checked = false;

									function artCollect(action ) {
										<?php if (isset($_SESSION["mem_no"])) {?>
						 					var xhttp = new XMLHttpRequest();
						 					if(action != 'show'){
						 						action = 'collect'; 
						 					}
											xhttp.onreadystatechange = function() {
												var artCollectBtn = document.querySelector('.authorIntro .author .links p');
												if (this.readyState == 4 && this.status == 200) {
										    		artCollectBtn.innerText = this.responseText;
										    		if(artCollectBtn.innerText == '收藏'){
										    			console.log("2");
										    			artCollectBtn.className = 'btnText btnText2';
														artCollectBtn.style.filter='';
														artCollectBtn.style.color='#dcdcdc';
										    		}else{
										    			console.log("4");
										    			artCollectBtn.className = 'btnText btnText4';
														artCollectBtn.style.filter='drop-shadow(0px 0px 5px #c596ff)  drop-shadow(0px 0px 1px #c596ff)';
														artCollectBtn.style.color='#fff';
										    		}
												}
											}
											xhttp.open("GET", "articleCollect.php?art_no=<?php echo $_REQUEST["art_no"];?>&action="+action);
											xhttp.send();
						 				<?php }else{?>
											document.querySelector('#loginControl').checked = true;
						 				<?php }?>
									}
										
								</script>
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
							alert('成功評價此文章');
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
				<?php 
					if ($artRow->art_img_1 != null) {
						echo '<img src="../img/article/'.$artRow->art_img_1.'">';
					}
				?>
				<p><?php echo nl2br($artRow->art_content_1); ?></p>
				<?php 
					if ($artRow->art_img_2 != null) {
						echo '<img src="../img/article/'.$artRow->art_img_2.'">';
					}
				?>
				<p><?php echo nl2br($artRow->art_content_2); ?></p>
				<?php 
					if ($artRow->art_img_3 != null) {
						echo '<img src="../img/article/'.$artRow->art_img_3.'">';
					}
				?>
				<p><?php echo nl2br($artRow->art_content_3); ?></p>
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
<script>
	document.getElementById('replyArea').addEventListener('focus', function(){
		this.style.height = '200px';
	})
</script>
<script type="text/javascript">
	//document.querySelector('.memberReply .columnBorder .btnM input').disabled = true;
	document.querySelector('.memberReply .columnBorder .btnM input').addEventListener("click", function () {
		<?php  if( empty($_SESSION["mem_no"]) ){?>
			event.preventDefault();
			document.querySelector('#loginControl').checked = true;
		<?php } ?>
			if (this.parentNode.parentNode.childNodes[1].value == '') {
				event.preventDefault();
				document.querySelector('#articleLightBoxControl').checked = true;
			}
	});
		
</script>


	
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
							<?php echo '<img src="../img/member/',$msgRow["mem_pic"],'" alt="">' ?>
						</div>
						<div class="author">
							<div class="intro">
								<p><?php echo $msgRow["mem_nn"]; ?></p>
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
						<p><?php echo nl2br($msgRow["msg_content"]); ?></p>
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
							xhttp.open("GET", "msgReport.php?action=show&msg_no="+this.lastChild.value);
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