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



		
			
			<div class="authorInfo">
				<div class="authorPhoto">
					<div class="pic">
						<div class="frameBorder"></div>

						<?php echo '<img src="../img/findTeacher/',$teacherRow["teacher_img"],'" alt="">' ?>
						
					</div>
				</div>
				<div class="authorIntro">
					<h2><?php echo $teacherRow["teacher_nn"] ?></h2>
					<p><?php echo mb_substr($teacherRow["teacher_info"],0,50,"utf-8")."..." ?></p>
					<p>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</p>

				</div>
			</div>

			<div class="teacherMaps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.7591798476183!2d121.21762541488746!3d24.940272548196493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34682254583cc8a3%3A0x75626fd1a8bef7a8!2zMzI05qGD5ZyS5biC5bmz6Y6u5Y2A55Kw5Y2X6Lev5LiJ5q61MTIz6Jmf!5e0!3m2!1szh-TW!2stw!4v1514826750576" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="teacherColumn">
				<p>最新命運解析</p>
				<div class="column">


<?php		
	}

} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?> 
<?php 

try {
	require_once("connectBD103G1yu.php");
	$sql = "select * from article where teacher_no = :teacher_no and ART_POST_TIME = (
			select max(ART_POST_TIME) from article where teacher_no = :teacher_no
			)";
	$article = $pdo->prepare($sql);
	$article->bindValue(":teacher_no",$teacherNo);
	$article->execute();
	$article_rows = $article->fetchAll(PDO::FETCH_ASSOC);
	

	if ($article->rowCount() == 0) {
		echo 	
			'
			<p>
				QQ，該老師目前沒有文章。
			</p>
		</div>
		<div class="teacherInfoBtn">
				<div class="left">
					<span class="btnM">
						<a href="schedule.html" class="btnText btnText4">
							進入行程
						</a>
					</span>
				</div>
				<div class="right">
					<span class="btnM">
						<a href="specialColumn.php?teacher_no='.$teacherNo.'" class="btnText btnText4">
										進入專欄
									</a>
								</span>
							</div>
					</div>';

	}else{


	
	
	foreach( $article_rows as $i=>$articleRow){
?>

<?php 
	
	
 ?>


					<a href="#"><h3><?php echo $articleRow["ART_TITLE"] ?></h3></a>
					<p>
						<?php echo mb_substr($articleRow["ART_CONTENT_1"],0,100,"utf-8")."..." ?>
					</p>
				</div>
				<div class="teacherInfoBtn">
					<div class="left">
						<span class="btnM">
							<a href="schedule.html" class="btnText btnText4">
								進入行程
							</a>
						</span>
					</div>
					<div class="right">
						<span class="btnM">
							<a href=<?php echo 'specialColumn.php?teacher_no='.$teacherNo ?> class="btnText btnText4">
								進入專欄
							</a>
						</span>
					</div>
					
				</div>
			</div>
	



<?php		
	}
}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>
	
