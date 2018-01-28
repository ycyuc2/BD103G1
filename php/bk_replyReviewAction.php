<?php 
	session_start();
	ob_start();
	require_once("connectBD103G1.php");
	$msgNo = $_REQUEST["msgNo"];
	$memNo = $_REQUEST["memNo"];
	if ($_REQUEST["action"] == "delete") {
		$sql = "DELETE from message where msg_no = $msgNo";
		$delete = $pdo->prepare($sql);
		$delete->execute();


	}else{
		$sql = "DELETE from msg_report where mem_no = $memNo and msg_no = $msgNo";
		$keep = $pdo->prepare($sql);
		$keep->execute();

	}
	header("Location:bk_replyReview.php");

 ?>