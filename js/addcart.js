

//瀏覽器load完成執行：
window.addEventListener('load', function () {
    //找到所有class名為buyNow的物件
    var buyNow = document.getElementsByClassName('buyNow');
    //跑迴圈註冊按鈕click事件
    for (let i = 0; i < buyNow.length; i++) {
        buyNow[i].addEventListener('click', function (e) {
            e.preventDefault()
            var inputValue = document.querySelector('.qty').value;

            localStorage.setItem('item', inputValue);

            let info = this.childNodes[1].childNodes[3].value
            addItem(info)


        })
    }



    var storage = localStorage;

    function addItem(itemValue) {
        let name = itemValue.split('|')[0];
        let src = itemValue.split('|')[1];
        let price = itemValue.split('|')[2];
        prod = [name, src, price]
        var newItem = document.getElementById('newItem');


       // 存入storage
       localStorage.setItem("content", prod)
       

        // if (storage){
        //     alert('商品已在購物車裡囉！');
        // } else {
        //     storage['addItemList'] += itemId + ', ';
        //     storage[itemId] = itemValue; 
            
        // };

// storage.setItem(itemId,itemValue);
        //計算購買數量和小計
        // var itemString = storage.getItem('addItemList');
        // var items = itemString.substr(0, itemString.length - 2).split(', ');
        //console.log(items);
        // console.log(items); //["A1001","A1002"]

        // var subtotal = 0;
        // for (var key in items) { //use items[key]
        //     //console.log(items[key]);
        //     var itemInfo = storage.getItem(items[key]);
        //     //console.log(itemInfo);
        //     var itemPrice = parseInt(itemInfo.split('|')[2]);

        //     subtotal += itemPrice;

        // }

    }

});






