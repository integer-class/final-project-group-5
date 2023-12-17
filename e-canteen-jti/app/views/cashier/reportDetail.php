<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cashier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .navbar a:hover {
    font-weight: bold;
}

  .btn:hover {
    background-color: #FFFFFF;
    color: #000000;
    border: #000000 solid 2px;
    font-weight: bold;
}
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');

body {
  font-family: 'Quicksand', sans-serif;
}
    </style>
  </head>
  <body>

  <!-- content -->
  <div class="container">
    <h1>E-Canteen JTI</h1><hr style="border: 2px solid">
    <h2>Sales Transaction Detail Report</h2>
    <table>
        <tr>
            <td><b>Transaction Code</b></td>
            <td><b> : </b></td>
            <td><?php echo $salesTransactionData['sales_transaction_code']; ?></td>
        </tr>
        <tr>
            <td><b>Total</b></td>
            <td><b> : </b></td>
            <td>Rp<?php echo number_format($salesTransactionData['total'], 2); ?></td>
        </tr>
        <tr>
            <td><b>Paid</b></td>
            <td><b> : </b></td>
            <td>Rp<?php echo number_format($salesTransactionData['paid'], 2); ?></td>
        </tr>
        <tr>
            <td><b>Change</b></td>
            <td><b> : </b></td>
            <td>Rp<?php echo number_format($salesTransactionData['change'], 2); ?></td>
        </tr>
        <tr>
            <td><b>Printed Date</b></td>
            <td>: </td>
            <td><?php echo date("d/m/Y"); ?></td>
        </tr>
        <tr>
            <td><b>Printed By</b></td>
            <td>: </td>
            <td><?php echo $_SESSION['username']; ?></td>
        </tr>
        <tr>
            <td><b>User</b></td>
            <td>: </td>
            <td><?php echo $salesTransactionData['username']; ?></td>
        </tr>
    </table><br>

    <table class="table table-striped table-hover border border-2">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>