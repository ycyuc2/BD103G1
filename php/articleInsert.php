<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		try {
			require_once("connectBD103G1yu.php");
			$sql = "insert into article (TEACHER_NO, ART_TITLE, ART_CONTENT_1, ART_CONTENT_2, ART_CONTENT_3) values (:teacher_no, :art_title, :art_content_1, :art_content_2, :art_content_3)";
			$article = $pdo->prepare($sql);
			$article = $pdo->prepare($sql);
			$article->bindValue(":teacher_no", 1);
			$article->bindValue(":art_title", $_REQUEST["title"]);
			$article->bindValue(":art_content_1", $_REQUEST["content1"]);
			$article->bindValue(":art_content_2", $_REQUEST["content2"]);
			$article->bindValue(":art_content_3", $_REQUEST["content3"]);
			$article->execute();
			header("Location:../php/specialColumn.php");


		} catch (PDOException $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
			
		}


	 ?>



</body>
</html>