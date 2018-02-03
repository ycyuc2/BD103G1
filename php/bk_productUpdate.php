<?php
ob_start();
session_start();
if(empty($_SESSION["bkLogin"])){
	header('location:../index.php');
}

	require_once("connectBD103G1.php");
	$pd_no = $_REQUEST["pd_no"];


	if( $_FILES["pd_pic1"]["error"] == 0){
		$tmpFileName = strrchr($_FILES["pd_pic1"]["name"],".");
		$uploadFileName =  $pd_no.$tmpFileName;
		$from = $_FILES["pd_pic1"]["tmp_name"];
		$to ="../img/products/".$uploadFileName;
		copy( $from, $to);
	}else{
		$_FILES["pd_pic1"]["name"] = null;
	}


	$sql = "UPDATE products set pd_name = :pd_name, 
								pd_price = :pd_price, 
								pd_sale = :pd_sale, 
								pd_stock = :pd_stock, 
								karma_dec = :karma_dec, 
								pd_sta = :pd_sta, 
								pd_pic1 = :pd_pic1, 
								pd_describe = :pd_describe 
			where pd_no = $pd_no";
	$update = $pdo->prepare($sql);
	$update->bindValue(":pd_name", $_REQUEST["pd_name"]);
	$update->bindValue(":pd_price", $_REQUEST["pd_price"]);
	$update->bindValue(":pd_sale", $_REQUEST["pd_sale"]);
	$update->bindValue(":pd_stock", $_REQUEST["pd_stock"]);
	$update->bindValue(":karma_dec", $_REQUEST["karma_dec"]);
	$update->bindValue(":pd_sta", $_REQUEST["pd_sta"]);
	$update->bindValue(":pd_pic1", $uploadFileName);
	$update->bindValue(":pd_describe", $_REQUEST["pd_describe"]);
	$update->execute();
	header("Location:bk_product.php");





 ?>