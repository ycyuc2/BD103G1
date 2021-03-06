<?php
	ob_start();
	session_start();
	if(empty($_SESSION["bkLogin"])){
		header('location:../index.php');
	}

	require_once 'connectBD103G1.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>檢視會員資料</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_member.css">
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
				<li class="active">檢視會員資料</li>
			</ol>
		<!-- end basic -->


			<ol class="rightNav rightNav2">
				<li><a href="bk_member.php">檢視會員資料</a></li>
				<li><a href="bk_teacherApplication.php">老師資格審核</a></li>
			</ol>
			<div class="resetBtn"><a href="bk_resetFortSta.php">重置算命狀態</a></div>
			<div class="tr">
				<span class="col no">編號</span>
				<span class="col account">帳號</span>
				<span class="col psw">密碼</span>
				<span class="col nickname">暱稱</span>
				<span class="col tel">電話</span>
				<span class="col karma">業力</span>
				<span class="col pic">照片</span>
				<span class="col sta">會員狀態</span>
				<span class="col alter">停權</span>
			</div>

<?php 
	require_once("connectBD103G1.php");
	$sql = "SELECT * from member";
	$mem = $pdo->prepare($sql);
	$mem->execute();
	$mem_rows = $mem->fetchAll(PDO::FETCH_ASSOC);
	foreach ($mem_rows as $i => $memRow) {
?>			

			<div class="tr">
				<span class="col no"><?php echo $memRow["mem_no"] ?></span>
				<span class="col account"><?php echo $memRow["mem_acc"] ?></span>
				<span class="col psw"><?php echo $memRow["mem_psw"] ?></span>
				<span class="col nickname"><?php echo $memRow["mem_nn"] ?></span>
				<span class="col tel">
					<?php 
						if ($memRow["mem_tel"] == null) {
							echo "無資料";
						}else{
							echo $memRow["mem_tel"];
						}
						 
					?>
						
				</span>
				<span class="col karma">
					<?php 
						if ($memRow["karma_val"] == null) {
							echo "無資料";
						}else{
							echo $memRow["karma_val"]; 
						}
						
					?>
						
				</span>
				<span class="col pic">
					<?php 
						if ($memRow["mem_pic"] == null) {
							echo "無資料";
						}else{
							echo $memRow["mem_pic"];
						}
						 
					?>
						
				</span>
				<span class="col sta"><?php echo $memRow["mem_sta"] ?></span>
				<span class="col alter">
					<input type="radio" value="0" class="valid<?php echo $memRow["mem_no"];?>" name="valid<?php echo $memRow["mem_no"];?>">停權
					<input type="radio" value="1" class="valid<?php echo $memRow["mem_no"];?>" name="valid<?php echo $memRow["mem_no"];?>">復權
				</span>
			</div>

<?php 
	}
 ?>

		</div>
		<script type="text/javascript">
			var radio = document.querySelectorAll('input[type=radio]');
			for (var i = 0; i < radio.length; i++) {
				radio[i].addEventListener('change', function () {
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							location.reload();
						}
					};
					xhttp.open("GET", "bk_member.php?action=changeState&mem_no="+this.className.substr(5,this.className.length)+"&mem_sta="+this.value);
					xhttp.send();
				});
			}
			<?php 
				if(isset($_REQUEST["action"]) == 'changeState'){
					$sql = "update member set mem_sta = :mem_sta where mem_no = :mem_no";
					$update = $pdo->prepare($sql);
					$update -> bindValue(':mem_no', $_REQUEST["mem_no"]);
					$update -> bindValue(':mem_sta', $_REQUEST["mem_sta"]);
					$update -> execute();
				}
							
			?>
		</script>
		<!-- end right -->
		
		
		</div>
	</div>
	
    
</body>
</html>