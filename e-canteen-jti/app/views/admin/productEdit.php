<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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
.btn {
        width: 100%;
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
            <a class="nav-link" href="/admin/user">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/admin/product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/report">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>

  <!-- content -->
  <div class="container">
    <h2>Edit Product</h2>
    <form action="/admin/editProduct" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?php echo $productData->getProductId(); ?>">
      <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $productData->getProductName(); ?>" required>
      </div>
      <div class="mb-3">
        <label for="product_code" class="form-label">Product Code</label>
        <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $productData->getProductCode(); ?>" required>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
      </div>
      <div class="mb-3">
        <label for="supplier_name" class="form-label">Supplier Name</label>
        <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="<?php echo $productData->getSupplierName(); ?>" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" class="form-control" id="description" name="description"required><?php echo $productData->getDescription(); ?></textarea>
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category" value="<?php echo $productData->getCategory(); ?>" required>
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" min="0" name="stock" value="<?php echo $productData->getStock(); ?>" required>
      </div>
      <div class="mb-3">
        <label for="buy_price" class="form-label">Buy Price</label>
        <input type="number" class="form-control" id="buy_price" min="0" name="buy_price" value="<?php echo $productData->getBuyPrice(); ?>" required>
      </div>
      <div class="mb-3">
        <label for="sell_price" class="form-label">Sell Price</label>
        <input type="number" class="form-control" id="sell_price" min="0" name="sell_price" value="<?php echo $productData->getSellPrice(); ?>" required>
      </div>
      <button type="submit" class="btn btn-dark">Edit</button>
    </form>
  </div><br>

   <footer>
          <div class="container text-center">
            <p>&copy; 2023 E-Canteen JTI. All rights reserved.</p>
          </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>