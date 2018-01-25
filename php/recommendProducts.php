<?php
ob_start();
session_start();
$_SESSION["where"] = "recommendProducts.php";
$_REQUEST["teacher_no"]=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("publicHeader.php") ?>
	<meta charset="UTF-8">
	<title>專欄文章</title>
	<link rel="stylesheet" type="text/css" href="../css/specialColumn.css">
	<link rel="stylesheet" type="text/css" href="../css/starRatingForArticle.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<link rel="stylesheet" href="../css/recommendslider1.css">
	
</head>
<body>
	<?php
		require_once("connectBD103G1.php");
		require_once("header.php"); 
	?>
	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="../img/lightening/flash4.png" alt="" class="flash lt4">
		
	</div>

	<div class="headerBlank"></div>
<?php 

try{
	if(isset($_SESSION["teacher_no"])){
    require_once("connectBD103G1.php");
	$sql = "select * from teacher where teacher_no = :teacher_no";
	$teacher = $pdo->prepare($sql);
	$teacher->bindValue(":teacher_no",$_SESSION["teacher_no"]);
	$teacher->execute();
	$teacher_row = $teacher->fetchAll(PDO::FETCH_ASSOC);
		foreach( $teacher_row as $i=>$teacherRow){

?>
	<div class="headerBlank"></div>

		<h1> <?php echo $teacherRow["teacher_nn"] ?> X 運勢解析</h1>
		<div class="teacher">
			<div class="border"></div>
			<div class="teacherBorder">


				<!-- 作者介紹 -->
				<div class="intro">
					<div class="teacherPhoto">
						<div class="picBorder"></div>
						<img class="photo" src="../img/findTeacher/horseman.jpg" alt="">
					</div>
					<div class="introContent">
						<p><?php  echo $teacherRow["teacher_nn"] ?></p>
						<p><?php echo $teacherRow["teacher_info"] ?></p>
						<p>
						<!-- 評價星等 -->
							<fieldset class="rating teacherStar">
								<input type="radio" id="star5" name="rating" value="5" />
								<label class = "full" for="star5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4" name="rating" value="4" />
								<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3" name="rating" value="3" />
								<label class = "full" for="star3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2" name="rating" value="2" />
								<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1" name="rating" value="1" />
								<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							</fieldset>

<?php 
	$sql="select * from teacher_review where  teacher_no =?";
	$check=$pdo->prepare($sql);
	$check->bindValue(1,$_REQUEST["teacher_no"]);
	$check->execute();
	$count=$check->rowCount();
	if($count!=0){
		$starScore=0;
		while($checkRow=$check->fetchObject()){
			$starScore+=$checkRow->review_star;
		}?>
		<script>
			var star= <?php echo round($starScore/$count);?>;
			var inputElems= $('.teacherStar input[type="radio"]');
			inputElems[5-star].checked=true;
			for(var i=0;i<5;++i){
				inputElems[i].disabled=true;
			}
		</script>
<?php 
	}
	}
}else if(isset($_SESSION["teacher_no"])==null){
		header('Location:specialColumn.php?teacher_no='.$_REQUEST["teacher_no"]);
	}
?>

						</p>
					</div>
				</div>
				<div class="links">
					<div class="left">
						<span class="btnM">
							<p href="#" class="btnText btnText4">商品推薦</p>
						</span>
					</div>
					
					<div class="right">
						<span class="btnM">
							<a href="specialColumn.html" class="btnText btnText4">老師專欄</a>
						</span>
					</div>
				</div>
				<hr>
	

<!-- 推薦區域 -->
<div class="pdRec_wrapper">
	<div class="pdRec_lightbox">
		<label for="lightboxClose">
			<i class="fa fa-times fa-2x lightboxClose cursorHand" id="lightboxClose"></i>
		</label>
		<p>您重複推薦商品了</p>
		<span class="btnM btn">
			<p class="btnText btnText2">我知道了</p>
		</span>
	</div>
</div>

<?php 
    // 到products資料庫撈出商品的細項
    $sql="select  * from products where pd_no =?" ;
    $pd=$pdo->prepare($sql);
?>



<div class="pdRec_wrapper3">
	<div class="pdRec_lightbox">
		<label for="lightboxClose">
			<i class="fa fa-times fa-2x lightboxClose cursorHand" id="lightboxClose"></i>
		</label>
		<p>最多只能推薦三個商品</p>
		<span class="btnM btn">
			<p class="btnText btnText2">我知道了</p>
		</span>
	</div>
</div>

<div class="desktop">
    <div class="merchandise recommend">
		<h2>推薦商品</h2>
		<div class="pdRecMove">
		<form action="pdRecInsert.php" method="get" id="formRec">
			<input type="hidden" value="<?php echo $_SESSION["teacher_no"]?>" name="teacher_no">
<?php 
	$sql="select a.pd_no, a.pd_name, a.pd_pic1, a.pd_describe, a.pd_price, a.pd_sale
		  from products as a left join pd_recommend as b
		  on a.pd_no = b.pd_no 
		  or a.pd_no = b.pd_no2 
		  or a.pd_no = b.pd_no3
		  where b.teacher_no = :teacher_no";
	$pd=$pdo->prepare($sql);
	$pd->bindValue(':teacher_no',$_REQUEST["teacher_no"]);
	$pd->execute();
	$countPd1=$pd->rowcount();
	$countPd=3-$countPd1;
	$pdRecRow=$pd->fetchAll(PDO::FETCH_ASSOC);
	foreach($pdRecRow as $i => $recRow){?>
	<div class="content drop">
				<input type="hidden" name="r[]" value="<?php echo $recRow["pd_no"]?>">
				<div class="merchandisePhoto"><div class="pictureBorder"></div><img src="../img/products/<?php echo $recRow["pd_pic1"]?>" alt=""></div>
				<div class="merchandiseIntro">
					<a href="#"> <?php  echo $recRow["pd_name"] ?> </a>
					<p class="describe"> <?php  echo mb_substr($recRow["pd_describe"],0,50,"utf-8")."..." ?> </p>
					<p><span> <?php  echo $recRow["pd_price"] ?> </span> <span> <?php  echo $recRow["pd_sale"] ?> </span>元</p>
				</div>
			</div>  
		
<?php	}for($i=0;$i<$countPd;++$i){ ?>

	<div class="content drop">
			<div class="white"></div>
				<input type="hidden" name="r[]" value="null">
				<p>尚未推薦產品</p>
		</div>  
		
<?php	}	?>
			
		


	<input type="button" id="btnSend" value="" onclick="formSubmit();" width="0" >
	</form>
	</div>     
</div>
<?php if(isset($_SESSION["teacher_no"])){?>
	<script>
		function formSubmit(){
		var form  = document.getElementById('formRec');
		form.submit();
		}
	</script>
<?php }?>


	<div class="merchandise recommend">
		
		
		<div class="productsSelect">
			<div class="back"></div>
			<div id="white"><h3>請將欲推薦商品拖曳至上方，推薦好請點選完成。</h3></div>
			<div class="container">
			<?php 
			$sql="select * from products";
			$pd=$pdo ->query($sql);
				while($dragRow=$pd->fetchObject()){
				?>
				<div class="content drag" draggable="true" id="<?php echo $dragRow -> pd_no?>">
					<input type="hidden" name="r[]" value="<?php echo $dragRow-> pd_no?>">
					<div class="merchandisePhoto"><div class="pictureBorder"></div> <img src="../img/products/<?php echo $dragRow->pd_pic1?>" alt=""></div>
					<div class="merchandiseIntro">
						<a href="#"> <?php echo $dragRow-> pd_name ?> </a>
						<p class="describe"><?php echo mb_substr($dragRow -> pd_describe,0,30,"utf-8")."..."?></p>
						<p><span> <?php  echo $dragRow-> pd_price ?> </span> <span> <?php echo $dragRow-> pd_sale ?> </span>元</p>

					</div>
				</div>  
					<?php  
				}
			?>      
			</div>
		</div>
		</div>
		<label class="submit" for="btnSend">
			<span class="btnM">
				<p class="btnText btnText4">完成</p>
			</span>
		</label>
	</div>
	
<div class="phone">
		<h2>推薦商品</h2>
		<h4>最多推薦三個</h4>
		<form action="pdRecInsert.php" method="post">
	<?php
	$sql="select * from products";
	$phoneProd=$pdo->query($sql);
	while($prodRow=$phoneProd->fetchObject()){
	?>
			<div class="phoneItems">
				<input type="checkbox" name="r[]"  id="phoneProd<?php echo  $prodRow->pd_no ?>" value="<?php echo  $prodRow->pd_no ?>">
				<label class="prodCheck" for="phoneProd<?php echo  $prodRow->pd_no ?>"></label>
				<div class="prodPhoto"><div class="pictureBorder"></div> <img src="../img/products/<?php echo $prodRow->pd_pic1?>" alt=""></div>
				<div class="prodInfo">
					<p><?php echo  $prodRow->pd_name ?></p>
					<p><span><?php echo $prodRow->pd_price?></span> <span><?php echo $prodRow->pd_sale?></span>元</p>
				</div>
			</div>
	<?php }?>
	<input type="submit" id="btnSend2">
	</form>
	<label class="submit" for="btnSend2">
		<span class="btnS">
			<p class="btnText btnText4">完成</p>
		</span>
	</label>
		</div>
	</div>
</div>
<script>


</script>
<?php  
    }catch(PDOExeption $e){
        echo "錯誤原因 : " , $e->getMessage() , "<br>";
        echo "錯誤行號 : " , $e->getLine() , "<br>";
    }
?>



	<!-- ====================footer==================== -->
	<div class="copyright">
			<p>
			點算©Copyright DOZEN, 2018.
			</p>
	</div>
	<script>

		$(document).ready(function () {
			var count=0;
			var prodCheck=$('.phone .prodCheck');
			for(var i =0; i< prodCheck.length ; ++i){
				$(prodCheck[i]).on('click',function(){
					if(count<3){
						var state = $(this).data('state');
						switch(state){
							case 1 :
							case undefined : 
								$(this).css('background-color','rgb(221, 183, 12');
								++count;
								$(this).html(count);
								$(this).data('state', 2); 
								break;
							case 2 : 
								--count;
								$(this).html("");
								$(this).css('background-color','transparent');
								$(this).data('state', 1); 
								break;
						}
					}else if(count=3){
						var clickRadios=$('.phone .prodCheck').prop('checked');
						console.log(clickRadios.value);
					}
					else{
						$('.pdRec_wrapper3').css('display','block');
					}
					
				});
			}
			document.getElementById("white").addEventListener("mouseover",disappear);
			function disappear(){
				white.style.transition="opacity 1s  0s,0s 1s left";
				white.style.left="-100%";
				white.style.opacity="0";
			}
			var recBtn=document.querySelector('.links .left .btnM');
			recBtn.addEventListener('load',btnDisabled);
			function btnDisabled(e){
				recBtn.style.background='url(../img/btn/02.png) no-repeat center center';
				recBtn.style.backgroundSize = 'cover';
			}
			

			$('.pdRec_wrapper .btn').click(function(){
				$('.pdRec_wrapper').css('display','none');
			});
			$('.pdRec_wrapper .lightboxClose').click(function(){
				$('.pdRec_wrapper').css('display','none');
			});

			
			$('.pdRec_wrapper3 .btn').click(function(){
				$('.pdRec_wrapper3').css('display','none');
			});
			$('.pdRec_wrapper3 .lightboxClose').click(function(){
				$('.pdRec_wrapper3').css('display','none');
			});

            var contCount=$('.productsSelect .content.drag').length;
			var divWidth=$('.content.drop').outerWidth();
			var divHeight=$('.content.drop').outerHeight();
			var divHeight2=$('.content.drag').outerHeight();
			var w=window.innerWidth;
			$('.productsSelect .back').width(176*(contCount));
			$('.productsSelect #white').height(divHeight2);
			$('.productsSelect .container').outerWidth(176*(contCount));
			$('.productsSelect .container').outerHeight(divHeight);
			
			$(window).resize(function(){
				var contCount=$('.productsSelect .content.drag').length;
				var divWidth=$('.content.drop').outerWidth();
				var divHeight=$('.content.drop').outerHeight();
				var divHeight2=$('.content.drag').outerHeight();
				var divWidth3=$('.productsSelect .container').outerWidth();
				var w=window.innerWidth;
				if(w>760){
					prodSelect=$('.productsSelect').outerWidth();
					$('.productsSelect .back').width(176*(contCount));
					$('.productsSelect #white').width(prodSelect);
					$('.productsSelect #white').height(divHeight2);
					$('.productsSelect .container').outerWidth(176*(contCount));
					$('.productsSelect .container').outerHeight(divHeight);

				}else if(w<759){
					$('.productsSelect #white').height(divHeight2);
					$('.productsSelect .container').outerWidth(176*(contCount));
					$('.productsSelect .container').outerHeight(divHeight);
				}
			});

			
			//拖拉功能
			function dropdown(e){
					var drop1=document.getElementsByClassName('drop')[0].getElementsByTagName('input')[0].value;
					var drop2=document.getElementsByClassName('drop')[1].getElementsByTagName('input')[0].value;
					var drop3=document.getElementsByClassName('drop')[2].getElementsByTagName('input')[0].value;
					product1=e.currentTarget.getElementsByTagName('input')[0].value;
					e.preventDefault();
					var data = e.dataTransfer.getData("text");
					var nodeCopy = document.getElementById(data).cloneNode(true);
					pd2 = document.getElementById(data).getElementsByTagName('input')[0].value;

					if(pd2 != drop1 && pd2 != drop2 && pd2 != drop3){
						e.currentTarget.parentNode.replaceChild(nodeCopy,e.currentTarget);
						document.getElementById(data).ondrop=dropdown;
						document.getElementById(data).ondragover=dragover;
						document.getElementById(data).classList.add("drop");
						document.getElementById(data).classList.remove("drag");
					}else{
						$('.pdRec_wrapper').css('display','block');
					}
			}
			function  dragover(e){
					e.preventDefault();
			}
			var drop_objs =document.getElementsByClassName('drop');

			for (var i = 0; i < drop_objs.length; i++) {
				drop_objs[i].ondrop = dropdown;
				drop_objs[i].ondragover = dragover;
			}
			var drag_objs=document.getElementsByClassName('drag');
			for( var i=0; i<drag_objs.length; i++){
				drag_objs[i].ondragstart = function (e){
					e.dataTransfer.setData("text", e.currentTarget.id);
				}
			}


			$('.productsSelect .content').click(function(){
				index = $(this).index()+1;
			});
		});
	
	</script>

</body>
</html>				