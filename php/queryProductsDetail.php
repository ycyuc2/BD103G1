<?php
$pdNo = $_REQUEST["pd_no"];
try {
	require_once("connectBD103G1peng.php");
	$sql = "select * from products where pd_no = :pdNo";
    $products = $pdo->prepare($sql);
    $products->bindValue(":pdNo",$pdNo);
	$products->execute();
	$product_rows = $products->fetchAll(PDO::FETCH_ASSOC);

    foreach( $product_rows as $i=>$productRow){
?>




    <div class="productContent">
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
                            <?php echo mb_substr($productRow["pd_intro"],0,70,"utf-8")."..." ?>
                            </p>
                        </div>

                        <div class="btn">
                            <div class="amount">
                                <form id='myform' method='POST' action='#'>
                                        <label for="" id="count">數量</label>
                                        <br>
                                        <input  type='button' value='-' class='qtyminus' field='quantity' />
                                        <input  type='text' name='quantity' value='1' class='qty' readonly="value"/>
                                        <input  type='button' value='+' class='qtyplus' field='quantity' />
                                </form>
                            </div>    
                            <div class="buy">

                            
                                <div>

                                    <span id="pd<?php echo $PRODUCT["pd_no"] ?>" class="addButton">
                                            加入購物車
                                    <input type="hidden" value="<?php echo $PRODUCT["pd_name"],'|',$PRODUCT["pd_pic1"],'|',$PRODUCT["pd_price"] ?>">
                                    </span>
                                    
                                </div>

                                <br>
                                <div class="buyNow">
                                    <a href="../html/dozen_storeCart.html">
                                        <span class="addButton">
                                        立即購買
                                        <input type="hidden" value="<?php echo $PRODUCT["pd_name"],'|',$PRODUCT["pd_pic1"],'|',$PRODUCT["pd_price"] ?>">
                                        </span>
                                    </a>
                                </div>
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