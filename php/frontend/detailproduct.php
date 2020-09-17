

  <?php
      session_start();  
      if (!isset($_GET['id'])) {
          header("location: producthome.php");
          exit;
        }  
      require '../functions.php';

      $id = $_GET['id'];
      
      $prd = query("SELECT * FROM product WHERE product_id = $id")[0];
      
      if (isset($_SESSION['user'])) {
        $usid = $_GET['usid'];
        $queryComment = ("SELECT * FROM comment NATURAL JOIN user WHERE product_id = $id && NOT message='' ");
        $comment = query($queryComment);
      } else {
        $usid = '';
      }
      
      if (isset($_POST["tambahComment"])) {
        if ((tambahComment($_POST) > 0) && ( !empty($_POST["message"]) ) ) {
          echo "<script>
            alert('comments have been added!');
            document.location.href = 'detailproduct.php?id=$id&usid=$usid';
          </script>"; 
        } else {
          echo "<script>
              alert('add comment failed');
              document.location.href = 'detailproduct.php?id=$id&usid=$usid';
            </script>";
        }
      }

      if (isset($_POST["tambahRate"])) {
        if (tambahRate($_POST) > 0) {
          echo "<script>
            alert('the rating has been added');
            document.location.href = 'detailproduct.php?id=$id&usid=$usid';
          </script>"; 
        } else {
          echo "<script>
              alert('add Rating failed');
              document.location.href = 'detailproduct.php?id=$id&usid=$usid';
            </script>";
        }
      }

      $rating = query("SELECT AVG(rating_val) FROM rating WHERE product_id = $id ");

      $rat = round($rating[0]['AVG(rating_val)'], 2);

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
    <link rel="stylesheet" href="../../css/detail.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/producthome.css">
    <title>Profil</title>
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
              <a class="nav-item nav-link page-scroll" href="brand.php?usid=<?= $usid; ?>">Brands</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll" href="brand.php">Brands</a>
            <?php } ?>

            <?php if (isset($_SESSION['user'])) { ?>
              <a class="nav-item nav-link page-scroll active" href="producthome.php?usid=<?= $usid; ?>">All Product</a>
            <?php } else { ?>
              <a class="nav-item nav-link page-scroll active" href="producthome.php">All Product</a>
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
    
    <main>
      <section class="about" id="about">
        <div class="container">
          <div class="row justify-content-center mains">
            
            <div class="col-lg-2">
              <div class="navi">
                <div class="textNavi">
                  <h6><?= $prd['name']; ?></h6>
                </div>
                <div class="round1"></div>
                <div class="textNavi2">
                  <h6><?= $prd['brand']; ?></h6>
                </div>                  
                <div class="linebar"></div>
                <div class="textNavi">
                  <h6>All Product</h6>
                </div>  
                <div class="round2"></div>
              </div>
            </div>
            <div class="col-lg-4">
              <img src="../../assets/img/<?= $prd['picture']; ?>" alt="">
            </div>
            <div class="col-lg-6 spek">
              <h3><span><?= $prd['brand']; ?> <?= $prd['name']; ?> </span></h3>
              <p><?= $prd['description']; ?></p>
              <table class="table">
                <tbody>
                  <tr>
                    <td>CPU</td>
                    <td>:</td>
                    <td><?= $prd['cpu']; ?></td>
                  </tr>
                  <tr>
                    <td>GPU</td>
                    <td>:</td>
                    <td><?= $prd['gpu']; ?></td>
                   </tr>
                  <tr>
                    <td>RAM</td>
                    <td>:</td>
                    <td><?= $prd['ram']; ?></td>
                  </tr>
                  <tr>
                    <td>Storage</td>
                    <td>:</td>
                    <td><?= $prd['storage']; ?></td>
                  </tr>
                  <tr>
                    <td>Rating</td>
                    <td>:</td>
                    <td class="rat"><span><?= $rat; ?> </span>/ 5</td>
                  </tr>
                </tbody>
              </table>
              <div class="priRate">
                <div class="price">
                  <p>Starting at $<?= $prd['price']; ?></p>
                </div>
                <div></div>
              </div>
            </div>
          </div>

          <div class="row justify-content-center but">
            <?php  if (isset($_SESSION['user'])) { ?>
              <a href="producthome.php?usid=<?= $usid ?>" class="btn btn-primary tombol page-scroll">Other Smartphone</a>
              <a href="brand.php?usid=<?= $usid ?>" class="btn btn-primary tombol page-scroll">Other Brand</a>
            <?php } else {?>
              <a href="producthome.php" class="btn btn-primary tombol page-scroll">Other Smartphone</a>
              <a href="brand.php" class="btn btn-primary tombol page-scroll">Other Brand</a>
            <?php } ?>
          </div>
          
          <?php  if (isset($_SESSION['user'])) { ?>
            <div class="row comment">
              <div class="col-lg-6">
                <h5>Comment</h5>
                <div class="comList">
                   
                  <?php foreach ($comment as $cmn) : ?>
                    <h6><?= $cmn['fullname']; ?></h6>
                    <p><?= $cmn['message']; ?></p>  
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="col-lg-6 comBox">

                <form action="" method="post" class="rating">
                    <input type="hidden" name="user_id" value="<?= $usid; ?>">
                    <input type="hidden" name="product_id" value="<?= $prd['product_id']; ?>">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5"></label>
                 
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" ></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" ></label>
                    
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" ></label>
                    
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" ></label>
                    <div class="sub">
                      <button type="submit" name="tambahRate">Add Rating</button>
                    </div>
                  
                </form>

                <form action="" method="post">
                  <input type="hidden" name="user_id" value="<?= $usid; ?>">
                  <input type="hidden" name="product_id" value="<?= $prd['product_id']; ?>">
                  <div class="masCom">
                    <textarea name="message" id="message" class="input" placeholder=" Insert Comment here..."></textarea>
                  </div>
                  
                  <div class="adc">
                    <button type="submit" name="tambahComment" class="tombol">Add Comment</button>  
                  </div>
                  
                </form> 
                 
              </div>
              
            </div>
          <?php } ?>
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
              <p>Copyright © 2019 <a href="https://about.me/avipsyaifulloh" target="_blank">Avip Syaifulloh</a> Made with HTML, CSS, Javascript, JQuery, Bootstrap4, php and ajax.</p>
              
            </div>
            
            <div class="col-lg-3 foot block">
              <h5>WEB MENU</h5>
              <p>What are you looking for ?</p>

              <?php  if (isset($_SESSION['user'])) { ?>
                <a href="brand.php?usid=<?= $usid ?>">Brands</a>
              <?php } else { ?>
                <a href="brand.php">Brands</a>
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

