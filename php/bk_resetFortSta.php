<?php 
	
	require_once ("connectBD103G1.php");

	$sql = "UPDATE member set fort_sta = 0 where fort_sta = 1";
	$reset = $pdo->prepare($sql);
	$reset->execute();

	header('location:bk_member.php');
 ?>