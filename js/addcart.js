//瀏覽器load完成執行：
window.addEventListener('load', function(){
    //找到所有class名為buyNow的物件
    var buyNow = document.getElementsByClassName('buyNow');
    //跑迴圈註冊按鈕click事件
    for (let i = 0; i < buyNow.length; i++) {
        buyNow[i].addEventListener('click', function(){

            var inputValue = document.querySelector('.qty').value;
            
            localStorage.setItem('item',inputValue);
            console.log(inputValue);

        });
        
    }

});






