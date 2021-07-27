$(document).ready(function(){
	$(document).on('click touchend', '[data-next-button]', function(e){
		e.preventDefault();
		e.stopPropagation();

		let pageHeight = window.innerHeight;
		

		$('html, body').animate({
			scrollTop: pageHeight
		}, 800);

	})
})