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

        .description {
          margin-top: 200px;
        }
        footer {
          margin-top: 100px;
          bottom: 0;
          width: 100%;
        }
        .card {
          border-radius: 10px;
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
          background-color: #0c1c43;
          color: #FFFFFF;
          font-weight: bold;
          border-radius: 10px;
        }
        .logout {
          margin-top: 120px;
        }
        .content {
          margin-right: -30px;
        }
        .selected {
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
        <!-- content -->
  <div class="container content">
  <div class="jumbotron">
    <div class="row">
      <div class="col-md-8"><br><br><br><br>
        <h1 class="display-4">Welcome to E-Canteen JTI!</h1>
        <p class="lead">Where Transactions Meet Simplicity</p>
      </div>
      <div class="col-md-4">
        <img src="/assets/img/cupcake.svg" class="img-fluid" alt="Image">
      </div>
    </div>
  </div>
    </div>

    <!-- description -->
    <div class="container description content">
      <h2 class="text-center">Description</h2><br>
      <p class="text-center">The campus e-canteen is a canteen digitization system on the Malang State Polytechnic campus that uses information technology to facilitate the process of buying and selling food and drinks. This system adopts an online food ordering system using a special application. E-canteen campus is one of the innovations that can be applied on campus to improve the quality of canteen services and be more efficient, fast,</p>
    </div>

<!-- Our Team -->
<div class="container our-team content">
      <h2 class="text-center">Our Team</h2><br>
      <div class="row">
      <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
              <img src="/assets/img/azhar.jpeg" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title">AL AZHAR RIZQI RIFA'I FIRDAUS</h5>
                <p class="card-text">2241720263</p>
              </div>
            </div>
          </div>
        </div>
      <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
              <img src="/assets/img/nanda.jpeg" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title">Ananda Az Haruddin Salima</h5>
                <p class="card-text">2241720071</p>
              </div>
            </div>
          </div>
        </div>
      <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
              <img src="/assets/img/bagas.jpeg" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title">Gastiadirijal N.K.</h5>
                <p class="card-text">2241720001</p>
              </div>
            </div>
          </div>
        </div>
        </div><br>

      <div class="row">
      <div class="col-md-4 mx-auto">
          <div class="card text-center">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
              <img src="/assets/img/maul.jpeg" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title">Maulana Dwi Cahyono</h5>
                <p class="card-text">2241720241</p>
              </div>
            </div>
          </div>
        </div>
      <div class="col-md-4 mx-auto">
          <div class="card text-center">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
              <img src="/assets/img/nathan.jpeg" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title">Renathan Anggoro Arry Wibisono</h5>
                <p class="card-text">2241720239</p>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
          <div class="container text-center">
            <p>&copy; 2023 E-Canteen JTI. All rights reserved.</p>
          </div>
        </footer>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>