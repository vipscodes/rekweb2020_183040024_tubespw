<?php
session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: ../../index.php");
  exit;
}

require '../functions.php';
if (isset($_GET['urut'])) {
  $product = urutProduct($_GET['based'], $_GET['metode']);
} else {
  $product = query("SELECT * FROM product");
}
$product = query("SELECT * FROM product");
if (isset($_GET['cari'])) {
  $keyword = $_GET['keyword'];
  $product = query("SELECT * FROM product WHERE
      name LIKE '%$keyword%' OR
      brand LIKE '%$keyword%' OR
      storage LIKE '%$keyword%' OR 
      price LIKE '%$keyword%' OR 
      cpu LIKE '%$keyword%' OR 
      gpu LIKE '%$keyword%' OR 
      ram LIKE '%$keyword%' OR
      description LIKE '%$keyword%' ");
} else {
  $product = query("SELECT * FROM product");
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="" type="image/x-icon" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/backend.css">
  <link rel="stylesheet" href="../../css/product.css">
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
              <a class="nav-link" href="dashboard.php">
                <span><i class="fa fa-tachometer-alt"></i></span>
                <span class="nav-name">Dashboard</span> <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="product.php">
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
              <a class="nav-link" href="report/reportProduct.php" target="_blank">
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
        <!-- As a heading -->
        <nav class="navbar navbar-light">
          <span class="navbar-brand mb-0 h1">Product</span>
          <div class="search">
            <form action="" method="get">
              <input type="text" name="keyword" id="keyword" placeholder="Search...">
              <button type="submit" name="cari" id="tombol-cari"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </nav>

        <div class="sort">
          <form action="" method="get">
            <select name="based" id="based">
              <option value="product_id">---Sort By---</option>
              <option value="brand">Brand</option>
              <option value="cpu">CPU</option>
              <option value="gpu">GPU</option>
              <option value="ram">RAM</option>
              <option value="price">Price</option>
              <option value="storage">Storage</option>
            </select>
            <select name="metode" id="metode">
              <option value="ASC">A->Z</option>
              <option value="DESC">Z->A</option>
            </select>
            <button type="submit" name="urut" id="urut">Urutkan</button>
          </form>
        </div>



        <?php if (empty($product)) : ?>
          <h1 align="center">Data Not Found</h1>
        <?php endif; ?>
        <div id="container">
          <?php foreach ($product as $prd) : ?>
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-3 pt-2 ">
                  <h5 class="card-title"><?= $prd['brand']; ?> <?= $prd['name']; ?></h5>
                  <div class="img-crud">
                    <img src="../../assets/img/<?= $prd['picture']; ?>" class="card-img" alt="...">
                  </div>
                  <div class="but-Crud">
                    <button class="update crud"><a href="crud/ubah.php?product_id=<?= $prd['product_id']; ?>">UPDATE</a></button>
                    <button class="delete crud"><a href="crud/hapus.php?id=<?= $prd['product_id']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini')">DELETE</a></button>
                    <button class="report crud"><a href="report/reportDetail.php?product_id=<?= $prd['product_id']; ?>" target="_blank">REPORT</a></button>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-5">
                  <div class="card-body">

                    <p class="card-text"></p>
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
                            <td>Price</td>
                            <td>:</td>
                            <td><?= $prd['price']; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card-body desc">
                    <h5 class="card-title ">Desc</h5>
                    <p class="card-text text-justify"><?= $prd['description']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>









      </main>

    </div>



    <!-- Optional JavaScript -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/jquery.easing.1.3.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/ajax/productBack.js"></script>
</body>

</html>