<?php 
	session_start();
	ob_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>線上算命資料庫</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_fortuneDB.css">
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
				<li><a class="nowAt" href="bk_fortuneDB.php">線上算命資料庫</a></li>
				<li><a href="bk_matchDB.php">配對資料庫</a></li>
			</ol>
			<div class="tr">
				<span class="col no">編號</span>
				<span class="col constel">星座</span>
				<span class="col content1">顯示內文</span>
				<span class="col content2">登入後才顯示之內容</span>
				<span class="col karmaInc">業力增加值</span>
				<span class="col category">推薦類別</span>
				<span class="col alter">修改/刪除</span>
			</div>
<?php 
	require_once("connectBD103G1.php");
	$sql = "select * from fortune";
	$fortune = $pdo->prepare($sql);
	$fortune->execute();
	$fortune_rows = $fortune->fetchAll(PDO::FETCH_ASSOC);
	foreach ($fortune_rows as $i => $fortuneRow) {
?>
			<div class="tr">
				<span class="col no"><?php echo $fortuneRow["fort_no"] ?></span>
				<span class="col constel">

<?php
			if ($fortuneRow["const"] == 0) {
				echo "摩羯座";
			}else if ($fortuneRow["const"] == 1) {
				echo "水瓶座";
			}else if ($fortuneRow["const"] == 2) {
				echo "雙魚座";
			}else if ($fortuneRow["const"] == 3) {
				echo "牡羊座";
			}else if ($fortuneRow["const"] == 4) {
				echo "金牛座";
			}else if ($fortuneRow["const"] == 5) {
				echo "雙子座";
			}else if ($fortuneRow["const"] == 6) {
				echo "巨蟹座";
			}else if ($fortuneRow["const"] == 7) {
				echo "獅子座";
			}else if ($fortuneRow["const"] == 8) {
				echo "處女座";
			}else if ($fortuneRow["const"] == 9) {
				echo "天秤座";
			}else if ($fortuneRow["const"] == 10) {
				echo "天蠍座";
			}else{
				echo "射手座";
			}
?>
				
				</span>
				<span class="col content1"><?php echo $fortuneRow["fort_content"] ?></span>
				<span class="col content2"><?php echo $fortuneRow["fort_content2"] ?></span>
				<span class="col karmaInc"><?php echo $fortuneRow["karma_inc"] ?></span>
				<span class="col category"><?php echo $fortuneRow["recommend_type"] ?></span>
				<span class="col alter">
					<a href="bk_fortuneChangeDB.php?fortNo=<?php echo $fortuneRow["fort_no"] ?>&action=1">A</a>
					<a href="bk_fortuneChangeDB.php?fortNo=<?php echo $fortuneRow["fort_no"] ?>&action=0">X</a>
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
				<form action="bk_addFortuneDB.php" method="get">
					<p class="input">
						<span>星座</span>
						<span>
							<select name="const" required>
								<option value="">請選擇星座</option>
								<option value="1">水瓶座</option>
								<option value="2">雙魚座</option>
								<option value="3">牡羊座</option>
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
					<p class="input"><span>未登入內文</span></p>
					<p class="center">
						<textarea name="fort_content" cols="26" rows="6" required style="resize: none"></textarea>
					</p>
					<p class="input"><span>已登入內文</span></p>
					<p class="center">
						<textarea name="fort_content2" cols="26" rows="6" required style="resize: none"></textarea>
					</p>
					<p class="input" required><span>業力增加值</span>
						<span>
							<select name="karma_inc" required>
								<option value="">請選擇結果凶吉</option>
								<option value="0">大吉</option>
								<option value="50">吉</option>
								<option value="100">凶</option>
								<option value="200">大凶</option>
							</select>
						</span>
					</p>
					<p class="input">
						<span>推薦商品類型</span>
						<span>
							<select name="recommend_type" required>
								<option value="">請選擇類型</option>
								<option value="1">飾品類</option>
								<option value="2">擺飾類</option>
								<option value="3">食品類</option>
								<option value="4">文具類</option>
							</select>
						</span>
					</p>
					<p class="center">
						<span class="btnS"><input type="submit" value="新增" class="btnText btnText2"></span>
						<span class="btnS"><input type="reset" value="重填" class="btnText btnText2">重填</span></p>
				</form>
			</div>
		</div>

	</div>
	
    
</body>
</html>