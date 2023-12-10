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


<div class="item">
    <h2>Item</h2><br>
    <div class="product-list">
        <?php foreach ($product_data as $product) : ?>
            <div class="product">
                <img src="/uploads/<?php echo basename($product['image']); ?>" alt="<?php echo $product['product_name']; ?>">
                <h3><?php echo $product['product_name']; ?></h3>
                <p>Price: Rp <?php echo number_format($product['sell_price'], 0, ',', '.'); ?></p>
                <p>Stocks: <?php echo $product['stock']; ?></p>
                <form action="/cashier/processSale" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="change" value="0">
                    <input type="hidden" name="user_id" value="1">
                    <input type="submit" value="Add Item">
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div><br>

<div class="checkout">
        <h3>Checkout</h3>
        <p>Total: Rp <?php echo number_format($total_amount, 0, ',', '.'); ?></p>
        <p>Paid: Rp <?php echo number_format($paid_amount, 0, ',', '.'); ?></p>
        <p>Change: Rp <?php echo number_format($change_amount, 0, ',', '.'); ?></p>
        <form action="/cashier/processSale" method="post">
            <input type="hidden" name="paid" value="<?php echo $paid_amount; ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="submit" value="Complete Transaction">
        </form>
    </div>
</div><br>



<?php

include 'templates/footer.php';

?>