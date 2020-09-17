<?php
  session_start();
   if (isset($_SESSION['user'])) {
    $usid = $_GET['usid'];
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../assets/img/logo/logo6.png" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/brand.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/productHome.css">
    <title>Brand</title>
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
              <a class="nav-item nav-link page-scroll" href="../../index.php?usid=<?= $usid; ?>">Home</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll" href="../../index.php">Home</a>
            <?php } ?>
            
            <?php if (isset($_SESSION['user'])) { ?>
              <a class="nav-item nav-link page-scroll active" href="brand.php?usid=<?= $usid; ?>">Brands</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll active" href="brand.php">Brands</a>
            <?php } ?>

            <?php if (isset($_SESSION['user'])) { ?>
              <a class="nav-item nav-link page-scroll" href="producthome.php?usid=<?= $usid; ?>">All Product</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll" href="producthome.php">All Product</a>
            <?php } ?>

            
            <a class="nav-item nav-link page-scroll" href="#portfolio"></a>
            <?php 
            if (isset($_SESSION['user'])) {
              echo '<button class="nav-btn"><a href="../login/logout.php" class=" page-scroll">LOGOUT</a></button>';
            } else
              echo '<button class="nav-btn"><a href="../login/login.php" class=" page-scroll">LOGIN</a></button>';
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
        <h4>Discover smartphone by brand, and choose your favorite</h4>
        <a href="#about" class="btn btn-primary tombol page-scroll">Discover Now</a>
        <div class="chevron1"><img src="../../assets/img/icon/chevron-bottom-4x.png"></div>
        <div class="chevron2"><img src="../../assets/img/icon/chevron-bottom-6x.png"></div>
        <div class="chevron3"><img src="../../assets/img/icon/chevron-bottom-8x.png"></div>
        <p>Scroll Down</p>
      </div>
    </div>
    <main>
      <section class="about" id="about">
        <div class="container">
          <h3 class="titleAbout"><span>All Brand</span></h3>
          
          <div class="row justify-content-center">
            
            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/app.png" alt="">
              <h6>Apple</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Apple">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Apple">Show All Product</a>
              <?php } ?>
            </div>

            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/asus.png" alt="">
              <h6>Asus</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Asus">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Asus">Show All Product</a>
              <?php } ?>
            </div>

            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/huawei.png" alt="">
              <h6>Huawei</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Huawei">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Huawei">Show All Product</a>
              <?php } ?>
            </div>

            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/oppo.png" alt="">
              <h6>Oppo</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Oppo">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Oppo">Show All Product</a>
              <?php } ?>
            </div>

            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/nokia.png" alt="">
              <h6>Nokia</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Nokia">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Nokia">Show All Product</a>
              <?php } ?>
            </div>

            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/samsung.png" alt="">
              <h6>Samsung</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Samsung">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Samsung">Show All Product</a>
              <?php } ?>
            </div>

            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/vivo.png" alt="">
              <h6>Vivo</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Vivo">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Vivo">Show All Product</a>
              <?php } ?>
            </div>

            <div class="col-lg-3 others">
              <img src="../../assets/img/logo/mi.png" alt="">
              <h6>Xiaomi</h6>
              <?php if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>&brand=Xiaomi">Show All Product</a>
              <?php } else { ?>
                <a href="producthome.php?brand=Xiaomi">Show All Product</a>
              <?php } ?>
            </div>
            
          </div>
        </div>
      </section>
      
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
              <p>Copyright © 2019 <a href="https://about.me/avipsyaifulloh" target="_blank">Avip Syaifulloh</a>Made with HTML, CSS, Javascript, JQuery, Bootstrap4, php and ajax.</p>
              
            </div>
            
            <div class="col-lg-3 foot block">
              <h5>WEB MENU</h5>
              <p>What are you looking for ?</p>
              <?php  if (isset($_SESSION['user'])) { ?>
                <a href="#home" class="page-scroll">Brands</a>
              <?php } else { ?>
                <a href="#home" class="page-scroll">Brands</a>
              <?php }  ?>

              <?php  if (isset($_SESSION['user'])) { ?>
                <a href="producthome.php?usid=<?= $usid ?>">All Product</a>
              <?php } else { ?>
                <a href="producthome.php">All Product</a>
              <?php }  ?>

              <?php  if (isset($_SESSION['user'])) { ?>
                <a href="../login/logout.php">Logout</a>   
              <?php } else { ?>
                <a href="../login/login.php">Login</a>   
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


    <!-- Optional JavaScript -->
    <script src="../../js/jquery-3.3.1.min.js" ></script>
    <script src="../../js/jquery.easing.1.3.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/front.js"></script>
    <script src="../../js/myfunction.js"></script>

  </body>
</html>

