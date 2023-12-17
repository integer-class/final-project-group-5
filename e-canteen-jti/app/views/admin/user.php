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
            <a class="nav-link active" href="/admin/user">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/product">Product</a>
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
  </nav>

  <div class="container">
    <h2>User Management</h2>
            <!-- Search Form -->
            <form class="d-flex" role="search" action="/admin/getUsername" method="post">
        <input class="form-control me-2" type="text" placeholder="Search Username" aria-label="Search" name="username">
        <button class="btn btn-dark" type="submit">Search</button>
      </form><br>
    <a class="btn btn-dark" href="/admin/createUser">Add User</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col">User ID</th>
                <th class="col">Username</th>
                <th class="col">Email</th>
                <th class="col">Role</th>
                <th class="col">Address</th>
                <th class="col">Phone Number</th>
                <th class="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user_data as $user) { ?>
            <tr>
                <td><?php echo $user['user_id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td><?php echo $user['address']; ?></td>
                <td><?php echo $user['phone_number']; ?></td>
                <td>
              <div class="row">
                <div class="col">
                  <a style="width: 100%;" class="btn btn-dark" href="/admin/editUser?user_id=<?php echo $user['user_id']; ?>">Edit</a>
                </div>
                <div class="col">
                  <form action="/admin/deleteUser" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                    <button style="width: 100%;" type='submit' class="btn btn-dark">Delete</button>
                  </form>
                </div>
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
