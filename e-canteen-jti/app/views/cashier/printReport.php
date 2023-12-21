<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cashier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
img {
    width: 50px;
}
    </style>
  </head>
  <body><br>

    <!-- content -->
    <div class="container">
    <div class="row">
        <div class="col-md-1">
        <img src="/assets/img/logo.png" alt="">
        </div>
        <div class="col-md-11 mt-1">
        <h1>E-Canteen JTI</h1>
        </div>
    </div><hr style="border: 2px solid">
    <h2>Sales Transaction Report</h2>
    <table>
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
    </table>

    <table class="table table-striped table-hover border border-2">
        <thead>
            <tr>
                <th>Transaction Code</th>
                <th>Date</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Change</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($salesTransactionData as $transaction) : ?>
                <?php
                    $date = date('Y-m-d', strtotime($transaction->getSalesTransactionDate()));    
                ?>
                <tr>
                    <td><?php echo $transaction->getSalesTransactionCode(); ?></td>
                    <td><?php echo $date; ?></td>
                    <td>Rp<?php echo number_format($transaction->getTotal(), 2); ?></td>
                    <td>Rp<?php echo number_format($transaction->getPaid(), 2); ?></td>
                    <td>Rp<?php echo number_format($transaction->getChange(), 2); ?></td>
                    <td><?php echo $transaction->getUsername(); ?></td>
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