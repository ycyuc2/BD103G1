<?php 
	ob_start();
	session_start();
	require_once("connectBD103G1.php");
	
	//$_GET["data_type"], $_GET["singleConstelation"]
	if (empty($_SESSION["fort_sta"])) {
		$_SESSION["fort_sta"] = 1;
	}
	if (isset($_SESSION["mem_no"])) {
			$sql = "update member set fort_sta = :fort_sta where mem_no = :mem_no";
			$member = $pdo->prepare($sql);
			$member -> bindValue(":fort_sta",$_SESSION["fort_sta"]);
			$member -> bindValue(":mem_no",$_SESSION["mem_no"]);
			$member -> execute();
		}
		


	$singleConstelation =$_GET["singleConstelation"]; // 0~11的星座
	$constelation = array("摩羯座", "水瓶座", "雙魚座", "牡羊座", "金牛座", "雙子座", "巨蟹座", "獅子座", "處女座", "天秤座", "天蠍座", "射手座");	// 數字轉文字陣列


	echo $_GET["data_type"];
	if ($_GET["data_type"] == 1) {
		echo '<img src="../img/index/star/'.$singleConstelation.'.png" alt="star" class="star">';
		if(empty($_SESSION["fort_no"])){
			$sql = "select * from fortune where const = :const";
		}
		else{
			$sql = "select * from fortune where fort_no = :fort_no";
		}
		$fortune = $pdo->prepare($sql);
		if(empty($_SESSION["fort_no"])){
			$fortune -> bindValue(":const",$singleConstelation);
		}
		else{
			$fortune -> bindValue(":fort_no",$_SESSION["fort_no"]);
		}
		$fortune -> execute();
		$fortRows = $fortune->fetchAll();
		$fortNo = randomNo( $fortune -> rowCount() );
		if (empty($_SESSION["fort_no"])) {
			$_SESSION["karma_inc"] = $fortRows[$fortNo[0]]["karma_inc"];
			$_SESSION["fort_no"] = $fortRows[$fortNo[0]]["fort_no"];
		}else{
			$fortNo[0] = 0;
		}
		
		?>

		<div class="singleResult result">
			<div class="resultFrame"></div>
			<div class="resultTitle">
				<img class="titleImg" src="../img/index/text/4.png" alt="感受自己的靈魂狀態">
				<p><?php echo $constelation[$singleConstelation]; ?></p>
				<p>整體：<?php
					echo karmaShow($fortRows[$fortNo[0]]["karma_inc"]);/*大吉0 吉0~50 兇50~100 大兇200*/ 
				?></p>
			</div>
			<img class="titleImg" src="../img/index/text/5.png" alt="首當其衝!靈力透視!">
			<p class="text"><?php echo $fortRows[$fortNo[0]]["fort_content"];?></p>
			<img class="titleImg" src="../img/index/text/6.png" alt="令人畏懼的準確預言">
			<?php if(empty($_SESSION["mem_no"])){?>
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand" >立即登入查看結果</span></label>
			</p>
			<?php }else{ ?>
				<p class="text"><?php echo $fortRows[$fortNo[0]]["fort_content2"];?></p>
			<?php } ?>
			<img class="titleImg" src="../img/index/text/7.png" alt="解開你的迷惘">
			<div class="item">
				<?php 
					$sql = "select * from teacher";

					$teacher = $pdo->prepare($sql);
					$teacher -> execute();
					$teacherRow = $teacher->fetchAll();
					$randomTeacher = randomNo($teacher->rowCount());
				 ?>
				<p>精準算命老師</p>
				<img src="<?php echo '../img/findTeacher/'.$teacherRow[$randomTeacher[0]]['teacher_img']; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $teacherRow[$randomTeacher[0]]["teacher_nn"]; ?></p>
					<p class="itemIntro"><?php echo mb_substr($teacherRow[$randomTeacher[0]]["teacher_info"],0,70,"utf-8").'...'; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="specialColumn.php?teacher_no="+<?php echo $teacherRow[$randomTeacher[0]]["teacher_no"]; ?>'>進入專欄</span></span>
				</div>
			</div>
			<div class="item">
				<?php 
					$sql = "select * from products where pd_type = :pd_type";
					$products = $pdo->prepare($sql);
					$products ->bindValue(':pd_type', $fortRows[$fortNo[0]]["recommend_type"]);
					$products -> execute();
					$productsRow = $products->fetchObject();
				 ?>
				<p>專屬必需品</p>
				<img src="<?php echo '../img/products/'.$productsRow->pd_pic1; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $productsRow->pd_name; ?></p>
					<p class="itemIntro"><?php echo mb_substr($productsRow->pd_describe,0,50,"utf-8"); ?>...</p>
					<p class="itemPrice">特價：<?php echo $productsRow->pd_sale; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="dozen_storedetail.php?pd_no="+<?php echo $productsRow->pd_no; ?>'>直接購買</span></span>
				</div>
			</div>
		</div>

		<?php


		//   ----------------------   pair   -------------------------------


	}else{		
		$pairConstelation =$_GET["pairConstelation"];
		echo '<img src="../img/index/star/'.$singleConstelation.'.png" alt="star" class="star">';
			//	single
		if(empty($_SESSION["fort_no"])){
			$sql = "select * from fortune where const = :const";
			$fortune = $pdo->prepare($sql);
			$fortune -> bindValue(":const",$singleConstelation);
		}
		else{
			$sql = "select * from fortune where fort_no = :fort_no";
			$fortune = $pdo->prepare($sql);
			$fortune -> bindValue(":fort_no",$_SESSION["fort_no"]);
		}
		$fortune -> execute();
		$singleFortRows = $fortune->fetchAll();
		$fortNo = randomNo( $fortune -> rowCount() );
		if (empty($_SESSION["fort_no"])) {
			$_SESSION["karma_inc"] = $singleFortRows[$fortNo[0]]["karma_inc"];
			$_SESSION["fort_no"] = $singleFortRows[$fortNo[0]]["fort_no"];
		}else{
			$fortNo[0] = 0;
		}
			//	pair
		if(empty($_SESSION["obj_fort_no"])){
			$sql = "select * from fortune where const = :const";
			$fortune = $pdo->prepare($sql);
			$fortune -> bindValue(":const",$pairConstelation);
		}
		else{
			$sql = "select * from fortune where fort_no = :obj_fort_no";
			$fortune = $pdo->prepare($sql);
			$fortune -> bindValue(":obj_fort_no",$_SESSION["obj_fort_no"]);
		}
		$fortune -> execute();
		$pairFortRows = $fortune->fetchAll();
		if (empty($_SESSION["obj_fort_no"])) {
			$_SESSION["obj_fort_no"] = $pairFortRows[$fortNo[1]]["fort_no"];
		}else{
			$fortNo[1] = 0;
		}
		
		?>
		<div class="matchResult result">
			<div class="resultFrame"></div>
			<div class="resultTitle">
				<img class="titleImg" src="../img/index/text/1.png" alt="命運之輪已悄悄轉動">
				<p>速配指數：100%</p>
				<p>整體：吉</p>
			</div>
			<img class="titleImg" src="../img/index/text/2.png" alt="透過點算，建立兩人間的連結">
			<p class="text">天秤是好的開創者，但不能有始有終，牡羊正好可以彌補這個缺點，若雙方都能展現自己的長才，當天秤與牡羊一同處理危機時，可以說是無往不利。在交往後，就算兩個人只是做自己，都能成為相當登對的情人。但如果是在交往前，事情可就沒有那麼簡單了！ 由於天秤跟牡羊是對立的兩個星座，在還未了解對方以前，就算有一方偷偷暗戀對方，另外一方肯定因為習慣及個性的差距對這個人敬而遠之，很容易因為雙方在個性上沒有交集而不了了之。</p>
			<img class="titleImg" src="../img/index/text/3.png" alt="驚愕!見證預言瞬間">
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand">立即登入查看結果</span></label>
			</p>
		</div>


		<div class="singleResult result">
			<div class="resultFrame"></div>
			<div class="resultTitle">
				<img class="titleImg" src="../img/index/text/4.png" alt="感受自己的靈魂狀態">
				<p><?php echo $constelation[$singleConstelation]; ?></p>
				<p>整體：<?php
					echo karmaShow($singleFortRows[$fortNo[0]]["karma_inc"]);/*大吉0 吉0~50 兇50~100 大兇200*/ 
				?></p>
			</div>
			<img class="titleImg" src="../img/index/text/5.png" alt="首當其衝!靈力透視!">
			<p class="text"><?php echo $singleFortRows[$fortNo[0]]["fort_content"];?></p>
			<img class="titleImg" src="../img/index/text/6.png" alt="令人畏懼的準確預言">
			<?php if(empty($_SESSION["mem_no"])){?>
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand" >立即登入查看結果</span></label>
			</p>
			<?php }else{ ?>
				<p class="text"><?php echo $singleFortRows[$fortNo[0]]["fort_content2"];?></p>
			<?php } ?>
			<img class="titleImg" src="../img/index/text/7.png" alt="解開你的迷惘">
			<div class="item">
				<?php 
					$sql = "select * from teacher";

					$teacher = $pdo->prepare($sql);
					$teacher -> execute();
					$teacherRow = $teacher->fetchAll();
					$randomTeacher = randomNo($teacher->rowCount());
				 ?>
				<p>精準算命老師</p>
				<img src="<?php echo '../img/findTeacher/'.$teacherRow[$randomTeacher[0]]['teacher_img']; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $teacherRow[$randomTeacher[0]]["teacher_nn"]; ?></p>
					<p class="itemIntro"><?php echo mb_substr($teacherRow[$randomTeacher[0]]["teacher_info"],0,70,"utf-8").'...'; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="specialColumn.php?teacher_no="+<?php echo $teacherRow[$randomTeacher[0]]["teacher_no"]; ?>'>進入專欄</span></span>
				</div>
			</div>
			<div class="item">
				<?php 
					$sql = "select * from products where pd_type = :pd_type";
					$products = $pdo->prepare($sql);
					$products ->bindValue(':pd_type', $singleFortRows[$fortNo[0]]["recommend_type"]);
					$products ->execute();
					$productsRow = $products->fetchObject();
				 ?>
				<p>專屬必需品</p>
				<img src="<?php echo '../img/products/'.$productsRow->pd_pic1; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $productsRow->pd_name; ?></p>
					<p class="itemIntro"><?php echo mb_substr($productsRow->pd_describe,0,50,"utf-8"); ?>...</p>
					<p class="itemPrice">特價：<?php echo $productsRow->pd_sale; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="dozen_storedetail.php?pd_no="+<?php echo $productsRow->pd_no; ?>'>直接購買</span></span>
				</div>
			</div>
		</div>


		<div class="pairResult result">
			<div class="resultFrame"></div>
			<div class="resultTitle">
				<img class="titleImg" src="../img/index/text/8.png" alt="那個人的心靈特徵">
				<p><?php echo $constelation[$pairConstelation]; ?></p>
				<p>整體：<?php echo karmaShow($pairFortRows[$fortNo[1]]["karma_inc"]);/*大吉0 吉0~50 兇50~100 大兇200*/?></p>
			</div>
			<img class="titleImg" src="../img/index/text/9.png" alt="光譜兩端，兩人間的聯繫">
			<p class="text"><?php echo $pairFortRows[$fortNo[1]]["fort_content"];?></p>
			<img class="titleImg" src="../img/index/text/10.png" alt="毫無贅言!直擊他的內在!">
			<?php if(empty($_SESSION["mem_no"])){?>
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand" >立即登入查看結果</span></label>
			</p>
			<?php }else{ ?>
				<p class="text"><?php echo $pairFortRows[$fortNo[1]]["fort_content2"];?></p>
			<?php } ?>
			<img class="titleImg" src="../img/index/text/11.png" alt="兩人間的阻礙">
			<div class="item">
				<p>精準算命老師</p>
				<img src="<?php echo '../img/findTeacher/'.$teacherRow[$randomTeacher[1]]['teacher_img']; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $teacherRow[$randomTeacher[1]]["teacher_nn"]; ?></p>
					<p class="itemIntro"><?php echo mb_substr($teacherRow[$randomTeacher[1]]["teacher_info"],0,70,"utf-8").'...'; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="specialColumn.php?teacher_no="+<?php echo $teacherRow[$randomTeacher[1]]["teacher_no"]; ?>'>進入專欄</span></span>
				</div>
			</div>
			<div class="item">
				<?php 
					$sql = "select * from products where pd_type = :pd_type";
					$products = $pdo->prepare($sql);
					$products ->bindValue(':pd_type', $pairFortRows[$fortNo[1]]["recommend_type"]);
					$products ->execute();
					$productsRow = $products->fetchObject();
				 ?>
				<p>專屬必需品</p>
				<img src="<?php echo '../img/products/'.$productsRow->pd_pic1; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $productsRow->pd_name; ?></p>
					<p class="itemIntro"><?php echo mb_substr($productsRow->pd_describe,0,50,"utf-8"); ?>...</p>
					<p class="itemPrice">特價：<?php echo $productsRow->pd_sale; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="dozen_storedetail.php?pd_no="+<?php echo $productsRow->pd_no; ?>'>直接購買</span></span>
				</div>
			</div>
		</div>
	<?php }



	function constelation($birthday){
		$intBirthday = intVal($birthday);
		
	}
	function randomNo($value){
		for ($i=0; $i < $value; $i++){ 
			$randomNo[] = $i;
		}
		shuffle($randomNo);
		return $randomNo;
	}

	function karmaShow($karma){
		if($karma <= 0) {
			return '大吉';
		}elseif ($karma <= 50){
			return '吉';
		}elseif ($karma <= 100){
			return '凶';
		}else{
			return '大凶';
		}
	}

?>
	


