<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>專欄文章</title>
    <script src="../js/countDown.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/karmainfo.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"></link>
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<?php require_once("publicHeader.php") ?>
</head>
<body>
	
	<?php 
		require_once("connectBD103G1.php");
		require_once("header.php");
		$_SESSION["where"] = 'karmainfo.php';
	?>

	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="../img/lightening/flash4.png" alt="" class="flash lt4">
		
	</div>
	<div class="headerBlank"></div>

<!-- 標題 -->
        <div class="headerTitle">
            <img src="../img/karmainfo/title.png">
        </div>

<div class="specialColumn">
<!-- 外框專用 -->
    <div class="border"></div>
    <div class="columnBorder">
            
        
        
        <!-- 簡介 -->
        <div class="preface">
            <div class="text">
                <p>
                    <span>業障</span>是一種很玄的東西，如影隨行，<br>
                    無聲又無息，出沒在心底，轉眼，吞沒你在寂寞裡。<br>
                    人的一生充滿業障，隨著人生進程，我們的業障干擾會越來越高，<br>若你的運氣好，業障不會有顯著增加。<br>
                    天有不測風雲，人有旦夕禍福，當業障太高，隨時都有引爆的風險！
                </p>
            </div>
        </div>

        <div class="karCounting">

            <h2>業障干擾計算方式</h2>
            <div class="countBall"><img src="../img/karmaInfo/400.png" alt="業障"> <div class="kar"><p></p></div></div>
            <div class="countWay">
                <div class="countInfo"><p><span>按照每日運勢增減</span><span class="clickBall">運</span></p></div>
                <div class="countInfo"><p><span>算命結果-大吉</span><span class="clickBall">+0</span></p></div>
                <div class="countInfo"><p><span>算命結果-吉</span><span class="clickBall">+50</span></p></div>
                <div class="countInfo"><p><span>算命結果-凶</span><span class="clickBall">+100</span></p></div>
                <div class="countInfo"><p><span>算命結果-大凶</span><span class="clickBall">+200</span></p></div>
                <div class="countInfo"><p><span>依照商品業力扣除值</span ><span class="clickBall">購</span></p></div>
            
            </div>
        </div>
        <!-- 業障干擾計算表格 -->
<?php 
if(isset($_SESSION['mem_no'])){
    $sql="select * from member where mem_no=:mem_no";
    $member=$pdo->prepare($sql);
    $member->bindValue(':mem_no',$_SESSION['mem_no']);
    $member->execute();
    $memRow=$member->fetchObject();
    $count=$memRow->karma_val;
if($count!=null){
?>
 <script>
    count=<?php echo $count?>
    </script>
     
<?php }
 }else{  ?>
    <script>
        count=100;
    </script>
<?php }?>
    <script>
    var counting=document.querySelectorAll('.countInfo');
    counting[0].addEventListener('click',function(){
        count-=50;  
            karCount.innerText=count;

    });
     counting[1].addEventListener('click',function(){
        count+=0;  
            karCount.innerText=count;

    });
     counting[2].addEventListener('click',function(){
        count+=50;  
            karCount.innerText=count;

    });
     counting[3].addEventListener('click',function(){
        count+=100;  
            karCount.innerText=count;

    });
     counting[4].addEventListener('click',function(){
        count+=200;  
            karCount.innerText=count;

    });
     counting[5].addEventListener('click',function(){
        count-=100;      karCount.innerText=count;

    });
    var karCount=document.querySelector('.countBall .kar p ');
    karCount.innerText=count;
    
</script>  
    </div>
</div>
	<!-- ====================footer==================== -->
		<div class="copyright">
			<p>
			點算©Copyright DOZEN, 2018.
			</p>
		</div>





	
	
</body>
</html>