function doFirst(){

	 storage = localStorage;
	var amount = storage.getItem('item');
	document.getElementsByClassName('qty')[0].setAttribute('value',amount);


	
	document.getElementsByClassName('delete')[0].onclick = deleteItem;


}




function deleteItem(){

	var itemClass = this.parentNode.getAttribute('class');
	console.log(itemClass);
	// alert(itemClass)
	//刪除該筆資料之前，先將金額扣除
	var itemValue = storage.getItem(itemClass);
	// subtotal -= parseInt(itemValue.split('|')[2]);
	document.getElementById('subtotal').innerText = subtotal;

	//清除storage的資料

	storage.removeItem(itemClass);
	// storage['addItemList'] = storage['addItemList'].replace(itemClass+', ','');

	//再將該筆class刪除
    // this.parentNode.removeChild(this.parentNode);
    
}

window.addEventListener('load',doFirst, false);