<?php 
	ob_start();
    session_start();
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php require_once("publicHeader.php"); ?>
    <title>dozen_storedetail</title>
    <link rel="stylesheet" type="text/css" href="../css/starRating.css">
    <link rel="stylesheet" type="text/css" href="../css/dozen_storedetail.css">
    <script src="../js/count.js"></script>
    <script src="../js/dozen_store.js"></script>
</head>

<body>
   
<?php 
    require_once("connectBD103G1.php");
    require_once("header.php");
    $_SESSION["where"] = "dozen_storedetail.php";
    ?>

    <div class="storedetailFrame" style="position:relative">
        <div style="top:10px;left:10px;" id="backToPreviousPage">
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
                                    <h2 id="textTitle"><?php echo $productRow["pd_name"] ?></h2>
                                     <h2 id="price"><?php echo $productRow["pd_price"] ?>$</h2>
                                     <h2 id="karma_dec">業力值扣減(<?php echo $productRow["karma_dec"] ?>)</h2>
                                    <br>
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" class="starIcon">
                                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" class="starIcon">
                                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" class="starIcon">
                                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" class="starIcon">
                                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" class="starIcon">
                                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    </fieldset>
                                    <script type="text/javascript">
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                var starIcon = document.querySelectorAll('.starIcon');
                                                starIcon[this.responseText].checked = true;
                                                for (var i = 0; i < starIcon.length; i++) {
                                                    starIcon[i].disabled = true;
                                                }
                                            }else{
                                            }
                                        };
                                        xhttp.open("GET", "star.php?type=products&action=show&target_no=<?php echo $_REQUEST["pd_no"]; ?>");
                                        xhttp.send();
                                        
                                    </script>
                                    
                                    <p class="rate">4.5/5</p>
                                    <hr > 
                                    <div class="innerText">
                                        <p>
                                        <?php echo $productRow["pd_describe"] ?>
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

                                            <div  id="pd<?php echo $productRow["pd_no"] ?>" class="name" >
                                                
                                                <span class="addButton buyNow btnM"><span class="btnText btnText4">加入購物車</span>
                                                <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|',$productRow["karma_dec"],'|0' ?>">
                                                
                                                </span>

                                            

                                            <br>
                                            
                                                <span class="addButton buyNow btnM"><span class="btnText btnText4">立即購買</span>
                                                    <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|',$productRow["karma_dec"],'|0' ?>">
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


    
            <!-- 右邊copyright -->
            <div class="copyright">
                <p>
                點算©Copyright DOZEN, 2018.
                </p>
            </div>
            
        </div>

        




</body>



</html>