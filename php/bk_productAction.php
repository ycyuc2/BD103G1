<?php 
	session_start();
	ob_start();
	$pd_no = $_REQUEST["pdNo"];
	require_once("connectBD103G1.php");

	if ($_REQUEST["action"] == "edit") { ?>
		
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>商城維護</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
	<link rel="stylesheet" type="text/css" href="../css/bk_product.css">
	<link rel="stylesheet" type="text/css" href="../css/btn.css">
</head>
<body>
	
	<!-- header -->

	<!-- header end -->
	<div class="wrapper">
		<div class="left">
			<ol class="sideNav">
				<li class="fstNav maintain">網頁維護
					<ol class="innerNav maintain">
						<li><a href="bk_fortuneDB.php">前端首頁維護</a></li>
						<li><a href="bk_forum.php">老師專區維護</a></li>
						<li><a href="bk_product.php">商城維護</a></li>
					</ol>
				</li>
				<li class="fstNav trade">交易管理
					<ol class="innerNav trade">
						<li><a href="bk_trade.php">檢視交易紀錄</a></li>
					</ol>
				</li>
				<li class="fstNav member">會員管理
					<ol class="innerNav member">
						<li><a href="bk_member.php">檢視會員資料</a></li>
						<li><a href="bk_teacherApplication.php">老師資格審核</a></li>
					</ol>
				</li>
			</ol>
		</div>

		<!-- end left -->

		<div class="right">
			<ol class="breadcrumb">
				<li>
					<a href="bk_index.php">首頁</a>
				</li>
				<li class="active">商城維護</li>
			</ol>

			<div class="tr">
				<span class="col no">編號</span>
				<span class="col category">種類</span>
				<span class="col name">名稱</span>
				<span class="col price">價格</span>
				<span class="col sale">特價</span>
				<span class="col stock">庫存</span>
				<span class="col decrement">減少值</span>
				<span class="col stat">狀態</span>
				<span class="col pic">照片</span>
				<span class="col describe">商品敘述</span>
				<span class="col alter">修改/刪除</span>
			</div>	

<?php 
	$sql = "SELECT * from products where pd_no = $pd_no";
	$product = $pdo->prepare($sql);
	$product->execute();
	$product_rows = $product->fetchAll(PDO::FETCH_ASSOC);
	foreach ($product_rows as $i => $productRow) {

 ?>
			<div class="tr">
				<form method="post" action="bk_productUpdate.php" enctype="multipart/form-data">
					<span class="col no"><?php echo $productRow["pd_no"] ?></span>
					<input type="hidden" name="pd_no" value="<?php echo $productRow["pd_no"] ?>">
					<span class="col category">
						<select>
							<option value="">選擇</option>
							<option value="1">飾品類</option>
							<option value="2">擺飾類</option>
							<option value="3">食品類</option>
							<option value="4">文具類</option>
						</select>
					</span>
					<span class="col name">
						<input type="text" name="pd_name" value="<?php echo $productRow["pd_name"] ?>">
					</span>
					<span class="col price">
						<input type="number" name="pd_price" value="<?php echo $productRow["pd_price"] ?>">
					</span>
					<span class="col sale">
						<input type="number" name="pd_sale" value="<?php echo $productRow["pd_sale"] ?>">
					</span>
					<span class="col stock">
						<input type="number" name="pd_stock" value="<?php echo $productRow["pd_stock"] ?>">
					</span>
					<span class="col decrement">
						<input type="number" name="karma_dec" value="<?php echo $productRow["karma_dec"] ?>">
					</span>
					<span class="col stat">
						<input type="radio" name="pd_sta" value="0">下架<br>
						<input type="radio" name="pd_sta" value="1">上架
					</span>
					<span class="col pic">
						<label for="fileInput">請選擇檔案</label>
						<input id="fileInput" type="file" name="pd_pic1">
					</span>
					<span class="col describe">
						<textarea name="pd_describe">
							<?php echo nl2br($productRow["pd_describe"]) ?>
						</textarea>
							
						</span>
					<span class="col alter">
						<input class="btnS btnText btnText2" type="submit" name="" value="完成">
						<a class="btnS btnText btnText2" href="bk_product.php">取消</a>
					</span>
				</form>
			</div>


<?php } ?>
		</div>
	</div>
<script>
	window.addEventListener('load', function(){
		var imgInput = document.getElementById('fileInput');
		var label = document.querySelector('form label');
		
		imgInput.addEventListener('change', function(){
			var fileName = this.value;
			var fileType = fileName.substring(fileName.lastIndexOf('.') + 1, fileName.length);
			label.textContent = '已選擇檔案';
			if (!(fileType == 'jpg' || fileType == 'jpeg' || fileType == 'png' || fileType == 'gif')) {
				alert('檔案格式須為jpg、jpeg、png或gif');
				this.value = null;
				label.textContent = '請選擇檔案';
			}


		});

		


	});	

</script>

<?php
	}else{

	}







 ?>

</body>
</html>
