<?php
ob_start();
session_start();
?>
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
	
	<?php 
		require_once("connectBD103G1.php");
		require_once("header.php");
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
	require_once("connectBD103G1.php");
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
	<fieldset class="rating teacherStar">
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
<?php 
	$sql="select * from teacher_review where  teacher_no =?";
	$check=$pdo->prepare($sql);
	$check->bindValue(1,$_REQUEST["teacher_no"]);
	$check->execute();
	$count=$check->rowCount();
	if($count!=0){
		$starScore=0;
		while($checkRow=$check->fetchObject()){
			$starScore+=$checkRow->review_star;
		}?>
		<script>
			var star= <?php echo round($starScore/$count);?>;
			var inputElems= $('.teacherStar input[type="radio"]');
			inputElems[5-star].checked=true;
			for(var i=0;i<5;++i){
				inputElems[i].disabled=true;
			}
		</script>
	<?php }?>
						</p>
					</div>
				</div>
				<div class="links">
<?php 
	if (isset($_SESSION["teacher_no"])) {
		if($_SESSION["teacher_no"]==$teacherNo){?>
				<div class="left">
					<span class="btnM">
						<a href="recommendProducts.php?teacher_no='.$teacherNo.'" class="btnText btnText4">商品推薦</a>
					</span>
				</div>
				<div class="middle">
					<form action="articlePost.php" method="post">
						<span class="btnM">
							<input type="hidden" name="teacherNo" value="<?php echo $_REQUEST["teacher_no"]?>">
							<input type="submit" class="btnText btnText2" value="發文"></input>
						</span>
					</form>
				</div>	
				<div class="right">
						<span class="btnM">
							<a href="specialColumn.php?teacher_no='.$teacherNo"class="btnText btnText4">老師專欄</a>
						</span>
					</div>
		<?php }
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






				<hr class="hr">


				<!-- 商品推薦 -->
				<div class="merchandise">
					<h2>商品推薦</h2>


<?php 
try {
	require_once("connectBD103G1.php");
	$sql = "select a.pd_no, a.pd_name, a.pd_sale, a.pd_pic1, a.pd_price, a.pd_describe 
			from products as a left join pd_recommend as b 
			on a.pd_no = b.pd_no 
			or a.pd_no = b.pd_no2 
			or a.pd_no = b.pd_no3 
			where b.teacher_no = :teacher_no";
	$recommends = $pdo->prepare($sql);
	$recommends->bindValue(":teacher_no",$teacherNo);
	$recommends->execute();
	$recommend_rows = $recommends->fetchAll(PDO::FETCH_ASSOC);

	foreach( $recommend_rows as $i=>$recommendRow){
 ?>
					<div class="content">
						<div class="merchandisePhoto">
							<div class="picBorder"></div>
							<?php echo '<img class="photo" src="../img/products/',$recommendRow["pd_pic1"],'" alt="">' ?>
						</div>
						<div class="merchandiseIntro">
									<?php echo '<a href="dozen_storedetail.php?pd_no=',$recommendRow["pd_no"],'">' ?>
									<?php echo $recommendRow["pd_name"] ?>
									
								</a>
							<p>
								<?php echo mb_substr($recommendRow["pd_describe"],0,50,"utf-8")."..." ?>
							</p>
							<p>
								<span>$<?php echo $recommendRow["pd_price"] ?></span>
								<span><?php echo $recommendRow["pd_sale"] ?> </span>元
							</p>
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



				<div class="articleList">
					<h2>文章列表</h2>




<?php 

try {
	require_once("connectBD103G1.php");
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
									<?php echo 
									'<a href="article.php?art_no='
									.$articleRow["art_no"]
									.'">'
									.$articleRow["art_title"]
									.'</a>' 
									?>
										
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