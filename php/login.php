<?php 
	ob_start();
	session_start();
	require_once("connectBD103G1.php");
	?>
	<script type="text/javascript">
		console.log($_GET["mem_acc"], $_GET["mem_psw"]);
	</script>
	<?php
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
		    if ($memRow->fort_sta == 1) {
		    	$_SESSION["fort_sta"] = $memRow->fort_sta;
		    	$_SESSION["fort_no"] = $memRow->fort_no;
		    	if(isset($memRow->obj_fort_no)){
		    		$_SESSION["obj_fort_no"] = $memRow->obj_fort_no;
		    	}	//obj_fort_no if-else
					$_SESSION["karma_val"] = $memRow->karma_val;
					//karma value if-else
		    }elseif($_SESSION["fort_sta"] == 1){
				if( isset($_SESSION["karma_val"]) ){
		    		$sql = "update member set fort_sta = :fort_sta, fort_no = :fort_no, obj_fort_no = :obj_fort_no, karma_val = ifnull(karma_val, 0)+".$_SESSION["karma_inc"]."+100 where mem_no = :mem_no";
				}else{
					$sql = "update member set fort_sta = :fort_sta, fort_no = :fort_no, obj_fort_no = :obj_fort_no, karma_val = ifnull(karma_val, 0)+".$_SESSION["karma_inc"]." where mem_no = :mem_no";
				}
				$fort_sta = $pdo->prepare($sql);
				$fort_sta -> bindValue(":fort_sta",$_SESSION["fort_sta"]);
				$fort_sta -> bindValue(":fort_no",$_SESSION["fort_no"]);
				$fort_sta -> bindValue(":obj_fort_no",$_SESSION["obj_fort_no"]);
				$fort_sta -> bindValue(":mem_no",$memRow->mem_no);
				$fort_sta -> execute();
		    }
	    	$sql = "update member set karma_val = :karma_val where mem_no = :mem_no";
	    	$update = $pdo->prepare($sql);
	    	$update->bindValue(':mem_no', $_SESSION["mem_no"]);
	    	$update->bindValue(':karma_val', $_SESSION["karma_val"]);
	    	$update->execute();

		    echo '<p>'.$_SESSION["mem_nn"]. '您好</p>';
		}else{
			echo '<a href="#">登入/註冊</a>';
		}
	}
	
 ?>