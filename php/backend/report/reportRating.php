<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../../functions.php';
$comm = query("SELECT * FROM rating NATURAL JOIN user NATURAL JOIN product");


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
	<title>Rating Table</title>
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

	<h1>Rating List</h1>
	
	<table border="1" cellpadding="10" cellspacing="0">
               
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Product</th>
            <th>Rating</th>
			
        </tr>';
	
	$i = 1;
    foreach ($comm as $com) {
    	$html .= '<tr>
				<td>'. $i++ .'</td>
				<td>'. $com["username"] .'</td>
				<td>'. $com["brand"] .' '. $com["name"] .'</td>
				<td>'. $com["rating_val"] .' / 5</td>
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
