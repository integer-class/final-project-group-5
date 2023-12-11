<?php

include "templates/header.php";
include "templates/navbar.php";

?>

<!-- Content -->
<style>
    .container {
        width: 80%;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-x: auto; /* Untuk memberikan kemampuan scroll horizontal pada tabel jika dibutuhkan */
    }

    h1 {
        margin-bottom: 20px;
        font-size: 28px;
    }

    h2 {
        margin-top: 30px;
        margin-bottom: 15px;
        font-size: 24px;
    }

    p {
        margin: 5px 0;
        font-size: 16px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 16px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f2f2f2;
    }
</style>


<div class="container">
    <h1>E-Canteen JTI</h1>

    <h2>Report Information</h2>
    <p><strong>Transaction ID:</strong> <?php echo $salesTransactionData['sales_transaction_id']; ?></p>
    <p><strong>Transaction Code:</strong> <?php echo $salesTransactionData['sales_transaction_code']; ?></p>
    <p><strong>Date:</strong> <?php echo $salesTransactionData['sales_transaction_date']; ?></p>
    <p><strong>Total:</strong> <?php echo $salesTransactionData['total']; ?></p>
    <p><strong>Paid:</strong> <?php echo $salesTransactionData['paid']; ?></p>
    <p><strong>Change:</strong> <?php echo $salesTransactionData['change']; ?></p>
    <p><strong>User ID:</strong> <?php echo $salesTransactionData['user_id']; ?></p>

    <h2>Details</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaction Code</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?php echo $salesTransactionDetailData['sales_transaction_detail_id']; ?></td>
                    <td><?php echo $salesTransactionDetailData['sales_transaction_code']; ?></td>
                    <td><?php echo $salesTransactionDetailData['product_id']; ?></td>
                    <td><?php echo $salesTransactionDetailData['quantity']; ?></td>
                    <td><?php echo $salesTransactionDetailData['unit_price']; ?></td>
                    <td><?php echo $salesTransactionDetailData['subtotal']; ?></td>
                </tr>
        </tbody>
    </table>
</div>



<?php

include "templates/footer.php";

?>