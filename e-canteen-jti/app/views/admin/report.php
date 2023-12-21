<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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
.sidebar img {
          width: 50px;
          margin-top: 20px;
        }
.sidebar {
          margin-left: -50px;
          position: fixed;
        }
        .sidebar ul {
          margin-top: 30px;
        }
        .sidebar ul li a {
          text-align: center;
          margin-block: 30px;
        }
        .nav-link:hover {
          background-color: #f3bb23;
          color: #000000;
          font-weight: bold;
          border-radius: 10px;
          
        }
        .logout {
          margin-top: 120px;
        }
        .content {
          margin-right: -30px;
          margin-top: 30px;
        }
        .addUser {
          background-color: #0c1c43;
          color: #FFFFFF;
        }
        .nav-link:hover {
          background-color: #0c1c43;
          color: #FFFFFF;
          font-weight: bold;
          border-radius: 10px;
        }
        .editUser {
          background-color: #fbb217;
          color: #FFFFFF;
        }
        .editUser:hover {
          background-color: #FFFFFF;
          color: #fbb217;
          border: #fbb217 solid 2px;
          font-weight: bold;
        }
        .deleteUser {
          background-color: #9A3C32;
          color: #FFFFFF;

      }
      .deleteUser:hover {
          background-color: #FFFFFF;
          color: #9A3C32;
          border: #9A3C32 solid 2px;
          font-weight: bold;
      }
    </style>
  </head>
  <body>

  <div class="container">
    <div class="row">
    <div class="col-md-0">
        <!-- sidebar -->
        <div class="sidebar">
            <img src="/assets/img/logo.png" alt="">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/admin/home"><i class="fa-solid fa-house"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/user"><i class="fa-solid fa-user"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/product"><i class="fa-solid fa-box"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/report"><i class="fa-solid fa-clipboard-list"></i></a>
          </li>
          <li class="nav-item logout">
            <a class="nav-link" href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
          </li>
        </ul>
            </div>
      </div>
      <div class="col-md-12">
          <!-- content -->
  <div class="container content">
    <h2>Sales Transaction Report</h2>
        <!-- Search Form -->
        <form class="d-flex" role="search" action="/admin/getReportByDate" method="post">
        <input class="form-control me-2" type="date" placeholder="Search Product Name" aria-label="Search" name="date">
        <button class="btn addUser" type="submit">Search</button>
      </form><br>
    <a class="btn btn-dark" href="/admin/printReport">Print Report</a>

    <table class="table table-striped table-hover">
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
                    $date = date('Y-m-d', strtotime($transaction->getSalesTransactionDate()));    
                ?>
                <tr>
                    <td><?php echo $transaction->getSalesTransactionCode(); ?></td>
                    <td><?php echo $date; ?></td>
                    <td>Rp<?php echo number_format($transaction->getTotal(), 2); ?></td>
                    <td>Rp<?php echo number_format($transaction->getPaid(), 2); ?></td>
                    <td>Rp<?php echo number_format($transaction->getChange(), 2); ?></td>
                    <td><?php echo $transaction->getUsername(); ?></td>
                    <td><a class="btn addUser" href="/admin/detailReport?sales_transaction_id=<?php echo $transaction->getSalesTransactionId(); ?>">Print Detail Report</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  <footer>
          <div class="container text-center">
            <p>&copy; 2023 E-Canteen JTI. All rights reserved.</p>
          </div>
        </footer>
  </div>
      </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>