<?php  
  require '../../functions.php';

  $based = $_GET['based'];
  $metode = $_GET['metode'];
  $query = "SELECT * FROM user WHERE administator = '1' ORDER BY $based $metode";
  $user = query($query);



?>
<table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($user)) :?>
                    <tr>
                      <td colspan="5"><h1 align="center">Data Not Found</h1></td>
                    </tr>
                    
                  <?php endif; ?>
                  <?php $i=1; ?>
                  <?php foreach ($user as $us) : ?>
                  <tr>
                    <td scope="row"><?= $i ?></td>
                    <td><?= $us['username']; ?></td>
                    <td><?= $us['fullname']; ?></td>
                    <td><?= $us['email']; ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>