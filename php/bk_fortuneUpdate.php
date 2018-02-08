<?php
ob_start();
session_start();
if(empty($_SESSION["bkLogin"])){
	header('location:../index.php');
}
?>
<?php 
	require_once("connectBD103G1.php");
	$fortNo = $_REQUEST["fortNo"];
	$fortContent = $_REQUEST["fortContent1"];
	$fortContent2 = $_REQUEST["fortContent2"];
	$karmaInc = $_REQUEST["karmaInc"];
	$recommendType = $_REQUEST["recommendType"];

	$sql = "UPDATE fortune 
			set fort_content = '".$fortContent."', 
			fort_content2 = '".$fortContent2."', 
			karma_inc = $karmaInc, 
			recommend_type = $recommendType
			where fort_no = $fortNo";
	$update = $pdo->prepare($sql);
	$update->execute();
	header("location:bk_fortuneDB.php");

 ?>