$(document).ready(function() {
	Support.initialize();
});

/**
 * Methods used in validating support forms
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       Support
 * @requires
 * @example
 *
 *      Support.initialize();
 *
 */

var Support = {
	form: '',
	requiredField: {},
	submitButton: {},
	initialize: function() {
		Support.form = '#support-form';
		Support.requiredField = $(Support.form + ' .form-row.required :input');
		Support.requiredCheckboxField = $(Support.form + ' .form-row-checkbox.required input');
		Support.submitButton = $('#support-submit');
		Support.hasSecondName = $('#hasSecondName');
		Support.secondName = $('#secondName');
		Support.hasSecondName = $('#hasSecondName');

		if (!Support.form.length) {
			return false;
		}

		if (Support.hasSecondName.is(":checked") ){
	    	disableField(Support.secondName);
		}

		var reqLength=1;
		if (this.maxLength && this.maxLength == 6){
			reqLength = 6;
		}

		Support.requiredField.bind('focus blur input propertychange', function() {
			if ($(this).val().length >= reqLength) {
				setTimeout(function() {
					if (Support.getStatus() === 'complete') {
						UI.wakeButton(Support.submitButton);
					}
				}, 250);
			}
		});

		Support.requiredCheckboxField.bind('focus blur input propertychange click', function() {
			if ($(this).val().length > 0) {
				setTimeout(function() {
					if (Support.getStatus() === 'complete') {
						UI.wakeButton(Support.submitButton);
					}
				});
			}
		});

		Support.hasSecondName.bind('click', function(e) {
			toggleRequiredField(Support.secondName);
			e.stopImmediatePropagation();
		});
		$('label[for=hasSecondName]').bind('click', function(e) {
			if (Support.secondName.is(':disabled')) {
				Support.hasSecondName.removeAttr('checked');
			} else {
				Support.hasSecondName.attr('checked', 'checked');
			}
			toggleRequiredField(Support.secondName);
			return false;
		});

		$(Support.form).bind('submit', function() {
			var invalidData = false,
				errors = [],
//				invalidFields = $(Support.form + ' input[required][value=""]'),
//				validFields = $(Support.form + ' input[required][value!=""]'),
				emailField = $(Support.form + ' input#email'),
                requiredFields = $(Support.form + ' input[required]');
			
            for(var i = 0; i < requiredFields.length; i++) {
                var currentField = $(requiredFields[i]);
                if(currentField.val() != "") {
                    currentField.parents('span.input-right, span.input-text').removeClass('input-error');
                    currentField.parents('span.input-right').prev('span.input-left').removeClass('input-error');
                    currentField.parents('div.form-row').removeClass('form-error');
                } else {
				invalidData = true;
                    currentField.parents('span.input-right').addClass('input-error');
                    currentField.parents('span.input-right').prev('span.input-left').addClass('input-error');
                    currentField.parents('div.form-row').addClass('form-error');
                }
			}

			if (emailField.length === 1 && emailField.val()) {
				var emailPattern = new RegExp('^[0-9a-zA-Z+_.-]+@[0-9a-zA-Z_-]+\\.[0-9a-zA-Z_.-]+$');
				if (!emailPattern.test($(Support.form + ' input#email').val())) {
					emailField.parents('span.input-right').addClass('input-error');
					emailField.parents('span.input-right').prev('span.input-left').addClass('input-error');
					errors.push(FormMsg.emailMissing);
					invalidData = true;
				} else {
					emailField.removeClass('form-error');
				}
			}

			if (invalidData) {
                errors.push(FormMsg.fieldsMissing);
				Support.insertErrorBox(errors);
				window.location.href = '#form-errors';
				return false;
			} else {
				return true;
			}
		})
	},

	insertErrorBox: function(errorMessages) {
		$('#content .alert').remove();
		var errorCount = errorMessages.length,
			errorList = '',
			errorCodes = '';

		var errorHtml = ''
				+ '<div class="alert error closeable border-4 glow-shadow">'
					+ '<div class="alert-inner">'
						+ '<div class="alert-message">'
							+ '<p class="title"><strong><a name="form-errors"> </a>' + (FormMsg[ (errorCount > 1) ? 'headerMultiple' : 'headerSingular' ]) + '</strong></p>';
		if (errorCount > 1) {
			errorHtml += '<ul>';
			for (var i = 0; i < errorCount; i++) {
				errorHtml += '<li>' + errorMessages[i] + '</li>';
				errorList = errorList + ', ' + errorMessages[i];
				if (errorMessages[i] == FormMsg.emailMissing) {
					errorCodes = errorCodes + ', error.email.invalid';
				} else if (errorMessages[i] == FormMsg.fieldsMissing) {
					errorCodes = errorCodes + ', error.field.requiredFields';
				}
			}
			errorHtml += '</ul>';
		} else {
			errorHtml += '<p>' + errorMessages[0] + '</p>';
		}
		errorHtml += ''
						+ '</div>'
					+ '</div>'
				+ '</div>';
		$('#content').prepend(errorHtml);

		if (typeof(lpMTagConfig) != 'undefined' && lpMTagConfig.vars && typeof(lpSendData) != 'undefined') {
			lpMTagConfig.vars.push(["session", "errors", errorList]);
			lpMTagConfig.vars.push(["session", "errorCodes", errorCodes]);
			lpSendData();
		}
	},

	getStatus: function() {
		if (!Support.form.length) {
			Support.initialize();
		}
		// Checking plain text fields
        var requiredText = true;
        Support.requiredField.filter(":text")
            .each(function(){
                if(!this.value){ requiredText = false; }
            });

        // Checking radios and checkboxes
        var checked = {};
        Support.requiredField.filter(":radio, :checkbox")
            .each(function(){
                checked[this.name] = this.checked || checked[this.name] || false;
            });
        var requiredCheckbox = true;
        for(var check in checked){
            if( checked.hasOwnProperty(check) ){
                if( !checked[check] ){ requiredCheckbox = false; }
            }
        }

        // Checking selects
        var requiredSelect = true;
        Support.requiredField.filter("select")
            .each(function(){
                if(this.value==-1){ requiredSelect = false; }
            });

        return (requiredText && requiredCheckbox && requiredSelect) ? 'complete' : 'incomplete';
	}
};

function toggleRequiredField(field) {
	var fieldObj = $(field);
	
    if (fieldObj.is(':disabled')) {
    	enableField(fieldObj);
    } else {
    	disableField(fieldObj);
    }

	if (Support.getStatus() === 'complete') {
		UI.wakeButton(Support.submitButton);
	}
}

function enableField(fieldObj){
	fieldObj.removeAttr('disabled');
	fieldObj.val('');
}

function disableField(fieldObj){
	fieldObj.val('N/A');
	fieldObj.attr('disabled', 'disabled');
}

function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}