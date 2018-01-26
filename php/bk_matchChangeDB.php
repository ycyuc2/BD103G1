<?php 
	session_start();
	ob_start();
	require_once("connectBD103G1.php");
	$pairNo = $_REQUEST["pairNo"];
	if ($_REQUEST["action"] == 0) {
		$sql = "DELETE from pair where pair_no = $pairNo";
		$deleteData = $pdo->prepare($sql);
		$deleteData->ececute();
		header("location:bk_fortuneDB.php");
	}else{
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
				<span class="col alter">確認修改</span>
			</div>

<?php 
	require_once("connectBD103G1.php");
	$sql = "select * from pair where pair_no = $pairNo";
	$pair = $pdo->prepare($sql);
	$pair->execute();
	$pair_rows = $pair->fetchAll(PDO::FETCH_ASSOC);
	foreach ($pair_rows as $i => $pairRow) {
?>
			<form action="bk_matchUpdateDB.php" method="get">
				<div class="tr">
					<input type="hidden" name="pairNo" value="<?php echo $pairRow["pair_no"] ?>">
					<span class="col no"><?php echo $pairRow["pair_no"] ?></span>
					<span class="col value"><input type="text" name="pairValue" value="<?php echo $pairRow["pair_value"] ?>"></span>
					<span class="col content"><textarea name="pairContent" ><?php echo $pairRow["pair_content"] ?></textarea></span>
					<span class="col content2"><textarea name="pairContent2"><?php echo $pairRow["pair_content2"] ?></textarea></span>
					<input type="submit" value="送出" class="col alter btnS btnText btnText2">
				</div>
			</form>
<?php 
}
	}
 ?>

		</div>

		<!-- end right -->
		
		<input type="checkbox" id="lightBoxControl">
		<div class="lightBox">
			
			<div class="boxContent">
				<label for="lightBoxControl"><p class="exit">X</p></label>
				<form>
					<p class="input">
						<span>星座</span>
						<span>
							<select>
								<option value="0">請選擇星座</option>
								<option value="1">水瓶座</option>
								<option value="2">雙魚座</option>
								<option value="3">白羊座</option>
								<option value="4">金牛座</option>
								<option value="5">雙子座</option>
								<option value="6">巨蟹座</option>
								<option value="7">獅子座</option>
								<option value="8">處女座</option>
								<option value="9">天秤座</option>
								<option value="10">天蠍座</option>
								<option value="11">射手座</option>
								<option value="12">摩羯座</option>
							</select>
						</span>
					</p>
					<p class="input">
						<span>對象星座</span>
						<span>
							<select >
								<option value="0">請選擇星座</option>
								<option value="1">水瓶座</option>
								<option value="2">雙魚座</option>
								<option value="3">白羊座</option>
								<option value="4">金牛座</option>
								<option value="5">雙子座</option>
								<option value="6">巨蟹座</option>
								<option value="7">獅子座</option>
								<option value="8">處女座</option>
								<option value="9">天秤座</option>
								<option value="10">天蠍座</option>
								<option value="11">射手座</option>
								<option value="12">摩羯座</option>
							</select>
						</span>
					</p>
					<p class="input"><span>標題</span><span><input type="text" name="fortuneTitle"></span></p>
					<p class="input"><span>內文</span></p>
					<p class="center"><textarea cols="26" rows="6"></textarea></p>
					<p class="center">
						<span class="btnS"><input type="submit" value="新增" class="btnText btnText2"></span>
						<span class="btnS"><input type="reset" value="重填" class="btnText btnText2"></span></p>
				</form>
			</div>
		</div>
	</div>
	
    
</body>
</html>