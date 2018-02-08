<?php
ob_start();
session_start();
if(empty($_SESSION["bkLogin"])){
	header('location:../index.php');
}

	require_once("connectBD103G1.php");
	$sql = "SELECT MAX(pd_no) pd_no from products";
	$products = $pdo->query($sql);
	while ($prodRow = $products->fetch()) {
		$newPdNo = $prodRow["pd_no"] + 1;

	}


	if( $_FILES["pd_pic1"]["error"] == 0){
		$tmpFileName = strrchr($_FILES["pd_pic1"]["name"],".");
		$uploadFileName =  $newPdNo.$tmpFileName;
		$from = $_FILES["pd_pic1"]["tmp_name"];
		$to ="../img/products/".$uploadFileName;
		copy( $from, $to);
	}else{
		$_FILES["pd_pic1"]["name"] = null;
	}

	$sql = "INSERT into products (pd_type, pd_name, pd_price, pd_sale, pd_stock, karma_dec, pd_sta, pd_pic1, pd_describe) values (:pd_type, :pd_name, :pd_price, :pd_sale, :pd_stock, :karma_dec, :pd_sta, :pd_pic1, :pd_describe)";
	$insert = $pdo->prepare($sql);
	$insert->bindValue(":pd_type", $_REQUEST["pd_type"]);
	$insert->bindValue(":pd_name", $_REQUEST["pd_name"]);
	$insert->bindValue(":pd_price", $_REQUEST["pd_price"]);
	$insert->bindValue(":pd_sale", $_REQUEST["pd_sale"]);
	$insert->bindValue(":pd_stock", $_REQUEST["pd_stock"]);
	$insert->bindValue(":karma_dec", $_REQUEST["karma_dec"]);
	$insert->bindValue(":pd_sta", $_REQUEST["pd_sta"]);
	$insert->bindValue(":pd_pic1", $uploadFileName);
	$insert->bindValue(":pd_describe", $_REQUEST["pd_describe"]);
	$insert->execute();
	header("Location:bk_product.php");
 ?>