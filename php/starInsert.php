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
    $art_no=$_REQUEST["art_no"];
    $mem_no=$_REQUEST["mem_no"];
    $art_star=$_REQUEST["art_star"];
    try{
        require_once("connectBooksting.php");
        $sql="select * from art_review where mem_no=? and art_no=?";
        $check=$pdo->prepare($sql);
        $check->bindValue(1,$mem_no);
        $check->bindValue(2,$art_no);
        $check->execute();
        if($check->rowcount()===0){
            $sql="insert into art_review (MEM_NO,ART_NO, ART_STAR) values(?,?,?)";
            $starInsert=$pdo->prepare($sql);
            $starInsert->bindValue(1,$mem_no);
            $starInsert->bindValue(2,$art_no);
            $starInsert->bindValue(3,$art_star);
            $starInsert->execute();
        }else{
            $sql="update art_review set art_star=? where mem_no=? and art_no=?";
            $starUpdate=$pdo->prepare($sql);
            $starUpdate->bindValue(1,$art_star);
            $starUpdate->bindValue(2,$mem_no);
            $starUpdate->bindValue(3,$art_no);
            $starUpdate->execute();

        }

        

    } catch (PDOException $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
			
		}
    ?>
</body>
</html>