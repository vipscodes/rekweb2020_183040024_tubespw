$(document).ready(function(){
    //event pada saat link di klik
    $(".page-scroll").on('click', function(event) {
      
      
        // ambil isi href
        var tujuan = $(this).attr('href');
        // tangkap elemen ybs
        var elemenTujuan = $(tujuan);
        
  
        // pindahkan scroll
        $('html, body').animate({
            scrollTop: $(elemenTujuan).offset().top - 60
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });
  });

$(window).scroll(function() {
	var wScroll = $(this).scrollTop();
	// navbar
	if( wScroll > 150) {
        $('.navbar').addClass('muncul1');
    } else {
        $('.navbar').removeClass('muncul1');   
    }
 
});