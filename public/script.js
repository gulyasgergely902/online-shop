$( document ).on('readystatechange', function(){
	if(document.readyState == "loading" || document.readyState == "interactive"){
		$('.spinner-border').show(0);
		$('.container-fluid').hide(0);
	}
});

$( document ).ready(function(){
	$('.container-fluid').fadeIn(500);
	setTimeout(function(){
		$('.spinner-border').fadeOut(500);
	}, 500);
});
