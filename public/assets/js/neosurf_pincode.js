// Init "autocomplete" attribute (XHTML)
function initForm(nameForm) {
	document.forms[nameForm].elements["pin1"].setAttribute("autocomplete", "off");
	document.forms[nameForm].elements["pin2"].setAttribute("autocomplete", "off");
	document.forms[nameForm].elements["pin3"].setAttribute("autocomplete", "off");
}

function resetPincode(nameForm) {

	document.forms[nameForm].elements["pin1"].value = "";
	document.forms[nameForm].elements["pin2"].value = "";
	document.forms[nameForm].elements["pin3"].value = "";
	document.forms[nameForm].elements["pin1"].focus();
}

function str_replace(search, replace, subject) {

	var result = "";
	var oldi = 0;
	for (i = subject.indexOf(search); i > -1; i = subject.indexOf(search, i))
	{
		result += subject.substring(oldi, i);
		result += replace;
		i += search.length;
		oldi = i;
	}
	return result + subject.substring(oldi, subject.length);
}

function pinHelper(i, n, nameForm) {

	entirePincode = document.forms[nameForm].elements["pin" + i].value;

	// Clean input
	entirePincode = str_replace("-", "", entirePincode);
	entirePincode = str_replace(".", "", entirePincode);
	entirePincode = str_replace(" ", "", entirePincode);

	// If user try to cut and paste directly an entire pincode
	if (entirePincode.length == 10) {

		document.forms[nameForm].elements["pin1"].value = entirePincode.substring(0, 4);
		document.forms[nameForm].elements["pin2"].value = entirePincode.substring(4, 7);
		document.forms[nameForm].elements["pin3"].value = entirePincode.substring(7, 10);

		//document.forms[nameForm].elements["submitButton"].focus();

	} else {

		// Truncate pin field
		if (document.forms[nameForm].elements["pin" + i].value.length > n) {

			document.forms[nameForm].elements["pin" + i].value = entirePincode.substring(0, n);
		}

		// Change focus automaticaly - Warning focus() IE behaviour
		if (document.forms[nameForm].elements["pin" + i].value.length == n) {

			if (i == 3) {
			//	document.forms[nameForm].elements["submitButton"].focus();
			} else {
				document.forms[nameForm].elements["pin" + (i + 1)].focus();
			}
		}
	}
}