<?php 
	session_start();
	ob_start();
 ?>

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
				<span class="col alter">操作</span>
			</div>

<?php 
	require_once("connectBD103G1.php");
	$sql = "SELECT * from products";
	$product = $pdo->prepare($sql);
	$product->execute();
	$product_rows = $product->fetchAll(PDO::FETCH_ASSOC);
	foreach ($product_rows as $i => $productRow) {
?>
			<div class="tr">
				<span class="col no"><?php echo $productRow["pd_no"] ?></span>
				<span class="col category">
					<?php 
						if ($productRow["pd_type"] == 1) {
							echo "飾品";
						}else if ($productRow["pd_type"] == 2) {
							echo "擺飾";
						}else if ($productRow["pd_type"] == 3) {
							echo "食品";
						}else{
							echo "文具";
						}
					
					 ?>
				</span>
				<span class="col name"><?php echo $productRow["pd_name"] ?></span>
				<span class="col price"><?php echo $productRow["pd_price"] ?></span>
				<span class="col sale"><?php echo $productRow["pd_sale"] ?></span>
				<span class="col stock"><?php echo $productRow["pd_stock"] ?></span>
				<span class="col decrement"><?php echo $productRow["karma_dec"] ?></span>
				<span class="col stat">
					<?php 
						if ($productRow["pd_sta"] == 1) {
						 	echo "上架";
						 }else{
						 	echo "下架";
						 }
					 ?>
						
				</span>
				<span class="col pic"><?php echo $productRow["pd_pic1"] ?></span>
				<span class="col describe"><?php echo nl2br($productRow["pd_describe"]) ?></span>
				<span class="col alter"><span class="btnS"><a class="btnText btnText2" href="bk_productAction.php?action=edit&pdNo=<?php echo $productRow["pd_no"] ?>">編輯</a></span>
			</div>

<?php 
}
 ?>
				<div class="tr">
					<label for="lightBoxControl"><span class="btnS"><p class="btnText btnText2">新增</p></span></label>
				</div>
			</div>
		</div>

		<!-- end right -->
		
		<input type="checkbox" id="lightBoxControl">
		<div class="lightBox">
			
			<div class="boxContent">
				<label for="lightBoxControl"><p class="exit">X</p></label>
				<form action="bk_productInsert.php" method="post" enctype="multipart/form-data">
					<p class="input">
						<span>種類</span>
						<span>
							<select name="pd_type" required>
								<option value="">請選擇種類</option>
								<option value="1">飾品類</option>
								<option value="2">擺飾類</option>
								<option value="3">食品類</option>
								<option value="4">文具類</option>
							</select>
						</span>
					</p>
					<p class="input">
						<span>名稱</span>
						<span><input type="text" name="pd_name" required></span>
					</p>
					<p class="input">
						<span>價格</span>
						<span><input type="number" name="pd_price" required></span>
					</p>
					<p class="input">
						<span>特價</span>
						<span><input type="number" name="pd_sale" required></span>
					</p>
					<p class="input">
						<span>庫存</span>
						<span><input type="number" name="pd_stock" required></span>
					</p>
					<p class="input">
						<span>減少值</span>
						<span><input type="number" name="karma_dec" required></span>
					</p>
					<p class="input">
						<span>狀態</span>
						<span>
							<input type="radio" name="pd_sta" value="0">下架
							<input type="radio" name="pd_sta" value="1">上架
						</span>
					</p>
					<p class="input">
						<span>照片</span>
						<span>
							<input id="inputFile" type="file" name="pd_pic1" required>
						</span>
					</p>
					<p class="input">
						<span>商品敘述</span>
						<span>
							<textarea name="pd_describe" required></textarea>
						</span>
					</p>
					<p class="center">
						<span class="btnS"><input type="submit" value="新增" class="btnText btnText2"></span>
						<span class="btnS"><input type="reset" value="重填" class="btnText btnText2"></span></p>
				</form>
			</div>
		</div>
	</div>
<script>
	window.addEventListener('load', function(){
		var imgInput = document.getElementById('inputFile');
		
		imgInput.addEventListener('change', function(){
			var fileName = this.value;
			var fileType = fileName.substring(fileName.lastIndexOf('.') + 1, fileName.length).toLowerCase();
			if (!(fileType == 'jpg' || fileType == 'jpeg' || fileType == 'png' || fileType == 'gif')) {
				alert('檔案格式須為jpg、jpeg、png或gif');
				this.value = null;
			}


		});

		


	});	

</script>
    
</body>
</html>