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
        <div class="pic">
            <div class="picFrame"></div>
            <?php echo '<img src="../img/products/',$productRow["pd_pic1"],'" alt="">' ?>
        </div>
            
        <div class="intro">
            <h2><?php echo $productRow["pd_name"] ?></h2>
            <p><?php echo mb_substr($productRow["pd_intro"],0,70,"utf-8")."..." ?></p>
            <div class="options">
                <div class="price">
                    <p>$ <?php echo $productRow["pd_price"] ?></p>
                </div>
                <div class="purchase">
                    <a href="#">加入購物車</a>
                    <a href="#">立即購買</a>
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