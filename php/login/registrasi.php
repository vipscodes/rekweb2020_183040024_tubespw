<?php  
require '../functions.php';

if (isset($_POST["register"]) ) {
	
	if ( registrasi($_POST) > 0) {
		echo "<script>
 				alert('Registration successful, now you are member of VIPREVIEW.');
 				document.location.href = 'login.php';
			</script>";
	} else {
		echo "<script>
 				alert('Your registration failed, please try again');
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
    <link rel="shortcut icon" href="../../assets/img/logo/logo5.png" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/backend.css">
    <link rel="stylesheet" href="../../css/regis.css">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>User Register</title>
  </head>
  <body class="body">
      <div class="container-fluid">
        <div class="row a">
          <main class="main col-12">
            <nav class="navbar navbar-light">
              <span class="navbar-brand mb-0 h1">Register User</span>
            </nav>
            
            <div class="row usr">
              <div class="col-md-6 information">
                <h1>Information</h1>
                <p>As user you can add comments and give rating for all product at VIPREVIEW.</p>
                <p>If you have registered before, Login here:</p>
                <a href="login.php"><button>LOGIN</button></a>
              </div>
                <div class="col-md-6 justify-content-center us" id="container">
                  <div class="form">
                    <form action="" method="post">
                      <label for="fullname">Fullname : </label>
                      <input type="text" name="fullname" id="fullname" placeholder=" Insert Fullname" autocomplete="off">
                              
                      <label for="email">email : </label>
                      <input type="email" name="email" id="email" placeholder=" example@mail.com" autocomplete="off">

                      <label for="phone">phone : </label>
                      <input type="phone" name="phone" id="phone" placeholder=" +62392xxx" autocomplete="off">
                      
                      <label for="username">username : </label>
                      <input type="text" name="username" id="username" placeholder=" Insert Username" required autocomplete="off">

                      <label for="password">password : </label>
                      <input type="password" name="password" id="password" placeholder="Insert Password" required minlength="8" autocomplete="off">
                      
                      <label for="password2">Password Confirm : </label>
                      <input type="password" name="password2" id="password2" placeholder="Confirm Password" required autocomplete="off">

                      <input type="hidden" name="administator" id="admin" value="0">

                      <button type="submit" name="register">REGISTER</button>
                    </form>
                </div>
              </div>
              

            </div>
            
          </main>
         </div>
      </div>


      
    <!-- Optional JavaScript -->
    <script src="../../js/jquery-3.4.0.min.js" ></script>
    <script src="../../js/jquery.easing.1.3.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
	

