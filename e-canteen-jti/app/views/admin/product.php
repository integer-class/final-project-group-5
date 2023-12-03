<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btns {
            display: flex;
            justify-content: space-between;
        }
        .action-btns button {
            margin-inline: 5px;
            width: 75%;
        }
        .action-btns form {
            width: 100%;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="/admin/home">Home</a></li>
        <li><a href="/admin/user">User</a></li>
        <li><a href="/admin/product">Product</a></li>
        <li><a href="#">Report</a></li>
    </ul>

    <h2>Product Data</h2>
    <button onclick="window.location.href='/admin/createProduct'">Add Product</button>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Supplier Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Buy Price</th>
                <th>Sell Price</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($product_data as $product) {
                    echo "<tr>";
                    echo "<td>".$product['product_id']."</td>";
                    echo "<td>".$product['product_name']."</td>";
                    echo "<td>".$product['supplier_name']."</td>";
                    echo "<td>".$product['description']."</td>";
                    echo "<td>".$product['category']."</td>";
                    echo "<td>".$product['stock']."</td>";
                    echo "<td>Rp".$product['buy_price']."</td>";
                    echo "<td>Rp".$product['sell_price']."</td>";
                    echo "<td class='action-btns'>";
                    echo "<button onclick=\"window.location.href='/admin/editProduct?product_id=".$product['product_id']."'\">Edit</button>";
                    echo "<form method='post' action='/admin/deleteProduct'>";
                    echo "<input type='hidden' name='product_id' value='".$product['product_id']."'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>
