$(document).ready(function() {
	$.backstretch("resources/images/login-bg-5.png");

	$('.login-form input[type="text"], .login-form input[type="password"]').on('focus', function() {
		$(this).removeClass('input-error');
	});

	/*$('.login-form').on('submit', function(e) {
		e.preventDefault();
		var empty = 0;
		$(this).find('input[type="text"], input[type="password"]').each(function(){
			if( $(this).val() == "" ) {
				$(this).addClass('input-error');
				empty++;
			} else {
				$(this).removeClass('input-error');
			}
		});
		if(empty == 0){
			window.location.href = 'Inicio'
		}
	});*/

});
