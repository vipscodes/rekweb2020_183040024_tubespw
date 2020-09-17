
$(document).ready(function() {
	//hilangkan tombol cari
	$('#urut').hide();
	$('#keyword').on('keyup', function() {
		$('#container').load('ajax/ajaxUser.php?keyword=' + $('#keyword').val());
	});

	$('#based').on('click', function() {
		$('#container').load('ajax/sortUser.php?based=' + $('#based').val() + '&metode=' + $('#metode').val());
	});
	$('#metode').on('click', function() {
		$('#container').load('ajax/sortUser.php?based=' + $('#based').val() + '&metode=' + $('#metode').val());
	});
});