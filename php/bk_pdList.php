<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>老師資格審核</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_pdList.css">
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
				<li class="active">訂單管理</li>
			</ol>
		<!-- end basic -->


			<ol class="rightNav rightNav2">
				<li><a href="bk_trade.php">檢視交易紀錄</a></li>
				<li><a href="bk_pdList.php">訂單管理</a></li>
			</ol>

			<div class="tr">
				<span class="col memNo">會員編號</span>
				<span class="col pdNo">訂單編號</span>
				<span class="col orderTime">訂單時間</span>
				<span class="col stat">訂單狀態</span>
				<span class="col alter">狀態修改</span>
			</div>
			
			<div class="tr">
				<span class="col memNo">12</span>
				<span class="col pdNo">2233</span>
				<span class="col orderTime">12:34</span>
				<span class="col stat">未出貨</span>
				<span class="col alter">
					<input type="radio" value="0" name="valid">未出貨
					<input type="radio" value="1" name="valid">已出貨
				</span>
			</div>
		</div>

		<!-- end right -->
		
		
		</div>
	</div>
	
    
</body>
</html>