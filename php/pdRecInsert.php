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
    @$_REQUEST["r"][0]==""? $_REQUEST["r"][0]= 0: $_REQUEST["r"][0];
    @$_REQUEST["r"][1]==""? $_REQUEST["r"][1]= 0: $_REQUEST["r"][1];
    @$_REQUEST["r"][2]==""? $_REQUEST["r"][2]= 0: $_REQUEST["r"][2];
 require_once("connectBD103G1.php");
    $sql="select * from pd_recommend where teacher_no=?";
    $check=$pdo->prepare($sql);
    $check->bindValue(1,$_SESSION["teacher_no"]);
    $check->execute();
        if($check->rowcount()===0){
            $sql="insert into pd_recommend (teacher_no,pd_no,pd_no2,pd_no3) values(?,?,?,?)";
            $pdRecInsert=$pdo->prepare($sql);
            $pdRecInsert->bindValue(1,$_SESSION["teacher_no"]);
            $pdRecInsert->bindValue(2,$_REQUEST["r"][0]);
            $pdRecInsert->bindValue(3,$_REQUEST["r"][1]);
            $pdRecInsert->bindValue(4,$_REQUEST["r"][2]);
            $pdRecInsert->execute();
        }else{
            $sql="update pd_recommend set pd_no=? , pd_no2=? ,pd_no3=? where teacher_no=?";
            $pdRecUpdate=$pdo->prepare($sql);
            $pdRecUpdate->bindValue(1,$_REQUEST["r"][0]);
            $pdRecUpdate->bindValue(2,$_REQUEST["r"][1]);
            $pdRecUpdate->bindValue(3,$_REQUEST["r"][2]);
            $pdRecUpdate->bindValue(4,$_SESSION["teacher_no"]);
            $pdRecUpdate->execute();
        }
	header('Location:specialColumn.php?teacher_no='.$_SESSION["teacher_no"]);
    
    
  
    
}catch(PDOExeption $e){
        echo "錯誤原因 : " , $e->getMessage() , "<br>";
        echo "錯誤行號 : " , $e->getLine() , "<br>";
    }
    
    ?>
</body>
</html>