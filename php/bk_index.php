<?php 
	session_start();
	ob_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>後端首頁</title>
	<link rel="stylesheet" type="text/css" href="../css/bk_basic.css">
</head>
<body>
<!--
	1後端首頁
	2網頁維護
	2-1 前端首頁維護
	2-1-1 線上算命資料庫
	2-1-2 配對資料庫			
	2-1-3 業力更新排程			未完成
	2-2 老師專區維護
	2-2-1 專欄管理
	2-2-2 發文檢舉管理		
	2-2-3 留言檢舉管理			新增
	2-3 商城維護
	2-3-1 商品管理
	2-4 推薦管理				刪除
	3 交易管理
	3-1 檢視交易紀錄
	3-2 訂單管理
	4 會員管理
	4-1 檢視會員資料
	4-2 老師資格審核
-->
	
	<!-- header -->

	<!-- header end -->
	<div class="wrapper">
		<div class="left">
			<ol class="sideNav">
				<li class="fstNav maintain">網頁維護
					<ol class="innerNav maintain">
						<li class="p1"><a class="queryPage" href="bk_fortuneDB.php">前端首頁維護</a></li>
						<li class="p2"><a class="queryPage" href="bk_forum.php">老師專區維護</a></li>
						<li class="p3"><a class="queryPage" href="bk_product.php">商城維護</a></li>
					</ol>
				</li>
				<li class="fstNav trade">交易管理
					<ol class="innerNav trade">
						<li class="p4"><a class="queryPage" href="bk_trade.php">檢視交易紀錄</a></li>
						<li class="p5"><a class="queryPage" href="bk_pdList.php">訂單管理</a></li>
					</ol>
				</li>
				<li class="fstNav member">會員管理
					<ol class="innerNav member">
						<li class="p6"><a class="queryPage" href="bk_member.php">檢視會員資料</a></li>
						<li class="p7"><a class="queryPage" href="bk_teacherApplication.php">老師資格審核</a></li>
					</ol>
				</li>
			</ol>
		</div>

		<!-- end left -->

		<div class="right">
			<ol class="breadcrumb">
				<li>
					<a href="#">首頁</a>
				</li>
				<li class="active">前端首頁維護</li>
			</ol>

			<ol class="rightNav3">
				<li><a href="#">線上算命資料庫</a></li>
				<li><a href="#">配對資料庫</a></li>
				<li><a href="#">業力更新排程</a></li>
			</ol>
		</div>

		<!-- end right -->

	</div>

<!-- <script>
	window.addEventListener('load', function(){
		var btns = document.getElementsByClassName('queryPage');
		for (var i = 0; i < btns.length; i++) {
			btns[i].addEventListener('click', getPages, false);
		}

		function getPages(){
			
			var xhr = new XMLHttpRequest();
			xhr.onload=function (){
			    if( xhr.status == 200 ){
			        //alert( xhr.responseText );  
			        //modify_here
			        document.getElementsByClassName("right")[0].innerHTML = xhr.responseText;
			     }else{
			        alert( xhr.status );
			     }
			  }//xhr.onreadystatechange
			  
			  var url = "../php/queryPage.php?page=" + this.parentNode.className;
			  xhr.open("Get", url, true);
			  xhr.send( null );


		}




	})
</script> -->
    
</body>
</html>