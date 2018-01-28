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
   
    <div class="cartFrame" style="position: relative;">
      <div style="top:-40px;left:-40px;" id="backToPreviousPage">
        <i class="fa fa-arrow-left"></i>
      </div>
      <script>
        window.addEventListener('load',function(){
            var backBtn = document.querySelector('#backToPreviousPage');
            backBtn.addEventListener('click', function(){
              window.history.back();
            }, false)


        })
      </script>
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
                   <td>1.</td><td>商品圖片因電腦螢幕設定差異會略有不同，以實際商品顏色為準，請見諒。</td>
               </tr>

                <tr>
                    <td>2.</td><td>本網站所販賣出的商品一律不予退貨。</td>
                </tr>

                <tr>
                    <td>3.</td><td>業力值為自身業障參考，並非憑空杜撰，若放任其成長，本網站一概不負責。</td>
                </tr>

                <tr>
                    <td>4.</td><td>本網站無客服人員，若有任何疑問，請勿購買。</td>
                </tr>

                <tr>
                    <td>5.</td><td>賣場商品稀有性極高，亦皆為天然生成或手工製作，不論公差色差等皆在所難免，購買即表示同意此則說明。</td>
                </tr>

                <tr>
                    <td>6.</td><td>魔法類物品有其危險性，不諳魔法者請避免嘗試施咒。</td>
                </tr>

                <tr>
                    <td>7.</td><td>若沒有抱持虔誠的心態購買，將視為垃圾訂單。</td>
                </tr>

                <tr>
                    <td>8.</td><td>訂單成立後，即無法修改訂單內容。</td>
                </tr>

                <tr>
                    <td>9.</td><td>商品寄送時間</td>
                </tr>

                <tr>
                    <td></td><td>商品收到款項後約7-14個工作天內寄出（不含假日）天數僅供參考，請買家購買前衡量是否能等待。</td>
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