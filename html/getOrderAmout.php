<?php
try {
	require_once("connectBD103G1peng.php");
	$sql = "SELECT COUNT(order_no) order_amount FROM order_detail WHERE order_no=?;";
	$products = $pdo->prepare($sql);
    $products->bindValue(1,$_REQUEST["order_no"]);
	$products->execute();
	$or_amou = $products->fetchObject();
    $order_amount = $or_amou->order_amount;
    echo $order_amount;


} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>