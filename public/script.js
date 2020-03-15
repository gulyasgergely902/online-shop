$( document ).on('readystatechange', function(){
	if(document.readyState == "loading" || document.readyState == "interactive"){
		$('.spinner').show(0);
		$('.container-fluid').hide(0);
	}
});

$( document ).ready(function(){
	$('.container-fluid').fadeIn(500);
	setTimeout(function(){
		$('.spinner').fadeOut(500);
	}, 500);
});
