<?php  
  require '../../functions.php';

  $based = $_GET['based'];
  $metode = $_GET['metode'];
  $query = "SELECT * FROM product ORDER BY $based $metode";
  $product = query($query);



?>


<?php if(empty($product)) :?>
              <h1 align="center">Data Tidak Ditemukan</h1>
            <?php endif; ?>
            <?php foreach ($product as $prd) : ?>
              <div class="col-lg-3 others">
                <img src="../../assets/img/<?= $prd['picture']; ?>" alt="">
                <h6><?= $prd['brand']; ?> <?= $prd['name']; ?></h6>
                <p>Starting at <?= $prd['price']; ?></p>
                <a href="detailproduct.php?id=<?= $prd['product_id']; ?>">Learn More</a>
              </div>
            <?php endforeach; ?>