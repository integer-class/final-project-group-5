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
    <h2>Cart</h2><br>
    <div class="product-list">
        <?php foreach ($product_data as $product) : ?>
            <div class="product">
                <img src="/uploads/<?php echo basename($product['image']); ?>" alt="<?php echo $product['product_name']; ?>">
                <h3><?php echo $product['product_name']; ?></h3>
                <p>Rp<?php echo $product['sell_price']; ?></p>
                <p><?php echo $product['stock']; ?> Stocks Available</p>
            </div>
        <?php endforeach; ?>
    </div>
</div><br>


<?php

include 'templates/footer.php';

?>