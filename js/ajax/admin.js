$(document).ready(function() {
	//hilangkan tombol cari
	$('#urut').hide();
	$('#keyword').on('keyup', function() {
		$('#container').load('ajax/ajaxAdmin.php?keyword=' + $('#keyword').val());
	});

	$('#based').on('click', function() {
		$('#container').load('ajax/sortAdmin.php?based=' + $('#based').val() + '&metode=' + $('#metode').val());
	});
	$('#metode').on('click', function() {
		$('#container').load('ajax/sortAdmin.php?based=' + $('#based').val() + '&metode=' + $('#metode').val());
	});
});