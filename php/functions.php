<?php
function koneksi()
{
	// $conn = mysqli_connect("localhost", "root", "") or die("koneksi ke DB gagal");
	// mysqli_select_db($conn, "tubes_183040024") or die("Database salah!");

	$conn = mysqli_connect("localhost", "root", "") or die("koneksi ke DB gagal");
	mysqli_select_db($conn, "pw_tubes_183040024") or die("Database salah!");

	return $conn;
}

function query($sql)
{
	$conn = koneksi();
	$result = mysqli_query($conn, "$sql");

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function tambah($data, $file)
{
	$conn = koneksi();

	$picture = upload($file);
	if (!$picture) {
		return false;
	}

	$name = htmlspecialchars($data['name']);
	$brand = htmlspecialchars($data['brand']);
	$storage = htmlspecialchars($data['storage']);
	$price = htmlspecialchars($data['price']);
	$cpu = htmlspecialchars($data['cpu']);
	$gpu = htmlspecialchars($data['gpu']);
	$ram = htmlspecialchars($data['ram']);
	$description = htmlspecialchars($data['description']);


	$querytambah = "INSERT INTO product
					VALUES ('', '$name', '$brand', '$storage', $price, '$cpu', '$gpu', '$ram', '$picture' ,'$description')";
	mysqli_query($conn, $querytambah);

	return mysqli_affected_rows($conn);
}

function tambahComment($data)
{
	$conn = koneksi();

	$user_id = htmlspecialchars($data['user_id']);
	$product_id  = htmlspecialchars($data['product_id']);
	$message = htmlspecialchars($data['message']);

	$query = "INSERT INTO comment VALUES ('', '$user_id', '$product_id', '$message')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambahRate($data)
{
	$conn = koneksi();

	$user_id = htmlspecialchars($data['user_id']);
	$product_id  = htmlspecialchars($data['product_id']);
	$rating = htmlspecialchars($data['rating']);

	$query = "INSERT INTO rating VALUES ('', '$user_id', '$product_id', '$rating')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function upload($file)
{

	$namaFile = $file['picture']['name'];
	$ukuran = $file['picture']['size'];
	$error = $file['picture']['error'];
	if ($error === 4) {
		echo "
        <script>
            alert('Masukkan foto!')
        </script>";
		return false;
	}
	// cek upload hanya gambar
	$ekstensi = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	$tmpName = $file['picture']['tmp_name'];
	if (!in_array($ekstensiGambar, $ekstensi)) {
		echo "
        <script>
            alert('Masukkan file gambar!')
        </script>";
		return false;
	}

	// ukuran terlalu besar
	if ($ukuran > 2000000) {
		echo "
        <script>
            alert('ukuran gambar terlalu besar!')
        </script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../../../assets/img/' . $namaFileBaru);
	return $namaFileBaru;
}



function hapus($id)
{
	$conn = koneksi();
	mysqli_query($conn, "DELETE FROM product WHERE product_id = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data, $file)
{
	$conn = koneksi();

	$product_id = $data['product_id'];
	$name = htmlspecialchars($data['name']);
	$brand = htmlspecialchars($data['brand']);
	$storage = htmlspecialchars($data['storage']);
	$price = htmlspecialchars($data['price']);
	$cpu = htmlspecialchars($data['cpu']);
	$gpu = htmlspecialchars($data['gpu']);
	$ram = htmlspecialchars($data['ram']);
	$gambarLama = htmlspecialchars($data['gambarLama']);


	// cek apakah user pilih gambar baru
	if ($_FILES['picture']['error'] === 4) {
		$picture = $gambarLama;
	} else {
		$picture = upload($file);
	}

	$description = htmlspecialchars($data['description']);

	$queryubah = "UPDATE product
					SET
					name = '$name',
					brand = '$brand',
					storage = '$storage',
					price = $price,
					cpu = '$cpu',
					gpu = '$gpu',
					ram = '$ram',
					picture = '$picture',
					description = '$description'
				WHERE product_id = '$product_id' ";
	mysqli_query($conn, $queryubah);

	return mysqli_affected_rows($conn);
}

function registrasi($data)
{
	$conn = koneksi();
	$fullname = htmlspecialchars($data['fullname']);
	$email = htmlspecialchars($data['email']);
	$phone = htmlspecialchars($data['phone']);
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$administator =  htmlspecialchars($data['administator']);
	// cek username suah ada atau belum

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
 				alert('username has been used');
			</script>";
		return false;
	}


	if ($password !== $password2) {
		echo "<script>
 				alert('confirm password does not match');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// tambah user baru
	$query_tambah = "INSERT INTO user VALUES('', '$username', '$password','$email','$fullname','$phone','$administator')";
	mysqli_query($conn, $query_tambah);

	return mysqli_affected_rows($conn);
}



function urutUser($based, $metode)
{
	$conn = koneksi();

	$query = "SELECT * FROM user ORDER BY $based $metode";

	return query($query);
}

function urutAdmin($based, $metode)
{
	$conn = koneksi();

	$query = "SELECT * FROM admin ORDER BY $based $metode";

	return query($query);
}

function urutProduct($based, $metode)
{
	$conn = koneksi();

	$query = "SELECT * FROM product ORDER BY $based $metode";

	return query($query);
}
