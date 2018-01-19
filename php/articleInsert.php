<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		if( $_FILES["contentImg1"]["error"]==0){
			$from = $_FILES["contentImg1"]["tmp_name"];
			$to ="../img/article/".$_FILES["contentImg1"]["name"];
			if(copy( $from, $to) ){
				echo "上傳成功<br>";
			}else{
				echo "上傳失敗<br>";
			}
			
		}else{
			echo "上傳失敗<br>";
		}
		if( $_FILES["contentImg2"]["error"]==0){
			$from = $_FILES["contentImg2"]["tmp_name"];
			$to = $_FILES["contentImg2"]["name"];
			if(copy( $from, $to) ){
				echo "上傳成功<br>";
			}else{
				echo "上傳失敗<br>";
			}
			
		}else{
			$_FILES["contentImg2"]["name"] = null;
			echo "上傳失敗<br>";
		}
		if( $_FILES["contentImg3"]["error"]==0){
			$from = $_FILES["contentImg3"]["tmp_name"];
			$to = $_FILES["contentImg3"]["name"];
			if(copy( $from, $to) ){
				echo "上傳成功<br>";
			}else{
				echo "上傳失敗<br>";
			}
			
		}else{
			$_FILES["contentImg3"]["name"] = null;
			echo "上傳失敗<br>";
		}


		try {
			require_once("connectBD103G1yu.php");
			$sql = "insert into article (TEACHER_NO, ART_TITLE, ART_CONTENT_1, ART_CONTENT_2, ART_CONTENT_3, ART_IMG_1, ART_IMG_2, ART_IMG_3) values (:teacher_no, :art_title, :art_content_1, :art_content_2, :art_content_3, :art_img_1, :art_img_2, :art_img_3)";
			$article = $pdo->prepare($sql);
			$article = $pdo->prepare($sql);
			$article->bindValue(":teacher_no", 1);
			$article->bindValue(":art_title", $_REQUEST["title"]);
			$article->bindValue(":art_content_1", $_REQUEST["content1"]);
			$article->bindValue(":art_content_2", $_REQUEST["content2"]);
			$article->bindValue(":art_content_3", $_REQUEST["content3"]);
			$article->bindValue(":art_img_1", $_FILES["contentImg1"]["name"]);
			$article->bindValue(":art_img_2", $_FILES["contentImg2"]["name"]);
			$article->bindValue(":art_img_3",$_FILES["contentImg3"]["name"]);
			$article->execute();
			header('Location:specialColumn.php');


		} catch (PDOException $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
			
		}


	 ?>



</body>
</html>