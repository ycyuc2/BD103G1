<?php 
	ob_start();
	session_start();
	require_once("connectBD103G1.php");
	$sql = "insert into member(mem_acc, mem_psw, mem_nn, mem_tel, fort_sta, fort_no, obj_fort_no, karma_val, mem_sta, mem_pic)
			value (:mem_acc, :mem_psw, :mem_nn, :mem_tel, :fort_sta, :fort_no, :obj_fort_no, :karma_val, :mem_sta, :mem_pic)";
	$member = $pdo->prepare($sql);
	$member -> bindValue(":mem_acc",$_POST["mem_acc"]);
	$member -> bindValue(":mem_psw",$_POST["mem_psw"]);
	$member -> bindValue(":mem_nn",$_POST["mem_nn"]);
	$member -> bindValue(":mem_tel",$_POST["mem_tel"]);
	$member -> bindValue(":fort_sta",$_SESSION["fort_sta"]);
	$member -> bindValue(":fort_no",$_SESSION["fort_no"]);
	$member -> bindValue(":obj_fort_no",$_SESSION["obj_fort_no"]);
	$member -> bindValue(":karma_val",$_SESSION["karma_inc"]+100);
	$member -> bindValue(":mem_sta",1);
	$member -> bindValue(":mem_pic", "default.png");
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