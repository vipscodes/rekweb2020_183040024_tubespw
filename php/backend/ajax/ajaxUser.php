<?php  
  require '../../functions.php';

  $keyword = $_GET["keyword"];
  
  $query = "SELECT * FROM user WHERE
      (username LIKE '%$keyword%' OR
      fullname LIKE '%$keyword%' OR
      email LIKE '%$keyword%' OR 
      phone LIKE '%$keyword%') AND 
      administator = '0' ";
  $user = query($query);



?>              




              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
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
                    <td><?= $us['phone']; ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>