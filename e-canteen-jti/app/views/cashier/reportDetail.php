<?php

include "templates/header.php";
// include "templates/navbar.php";

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
    <?php
    $date = date('Y-m-d', strtotime($salesTransactionData['sales_transaction_date']));    
    ?>
    <h1>E-Canteen JTI</h1>

    <h2>Report Information</h2>
    <p><strong>Transaction Code:</strong> <?php echo $salesTransactionData['sales_transaction_code']; ?></p>
    <p><strong>Date:</strong> <?php echo $date; ?></p>
    <p><strong>Total:</strong> Rp<?php echo number_format($salesTransactionData['total'], 2); ?></p>
    <p><strong>Paid:</strong> Rp<?php echo number_format($salesTransactionData['paid'], 2); ?></p>
    <p><strong>Change:</strong> Rp<?php echo number_format($salesTransactionData['change'], 2); ?></p>
    <p><strong>User:</strong> <?php echo $salesTransactionData['username']; ?></p>

    <h2>Details</h2>
    <table border="1">
    <thead>
        <tr>
            <th>Transaction Code</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($salesTransactionDetailData as $detailData) : ?>
                <tr>
                    <td><?php echo $detailData['sales_transaction_code']; ?></td>
                    <td><?php echo $detailData['product_name']; ?></td>
                    <td><?php echo $detailData['quantity']; ?></td>
                    <td>Rp<?php echo number_format($detailData['unit_price'], 2); ?></td>
                    <td>Rp<?php echo number_format($detailData['subtotal'], 2); ?></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<script>
    window.print();
</script>



<?php

// include "templates/footer.php";

?>