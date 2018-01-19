<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>老師專欄</title>
	<script src="../js/countDown.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/specialColumn.css">
	<link rel="stylesheet" type="text/css" href="../css/dozen_nav.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<link rel="stylesheet" type="text/css" href="../css/starRating.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/btn.css">
</head>
<body>
	
	<!-- 漢堡選單 -->
		<input type="checkbox" name="" id="menuControl">

		<label for="menuControl" class="hamburger">
				<div></div>
				<div></div>
				<div></div>
		</label for="menuControl">

	<div class="menu">
		<!-- logo -->
		<a  href="index.html"><img  class="logo" src="../img/share/LOGO-08.png" ></a>

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
<!-- hb end -->

	



	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="../img/lightening/flash4.png" alt="" class="flash lt4">
		
	</div>
<!-- header -->
	<div class="header">

		<!-- 中間logo -->
		<div class="logo">
			<a href="#">
				<img src="../img/share/LOGO-08.png">
			</a>
		</div>
		
		<!-- 右邊會員專區 -->
		<div class="memArea">
			<ul>
				<li><a href="#">註冊</a></li>
				<li><a href="#">登入</a></li>
				<li><a href="#">購物車(<span class="cartNo">0</span>)</a></li>
			</ul>
		</div>

		<!-- 右邊水逆倒數 -->
		<div class="countdown">
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
<?php 
$teacherNo = $_REQUEST["teacher_no"];
try {
	require_once("connectBD103G1yu.php");
	$sql = "select * from teacher where teacher_no = :teacher_no";
	$teachers = $pdo->prepare($sql);
	$teachers->bindValue(":teacher_no",$teacherNo);
	$teachers->execute();
	$teacher_rows = $teachers->fetchAll(PDO::FETCH_ASSOC);

	foreach( $teacher_rows as $i=>$teacherRow){
?>
	<div class="headerBlank"></div>


		<h1><?php echo $teacherRow["teacher_nn"] ?> X 運勢解析</h1>
		<div class="teacher">
			<div class="border"></div>
			<div class="teacherBorder">


				<!-- 作者介紹 -->
				<div class="intro">
					<div class="teacherPhoto">
						<div class="picBorder"></div>
						<?php echo '<img class="photo" src="../img/findTeacher/',$teacherRow["teacher_img"],'" alt="">' ?>
					</div>
					<div class="introContent">
						<p><?php echo $teacherRow["teacher_nn"] ?></p>
						<p><?php echo $teacherRow["teacher_info"] ?></p>
						<p>
	<!-- 評價星等 -->
	<fieldset class="rating">
	    <input type="radio" id="star5" name="rating" value="5" />
	    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
	    <input type="radio" id="star4" name="rating" value="4" />
	    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
	    <input type="radio" id="star3" name="rating" value="3" />
	    <label class = "full" for="star3" title="Meh - 3 stars"></label>
	    <input type="radio" id="star2" name="rating" value="2" />
	    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
	    <input type="radio" id="star1" name="rating" value="1" />
	    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
	</fieldset>

						</p>
					</div>
				</div>
				<div class="links">
					<div class="left">
						<span class="btnM">
							<a href="recommendProducts.html" class="btnText btnText4">商品推薦</a>
						</span>
					</div>
					<div class="mid">
						<span class="btnM">
							<a href="schedule.html" class="btnText btnText4">老師行程</a>
						</span>
					</div>
					<div class="right">
						<span class="btnM">
							<a href=<?php echo 'specialColumn.php?teacher_no='.$teacherNo ?> class="btnText btnText4">老師專欄</a>
						</span>
					</div>
				</div>
				<hr class="hr">


				<!-- 發文按鈕 -->
				<div class="newArticle">
					<span class="btnM">
						<a href="articlePost.html" class="btnText btnText2">發文</a>
					</span>
				</div>


<?php
	}
} catch (PDOException $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
			
		}


	 ?>

				<div class="articleList">

<?php 

try {
	require_once("connectBD103G1yu.php");
	$sql = "select * from article where teacher_no = :teacher_no";
	$article = $pdo->prepare($sql);
	$article->bindValue(":teacher_no",$teacherNo);
	$article->execute();
	$article_rows = $article->fetchAll(PDO::FETCH_ASSOC);

	foreach( $article_rows as $i=>$articleRow){
?>


				<!-- 文章列表 -->
				
				
					<div class="article first">
						<div class="pic">
							<div class="picContainer">
								<div class="picBorder"></div>
								<?php echo '<img src="..img/specialColumn/'.$articleRow["ART_IMG_1"].'">' ?>
							</div>
						</div>
						<div class="content">
							<div class="topic">
								<h3>
									<?php echo '<a href="article.php">'.$articleRow["ART_TITLE"].'</a>' ?>
										
								</h3>
								<div class="detail">
									<span><?php echo date("Y-m-d",strtotime($articleRow["ART_POST_TIME"])) ?></span>
								</div>
							</div>
							<div class="preview">
								<p>
									<?php echo mb_substr($articleRow["ART_CONTENT_1"],0,100,"utf-8")."..." ?>
										
								</p>
							</div>
						</div>
						<div class="edit">
							<a href=""><i class="fa fa-pencil-square-o"></i></a>
							<a href=""><i class="fa fa-trash-o"></i></a>
						</div>


					</div>

				


<?php
	}
} catch (PDOException $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
			
		}

 ?>
				</div>

				<hr class="hr">


				<!-- 商品推薦 -->
				<div class="merchandise">
					<h2>聖物推薦</h2>
					<div class="content">
						<div class="merchandisePhoto">
							<div class="picBorder"></div>
							<img src="../img/specialColumn/cristal.JPG" alt=""></div>
						<div class="merchandiseIntro">
							<a href="#">開運水晶柱</a>
							<p>放在家裡的各個角落，以確保邪靈無法輕易入侵，三個以上可形成結界，結界內的人事物皆會受到祝福，在結界內告白，成功率超過80%！</p>
							<p><span>3599</span><span> 899 </span>元</p>
						</div>
					</div>
					<div class="content rear">
						<div class="merchandisePhoto">
							<div class="picBorder"></div>
							<img src="../img/specialColumn/cristal.JPG" alt=""></div>
						<div class="merchandiseIntro">
							<a href="#">開運水晶柱</a>
							<p>放在家裡的各個角落，以確保邪靈無法輕易入侵，三個以上可形成結界，結界內的人事物皆會受到祝福，在結界內告白，成功率超過80%！</p>
							<p><span>3599</span><span> 899 </span>元</p>
						</div>
					</div>
					<div class="content rear">
						<div class="merchandisePhoto">
							<div class="picBorder"></div>
							<img src="../img/specialColumn/cristal.JPG" alt=""></div>
						<div class="merchandiseIntro">
							<a href="#">開運水晶柱</a>
							<p>放在家裡的各個角落，以確保邪靈無法輕易入侵，三個以上可形成結界，結界內的人事物皆會受到祝福，在結界內告白，成功率超過80%！</p>
							<p><span>3599</span><span> 899 </span>元</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	

	<!-- ====================footer==================== -->
	<div class="footer">
		<div class="copyright">
			<p>
			點算©Copyright DOZEN, 2018.
			</p>
		</div>
		
	</div>

<!-- footer end -->

</body>
</html>