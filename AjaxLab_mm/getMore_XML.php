<?php
try{
	require_once("connectBooks.php");
	$sql = "select * from member where memId=:memId";
	$member = $pdo->prepare($sql);
	$member->bindValue(":memId", $_REQUEST["memId"]);
	$member->execute();

  //如果找得資料，取回資料，送出xml文件
	if ($member->rowCount() != 0) {
		$memRow = $member->fetchObject();
		$str = '<?xml version = "1.0" ?>';
		$str .= "<member>";
		$str .= "<memId>" . $memRow -> memId . "</memId>";
		$str .= "<memName>" . $memRow -> memName . "</memName>";
		$str .= "<email>" . $memRow -> email . "</email>";
		$str .= "<birthday>" . $memRow -> birthday . "</birthday>";
		$str .= "</member>";
		header("content-type:text/xml; charset=utf-8");
		echo $str;

	}
}catch(PDOException $e){
  echo $e->getMessage();
}
?>