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
        .jumbotron {
          padding: 50px 0;
        }
        
        body {
          font-family: 'Quicksand', sans-serif;
        }
        .card {
            margin-inline: 5px;
            margin-block: 5px;
        }
        form {
            margin-inline: 10px;
        }
        form input {
            width: 100%;
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
            <a class="nav-link" aria-current="page" href="/cashier/home"><i class="fa-solid fa-house"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cashier/sales"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cashier/product"><i class="fa-solid fa-box"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cashier/report"><i class="fa-solid fa-clipboard-list"></i></a>
          </li>
          <li class="nav-item logout">
            <a class="nav-link" href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
          </li>
        </ul>
            </div>
        </div>
      <div class="col-md-12">
      <div class="container content">
    <h2>Sales Transaction</h2>
    <div class="row">
        <div class="productList col-md-8 mx-auto">
            <div class="row">
            <?php foreach ($product_data as $product) : ?>
              <?php if ($product->getStock() > 0) : ?>
                  <div class="productItem col-md-4">
                      <div class="productInfo card" style="width: 18rem;">
                          <img class="productImage" src="/uploads/<?php echo basename($product->getImage()); ?>" alt="<?php echo $product->getProductName(); ?>">
                          <div class="card-body">
                              <h5 class="card-title"><?php echo $product->getProductName(); ?></h5>
                              <p class="card-text"><?php echo $product->getProductCode(); ?></p>
                              <p class="card-text">Price: Rp<?php echo number_format($product->getSellPrice(), 2); ?></p>
                              <p class="card-text">Stock: <?php echo $product->getStock(); ?></p>
                              <button class="quantityButton btn addUser" data-product-name="<?php echo $product->getProductName(); ?>" data-product-id="<?php echo $product->getProductId(); ?>" data-sell-price="<?php echo $product->getSellPrice(); ?>">Add Product</button>
                          </div>
                      </div>
                  </div>
              <?php endif; ?>
          <?php endforeach; ?>             
            </div>
        </div>
        <div class="checkout col-md-4">
        <div id="salesForm">
          <h2 class="text-center">Checkout</h2>
          <form action="/cashier/processSale" method="POST" id="sales_form">
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $userData; ?>">
            <div id="quantityInputs">
              <!-- Dynamic input for selected products -->
            </div>
            <div class="mb-3">
              <label class="form-label" for="total">Total Price:</label>
              <input class="form-control" type="number" id="total" name="total" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label" for="paid">Paid Amount:</label>
              <input class="form-control" type="number" id="paid" name="paid" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="change">Change Amount:</label>
              <input class="form-control" type="number" id="change" name="change" readonly>
            </div>
            <input class="btn addUser" type="submit" value="Confirm Payment">
          </form>
        </div>
      </div>
    </div><br>



  <footer>
          <div class="container text-center">
            <p>&copy; 2023 E-Canteen JTI. All rights reserved.</p>
          </div>
        </footer>
  </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.quantityButton').click(function() {
        var productId = $(this).data('product-id');
        var productName = $(this).data('product-name');
        var sellPrice = $(this).data('sell-price');
        
        var quantityInput = '<div class="productItem">';
        quantityInput += '<div class="productInfo card" style="width: 100%;">';
        quantityInput += '<div class="card-body">';
        quantityInput += '<h5 class="card-title">' + productName + '</h5>';
        quantityInput += '<p class="card-text">Price: Rp' + sellPrice + '</p>';
        quantityInput += '<label for="quantity_product_' + productId + '">Quantity:</label>';
        quantityInput += '<input min=0 type="number" id="quantity_product_' + productId + '" name="quantity[' + productId + ']" class="quantityInput form-control" data-product-id="' + productId + '" data-sell-price="' + sellPrice + '" required><br>';
        quantityInput += '<button style="width: 100%;" class="btn addUser removeProduct" data-product-id="' + productId + '">Remove</button>';
        quantityInput += '</div></div></div>';

        $('#quantityInputs').append(quantityInput);
      });

      $('#sales_form').on('input', '.quantityInput', function() {
        recalculateTotal();
      });
      
      $('#paid').on('input', function() {
        recalculateTotal();
      });

      // Script to remove the product from checkout
      $('#quantityInputs').on('click', '.removeProduct', function() {
        $(this).closest('.productItem').remove();
        recalculateTotal();
      });

      function recalculateTotal() {
        var totalAmount = 0;

        $('.quantityInput').each(function() {
          var sellPrice = parseFloat($(this).data('sell-price'));
          var quantity = $(this).val() ? parseInt($(this).val()) : 0;
          var totalPrice = sellPrice * quantity;
          totalAmount += totalPrice;
        });

        $('#total').val(totalAmount.toFixed(2));

        var paidAmount = parseFloat($('#paid').val());
        var changeAmount = paidAmount - totalAmount;
        $('#change').val(changeAmount.toFixed(2));
      }
    });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>