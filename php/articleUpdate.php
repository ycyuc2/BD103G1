<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

		date_default_timezone_set("Asia/Taipei");
		if( $_FILES["contentImg1"]["error"]==0){
			$tmpFileName1 = strrchr($_FILES["contentImg1"]["name"],".");
			$uploadFileName1 =  "1st".date("YmdHis").$tmpFileName1;
			$from = $_FILES["contentImg1"]["tmp_name"];
			$to ="../img/article/".$uploadFileName1;
			if(copy( $from, $to) ){
				$confirm = 1;
			}else{
				$confirm = 0;
			}
			
		}else{
			echo "上傳失敗<br>";
		}
		if( $_FILES["contentImg2"]["error"]==0){
			$tmpFileName2 = strrchr($_FILES["contentImg2"]["name"],".");
			$uploadFileName2 =  "2nd".date("YmdHis").$tmpFileName2;
			$from = $_FILES["contentImg2"]["tmp_name"];
			$to ="../img/article/".$uploadFileName2;
			if(copy( $from, $to) ){
				$confirm *= 1;
			}else{
				$confirm *= 0;
			}
			
		}else{
			$uploadFileName2 = null;
		}
		if( $_FILES["contentImg3"]["error"]==0){
			$tmpFileName3 = strrchr($_FILES["contentImg3"]["name"],".");
			$uploadFileName3 =  "3rd".date("YmdHis").$tmpFileName3;
			$from = $_FILES["contentImg3"]["tmp_name"];
			$to ="../img/article/".$uploadFileName3;
			if(copy( $from, $to) ){
				$confirm *= 1;
			}else{
				$confirm *= 0;
			}
			
		}else{
			$uploadFileName3 = null;
		}

		if ($confirm) {
			try {
				require_once("connectBD103G1yu.php");
				$sql = "update article set art_title = :art_title, art_content_1 = :art_content_1, art_content_2 = :art_content_2, art_content_3 = :art_content_3, art_img_1 = :art_img_1, art_img_2 = :art_img_2, art_img_3 = :art_img_3, art_update_time = :art_update_time where art_no = :art_no and teacher_no = :teacher_no";
				$article = $pdo->prepare($sql);
				$article->bindValue(":art_no", $_REQUEST["artNo"]);
				$article->bindValue(":teacher_no", $_REQUEST["teacherNo"]);
				$article->bindValue(":art_title", $_REQUEST["title"]);
				$article->bindValue(":art_content_1", $_REQUEST["content1"]);
				$article->bindValue(":art_content_2", $_REQUEST["content2"]);
				$article->bindValue(":art_content_3", $_REQUEST["content3"]);
				$article->bindValue(":art_img_1", $uploadFileName1);
				$article->bindValue(":art_img_2", $uploadFileName2);
				$article->bindValue(":art_img_3",$uploadFileName3);
				$article->bindValue(":art_update_time",date("Y-m-d H:i:s"));
				$article->execute();
				header('Location:specialColumn.php?teacher_no='.$_REQUEST["teacherNo"]);


			} catch (PDOException $e) {
				echo "錯誤原因 : " , $e->getMessage() , "<br>";
				echo "錯誤行號 : " , $e->getLine() , "<br>";
				
			}			


		}
	


	 ?>



</body>
</html>