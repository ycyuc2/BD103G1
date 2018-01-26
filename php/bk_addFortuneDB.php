<?php 
	session_start();
	ob_start();
	require_once("connectBD103G1.php");
	$sql = "INSERT into fortune( const, fort_content, fort_content2, karma_inc, recommend_type) 
		values("
		.$_REQUEST["const"].", '"
		.$_REQUEST["fort_content"]."', '"
		.$_REQUEST["fort_content2"]."', "
		.$_REQUEST["karma_inc"].", "
		.$_REQUEST["recommend_type"].")";
	$insert = $pdo->prepare($sql);
	$insert->execute();
	header("Location:bk_fortuneDB.php");
 ?>