<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php require_once("publicHeader.php");?>
    <title>dozen_storedetail</title>
    <link rel="stylesheet" type="text/css" href="../css/dozen_storedetail.css">
    <!-- <script type="text/javascript" src="../js/header.js"></script> -->
    <!-- <script src="../js/addcart.js"></script> -->
    <script src="../js/count.js"></script>
    <!-- <script src="../js/dozen_storedetailAJAX .js"></script> -->
    <script src="../js/addcart.js"></script>
</head>

<body>
   
<?php 
    require_once("connectBD103G1peng.php");
    require_once("header.php");
    $_SESSION["where"] = "dozen_storedetail.php";
?>

    <div class="frame">
        <div class="frameFrame"></div>
        <div class="product">
        <div class="productContent">


        <?php
        $pdNo = $_REQUEST["pd_no"];
        try {
            $sql = "select * from products where pd_no = :pdNo";
            $products = $pdo->prepare($sql);
            $products->bindValue(":pdNo",$pdNo);
            $products->execute();
            $product_rows = $products->fetchAll(PDO::FETCH_ASSOC);

            foreach( $product_rows as $i=>$productRow){
        ?>




                            <div class="one">
                                <div class="picFrame"></div>
                                <?php echo '<img src="../img/products/',$productRow["pd_pic1"],'" alt="">' ?>
                            </div>

                        




                            <div class="text">
                                <h2 id="textTitle"><?php echo $productRow["pd_name"] ?></h2> <h2 id="price"><?php echo $productRow["pd_price"] ?>$</h2>
                                <br>
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                <img src="../img/dozen_storedetail/star.png" alt="">
                                
                                <p class="rate">4.5/5</p>
                                <hr > 
                                <div class="innerText">
                                    <p>
                                    <?php echo $productRow["pd_intro"] ?>
                                    </p>
                                </div>

                                <div class="btn">
                                    <div class="amount">
                                        <form id='myform' method='POST' action='#'>
                                                <label for="" id="count">數量</label>
                                                <br>
                                                <input  type='button' value='-' class='qtyminus' field='quantity' />
                                                <input  type='text' name='quantity' value='1' class='qty' readonly="value" />
                                                <input  type='button' value='+' class='qtyplus' field='quantity' />
                                        </form>
                                    </div>    
                                    <div class="buy">

                                        <div  id="pd<?php echo $productRow["pd_no"] ?>" >
                                            
                                            <span class="addButton buyNow">
                                            加入購物車
                                            <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                                            
                                            </span>

                                        

                                        <br>
                                        
                                            <span class="addButton buyNow">
                                                立即購買
                                                <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                                            </span>
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

    <div class="footer">

            <!-- 左邊icon -->
            <div class="icon">
                <ul>
                    <!-- facebook icon -->
                    <li class="facebook">
                        <a href="#">
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                        </a>				
                    </li>
    
                    <!-- instagram icon -->
                    <li class="instagram"></i>
                        <a href="#">
                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                        </a>					
                    </li>
    
                    <!-- twitter icon -->
                    <li class="twitter">
                        <a href="#">
                            <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                        </a>			
                    </li>
                </ul>
            </div>
    
            <!-- 右邊copyright -->
            <div class="copyright">
                <p>
                點算©Copyright DOZEN, 2018.
                </p>
            </div>
            
        </div>




</body>

</html>