<?php
try{
    $mem_no=$_REQUEST["mem_no"];
    $art_no=$_REQUEST["art_no"];
    require_once("connectBooksting.php");
    $sql="select * from art_collection where mem_no=? and art_no=?";
    $artCollect=$pdo->prepare($sql);
    $artCollect->bindValue(1,$mem_no);
    $artCollect->bindValue(2,$art_no);
    $artCollect->execute();
    if($artCollect->rowcount()==0){
        $sql="insert into art_collection (mem_no, art_no ,last_view) values (?,?,?)";
        $artCollectIns=$pdo->prepare($sql);
        $artCollectIns->bindValue(1,$mem_no);
        $artCollectIns->bindValue(2,$art_no);
        $artCollectIns->bindValue(3,date('Y-h-m h:i:s'));
        $artCollectIns->execute();
    }else{
        $sql="update art_collection set last_view=? where mem_no=? and art_no=?";
        $artCollectUp=$pdo->prepare($sql);
        $artCollectUp->bindValue(1,date('Y-h-m h:i:s'));
        $artCollectUp->bindValue(2,$mem_no);
        $artCollectUp->bindValue(3,$art_no);
        $artCollectUp->execute();
    }

} catch (PDOException $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
            $sql="";
            
		}
?>