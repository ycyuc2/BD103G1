<?php
ob_start();
session_start();
if(empty($_SESSION["bkLogin"])){
	header('location:../index.php');
}
?>
<?php 
	require_once("connectBD103G1.php");
	$sql = "DELETE from article where art_no = ".$_REQUEST["artNo"];
	$delete = $pdo->prepare($sql);
	$delete->execute();
	header("Location:bk_forum.php");
 ?>