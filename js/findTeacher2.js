		
//11111隨機加入老師
//找到按鈕
var addBtn = document.getElementById('addTeacher');
//建立按鈕click事件聆聽功能
var moveArea = document.getElementById('moveArea');
var boxes = [];
var teachersHiddenInput = document.getElementsByClassName('teachersHiddenInput');
//找到所有tag名為li的物件加入陣列
boxes = document.getElementsByTagName('li');
console.log(moveArea);
addTeacher();
function addTeacher(){
	//找到moveArea
	
	for (let i = 0; i <= teachersHiddenInput.length; i++) {
		console.log(teachersHiddenInput[1].value);
			
		var contentImg = document.createElement('img');
		contentImg.src = '../img/findTeacher/' + teachersHiddenInput[i].value;
		contentImg.style.width = '100%';
		//建立div
		var contentDiv = document.createElement('div');
		//給予此div與其他物件之相同class名稱
		contentDiv.className += 'box';
		// console.log(boxes.length);
		//隨機產生一個介於0~td數量-1的整數，作為陣列的索引
		var randomValue = Math.floor(Math.random() * boxes.length - 1);

		//將img放入div
		contentDiv.appendChild(contentImg);

		//讓div在li範圍內隨機擺放
		contentDiv.style.left = Math.floor(Math.random() * 58) + 'px';
		contentDiv.style.top = Math.floor(Math.random() * 76) + 'px';
		//將div放入陣列中隨機一個li
		if (boxes[randomValue].childNodes.length < 1) {
			boxes[randomValue].appendChild(contentDiv);
			boxes[randomValue].style.userSelect = 'auto';
		}else{
			//li已經有小孩的話重新執行function
			addTeacher();
		}
	}
}

// addBtn.addEventListener('click', addTeacher, false);


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
			sortLi();
			theScroll.scrollTo(-1600,-1000);
	//小於則否，並將空白老師欄位清除
	}else{
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
				boxes[i].querySelector('.box').style.margin = 'auto';
				
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
window.innerWidth.addEventListener('resize', queryWidth, false );


