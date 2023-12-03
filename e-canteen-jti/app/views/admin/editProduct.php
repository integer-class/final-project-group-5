<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>

    <h2>Edit Product</h2>
    <form action="/admin/editProduct" method="post">

        <input type="hidden" name="product_id" value="<?php echo $productData['product_id']; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" placeholder="Product Name" required value="<?php echo $productData['product_name']; ?>"><br><br>
        
        <label for="supplier_name">Supplier Name:</label>
        <input type="text" name="supplier_name" id="supplier_name" placeholder="Supplier Name" required value="<?php echo $productData['supplier_name']; ?>"><br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" placeholder="Description" required><?php echo $productData['description']; ?></textarea><br><br>
        
        <label for="category">Category:</label>
        <input type="text" name="category" id="category" placeholder="Category" required value="<?php echo $productData['category']; ?>"><br><br>
        
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" placeholder="Stock" required value="<?php echo $productData['stock']; ?>"><br><br>
        
        <label for="buy_price">Buy Price:</label>
        <input type="number" name="buy_price" id="buy_price" placeholder="Buy Price" required value="<?php echo $productData['buy_price']; ?>"><br><br>
        
        <label for="sell_price">Sell Price:</label>
        <input type="number" name="sell_price" id="sell_price" placeholder="Sell Price" required value="<?php echo $productData['sell_price']; ?>"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>
