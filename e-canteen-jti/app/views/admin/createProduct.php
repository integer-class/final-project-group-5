<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AddProduct</title>
</head>
<body>
    
    <h2>Add Product</h2>
    <form action="/admin/createProduct" method="post">
        <label for="product_name">Product Name:</label><br>
        <input type="text" name="product_name" id="product_name" placeholder="Product Name" required><br><br>
        
        <label for="supplier_name">Supplier Name:</label><br>
        <input type="text" name="supplier_name" id="supplier_name" placeholder="Supplier Name" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" placeholder="Description" required></textarea><br><br>
        
        <label for="category">Category:</label><br>
        <input type="text" name="category" id="category" placeholder="Category" required><br><br>
        
        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock" placeholder="Stock" required><br><br>
        
        <label for="buy_price">Buy Price:</label><br>
        <input type="number" name="buy_price" id="buy_price" placeholder="Buy Price" required><br><br>
        
        <label for="sell_price">Sell Price:</label><br>
        <input type="number" name="sell_price" id="sell_price" placeholder="Sell Price" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>
