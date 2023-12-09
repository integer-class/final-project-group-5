<?php

include 'templates/header.php';
include 'templates/navbar.php';

?>

<!-- content -->
<style>
    img {
        width: 300px;
    }
</style>


<div class="cart">
    <h2>Products</h2><br>
    <div class="product-list">
        <?php foreach ($product_data as $product) : ?>
            <div class="product">
                <img src="/uploads/<?php echo basename($product['image']); ?>" alt="<?php echo $product['product_name']; ?>">
                <h3><?php echo $product['product_name']; ?></h3>
                <p>Price: Rp <?php echo number_format($product['sell_price'], 0, ',', '.'); ?></p>
                <p>Stocks: <?php echo $product['stock']; ?></p>
                <a href="#">Add to Cart</a>
            </div>
        <?php endforeach; ?>
    </div>
</div><br>


<?php

include 'templates/footer.php';

?>