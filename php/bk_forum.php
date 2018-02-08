<?php
ob_start();
session_start();
if(empty($_SESSION["bkLogin"])){
	header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>老師專區維護</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_forum.css">
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
				<li><a class="nowAt" href="bk_forum.php">專欄管理</a></li>
				<li><a href="bk_replyReview.php">留言檢舉管理</a></li>
			</ol>
			<div class="tr">
				<span class="col artNo">文章編號</span>
				<span class="col teacherNo">老師暱稱</span>
				<span class="col artTitle">文章標題</span>
				<span class="col link">連結</span>
				<span class="col alter">刪除</span>
			</div>

<?php 
	require_once("connectBD103G1.php");
	$sql = "SELECT a.art_no, b.teacher_nn, b.teacher_no, a.art_title FROM article a left join teacher b ON a.teacher_no = b.teacher_no";
	$article = $pdo->prepare($sql);
	$article->execute();
	$article_rows = $article->fetchAll(PDO::FETCH_ASSOC);
	foreach ($article_rows as $i => $articleRow) {
?>
			<div class="tr">
				<span class="col artNo"><?php echo $articleRow["art_no"] ?></span>
				<span class="col teacherNo"><?php echo $articleRow["teacher_nn"] ?></span>
				<span class="col artTitle"><?php echo $articleRow["art_title"] ?></span>
				<span class="col link"><span class="btnS"><a href="article.php?art_no=<?php echo $articleRow["art_no"] ?>" target="showArticle" class="btnText btnText4 iframeBtn">檢視網站</a></span></span>
				<span class="col alter"><a href="bk_deleteArticle.php?artNo=<?php echo $articleRow["art_no"] ?>">X</a></span>
			</div>
		
<?php 
}
 ?>
		</div>
		<!-- end right -->
		
		<input type="checkbox" id="lightBoxControl">
		<div class="lightBox">
			
			<div class="boxContent">
				<label for="lightBoxControl"><p class="exit">X</p></label>
				<iframe src="" name="showArticle" ></iframe>
				
			</div>
		</div>
	</div>
	
    
</body>
</html>