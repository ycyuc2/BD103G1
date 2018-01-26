<?php 
	require_once("connectBD103G1.php");
	$page = $_REQUEST["page"];
	if ($page == "p1") {
		$sql = "select * from fortune";
		$fortune = $pdo->prepare($sql);
		$fortune->execute();
		$fortune_rows = $fortune->fetchAll(PDO::FETCH_ASSOC);
?>
			<ol class="breadcrumb">
				<li>
					<a href="#">首頁</a>
				</li>
				<li class="active">前端首頁維護</li>
			</ol>

			<ol class="rightNav rightNav3">
				<li><a class="nowAt" href="bk_fortuneDB.html">線上算命資料庫</a></li>
				<li><a href="bk_matchDB.html">配對資料庫</a></li>
			</ol>
			<div class="tr">
				<span class="col no">編號</span>
				<span class="col constel">星座</span>
				<span class="col content1">顯示內文</span>
				<span class="col content2">登入後才顯示之內容</span>
				<span class="col karmaInc">業力增加值</span>
				<span class="col category">推薦類別</span>
				<span class="col alter">修改/刪除</span>
			</div>

<?php 
		foreach ($fortune_rows as $i => $fortuneRow) {
		

?>

			<div class="tr">
				<span class="col no"><?php echo $fortuneRow["fort_no"] ?></span>
				<span class="col constel">
					<?php
						if ($fortuneRow["const"] == 0) {
							echo "摩羯座";
						}else if ($fortuneRow["const"] == 1) {
							echo "水瓶座";
						}else if ($fortuneRow["const"] == 2) {
							echo "雙魚座";
						}else if ($fortuneRow["const"] == 3) {
							echo "牡羊座";
						}else if ($fortuneRow["const"] == 4) {
							echo "金牛座";
						}else if ($fortuneRow["const"] == 5) {
							echo "雙子座";
						}else if ($fortuneRow["const"] == 6) {
							echo "巨蟹座";
						}else if ($fortuneRow["const"] == 7) {
							echo "獅子座";
						}else if ($fortuneRow["const"] == 8) {
							echo "處女座";
						}else if ($fortuneRow["const"] == 9) {
							echo "天秤座";
						}else if ($fortuneRow["const"] == 10) {
							echo "天蠍座";
						}else{
							echo "射手座";
						}
					  ?>
						
				</span>
				<span class="col content1"><?php echo $fortuneRow["fort_content"] ?></span>
				<span class="col content2"><?php echo $fortuneRow["fort_content2"] ?></span>
				<span class="col karmaInc"><?php echo $fortuneRow["karma_inc"] ?></span>
				<span class="col category"><?php echo $fortuneRow["recommend_type"] ?></span>
				<span class="col alter"><a href="#">A</a><a href="#">X</a></span>
			</div>



<?php
	
		}
?>
			<div class="tr">
				<label for="lightBoxControl"><span class="btnS"><p class="btnText btnText2">新增</p></span></label>
			</div>

<?php
	}else if ($page == "p2") {
		
	}else if ($page == "p3") {
		
	}else if ($page == "p4") {
		
	}else if ($page == "p5") {
		
	}else if ($page == "p6") {
		
	}else{

	}
 ?>