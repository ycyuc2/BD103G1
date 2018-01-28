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
<link rel="stylesheet" type="text/css" href="../css/infoAlter.css">
<?php require_once 'publicHeader.php'; ?>
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
		<?php 
			$sql = "select * from member where mem_no = :mem_no";
			$member = $pdo->prepare($sql);
			$member->bindValue(':mem_no', $_SESSION["mem_no"]);
			$member->execute();
			$memberRow = $member->fetchObject();
			if(isset($_REQUEST["action"])){
				if ($_REQUEST["action"] == 'update') {
					if ( empty($_REQUEST["mem_psw"]) ) {
						$_REQUEST["mem_psw"] = $memberRow->mem_psw;
					}
					if( $_FILES["mem_pic"]["error"]==0){
						$tmpFileName = strrchr($_FILES["mem_pic"]["name"],".");
						$uploadFileName =  $_SESSION["mem_no"].$tmpFileName;
						$from = $_FILES["mem_pic"]["tmp_name"];
						$to ="../img/member/".$uploadFileName;
						copy( $from, $to);
						
					}else{
						$_FILES["mem_pic"]["name"] = null;
					}
					$sql = "update member set mem_psw = :mem_psw, mem_tel = :mem_tel, mem_nn = :mem_nn, mem_pic = :mem_pic where mem_no = :mem_no";
					$update = $pdo->prepare($sql);
					$update->bindValue(':mem_psw', $_REQUEST["mem_psw"]);
					$update->bindValue(':mem_nn', $_REQUEST["mem_nn"]);
					$update->bindValue(':mem_tel', $_REQUEST["mem_tel"]);
					$update->bindValue(':mem_pic', $uploadFileName);
					$update->bindValue(':mem_no', $_SESSION["mem_no"]);
					$update->execute();
					header('location:'.$_SESSION["where"]);
				} 
			} ?>
				
		<?php if (isset($_SESSION["mem_no"])) {?>
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
			<div class="content info">
				
				<h2>個人資料</h2>
				<form action="infoAlter.php?action=update" method="post" enctype="multipart/form-data">
					
					<p>
						<span>修改密碼</span><span class="input"><input type="password" name="mem_psw"></span><span class="pswConfirm">密碼與確認密碼不符</span>
					</p>
					<p>
						<span>確認密碼</span><span class="input"><input type="password" name="pswConfirm"></span><span class="pswConfirm">密碼與確認密碼不符</span>
					</p>
					<p>
						<span>修改暱稱</span><span class="input"><input type="text" name="mem_nn" value="<?php echo $memberRow->mem_nn;?>"></span>
					</p>
					<p>
						<span>修改電話</span><span class="input"><input type="text" name="mem_tel" value="<?php echo $memberRow->mem_tel;?>"></span>
					</p>
					<p>
						<span>新增照片</span>
						<label for="fileTag"></label><input id="fileTag" type="file" name="mem_pic" value="">
					</p>
					<p class="btn">
						<span class="btnS"><span class="btnText btnText2">提交</span></span>
						<span class="btnS"><input type="reset" value="重設" class="btnText btnText2"></span>
					</p>
				</form>
				<script type="text/javascript">
					var psw = document.querySelectorAll('input[type=password]');
					var submit = document.querySelector('.info form .btn .btnS span');
					var pswConfirm = document.querySelectorAll('.pswConfirm');
					for (var i = 0; i < psw.length; i++) {
						psw[i].addEventListener('change', function () {
							if(psw[0].value != '' && psw[1].value != '' && psw[0].value != psw[1].value){
								pswConfirm[0].style.display = 'block';
								pswConfirm[1].style.display = 'block';
								submit.value = 'true';
							}else{
								pswConfirm[0].style.display = 'none';
								pswConfirm[1].style.display = 'none';
								submit.value = 'false';
							}
						});
					}
					document.querySelector('.info input[type=reset]').addEventListener('click', function (){
							pswConfirm[0].style.display = 'none';
							pswConfirm[1].style.display = 'none';
							submit.value = 'false';
					});
					document.querySelector('.info .btn .btnS').addEventListener('click', function () {
						if(submit.value == 'true'){
							alert('請輸入正確的密碼');
						}else{
							alert('資料修改成功');
							document.querySelector('.info form').submit();
						}
					});
					document.querySelector('input[type=file]').addEventListener('change', function(){

							var fileType = this.value.substring(this.value.lastIndexOf('.') + 1, this.value.length);
							if (!(fileType == 'jpg' || fileType == 'jpeg' || fileType == 'png' || fileType == 'gif')) {
								alert('檔案格式須為jpg、jpeg、png或gif');
								this.value = null;
							}else{
								document.querySelector('p label').innerText = this.value.substring(this.value.lastIndexOf('\\') + 1, this.value.length);
							}
							
					});

				</script>
			</div>
		</div>
		<?php } ?>
		<div class="blank"></div>
	</div>
</body>
</html>