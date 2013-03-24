$(document).ready(function(){
	$('#name').blur(function(){
		$.post(
			'/cake-contact-ajax/messages/validate_form',
			{ field: $('#name').attr('id'), value: $('#name').val() },
			handleNameValidation
		);
	});
	
	function handleNameValidation(error) {
		if (error.length > 0) {
			if ($('#name-notEmpty').length == 0) {
				$('#name').after('<div id="name-notEmpty" class="error-message">' + error + "</div>");
			}
		}
		else {
			$('#name-notEmpty').remove();
		}
	}
	
	$('#email').blur(function(){
		$.post(
			'/cake-contact-ajax/messages/validate_form',
			{ field: $('#email').attr('id'), value: $('#email').val() },
			handleEmailValidation
		);
	});
	
	function handleEmailValidation(error) {
		if (error.length > 0) {
			if ($('#email-valid').length == 0) {
				$('#email').after('<div id="email-valid" class="error-message">' + error + "</div>");
			}
		}
		else {
			$('#email-valid').remove();
		}
	}
	
	$('#message').blur(function(){
		$.post(
			'/cake-contact-ajax/messages/validate_form',
			{ field: $('#message').attr('id'), value: $('#message').val() },
			handleMessageValidation
		);
	});
	
	function handleMessageValidation(error) {
		if (error.length > 0) {
			if ($('#message-notEmpty').length == 0) {
				$('#message').after('<div id="message-notEmpty" class="error-message">' + error + "</div>");
			}
		}
		else {
			$('#message-notEmpty').remove();
		}
	}
});
