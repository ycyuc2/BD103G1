function doFirst() {
 
	var storage = localStorage;
	
	// if(storage['addItemList']== null){
	//  storage['addItemList'] = '';
	// }
   
	
	
	// var amount = storage.getItem('item');
   
   
   
	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0, itemString.length - 2).split(', ');
	changeItemAmount();
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
	var cartList = document.getElementsByClassName('cartList');
	cartList[0].appendChild(newSection);
   
   
   
	function createCartList(itemKey, itemValue) {
	 var itemTitle = itemValue.split('|')[0];
	 var itemImage = itemValue.split('|')[1];
	 var itemPrice = parseInt(itemValue.split('|')[2]);
	 var amount = parseInt(itemValue.split('|')[3]);
   
	 //建立每個品項的清單區域 -- tr
	 var trItemList = document.createElement('tr');
	 trItemList.className = 'item';
   
	 newTable.appendChild(trItemList);
   
	 //商品圖片 -- 第一個td
	 var tdImage = document.createElement('td');
	 tdImage.style.width = '250px';
	 tdImage.valign = 'center';
   
	 var image = document.createElement('img');
	 // console.log(itemImage);
	 image.className = 'adc';
	 image.src = '../' + itemImage;
	 image.width = '100';
   
	 tdImage.appendChild(image);
	 trItemList.appendChild(tdImage);
   
	 //商品名稱 -- 第二個td
	 var tdTitle = document.createElement('td');
	 tdTitle.style.width = '200px';
	 tdTitle.id = itemKey;
	 tdTitle.valign = 'center';
   
	 var pTitle = document.createElement('p');
	 pTitle.innerText = itemTitle;
   
	 tdTitle.appendChild(pTitle);
   
   
	 trItemList.appendChild(tdTitle);
   
	 //單價 -- 第三個td
	 var tdPrice = document.createElement('td');
	 tdPrice.style.width = '100px';
	 tdPrice.setAttribute('data-price', itemPrice);
	 tdPrice.innerText = itemPrice;
   
	 trItemList.appendChild(tdPrice);
   
	 //數量 -- 第四個td
	 var tdItemCount = document.createElement('td');
	 tdItemCount.style.width = '50px';
   
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
	 tdDelete.style.width = '50px';
   
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
   
	 //刪除該筆資料之前，先將金額扣除
	 var itemValue = storage.getItem(itemId);
	 subtotal -= parseInt(itemValue.split('|')[2]);
   
	 document.getElementById('subtotal').innerText = subtotal;
   
	 //清除storage的資料
	 storage.removeItem(itemId);
	 storage['addItemList'] = storage['addItemList'].replace(itemId + ', ', '');
   
	 //再將該筆tr刪除
	 this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
	}
   
	function changeItemAmount() {
		var amount =0;
		console.log(items);
		for (let i = 0; i < items.length; i++) {
			amount += parseInt(storage.getItem(items[i]).split('|')[3]);
		}
		document.getElementById('amount').textContent = amount ;
	}


	function changeItemCount() {
	 let inputValue = parseInt(this.value);
	 let itemTr = this.parentNode.parentNode.parentNode.childNodes;
	 let totalAmount = 0
	 let total = 0;
	
	 for (let i = 0; i < itemTr.length; i++) {
		var cost = parseInt(itemTr[i].childNodes[2].textContent);
		var amount = parseInt(itemTr[i].childNodes[3].firstChild.value);
		
		totalAmount += amount;
	 total += cost * amount;

	 }
	document.getElementById('subtotal').textContent = total;

	 
	  
	
	 document.getElementById('amount').textContent = totalAmount ;
	 }
	

	//  let id = this.parentNode.parentNode.childNodes[1].id;
	//  let itemValue = storage[id];
	//  itemValue = itemValue.substr(0,itemValue.lastIndexOf('|'));
	//  itemValue +="|"+inputValue;
	//  storage[id] = itemValue;
	//  let subTotal = inputValue * parseInt(storage[id].split('|')[2]);
	
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
   
   
   
   





window.addEventListener('load',doFirst, false);