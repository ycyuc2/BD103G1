<?php 
	session_start();
	ob_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>老師資格審核</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_teacherApplication.css">
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
				<li class="active">老師資格審核</li>
			</ol>
		<!-- end basic -->


			<ol class="rightNav rightNav2">
				<li><a href="bk_member.php">檢視會員資料</a></li>
				<li><a href="bk_matchDB.php">老師資格審核</a></li>
			</ol>

			<div class="tr">
				<span class="col no">會員編號</span>
				<span class="col name">老師姓名</span>
				<span class="col nickname">暱稱</span>
				<span class="col tel">電話</span>
				<span class="col intro">簡介</span>
				<span class="col alter">批准</span>
			</div>
<?php 
	require_once("connectBD103G1.php");
	$sql = "SELECT * from teacher where teacher_app = 0";
	$teacherApp = $pdo->prepare($sql);
	$teacherApp->execute();
	$teacherApp_rows = $teacherApp->fetchAll(PDO::FETCH_ASSOC);
	foreach ($teacherApp_rows as $i => $teacherAppRow) {
		
?>

			<div class="tr">
				<span class="col no"><?php echo $teacherAppRow["mem_no"] ?></span>
				<span class="col name"><?php echo $teacherAppRow["teacher_name"] ?></span>
				<span class="col nickname"><?php echo $teacherAppRow["teacher_nn"] ?></span>
				<span class="col tel"><?php echo $teacherAppRow["teacher_tel"] ?></span>
				<span class="col intro"><?php echo $teacherAppRow["teacher_info"] ?></span>
				<span class="col alter">
					<input type="radio" value="0" name="valid">拒絕
					<input type="radio" value="1" name="valid">接受
				</span>
			</div>

<?php
	}
 ?>			

		</div>

		<!-- end right -->
		
		
		</div>
	</div>
	
    
</body>
</html>