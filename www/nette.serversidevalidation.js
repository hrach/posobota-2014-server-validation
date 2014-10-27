Nette.validators.serverValidate = function(elem, arg, val, rule) {
	$.ajax({
		url: arg.replace('__replace_me__', val),
		dataType: "json",
		success: function(result) {
			$.data(elem, 'valid', result.valid);
			$.data(elem, 'validMsg', result.msg);
			$.data(elem, 'validFor', val);
			if (!result.valid) {
				LiveForm.addError(elem, result.msg);
			} else {
				LiveForm.removeError(elem);
			}
		}
	});
	var valid = $.data(elem, 'valid');
	if (typeof valid !== "undefined" && $.data(elem, 'validFor') === val) {
		rule.msg = $.data(elem, 'validMsg');
		return valid;
	}

	return true;
};
