<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>推薦商品</title>
	<script src="../js/countDown.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/specialColumn.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<link rel="stylesheet" type="text/css" href="../css/starRating.css">
	<link rel="stylesheet" type="text/css" href="../css/dozen_nav.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/btn.css">
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

		<h1>馬男波傑克 X 運勢解析</h1>
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
				<div class="merchandise recommend">
                    <h2>推薦商品</h2>
                    


<?
	 try{
        $_SESSION["teacher"]["teacher_no"]=1;
        require_once("../php/connectBooksting.php");
        $sql="select * from pd_recommend where teacher_no =?";
        $recommend=$pdo->prepare($sql);
        $recommend->bindValue(1,1);
        $recommend->execute();
        $recRow=$recommend->fetchObject();
        $i=1;
        while($i<4){
            if($i===1){
                $sql="select  * from products where pd_no ='".$recRow->pd_no."'" ;
                $pd=$pdo->query($sql);
                $pdRow = $pd -> fetchObject();
                ?>
                <div class="content">
                    <div class="merchandisePhoto"><img src="../img/specialColumn/cristal.JPG" alt=""></div>
                    <div class="merchandiseIntro">
                        <a href="#"> <? echo $pdRow-> pd_name ?> </a>
                        <p>放在家裡的各個角落，以確保邪靈無法輕易入侵，三個以上可...</p>
                        <p><span> <? echo $pdRow-> pd_price ?> </span> <span> <? echo $pdRow-> pd_sale ?> </span>元</p>
                    </div>
                </div>  
        <?
                $i+=1;
                
            }
            else{
                $sql="select  * from products where pd_no ='".($recRow->pd_no+","+$i)."'" ;
                $pd=$pdo->query($sql);
                $pdRow = $pd -> fetchObject();
                
                
            ?>
                <div class="content rear">
                    <div class="merchandisePhoto"><img src="../img/specialColumn/cristal.JPG" alt=""></div>
                    <div class="merchandiseIntro">
                        <a href="#"> <? echo $pdRow-> pd_name ?> </a>
                        <p>放在家裡的各個角落，以確保邪靈無法輕易入侵，三個以上可...</p>
                        <p><span> <? echo $pdRow->pd_price ?> </span><span> <? echo $pdRow-> pd_sale ?> </span>元</p>
                    </div>
                </div>		
            <?
           $i+=1;
            }
        }
?>       		
					

                

<?
        
    }catch(PDOExeption $e){
        echo "錯誤原因 : " , $e->getMessage() , "<br>";
        echo "錯誤行號 : " , $e->getLine() , "<br>";
    }
?>


				<div class="productsSelect">
					<p>slider</p>
				</div>
				<div class="submit">
					<span class="btnM">
						<a href="" class="btnText btnText4">完成</a>
					</span>
				</div>
			</div>
		</div>




	<!-- ====================footer==================== -->
	<div class="footer">

	
		<div class="copyright">
			<p>
			點算©Copyright DOZEN, 2018.
			</p>
		</div>
		
	</div>


</body>
</html>				