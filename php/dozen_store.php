<?php 
	ob_start();
    session_start();
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>商城</title>
    <?php require_once("publicHeader.php") ?>
    <link rel="stylesheet" type="text/css" href="../css/dozen_store.css">
    <link rel="stylesheet" href="../css/footer.css">

    
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/dozen_store.js"></script>
    <!-- <script src="../js/dozen_storeAJAX.js"></script> -->
    <!-- <script src="../js/33_new.js"></script> -->

<!--     <script>
            $(window).on("load",function(){
                    $('.loadBG').delay(4000).fadeOut(1000);
                    setTimeout(function(){
                        $('body').css({
                            'height':'inherit',
                            'overflow':'inherit'
                        });
                    },4000);
            });

            $(window).on("load",function(){
                    $('.bar').delay(4000).fadeOut(1000);
                    setTimeout(function(){
                        $('body').css({
                            'height':'inherit',
                            'overflow':'inherit'
                        });
                    },4000);
            });
     </script> -->
  
</head>

<body>
       
    <?php 
    require_once("connectBD103G1.php");
    require_once("header.php");
    $_SESSION["where"] = "dozen_store.php";
    ?>

     <!-- 閃電 -->
     <div class="background">
            <img src="../img/lightening/flash1.png" alt="" class="flash lt1">
            <img src="../img/lightening/flash2.png" alt="" class="flash lt2">
            <img src="../img/lightening/flash3.png" alt="" class="flash lt3">
            <img src="../img/lightening/flash4.png" alt="" class="flash lt4">
        </div>



    
    

    
   

  <!-- 載入頁面   -->
  <!-- <div class="loadBG">
    <div class='loading'></div>
    <div class="loadLOGO"><img class="LOGOrotate" src="../img/dozen_store/onlyLOGO.png" alt=""></div>
    </div>
    <div class="bar">
            <div class="progress"></div>
    </div> -->

    

	

    


<!-- 內文 -->

<div class="frame">
    <div class="frameFrame"></div>

    <div class="wrapper">
        <div class="search">
            <div class="filter">
                <select id="select">
                    <option value="" class="pd" id="pd_all">全部商品</option>
                    <option value="1" class="pd" id="pd_wear">飾品</option>
                    <option value="2" class="pd" id="pd_home">家飾</option>
                    <option value="3" class="pd" id="pd_food">食品</option>
                    <option value="4" class="pd" id="pd_stationery">文具</option>
                </select>
            </div>
            <div class="searchBox">
                <input class="searchName" type="text" name="" placeholder="請輸入商品名稱...">
                
                <i class="fa fa-search" aria-hidden="true"></i>
                
            </div>
        </div>

        
        <div id="pdContent">

            <?php
            try {
                require_once("connectBD103G1.php");
                $sql = "select * from products";
                $products = $pdo->prepare($sql);
                $products->execute();
                $product_rows = $products->fetchAll(PDO::FETCH_ASSOC);

                foreach( $product_rows as $i=>$productRow){
            ?>

                <div class="content">
                    
                <?php echo '<a href="../php/dozen_storedetail.php?pd_no=',$productRow["pd_no"],'">' ?>
                    <div class="pic">
                        <div class="picFrame"></div>
                        
                        
                        <?php echo '<img src="../img/products/',$productRow["pd_pic1"],'" alt="">' ?>
                        
                    </div>
                    </a>
                        
                    <div class="intro">
                        <h2><?php echo $productRow["pd_name"] ?></h2>
                        <h2 id="karma_dec">業力值扣減(<?php echo $productRow["karma_dec"] ?>)</h2>
                        <p><?php echo mb_substr($productRow["pd_describe"],0,70,"utf-8")."..." ?></p>
                        <div class="options">
                            <div class="price">
                                <p>$ <?php echo $productRow["pd_price"] ?></p>
                            </div>
                            
                            <div class="purchase">

                                <div id="pd<?php echo $productRow["pd_no"] ?>" class="name">
                                    <span class="addButton buyNow">
                                            加入購物車
                                            <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                                    </span>


                                    
                                    <?php echo '<a href="../php/dozen_storedetail.php?pd_no=',$productRow["pd_no"],'">' ?>
                                    <span class="addButton buyNow">         
                                        查看細節
                                        
                                        <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                                    </span>
                                    </a>

                                </div>
                            

                            </div>
                        </div>
                    </div>
                        
                </div>

            <?php		
                }

            } catch (PDOException $e) {
                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                echo "錯誤行號 : " , $e->getLine() , "<br>";
            }
            ?> 
           

       
        </div>

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



</div>   


        <script>

        let ttt = document.getElementById("select");
        ttt.addEventListener("change" , getProducts, false);
        
        

        function getProducts(e){

        
        var pdType = e.target.value;
        if(pdType == ""){
            location.reload();
            return;
        }
        
        var url = "changePage.php?pdType=" + pdType;
        
        
        var xhr = new XMLHttpRequest();
        xhr.open("Get",url, true);
        xhr.onload = function(){
        
            if( xhr.status == 200 ){
               
            document.getElementById("pdContent").innerHTML = this.responseText;
            }else{
            alert(xhr.status);
            }
        
        }
        xhr.send( null );
        }



        </script>
</body>

</html>