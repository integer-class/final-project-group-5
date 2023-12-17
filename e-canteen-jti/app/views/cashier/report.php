<?php

include "templates/header.php";
include "templates/navbar.php";

?>

<!-- Content -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .container {
        width: 95%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    h1 {
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f2f2f2;
    }
    .detail-button {
        background-color: #008CBA;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 4px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .detail-button:hover {
        background-color: #005f6b;
    }
</style>

<div class="container">
    <h1>E-Canteen JTI</h1>
    <h3>Sales Transaction Report</h3>
    <a href="/cashier/printReport">Print Sales Transaction Report</a>

    <table border="1">
        <thead>
            <tr>
                <th>Transaction Code</th>
                <th>Date</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Change</th>
                <th>User</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salesTransactionData as $transaction) : ?>
                <?php
                    $date = date('Y-m-d', strtotime($transaction['sales_transaction_date']));    
                ?>
                <tr>
                    <td><?php echo $transaction['sales_transaction_code']; ?></td>
                    <td><?php echo $date; ?></td>
                    <td>Rp<?php echo number_format($transaction['total'], 2); ?></td>
                    <td>Rp<?php echo number_format($transaction['paid'], 2); ?></td>
                    <td>Rp<?php echo number_format($transaction['change'], 2); ?></td>
                    <td><?php echo $transaction['username']; ?></td>
                    <td><a class="detail-button" href="/cashier/detailReport?sales_transaction_id=<?php echo $transaction['sales_transaction_id']; ?>">Print Detail Report</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php

include "templates/footer.php";

?>