<?php
session_start();

if( !isset($_SESSION["admin"]) ){
  header("Location: ../../index.php");
  exit;
}
require '../functions.php';
$comm = query("SELECT * FROM comment NATURAL JOIN user NATURAL JOIN product");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/backend.css">
    <link rel="stylesheet" href="../../css/backend/comment.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Dashboard</title>
    <style>
      body {
        color: white;
      }
    </style>
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
                  <a class="nav-link" href="dashboard.php">
                    <span><i class="fa fa-tachometer-alt"></i></span>
                    <span class="nav-name">Dashboard</span> <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="product.php">
                    <span><i class="fa fa-mobile-alt"></i></span>
                    <span class="nav-name">Products</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="user.php">
                    <span><i class="fa fa-users"></i></span>
                    <span class="nav-name">User</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="comment.php">
                    <span><i class="fa fa-comment-alt"></i></span>
                    <span class="nav-name">Comment</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="rating.php">
                    <span><i class="fa fa-star"></i></span>
                    <span class="nav-name">Rating</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="crud/tambah.php">
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
                  <a class="nav-link" href="admin.php">
                    <span><i class="fa fa-user-cog"></i></span>
                    <span class="nav-name">Admin List</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../login/registrasiAdmin.php">
                    <span><i class="fa fa-user-plus"></i></span>
                    <span class="nav-name">Add Admin</span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="report/reportComment.php" target="_blank">
                    <span><i class="fa fa-print"></i></span>
                    <span class="nav-name">Report</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../login/logout.php">
                    <span><i class="fa fa-sign-out-alt"></i></span>
                    <span class="nav-name">Sign Out</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          
          <main class="main col">
            <nav class="navbar navbar-light">
              <span class="navbar-brand mb-0 h1">Comment</span>
              
            </nav>

            <div id="container">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col"  class="hide">User</th>
                    <th scope="col">Username</th>
                    <th scope="col">Product</th>
                    <th scope="col">Comment</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($comm)) :?>
                    <tr>
                      <td colspan="5"><h1 align="center">Data Not Found</h1></td>
                    </tr>
                    
                  <?php endif; ?>
                  <?php $i=1; ?>
                  <?php foreach ($comm as $com) : ?>
                  <tr>
                    <td scope="row"><?= $i ?></td>
                    <td class="hide"><?= $com['fullname']; ?></td>
                    <td><?= $com['username']; ?></td>
                    <td><?= $com['brand']; ?> <?= $com['name']; ?></td>
                    <td><?= $com['message']; ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </main>
         
      </div>


      
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js" ></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>

