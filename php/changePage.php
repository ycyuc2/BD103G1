<?php
try {
 require_once("../php/connectBD103G1peng.php");
 if(isset($_REQUEST["pdType"])){
    $sql = "select * from products where pd_type = :TYPE";
    $pdType = $_REQUEST["pdType"];
    $products = $pdo->prepare($sql);
    $products->bindValue(":TYPE",$pdType);
    $products->execute();
   }else{
    $text = $_REQUEST["searchValue"];
    $sql = "select * from products where pd_name like '%$text%' ";
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
  $PRODUCT_INTRO = $product_rows['pd_intro'];

 $result .="<div class='content'>
                    
 <a href='../php/dozen_storedetail.php?pd_no=$PRODUCT_NO'>
     <div class='pic'>
         <div class='picFrame'></div>
         
         
         <img src='../$PRODUCT_COVER' alt=''>
         
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

                 <div id='pd$PRODUCT_NO ' class='name'>
                 <span class='addButton buyNow'>
                         加入購物車
                         <input type='hidden' value=' $PRODUCT_NAME,'|',$PRODUCT_COVER,'|',$PRODUCT_PRICE,'|0' '>
                     </span>


                     

                     <span class='addButton buyNow'>         
                         立即購買
                         <input type='hidden' value=' $PRODUCT_NAME,'|',$PRODUCT_COVER,'|',$PRODUCT_PRICE,'|0' '>
                     </span>
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