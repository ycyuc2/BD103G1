<?php 
ob_start();
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>檢視留言</title>
<link rel="stylesheet" type="text/css" href="../css/member.css">
<link rel="stylesheet" type="text/css" href="../css/pageSelector.css">
<?php require_once 'publicHeader.php'; ?>
<style type="text/css">
	.reply h2:before{
		content: '';
	}
</style>
</head>
<body>
	
<?php 
require_once 'connectBD103G1.php';
require_once 'header.php';
 ?>
	<div class="topBlank"></div>


	<div class="wrapper">
		<div class="borderFrame"></div>

		<div class="left">
			
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
			<div class="content reply">
			
				<h2 >檢視留言</h2>
				<div class="table">
					<div class="tr">
						<div class="th tdWidth">回復數</div>
						<div class="th tdWidth">留言</div>
						<div class="tdRight">
							<div class="th tdWidth">發文老師</div>
							<div class="th tdWidth">最新回復</div>
						</div>
					</div>

					<?php
					try{
						$sql = "select * from message msg where mem_no = :mem_no and msg_time in (select max(msg_time) from message where mem_no = :mem_no group by art_no)";
						$msgCount = $pdo->prepare($sql);
						$msgCount -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$msgCount -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$msgCount -> execute();
						$pages = ceil($msgCount->rowCount()/5);
						$sql = "select * from message msg JOIN article art using(art_no) where mem_no = :mem_no and msg_time in (select max(msg_time) from message where mem_no = :mem_no group by art_no) limit ".(($_REQUEST["page"]-1)*5)." ,5";
						$reply = $pdo->prepare($sql);
						$reply -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$msgCount -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$reply -> execute();

						while($msgArtRow = $reply->fetchObject()){
							?>
							
							<div class="tr"><a href="article.php?art_no=<?php echo $msgArtRow->art_no;?>">
								<div class="td tdWidth replyNo"><?php 
									$sql = "select count(*) c from message where art_no = :art_no";
									$msgCount = $pdo->prepare($sql);
									$msgCount -> bindValue(":art_no",$msgArtRow->art_no);
									$msgCount -> execute();
									$msgCountRow = $msgCount -> fetchObject();
									echo $msgCountRow->c;
								 ?></div>
								<div class="td tdWidth replyContent">
									<p>
										<?php echo $msgArtRow->art_title;?>
									</p>
									<p>
										<?php echo $msgArtRow->msg_content;?>
									</p>
								</div>
								<div class="tdRight">
									<div class="td tdWidth">
										<?php
											$sql = "select * from teacher where teacher_no = :teacher_no";
											$teacher = $pdo->prepare($sql);
											$teacher -> bindValue(":teacher_no",$msgArtRow->teacher_no);
											$teacher -> execute();
											if($teacherRow = $teacher->fetchObject()){
										?>
										<p><?php echo $teacherRow->teacher_nn;}?></p>
										<p><?php echo $msgArtRow->art_post_time;?></p>
									</div>
									<div class="td tdWidth">
										<p>回文人名稱</p>
										<p><?php echo $msgArtRow->art_update_time;?></p>
									</div>
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
						<?php if($_REQUEST["page"] > 1)echo "<a href='replyView.php?page=".($_REQUEST["page"]-1)."'><li>上一頁</li></a>"; 
						for ($i=0; $i < $pages; $i++) { 
							echo "<a href='replyView.php?page=".($i+1)."'><li>".($i+1)."</li></a>";
						}
						if($_REQUEST["page"] < $pages)echo "<a href='replyView.php?page=".($_REQUEST["page"]+1)."'><li>下一頁</li></a>"; ?>
					</ol>
				<?php } ?>
				
			
			</div>
		</div>
		<div class="blank"></div>
	</div>
</body>
</html>