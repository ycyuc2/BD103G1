<?php
try{
  require_once("connectBooks.php");
  $sql = "select * from member where memId=:memId";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":memId", $_REQUEST["memId"]);
  $member->execute();
  //如果找得資料,將會員資料送出
  if( $member->rowCount() == 0 ){
    echo "not found~";
  }else{
    $memRow = $member->fetch(PDO::FETCH_ASSOC);
	$str="";
	foreach( $memRow as $i => $data ){
	  $str .= $data . "," ;
	}
	echo $str;
  }	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>