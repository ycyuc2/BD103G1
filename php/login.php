<?php 
	ob_start();
	session_start();
	if(isset($_SESSION["mem_no"])){
		session_destroy();
		echo '<a href="#">登入/註冊</a>';
	}else{
		$sql = "select * from member where mem_acc = :mem_acc and mem_psw = :mem_psw";
		$member = $pdo->prepare($sql);
		$member -> bindValue(":mem_acc",$_GET["mem_acc"]);
		$member -> bindValue(":mem_psw",$_GET["mem_psw"]);
		$member -> execute();
		if($member->rowCount() !=0 ){
		    $memRow = $member->fetchObject();
		    $_SESSION["mem_no"] = $memRow->mem_no;
		    $_SESSION["mem_nn"] = $memRow->mem_nn;
		    echo '<p>'.$_SESSION["mem_nn"]. '您好</p>';
		}else{
			echo '<a href="#">登入/註冊</a>';
		}
	}
	
 ?>