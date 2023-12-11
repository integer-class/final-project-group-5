<?php
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- content -->
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
        }
        h1 {
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="number"],
        select {
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .productItem {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .productInfo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        .productImage {
            width: 200px;
            height: auto;
        }
        .quantityButton {
            padding: 5px 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .quantityButton:hover {
            background-color: #45a049;
        }
        .container {
        display: flex;
        justify-content: space-between;
        }
        #productsList {
            width: 45%;
        }
        #salesForm {
            width: 45%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <h1>Sales Transaction</h1>

    <div class="container">
    <div id="productsList">
        <?php foreach ($product_data as $product) : ?>
            <div class="productItem">
                <div class="productInfo">
                    <div>
                        <h3><?php echo $product['product_name']; ?></h3>
                        <p>Price: <?php echo $product['sell_price']; ?></p>
                        <p>Stock: <?php echo $product['stock']; ?></p>
                    </div>
                    <img class="productImage" src="/uploads/<?php echo basename($product['image']); ?>" alt="<?php echo $product['product_name']; ?>">
                </div>
                <button class="quantityButton" data-product-id="<?php echo $product['product_id']; ?>">Select Quantity</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="salesForm">
        <h2>Checkout</h2>
        <form action="/cashier/processSale" method="POST" id="sales_form">
        <input type="hidden" id="product_id" name="product_id">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $userData; ?>">
            <div id="quantityInputs">
            </div>

            <label for="total">Total Price:</label>
            <input type="number" id="total" name="total" readonly><br><br>

            <label for="paid">Paid Amount:</label>
            <input type="number" id="paid" name="paid" required><br><br>

            <label for="change">Change Amount:</label>
            <input type="number" id="change" name="change" readonly><br><br>

            <input type="submit" value="Process Sale">
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.quantityButton').click(function() {
            var productId = $(this).data('product-id');
            $('#product_id').val(productId);
            var quantityInput = '<label for="quantity_product_' + productId + '">Quantity for Product ' + productId + ':</label><br><br>';
            quantityInput += '<input type="number" id="quantity_product_' + productId + '" name="quantity" required data-product-id="' + productId + '" class="quantityInput"><br>';

            $('#quantityInputs').html(quantityInput);

            $('.quantityInput').on('input', function() {
                var productId = $(this).data('product-id');
                var quantity = $(this).val();
                var sellPrice = <?php echo json_encode($product['sell_price']); ?>; 

                var totalPrice = sellPrice * quantity;
                $('#total_price_' + productId).val(totalPrice);

                var totalAmount = 0;
                $('.quantityInput').each(function() {
                    var qty = $(this).val();
                    var prodSellPrice = <?php echo json_encode($product['sell_price']); ?>;
                    totalAmount += parseFloat(qty) * parseFloat(prodSellPrice);
                });
                $('#total').val(totalAmount);

                var paidAmount = parseFloat($('#paid').val());
                var changeAmount = paidAmount - totalAmount;
                $('#change').val(changeAmount.toFixed(2));
            });
            
            $('#paid').on('input', function() {
                var paidAmount = parseFloat($(this).val());
                var totalAmount = parseFloat($('#total').val());
                var changeAmount = paidAmount - totalAmount;
                $('#change').val(changeAmount.toFixed(2));
            });
        });
    });
</script>




<?php
include 'templates/footer.php';
?>