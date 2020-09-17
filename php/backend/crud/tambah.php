<?php  

  session_start();

  if( !isset($_SESSION["admin"]) ){
    header("Location: ../../index.php");
    exit;
  }


  require "../../functions.php";

  if (isset($_POST["tambah"])) {
    if (tambah($_POST,$_FILES) > 0) {
      echo "<script>
          alert('Data Berhasil ditambahkan!');
          document.location.href = '../product.php';
        </script>";
    } else {
      echo "<script>
          alert('Data Gagal ditambahkan!');
          document.location.href = '../product.php';
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
    <link rel="shortcut icon" href="" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/backend.css">
    <link rel="stylesheet" href="../../../css/product.css">
    <link rel="stylesheet" href="../../../css/add.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <nav class="col-3 sidebar">
            <div class="profile">
              <div class="picture">
                <img src="../../../assets/img/Profile.jpg" alt="">
              </div>
              <div class="about">
                <h6>Avip Syaifulloh</h6>
                <hr>
              </div>
            </div>
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="../dashboard.php">
                    <span><i class="fa fa-tachometer-alt"></i></span>
                    <span class="nav-name">Dashboard</span> <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../product.php">
                    <span><i class="fa fa-mobile-alt"></i></span>
                    <span class="nav-name">Products</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../user.php">
                    <span><i class="fa fa-users"></i></span>
                    <span class="nav-name">User</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../comment.php">
                    <span><i class="fa fa-comment-alt"></i></span>
                    <span class="nav-name">Comment</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../rating.php">
                    <span><i class="fa fa-star"></i></span>
                    <span class="nav-name">Rating</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="tambah.php">
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
                  <a class="nav-link" href="../admin.php">
                    <span><i class="fa fa-user-cog"></i></span>
                    <span class="nav-name">Admin List</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../login/registrasiAdmin.php">
                    <span><i class="fa fa-user-plus"></i></span>
                    <span class="nav-name">Add Admin</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../login/logout.php">
                    <span><i class="fa fa-sign-out-alt"></i></span>
                    <span class="nav-name">Sign Out</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          
          <main class="main col">
            <!-- As a heading -->
            <nav class="navbar navbar-light mt-2">
              <span class="navbar-brand mb-0 h1">Add Product</span>
              
            </nav>
            
            <div class="sort"></div>
            

              
            <form action="" method="post" enctype="multipart/form-data">
              <div class="card mb-3">
                <div class="row no-gutters">
                  
                  <div class="col-lg-3 pt-2 ">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="input" placeholder=" Insert Name">
                    
                    <label for="brand">brand</label>
                    <input type="text" name="brand" id="brand" class="input" placeholder=" Insert Brand">
                    
                    <label for="picture">picture</label>
                    <input type="file" name="picture" id="picture" class="input choose">
                    
                    <div class="clearfix"></div> 
                  </div>
                  
                  <div class="col-lg-5">
                    <div class="card-body spec">
                     
                      <p class="card-text">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Specification</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>CPU</td>
                              <td>:</td>
                              <td><input type="text" name="cpu" id="cpu" class="input" placeholder=" Insert CPU Name"></td>
                            </tr>
                            <tr>
                              <td>GPU</td>
                              <td>:</td>
                              <td><input type="text" name="gpu" id="gpu" class="input" placeholder=" Insert GPU Name"></td>
                            </tr>
                            <tr>
                              <td>RAM</td>
                              <td>:</td>
                              <td><input type="text" name="ram" id="ram" class="input" placeholder=" Insert RAM Capacity"></td>
                            </tr>
                            <tr>
                              <td>Storage</td>
                              <td>:</td>
                              <td><input type="text" name="storage" id="storage" class="input" placeholder=" Insert Storage Capacity"></td>
                            </tr>
                            <tr>
                              <td>Price</td>
                              <td>:</td>
                              <td><input type="text" name="price" id="price" class="input" placeholder=" Insert Price"></td>
                            </tr>
                          </tbody>
                        </table>
                      </p>
                    </div>
                  </div>
                  
                  <div class="col-lg-4">
                    <div class="card-body desc">
                      <h5 class="card-title ">Description</h5>
                      <textarea name="description" id="description" cols="30" rows="9" class="input" placeholder=" Insert description here..."></textarea>
                    </div>
                  </div>

                  <div class="but-Crud">
                      <button class="update crud"  type="submit" name="tambah">ADD</button>
                      <button class="delete crud"><a href="../product.php">CANCEL</a></button>
                    </div>
                </div>
              </div>

            </form>
              
              
              
                
            
            
            



          </main>
         
      </div>


      
    <!-- Optional JavaScript -->
    <script src="../../../js/jquery-3.3.1.min.js" ></script>
    <script src="../../../js/jquery.easing.1.3.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/myfunction.js"></script>
  </body>
</html>

