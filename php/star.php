<?php 
	ob_start();
	session_start();
	$_SESSION["mem_no"] = 1;
	//	$_REQUEST["type"], $_REQUEST["action"], $_REQUEST["target_no"], $_REQUEST["value"]
	require_once('connectBD103G1.php');
	if($_REQUEST["type"] == 'article'){
		$type = 'art';
		$typeStar = $type."_star";
		$typeReview = $type."_review_times";
	}elseif($_REQUEST["type"] == 'products'){
		$type = 'pd';
		$typeStar = $type."_star";
		$typeReview = $type."_review_times";
	}
		$sql = "select * from ".$_REQUEST["type"]." where ".$type."_no = :".$type."_no";
		$check = $pdo->prepare($sql);
		$check->bindValue(":".$type."_no", $_REQUEST["target_no"]);
		$check -> execute();
		$checkRow = $check->fetchObject();
		$star = $checkRow->$typeStar;
	if($_REQUEST["action"] == 'show'){
		
		?>
		<input type="radio" id="star5" name="rating" value="5" class="starIcon" />
		<label class = "full" for="star5" title="Awesome - 5 stars"></label>
		<input type="radio" id="star4" name="rating" value="4" class="starIcon" />
		<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
		<input type="radio" id="star3" name="rating" value="3" class="starIcon" />
		<label class = "full" for="star3" title="Meh - 3 stars"></label>
		<input type="radio" id="star2" name="rating" value="2" class="starIcon" />
		<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
		<input type="radio" id="star1" name="rating" value="1" class="starIcon" />
		<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
		<script type="text/javascript">
			var starIcon = document.querySelectorAll('.starIcon');
			starIcon[5-Math.round(<?php echo $star; ?>)].checked = true;
		</script>


		<?php
	}elseif($_REQUEST["action"] == 'review'){
		$sql = "select * from ".$type."_review where ".$type."_no = :".$type."_no and mem_no = :mem_no";
		$count = $pdo->prepare($sql);
		$count->bindValue(":".$type."_no", $_REQUEST["target_no"]);
		$count->bindValue(":mem_no", $_SESSION["mem_no"]);
		$count -> execute();
		$countRow = $count->fetchObject();
		if($count->rowCount() == 0){
			$sql = "select * from ".$_REQUEST["type"]." where ".$type."_no = :".$type."_no";
			$review = $pdo->prepare($sql);
			$review->bindValue(":".$type."_no", $_REQUEST["target_no"]);
			$review -> execute();
			$reviewRow = $review->fetchObject();
			$value = ($checkRow->$typeStar*$checkRow->$typeReview+$_REQUEST["value"])/($checkRow->$typeReview+1);
			$sql = "update ".$_REQUEST["type"]." set ".$typeReview." = ".$typeReview."+1, ".$typeStar." = :".$typeStar." where ".$type."_no = :".$type."_no";
			$update = $pdo->prepare($sql);
			$update->bindValue(":".$typeStar, $value);
			$update->bindValue(":".$type."_no", $_REQUEST["target_no"] );
			$update -> execute();

			$sql = "insert into ".$type."_review(".$type."_no, mem_no, ".$type."_star) values(:".$type."_no, :mem_no, :value)";
			$insert = $pdo->prepare($sql);
			$insert->bindValue(":value",$_REQUEST["value"]);
			$insert->bindValue(":".$type."_no", $_REQUEST["target_no"]);
			$insert->bindValue(":mem_no",$_SESSION["mem_no"]);
			$insert -> execute();

		}else{
			$sql = "select * from ".$_REQUEST["type"]." where ".$type."_no = :".$type."_no";
			$review = $pdo->prepare($sql);
			$review->bindValue(":".$type."_no", $_REQUEST["target_no"]);
			$review -> execute();
			$reviewRow = $review->fetchObject();
			$value = ($checkRow->$typeStar*$checkRow->$typeReview-$countRow->$typeStar+$_REQUEST["value"])/($checkRow->$typeReview);

			$sql = "update ".$_REQUEST["type"]." set  ".$typeStar." = :".$typeStar." where ".$type."_no = :".$type."_no";
			$update = $pdo->prepare($sql);
			$update->bindValue(":".$typeStar, $value);
			$update->bindValue(":".$type."_no", $_REQUEST["target_no"] );
			$update -> execute();

			$sql = "update ".$type."_review set ".$type."_star = :value where ".$type."_no = :".$type."_no and mem_no = :mem_no" ;
			$update = $pdo->prepare($sql);
			$update->bindValue(":value",$_REQUEST["value"]);
			$update->bindValue(":mem_no",$_SESSION["mem_no"]);
			$update->bindValue(":".$type."_no", $_REQUEST["target_no"]);
			$update -> execute();


		}

		
	}
 ?>