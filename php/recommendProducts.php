<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>推薦商品</title>
	<script src="../js/countDown.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/specialColumn.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<link rel="stylesheet" type="text/css" href="../css/starRating.css">
	<link rel="stylesheet" type="text/css" href="../css/dozen_nav.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/btn.css">
	<link rel="stylesheet" href="../css/input.css">
	<link rel="stylesheet" href="../css/recommendslider.css">
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>

</head>
<body>

	<!-- 漢堡選單 -->
	<input type="checkbox" name="" id="menuControl">
	<label for="menuControl" class="hamburger">
			<div></div>
			<div></div>
			<div></div>
	</label for="menuControl">
	<div class="menu">
		<!-- logo -->
		<a  href="index.html"><img  class="logo" src="../img/share/LOGO-08.png" ></a>
		<!-- 右邊的title區塊 -->
		<div class="left">
			<p>距離下次水星逆行還有</p>
			<table class="countdownContainer">
				<tr class="info">
					<td class="days">120</td><td>天</td>
					<td class="hours">4</td><td>時</td>
					<td class="minutes">12</td><td>分</td>
					<td class="seconds">22</td><td>秒</td>
				</tr>
			</table>
		</div>
	<!-- 中間的line -->
		<div class="line"></div>
		<!-- 右邊的time區塊 -->
		<div class="right">
			<a class="title" href="findTeacher.html">
				<span class="findTeacher"></span>
			</a>
			<a class="title" href="dozen_store.html">
				<span class="store"></span>
			</a>
			<a class="title" href="member.html">
				<span class="member"></span>
			</a>
		</div>	
	</div>
<!-- 背景 -->
	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="../img/lightening/flash4.png" alt="" class="flash lt4">
		
	</div>
<!-- header -->
	<div class="header">
		<!-- 中間logo -->
		<div class="logo">
			<a href="#">
				<img src="../img/share/LOGO-08.png">
			</a>
		</div>	
		<!-- 右邊會員專區 -->
		<div class="memArea">
			<ul>
				<li><a href="#">註冊</a></li>
				<li><a href="#">登入</a></li>
				<li><a href="#">購物車(<span class="cartNo">0</span>)</a></li>
			</ul>
		</div>
		<!-- 右邊水逆倒數 -->
		<div class="countdown">
			<table class="countdownContainer">
				<tr class="info">
					<td>水星逆行倒數 :</td>
					<td class="days">120</td><td>天</td>
					<td class="hours">4</td><td>時</td>
					<td class="minutes">12</td><td>分</td>
				</tr>				
			</table>
		</div>
	</div>


	<div class="headerBlank"></div>

		<h1>馬男波傑克 X 運勢解析</h1>Ｆ
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
						<p>馬男波傑克</p>
						<p>前中原大學占星社社長，因其對星座算命有著獨到的見解，且本身有著可以預測未來的天命，在2014年多次成功預測天災而爆紅。雖然洩漏天機可能造成災厄，但波傑克為了世人的安危總是甘願承擔苦果，因此成為當代占卜三本柱之一。</p>
						<p>
						<!-- 評價星等 -->
							<fieldset class="rating">
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
						</p>
					</div>
				</div>
				<div class="links">
					<div class="left">
						<span class="btnM">
							<a href="recommendProducts.html" class="btnText btnText4">商品推薦</a>
						</span>
					</div>
					<div class="mid">
						<span class="btnM">
							<a href="schedule.html" class="btnText btnText4">老師行程</a>
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
		<label for="loginControl">
			<i class="fa fa-times fa-2x loginClose cursorHand"></i>
		</label>
		<p>您重複推薦商品了</p>
		<div class="btn"> 我知道了</div>
	</div>
</div>

<?
try{
    $_SESSION["teacher"]["teacher_no"]=1;
    require_once("../php/connectBooksting.php");
    $sql="select * from pd_recommend where teacher_no = ?";
    $recommend=$pdo->prepare($sql);
    $recommend->bindValue(1,2);
    $recommend->execute();
    $recRow=$recommend->fetchObject();
    // 提出老師推薦的商品序號
    $a=$recRow->pd_no;$b=$recRow->pd_no2;$c=$recRow->pd_no3;

    // 到products資料庫撈出商品的細項
    $sql="select  * from products where pd_no =?" ;
    $pd=$pdo->prepare($sql);
?>
    <div class="merchandise recommend">
		<h2>推薦商品</h2>
		<form action="pdRecInsert.php" method="get">
			<input type="hidden" value="<?echo $_SESSION["teacher"]["teacher_no"]?>" name="teacher_no">
<?
    for( $i=1;$i<4;++$i){
        //一個個篩選
        if($i==1){   
            $pd->bindValue(1,$a);
        }elseif($i==2){
             $pd->bindValue(1,$b);
        }else{
             $pd->bindValue(1,$c);
        }
		$pd->execute();
		$pdRow = $pd -> fetchObject();
			
?>
        <div class="content drop">
			<input type="text" name="r[]" value="<?echo $pdRow-> pd_no?>">
            <div class="merchandisePhoto"><img src="../img/specialColumn/cristal.JPG" alt=""></div>
            <div class="merchandiseIntro">
                <a href="#"> <? echo $pdRow-> pd_name ?> </a>
                <p> <? echo mb_substr($pdRow -> pd_describe,0,30,"utf-8")."..."?> </p>
                <p><span> <? echo $pdRow-> pd_price ?> </span> <span> <? echo $pdRow-> pd_sale ?> </span>元</p>
            </div>
        </div>  
		<? ;
    }
?>

	<input type="submit" id="btnSend">
	</form>
    </div>     
		


	<div class="recommendSilder">
		<div class="white"></div>
		<div class="recContainer">
			<div class="product_item">
				<img src="" alt="">
				<p></p>
			</div>
		</div>
	</div>



	<div class="merchandise recommend">
		
		<div class="search">
		<input type="search" id="search" class="input input200">
		<ul id="name" type="none">
<?			
		$sql1="select * from products";
		$pd=$pdo->query($sql1);
		while($nameRow = $pd->fetchObject()){
			echo '<input type="hidden" class="pdHiddenInput" value="',$nameRow-> pd_no,'" >';
?> 
			<li><? echo $nameRow-> pd_name ?></li>
<?		
		}
?>
			</ul>
		</div>
	<h3>可搜尋商品，並將商品拖曳到上方取代</h3>
		<div class="productsSelect">
			<div class="container">
			<?
			$sql="select * from products";
			$pd=$pdo ->query($sql);
				while($nameRow=$pd->fetchObject()){
				?>
				<div class="content drag" draggable="true" id="<?echo $nameRow -> pd_no?>">
					<input type="text" name="r[]" value="<?echo $nameRow-> pd_no?>">
					<div class="merchandisePhoto"><img src="../img/specialColumn/cristal.JPG" alt=""></div>
					<div class="merchandiseIntro">
						<a href="#"> <? echo $nameRow-> pd_name ?> </a>
						<p>放在家裡的各個角落，以確保邪靈無法輕易入侵，三個以上可...</p>
						<p><span> <? echo $nameRow-> pd_price ?> </span> <span> <? echo $nameRow-> pd_sale ?> </span>元</p>
						<!-- <p style="display:none;"><? echo $nameRow-> pd_price ?></p> -->

					</div>
				</div>  
					<? 
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
		</div>
<?
			  
    }catch(PDOExeption $e){
        echo "錯誤原因 : " , $e->getMessage() , "<br>";
        echo "錯誤行號 : " , $e->getLine() , "<br>";
    }
?>



	<!-- ====================footer==================== -->
	<div class="footer">

	
		<div class="copyright">
			<p>
			點算©Copyright DOZEN, 2018.
			</p>
		</div>
		
	</div>

	<script>
		$(document).ready(function () {
			
			console.log("yeah");
            var contCount=$('.productsSelect .content.drag').length;
			var divWidth1=$('.content.drop').outerWidth();
			var divHeight=$('.content.drop').outerHeight();
			$('.productsSelect').height(divHeight);
			$('.productsSelect .container').outerWidth(divWidth1*(contCount));
			$('.productsSelect .container').outerHeight(divHeight);
			$(window).resize(function(){
				var contCount=$('.productsSelect .content').length;
				var divWidth=$('.content.drop').outerWidth();
				var divHeight=$('.content.drop').outerHeight();
				var w=window.innerWidth;
				console.log(divWidth,divHeight,w);
				if(w>760){
					$('.productsSelect').height(divHeight);
					$('.productsSelect .container').outerWidth(divWidth*(contCount));
					$('.productsSelect .container').outerHeight(divHeight);
					$('.content.drag').outerHeight(divHeight);
					$('.content.drag').outerWidth(divWidth);

				}else if(w<759){
					$('.productsSelect').height(divHeight);
					$('.productsSelect .container').outerWidth(divWidth*(contCount));
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
					alert(e.dataTransfer.getData("text"));

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
			console.log( "drop_objs.length:" , drop_objs.length);

			for (var i = 0; i < drop_objs.length; i++) {
				drop_objs[i].ondrop = dropdown;
				drop_objs[i].ondragover = dragover;
			}
			var drag_objs=document.getElementsByClassName('drag');
			console.log( "drag_objs.length:" , drag_objs.length);
			
			for( var i=0; i<drag_objs.length; i++){
				drag_objs[i].ondragstart = function (e){
					e.dataTransfer.setData("text", e.currentTarget.id);
				}
			}


			//搜尋滑動功能
			$('li').click(function () {
				index = $(this).index();
				
				if(w<760){
					$('.productsSelect .container').animate({
						top:(divWidth1*0.5*index*-1 )
					});
				}else{
					$('.productsSelect .container').animate({
						left:(divWidth1*0.5*index*-1 )
					});
				}
			});

            $('#name li').css('display', '');
			$('#search').keyup(function () {
				var get =$(this).val();
				$("#name li").hide();
				if($.trim(get)!==''){
					$('#name li:contains("'+get+'")').show();
				}
			});
			$('#search').focus(function(){
					var get =$(this).val();ａ
				$("#name li").hide();
				if($.trim(get)!==''){
					$('#name li:contains("'+get+'")').show();
				}
				$('#name li').css('display', 'block');
				$('#name').css('height','100px');
			}).blur(function(){
				$('#name').css('height','0px');
			});
			$(document).on('mouseenter mouseleave', 'li', function () {
				$(this).toggleClass('highlight');
			});
			$('.productsSelect .content').click(function(){
				index = $(this).index()+1;
				var a=$('.productsSelect .content:nth-child('+index+')  input').text();
			});
       
		});	
	

	</script>

</body>
</html>				