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
				<a class="title" href="dozen_store.html">
					<span class="store"></span>
				</a>
				<a class="title" href="member.html">
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
    

    
    <!-- 閃電 -->
        <div class="background">
                <img src="../img/lightening/flash1.png" alt="" class="flash lt1">
                <img src="../img/lightening/flash2.png" alt="" class="flash lt2">
                <img src="../img/lightening/flash3.png" alt="" class="flash lt3">
                <img src="../img/lightening/flash4.png" alt="" class="flash lt4">
            </div>


	

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
    <div class="search">
        <div class="filter">
            <select>
                <option value="">價格從高到低</option>
                <option value="">價格從低到高</option>
            </select>
        </div>
        <div class="searchBox">
            <input type="text" name="" placeholder="請輸入商品名稱">
        </div>
    </div>
<?
    try{
        require_once('../practice/connectBooks.php');
        $sql="select * from products where pd_type=:pd_type";
        $products= $pdo->prepare($sql);
        $products->bindValue(":pd_type",3);
        $products->execute();  
        while($prodRow= $products->fetchObject()){
?>
    <div class="content">
        <div class="pic"><img src="../img/dozen_store/lion.jpg"></div>
        <div class="intro">
            <h2><?php echo $prodRow-> pd_name ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At commodi harum voluptas, sequi, temporibus tenetur assumenda, sit id eos voluptatum perferendis. Consequatur aut, dolorum magnam dolores qui harum debitis ea accusantium eos quisquam unde eligendi facilis dolor consequuntur nulla nam excepturi assumenda aperiam amet ut fugit ullam neque. Quibusdam, sapiente.</p>
            <div class="options">
                <div class="price">
                    <p>$ <? echo $prodRow->pd_price?></p>
                </div>
                <div class="purchase">
                    <a href="#">加入購物車</a>
                    <a href="#">立即購買</a>
                </div>
            </div>
        </div>
    </div>
<?
        }
    }catch(PDOExeption $e){
        echo "錯誤原因 : " , $e->getMessage() , "<br>";
        echo "錯誤行號 : " , $e->getLine() , "<br>";
    }
?>

</div>






    <div class="footer">

        
            <div class="copyright">
                <p>
                點算©Copyright DOZEN, 2018.
                </p>
            </div>
            
        </div>



    
</body>

</html>