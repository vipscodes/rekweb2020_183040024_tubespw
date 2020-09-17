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
              <?php if(empty($product)) :?>
                <h1 align="center">Data Not Found</h1>
              <?php endif; ?>
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
                        <button class="report crud"><a href="report/reportDetail.php?product_id=<?= $prd['product_id']; ?>">REPORT</a></button>
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