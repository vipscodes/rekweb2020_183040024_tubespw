<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../../functions.php';
$id = $_GET['product_id'];
$product = query("SELECT * FROM product WHERE product_id=$id");
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
	<title>Product Detail</title>
	<link rel="stylesheet" href="../../../css/report/productReport.css">
	<style>
		body {
			background-color: black;
			color: white;
		}
		.head {
			font-size: 20px;
		}
		.title {
			font-size: 30px;
		}
		table {
			z-index: 5;
			background-color: transparent;
			color: white;
			text-align: justify;
		}
		img {
			width: 300px;
		}
		.img {
			background-image: url(../../../assets/img/logo/logo2.png);
			background-position: center;
			background-repeat: no-repeat;
			height: 100px;
			text-align: center;
		}
		.des {
			line-height: 200%;
		}
	</style>
</head>
<body>
	<div class="img">
		
	</div>

	<br><br><br>
	<table border="0" cellpadding="10" cellspacing="0">';

    foreach ($product as $prd) {
    	$html .= '
				 <tr>
					<th colspan="5" class="title">'. $prd["brand"].' '.$prd["name"] .'</th>
				 </tr>

    			<tr>

					<td rowspan="6"><img src="../../../assets/img/'.$prd["picture"].'" alt=""></td>
					<th colspan="3" class="head">Specification</th>
					
    			</tr>
				<tr>
					<td>CPU</td>
					<td>:</td>
					<td>'. $prd["cpu"] .'</td>
					
				</tr>
				<tr>
					<td>GPU</td>
					<td>:</td>
					<td>'. $prd["gpu"] .'</td>
				</tr>
				<tr>
					<td>RAM</td>
					<td>:</td>
					<td>'. $prd["ram"] .'</td>
				</tr>
				<tr>
					<td>Storage</td>
					<td>:</td>
					<td>'. $prd["storage"] .'</td>
				</tr>
				<tr>
					<td>Price</td>
					<td>:</td>
					<td>$ '. $prd["price"] .'</td>
				</tr>
				<tr>
					<th colspan="5" class="head">Description</th>
				</tr>
				<tr>
					<td colspan="5" class="des">'. $prd["description"] .'</td>
				</tr>
    			';
    }

$html .='</table>
<br><br><br><br>
Reported at '. $tanggal .'
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('user-list.pdf', 'I');

?>
