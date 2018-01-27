<?php 
	ob_start();
	session_start();
	require_once("connectBD103G1.php");
	date_default_timezone_set("Asia/Taipei");
	$sql = "insert into message(mem_no, art_no, msg_content, msg_time, last_view) values(:mem_no, :art_no, :msg_content, :msg_time, :last_view)";
	$msg = $pdo->prepare($sql);
	$msg->bindValue(':mem_no', $_SESSION["mem_no"]);
	$msg->bindValue(':art_no', $_REQUEST["art_no"]);
	$msg->bindValue(':msg_content', $_REQUEST["msg_content"]);
	$msg->bindValue(':msg_time', date("Y-m-d H:i:s"));
	$msg->bindValue(':last_view', date("Y-m-d H:i:s"));
	$msg->execute();
	$sql = "update article set art_update_time = :art_update_time where art_no = :art_no";
	$update = $pdo->prepare($sql);
	$update->bindValue(':art_update_time', date("Y-m-d H:i:s"));
	$update->bindValue(':art_no', $_REQUEST["art_no"]);
	$update->execute();
	header('location:'.$_SESSION['where']);
?>