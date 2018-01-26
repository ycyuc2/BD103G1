<?php 
	session_start();
	ob_start();
	require_once("connectBD103G1.php");
	$sql = "DELETE from article where art_no = ".$_REQUEST["artNo"];
	$delete = $pdo->prepare($sql);
	$delete->execute();
	header("Location:bk_forum.php");
 ?>