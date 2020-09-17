

<?php  

  session_start();

  if (isset($_SESSION['user'])) {
    $usid = $_GET['usid'];
  }

  require 'php/functions.php';
  $product1 = query("SELECT * FROM product WHERE product_id = 1");
  $product2 = query("SELECT * FROM product WHERE product_id = 2");
  $product3 = query("SELECT * FROM product WHERE product_id = 3");
  $product4 = query("SELECT * FROM product WHERE product_id = 4");
  $product5 = query("SELECT * FROM product WHERE product_id = 11");
  $product6 = query("SELECT * FROM product WHERE product_id = 12");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/logo/logo6.png" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>VIP REVIEW</title>
  </head>
  <body  id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand page-scroll" href="#home"><span>VIP</span>REVIEW</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" onclick="toggler(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user'])) { ?>
              <a class="nav-item nav-link page-scroll active" href="index.php?usid=<?= $usid; ?>">Home</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll active" href="index.php">Home</a>
            <?php } ?>
            
            <?php if (isset($_SESSION['user'])) { ?>
              <a class="nav-item nav-link page-scroll" href="php/frontend/brand.php?usid=<?= $usid; ?>">Brands</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll" href="php/frontend/brand.php">Brands</a>
            <?php } ?>

            <?php if (isset($_SESSION['user'])) { ?>
              <a class="nav-item nav-link page-scroll" href="php/frontend/producthome.php?usid=<?= $usid; ?>">All Product</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll" href="php/frontend/producthome.php">All Product</a>
            <?php } ?>

            <a class="nav-item nav-link page-scroll" href="#portfolio"></a>
            <?php 
            if (isset($_SESSION['user'])) {
              echo '<button class="nav-btn"><a href="php/login/logout.php" class=" page-scroll">LOGOUT</a></button>';
            } else
              echo '<button class="nav-btn"><a href="php/login/login.php" class=" page-scroll">LOGIN</a></button>';
            ?>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir Navbar -->
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
        <h1 class="display-4">Find the perfect phone for you</h1>
        <a href="#about" class="btn btn-primary tombol page-scroll">Discover Now</a>
        <div class="chevron1"><img src="assets/img/icon/chevron-bottom-4x.png"></div>
        <div class="chevron2"><img src="assets/img/icon/chevron-bottom-6x.png"></div>
        <div class="chevron3"><img src="assets/img/icon/chevron-bottom-8x.png"></div>
        <p>Scroll Down</p>
      </div>
    </div>
    <main>
      <section class="about" id="about">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <img src="assets/img/b.jpg" alt="profile" class="img-fluid">
            </div>
            <div class="col-lg-6 justify-content-center">
              <?php foreach ($product1 as $p1) : ?>
                <h3>Feels Comfort with<span> <?= $p1['name']; ?> </span></h3>
                <p><?= $p1['description']; ?></p>
              <?php endforeach; ?>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="php/frontend/detailproduct.php?usid=<?= $usid ?>id=<?= $p1['product_id']; ?>" class="btn btn-primary tombol page-scroll">Learn More</a>
              <?php } else { ?>
                <a href="php/frontend/detailproduct.php?id=<?= $p1['product_id']; ?>" class="btn btn-primary tombol page-scroll">Learn More</a>
              <?php } ?>
              
            </div>
          </div>
        </div>
      </section>
      
      <section class="about" id="about">
        <div class="container">
          <h3 class="titleAbout"><span>Explore Other Smartphone</span></h3>
          <div class="row justify-content-center over">
            
            <?php foreach ($product5 as $p5) : ?>
              <div class="col-lg-3 others">
                <img src="assets/img/<?= $p5['picture']; ?>" alt="">
                <h6><?= $p5['brand'];?> <?= $p5['name']; ?></h6>
                <p>Starting at <?= $p5['price']; ?></p>
                <?php if (isset($_SESSION['user'])) { ?>
                  <a href="php/frontend/detailproduct.php?usid=<?= $usid ?>&id=<?= $p5['product_id']; ?>">Learn More</a>
                <?php } else { ?>
                <a href="php/frontend/detailproduct.php?id=<?= $p5['product_id']; ?>">Learn More</a>
                <?php } ?>
              </div>
            <?php endforeach; ?>
            
            <?php foreach ($product6 as $p6) : ?>
              <div class="col-lg-3 others">
                <img src="assets/img/<?= $p6['picture']; ?>" alt="">
                <h6><?= $p6['brand'];?> <?= $p6['name']; ?></h6>
                <p>Starting at <?= $p6['price']; ?></p>
                <?php if (isset($_SESSION['user'])) { ?>
                  <a href="php/frontend/detailproduct.php?usid=<?= $usid ?>&id=<?= $p6['product_id']; ?>">Learn More</a>
                <?php } else { ?>
                <a href="php/frontend/detailproduct.php?id=<?= $p6['product_id']; ?>">Learn More</a>
                <?php } ?>
              </div>
            <?php endforeach; ?>
            
            <?php foreach ($product3 as $p3) : ?>
              <div class="col-lg-3 others">
                <img src="assets/img/<?= $p3['picture']; ?>" alt="">
                <h6><?= $p3['brand'];?> <?= $p3['name']; ?></h6>
                <p>Starting at <?= $p3['price']; ?></p>
                <?php if (isset($_SESSION['user'])) { ?>
                  <a href="php/frontend/detailproduct.php?usid=<?= $usid ?>&id=<?= $p3['product_id']; ?>">Learn More</a>
                <?php } else { ?>
                <a href="php/frontend/detailproduct.php?id=<?= $p3['product_id']; ?>">Learn More</a>
                <?php } ?>
              </div>
            <?php endforeach; ?>
            
            <?php foreach ($product4 as $p4) : ?>
              <div class="col-lg-3 others">
                <img src="assets/img/<?= $p4['picture']; ?>" alt="">
                <h6><?= $p4['brand'];?> <?= $p4['name']; ?></h6>
                <p>Starting at <?= $p4['price']; ?></p>
                
                <?php if (isset($_SESSION['user'])) { ?>
                  <a href="php/frontend/detailproduct.php?usid=<?= $usid ?>&id=<?= $p4['product_id']; ?>">Learn More</a>
                <?php } else { ?>
                <a href="php/frontend/detailproduct.php?id=<?= $p4['product_id']; ?>">Learn More</a>
                <?php } ?>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </section>
      
      <section class="about" id="about">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 justify-content-center">
              <?php foreach ($product2 as $p2) : ?>
                <h3>Enjoy Gaming With<span> <?= $p2['name']; ?> </span></h3>
                <p><?= $p2['description']; ?></p>
              <?php endforeach; ?>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="php/frontend/detailproduct.php?usid=<?= $usid ?>&id=<?= $p2['product_id']; ?>" class="btn btn-primary tombol page-scroll">Learn More</a>
              <?php } else { ?>
                <a href="php/frontend/detailproduct.php?id=<?= $p2['product_id']; ?>" class="btn btn-primary tombol page-scroll">Learn More</a>
              <?php } ?>
              
            </div>
            <div class="col-lg-6">
              <img src="assets/img/e.jpg" alt="profile" class="img-fluid">
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- akhir Jumbotron -->
    <!-- Container -->
      <!-- About -->
      
      <!-- akhir About -->
    <footer>
        <div class="container">
          <div class="row">
            

            <div class="col-lg-3 foot">
              <h5>Our Office</h5>
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3961.201723202271!2d107.5905919!3d-6.866414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x730028bf4627def4!2sUniversitas+Pasundan!5e0!3m2!1sid!2sid!4v1556103303326!5m2!1sid!2sid" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="col-lg-3 foot">
              <h5>ABOUT</h5>
              <p>Copyright © 2019 <a href="https://about.me/avipsyaifulloh" target="_blank">Avip Syaifulloh</a> Made with HTML, CSS, Javascript, JQuery, Bootstrap4, php and ajax.</p>
              
            </div>
            
            <div class="col-lg-3 foot block">
              <h5>WEB MENU</h5>
              <p>What are you looking for ?</p>
              <?php  if (isset($_SESSION['user'])) { ?>
                <a href="php/frontend/brand.php?usid=<?= $usid ?>">Brands</a>
              <?php } else { ?>
                <a href="php/frontend/brand.php">Brands</a>
              <?php }  ?>

              <?php  if (isset($_SESSION['user'])) { ?>
                <a href="php/frontend/producthome.php?usid=<?= $usid ?>">All Product</a>
              <?php } else { ?>
                <a href="php/frontend/producthome.php">All Product</a>
              <?php }  ?>

              <?php  if (isset($_SESSION['user'])) { ?>
                <a href="php/login/logout.php">Logout</a>   
              <?php } else { ?>
                <a href="php/login/login.php">Login</a>   
              <?php }  ?>  
            </div>
            <div class="col-lg-3 foot">
              <h5>FOLLOW US</h5>
              <p>Let us be social</p>
              <a href="https://www.instagram.com/avipsyaifulloh/"><span><i class="fab fa-instagram"></i></span></a>
              <a href="http://vipreviewtech.blogspot.com/"><span><i class="fab fa-blogger"></i></span></a>
              
            </div>
          </div>
        </div>
      </footer>
    <!-- Akhir Footer -->
    <div class="con">
      
    </div>  

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js" ></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/myfunction.js"></script>

  </body>
</html>
