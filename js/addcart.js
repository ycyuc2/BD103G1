window.onload = function(){

var inputValue = document.querySelector('.qty').value;
localStorage.setItem('item',inputValue);
console.log ('inputValue');

// getOrderAmount();


// 	function getOrderAmount(){

// 		 var xhr = new XMLHttpRequest();
// 	        xhr.onload=function (){
// 	            if( xhr.status == 200 ){
// 	                //alert( xhr.responseText );  
// 	                //modify_here
// 	                document.getElementById('pdContent').innerHTML = xhr.responseText;
// 	            }else{
// 	                alert( xhr.status );
// 	            }
// 	        }//xhr.onreadystatechange
	        
// 	        var url = "queryProducts.php?";
// 	        xhr.open("Get", url, true);
// 	        xhr.send( null );

// 	};

};

