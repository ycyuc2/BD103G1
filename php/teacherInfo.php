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
					<fieldset class="rating">
						<input type="radio" id="star5" name="rating" value="5" class="starIcon">
						<label class = "full" for="star5" title="Awesome - 5 stars"></label>
						<input type="radio" id="star4" name="rating" value="4" class="starIcon">
						<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
						<input type="radio" id="star3" name="rating" value="3" class="starIcon">
						<label class = "full" for="star3" title="Meh - 3 stars"></label>
						<input type="radio" id="star2" name="rating" value="2" class="starIcon">
						<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
						<input type="radio" id="star1" name="rating" value="1" class="starIcon">
						<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
					</fieldset>
					<script type="text/javascript">
						var starIcon = document.querySelectorAll('.starIcon');
						for (var i = 0; i < starIcon.length; i++) {
							starIcon[i].addEventListener('click',function () {
								<?php if (isset($_SESSION["mem_no"])) {?>
									var xhttp = new XMLHttpRequest();
									xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											// 燈箱
										}
									};
									xhttp.open("GET", "star.php?type=teacher&action=review&target_no="+<?php echo $teacherNo; ?>+"&value="+this.value);
									xhttp.send();
									
							<?php }else{?>
									document.querySelector('#loginControl').checked = true;
								<?php } ?>
									
							});	//starIcon addEvent end
						}
					</script>
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
	
