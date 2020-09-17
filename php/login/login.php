<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Admin</title>
	<link rel="shortcut icon" href="../../assets/img/logo/logo5.png" type="image/x-icon"/>
	<link rel="stylesheet" href="../../css/logins.css">
</head>
<body>
	<?php 

		session_start();

		require '../functions.php';


		if ( isset($_COOKIE['id']) && isset($_COOKIE['adm']) ) {
			$id = $_COOKIE['id'];
			$adm = $_COOKIE['adm'];

			// ambil username berdasarkan id
			$cek_user = mysqli_query(koneksi(), "SELECT username FROM user WHERE user_id = $id");
			$row = mysqli_fetch_assoc($cek_user);

			//  cek cookie dan username
			if ( $adm === hash('sha256', $row['username']) ) {
				$_SESSION['admin'] = true;
			}
		}
		
		if( isset($_SESSION["admin"]) ){
			header("Location: ../backend/dashboard.php");
			exit;
		}

		if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
			$id = $_COOKIE['id'];
			$key = $_COOKIE['key'];

			// ambil username berdasarkan id
			$cek_user = mysqli_query(koneksi(), "SELECT username FROM user WHERE user_id = $id");
			$row = mysqli_fetch_assoc($cek_user);

			//  cek cookie dan username
			if ( $key === hash('sha256', $row['username']) ) {
				$_SESSION['user'] = true;
			}
		}

		if( isset($_SESSION['user']) ){
			header("Location: ../frontend/producthome.php");
		}

		
		
		// cek tombol login sudah ditekan
			if (isset($_POST["submit"]) ) {
				$username = $_POST["user"];
				$password = $_POST["password"];

				$cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' ");
		// cek user & pass
				if ( mysqli_num_rows($cek_user) === 1 ) {
					$row = mysqli_fetch_assoc($cek_user);

					if (password_verify($password, $row["password"]) ){
						$usid = $row["user_id"];
						$adm = $row["administator"];
						if ($adm == 1) {
							$_SESSION['admin'] = true;
							// cek remember me
							if ( isset($_POST['remember']) ) {
								// buat cookie

								setcookie('id', $usid, time() + 60*60);
								setcookie('adm', hash('sha256', $row['username']), time() + 60*60);
							}
							header("Location: ../backend/dashboard.php");
							exit;
							
						} else {
							$_SESSION['user'] = true;

							// cek remember me
							if ( isset($_POST['remember']) ) {
								// buat cookie
								setcookie('id', $usid, time() + 60*60);
								setcookie('key', hash('sha256', $row['username']), time() + 60*60);
							}
							header("Location: ../frontend/producthome.php?usid=$usid");
							exit;
						}
						
					} else {
						$error = true;
					}

					
				} else {
					$error = true;
				}
		//jika benar

			}


	?>
	
	<div class="container">
		<div class="logo"><img src="../../assets/img/c.png" alt=""></div>
		<div class="hov">
			<div class="text">LOGIN</div>
			<?php if (isset($error)): ?>
				<p class="ket">Username or password not register</p>
			<?php endif; ?>
			<div class="form">
				<form action="" method="post">
					
					<label for="user">Username</label><br>
					<input type="text" name="user" class="in" id="user" autocomplete="off">

					<label for="password" >Password</label>
					<input type="password" name="password" class="in" id="password" autocomplete="off"><br>
					
					<input type="checkbox" name="remember" value="remember" ><label for="remember">Remember Me</label>

					<button type="submit" name="submit" class="submit">LOGIN</button>
					
					<div class="link">
						<a href="registrasi.php">Create New Account</a>
					</div>
					
				</form>

			</div>

		</div>
		
	</div>
</body>
</html>