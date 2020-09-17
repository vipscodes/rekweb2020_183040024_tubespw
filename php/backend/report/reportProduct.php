<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../../functions.php';

$product = query("SELECT * FROM product");
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
date_default_timezone_set('Asia/Jakarta');
$t=time();
$tanggal = date("d-m-Y H:i:s",$t);
$barcode = date("dmY");
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Table</title>
	<style>

		table {
			z-index: 5;
			background-color: transparent;
			color: black;
		}
		img {
			width: 100px;
		}
		.img {
			background-image: url(../../../assets/img/logo/logo1.png);
			background-position: center;
			background-repeat: no-repeat;
			height: 100px;
			text-align: center;
		}

	</style>
	
</head>
<body>
	<div class="img">
		
	</div>

	<h1>Product List</h1>
	
	<table border="1" cellpadding="10" cellspacing="0">
        <tr>
        	<th>#</th>
		    <th>PICTURE</th>
		    <th>NAME</th>
		    <th>CPU</th>
		    <th>GPU</th>
		    <th>RAM</th>
		    <th>STORAGE</th>
		    <th>PRICE</th>
		</tr>';
	$i = 1;	
    foreach ($product as $prd) {
    	$html .= '
				 

    			<tr>
    			<td>'. $i++ .'</td>
				<td><img src="../../../assets/img/'.$prd["picture"].'" alt=""></td>
				<td>'. $prd["brand"].' '.$prd["name"] .'</td>
				<td>'. $prd["cpu"] .'</td>
				<td>'. $prd["gpu"] .'</td>
				<td>'. $prd["ram"] .'</td>
				<td>'. $prd["storage"] .'</td>
				<td> $ '. $prd["price"] .'</td>
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
