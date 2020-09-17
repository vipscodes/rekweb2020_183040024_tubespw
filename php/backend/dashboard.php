<?php
session_start();

if( !isset($_SESSION["admin"]) ){
  header("Location: ../../index.php");
  exit;
}
require '../functions.php';
$comm = query("SELECT * FROM comment NATURAL JOIN user NATURAL JOIN product ORDER BY comment_id DESC LIMIT 5"); 


$rating = query("SELECT * FROM rating NATURAL JOIN user NATURAL JOIN product ORDER BY rating_id DESC LIMIT 5"); 

$admin = query("SELECT * FROM user WHERE administator = '1' ");

$product = query("SELECT * FROM product ORDER BY product_id DESC LIMIT 5");
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
    <link rel="stylesheet" href="../../css/backend/dashboard.css">
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
                  <a class="nav-link active" href="dashboard">
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
                  <a class="nav-link" href="comment.php">
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
                  <a class="nav-link" href="../login/logout.php">
                    <span><i class="fa fa-sign-out-alt"></i></span>
                    <span class="nav-name">Sign Out</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          
          <main class="main col-9">
            <nav class="navbar navbar-light">
              <span class="navbar-brand mb-0 h1">Dashboard</span>
            </nav>
            
            <div class="card-columns">

              <div class="card">
                <img src="../../assets/img/logo/logo1.png" alt="" class="card-image-top">
              </div>
              
              <div class="card text-center">
                <div class="card-body">
                  <p class="card-text">Copyright © 2019 <br><a href="https://about.me/avipsyaifulloh" target="_blank">Avip Syaifulloh</a> 183040024 Made with HTML, CSS, Javascript, JQuery, Bootstrap4, php and ajax.</p>
                </div>
              </div>
              <div class="card comment over">
                
                <div class="card-body">
                  <h5 class="card-title">Last Comment</h5>
                  <?php foreach ($comm as $com) : ?>
                  <h6 class="card-text"><?= $com['username']; ?></h6>
                  <h6 class="card-text"><?= $com['brand']; ?> <?= $com['name']; ?></h6>
                  <p class="card-text"><?= $com['message']; ?></p>
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="card p-3 imp">
                <blockquote class="blockquote mb-0 card-body">
                  <h5>Next Improvement</h5>
                  <p>Feature</p>
                  <ul>
                    <li>Filter</li>
                    <li>live check</li>
                    <li>email verification</li>
                    <li>account activasion</li>
                  </ul>
                </blockquote>
              </div>
              
              <div class="card text-white text-center p-3 quote">
                <blockquote class="blockquote mb-0">
                  <p>Keep Calm, Stay Awesome, be the best and do it better</p>
                  <footer class="blockquote-footer text-white">
                    <small>
                      Avip Syaifulloh <cite title="Source Title">vipreview.tech</cite>
                    </small>
                  </footer>
                </blockquote>
              </div>

              <div class="card rating over">
                <div class="card-body">
                  <h5 class="card-title">Last Rating</h5>
                  <?php foreach ($rating as $rat) : ?>
                  <h6 class="card-text"><?= $rat['username']; ?></h6>
                  <h6 class="card-text"><?= $rat['brand']; ?> <?= $rat['name']; ?></h6>
                  <p class="card-text"><?= $rat['rating_val']; ?> / 5</p>
                  <?php endforeach; ?>
                </div>
              </div>
              
              <div class="card p-3 text-right">
                  <h5>Admin List</h5>
                    <small class="text-muted">

                      <?php foreach ($admin as $adm) : ?>
                        <h6><?= $adm['username']; ?></h6>
                        <p><?= $adm['email']; ?></p>
                      <?php endforeach; ?>
                      
                    </small>
              </div>
              <div class="card last">
                <div class="card-body">
                  <h5 class="card-title">Last Add Product</h5>
                  <br>
                  <ul>
                    <?php foreach ($product as $prd) : ?>
                      <li class="card-text"><?= $prd['brand']; ?> <?= $prd['name']; ?></li>
                    <?php endforeach; ?>
                  </ul>
                  
                </div>
              </div>
            </div>
          </main>
         
      </div>


      
    <!-- Optional JavaScript -->
    <script src="../../js/jquery-3.3.1.min.js" ></script>
    <script src="../../js/jquery.easing.1.3.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

  </body>
</html>

