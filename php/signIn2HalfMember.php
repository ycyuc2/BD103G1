<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>會員登入</title>
<style>
    a{
        cursor: pointer;
        border-bottom: 1px solid #44f;
        color: #44f;
    }
</style>
</head>

<body>
    <?php
        $halfId = $_POST["memId"];
        $halfPsw = $_POST["memPsw"];
        try{
            require_once("connectBD103G2.php");

                //準備好指令
            $sql = "select * from halfway_member where half_Id=? and half_Psw=?";
                //執行該指令
            $statement = $pdo -> prepare( $sql );
            $statement -> bindValue(1, $halfId);
            $statement -> bindValue(2, MD5($halfPsw));
            $statement -> execute();
                //檢查是否有此帳密
            if( $statement->rowCount() === 0){ //帳密錯誤
                echo "<center>帳密錯誤 , 請重新登入</center>";
            }else{//帳密存在
                $halfRow = $statement -> fetch(PDO::FETCH_ASSOC);//取回資料錄
                if ($halfRow["HALF_BAN"]) {
                    echo "<center>此帳號已被停權, 若有疑問請來信客服。</center>";
                }else{
                    $_SESSION["HALF_NO"] = $halfRow["HALF_NO"];
                    echo "<center>", $halfRow["HALF_NAME"] , "您好~</center>";//致歡迎詞
                }
            }
        }catch( PDOException $e){
        echo "行號: ",$e->getLine(), "<br>";
        echo "訊息: ",$e->getMessage() , "<br>";
        }echo "<script type='text/javascript'>back()</script>";
        echo "<center>將在五秒後回到原網址</center><br><center><a id='backNext'>或者點此直接回到原網址</a></center>";

    ?>
    <script>
		window.addEventListener('load', ()=>{
			let back = document.getElementById('backNext')
			setTimeout(function back(){
				history.back()
			}, 5000)
			back.addEventListener('click', (e)=>{
				e.preventDefault();
				window.history.back()
			})
		})
	</script>
</body>
</html>