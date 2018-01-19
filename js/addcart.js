var buyNow = document.getElementsByClassName('buyNow')[0];

buyNow.addEventListener('click', function(){
    var inputValue = document.querySelector('.qty').value;
    localStorage.setItem('item',inputValue);
    console.log(inputValue);

});



