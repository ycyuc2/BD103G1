<?php
	//=====連資料庫，做測試
ob_start();
session_start();
	try{
		require_once("connectBooks.php");
		$sql = "select * from member where memId = :memId and memPsw = :memPsw";
		$member = $pdo->prepare($sql);
		$member -> bindValue(":memId",$_REQUEST["memId"]);
		$member -> bindValue(":memPsw",$_REQUEST["memPsw"]);
		$member -> execute();

		if( $member->rowCount() !=0 ){
		    $memRow = $member->fetchObject();
			echo $memRow->memName;
			//登入成功，將登入者資訊寫入session
    		$_SESSION["memNo"] = $memRow->no;
	        $_SESSION["memId"] = $memRow->memId;
	        $_SESSION["memName"] = $memRow->memName;
	        $_SESSION["email"] = $memRow->email;

	        if(isset($_SESSION['where']) === true){
	        	$to = $_SESSION['where'];
	        	unset($_SESSION['where']);
	        	header("location:$to");
	        }
		}else{
			echo "error";
		}
	}catch(PDOException $ex){
		echo "sqlError";
	}
?>