<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assests/css/login.css">
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

.center-div {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.btn {
  width: 100%;
}

.form {
  max-width: 500px;
  width: 100%;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
footer {
  margin-top: -40px;
  text-align: center;
}
    </style>
</head>

<body>
    <div class="container">
    <div class="center-div">
        <div class="form">
        <h2 class="text-center">Login</h2>
        <form action="/login" method="post">
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-dark">Login</button>
            <?php

            if (isset($_GET['error']) && $_GET['error'] === 'failed') {
                echo "<p style='color: red;'>Username or Password is wrong</p>";
            }

            ?>
        </form>
        </div>
    </div>
    </div>
    

    <footer>
        <p>&copy; 2023 - E-Canteen JTI</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>