// JS - components > navbar
$(document).ready(function(){
	$(document).on('click touchend', '[data-menu-toggle]', function(e){
		e.preventDefault();
		e.stopPropagation();

		let navbar = $(document).find('[data-navbar]');
		if(navbar.hasClass('is-open')){
			navbar.removeClass('is-open');
		}else{
			navbar.addClass('is-open');
		}
	})
})