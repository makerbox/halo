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

	$(document).on('click touchend', '.menu-item', function(e){
		let navbar = $(document).find('[data-navbar]');
		navbar.removeClass('is-open');
	})
})