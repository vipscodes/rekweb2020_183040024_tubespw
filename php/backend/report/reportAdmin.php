<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../../functions.php';
$user = query("SELECT * FROM user WHERE administator = '1'");

$mpdf = new \Mpdf\Mpdf();
date_default_timezone_set('Asia/Jakarta');
$t=time();
$tanggal = date("d-m-Y H:i:s",$t);
$barcode = date("dmY");
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Table</title>
	<link rel="stylesheet" href="../../../css/report/userReport.css">
	<style>
		table {
			z-index: 5;
			background-color: transparent;
			color: black;
			text-align: center;
		}
		td {
			text-align: center;
		}
		img {
			width: 300px;
		}

		.img {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="img">
		<img src="../../../assets/img/logo/logo1.png" alt="">
	</div>

	<h1>User List</h1>
	
	<table border="1" cellpadding="10" cellspacing="0">
               
        <tr>
            <th>No.</th>
            <th>username</th>
			<th>Fullname</th>
			<th>Email</th>
			<th>Phone</th>
        </tr>';
	
	$i = 1;
    foreach ($user as $us) {
    	$html .= '<tr>
				<td>'. $i++ .'</td>
				<td>'. $us["username"] .'</td>
				<td>'. $us["fullname"] .'</td>
				<td>'. $us["email"] .'</td>
				<td>'. $us["phone"] .'</td>
    			</tr>';
    }

$html .='</table>
<br>
Reported at '. $tanggal .'
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('user-list.pdf', 'I');

?>
