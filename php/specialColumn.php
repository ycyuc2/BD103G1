<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>老師專欄</title>
	<link rel="stylesheet" type="text/css" href="../css/specialColumn.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<link rel="stylesheet" type="text/css" href="../css/starRating.css">
	<?php require_once("publicHeader.php") ?>
</head>
<body>
	
	<?php require_once("header.php");
			$_SESSION["where"] = "specialColumn.php";
	?>

	



	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="../img/lightening/flash4.png" alt="" class="flash lt4">
		
	</div>
<!-- header -->

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
<?php 
	if (isset($_SESSION["teacher_no"])) {
		if($_SESSION["teacher_no"]==$teacherNo){
			echo '
				<div class="left">
					<span class="btnM">
						<a href="recommendProducts.html" class="btnText btnText4">商品推薦</a>
					</span>
				</div>
				<div class="right">
						<span class="btnM">
							<a href=
				';
				echo 'specialColumn.php?teacher_no='.$teacherNo;
				echo ' class="btnText btnText4">老師專欄</a>
						</span>
					</div>
				';
		}
		
	}



 ?>
					
					<?php  ?>
				</div>
				<hr class="hr">


				<!-- 發文按鈕 -->
				<div class="newArticle">

<?php 
	if(isset($_SESSION["teacher_no"])){
		if ($_SESSION["teacher_no"]==$teacherNo) {
			echo '<form action="articlePost.php" method="post">
								<span class="btnM">
									<input type="hidden" name="teacherNo" value=';
			echo '"'.$_REQUEST["teacher_no"].'"';
			echo '>
							<input type="submit" class="btnText btnText2" value="發文"></input>
						</span>
						</form>
					</div>';			
		}
	}


 ?>
					


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
	$sql = "select * from article where teacher_no = :teacher_no order by art_post_time desc";
	$article = $pdo->prepare($sql);
	$article->bindValue(":teacher_no",$_REQUEST["teacher_no"]);
	$article->execute();
	$article_rows = $article->fetchAll(PDO::FETCH_ASSOC);

	foreach( $article_rows as $i=>$articleRow){
?>


				<!-- 文章列表 -->
				
				
					<div class="article first">
						<div class="pic">
							<div class="picContainer">
								<div class="picBorder"></div>
								<?php echo '<img src="../img/article/'.$articleRow["art_img_1"].'">' ?>
							</div>
						</div>
						<div class="content">
							<div class="topic">
								<h3>
									<?php echo '<a href="article.php">'.$articleRow["art_title"].'</a>' ?>
										
								</h3>
								<div class="detail">
									<span><?php echo date("Y-m-d",strtotime($articleRow["art_post_time"])) ?></span>
								</div>
							</div>
							<div class="preview">
								<p>
									<?php echo mb_substr($articleRow["art_content_1"],0,100,"utf-8")."..." ?>
										
								</p>
							</div>
						</div>

						<?php 
							if (isset($_SESSION["teacher_no"])) {
								if ($_SESSION["teacher_no"]==$teacherNo) {

									echo
									'<div class="edit">
										<a href="articleEdit.php?teacher_no='.$teacherNo.'&art_no='.$articleRow["art_no"].'"><i class="fa fa-pencil-square-o"></i></a>
										<a href="articleDelete.php?teacher_no='.$teacherNo.'&art_no='.$articleRow["art_no"].'"><i class="fa fa-trash-o"></i></a>
									</div>';

								}
							}

						 ?>
						


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