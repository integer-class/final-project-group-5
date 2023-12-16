<?php

include "templates/header.php";
include "templates/navbar.php";

?>

<!-- Content -->
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

    <h2>Product Data</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Supplier Name</th>
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
                    echo "<td>".$product['product_code']."</td>";
                    echo "<td>".$product['product_name']."</td>";
                    echo "<td>".$product['supplier_name']."</td>";
                    echo "<td>".$product['category']."</td>";
                    echo "<td>".$product['stock']."</td>";
                    echo "<td>Rp".number_format($product['buy_price'], 2)."</td>";
                    echo "<td>Rp".number_format($product['sell_price'], 2)."</td>";
                    echo "<td class='action-btns'>";
                    echo "<button onclick=\"window.location.href='/cashier/detailProduct?product_id=".$product['product_id']."'\">Detail</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

<?php

include "templates/footer.php";

?>