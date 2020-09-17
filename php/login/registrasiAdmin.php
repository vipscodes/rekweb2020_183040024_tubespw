<?php
session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: ../../index.php");
  exit;
}

require '../functions.php';

if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('Admin baru berhasil ditambahkan');
          document.location.href = '../backend/dashboard.php';
        </script>";
  } else {
    echo "<script>
          alert('Admin baru gagal ditambahkan');
          document.location.href = '../backend/dashboard.php';
        </script>";
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../../assets/img/logo/logo5.png" type="image/x-icon" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/backend.css">
  <link rel="stylesheet" href="../../css/regis.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <title>Dashboard</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <nav class="col-3 sidebar">
        <div class="profile">
          <div class="picture">
            <img src="../../assets/img/Profile.jpg" alt="">
          </div>
          <div class="about">
            <h6>Avip Syaifulloh</h6>
            <hr>
          </div>
        </div>
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../backend/dashboard.php">
                <span><i class="fa fa-tachometer-alt"></i></span>
                <span class="nav-name">Dashboard</span> <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../backend/product.php">
                <span><i class="fa fa-mobile-alt"></i></span>
                <span class="nav-name">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../backend/user.php">
                <span><i class="fa fa-users"></i></span>
                <span class="nav-name">User</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../backend/comment.php">
                <span><i class="fa fa-comment-alt"></i></span>
                <span class="nav-name">Comment</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../backend/rating.php">
                <span><i class="fa fa-star"></i></span>
                <span class="nav-name">Rating</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../backend/crud/tambah.php">
                <span><i class="fa fa-plus"></i></span>
                <span class="nav-name">Add Product</span>
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading text-muted">
            <span>Admin</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="../backend/admin.php">
                <span><i class="fa fa-user-cog"></i></span>
                <span class="nav-name">Admin List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="registrasiAdmin.php">
                <span><i class="fa fa-user-plus"></i></span>
                <span class="nav-name">Add Admin</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span><i class="fa fa-sign-out-alt"></i></span>
                <span class="nav-name">Sign Out</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="main col">
        <nav class="navbar navbar-light">
          <span class="navbar-brand mb-0 h1">Register Admin</span>
        </nav>

        <div class="row adm">
          <div class="col-md-6 information">
            <h1>Information</h1>
            <p>As Admin you can manage this backend page like add product, update product detail, delete product, managing comment and rating, reporting and you can see all web users.</p>
            <p>If you have registered before check your username here :</p>
            <button>Admin List</button>
          </div>
          <div class="col-md-6 justify-content-center">
            <div class="form">
              <form action="" method="post">
                <label for="fullname">Fullname : </label>
                <input type="text" name="fullname" id="fullname" placeholder=" Insert Fullname" autocomplete="off">

                <label for="email">email : </label>
                <input type="email" name="email" id="email" placeholder=" example@mail.com" autocomplete="off">

                <label for="phone">phone : </label>
                <input type="phone" name="phone" id="phone" placeholder=" +62392xxx" autocomplete="off">

                <label for="username">username : </label>
                <input type="text" name="username" id="username" placeholder=" Insert Username" required autocomplete="off">

                <label for="password">password : </label>
                <input type="password" name="password" id="password" placeholder="Insert Password" required minlength="8" autocomplete="off">

                <label for="password2">Password Confirm : </label>
                <input type="password" name="password2" id="password2" placeholder="Confirm Password" required autocomplete="off">

                <input type="hidden" name="administator" id="admin" value="1">

                <button type="submit" name="register">Registrasi</button>
              </form>
            </div>

          </div>
        </div>

      </main>

    </div>



    <!-- Optional JavaScript -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/jquery.easing.1.3.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>