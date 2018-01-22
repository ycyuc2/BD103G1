<?php 
	ob_start();
    session_start();
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商城</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css ">
    <link rel="stylesheet" type="text/css" href="../css/dozen_store.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/dozen_nav.css">
    
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/dozen_store.js"></script>
    <script src="../js/addcart.js"></script>
    <!-- <script src="../js/dozen_storeAJAX.js"></script> -->
    <!-- <script src="../js/33_new.js"></script> -->

<!--     <script>
            $(window).on("load",function(){
                    $('.loadBG').delay(4000).fadeOut(1000);
                    setTimeout(function(){
                        $('body').css({
                            'height':'inherit',
                            'overflow':'inherit'
                        });
                    },4000);
            });

            $(window).on("load",function(){
                    $('.bar').delay(4000).fadeOut(1000);
                    setTimeout(function(){
                        $('body').css({
                            'height':'inherit',
                            'overflow':'inherit'
                        });
                    },4000);
            });
     </script> -->
  
</head>

<body>
       
    <?php 
    require_once("connectBooks.php");
    require_once("header.php");
    $_SESSION["where"] = "dozen_store.php";
    ?>

     <!-- 閃電 -->
     <div class="background">
            <img src="../img/lightening/flash1.png" alt="" class="flash lt1">
            <img src="../img/lightening/flash2.png" alt="" class="flash lt2">
            <img src="../img/lightening/flash3.png" alt="" class="flash lt3">
            <img src="../img/lightening/flash4.png" alt="" class="flash lt4">
        </div>

<div class="bg">

    

    <!-- 漢堡選單 -->
		<input type="checkbox" name="" id="menuControl">

		<label for="menuControl" class="hamburger">
				<div></div>
				<div></div>
				<div></div>
		</label for="menuControl">

	<div class="menu">
        <!-- logo -->
        <div class="navlogo">
            <a  href="#">
                <img src="../img/share/LOGO-08.png">
            </a>
        </div>
		

		<!-- 右邊的title區塊 -->

			<div class="left">
				<p>距離下次水星逆行還有</p>
				<table class="countdownContainer">
						<tr class="info">
							<td id="days">120</td><td>天</td>
							<td id="hours">4</td><td>時</td>
							<td id="minutes">12</td><td>分</td>
							<td id="seconds">22</td><td>秒</td>
						</tr>
						
					</table>
			</div>
		<!-- 中間的line -->
			<div class="line"></div>
			<!-- 右邊的time區塊 -->
			<div class="right">
				<a class="title" href="#">
					<span class="findTeacher"></span>
				</a>
				<a class="title" href="../html/dozen_store.html">
					<span class="store"></span>
				</a>
				<a class="title" href="#">
					<span class="member"></span>
				</a>
			</div>	
	</div>

<!-- 水星逆行的ＪＳ程式 -->
	<script type="text/javascript">
		window.onload=countdown;
		function countdown(){
			var now = new Date();
			var eventDate = new Date(2018, 3, 23);
			var currentTime = now.getTime();
			var eventTime = eventDate.getTime();
			var remTime = eventTime - currentTime;

			var s = Math.floor(remTime / 1000);
			var m = Math.floor(s / 60);
			var h = Math.floor(m / 60);
			var d = Math.floor(h / 24);

			h %= 24;
			m %= 60;
			s %= 60;

			h = (h < 10) ? "0" + h : h;
			m = (m < 10) ? "0" + m : m;
			s = (s < 10) ? "0" + s : s;

			document.getElementById("days").textContent = d;
			document.getElementById("days").innerText = d;
			document.getElementById("hours").textContent = h;
			document.getElementById("minutes").textContent = m;
			document.getElementById("seconds").textContent = s;

			setTimeout(countdown, 1000);
		}
	</script>
    

    
   

  <!-- 載入頁面   -->
  <!-- <div class="loadBG">
    <div class='loading'></div>
    <div class="loadLOGO"><img class="LOGOrotate" src="../img/dozen_store/onlyLOGO.png" alt=""></div>
    </div>
    <div class="bar">
            <div class="progress"></div>
    </div> -->

    

	

    <i class="fa fa-address-book" aria-hidden="true"></i>
    <div class="header">
        <a href="#">
            <img class="logo" src="../img/share /LOGO-08.png">
        </a>


        <p>
            <span id="person">
                <a href="#" class="name">王小姐</a>
            </span> 您好 購物車(<a href="#">0</a>)
        </p>

    </div>


<!-- 內文 -->

<div class="frame">
    <div class="frameFrame"></div>

    <div class="wrapper">
        <div class="search">
            <div class="filter">
                <select>
                    <option value="1" class="prodClass" id="prodClass_wear">飾品</option>
                    <option value="2" class="prodClass" id="prodClass_home">家飾</option>
                    <option value="3" class="prodClass" id="prodClass_food">食品</option>
                    <option value="4" class="prodClass" id="prodClass_stationery">文具</option>
                </select>
            </div>
            <div class="searchBox">
                <input type="text" name="" placeholder="請輸入商品名稱...">
                <a href="">
                <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                </a>
            </div>
        </div>

        
        <div id="pdContent">

            <?php
            try {
                require_once("connectBD103G1peng.php");
                $sql = "select * from products";
                $products = $pdo->prepare($sql);
                $products->execute();
                $product_rows = $products->fetchAll(PDO::FETCH_ASSOC);

                foreach( $product_rows as $i=>$productRow){
            ?>

                <div class="content">
                    
                <?php echo '<a href="../php/dozen_storedetail.php?pd_no=',$productRow["pd_no"],'">' ?>
                    <div class="pic">
                        <div class="picFrame"></div>
                        
                        
                        <?php echo '<img src="../',$productRow["pd_pic1"],'" alt="">' ?>
                        
                    </div>
                    </a>
                        
                    <div class="intro">
                        <h2><?php echo $productRow["pd_name"] ?></h2>
                        <p><?php echo mb_substr($productRow["pd_intro"],0,70,"utf-8")."..." ?></p>
                        <div class="options">
                            <div class="price">
                                <p>$ <?php echo $productRow["pd_price"] ?></p>
                            </div>
                            
                            <div class="purchase">

                                <div id="pd<?php echo $productRow["pd_no"] ?>" class="name">
                                <span class="addButton buyNow">
                                        加入購物車
                                        <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                                    </span>


                                    

                                    <span class="addButton buyNow">         
                                        立即購買
                                        <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                                    </span>
                                </div>
                            

                            </div>
                        </div>
                    </div>
                        
                </div>

            <?php		
                }

            } catch (PDOException $e) {
                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                echo "錯誤行號 : " , $e->getLine() , "<br>";
            }
            ?> 
           

       
        </div>

    </div>
</div>






    <div class="footer">

            <!-- 左邊icon -->
            <div class="icon">
                <ul>
                    <!-- facebook icon -->
                    <li class="facebook">
                        <a href="#">
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                        </a>				
                    </li>
    
                    <!-- instagram icon -->
                    <li class="instagram"></i>
                        <a href="#">
                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                        </a>					
                    </li>
    
                    <!-- twitter icon -->
                    <li class="twitter">
                        <a href="#">
                            <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                        </a>			
                    </li>
                </ul>
            </div>
    
            <!-- 右邊copyright -->
            <div class="copyright">
                <p>
                點算©Copyright DOZEN, 2018.
                </p>
            </div>
            
        </div>



</div>   

<!-- <script>


window.onload = function(){
        
        var xhr = new XMLHttpRequest();
        xhr.onload=function (){
            if( xhr.status == 200 ){
                //alert( xhr.responseText );  
                //modify_here
                document.getElementById('pdContent').innerHTML = xhr.responseText;
            }else{
                alert( xhr.status );
            }
        }//xhr.onreadystatechange
        
        var url = "../php/queryProducts.php";
        xhr.open("Get", url, true);
        xhr.send( null );


        


    }
</script> -->


<!-- <script>
    var btns = document.querySelectorAll(".prodClass");  
     for( var i=1; i<btns.length; i++){
      btns[i].addEventListener("click",getProducts,false)
     }

     function getProducts(e){
     var prodClass = e.target.id.substr(10);
     var xhr = new XMLHttpRequest();
     xhr.onload = function (){
      if( xhr.status == 200){
       document.getElementById("showPanel").innerHTML = xhr.responseText;
      }else{
       alert(xhr.status);
      }
     }
      var url = "xxx.php&prodClass=" + prodClass;
      xhr.open("Get",url, true);
      xhr.send( null );     
     }
  
</script> -->

</body>

</html>