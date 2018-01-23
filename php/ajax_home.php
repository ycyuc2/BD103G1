<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>
    <input type="button" value="11" class="prodClass" id="prodClass_wear">
    <input type="button" value="22" class="prodClass" id="prodClass_home">
    <input type="button" value="33" class="prodClass" id="prodClass_food">
    <input type="button" value="44" class="prodClass" id="prodClass_stationery">  
    <div id="showPanel"></div>
    <script type="text/javascript">
     var btns = document.querySelectorAll(".prodClass");  
     for( var i=1; i<btns.length; i++){
      btns[i].addEventListener("click",getProducts,false)
     }

     function getProducts(e){
     var prodClass = e.target.id.substr(10);
     var xhr = new XMLHttpRequest();
     xhr.onload = function (){
      if( xhr.status == 200){
       document.getElementById("showPanel").innerHTML = xhr.responseText;
      }else{
       alert(xhr.status);
      }
     }
      var url = "xxx.php&prodClass=" + prodClass;
      xhr.open("Get",url, true);
      xhr.send( null );     
     }



    </script>  
</body>
</html>