<?php 
	ob_start();
	session_start();
	require_once("connectBooks.php");
	$sql = "insert into member(mem_acc, mem_psw, mem_nn, mem_tel, fort_sta, mem_sta)
			value (:mem_acc, :mem_psw, :mem_nn, :mem_tel, :fort_sta, :mem_sta)";
	$member = $pdo->prepare($sql);
	$member -> bindValue(":mem_acc",$_POST["mem_acc"]);
	$member -> bindValue(":mem_psw",$_POST["mem_psw"]);
	$member -> bindValue(":mem_nn",$_POST["mem_nn"]);
	$member -> bindValue(":mem_tel",$_POST["mem_tel"]);
	$member -> bindValue(":fort_sta",$_SESSION["fort_sta"]);
	$member -> bindValue(":mem_sta",1);
	$member -> execute();
	$sql = "select * from member where mem_acc = :mem_acc and mem_psw = :mem_psw";
	$member = $pdo->prepare($sql);
	$member -> bindValue(":mem_acc",$_POST["mem_acc"]);
	$member -> bindValue(":mem_psw",$_POST["mem_psw"]);
	$member -> execute();
	if($member->rowCount() !=0 ){
		$memRow = $member->fetchObject();
		$_SESSION["mem_no"] = $memRow->mem_no;
		$_SESSION["mem_nn"] = $memRow->mem_nn;
	}
	if(isset($_SESSION["where"])){
		$to = $_SESSION["where"];
		$_SESSION["where"] = null;
		header("location:$to");
	}
 ?>