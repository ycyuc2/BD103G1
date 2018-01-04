//找到按鈕
		var addBtn = document.getElementById('addTeacher');
		//建立按鈕click事件聆聽功能
		addBtn.addEventListener('click', function(){
			//找到moveArea
			var moveArea = document.getElementById('moveArea');
			//建立p及p內容
			var contentP = document.createElement('p');
			contentP.innerText = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae veniam quo quos nisi culpa exercitationem omnis ducimus, voluptatibus quisquam adipisci? Illo in exercitationem aliquam ipsa repudiandae commodi cum, assumenda totam laboriosam quibusdam. Nulla ratione laboriosam et illum quo culpa quaerat, veniam deserunt iure excepturi ipsam molestiae provident quod aut, modi.";
			//建立div
			var contentDiv = document.createElement('div');
			//給予此div與其他物件之相同class名稱
			contentDiv.className += 'box';

			//找到所有class為box的物件
			// var boxes = [];
			// boxes = document.getElementsByClassName('box');
			// console.log(boxes[0]);
			//產生Left值
			function getLeft(){
				var boxes = [];
				//找到所有class名為box的物件加入陣列
				boxes = document.getElementsByClassName('box');
				
				//宣告一個陣列
				var leftValues = [];
				console.log(boxes);
				
				//找到所有box的left值，並加入陣列
				for (var i = 0; i < boxes.length; i++) {
					leftValues[i] = window.getComputedStyle(boxes[i]).getPropertyValue('left');
					console.log(leftValues);

				}
				//產生隨機數
				
				var tempLeftValue;
				function findLeft(){
					var newDivLeftValue = Math.floor(Math.random() * 4700);

					for(var j = 0; j < leftValues.length; j++){
						//進行比較

						if (newDivLeftValue > parseInt(leftValues[j]) + 300 || newDivLeftValue < parseInt(leftValues[j]) - 300 ) {
							tempLeftValue = newDivLeftValue;
							console.log(newDivLeftValue);
						}else {
							if(newDivLeftValue > parseInt(leftValues[j]) + 300 || newDivLeftValue < parseInt(leftValues[j]) - 300 === false){
								alert('full');
							}else{
								findLeft();
							}
							
						}
					}
				}
				findLeft();
				
				return tempLeftValue;
				
			}
			//產生Top值
			// function getTop(){
			// 	var newDivLeftValue = Math.floor(Math.random() * 2700) ;
			// }
			
			//給予此div位置
			contentDiv.style.left = getLeft() + 'px';
			contentDiv.style.top = 300 + 'px';
			//將p加入div
			contentDiv.appendChild(contentP);
			//將div加入地圖
			moveArea.appendChild(contentDiv);
		}, false);