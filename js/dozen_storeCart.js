function doFirst(){

	var storage = localStorage;
	var amount = storage.getItem('item');
	document.getElementsByClassName('qty')[0].setAttribute('value',amount);

	document.getElementsByClassName('delete')[0].onclick = function(){
		alert(1);
		
	};


}




function deleteItem(){

	var itemId = this.parentNode.getAttribute('class');
	// alert(itemId)
	//刪除該筆資料之前，先將金額扣除
	var itemValue = storage.getItem(itemId);
	subtotal -= parseInt(itemValue.split('|')[2]);
	document.getElementById('subtotal').innerText = subtotal;

	//清除storage的資料

	storage.removeItem(itemId);
	storage['addItemList'] = storage['addItemList'].replace(itemId+', ','');

	//再將該筆tr刪除
    this.parentNode.parentNode.removeChild(this.parentNode);
    
}

window.addEventListener('load',doFirst, false);