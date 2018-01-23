<?php
ob_start();
session_start();
$_REQUEST["art_no"]=1;
$_SESSION["where"] = "article.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("publicHeader.php") ?>
	<meta charset="UTF-8">
	<title>專欄文章</title>
	<link rel="stylesheet" type="text/css" href="../css/article1.css">
	<link rel="stylesheet" type="text/css" href="../css/starRatingForArticle.css">
	<link rel="stylesheet" type="text/css" href="../css/lightening.css">
	<link rel="stylesheet" href="../css/articleAskLogin.css">
	
</head>
<body>
	<?php
		require_once("connectBooks.php");
		require_once("header.php"); 

	?>
	<div class="background">
		<img src="../img/lightening/flash1.png" alt="" class="flash lt1">
		<img src="../img/lightening/flash2.png" alt="" class="flash lt2">
		<img src="../img/lightening/flash3.png" alt="" class="flash lt3">
		<img src="../img/lightening/flash4.png" alt="" class="flash lt4">
		
	</div>

	<div class="headerBlank"></div>

<!-- 要求登入的燈箱 -->
	<div class="ask_wrapper">
	<div class="ask_lightbox">
		<label for="askControl">
			<i class="fa fa-times fa-2x login lightboxClose cursorHand"></i>
		</label>
		<p>請先登入</p>
		<span class="btnM btn">
			<p class="btnText btnText2">登入</p>
		</span>
	</div>
</div>

<!-- 檢舉燈箱 -->
	<div class="reportLightBox">
		<div class="content">
			<div id="cancelBtn">
				<i class="fa fa-times cancelBtni"></i>
			</div>
			<p>請輸入檢舉原因</p>

			<textarea id="reportReason"  required></textarea>
			<span class="btnM msgReportSubmit"><p href="#" class="btnText btnText2">送出</p></span>
		</div>
	</div>


<!-- 成功評價的燈箱 -->
<div class="win_wrapper">
	<div class="win_lightbox">
		<label for="winControl">
			<i class="fa fa-times fa-2x lightboxClose cursorHand" id="winControl"></i> 
		</label>
		<p>您已成功評價</p>
	</div>
</div>
<!-- 成功收藏的燈箱 -->
<div class="collection_wrapper">
	<div class="collection_lightbox">
		<label for="colControl">
			<i class="fa fa-times fa-2x lightboxClose cursorHand" id="colControl"></i>
		</label>
		<p>您已成功收藏</p>
	</div>
</div>



<!-- 標題 -->
	<h2>搞定水逆，讓你全家不再水逆</h2>

	<div class="specialColumn">
<!-- 外框專用 -->
		<div class="border"></div>
		<div class="columnBorder">
			<div class="authorIntro">
				<div class="authorPhoto">
					<img src="../img/findTeacher/horseman.jpg">
				</div>
<!-- 作者區 -->
				<div class="author">
					<div class="intro">
						<a href="">馬男波傑克</a>
						<p>文章人氣:2565</p>
						<p>2017/12/2 00:17:31</p>
					</div>
					<div class="links">
						<div class="btns">
							<span class="btnM collection">
								<p class="btnText btnText2">收藏</p>
							</span>
						</div>

<!-- 收藏php -->
<?php if(isset($_SESSION["mem_no"])){ ?>
	<script>
		$('.collection').click(function(){
			var xhr = new  XMLHttpRequest();
			xhr.onload=function(){
				if(xhr.status ==200){
					$('.collection_wrapper').css('display','block');
				}else{
					alert(xhr.status);
				}
			}
			var url="articleCollect.php?mem_no=<?echo $_SESSION["mem_no"]?>&art_no="<?php $_REQUEST["art_no"]?>;
			xhr.open("get",url,true);
			xhr.send(null);
		});
	</script>

<?php }else{ ?>
		 <script>
			 $('.collection, .login.lightboxClose').click(function(){
				$('.ask_wrapper').css('display','block');
			 });
		 </script>
<?php
	}
?>
<!-- 收藏php結束 -->


<!-- 星星評價 -->
			<div class="stars">
			<div class="starCount"></div>	
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
			</div>
		</div>
	</div>
</div>

<!-- 評價星等php -->
<?php
try{
	$sql="select * from art_review where art_no =?";
	$check=$pdo->prepare($sql);
	$check->bindValue(1,$_REQUEST["art_no"]);
	$check->execute();
	$count=$check->rowcount();
	$starScore=0;
	while($checkRow=$check->fetchObject()){
		$starScore+=$checkRow->art_star;
	}
	$starEnd=round($starScore/$count,1);
	$starEnd1=ceil($starScore/$count);


	if(isset($_SESSION['mem_no'])){
		$sql="select * from art_review where  art_no =? and mem_no=?";
		$check1=$pdo->prepare($sql);
		$check1->bindValue(1,$_REQUEST["art_no"]);
		$check1->bindValue(2,$_SESSION['mem_no']);
		$check1->execute();
		$checkRow1=$check1->fetchObject();
		if($check->rowcount()!=0){
		?>
			<script>
				var star1= <?echo  $checkRow1->art_star;?>;
				var star=<?php echo $starEnd ;?>;
				var inputElems= $('.teacherStar input[type="radio"]');
				inputElems[5-star1].checked=true;				
				for(var i=0;i<5;++i){
					$(inputElems[i]).disabled=false;
				}
				$('.starCount').html(star);
			</script>
	<?php
		}	
	}else{
	?>
		<script>
			var star=<?php echo $starEnd ;?>;
			console.log(star);
			var star1=<?php echo $starEnd1 ;?>;
			console.log(star1);			
			$('.starCount').html(star);
			var inputElems= $('.teacherStar input[type="radio"]');
			inputElems[5-star1].checked=true;
			for(var i=0;i<5;++i){
				inputElems[i].disabled=true;
				inputElems[i].click(function(){
					$('.ask_wrapper').css('display','block');
				});
			}
		</script>



	<?php } ?>
	<!-- 評價收藏登入燈箱控制 -->
<script>
	$(document).ready(function () {
		$('.ask_wrapper .lightboxClose').click(function(){
			$('.ask_wrapper').css('display','none');
		});
		$('.ask_wrapper .btn ').click(function(){
			$('.loginLightbox').css({
				'opacity': '1',
				'right': '0',
				'transition': 'opacity 0.2s'
			});
			$('.ask_wrapper').css('display','none');
		});
		$('.collection_wrapper .lightboxClose').click(function(){
			$('.collection_wrapper').css('display','none');
		});
		
		$('.win_wrapper .lightboxClose').click(function(){
			$('.win_wrapper').css('display','none');
		});

		$('.loginClose').click(function(){
				$('.loginLightbox').css({
					'opacity': '0',
					'right': '-100%',
					'transition': 'opacity 0.2s'
				});
				
			});
		var inputElems =document.querySelectorAll('input[type="radio"]');
		<?php if(isset($_SESSION["mem_no"])){ ?>
			for(var i =0;i<inputElems.length;i++){
				inputElems[i].addEventListener('click', checkboxes, false);
			}	
		<?php } ?>
		

	function checkboxes(e){
		var star1=e.target.value-1;
		var xhr = new  XMLHttpRequest();
		xhr.onload=function(){
			if(xhr.status ==200){
				$('.win_wrapper').css('display','block');
				$('.starCount').html(star1+1);
			}else{
				alert(xhr.status);
			}
		}
		var url="starInsert.php?art_no=<?php echo $_REQUEST["art_no"]?>&mem_no=<?php echo @$_SESSION["mem_no"]?>&art_star="+star1;
		console.log(url);
		xhr.open("get",url,true);
		xhr.send(null);
		}	
	});
</script>
<!-- 評價星等結束 -->
<!-- 文章區 -->
			<article>
				<p>
					　　最近正逢水星逆行，到底水逆有多可怕呢？一般來說，運勢變差、身體狀況不好都是常見的現象，其實3C產品也是會受到影響的，就以本月初的iPhone6系列更新完轉圈圈的狀況來說好了，雖然官方說法是系統更新的衝突，但明眼人都知道那只是'官方說法'，事實上很明顯的是受到今年最嚴重水逆的影響，如果不是的話，畫面又怎麼會如同行星自轉般旋轉呢？
				</p>
				<p>
					　　許多人都問我說'老師你怎麼那麼準？'，但我想告訴大家，準的不是老師，而是這個宇宙運行的邏輯。每個人都有自己的特長，我的特長不是我的特長，而是我天生就能參透這宇宙萬物運作的方式，就像騎腳踏車，一旦會了就會了，就像呼吸一樣容易。老師看得到未來會發生的事情，但有得必有失，一旦我開口預測，種種的厄運就會降臨到我身上。在我4歲的時候就知道這是天命，我覺得這個世界需要幫助的人太多，不能因為害怕預測未來所產生的副作用就選擇閉口不提。
				</p>
				<p>
					　　避開水逆很簡單，除了出門在外務必多加小心之外，最重要的是自身的氣場，不論哪個星座，只要人沒有氣，外物就容易入侵，生理的病菌也好，心理的雜念也罷，這些通通都是氣場的影響。
				</p>
				<p>
					　　老師在專欄裡面推薦的開運水晶柱，其實就是一種能夠改變氣場的聖物。若單單只有一個，平時戴在身上就有保護的作用，在半徑１公尺範圍內不會受到水逆的影響，但是如果擁有三個以上，則能產生強大的結界，只要是同一個人所持有的水晶柱，不論範圍多遠，都可以改善氣場。
				</p>
				<p>
					　　曾經有個朋友叫做小陳，單身27年，很鐵齒從來不相信這種東西，經過我再三推薦抱著死馬當活馬醫的想法，總算買了幾個嘗試看看，不到一週已經有6個人向他告白了。很神奇嗎？是很神奇，但這對我來說，不過就是宇宙的運作方式而已。
				</p>
			</article>
		</div>
	</div>

<!-- 會員回復 -->
	<div class="memberReply">
		<div class="border"></div>
		<div class="columnBorder">
			<h3>撰寫留言</h3>
			<form action="articleMsg.php" method="get" id="artForm">
				<textarea id="replyArea" name="replyText"></textarea>
				<input class="btnM btnText btnText2" type="button" value="回　覆" onclick="formSubmit();">
			</form>
		</div>
	</div>
<?php if(isset($_SESSION["mem_no"])){?>
		<script>
			function formSubmit(){
				$('#artForm').submit();
			}
		</script>
	<?php }else{?>
			<script>
			$('.memberReply input,.login.lightboxClose').click(function(){
					$('.ask_wrapper').css('display','block');
				});
				</script>
	<?php }?>
<!-- 留言區 -->
	<script>
	count=0;
	</script>
<?
	
	
    $sql="select * from message where art_no=?";
    $message=$pdo->prepare($sql);
    $message->bindValue(1,$_REQUEST["art_no"]);
	$message->execute();
    while($msgRow=$message->fetchObject()){
		$mem_no=$msgRow->mem_no;
        $sql1="select mem_nn from member where mem_no=?";
		$mem=$pdo->prepare($sql1);
		$mem->bindValue(1,$mem_no);
		$mem->execute();
		$memRow=$mem->fetchObject();
?>
        <div class="replys">
			<div class="border"></div>
			<div class="columnBorder">
			<div class="authorIntro">
				<div class="authorPhoto">
					<img src="../img/specialColumn/jessePinkman.jpg">
				</div>
				<div class="author">
					<div class="intro">
						<a href=""><?echo $memRow->mem_nn?></a>
						<p> <? echo $msgRow->msg_time?> </p>
					</div>
					<div class="links">
						<div class="btns">
							<span class="btnM report">
								<input type="hidden" value="<?echo $msgRow -> msg_no;?>">
								<p class="btnText btnText2">檢舉</p>
							</span>
						</div>
						<div class="stars">
	<!-- 評價星等 -->
						</div>
					</div>
					
				</div>
				
			</div>
			<article>
				<p><? echo $msgRow->msg_content?></p>
			</article>
			
		</div>
	</div>
	<?
	}
?>
<!-- 檢舉php -->


<script>
	window.addEventListener('load',function(){
		var report=document.getElementsByClassName('report');
		for(var i=0;i<report.length;i++){
			report[i].addEventListener('click', function(){
				var textarea=document.getElementById('reportReason').value;
				var msg_no=this.childNodes[1].value;
				console.log(msg_no);
				var xhr= new XMLHttpRequest();
				if(xhr.status == 200){
					var a = this.responseText;
					if(a==2){
						 
					}
				}else{

				}
				var url = "msgReportCheck.php?msg_no="+msg_no+"";				
				console.log(url);
				xhr.open("Get", url, true);
				xhr.send(null);
			}, false);
		}
	},false);
</script>


	<?php
	 if(isset($_SESSION["mem_no"])){ ?>
		 <script>
			window.addEventListener('load',function(){
				 //這是燈箱送出按鈕
				var msgSubmit=document.getElementsByClassName('msgReportSubmit');

				 for(var i=0;i<msgSubmit.length;++i){
					msgSubmit[i].addEventListener('click', function(){
						var textarea=document.getElementById('reportReason').value;
						var msg_no=$('.replys input').val();
						console.log(msg_no);
						var xhr= new XMLHttpRequest();
						alert('get');
						
						if(xhr.status == 200){
							alert('已送出檢舉');
							closeReport();
						}else{
							closeReport();
						}
						var count =<?php echo $count?>;
						// console.log(count);
						if(count == 0){
							console.log('');
							var url = "msgReportCheck.php?msg_no="+msg_no"";
							
							xhr.open("Get", url, true);
							xhr.send(null);
							alert('finish');
							closeReport();
						}else{
							alert("您已經檢舉過了。");
						}
					}, false);
							}
							
				},false);
		 </script>
	<?php }else{  ?>
			<script>
				$('.msgReportSubmit').click(function(){
					$('.ask_wrapper').css('display','block');
					var lightBox = document.getElementsByClassName('reportLightBox')[0];
					lightBox.style.visibility = 'hidden';
					lightBox.style.opacity = 0;
				});	
			</script>
<?php	}

		
	
?>

	<script>

			//這是檢舉燈箱
			var lightBox = document.getElementsByClassName('reportLightBox')[0];
			
						//這是燈箱關閉按鈕
			var cancelBtn = document.getElementById('cancelBtn');

			cancelBtn.addEventListener('click', function(){
					closeReport();				
			}, false);
			//燈箱關閉按鈕按了關閉燈箱
			
			//送出按鈕按了會顯示送出訊息，然後關閉燈箱
			


			//關閉燈箱的function
			function closeReport(){
				lightBox.style.visibility = 'hidden';
				lightBox.style.opacity = 0;
			}
			//打開燈箱的function
			function showReport(){
				lightBox.style.visibility = 'visible';
				lightBox.style.opacity = 1;
			}
			var reply = document.getElementById('replyArea');

			reply.onclick = function(){
				this.style.height = '300px';
			}
		
	</script>

 	<?
	// 檢舉結束
		

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


</body>
</html>