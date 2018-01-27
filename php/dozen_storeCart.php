<?php 
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>dozen_storeCart</title>
    <?php require_once("publicHeader.php") ?>

    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/dozen_storeCart.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/dozen_storeCart.js"></script>
    <script src="../js/count.js"></script>
</head>

<body>
    <?php 
        require_once("connectBD103G1.php");
        require_once("header.php");
        $_SESSION["where"] = "dozen_store.php";
        ?>
   
    <div class="cartFrame">
        <div class="frameFrame"></div>
        
       <div class="title">
           <h2>商品細項</h2>
           <h2>業力扣減值</h2>
           <h2>金額</h2>
           <h2>數量</h2>
           <h2>刪除</h2>
       </div>

        <div class="cartList"></div>
       <!-- <div class="content">
           <div>
           <img src="../img/dozen_storeCart/lion.jpg" alt="">
            </div>

            <div class="name">
                <p>開運石獅子</p>
            </div>

           <div class="sum">
           <p class="sum">1000$</p>
            </div>

           <div class="amount">
                <form id='myform' method='POST' action='#'>
                        
                        <input  type='button' value='-' class='qtyminus' field='quantity' />
                        <input  type='text' name='quantity' value='1' class='qty' readonly="value" id="qty"/>
                        <input  type='button' value='+' class='qtyplus' field='quantity' />
                </form>
            </div> 

            <div class="total">
            <p>1000$</p>
        
            </div>

            <div class="delete"><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>

       </div> -->




       <hr>

       <p class="all">共<span id='amount'>0</span>件商品減少<span id='karma'>0</span>業力，總金額<span id="subtotal">0</span>元</p>

       <h2 class="know">購買須知</h2>
       <div class="contract">
           <table>
               <tr>購物條款說明</tr>
               <tr>
                   <td>1.</td><td>商品圖顏色檔因電腦螢幕設定差異會略有不同，以實際商品顏色為準，請見諒。</td>
               </tr>

               <tr>
                    <td>2.</td><td>衣物有伸縮性，丈量尺寸誤差正負0~2公分。</td>
                </tr>

                <tr>
                    <td>3.</td><td>為了避免尺寸不合,減少您對商品退貨和退款時間,建議買家可以參考尺寸表,或是詢問客服人員,
                            商品網址內都有MODEL資訊可供參考。</td>
                </tr>

                <tr>
                    <td>4.</td><td>如詢問客服人員建議尺碼，客服人員的回答僅供參考，因每個人的體型不同（倒三角形、西洋梨身形...等）且每個人對於寬鬆或合身的定義不同，客服人員只能由您的身高體重去推估適合的size作為參考，如購買後      覺得不合適可更換size，但不屬於客服人員的問題喔！</td>
                </tr>

                <tr>
                    <td>5.</td><td>賣場商品種類繁多，材質、製作方式均不同，有一般印燙、渲染...等等，有些材質可能會因為洗滌方式不同而些微縮水，有些深色衣料可能會染色，請注意下水洗滌前先測試是否會染色並做保色處理即可，之後就不會再染色，    會染色衣物屬於比較少見，大部分皆正常。衣物若因洗過之後產生染色、退色，賣場恕無法處理，購買即表示同意此則說明。</td>
                </tr>

                <tr>
                    <td>6.</td><td>訂購人姓名亂填、填寫不全...等等的訂單將視為垃圾訂單。</td>
                </tr>

                <tr>
                    <td>7.</td><td>訂單成立後,即無法修改訂單內容(請勿在訂單內留言,有問題可以私訊FB粉專為你處理唷)</td>
                </tr>

                <tr>
                    <td>8.</td><td>商品寄送時間</td>
                </tr>
                    
                <tr>
                    <td></td><td>現貨商品 約5-10個工作天內到取貨門市(不含假日)</td>
                </tr>

                <tr>
                    <td></td><td>非現貨商品 約7-14個工作天內寄出（不含假日）此數值僅供參考，請買家購買前衡量是否能等待。</td>
                </tr>

                <tr>
                    <td>9.</td><td>本公司開立電子發票，需紙本發票一併寄出麻煩備註註明</td>
                </tr>

                <tr>
                    <td>10.</td><td>有任何問題都可以私訊FB粉絲專頁,客服回覆時間:周一至周五 中午12點-下午6點</td>
                </tr>

                
           </table>

                
       </div>

       <div class="agree">
       <input type="checkbox"><p>我同意</p>
       <br>
       <span class="btnM"><span class="btnText btnText2">結帳</span></span>
        </div>




    </div>

    <div class="footer">

 
    
            <!-- 右邊copyright -->
            <div class="copyright">
                <p>
                點算©Copyright DOZEN, 2018.
                </p>
            </div>
            
        </div>




</body>



</html>