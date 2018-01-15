<?php
//記得要使用session之前，要先啟用serssion
//啟用輸出緩衝區
ob_start();//啟用session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>會員專區</title>
<link rel="stylesheet" type="text/css" href="../css/member.css">
<link rel="stylesheet" type="text/css" href="../css/btn.css">
<link rel="stylesheet" type="text/css" href="../css/dozen_nav.css">
<link rel="stylesheet" href="../css/header.css">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/countDown.js"></script>

</head>
<body>
	<?php
	$_SESSION["mem_no"] = 1;
//=====連資料庫，做測試
	try{
		require_once("connectBooks.php");
		$sql = "select * from member where mem_no = :mem_no";
		$member = $pdo->prepare($sql);
		$member -> bindValue(":mem_no",$_SESSION["mem_no"]);
		$member -> execute();

		$memRow = $member->fetch();

	}catch(PDOException $ex){
		echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
		echo "行號：",$ex->getLine(),"<br>";
	}
?>	


	<!-- hambuerger -->
	<!-- nav -->
	<input type="checkbox" name="" id="menuControl">

		<label for="menuControl" class="hamburger">
				<div></div>
				<div></div>
				<div></div>
		</label for="menuControl">

	<div class="menu">
		<!-- logo -->
		<a  href="#"><img  class="logo" src="../img/share/LOGO-08.png" ></a>

		<!-- 右邊的title區塊 -->

			<div class="left">
				<p>距離下次水星逆行還有</p>
				<table class="countdownContainer">
						<tr class="info">
							<td class="days">120</td><td>天</td>
							<td class="hours">4</td><td>時</td>
							<td class="minutes">12</td><td>分</td>
							<td class="seconds">22</td><td>秒</td>
						</tr>
						
					</table>
			</div>
		<!-- 中間的line -->
			<div class="line"></div>
			<!-- 右邊的time區塊 -->
			<div class="right">
				<a class="title" href="findTeacher.html">
					<span class="findTeacher"></span>
				</a>
				<a class="title" href="dozen_store.html">
					<span class="store"></span>
				</a>
				<a class="title" href="member.html">
					<span class="member"></span>
				</a>
			</div>	
	</div>
	<!-- hambuerger end-->
	<!-- header -->
	<div class="header">

		<!-- 中間logo -->
		<div class="logo">
			<a href="index.html">
				<img src="../img/share/LOGO-08.png">
			</a>
		</div>
		
		<!-- 右邊會員專區 -->
		<div class="memArea">
			<ul>
				<li><a href="#">註冊/登入</a></li>
				<li><a href="#">購物車(<span class="cartNo">0</span>)</a></li>
			</ul>
		</div>

		<!-- 右邊水逆倒數 -->
		<div class="countdown">
			<div class="countdownAlert"></div>
			<table class="countdownContainer">
					<tr class="info">
						<td>水星逆行倒數 :</td>
						<td class="days">120</td><td>天</td>
						<td class="hours">4</td><td>時</td>
						<td class="minutes">12</td><td>分</td>
					</tr>
					
				</table>
		</div>
	</div>
	<!-- header end -->
	<div class="topBlank"></div>
		
	<div class="wrapper">
		<div class="borderFrame"></div>
		<div class="left"><!-- 一般會員 -->
			<ol class="nav">
				<li><span class="btnM"><a href="infoAlter.html" class="btnText btnText4">修改資料</a></span></li>
				<li><span class="btnM"><a href="replyVIew.html" class="btnText btnText4">檢視留言</a></span></li>
				<li><span class="btnM"><a href="tradeView.html" class="btnText btnText4">檢視交易</a></span></li>
				<li><span class="btnM"><a href="essayCollect.html" class="btnText btnText4">收藏文章</a></span></li>
				<li><span class="btnM"><a href="teacherApllication.html" class="btnText btnText4">成為老師</a></span></li>
			</ol>
			
			<!-- 老師 -->
			<!-- <ol class="nav navTeacher">
				<li><a href="infoAlter.html">修改資料</a></li>
				<li><a href="replyVIew.html">檢視留言</a></li>
				<li><a href="tradeView.html">檢視交易</a></li>
				<li><a href="teacherApllication.html">成為老師</a></li>
			</ol> -->
		</div>


		<div class="right">
			<div class="content info">
			
				<h2>個人資料</h2>
				<p>
					<span>會員帳號</span><span class="name"><?php echo $memRow->mem_acc;?></span>
				</p>
				<p>
					<span>會員暱稱</span><span class="nickname"><?php echo $memRow->mem_nn;?></span>
				</p>
				<p>
					<span>會員電話</span><span class="tel"><?php echo $memRow->mem_tel;?></span>
				</p>
			
			</div>
			
			
			<div class="content reply">
			
				<h2 >檢視留言</h2>
				<div class="table">
					<div class="tr">
						<div class="th tdWidth">回復數</div>
						<div class="th tdWidth">留言</div>
						<div class="tdRight">
							<div class="th tdWidth">發文老師</div>
							<div class="th tdWidth">最新回復</div>
						</div>
					</div>
					<div class="tr">
						<div class="td tdWidth replyNo">12</div>
						<div class="td tdWidth replyContent">
							<p>
								[標題]標題標題標題
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam sapiente voluptatibus iusto ipsam eaque, dicta culpa distinctio eum, ullam velit.
							</p>
						</div>
						<div class="tdRight">
							<div class="td tdWidth">
								<p>老師名稱</p>
								<p>1226 08:00</p>
							</div>
							<div class="td tdWidth">
								<p>回文人名稱</p>
								<p>1226 08:00</p>
							</div>
						</div>
					</div>
					<div class="tr">
						<div class="td tdWidth replyNo">12</div>
						<div class="td tdWidth replyContent">
							<p>
								[標題]標題標題標題
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam sapiente voluptatibus iusto ipsam eaque, dicta culpa distinctio eum, ullam velit.
							</p>
						</div>
						<div class="tdRight">
							<div class="td tdWidth">
								<p>老師名稱</p>
								<p>1226 08:00</p>
							</div>
							<div class="td tdWidth">
								<p>回文人名稱</p>
								<p>1226 08:00</p>
							</div>
						</div>
					</div>
					<div class="tr">
						<div class="td tdWidth replyNo">12</div>
						<div class="td tdWidth replyContent">
							<p>
								[標題]標題標題標題
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam sapiente voluptatibus iusto ipsam eaque, dicta culpa distinctio eum, ullam velit.
							</p>
						</div>
						<div class="tdRight">
							<div class="td tdWidth">
								<p>老師名稱</p>
								<p>1226 08:00</p>
							</div>
							<div class="td tdWidth">
								<p>回文人名稱</p>
								<p>1226 08:00</p>
							</div>
						</div>
					</div>
				</div>

				
			
			</div>
			
			
			<div class="content trade">
			
				<h2 >交易紀錄</h2>
				<table>
					<tr>
						<th>日期</th>
						<th>品項</th>
						<th>數量</th>
						<th>金額</th>
					</tr>
					<tr>
						<td>2017/11/11</td>
						<td>單身大禮包</td>
						<td>1</td>
						<td>1,111</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="blank"></div>
	</div>
</body>
</html>