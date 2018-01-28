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
<link rel="stylesheet" type="text/css" href="../css/teacherApllication.css">
<?php require_once 'publicHeader.php'; ?>
</head>
<body>
<?php 
	require_once 'connectBD103G1.php';
	require_once 'header.php';
?>
	<div class="topBlank"></div>

	<?php if ($_REQUEST["action"] == 'insert') {
			$sql = "insert into teacher set teacher_name = :teacher_name, teacher_info = :teacher_info, teacher_nn = :teacher_nn, teacher_tel = :teacher_tel, mem_no = :mem_no, teacher_app = 0, teacher_img = :teacher_img";
			$insert = $pdo->prepare($sql);
			$insert->bindValue(':teacher_name', $_REQUEST["teacher_name"]);
			$insert->bindValue(':teacher_info', $_REQUEST["teacher_info"]);
			$insert->bindValue(':teacher_nn', $_REQUEST["teacher_nn"]);
			$insert->bindValue(':teacher_tel', $_REQUEST["teacher_tel"]);
			$insert->bindValue(':teacher_img', 'teacher001.jpg');
			$insert->bindValue(':mem_no', $_SESSION["mem_no"]);
			$insert->execute();
			header('location:'.$_SESSION["where"]);
	} ?>
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
		

		<div class="left"><!-- 一般會員 -->
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
			<div class="content teacher">
			
				<h2 >申請老師資格</h2>
				<form action="teacherApllication.php?action=insert" method="post">
					<p>
						<span>姓名</span>
						<span class="input"><input type="text" name="teacher_name" required></span>
					</p>
					<p>
						<span>暱稱</span>
						<span class="input"><input type="text" name="teacher_nn" required></span>
					</p>
					<p>
						<span>電話</span>
						<span class="input"><input type="text" name="teacher_tel" required></span>
					</p>
					<p>
						<span>簡介</span><span class="textarea"><textarea rows="5" cols="19" name="teacher_info" required></textarea></span>
					</p>
					<p class="btn">
						<span class="btnS"><input type="submit" value="申請" class="btnText btnText2"></span>
						<span class="btnS"><input type="reset" value="重填" class="btnText btnText2"></span>
					</p>
				</form>
			</div>
		</div>
		<div class="blank"></div>
	</div>
	
</body>
</html>