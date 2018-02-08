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
	<title>配對資料庫</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_matchDB.css">
	<link rel="stylesheet" type="text/css" href="../css/btn.css">
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
				<li class="active">前端首頁維護</li>
			</ol>

			<ol class="rightNav rightNav3">
				<li><a href="bk_fortuneDB.php">線上算命資料庫</a></li>
				<li><a class="nowAt" href="bk_matchDB.php">配對資料庫</a></li>
			</ol>
			<div class="tr">
				<span class="col no">編號</span>
				<span class="col value">配對指數</span>
				<span class="col content">未登入內文</span>
				<span class="col content2">已登入內文</span>
				<span class="col alter">修改/刪除</span>
			</div>

<?php 
	require_once("connectBD103G1.php");
	$sql = "select * from pair";
	$fortune = $pdo->prepare($sql);
	$fortune->execute();
	$fortune_rows = $fortune->fetchAll(PDO::FETCH_ASSOC);
	foreach ($fortune_rows as $i => $fortuneRow) {
?>
			<div class="tr">
				<span class="col no"><?php echo $fortuneRow["pair_no"] ?></span>
				<span class="col value"><?php echo $fortuneRow["pair_value"] ?></span>
				<span class="col content"><?php echo $fortuneRow["pair_content"] ?></span>
				<span class="col content2"><?php echo $fortuneRow["pair_content2"] ?></span>
				<span class="col alter">
					<a href="bk_matchChangeDB.php?pairNo=<?php echo $fortuneRow["pair_no"] ?>&action=1">A</a>
					<a href="bk_matchChangeDB.php?pairNo=<?php echo $fortuneRow["pair_no"] ?>&action=0">X</a>
				</span>
			</div>
<?php 
}
 ?>
			<div class="tr">
				<label for="lightBoxControl"><span class="btnS"><p class="btnText btnText2">新增</p></span></label>
			</div>
		</div>

		<!-- end right -->
		
		<input type="checkbox" id="lightBoxControl">
		<div class="lightBox">
			
			<div class="boxContent">
				<label for="lightBoxControl"><p class="exit">X</p></label>
				<form action="bk_addPairDB.php">
					<p class="input">
						<span>配對指數</span>
						<span>
							<input type="text" name="pair_value" required>
						</span>
					</p>
					<p class="input"><span>未登入內文</span></p>
					<p class="center"><textarea name="pair_content" cols="26" rows="6" required style="resize: none"></textarea></p>
					<p class="input"><span>未登入內文</span></p>
					<p class="center"><textarea name="pair_content2" cols="26" rows="6" required style="resize: none"></textarea></p>
					<p class="center">
						<span class="btnS"><input type="submit" value="新增" class="btnText btnText2"></span>
						<span class="btnS"><input type="reset" value="重填" class="btnText btnText2"></span></p>
				</form>
			</div>
		</div>
	</div>
	
    
</body>
</html>