<?
ob_start();
session_start();
?>
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
    try{
        require_once("connectBooksting.php");
        $sql="insert into message ( mem_no, art_no ,msg_content, msg_time, msg_like,msg_dislike,last_view) values(?,?,?,?,?,?,?)";
        $msgAdd=$pdo->prepare($sql);
        $msgAdd->bindValue(1,$_SESSION['mem_no']);
        $msgAdd->bindValue(2,$_SESSION['art_no']);
        $msgAdd->bindValue(3,$_REQUEST["replyText"]);
        $msgAdd->bindValue(4,date('Y-h-m h:i:s'));
        $msgAdd->bindValue(5,0);
        $msgAdd->bindValue(6,0);
        $msgAdd->bindValue(7,date('Y-h-m h:i:s'));
        $msgAdd->execute();
        
        $sql="update  article  set art_update_time =? where art_no=?";
         $msgAdd=$pdo->prepare($sql);
        $msgAdd->bindValue(1,date('Y-h-m h:i:s'));
        $msgAdd->bindValue(2,$_SESSION['art_no']);
        $msgAdd->execute();
        header("Location:article1.php");
    } catch (PDOException $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
			
		}
    ?>
</body>
</html>