<?php 
	if(empty($_SESSION["fort_sta"])){
		$_SESSION["fort_sta"] = 0;
	}
	if(empty($_SESSION["cartCount"])){
		$_SESSION["cartCount"] = 0;
	}
	if(empty($_SESSION["karma_inc"])){
		$_SESSION["karma_inc"] = 0;
	}
	if(!isset($_SESSION["karma_val"])){
		$_SESSION["karma_val"] = 100;
	}
?>
	<!-- hamnurger -->
	<!-- 漢堡選單 -->
		<input type="checkbox" name="" id="menuControl">

		<label for="menuControl" class="hamburger">
				<div></div>
				<div></div>
				<div></div>
		</label for="menuControl">

	<div class="menu">
		<!-- logo -->
		<a  href="realIndex.php"><img  class="logo" src="../img/share/LOGO-08.png" ></a>

		<!-- 右邊的title區塊 -->

			<div class="left">
				<p>距離下次水星逆行還有</p>
				<table class="countdownContainer">
						<tr class="info">
							<td class="days"></td><td>天</td>
							<td class="hours"></td><td>時</td>
							<td class="minutes"></td><td>分</td>
							<td class="seconds"></td><td>秒</td>
						</tr>
						
					</table>
			</div>
		<!-- 中間的line -->
			<div class="line"></div>
			<!-- 右邊的time區塊 -->
			<div class="right">
				<a class="title" href="findTeacher.php">
					<span class="findTeacher"></span>
				</a>
				<a class="title" href="dozen_store.php">
					<span class="store"></span>
				</a>
				<a class="title" href="member.php">
					<span class="member"></span>
				</a>
			</div>	
	</div>

	<!-- hambergur end -->
		<!-- ====================header==================== -->
	<div class="header">

		<!-- 中間logo -->
		<div class="logo">
			<a href="realIndex.php">
				<img src="../img/share/LOGO-08.png">
			</a>
		</div>
		
		<!-- 右邊會員專區 -->
		<div class="memArea">
			<ul><?php
				
						if (isset($_SESSION["mem_no"]) ) {
							$sql = "select * from member where mem_no = :mem_no";
							$member = $pdo->prepare($sql);
							$member -> bindValue(":mem_no",$_SESSION["mem_no"]);
							$member -> execute();
							$memRow = $member->fetchObject();}
						if (isset($_SESSION["mem_no"]) && $memRow->mem_sta!=0) {
							printf("\n\t\t\t\t\t\t\t\t<li><p>%s您好/登出</p></li>", $memRow->mem_nn);
							if (!empty($_SESSION["cartCount"])) {
								printf("\n\t\t\t\t\t\t\t\t<li><a href='dozen_storeCart.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i><span>%d</span></a></li>", $_SESSION["cartCount"]);
							}
							$sql = "select * from article";
							$article = $pdo->prepare($sql);
							$article->execute();
							$newMessageCount = 0;
							while($artRow = $article->fetchObject()){
								$sql = "select * from message msg
										join article art on msg.art_no = art.art_no
										where msg.mem_no = :mem_no and msg.art_no = :art_no 
										and msg.last_view < art.art_update_time and msg.msg_time in (select max(msg_time) from message where mem_no = :mem_no group by art_no)";
								$message = $pdo->prepare($sql);
								$message -> bindValue(":mem_no",$_SESSION["mem_no"]);
								$message -> bindValue(":art_no",$artRow->art_no);
								$message -> bindValue(":mem_no",$_SESSION["mem_no"]);
								$message -> execute();
								$msgRow = $message->fetchObject();
								$sql = "select * from art_collection collect
										join article art on collect.art_no = art.art_no 
										where collect.mem_no = :mem_no and collect.art_no = :art_no and collect.last_view < art.art_update_time";
								$collection = $pdo->prepare($sql);
								$collection -> bindValue(":mem_no",$_SESSION["mem_no"]);
								$collection -> bindValue(":art_no",$artRow->art_no);
								$collection -> execute();
								$collectRow = $collection->fetchObject();
								$newMessageCount += $message->rowCount()||$collection->rowCount();
							}
							if($newMessageCount>0){
								printf("\n\t\t\t\t\t\t\t\t<li><a href='replyView.php?page=1'>新訊息(%d)</a></li>", $newMessageCount);
							}
							$sql = "select * from member join teacher using(mem_no) where mem_no = :mem_no and teacher_app = 1" ;
							$teacher = $pdo->prepare($sql);
							$teacher -> bindValue(":mem_no",$_SESSION["mem_no"]);
							$teacher -> execute();
							$teacherRow = $teacher->fetchObject();
							if($teacher->rowCount()!=0){
								$_SESSION['teacher_no'] = $teacherRow->teacher_no;
								printf("\n\t\t\t\t\t\t\t\t<li><a href='specialColumn.php?teacher_no=%d'>我的專欄</a></li>", $_SESSION["teacher_no"]);
							}
						}
						else{
							printf("\n\t\t\t\t\t\t\t\t<li><a href='#'>登入/註冊</a></li>");
							if (isset($memRow->mem_sta)) {?>
								<script type="text/javascript">
									alert('此帳號已被停權');
								</script>
							<?php }
							if (!empty($_SESSION["cartCount"])) {
								printf("\n\t\t\t\t\t\t\t\t<li><a href='dozen_storeCart.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i><span>%d</span></a></li>", $_SESSION["cartCount"]);
							}
						}
					
				
			?></ul>
		</div>

		<!-- 右邊水逆倒數 -->
		<div class="countdown">
			<div class="countdownAlert"></div>
			<table class="countdownContainer">
					<tr class="info">
						<td>水星逆行倒數 :</td>
						<td class="days"></td><td>天</td>
						<td class="hours"></td><td>時</td>
						<td class="minutes"></td><td>分</td>
					</tr>
					
				</table>
		</div>
	</div>
	<!-- 業力球 -->

	
		<div class="showKarma"> 
			<a class="showKarma" href="karmainfo.php">
			<p>業障干擾值</p>
			<img src="../img/showKarma/karma_frame.png" alt="" class="karFrame">
			<div class="balls">
				<img src="../img/showKarma/ball.png" alt="" class="outBall">
				<img src="../img/showKarma/ballDown.png" class="outBall outBall2" alt="">		
				<svg id="fillgauge2" width="90" height="90"></svg>
				
			</div>
			<p class="number">
			</p></a>
		</div>
	
	    <script language="JavaScript">
		var karCount =<?php echo $_SESSION["karma_val"]; ?>;
        var config1 = liquidFillGaugeDefaultSettings();
        config1.circleColor = "#850000";
        config1.textColor = "#d00";        
        config1.waveTextColor = "#ddd";
        config1.waveColor = "#eb0202";
        config1.circleThickness = 0.05;
        config1.textVertPosition = 0.5;
        config1.waveAnimateTime = 3000;
        var gauge2= loadLiquidFillGauge("fillgauge2", karCount, config1);    
    </script>


	<!-- 燈箱開始 -->
	
	<input type="checkbox" id="loginControl">
		<div class="loginLightbox">
			<div class="boxContent">
                <i class="fa fa-arrow-circle-o-left fa-2x backToLogin cursorHand" aria-hidden="true"></i>
                <label for="loginControl">
				    <i class="fa fa-times fa-2x loginClose cursorHand"></i>
                </label>
                <form action="login.php" method="post" class="loginForm">
                    <p>登入會員</p>
                    <p>
                        <span>帳號：</span>
                        <span><input type="text" name="mem_acc" maxlength="12" required></span>
                    </p>
                    <p>
                        <span>密碼：</span>
                        <span><input type="password" name="mem_psw" maxlength="12" required></span>
                    </p>
                    <p>
                        <input type="submit" value="登入" class="loginBtn cursorHand">
                        <button class="loginBtn cursorHand">註冊</button>
                    </p>
                </form>
                <form action="register.php" method="post" class="registerForm">
                    <p>註冊為會員</p>
                    <p>
                        <span>新增帳號：</span>
                        <span><input type="text" name="mem_acc" maxlength="12" required></span>
                    </p><p>
                        <span>新增密碼：</span>
                        <span><input type="password" name="mem_psw" minlength="4" maxlength="12" required></span>
                    </p><p>
                        <span>確認密碼：</span>
                        <span><input type="password" name="" minlength="4" maxlength="12" required></span>
                    </p><p>
                        <span>暱稱：</span>
                        <span><input type="text" name="mem_nn" maxlength="12" required></span>
                    </p>
                    <p>
                        <span>電話：</span>
                        <span><input type="text" name="mem_tel" maxlength="12"></span>
                    </p>
                    <p>
                        <input type="submit" value="提交" class="loginBtn cursorHand">
                        <input type="reset" value="重填" class="loginBtn cursorHand">
                    </p>
                </form>
			</div>
		</div>
	
	<!-- login燈箱結束 -->
