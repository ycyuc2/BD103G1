

//瀏覽器load完成執行：
window.addEventListener('load', function () {
	
	addButton();
    let searchName = '';
    let search = document.querySelector('.searchName');
    if(search){
    	search.addEventListener('change', ajaxData);
    }

    function ajaxData(e) {

		var searchName = document.getElementsByClassName('searchName')[0].value;

        //getData('searchName=' + searchName);
        var url = "changePage.php?searchValue=" + searchName;
        console.log(url);
        var xhr = new XMLHttpRequest();
         
        xhr.onload = function(){
         
        if( xhr.status == 200 ){
             
			document.getElementById("pdContent").innerHTML = xhr.responseText;
			addButton();
        	console.log(xhr.responseText);
        }else{
        	alert(xhr.status);
        }
         
        }
        xhr.open("Get",url, true);
        xhr.send( null );
        
    }
	







    function addItem(itemId, itemValue) {

        var title = document.createElement('span');
        title.innerText = itemValue.split('|')[0];

        var image = document.createElement('img');
        image.src = itemValue.split('|')[1];
        //刪掉 '../images/productPic/' + 
        image.id = 'imageSelect';

        var price = document.createElement('span');
        price.innerText = parseInt(itemValue.split('|')[2]);

        var newItem = document.getElementById('newItem');

        //存入storage
        if (storage[itemId]) {
            alert('商品已在購物車裡囉！');
        } else {
            storage['addItemList'] += itemId + ', ';
            storage[itemId] = itemValue; //storage.setItem(itemId,itemValue);
        }

        //計算購買數量和小計
        var itemString = storage.getItem('addItemList');
        var items = itemString.substr(0, itemString.length - 2).split(', ');
        //console.log(items);
        // console.log(items); //["A1001","A1002"]

        var subtotal = 0;
        for (var key in items) { //use items[key]
            //console.log(items[key]);
            var itemInfo = storage.getItem(items[key]);
            //console.log(itemInfo);
            var itemPrice = parseInt(itemInfo.split('|')[2]);

            subtotal += itemPrice;

        }

    }

});
var storage = localStorage;
	if(storage['addItemList'] == null){
		storage['addItemList'] = ''; //storage.setItem('addItemList','');
	}
function addButton() {
	//找到所有class名為addButton的物件
	var buyNow = document.querySelectorAll('.addButton');
	//跑迴圈註冊按鈕click事件
	for (let i = 0; i < buyNow.length; i++) {
	    buyNow[i].addEventListener('click', function () {

			var itemId = this.parentNode.id;
			var itemValue = this.childNodes[2].value;
	        if(document.querySelector('.qty')){
	        	if (storage[itemId] ) {
					if(i == 0){alert('商品已在購物車裡囉！')};
                    href='../php/dozen_store.php';
		        } else {
		            storage['addItemList'] += itemId + ', ';
		            storage[itemId] = itemValue; //storage.setItem(itemId,itemValue);
                    cartCountAdd();
		        }
				itemValue = itemValue.substr(0,itemValue.lastIndexOf('|'));
				var inputValue = parseInt(document.querySelector('.qty').value);
				itemValue += "|" + inputValue;
				storage[itemId] = itemValue;
				if(i == 1){
			    	document.location.href='../php/dozen_storeCart.php';
			    }else{
                    document.location.reload();
                }
			}else{
				if (storage[itemId] ) {
					alert('商品已在購物車裡囉！');
		        } else {
		            storage['addItemList'] += itemId + ', ';
		            storage[itemId] = itemValue; //storage.setItem(itemId,itemValue);
                    cartCountAdd();
		        }

			}
	    });
	
	}
}
function cartCountAdd() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
        }
    };
    xhttp.open("GET", "../php/cartCount.php?action=add");
    xhttp.send();
}





