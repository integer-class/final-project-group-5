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
        .jumbotron {
          padding: 50px 0;
        }
        
        body {
          font-family: 'Quicksand', sans-serif;
        }
  
        .jumbotron .display-4 {
          font-size: 50px;
        }
  
        .jumbotron .lead {
          font-size: 24px;
        }
  
        .jumbotron img {
          width: 90%;
        }
        .content {
          margin-top: 100px;
        }

        .our-team {
          margin-top: 200px;
        }
        .our-team img {
          width: 50%;
          
        }
        footer {
          margin-top: 100px;
          bottom: 0;
          width: 100%;
        }
        .card {
          border-radius: 10px;
        }
    </style>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">E-Canteen JTI</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/admin/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cashier/sales">Sales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/cashier/product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cashier/report">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>




  <!-- content -->
  <div class="container">
    <h2>Product Data</h2>
                <!-- Search Form -->
                <form class="d-flex" role="search" action="/cashier/getProductName" method="post">
        <input class="form-control me-2" type="text" placeholder="Search Product Name" aria-label="Search" name="product_name">
        <button class="btn btn-dark" type="submit">Search</button>
      </form><br>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col">Product Code</th>
                <th class="col">Product name</th>
                <th class="col">Supplier Name</th>
                <th class="col">Category</th>
                <th class="col">Stock</th>
                <th class="col">Buy Price</th>
                <th class="col">Sell Price</th>
                <th class="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product_data as $product) { ?>
            <tr>
                <td><?php echo $product['product_code']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['supplier_name']; ?></td>
                <td><?php echo $product['category']; ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td>Rp<?php echo number_format($product['buy_price'], 2); ?></td>
                <td>Rp<?php echo number_format($product['sell_price'], 2); ?></td>
                <td>
                <div class="col">
                  <a style="width: 100%;" class="btn btn-dark" href="/cashier/detailProduct?product_id=<?php echo $product['product_id']; ?>">Detail</a>
                </div>
            </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <footer>
          <div class="container text-center">
            <p>&copy; 2023 E-Canteen JTI. All rights reserved.</p>
          </div>
        </footer>
  </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>