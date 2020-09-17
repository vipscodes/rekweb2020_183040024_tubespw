<?php  

session_start();

if( !isset($_SESSION["admin"]) ){
  header("Location: ../../index.php");
  exit;
}


require "../../functions.php";
$id = $_GET['id'];

if (hapus($id) > 0) {
	echo "<script>
			alert('Data Berhasil dihapus!');
			document.location.href = '../product.php';
		</script>";
} else {
	echo "<script>
			alert('Data Gagal dihapus!');
			document.location.href = 'product.php';
		</script>";
}
?>