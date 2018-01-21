<?php 
	require_once("connectBD103G1yu.php");
	$teacherNo = $_REQUEST["teacher_no"];
	$artNo = $_REQUEST["art_no"];
	$sql = "delete from article where teacher_no = $teacherNo and art_no = $artNo";
	$pdo->query($sql);
	header('Location:specialColumn.php?teacher_no='.$teacherNo);



 ?>