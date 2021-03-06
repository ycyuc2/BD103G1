<?php 
ob_start();
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>檢視留言</title>
<link rel="stylesheet" type="text/css" href="../css/member.css">
<link rel="stylesheet" type="text/css" href="../css/pageSelector.css">
<?php require_once 'publicHeader.php'; ?>

</head>
<body>
<?php 
	require_once 'connectBD103G1.php';
	require_once 'header.php';
 ?>
	<div class="topBlank"></div>


	<div class="wrapper" style="position: relative;">
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
		<div class="borderFrame"></div>

		<div class="left"><!-- 一般會員 -->
			<ol class="nav">		<!-- 一般會員 -->
				<li><span class="btnM"><a href="infoAlter.php" class="btnText btnText4">修改資料</a></span></li>
				<li><span class="btnM"><a href="replyView.php?page=1" class="btnText btnText4">檢視留言</a></span></li>
				<li><span class="btnM"><a href="tradeView.php?page=1" class="btnText btnText4">檢視交易</a></span></li>
				<li><span class="btnM"><a href="essayCollect.php?page=1" class="btnText btnText4">收藏文章</a></span></li>
			<?php if(empty($_SESSION["teacher_no"])){?>
				<li><span class="btnM"><a href="teacherApllication.php" class="btnText btnText4">成為老師</a></span></li>
			<?php } ?>
			</ol>
		</div>


		<div class="right">
			<div class="content essay">
			
				<h2 >文章收藏</h2>
				<div class="table">
					<div class="tr">
						<div class="tr">
						<div class="th tdWidth">回復數</div>
						<div class="th tdWidth">標題</div>
						<div class="th tdWidth">發文老師</div>
					</div>
					</div>

					<?php
					try{
						$sql = "select * from art_collection where mem_no = :mem_no";
						$artColCount = $pdo->prepare($sql);
						$artColCount -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$artColCount -> execute();
						$pages = ceil($artColCount->rowCount()/5);
						$sql = "select * from art_collection JOIN article using(art_no) where mem_no = :mem_no limit ".(($_REQUEST["page"]-1)*5)." ,5";
						$artCol = $pdo->prepare($sql);
						$artCol -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$artCol -> execute();

						while($colArtRow = $artCol->fetchObject()){
							?>
							
							<div class="tr artCollectNo<?php echo $colArtRow->art_no;?>"><a href="article.php?art_no=<?php echo $colArtRow->art_no;?>">
								<div class="td tdWidth essayNo"><?php 
									$sql = "select count(*) c from message where art_no = :art_no";
									$msgCount = $pdo->prepare($sql);
									$msgCount -> bindValue(":art_no",$colArtRow->art_no);
									$msgCount -> execute();
									$msgCountRow = $msgCount -> fetchObject();
									echo $msgCountRow->c;
								 ?></div>
								<div class="td tdWidth essayContent">
									<p>
										<?php echo $colArtRow->art_title;?>
									</p>
								</div>
								<div class="td tdWidth">
									<?php
										$sql = "select * from teacher where teacher_no = :teacher_no";
										$teacher = $pdo->prepare($sql);
										$teacher -> bindValue(":teacher_no",$colArtRow->teacher_no);
										$teacher -> execute();
										if($teacherRow = $teacher->fetchObject()){
									?>
									<p><?php echo $teacherRow->teacher_nn;}?></p>
									<p><?php echo $colArtRow->art_post_time;?></p>
								</div>
							</a></div>
							<?php 
						}
					}catch(PDOException $ex){
						echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
						echo "行號：",$ex->getLine(),"<br>";
					}	
					?>
				</div>
				<?php if ($pages > 1) {?>
					<ol class="pageSelector">
						<?php if($_REQUEST["page"] > 1)echo "<a href='essayCollect.php?page=".($_REQUEST["page"]-1)."'><li>上一頁</li></a>"; 
						for ($i=0; $i < $pages; $i++) { 
							echo "<a href='essayCollect.php?page=".($i+1)."'><li>".($i+1)."</li></a>";
						}
						if($_REQUEST["page"] < $pages)echo "<a href='essayCollect.php?page=".($_REQUEST["page"]+1)."'><li>下一頁</li></a>"; ?>
					</ol>
				<?php } ?>
				
			
			</div>
		</div>
		<div class="blank"></div>
	</div>

	<?php 
		$sql = "select * from art_collection collect join article art on collect.art_no = art.art_no  where collect.mem_no = :mem_no and collect.last_view < art.art_update_time";
		$artCollect = $pdo->prepare($sql);
		$artCollect -> bindValue(":mem_no",$_SESSION["mem_no"]);
		$artCollect -> execute();
		while($artCollectRow = $artCollect->fetchObject()){?>
			<script type="text/javascript">
				window.addEventListener('load', function () {
					var target = document.querySelector('.artCollectNo<?php echo $artCollectRow->art_no;?>');
					target.className += ' newMsg';
				})
					
			</script>
	<?php }?>
</body>
</html>