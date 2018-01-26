<?php 
	session_start();
	ob_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言檢舉管理</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_replyReview.css">
	<link rel="stylesheet" type="text/css" href="../css/btn.css">
	<script type="text/javascript" src="../js/reviewIframe.js"></script>
</head>
<body>
	
	<!-- header -->

	<!-- header end -->
	<div class="wrapper">
		<div class="left">
			<ol class="sideNav">
				<li class="fstNav maintain">網頁維護
					<ol class="innerNav maintain">
						<li><a href="bk_fortuneDB.php">前端首頁維護</a></li>
						<li><a href="bk_forum.php">老師專區維護</a></li>
						<li><a href="bk_product.php">商城維護</a></li>
					</ol>
				</li>
				<li class="fstNav trade">交易管理
					<ol class="innerNav trade">
						<li><a href="bk_trade.php">檢視交易紀錄</a></li>
						<li><a href="bk_pdList.php">訂單管理</a></li>
					</ol>
				</li>
				<li class="fstNav member">會員管理
					<ol class="innerNav member">
						<li><a href="bk_member.php">檢視會員資料</a></li>
						<li><a href="bk_teacherApplication.php">老師資格審核</a></li>
					</ol>
				</li>
			</ol>
		</div>

		<!-- end left -->

		<div class="right">
			<ol class="breadcrumb">
				<li>
					<a href="bk_index.php">首頁</a>
				</li>
				<li class="active">老師專區維護</li>
			</ol>

			<ol class="rightNav rightNav3">
				<li><a href="bk_forum.php">專欄管理</a></li>
				<li><a class="nowAt" href="bk_replyReview.php">留言檢舉管理</a></li>
			</ol>
			<div class="tr">
				<span class="col msgNo">留言編號</span>
				<span class="col memNO">會員暱稱</span>
				<span class="col reason">檢舉原因</span>
				<span class="col link">連結</span>
				<span class="col alter">刪除</span>
			</div>


<?php 
	require_once("connectBD103G1.php");
	$sql = "SELECT a.mem_no, a.msg_no, a.msg_rep_reason, b.art_no, c.mem_nn FROM msg_report a join message b on a.msg_no = b.msg_no left join member c on b.mem_no = c.mem_no";
	$msgRep = $pdo->prepare($sql);
	$msgRep->execute();
	$msgRep_rows = $msgRep->fetchAll(PDO::FETCH_ASSOC);
	foreach ($msgRep_rows as $i => $msgRepRow) {
?>


			<div class="tr">
				<span class="col msgNo"><?php echo $msgRepRow["msg_no"] ?></span>
				<span class="col memNO"><?php echo $msgRepRow["mem_nn"] ?></span>
				<span class="col reason"><?php echo $msgRepRow["msg_rep_reason"] ?></span>
				<span class="col link"><span class="btnS"><a href="article.php?art_no=<?php echo $msgRepRow["art_no"] ?>" target="showArticle" class="btnText btnText4 iframeBtn" onclick="">檢視網站</a></span></span>
				<span class="col alter">
					<p><a href="#">刪除文章</a></p>
					<p><a href="#">保留文章</a></p>
				</span>
			</div>
		</div>
<?php 
}
 ?>
		<!-- end right -->
		
		<input type="checkbox" id="lightBoxControl">
		<div class="lightBox">
			
			<div class="boxContent">
				<div class="reason">
					<p>檢舉原因:</p>
					<p>你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦你家通通都水逆啦</p>
				</div>
				
				<label for="lightBoxControl"><p class="exit">X</p></label>
				<iframe src="" name="showArticle" ></iframe>
				
			</div>
		</div>
	</div>
	
    
</body>
</html>