		
//11111隨機加入老師
//找到按鈕
var addBtn = document.getElementById('addTeacher');
//建立按鈕click事件聆聽功能
var moveArea = document.getElementById('moveArea');
var boxes = [];

//找到所有tag名為td的物件加入陣列
boxes = document.getElementsByTagName('li');
function addTeacher(){
	//找到moveArea
	
	//建立img
	var contentImg = document.createElement('img');
	contentImg.src = "../img/findTeacher/teacher1.png";
	contentImg.style.width = '100%';
	//建立div
	var contentDiv = document.createElement('div');
	//給予此div與其他物件之相同class名稱
	contentDiv.className += 'box';
	console.log(boxes.length);
	//隨機產生一個介於0~td數量-1的整數
	var randomValue = Math.floor(Math.random() * boxes.length - 1);

	//將img放入div
	contentDiv.appendChild(contentImg);

	contentDiv.style.left = Math.floor(Math.random() * 58) + 'px';
	contentDiv.style.top = Math.floor(Math.random() * 76) + 'px';

	//將div放入陣列中隨機一個li
	if (boxes[randomValue].childNodes.length < 1) {
		boxes[randomValue].appendChild(contentDiv);
		boxes[randomValue].style.userSelect = 'auto';
	}else{
		addTeacher();
	}
}

addBtn.addEventListener('click', addTeacher, false);


//22222 iscroll效果
var container = document.getElementById('moveContainer');

var theScroll;

//iscroll控制
function scroll() {
    theScroll = new IScroll(container,{
    	scrollX : true,
    	scrollY : true,
    	freeScroll : true,
    	bindToWrapper : true,
    	mouseWheelSpeed : 3,
    	deceleration : 0.02,
    	scrollbars : true,
    	interactiveScrollbars : true
    });   
}


//判斷瀏覽器寬
function queryWidth(){
	var screenWidth = window.innerWidth;
	//寬度大於480使用iscroll拖曳效果
	if (screenWidth > 480 ) {
			scroll();
			theScroll.scrollTo(-1600,-1000);
	//小於則否，並將空白老師欄位清除
	}else{
		clearEmptyLi();
	}
}


//清除空白老師欄位
function clearEmptyLi(){
	var screenWidth = window.innerWidth;
	console.log(screenWidth);
	if (screenWidth < 480 ) {
		console.log(boxes);
		for (var i = 0; i < boxes.length; i++) {
			if (boxes[i].childElementCount < 1) {
				boxes[i].style.display = 'none';
			}
		}
	}else{
		for (var i = 0; i < boxes.length; i++) {
			if (boxes[i].childElementCount < 1) {
				boxes[i].style.display = 'inline-block';
			}
		}
	}

};


//dom完成執行上述瀏覽器寬度查詢function
document.addEventListener('DOMContentLoaded', queryWidth, false);
//當瀏覽器resize時，重新查詢寬度
window.addEventListener('resize', queryWidth, false );


