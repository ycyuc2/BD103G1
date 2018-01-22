var storage = localStorage;

function doFirst(){

 //幫每個add cart建事件聆聽功能

 
   var list = document.getElementsByClassName('addButton');
   //console.log(list.length);
   for(let i=0; i<list.length; i++){
    //console.log(list[i].id); 
    list[i].addEventListener('click', function(){
     //console.log(this);
     let info = this.childNodes[1].value;
     //console.log(this.id);
     addItem(this.parentNode.id,info);
        // localStorage.setItem('item',inputValue);
     if(i ==1){
      document.location.href='../html/dozen_storeCart.php';
     }
    });



   } 
 
 if(storage['addItemList'] == null){
  storage['addItemList'] = ''; //storage.setItem('addItemList','');
 }
 
}




function addItem(itemId,itemValue){

 //存入storage
 if(storage[itemId]){
  alert('商品已在購物車裡囉！');
 }else{
  storage['addItemList'] += itemId + ', ';
  storage[itemId] = itemValue; //storage.setItem(itemId,itemValue);
 }
 
 itemValue = itemValue.substr(0,itemValue.lastIndexOf('|'));
 var inputValue = parseInt(document.querySelector('.qty').value);
 itemValue +="|"+inputValue;
 storage[itemId] = itemValue;

}


window.addEventListener('load', doFirst);





