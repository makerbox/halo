$(document).ready(function(){
	let inputFields = $(document).find('.c-contact-form__input-group input, .c-contact-form__input-group textarea');
	// when you click a field remove the label
	$(document).on('click touchend', '.c-contact-form__input-group', function(e){
		// e.preventDefault();
		// e.stopPropagation();
		inputFields.each(function(){
			let thisField = $(this);
			let thisVal = thisField.val();
			if(thisVal.length){
				thisField.parent().parent().find('.c-contact-form__label').addClass('is-hidden');
			}else{
				thisField.parent().parent().find('.c-contact-form__label').removeClass('is-hidden');
			}
		});
		let self = $(this);
		self.find('.c-contact-form__label').addClass('is-hidden');
		self.find('input').focus().select();

		
	})
	// when field changes
	$('input, textarea').keydown(function(){
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