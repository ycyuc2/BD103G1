<?php 
	ob_start();
	session_start();
	if(empty($_SESSION["mem_no"])){
		echo "請先登入再購買";
	}else{
		$_SESSION["cartCount"] = 0;
		require_once 'connectBD103G1.php';
		$sql = "insert into order_list( mem_no, order_time, total, total_karma, order_sta) values( :mem_no, :order_time, :total, :total_karma, :order_sta)";
		$orderList = $pdo->prepare($sql);
		$orderList->bindValue(':mem_no', $_SESSION["mem_no"]);
		$orderList->bindValue(':order_time', date('Y-m-d h:i:s'));
		$orderList->bindValue(':total', $_REQUEST["total"]);
		$orderList->bindValue(':total_karma', $_REQUEST["total_karma"]);
		$orderList->bindValue(':order_sta', 1);
		$orderList->execute();
		$i = 0;
		$sql = "select * from order_list where mem_no = :mem_no order by order_time desc";
		$orderList = $pdo->prepare($sql);
		$orderList->bindValue(':mem_no', $_SESSION["mem_no"]);
		$orderList->execute();
		$orderListRow = $orderList->fetchObject();
		while(isset($_REQUEST["pdname".$i]) && isset($_REQUEST["amount".$i])){
			$sql = "insert into order_detail( order_no, pd_no, num) values( :order_no, :pd_no, :num)";
			$orderDetail = $pdo->prepare($sql);
			$orderDetail->bindValue(':order_no', $orderListRow->order_no);
			$orderDetail->bindValue(':pd_no', substr($_REQUEST["pdname".$i], 2, strlen($_REQUEST["pdname".$i]) ) );
			$orderDetail->bindValue(':num', $_REQUEST["amount".$i]);
			$orderDetail->execute();
			$i++;
		}
		$sql = "update member set karma_val = :karma_val where mem_no = :mem_no";
		$member = $pdo->prepare($sql);
		$member->bindValue(':karma_val',$_SESSION["karma_val"] = max( ($_SESSION["karma_val"] - $_REQUEST["total_karma"]), 0) );
		$orderList->bindValue(':mem_no', $_SESSION["mem_no"]);
		$member->execute();
	}
		


		
 ?>