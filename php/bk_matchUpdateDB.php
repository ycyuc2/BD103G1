<?php
ob_start();
session_start();
if(empty($_SESSION["bkLogin"])){
	header('location:../index.php');
}

	require_once("connectBD103G1.php");
	$pairNo = $_REQUEST["pairNo"];
	$pairValue = $_REQUEST["pairValue"];
	$pairContent = $_REQUEST["pairContent"];
	$pairContent2 = $_REQUEST["pairContent2"];

	$sql = "UPDATE pair 
			set pair_value = '".$pairValue."', 
			pair_content = '".$pairContent."', 
			pair_content2 = '".$pairContent2."' 
			where pair_no = $pairNo";
	$update = $pdo->prepare($sql);
	$update->execute();
	header("location:bk_matchDB.php");

 ?>