<?php 
$teacherNo = $_REQUEST["teacher_no"];
try {
	require_once("connectBD103G1.php");
	$sql = "SELECT * FROM teacher t join member m on t.mem_no = m.mem_no where t.teacher_app = 1 and teacher_no = :teacher_no";
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

						<?php echo '<img src="../img/member/',$teacherRow["mem_pic"],'" alt="">' ?>
						
					</div>
				</div>
				<div class="authorIntro">
					<h2><?php echo $teacherRow["teacher_nn"] ?></h2>
					<p><?php echo mb_substr($teacherRow["teacher_info"],0,50,"utf-8")."..." ?></p>
					
				</div>
			</div>

			<div class="teacherColumn">
				<p>最新文章</p>
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
	require_once("connectBD103G1.php");
	$sql = "select * from article where teacher_no = :teacher_no and art_post_time = (
			select max(art_post_time) from article where teacher_no = :teacher_no
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

					<?php echo '<a href="article.php?art_no='.$articleRow["art_no"].'"' ?>
						<h3><?php echo $articleRow["art_title"] ?></h3>
					</a>
					<p>
						<?php echo mb_substr($articleRow["art_content_1"],0,100,"utf-8")."..." ?>
					</p>
				</div>
				<div class="teacherInfoBtn">
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
	
