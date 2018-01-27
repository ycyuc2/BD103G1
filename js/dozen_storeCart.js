window.addEventListener('load', function (){
	var pay = document.getElementsByClassName('pay');
	
	var storage = localStorage;
	
	// if(storage['addItemList']== null){
	//  storage['addItemList'] = '';
	// }
   
	
	
	// var amount = storage.getItem('item');
   
   
   
	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0, itemString.length - 2).split(', ');
	newSection = document.createElement('section');
	newTable = document.createElement('table');
   
	//每購買一個品項，就呼叫函數createCartList新增一個tr
	subtotal = 0;
	for (var key in items) {
	 var itemInfo = storage.getItem(items[key]);
	 createCartList(items[key], itemInfo);
   
	 // var itemPrice = parseInt(itemInfo.split('|')[2]) * amount;
	 // 
	}
   
	document.getElementById('subtotal').innerText = subtotal;
   
	//最後將table放進section，再將section放進cartList
	newSection.appendChild(newTable);
	document.querySelector('.cartList').appendChild(newSection);
   
   
   
	function createCartList(itemKey, itemValue) {
	 var itemTitle = itemValue.split('|')[0];
	 var itemImage = itemValue.split('|')[1];
	 var itemPrice = parseInt(itemValue.split('|')[2]);
	 var itemKarma = parseInt(itemValue.split('|')[3]);
	 var amount = parseInt(itemValue.split('|')[4]);
   
	 //建立每個品項的清單區域 -- tr
	 var trItemList = document.createElement('tr');
	 trItemList.className = 'item';
   
	 newTable.appendChild(trItemList);
   
	 //商品圖片 -- 第一個td
	 var tdImage = document.createElement('td');
   
	 var image = document.createElement('img');
	 // console.log(itemImage);
	 image.className = 'adc';
	 image.src = '../img/products/' + itemImage;
   
	 tdImage.appendChild(image);
	 trItemList.appendChild(tdImage);



	 
   
	 //商品名稱 -- 第二個td
	 var tdTitle = document.createElement('td');
	 tdTitle.id = itemKey;
   
	 var pTitle = document.createElement('p');
	 pTitle.innerText = itemTitle;
   
	 tdTitle.appendChild(pTitle);
   
   
	 trItemList.appendChild(tdTitle);

	//單價 -- 第三個td
	 var tdKarma = document.createElement('td');
	 tdKarma.innerText = itemKarma;
	 trItemList.appendChild(tdKarma);
	 //單價 -- 第三個td
	 var tdPrice = document.createElement('td');
	 tdPrice.setAttribute('data-price', itemPrice);
	 tdPrice.innerText = itemPrice;
   
	 trItemList.appendChild(tdPrice);
   
	 //數量 -- 第四個td
	 var tdItemCount = document.createElement('td');
   
	 var itemCount = document.createElement('input');
	 itemCount.type = 'number';
	 itemCount.min = 1;
	 itemCount.value = amount;
	 itemCount.className = 'count';
	 //itemCount.appendChild[1]
	 

	 // itemCount.id.style.width = 10;
	 itemCount.addEventListener('input', changeItemCount);
   
	 tdItemCount.appendChild(itemCount);
	 trItemList.appendChild(tdItemCount);
   
	 //x -- 第五個td
	 var tdDelete = document.createElement('td');
   
	 var delButton = document.createElement('button');
	 delButton.innerText = 'x';
	 delButton.addEventListener('click', deleteItem);
   
	 tdDelete.appendChild(delButton);
	 trItemList.appendChild(tdDelete);
	 
	 //total
	 itemPrice *= amount;
	 subtotal += itemPrice;
   
	}
	// document.getElementById('count').innerText = amount;
   
	function deleteItem() {
   
	var itemId = this.parentNode.parentNode.childNodes[1].getAttribute('id');
   
	 
	var itemValue = storage.getItem(itemId);
	//刪除該筆資料之前，先將金額扣除
	document.getElementById('subtotal').innerText -= itemValue.split('|')[2]*itemValue.split('|')[4];
	 //刪除該筆資料之前，先將數量扣除
	document.getElementById('amount').textContent -= itemValue.split('|')[4];
	 //清除storage的資料
	 storage.removeItem(itemId);
	 storage['addItemList'] = storage['addItemList'].replace(itemId + ', ', '');
   
	 //再將該筆tr刪除
	 this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);

	 //減SESSION
    cartCountMinus();
	}
   



	function changeItemCount() {
		var inputValue = parseInt(this.value);
		var itemId = this.parentNode.parentNode.childNodes[1].getAttribute('id');
		itemValue = storage[itemId].substr(0,storage[itemId].lastIndexOf('|'));
		itemValue += "|" + inputValue;
		storage[itemId] = itemValue;
		sum();
		
	 }
	

	//  let id = this.parentNode.parentNode.childNodes[1].id;
	//  let itemValue = storage[id];
	//  itemValue = itemValue.substr(0,itemValue.lastIndexOf('|'));
	//  itemValue +="|"+inputValue;
	//  storage[id] = itemValue;
	//  let subTotal = inputValue * parseInt(storage[id].split('|')[2]);
	function sum() {
		let totalAmount = 0;
		let totalKarma = 0;
		let total = 0;
	
		for (let i = 0; i < items.length; i++) {
			var cost = parseInt(storage[items[i]].split('|')[2]);
			var karma = parseInt(storage[items[i]].split('|')[3]);
			var amount = parseInt(storage[items[i]].split('|')[4]);
			
			totalAmount += amount;
			totalKarma += karma * amount;
			total += cost * amount;

		}
		document.getElementById('subtotal').textContent = total;
		document.getElementById('amount').textContent = totalAmount ;
		document.getElementById('karma').textContent = totalKarma ;
	}

	sum();
	document.querySelector('.agree .btnM .btnText').addEventListener('click', function () {
		if(document.querySelector('.agree input').checked){
			var url = '';
			for (var i = 0; i < items.length; i++) {
				url +='pdname'+i+'='+items[i]+'&amount'+i+'='+parseInt(storage[items[i]].split('|')[4])+'&';
			}
			url += 'total='+document.getElementById('subtotal').textContent+'&total_karma='+document.getElementById('karma').textContent;

			var xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		        	if(this.responseText){
		        		alert('請先登入再購買');
		        	}else{
		        		alert('購買成功');
			        	for (var i = 0; i < items.length; i++) {
			        		storage.removeItem(items[i]);
			        	}
			        	storage.removeItem('addItemList');
			        	location.href = '../php/index.php';
		        	}
		        	
		        }
		    };
		    xhttp.open("GET", "../php/cartPay.php?"+url);
		    xhttp.send();
		}else{
			alert('請勾選同意購買須知');
		}
	});
});

function cartCountMinus() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhttp.open("GET", "../php/cartCount.php?action=minus");
    xhttp.send();
}
   
   
	// let select = document.getElementById('hi')
	// select.addEventListener('change', function(){
	//  let total =0;
	//  for (var key in items) {
	//   let itemInfo = storage.getItem(items[key]);
	//   total+= parseInt( itemInfo.split('|')[2] ) * parseInt( itemInfo.split('|')[3] );
	//  }
	//  let subtotal = document.getElementById('subtotal');
	 
	//  subtotal.textContent=total - parseInt(this.value);
	 
	// })