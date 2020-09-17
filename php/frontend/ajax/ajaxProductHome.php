<?php  
  require '../../functions.php';

  $keyword = $_GET["keyword"];
  
  $query = "SELECT * FROM product WHERE
      name LIKE '%$keyword%' OR
      brand LIKE '%$keyword%' OR
      storage LIKE '%$keyword%' OR 
      price LIKE '%$keyword%' OR 
      cpu LIKE '%$keyword%' OR 
      gpu LIKE '%$keyword%' OR 
      ram LIKE '%$keyword%' OR
      description LIKE '%$keyword%' ";
  $product = query($query);


?>
<div class="row justify-content-center" id="container">
  <?php if(empty($product)) :?>
    <h3 align="center">Data Not Found</h3>
  <?php endif; ?>
  <?php foreach ($product as $prd) : ?>
    <div class="col-lg others">
      <img src="../../assets/img/<?= $prd['picture']; ?>" alt="">
      <h6><?= $prd['brand']; ?> <?= $prd['name']; ?></h6>
      <p>Starting at <?= $prd['price']; ?></p>
      <a href="detailproduct.php?id=<?= $prd['product_id']; ?>">Learn More</a>
    </div>
  <?php endforeach; ?>
</div>
              