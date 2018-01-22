<?php
try {
	require_once("connectBooks.php");
	$sql = "select * from member where memId=:memId";
	$member = $pdo->prepare($sql);
	$member->bindValue(":memId",$_REQUEST["memId"]);
	$member->execute();
	if( $member->rowCount() == 0){
		echo "帳號可用";
	}else{
		echo "帳號已存在，不可用";
	}
} catch (Exception $e) {
  echo "錯誤行號 : ", $e->getLine(), "<br>";
  echo "錯誤訊息 : ", $e->getMessage(), "<br>";	
}

?>