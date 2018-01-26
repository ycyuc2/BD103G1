<?php 
	session_start();
	ob_start();
	require_once("connectBD103G1.php");
	$sql = "INSERT into pair(pair_value, pair_content, pair_content2) 
			values('"
			.$_REQUEST["pair_value"]."', '"
			.$_REQUEST["pair_content"]."', '"
			.$_REQUEST["pair_content2"]."')";
	$update = $pdo->prepare($sql);
	$update->execute();
	header("Location:bk_matchDB.php");

 ?>