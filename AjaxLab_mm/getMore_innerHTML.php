<?php
	try{
		require_once("connectBooks.php");
		$sql = 'select * from member where memId = :memId';
		$member = $pdo -> prepare($sql);
		$member -> bindValue(':memId', $_REQUEST['memId']);
		$member -> execute();

		if( $member->rowCount() == 0 ){ //找不到
				//傳回空的字串
			echo "";
		}else{ //找得到
		//取回一筆資料
			$memRow = $member -> fetchObject();
		//傳回html結構
			$str = '';
			$str .= "<table>";
			$str .= "<tr><th>姓名</th><td>" . $memRow -> memName . "</td></tr>";
			$str .= "<tr><th>生日</th><td>" . $memRow -> birthday . "</td></tr>";
			$str .= "<tr><th>email</th><td>" . $memRow -> email . "</td></tr>";
			$str .= "</table>";
			echo $str;

		}
	  
	}catch(PDOException $e){
	  echo $e->getMessage();
	}
?>