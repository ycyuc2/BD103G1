<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?
    $msg_no=$_REQUEST["msg_no"];
    $mem_no=$_REQUEST["mem_no"];
    $msg_rep_reason=$_REQUEST["msg_rep_reason"];
        try{    		
                require_once("connectBD103G1.php");
                $sql="insert into msg_report (mem_no,msg_no,msg_rep_reason) values(?,?,?)";
                $msgRepInsert=$pdo->prepare($sql);
                $msgRepInsert->bindValue(1,$mem_no);
                $msgRepInsert->bindValue(2,$msg_no);
                $msgRepInsert->bindValue(3,$msg_rep_reason);
                $msgRepInsert->execute();
            
        }catch(PDOExeption $e){
        echo "錯誤原因 : " , $e->getMessage() , "<br>";
        echo "錯誤行號 : " , $e->getLine() , "<br>";
    }

    ?>
</body>
</html> 