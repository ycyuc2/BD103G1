<?php
try {
 require_once("connectBD103G1.php");
 if(isset($_REQUEST["pdType"])){
    $sql = "select * from products where pd_type = :TYPE and pd_sta = 1";
    $pdType = $_REQUEST["pdType"];
    $products = $pdo->prepare($sql);
    $products->bindValue(":TYPE",$pdType);
    $products->execute();
   }else{
    $text = $_REQUEST["searchValue"];
    $sql = "select * from products where pd_name like '%$text%' and pd_sta = 1";
    $products = $pdo->prepare($sql);
  
   }
 

 $products->execute();
 $product_rows = $products->fetchAll(PDO::FETCH_ASSOC);
 $result = "";
 foreach( $product_rows as $i=>$product_rows){

  $PRODUCT_NO = $product_rows['pd_no'];
  $PRODUCT_COVER = $product_rows['pd_pic1'];
  $PRODUCT_NAME = $product_rows['pd_name'];
  $PRODUCT_PRICE = $product_rows['pd_price'];
  $PRODUCT_INTRO = $product_rows['pd_describe'];
  $PRODUCT_KARMA = $product_rows['karma_dec'];

 $result .="<div class='content'>
                    
 <a href='../php/dozen_storedetail.php?pd_no=$PRODUCT_NO'>
     <div class='pic'>
         <div class='picFrame'></div>
         
         
         <img src='../img/products/$PRODUCT_COVER' alt=''>
         
     </div>
     </a>
         
     <div class='intro'>
         <h2>$PRODUCT_NAME </h2>
         <p> ".mb_substr($PRODUCT_INTRO,0,70,'utf-8')."...   </p>
         <div class='options'>
             <div class='price'>
                 <p>$ $PRODUCT_PRICE </p>
             </div>
             
             <div class='purchase'>

                 <div id='pd$PRODUCT_NO' class='name'>
                 <span class='addButton buyNow btnM'><span class='btnText btnText4'>加入購物車</span>
                         <input type='hidden' value=' $PRODUCT_NAME|$PRODUCT_COVER|$PRODUCT_PRICE|$PRODUCT_KARMA|0'>
                     </span>


                     

                     <a href='../php/dozen_storedetail.php?pd_no=$PRODUCT_NO'><span class='buyNow btnM'><span class='btnText btnText4'>查看細節</span>
                             <input type='hidden' value=' $PRODUCT_NAME|$PRODUCT_COVER|$PRODUCT_PRICE|$PRODUCT_KARMA|0'>
                         </span></a>
                 </div>
             

             </div>
         </div>
     </div>
         
 </div>";

 }
 echo $result;
} catch (PDOException $e) {
 echo "錯誤原因 : " , $e->getMessage() , "<br>";
 echo "錯誤行號 : " , $e->getLine() , "<br>";
}

?>