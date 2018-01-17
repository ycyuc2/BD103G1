<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<script src="../js/iscroll.js"></script>
	<!-- <script src="../js/iscroll-zoom.js"></script> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/findTeacher.css">
	<link rel="stylesheet" type="text/css" href="../css/dozen_nav.css">
	<link rel="stylesheet" type="text/css" href="../css/btn.css">
	<title>找老師</title>
</head>
<body id="body">

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



	<!-- 搜尋icon -->
	<div id="search">
		<img src="../img/findTeacher/magnify.png">
	</div>


	<!-- 搜尋按鈕 -->
	<div id="inp">
		<img class="topic" src="../img/findTeacher/tilte.png">
		<div class="findTeacher">
			<input class="teacherFinder" type="text" onkeyup="findTeacher()">
			<ul id="teacherList">
			</ul>
			<input type="submit" name="" value="找老師">
		</div>
	</div>

	<!-- 說明頁燈箱 -->
	<div class="directions">
		<div class="content">
			<p>點擊搜尋按鈕可依關鍵字搜尋老師，或按住滑鼠拖曳在茫茫星空中找尋與你有緣的老師。</p>
			<div class="btnarea"><button id="clickCloseDirection">我知道了</button></div>
		</div>
		
	</div>


	<!-- 說明頁js -->
	<script>


	</script>




	<!-- 老師細節燈箱 -->
	<div id="teacherInfo">
		<div id="closeBtn">
			<i class="fa fa-times"></i>
		</div>
		<div class="columnBorder">
			
			<div class="authorInfo">
				<div class="authorPhoto">
					<div class="pic">
						<div class="frameBorder"></div>
						<img src="../img/findTeacher/horseman.jpg" alt="">
					</div>
				</div>
				<div class="authorIntro">
					<h2>馬男波傑克</h2>
					<p>　　前中原大學占星社社長，因其對星座算命有著獨到的見解，且本身有著可以預測未來的天命...</p>
					<p>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</p>

				</div>
			</div>

			<div class="teacherMaps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.7591798476183!2d121.21762541488746!3d24.940272548196493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34682254583cc8a3%3A0x75626fd1a8bef7a8!2zMzI05qGD5ZyS5biC5bmz6Y6u5Y2A55Kw5Y2X6Lev5LiJ5q61MTIz6Jmf!5e0!3m2!1szh-TW!2stw!4v1514826750576" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="teacherColumn">
				<p>最新命運解析</p>
				<div class="column">
					<a href="#"><h3>搞定水逆，讓你全家不再水逆!</h3></a>
					<p>
						　　最近正逢水星逆行，到底水逆有多可怕呢？一般來說，運勢變差、身體狀況不好都是常見的現象，其實3C產品也是會受到影響的，就以本月初....
					</p>
				</div>
				<div class="teacherInfoBtn">
					<div class="left">
						<span class="btnM">
							<a href="schedule.html" class="btnText btnText4">
								進入行程
							</a>
						</span>
					</div>
					<div class="right">
						<span class="btnM">
							<a href="specialColumn.html" class="btnText btnText4">
								進入專欄
							</a>
						</span>
					</div>
					
				</div>
			</div>
		</div>
	</div>



	<!-- 裝拖曳效果的容器 -->
	<div id="moveContainer">
		<!-- 拖曳效果位置 -->
		<div id="moveArea">
			<!-- 預設的老師儲存空間 -->
			<ul class="qqArea">
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
					<li class="teacherContainer"></li>
			</ul>
			
		</div>
		
	</div>
<?php 

try {
	require_once("connectBD103G1yu.php");
	$sql = "select * from teacher";
	$teachers = $pdo->query($sql);
	$teacher_rows = $teachers->fetchAll(PDO::FETCH_ASSOC);

	foreach( $teacher_rows as $i=>$teacherRow){
?>
<?php echo '<input type="hidden" class="teachersHiddenInput" value="',$teacherRow["teacher_img"],'" name="',$teacherRow["teacher_nn"],'">';

?>
		
	
	
<?php		
	}

} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?> 

<script>
	//找到所有tag名為li的物件加入陣列
	var boxes = document.getElementsByClassName('teacherContainer');
		
	//找到php產生的隱藏input
	var teachersHiddenInput = document.getElementsByClassName('teachersHiddenInput');
		
	//設定addTeacher的初始次數為0
	var addTeacherCount = 0;

	addTeacher(addTeacherCount);

	for (let i = 0 ; i < teachersHiddenInput.length; i++) {

			var teacherListUl = document.getElementById('teacherList');
			var teacherListLi = document.createElement('li');
			
			teacherListLi.innerText = teachersHiddenInput[i].name;
			teacherListUl.appendChild(teacherListLi);
			teacherListLi.addEventListener('click', moveToTeacher, false);
	}

		




	function addTeacher(addTeacherCount){
		//建立img

		for (let i = addTeacherCount ; i < teachersHiddenInput.length; i++) {
			console.log(teachersHiddenInput[i].value);
			
			//建立img
			var contentImg = document.createElement('img');
			contentImg.src = '../img/findTeacher/' + teachersHiddenInput[i].value;
			contentImg.style.width = '100%';

			//建立border
			var frameBorder = document.createElement('div');
			frameBorder.className += 'frameBorder';

			//建立隱藏input
			var hdInput = document.createElement('input');
			hdInput.setAttribute('type', 'hidden');
			hdInput.setAttribute('value', i+1);
			hdInput.setAttribute('name', teachersHiddenInput[i].name);
			//建立div
			var contentDiv = document.createElement('div');
			//給予此div與其他物件之相同class名稱
			contentDiv.className += 'box';
			// console.log(boxes.length);
			//隨機產生一個介於0~td數量-1的整數，作為陣列的索引
			var randomValue = Math.floor(Math.random() * boxes.length);

			//將隱藏欄位及img放入div
			contentDiv.appendChild(hdInput);
			contentDiv.appendChild(frameBorder);
			contentDiv.appendChild(contentImg);


			contentDiv.addEventListener('click', getTeacher, false);
			contentDiv.addEventListener('click', showTeacher, false);
			//讓div在li範圍內隨機擺放
			contentDiv.style.left = Math.floor(Math.random() * 58) + 'px';
			contentDiv.style.top = Math.floor(Math.random() * 76) + 'px';
			//將div放入陣列中隨機一個li
			console.log(randomValue);
			if (boxes[randomValue].childNodes.length < 1) {
				boxes[randomValue].appendChild(contentDiv);
				boxes[randomValue].style.userSelect = 'auto';
			}else{
				//li已經有小孩的話重新執行function，並從第i個開始
				addTeacher(i);
			}
		}
	}


	function moveToTeacher(){
		console.log(this.innerText);
		for (var i = 0; i < boxes.length; i++) {
			if (boxes[i].childNodes.length>0) {
				if (this.innerText == boxes[i].firstChild.firstChild.name) {
					var childNum = i+1;
					theScroll.scrollToElement('.qqArea > li:nth-child('+childNum+')',3000,true,true,IScroll.utils.ease.circular);
					// theScroll.zoom(0.7, 750);
					// theScroll.zoom(1, 750);
					// setTimeout(function(){
					// 	theScroll.zoom(1, 750);
					// }, 2000);
					// theScroll.zoom(1, 900);
					// theScroll.scrollTo(-500,-200);
				}
			}
		}


	}


	function getTeacher(){

		// console.log(this.firstChild.value);
		var xhr = new XMLHttpRequest();
		xhr.onload=function (){
		    if( xhr.status == 200 ){
		        //alert( xhr.responseText );  
		        //modify_here
		        document.getElementsByClassName("columnBorder")[0].innerHTML = xhr.responseText;
		     }else{
		        alert( xhr.status );
		     }
		  }//xhr.onreadystatechange
		  
		  var url = "teacherInfo.php?teacher_no=" + this.firstChild.value;
		  xhr.open("Get", url, true);
		  xhr.send( null );
	}






	function findTeacher(){
		var input = document.getElementsByClassName('teacherFinder')[0];
		var filter = input.value.toUpperCase();
		var ul = document.getElementById('teacherList');
		var li = ul.childNodes;
		// console.log(li[1].innerText);
		for (var i = 1; i < li.length; i++) {
			console.log(li[i].innerText);
	        if (li[i].innerText.toUpperCase().indexOf(filter) > -1) {
	            li[i].style.display = "";
	        } else {
	            li[i].style.display = "none";
	        }
		}
	}






	var teachers = document.getElementsByClassName('box');

	for (var i = 0; i < teachers.length; i++) {
		teachers[i].addEventListener('click', showTeacher, false);
	}
	//找到老師
	// var horseman = document.getElementById('defaultTeacher');

	//建立事件聆聽功能，點擊使用showTeacher這個function
	// horseman.addEventListener('click', showTeacher, false);

	//找到關閉老師細節的按鈕
	var closeBtn = document.getElementById('closeBtn');

	//建立事件聆聽功能，點擊使用closeTeacherInfo這個function
	closeBtn.addEventListener('click', closeTeacherInfo, false);

	//找到搜尋按鈕
	var search = document.getElementById('search');
	console.log(search);
	//找到搜尋div
	var searchBox = document.getElementById('inp');

	//建立事件聆聽功能，點擊使用searchTeacher這個function
	search.addEventListener('click', searchTeacher, false);

	var moveArea = document.getElementById('moveArea');

	//若搜尋開著進行滑動則關閉搜尋
	moveArea.addEventListener('click', clearInp, false);

	function clearInp(){
		searchBox.style.transform = 'scale(0,0)';
		searchBox.style.opacity = 0;
		searchBox.style.top = '20px';
		searchBox.style.right = '20px';
	}

	function searchTeacher(){


		//如果搜尋欄是顯示的，就關閉；如果是隱藏的就顯示，並配合transition效果
		if (searchBox.style.opacity == 0) {
			searchBox.style.opacity = 1;
			searchBox.style.right = 'calc(50% - 271px)';
			searchBox.style.transform = 'scale(1,1)';
			searchBox.style.top = '50%';
		}else{
			searchBox.style.transform = 'scale(0,0)';
			searchBox.style.opacity = 0;
			searchBox.style.top = '20px';
			searchBox.style.right = '20px';
		}
	}

	//顯示老師細節
	function showTeacher(){

		//找到老師細節的div
		var teacherInfo = document.getElementById('teacherInfo');

		var screenWidth = window.innerWidth;
		//遵循古法找到物件寬
		var infoWidth = parseInt(window.getComputedStyle(teacherInfo).getPropertyValue('width'));

		var screenWidth = window.innerWidth;
		//判斷寬度是否大於480
		if (screenWidth > 480 ) {
			//這段為toggle效果
			if (teacherInfo.style.visibility === 'visible') {
				teacherInfo.style.visibility = 'hidden';
				teacherInfo.style.opacity = 0;
				search.style.display = 'block';
			}else{
				teacherInfo.style.visibility = 'visible';
				teacherInfo.style.opacity = 1;
				search.style.display = 'none';
			}
		//這段為手機板點擊老師後可以顯示在當前頁面頂端
		}else{
			//chrome無法使用window.scrollTop
			teacherInfo.style.top = document.documentElement.scrollTop + 'px';
			teacherInfo.style.visibility = 'visible';
			teacherInfo.style.opacity = 1;
			search.style.display = 'none';
		}
		
		

	}

	//老師燈箱叉叉按鈕關閉
	function closeTeacherInfo(){
		var teacherInfo = document.getElementById('teacherInfo');

		var search = document.getElementById('search');
		
		//使老師燈箱在顯示狀態無法使用放大鏡
			teacherInfo.style.visibility = 'hidden';
			teacherInfo.style.opacity = 0;
			search.style.display = 'block';
	}


	//22222 iscroll效果
	var container = document.getElementById('moveContainer');

	var theScroll;

	//iscroll控制
	function scroll() {

		var screenWidth = window.innerWidth;
		var optionValue;
		if (screenWidth > 480) {
			optionValue = false;
		}else{
			optionValue = true;
		}
	    theScroll = new IScroll(container,{
	    	scrollX : true,
	    	scrollY : true,
	    	freeScroll : true,
	    	preventDefault: false,
	    	eventPassthrough: optionValue,
	    	bindToWrapper : true,
	    	mouseWheelSpeed : 3,
	    	deceleration : 0.02,
	    	scrollbars : true,
	    	interactiveScrollbars : true
	    	// zoom: true,
	    	// zoomMin: 0.7
	    });   
	}



	//判斷瀏覽器寬
	function queryWidth(){
		var screenWidth = window.innerWidth;
		//寬度大於480使用iscroll拖曳效果
		if (screenWidth > 480 ) {
				scroll();
				sortLi();
				theScroll.scrollTo(-1600,-1000);
		//小於則否，並將空白老師欄位清除，重新呼theScroll
		}else{
			scroll();
			theScroll.destroy();
			theScroll = null;
			
			sortLi();
		}
	}


	//整理空白老師欄位
	function sortLi(){
		var screenWidth = window.innerWidth;
		if (screenWidth < 480 ) {
			//手機板隱藏
			for (var i = 0; i < boxes.length; i++) {
				if (boxes[i].childElementCount < 1) {
					boxes[i].style.display = 'none';
				}if(boxes[i].childElementCount == 1){
					//手機板老師位置能夠置中，並且position不能為static否則border會出問題
					boxes[i].querySelector('.box').style.top = '0px';
					boxes[i].querySelector('.box').style.left = '0px';
					boxes[i].querySelector('.box').style.right = '0px';
					boxes[i].querySelector('.box').style.bottom = '0px';
					boxes[i].querySelector('.box').style.margin = '10px auto 0px auto';
					
				}
			}
		}else{
			//桌機版要恢復
			for (var i = 0; i < boxes.length; i++) {
				if (boxes[i].childElementCount < 1) {
					//使所有沒有小孩的li重新排列為inline-block
					boxes[i].style.display = 'inline-block';
				}if(boxes[i].childElementCount == 1){
					//有小孩的要恢復relative屬性，並在li中再次隨機擺放位置
					boxes[i].querySelector('.box').style.position = 'relative';
					boxes[i].querySelector('.box').style.left = Math.floor(Math.random() * 58) + 'px';
					boxes[i].querySelector('.box').style.top = Math.floor(Math.random() * 76) + 'px';
					
				}
			}
		}

	};


	//dom完成執行上述瀏覽器寬度查詢function
	document.addEventListener('DOMContentLoaded', queryWidth, false);
	//當瀏覽器resize時，重新查詢寬度
	window.addEventListener('resize', queryWidth, false );





	</script>

	
	<!-- <script src="../js/findTeacher2.js"></script> -->

<!-- 水星逆行的ＪＳ程式 含7秒關閉說明 -->
<script type="text/javascript">
	window.onload=countdown;
	function countdown(){

		//順便在7秒後關閉說明
		setTimeout(closeDirections, 7000);


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



	//點擊按鈕亦可關閉說明頁燈箱
	document.getElementById('clickCloseDirection').onclick = closeDirections;
	// 關閉的function
	function closeDirections(){
		var directionLightBox = document.getElementsByClassName('directions')[0];
		directionLightBox.style.visibility = 'hidden';
		directionLightBox.style.opacity = '0';
	}

</script>
</body>
</html>