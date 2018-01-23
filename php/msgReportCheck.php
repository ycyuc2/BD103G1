<?
try{  
    require_once("connectBooks.php");
    if(isset($_SESSION["mem_no"])){
        $sql="select * from msg_report where mem_no=? and msg_no=?";
        $msgReport=$pdo->prepare($sql);
        $msgReport->bindValue(1,$_SESSION["mem_no"]);
        $msgReport->bindValue(2,$_REQUEST["msg_no"]);
        $msgReport->execute();
        $count=$msgReport->rowCount();
        console.log($count);
        if($count==0){
            echo 0;
        }else{ echo 1;
        }
    }else{
        echo 2;
     }
 }catch(PDOExeption $e){
    echo "錯誤原因 : " , $e->getMessage() , "<br>";
    echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>