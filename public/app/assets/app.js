(function ($) {
	var _this = this;

	$.Loading = {
		lastSpinner: null,
		show: function show(text) {
			if (_this.lastSpinner != null) return false;
			_this.lastSpinner = $('#status').html();
			$('#status').html(_this.lastSpinner + (text || ''));
			$('body').delay(350).css({ 'overflow': 'hidden' }); //will hide body content
			$('#preloader').delay(350).fadeIn('slow'); // will fade in the loader background
			$('#status').fadeIn(); // will fade in the loading animation
		},
		hide: function hide() {
			if (_this.lastSpinner == null) return false;
			$('#status').fadeOut(); // will first fade out the loading animation
			$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			$('body').delay(350).css({ 'overflow': 'visible' });
			$('#status').html(_this.lastSpinner);
			_this.lastSpinner = null;
		}
	};
})(jQuery);

(function ($) {

	//define the plugin
	$.fn.dcSlickForms = function (options) {

		//set default options
		var defaults = {
			classError: 'error',
			classForm: 'slick-form',
			align: 'left',
			animateError: true,
			animateD: 10,
			ajaxSubmit: true,
			errorH: 24,
			successH: 40
		};

		//call in the default otions
		var options = $.extend(defaults, options);

		//act upon the element that is passed into the design
		return this.each(function (options) {

			// Declare the function variables:
			var formAction = $(this).attr('action');
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var textError = $('.v-error', this).val();
			var textEmail = $('.v-email', this).val();
			var $error = $('<span class="error"></span>');
			var $form = this;
			var $loading = $('<div class="loading"><span></span></div>');
			var errorText = '* Required Fields';
			var check = 0;

			$('input', $form).focus(function () {
				$(this).addClass('focus');
			});
			$('input', $form).blur(function () {
				$(this).removeClass('focus');
				masonryHeight();
			});
			$('.nocomment').hide();
			$('.defaultText', this).dcDefaultText();
			$('.' + defaults.classForm + ' label').hide();

			// Form submit & Validation
			$(this).submit(function () {

				if (check == 0) {
					horig = $('#bottom-container .boxes').height();
				}
				check = 1;
				formReset($form);
				$('.defaultText', $form).dcDefaultText({ action: 'remove' });

				// Validate all inputs with the class "required"
				$('.required', $form).each(function () {
					var label = $(this).attr('title');
					var inputVal = $(this).val();
					var $parentTag = $(this).parent();
					if (inputVal == '') {
						$parentTag.addClass('error').append($error.clone().text(textError));
					}

					// Run the email validation using the regex for those input items also having class "email"
					if ($(this).hasClass('email') == true) {
						if (!emailReg.test(inputVal)) {
							$parentTag.addClass('error').append($error.clone().text(textEmail));
						}
					}
				});

				// All validation complete - Check if any errors exist
				// If has errors
				if ($('.error', $form).length) {
					masonryHeight();
					$('.btn-submit', this).before($error.clone().text(textError));
				} else {
					if (defaults.ajaxSubmit == true) {

						$(this).addClass('submit').after($loading.clone());
						$.Loading.show('Wait while our sending your message');
						$('.defaultText', $form).dcDefaultText({ action: 'remove' });
						$.post(formAction, $(this).serialize(), function (data) {
							console.log(data);
							console.log(data.statusCode);
							$('.loading').fadeOut().remove();
							$('.response').html(data.status).fadeIn();
							var x = horig + defaults.successH;
							$('.boxes.masoned').animate({ height: x + 'px' }, 400);
							$('fieldset', this).slideUp();
							$('[name=reset]').click();
							$.Loading.hide();
						});
					} else {
						$form.submit();
					}
				}
				// Prevent form submission
				return false;
			});

			// Fade out error message when input field gains focus
			$('input, textarea').focus(function () {
				var $parent = $(this).parent();
				$parent.addClass('focus');
				$parent.removeClass('error');
			});
			$('input, textarea').blur(function () {
				var $parent = $(this).parent();
				var checkVal = $(this).attr('title');
				if (!$(this).val() == checkVal) {
					$(this).removeClass('defaulttextActive');
				}
				$parent.removeClass('error focus');
				$('span.error', $parent).hide();
			});

			function formReset(obj) {
				$('li', obj).removeClass('error');
				$('span.error', obj).remove();
				masonryHeight();
			}

			function masonryHeight() {
				var q = $('li.error', $form).length;
				if (q > 0) {
					var x = horig + q * defaults.errorH;
					$('.boxes.masoned').animate({ height: x + 'px' }, 400);
				}
			}
		});
	};
})(jQuery);

$(document).ready(function () {
	console.log('Forms initialized');
	$('.forms').dcSlickForms();
});
