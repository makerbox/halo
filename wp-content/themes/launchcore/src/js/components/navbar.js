// js > components > navbar

$(document).on('click touchend', '[data-hamburger]', function(e){
	e.preventDefault();
	e.stopPropagation();
	var menu = $(document).find('[data-menu]');
	var navbar = $(document).find('[data-navbar]');
	navbar.hasClass('is-open') ? navbar.removeClass('is-open') : navbar.addClass('is-open');
})