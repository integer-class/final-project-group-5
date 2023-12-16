<?php

include "templates/header.php";
include "templates/navbar.php";

?>

<!-- content -->
<style>
        .product-details {
            width: 50%;
            margin: 20px auto;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .product-details img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 15px;
        }
        .product-info {
            margin-bottom: 15px;
        }
        .product-info label {
            font-weight: bold;
        }
</style>

<div class="product-details">
        <h1>Product Detail</h1>
        <div class="product-info">
            <label>Image:</label>
            <img src="/uploads/<?php echo basename($productData['image']); ?>">
        </div>
        
        <div class="product-info">
            <label>Product ID:</label>
            <span><?php echo $productData['product_id']; ?></span>
        </div>
        <div class="product-info">
            <label>Product Code:</label>
            <span><?php echo $productData['product_code']; ?></span>
        </div>
        <div class="product-info">
            <label>Product Name:</label>
            <span><?php echo $productData['product_name']; ?></span>
        </div>
        <div class="product-info">
            <label>Supplier Name:</label>
            <span><?php echo $productData['supplier_name']; ?></span>
        </div>
        <div class="product-info">
            <label>Description:</label>
            <span><?php echo $productData['description']; ?></span>
        </div>
        
        <div class="product-info">
            <label>Category:</label>
            <span><?php echo $productData['category']; ?></span>
        </div>
        
        <div class="product-info">
            <label>Stock:</label>
            <span><?php echo $productData['stock']; ?></span>
        </div>

        <div class="product-info">
            <label>Buy Price:</label>
            <span>Rp<?php echo number_format($productData['buy_price'], 2); ?></span>
        </div>

        <div class="product-info">
            <label>Sell Price:</label>
            <span>Rp<?php echo number_format($productData['sell_price'], 2); ?></span>
        </div>
</div>

<?php

include "templates/footer.php";

?>