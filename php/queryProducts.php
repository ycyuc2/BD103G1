<?php
try {
	require_once("connectBD103G1peng.php");
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
            
            
            <?php echo '<img src="../',$productRow["pd_pic1"],'" alt="">' ?>
            
        </div>
        </a>
            
        <div class="intro">
            <h2><?php echo $productRow["pd_name"] ?></h2>
            <p><?php echo mb_substr($productRow["pd_intro"],0,70,"utf-8")."..." ?></p>
            <div class="options">
                <div class="price">
                    <p>$ <?php echo $productRow["pd_price"] ?></p>
                </div>
                <div class="purchase">


                <span id="pd<?php echo $productRow["pd_no"] ?>" class="addButton">
                   <a href="#"> 加入購物車</a>
                <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                </span>


                

                <span class="addButton">

                <a href="../php/dozen_storedetail.php?pd_no=<?php echo $productRow["pd_no"]; ?>">立即購買</a>

                <input type="hidden" value="<?php echo $productRow["pd_name"],'|',$productRow["pd_pic1"],'|',$productRow["pd_price"],'|0' ?>">
                </span>

                </a>

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