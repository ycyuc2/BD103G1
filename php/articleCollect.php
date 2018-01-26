<?php
ob_start();
session_start();
try{
    //$_REQUEST["art_no"]
    require_once("connectBD103G1.php");
    date_default_timezone_set("Asia/Taipei");
    $sql = "select * from art_collection where mem_no = :mem_no and art_no = :art_no";
    $artCollect = $pdo->prepare($sql);
    $artCollect->bindValue(':mem_no', $_SESSION["mem_no"]);
    $artCollect->bindValue(':art_no', $_REQUEST["art_no"]);
    $artCollect->execute();
    if( $artCollect->rowCount() == 0 ){
        $sql = "insert into art_collection(mem_no, art_no, last_view) values(:mem_no, :art_no, :last_view) ";
        $artInsert = $pdo->prepare($sql);
        $artInsert->bindValue(':mem_no', $_SESSION["mem_no"]);
        $artInsert->bindValue(':art_no', $_REQUEST["art_no"]);
        $artInsert->bindValue(':last_view', date("YmdHis"));
        $artInsert->execute();
        echo "已收藏";
    }else{
        $sql = "delete from art_collection where mem_no = :mem_no and art_no = :art_no ";
        $artDelete = $pdo->prepare($sql);
        $artDelete->bindValue(':mem_no', $_SESSION["mem_no"]);
        $artDelete->bindValue(':art_no', $_REQUEST["art_no"]);
        $artDelete->execute();
        echo "收藏";
    }
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?>