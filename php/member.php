<?php 
ob_start();
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>會員專區</title>
<link rel="stylesheet" type="text/css" href="../css/member.css">
<?php require_once("publicHeader.php") ?>

</head>
<body>
	
<?php
	require_once("connectBD103G1.php");
	require_once("header.php"); 
	$_SESSION["where"] = 'member.php';
?>
	<?php if (empty($_SESSION["mem_no"])) {?>
		<script type="text/javascript">
			document.querySelector('#loginControl').checked = true;
		</script>
	<?php } ?>
	
	<div class="topBlank"></div>
		
	<div class="wrapper">
		<div class="borderFrame"></div>
		<?php if (isset($_SESSION["mem_no"])) {?>
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
			
			<div class="content info">
					
				<h2>個人資料</h2>
				<?php
					//=====連資料庫，做測試
					try{
						require_once("connectBD103G1.php");
						$sql = "select * from member where mem_no = :mem_no";
						$member = $pdo->prepare($sql);
						$member -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$member -> execute();

						if($memRow = $member->fetchObject()){
							?>
							<script type="text/javascript">
							</script>
							<p>
								<span>會員帳號</span><span class="name"><?php echo $memRow->mem_acc;?></span>
							</p>
							<p>
								<span>會員暱稱</span><span class="nickname"><?php echo $memRow->mem_nn;?></span>
							</p>
							<p>
								<span>會員電話</span><span class="tel"><?php echo $memRow->mem_tel;?></span>
							</p>
							<?php
						}

					}catch(PDOException $ex){
						echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
						echo "行號：",$ex->getLine(),"<br>";
					}
				?>
				
				
			
			</div>
			
			
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
						$sql = "select * from message msg JOIN article art using(art_no) where mem_no = :mem_no and msg_time in (select max(msg_time) from message group by art_no) order by art_update_time limit 3";
						$reply = $pdo->prepare($sql);
						$reply -> bindValue(":mem_no",$_SESSION["mem_no"]);
						$reply -> execute();
						while($msgArtRow = $reply->fetchObject()){
							?>
							
							<div class="tr"><a href="article.php?art_no=<?php echo $msgArtRow->art_no;?>">
								<div class="td tdWidth replyNo">12</div>
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

				
			
			</div>
			
			
			<div class="content trade">
			
				<h2 >交易紀錄</h2>
				<?php $sql = "select * from order_list where mem_no = :mem_no";
				$orderList = $pdo->prepare($sql);
				$orderList->bindValue(':mem_no', $_SESSION["mem_no"]);
				$orderList->execute();?>
				<div class="table">
					<div class="tr">
						<span >時間</span>
						<span class="large">編號</span>
						<span class="small"></span>
						<span class="small">金額</span>
						<span></span>
					</div>
					<?php while ($orderListRow = $orderList->fetchObject()) {?>
						<div class="tr">
							<span ><p><?php echo substr($orderListRow->order_time, 0, 10); ?></p><p><?php echo substr($orderListRow->order_time, 11, 8); ?></p></span>
							<span class="large name <?php echo $orderListRow->order_no; ?>"><?php echo $orderListRow->order_no; ?></span>
							<span class="small amount"></span>
							<span class="small total"><?php echo $orderListRow->total; ?></span>
							<span class="close"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
							<input type="checkbox" class="detailControl">
							<div class = detailList>
								<?php 
								$sql = "select * from order_detail join products using(pd_no) where order_no = :order_no";
								$orderDetail = $pdo->prepare($sql);
								$orderDetail->bindValue(':order_no', $orderListRow->order_no);
								$orderDetail->execute();
								while ($orderDetailRow = $orderDetail->fetchObject()) {?>
									<div class="detail">
										<span class="large"><?php echo $orderDetailRow->pd_name; ?></span>
										<span class="small"><?php echo $orderDetailRow->num ?></span>
										<span class="small"><?php echo $orderDetailRow->num*$orderDetailRow->pd_price ?></span>
									</div>
								<?php } ?>
								<div class="detail">
									<span class="large"></span>
									<span class="small">總計</span>
									<span class="small"><?php echo $orderListRow->total; ?></span>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<script type="text/javascript">
					var close = document.querySelectorAll('.trade .table .tr .close');
					for (var i = 0; i < close.length; i++) {
						close[i].addEventListener('click', function () {
							for (var i = 0; i < this.parentNode.childNodes.length; i++) {
								console.log(this.parentNode.childNodes[i].tagName);
							}
							if(this.nextSibling.nextSibling.checked){
								this.innerHTML = '<i class="fa fa-angle-down" aria-hidden="true"></i>';
								this.parentNode.childNodes[3].innerText = 
								this.parentNode.childNodes[3].className.split(' ')[2];
								this.parentNode.childNodes[5].innerText = '';
								this.parentNode.childNodes[11].checked = false;
							}else{
								this.innerHTML = '<i class="fa fa-angle-up" aria-hidden="true"></i>';
								this.parentNode.childNodes[3].innerText = '項目';
								this.parentNode.childNodes[5].innerText = '數量';
								this.parentNode.childNodes[11].checked = true;
							}
						});
					}
				</script>
			</div>
			
				
			
		</div>
		<?php }else{
			header('location:realIndex.php');
		} ?>
		<div class="blank"></div>
	</div>
</body>
</html>