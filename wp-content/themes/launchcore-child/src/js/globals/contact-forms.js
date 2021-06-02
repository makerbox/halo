$(document).ready(function(){
	$(document).on('wpcf7mailsent', function(event){ // when form data gets sent
		window.location = '../thank-you';
	});
})