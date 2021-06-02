$(document).ready(function(){
	// click button to reveal
	$(document).on('click touchend', '[data-questions-button]', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(document).find('.c-questions__form').addClass('is-visible');
	})

	// click close to hide
	$(document).on('click touchend', '[data-close-popup]', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(document).find('.c-questions__form').removeClass('is-visible');
	})

	// redirect to thank you on submit
	// moved to contact-forms.js global
})