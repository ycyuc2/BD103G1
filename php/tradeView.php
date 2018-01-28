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
<link rel="stylesheet" type="text/css" href="../css/pageSelector.css">
<?php require_once 'publicHeader.php'; ?>
<style type="text/css">
	.trade h2:before{
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
			<div class="content trade">
			
				<h2 >交易紀錄</h2>
				<?php 
				$sql = "select * from order_list where mem_no = :mem_no";
				$listCount = $pdo->prepare($sql);
				$listCount->bindValue(':mem_no', $_SESSION["mem_no"]);
				$listCount->execute();
				$pages = ceil($listCount->rowCount()/5);
				$sql = "select * from order_list where mem_no = :mem_no limit ".(($_REQUEST["page"]-1)*5)." ,5";
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

				<?php if ($pages > 1) {?>
					<ol class="pageSelector">
						<?php if($_REQUEST["page"] > 1)echo "<a href='tradView.php?page=".($_REQUEST["page"]-1)."'><li>上一頁</li></a>"; 
						for ($i=0; $i < $pages; $i++) { 
							echo "<a href='tradView.php?page=".($i+1)."'><li>".($i+1)."</li></a>";
						}
						if($_REQUEST["page"] < $pages)echo "<a href='tradView.php?page=".($_REQUEST["page"]+1)."'><li>下一頁</li></a>"; ?>
					</ol>
				<?php } ?>

			</div>
		</div>
		<div class="blank"></div>
	</div>
</body>
</html>