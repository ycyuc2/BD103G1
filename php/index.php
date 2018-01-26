<?php
    ob_start();
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <?php require_once("publicHeader.php"); ?>
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/index.js"></script>
	<title>Dozen</title>

</head>
<body>
    <?php 
        require_once("connectBD103G1.php");
        require_once("header.php");
        $_SESSION["where"] = 'index.php';
    ?>
	<div class="wrapper">
	    <!-- 底圖 --> 
		<div class="background"></div>
	    
        
        <!--  進版圖  -->
        <div class="indexPic">
            <div class="magicRune">
                <div class="runeImg">魔法陣圖片</div>
                <img src="../img/index/index_title.png" alt="點算" class="indexImg indexTitle">
                <img src="../img/index/index_subtitle.png" alt="解析過去，引領未來，算與被算，都來點算" class="indexImg indexSubtitle">
                <img src="../img/index/index_impulse.png" alt="衝擊度300%預知預言" class="indexImg indexImpulse">
                <img src="../img/index/index_correct.png" alt="過度準確
                ！" class="indexImg indexCorrect">
                <img src="../img/index/index_small_text.png" alt="深受重要政治家、公司董事、企業泰斗溺愛10萬人驚聲尖叫，傳說級準確率" class="indexImg indexSmallText">
                <?php if (empty($_SESSION["fort_sta"])){?>
                    <div class="chooseBtn">
                        <span class="btnM"><span class="btnText btnText2 single cursorHand">單人</span></span>
                        <span class="btnM"><span class="btnText btnText2 pair cursorHand">配對</span></span>
                        </div>
                        <script type="text/javascript">
                            window.addEventListener('load', function () {

                                var chooseBtn = document.querySelectorAll('.chooseBtn .btnM span');
                                for (var i = 0; i < chooseBtn.length; i++) {
                                    chooseBtn[i].addEventListener("click",birthdayAreaControl);
                            	}
                            	function birthdayAreaControl() {
									if(this.className.split(' ')[2] == 'single'){
										document.querySelector('.chooseBirthday').style.display = "block";
										document.querySelector('form.pair').style.display = "none";
										document.querySelector('form.single').style.display = "block";
								        $('html,body').animate({ scrollTop: $('.chooseBirthday').offset().top-250 }, 1000);
									}else{
										document.querySelector('.chooseBirthday').style.display = "block";
										document.querySelector('form.single').style.display = "none";
										document.querySelector('form.pair').style.display = "block";
								        $('html,body').animate({ scrollTop: $('.chooseBirthday').offset().top-250 }, 1000);
									}
								}
                            });
                            
                        </script>
                <?php } ?>
                
                    
				
            </div>
        </div>


        <!--  進版圖 end  -->




		<!-- chooseBirthday -->

     <?php if (empty($_SESSION["fort_sta"])){?>
        <div class="chooseBirthday">
            <div class="birthdayFrame"></div>
        	<form action="" method="post" class="single">
                <p class="text">請輸入您的生日</p>
                <p>
                    <span class="year cursorHand"><select name="year"></select></span>
                    <span class="month cursorHand"><select name="month"></select></span>
                    <span class="date cursorHand"><select name="date"></select></span>
                </p>
            	<p>
            		<span class="btnM"><span class="btnText btnText2 singleSubmit cursorHand" onclick="generateResult(this.className)">提交</span></span>
            	</p>
            </form>
            <form action="" method="post" class="pair">
                <p class="text">請輸入您的生日</p>
                <p>
                    <span class="year cursorHand"><select name="year"></select></span>
                    <span class="month cursorHand"><select name="month"></select></span>
                    <span class="date cursorHand"><select name="date"></select></span>
                </p>
                <p class="text">請輸入對方的生日</p>
                <p>
                    <span class="year cursorHand"><select name="pairYear"></select></span>
                    <span class="month cursorHand"><select name="pairMonth"></select></span>
                    <span class="date cursorHand"><select name="pairDate"></select></span>
                </p>
            	<p>
            		<span class="btnM"><span class="btnText btnText2 pairSubmit cursorHand" onclick="generateResult(this.className)">提交</span></span>
            	</p>
            </form>
        </div>

    <?php } ?>
		<!-- chooseBirthday end-->
	<div class="resultArea"></div>
	<script type="text/javascript">
        <?php if (isset($_SESSION["fort_no"])){
        	$sql = "select * from fortune where fort_no = :fort_no";
			$singleFortune = $pdo->prepare($sql);
			$singleFortune -> bindValue(":fort_no",$_SESSION["fort_no"]);
			$singleFortune -> execute();
			$singleFortuneRow = $singleFortune->fetchObject();?>
			var single = <?php echo $singleFortuneRow->const; ?>;
    		<?php if ( isset($_SESSION["obj_fort_no"]) ){
	        	$sql = "select * from fortune where fort_no = :fort_no";
				$pairFortune = $pdo->prepare($sql);
				$pairFortune -> bindValue(":fort_no",$_SESSION["obj_fort_no"]);
				$pairFortune -> execute();
				$pairFortuneRow = $pairFortune->fetchObject();?>
				var pair = <?php echo $pairFortuneRow->const; ?>;
				window.addEventListener('onload',printResult(single, pair));
			<?php }else{?>
    			window.addEventListener('onload',printResult(single));
        	<?php }
        }?>
	</script>
    </div>
</body>
</html>