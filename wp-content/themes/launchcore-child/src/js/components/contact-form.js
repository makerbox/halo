$(document).ready(function(){
	console.log('contact-form.js');
	let inputFields = $(document).find('.c-contact-form__input-group input, .c-contact-form__input-group textarea');
	// when you click a field remove the label
	$(document).on('click touchend', '.c-contact-form__input-group', function(e){

		let self = $(this);
		self.find('.c-contact-form__label').addClass('is-hidden');
	})
	// when field changes
	$('input, textarea').keyup(function(){
		let self = $(this);
		let myVal = self.val();
		// if it is empty show the label
		if(myVal.length){
			self.parent().parent().find('.c-contact-form__label').addClass('is-hidden');
		}else{
			self.parent().parent().find('.c-contact-form__label').removeClass('is-hidden');
		}
	})
})