// //  ambil element yang dibutuhkan
// var keyword = document.getElementById('keyword');
// var tombolCari = document.getElementById('tombol-cari');
// var container = document.getElementById('container');

// //tambahkan event ketika keyword di tulis
// keyword.addEventListener('keyup', function() {


// 	//  buat objek ajax
// 	var ajax = new XMLHttpRequest();


// 	// cek kesiapan ajax
// 	ajax.onreadystatechange = function() {
// 		if ( ajax.readyState == 4 && ajax.status == 200 ) {
// 			container.innerHTML = ajax.responseText;
// 		}
// 	}

// 	// eksekusi
// 	ajax.open('GET', 'ajax/ajaxProductHome.php?keyword=' + keyword.value, true);
// 	ajax.send();



// });

$(document).ready(function() {
	//hilangkan tombol cari
	$('#urut').hide();
	$('#keyword').on('keyup', function() {
		$('#container').load('ajax/ajaxProductHome.php?keyword=' + $('#keyword').val());
	});

	$('#based').on('click', function() {
		$('#container').load('ajax/sortProduct.php?based=' + $('#based').val() + '&metode=' + $('#metode').val());
	});
	$('#metode').on('click', function() {
		$('#container').load('ajax/sortProduct.php?based=' + $('#based').val() + '&metode=' + $('#metode').val());
	});
});