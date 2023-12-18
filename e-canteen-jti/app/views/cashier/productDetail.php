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
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');
        .jumbotron {
          padding: 50px 0;
        }
        
        body {
          font-family: 'Quicksand', sans-serif;
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
            <a class="nav-link" aria-current="page" href="/cashier/home">Home</a>
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

  <div class="container">
  <h2>Detail Product</h2>
  <div class="card mx-auto" style="width: 18rem;">
  <img src="/uploads/<?php echo basename($productData->getImage()); ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $productData->getProductName(); ?></h5>
    <p class="card-text">Product Id : <?php echo $productData->getProductId(); ?></p>
    <p class="card-text">Product Code : <?php echo $productData->getProductCode(); ?></p>
    <p class="card-text">Supplier Name : <?php echo $productData->getSupplierName(); ?></p>
    <p class="card-text">Description : <?php echo $productData->getDescription(); ?></p>
    <p class="card-text">Category : <?php echo $productData->getCategory(); ?></p>
    <p class="card-text">Stock : <?php echo $productData->getStock(); ?></p>
    <p class="card-text">Buy Price : Rp<?php echo number_format($productData->getBuyPrice(), 2); ?></p>
    <p class="card-text">Sell Price : Rp<?php echo number_format($productData->getSellPrice(), 2); ?></p>
  </div>
</div><br>

  <footer>
          <div class="container text-center">
            <p>&copy; 2023 E-Canteen JTI. All rights reserved.</p>
          </div>
        </footer>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>