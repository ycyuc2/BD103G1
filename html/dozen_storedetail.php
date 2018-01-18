<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dozen_storedetail</title>
    <link rel="stylesheet" type="text/css" href="../css/dozen_storedetail.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css ">
    <link rel="stylesheet" href="../css/dozen_nav.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <!-- <script type="text/javascript" src="../js/header.js"></script> -->
    <!-- <script src="../js/addcart.js"></script> -->
    <script src="../js/count.js"></script>
    <script src="../js/countDown.js"></script>
    <script src="../js/dozen_storedetailAJAX .js"></script>
    <script src="../js/dozen_storeCart.js"></script>
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



    <i class="fa fa-address-book" aria-hidden="true"></i>


    
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

    <div class="frame">
        <div class="frameFrame"></div>
        
        <div class="productContent">


        <?php
        $pdNo = $_REQUEST["pd_no"];
        try {
            require_once("connectBD103G1peng.php");
            $sql = "select * from products where pd_no = :pdNo";
            $products = $pdo->prepare($sql);
            $products->bindValue(":pdNo",$pdNo);
            $products->execute();
            $product_rows = $products->fetchAll(PDO::FETCH_ASSOC);

            foreach( $product_rows as $i=>$productRow){
        ?>




                            <div class="one">
                                <div class="picFrame"></div>
                                <?php echo '<img src="../img/products/',$productRow["pd_pic1"],'" alt="">' ?>
                            </div>

                        




                            <div class="text">
                                <h2 id="textTitle"><?php echo $productRow["pd_name"] ?></h2> <h2 id="price"><?php echo $productRow["pd_price"] ?>$</h2>
                                <br>
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                
                                <p class="rate">4.5/5</p>
                                <hr > 
                                <div class="innerText">
                                    <p>
                                    <?php echo mb_substr($productRow["pd_intro"],0,70,"utf-8")."..." ?>
                                    </p>
                                </div>

                                <div class="btn">
                                    <div class="amount">
                                        <form id='myform' method='POST' action='#'>
                                                <label for="" id="count">數量</label>
                                                <br>
                                                <input  type='button' value='-' class='qtyminus' field='quantity' />
                                                <input  type='text' name='quantity' value='1' class='qty' readonly="value"/>
                                                <input  type='button' value='+' class='qtyplus' field='quantity' />
                                        </form>
                                    </div>    
                                    <div class="buy">
                                        <div><a href="#">加入購物車</a></div>
                                        <br>
                                        <div class="buyNow"><a href="../html/dozen_storeCart.html">立即購買</a></div>
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



<script>

var buyNow = document.getElementsByClassName('buyNow')[0];

buyNow.addEventListener('click', function(){
    var inputValue = document.querySelector('.qty').value;
    localStorage.setItem('item',inputValue);
    console.log(inputValue);

});



</script>
</body>

</html>