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
	$constelation = array("摩羯座", "水瓶座", "雙魚座", "牧羊座", "金牛座", "雙子座", "巨蟹座", "獅子座", "處女座", "天秤座", "天蠍座", "射手座");	// 數字轉文字陣列


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
			$_SESSION["fort_no"] = $fortRows[$fortNo[0]]["fort_no"];
		}else{
			$fortNo[0] = 0;
		}
		
		?>

		<div class="singleResult result">
			<div class="resultFrame"></div>
			<div class="resultTitle">
				<p class="title">我的結果</p>
				<p><?php echo $constelation[$singleConstelation]; ?></p>
				<p>整體：<?php 
					$_SESSION["karma_inc"] = $fortRows[$fortNo[0]]["karma_inc"];
					echo karmaShow($_SESSION["karma_inc"]);/*大吉0 吉0~50 兇50~100 大兇200*/ 
				?></p>
			</div>
			<p class="subtitle title">神準之算，扣緊你心</p>
			<p class="text"><?php echo $fortRows[$fortNo[0]]["fort_content"];?></p>
			<p class="subtitle title">你的致命弱點與優勢！</p>
			<?php if(empty($_SESSION["mem_no"])){?>
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand" >立即登入查看結果</span></label>
			</p>
			<?php }else{ ?>
				<p class="text"><?php echo $fortRows[$fortNo[0]]["fort_content2"];?></p>
			<?php } ?>
			<p class="subtitle title">為你的戀愛開運</p>
			<div class="item">
				<?php 
					$sql = "select * from teacher";

					$teacher = $pdo->prepare($sql);
					$teacher -> execute();
					$teacherRow = $teacher->fetchAll();
					$randomTeacher = randomNo($teacher->rowCount());
				 ?>
				<p>精準算命老師</p>
				<img src="<?php echo $teacherRow[$randomTeacher[0]]['teacher_img']; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $teacherRow[$randomTeacher[0]]["teacher_nn"]; ?></p>
					<p class="itemIntro">簡介:<?php echo $teacherRow[$randomTeacher[0]]["teacher_info"]; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="specialColumn.php?teacher_no="+<?php echo $teacherRow[$randomTeacher[0]]["teacher_no"]; ?>'>進入專欄</span></span>
				</div>
			</div>
			<div class="item">
				<?php 
					$sql = "select * from products";
					$products = $pdo->prepare($sql);
					$products -> execute();
					$productsRow = $products->fetchAll();
					$randomproducts = randomNo($products->rowCount());
				 ?>
				<p>象徵之幸運物</p>
				<img src="<?php echo $productsRow[$randomproducts[0]]["pd_pic1"]; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $productsRow[$randomproducts[0]]["pd_name"]; ?></p>
					<p class="itemIntro"><?php echo $productsRow[$randomproducts[0]]["pd_describe"]; ?>...</p>
					<p class="itemPrice">原價：<?php echo $productsRow[$randomproducts[0]]["pd_sale"]; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="dozen_storedetail.php?pd_no="+<?php echo $productsRow[$randomproducts[0]]["pd_no"]; ?>'>直接購買</span></span>
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
				<p class="title">你與他</p>
				<p>速配指數：100%</p>
				<p>整體：吉</p>
			</div>
			<p class="subtitle title">你真的了解他嗎</p>
			<p class="subtitle title">你最該知道的事</p>
			<p class="text">天秤是好的開創者，但不能有始有終，牡羊正好可以彌補這個缺點，若雙方都能展現自己的長才，當天秤與牡羊一同處理危機時，可以說是無往不利。在交往後，就算兩個人只是做自己，都能成為相當登對的情人。但如果是在交往前，事情可就沒有那麼簡單了！ 由於天秤跟牡羊是對立的兩個星座，在還未了解對方以前，就算有一方偷偷暗戀對方，另外一方肯定因為習慣及個性的差距對這個人敬而遠之，很容易因為雙方在個性上沒有交集而不了了之。</p>
			<p class="subtitle title">怎樣才能成就幸福?</p>
			<p class="subtitle title">若瞭解幸福就掌握在你手中</p>
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand">立即登入查看結果</span></label>
			</p>
		</div>


		<div class="singleResult result">
			<div class="resultFrame"></div>
			<div class="resultTitle">
				<p class="title">我的結果</p>
				<p><?php echo $constelation[$singleConstelation]; ?></p>
				<p>整體：<?php 
					$_SESSION["karma_inc"] = $singleFortRows[$fortNo[0]]["karma_inc"];
					echo karmaShow($_SESSION["karma_inc"]);/*大吉0 吉0~50 兇50~100 大兇200*/ 
				?></p>
			</div>
			<p class="subtitle title">神準之算，扣緊你心</p>
			<p class="text"><?php echo $singleFortRows[$fortNo[0]]["fort_content"];?></p>
			<p class="subtitle title">你的致命弱點與優勢！</p>
			<?php if(empty($_SESSION["mem_no"])){?>
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand" >立即登入查看結果</span></label>
			</p>
			<?php }else{ ?>
				<p class="text"><?php echo $singleFortRows[$fortNo[0]]["fort_content2"];?></p>
			<?php } ?>
			<p class="subtitle title">為你的戀愛開運</p>
			<div class="item">
				<?php 
					$sql = "select * from teacher";

					$teacher = $pdo->prepare($sql);
					$teacher -> execute();
					$teacherRow = $teacher->fetchAll();
					$randomTeacher = randomNo($teacher->rowCount());
				 ?>
				<p>精準算命老師</p>
				<img src="<?php echo $teacherRow[$randomTeacher[0]]['teacher_img']; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $teacherRow[$randomTeacher[0]]["teacher_nn"]; ?></p>
					<p class="itemIntro">簡介:<?php echo $teacherRow[$randomTeacher[0]]["teacher_info"]; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="specialColumn.php?teacher_no="+<?php echo $teacherRow[$randomTeacher[0]]["teacher_no"]; ?>'>進入專欄</span></span>
				</div>
			</div>
			<div class="item">
				<?php 
					$sql = "select * from products";
					$products = $pdo->prepare($sql);
					$products -> execute();
					$productsRow = $products->fetchAll();
					$randomproducts = randomNo($products->rowCount());
				 ?>
				<p>象徵之幸運物</p>
				<img src="<?php echo $productsRow[$randomproducts[0]]["pd_pic1"]; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $productsRow[$randomproducts[0]]["pd_name"]; ?></p>
					<p class="itemIntro"><?php echo $productsRow[$randomproducts[0]]["pd_describe"]; ?>...</p>
					<p class="itemPrice">原價：<?php echo $productsRow[$randomproducts[0]]["pd_sale"]; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="dozen_storedetail.php?pd_no="+<?php echo $productsRow[$randomproducts[0]]["pd_no"]; ?>'>直接購買</span></span>
				</div>
			</div>
		</div>


		<div class="pairResult result">
			<div class="resultFrame"></div>
			<div class="resultTitle">
				<p class="title">你的他</p>
				<p><?php echo $constelation[$pairConstelation]; ?></p>
				<p>整體：<?php echo karmaShow($pairFortRows[$fortNo[1]]["karma_inc"]);/*大吉0 吉0~50 兇50~100 大兇200*/?></p>
			</div>
			<p class="subtitle title">神準之算，扣緊你心</p>
			<p class="text"><?php echo $pairFortRows[$fortNo[1]]["fort_content"];?></p>
			<p class="subtitle title">你的致命弱點與優勢！</p>
			<?php if(empty($_SESSION["mem_no"])){?>
			<p class="blur">
				<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
				<label for="loginControl"><span class="payLogin cursorHand" >立即登入查看結果</span></label>
			</p>
			<?php }else{ ?>
				<p class="text"><?php echo $pairFortRows[$fortNo[1]]["fort_content2"];?></p>
			<?php } ?>
			<p class="subtitle title">為你的戀愛開運</p>
			<div class="item">
				<p>精準算命老師</p>
				<img src="<?php echo $teacherRow[$randomTeacher[1]]['teacher_img']; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $teacherRow[$randomTeacher[1]]["teacher_nn"]; ?></p>
					<p class="itemIntro">簡介:<?php echo $teacherRow[$randomTeacher[1]]["teacher_info"]; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="specialColumn.php?teacher_no="+<?php echo $teacherRow[$randomTeacher[1]]["teacher_no"]; ?>'>進入專欄</span></span>
				</div>
			</div>
			<div class="item">
				<p>象徵之幸運物</p>
				<img src="<?php echo $productsRow[$randomproducts[1]]["pd_pic1"]; ?>" class="itemLeft"></img>
				<div class="itemRight">
					<p class="itemName"><?php echo $productsRow[$randomproducts[1]]["pd_name"]; ?></p>
					<p class="itemIntro"><?php echo $productsRow[$randomproducts[1]]["pd_describe"]; ?>...</p>
					<p class="itemPrice">原價：<?php echo $productsRow[$randomproducts[1]]["pd_sale"]; ?></p>
					<span class="btnS"><span class="btnText btnText4 cursorHand" onclick='document.location.href="dozen_storedetail.php?pd_no="+<?php echo $productsRow[$randomproducts[1]]["pd_no"]; ?>'>直接購買</span></span>
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
		}elseif ($karma < 50){
			return '吉';
		}elseif ($karma < 100){
			return '凶';
		}else{
			return '大凶';
		}
	}

?>
<?php 
	


/*
<div class="matchResult result">
<div class="resultFrame"></div>
<div class="resultTitle">
	<p class="title">你與他</p>
	<p>速配指數：100%</p>
	<p>整體：吉</p>
</div>
<p class="subtitle title">你真的了解他嗎</p>
<p class="subtitle title">你最該知道的事</p>
<p class="text">天秤是好的開創者，但不能有始有終，牡羊正好可以彌補這個缺點，若雙方都能展現自己的長才，當天秤與牡羊一同處理危機時，可以說是無往不利。在交往後，就算兩個人只是做自己，都能成為相當登對的情人。但如果是在交往前，事情可就沒有那麼簡單了！ 由於天秤跟牡羊是對立的兩個星座，在還未了解對方以前，就算有一方偷偷暗戀對方，另外一方肯定因為習慣及個性的差距對這個人敬而遠之，很容易因為雙方在個性上沒有交集而不了了之。</p>
<p class="subtitle title">怎樣才能成就幸福?</p>
<p class="subtitle title">若瞭解幸福就掌握在你手中</p>
<p class="blur">
	<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
	<span class="payLogin cursorHand">立即登入查看結果</span>
</p>
</div>
<div class="singleResult result">
	<div class="resultFrame"></div>
	<div class="resultTitle">
	<p class="title">我的結果</p>
	<p>天秤座</p>
	<p>生日:1995年10月12日</p>
	<p>整體：吉</p>
</div>
<p class="subtitle title">神準之算，扣緊你心</p>
<p class="text">天秤座並不受這次水星逆行的影響，最近的工作應該可以得心應手！但光是靠近期的好運勢不夠的，如果同儕間有競爭關係，須提防最近突然跟你親近的同事，尤其是身旁的天蠍與巨 蟹，他們很有可能在最後一刻才露出真面目，把你苦心經營的功勞一口氣搶走！身邊有礦石類的飾品的話，趕快戴起來，別讓最近的好運功虧一簣！</p>
<p class="subtitle title">你的致命弱點與優勢！</p>
<p class="blur">
	<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
	<span class="payLogin cursorHand">立即登入查看結果</span>
</p>
<p class="subtitle title">為你的戀愛開運</p>
<div class="item">
	<p>精準算命老師</p>
	<img src="../img/index/horseman.jpg" class="itemLeft"></img>
	<div class="itemRight">
		<p class="itemName">ＸＸＸ老師</p>
		<p class="itemDistant">距離現在的你：5km</p>
		<p class="itemIntro">簡介:前中原大學占星社社長，因其對星座算命有著獨到的見解，且本身有著可以預測未來的天命，在2014年多次成功預測天災。</p>
		<span class="btnS"><span class="btnText btnText4 cursorHand">進入專欄</span></span>
	</div>
</div>
<div class="item">
	<p>象徵之幸運物</p>
	<img src="../img/products/02.jpg" class="itemLeft"></img>
	<div class="itemRight">
		<p class="itemName">鑽石</p>
		<p class="itemIntro">簡介：名稱來自於希臘語「ADAMAS」-不能征服的東西。它是地球上硬度最高的物質...</p>
		<p class="itemPrice">原價：2000</p>
		<span class="btnS"><span class="btnText btnText4 cursorHand">直接購買</span></span>
	</div>
</div>
</div>
<div class="pairResult result">
	<div class="resultFrame"></div>
	<div class="resultTitle">
	<p class="title">你的他</p>
	<p>牡羊座</p>
	<p>生日:1995年4月7日</p>
	<p>整體：吉</p>
</div>
<p class="subtitle title">神準之算，扣緊你心</p>
<p class="text">牡羊座是受到水星逆行干擾最嚴重的星座之一，主管、同事、甚至下屬都有可能突然桶一刀，但無論怎樣，好像都是無謂的掙扎。這樣的情況似乎尚未到達顛峰，甚至還有惡化的可能。周圍的天秤、牡羊都算是可以信賴的朋友，對牡羊的運勢有好的影響，別離他們太遠！近期多接觸與海洋有關的事物可以有效減緩這樣的情形。</p>
<p class="subtitle title">你的致命弱點與優勢！</p>
<p class="blur">
	<img src="../img/index/blur_words_666H200.png" alt="模糊文字" class="blurImg">
	<span class="payLogin cursorHand">立即登入查看結果</span>
</p>
<p class="subtitle title">終極絕招!開運法</p>
<div class="item">
	<p>精準算命老師</p>
	<img src="../img/index/horseman.jpg" class="itemLeft"></img>
	<div class="itemRight">
		<p class="itemName">ＸＸＸ老師</p>
		<p class="itemDistant">距離現在的你：5km</p>
		<p class="itemIntro">簡介:前中原大學占星社社長，因其對星座算命有著獨到的見解，且本身有著可以預測未來的天命，在2014年多次成功預測天災。</p>
		<span class="btnS"><span class="btnText btnText4 cursorHand">進入專欄</span></span>
	</div>
</div>
<div class="item">
	<p>象徵之幸運物</p>
	<img src="../img/products/02.jpg" class="itemLeft"></img>
	<div class="itemRight">
		<p class="itemName">鑽石</p>
		<p class="itemIntro">簡介：名稱來自於希臘語「ADAMAS」-不能征服的東西。它是地球上硬度最高的物質...</p>
		<p class="itemPrice">原價：2000</p>
		<span class="btnS"><span class="btnText btnText4 cursorHand">直接購買</span></span>
	</div>
</div>
</div>

*/ ?>