function drawStep(now) {
	var step = document.getElementById("step");
	step.style.display = "inline";
	var ctx = step.getContext("2d");
	var lenth = 190;
	for (var i = 0; i < 3; i++)
	{
		ctx.beginPath();
		ctx.fillStyle = ctx.strokeStyle = '#CCCCCC';

		if (i == now)
			ctx.fillStyle = ctx.strokeStyle = '#00B800';

		ctx.moveTo(10 + i * lenth, 10);
		ctx.lineTo(lenth + i * lenth, 10);
		ctx.lineTo(lenth + 20 + i * lenth, 30);
		ctx.lineTo(lenth + i * lenth, 50);
		ctx.lineTo(10 + i * lenth, 50);
		ctx.lineTo(30 + i * lenth, 30);
		ctx.closePath();
		ctx.stroke();
		ctx.fill();
	}
}

function selectPaymentType(paymentType, merchantTouchy, isFinalMessage) {

	var formList = new Array("creditCard", "neosurf", "myneosurf", "userInfoForm", "loginForm");

	if (paymentType == "creditCard" || (merchantTouchy == true && paymentType == "neosurf") || paymentType == "userInfoForm" || paymentType == "loginForm") {
		document.getElementById('kycMethod').style.display = "block";


		document.getElementById('child1').style.left = "90px";
		document.getElementById('child2').style.left = "140px";

		document.getElementById('child3').style.left = "200px";

		document.getElementById('secondButtonValue').innerHTML = "3";
	} else {
		document.getElementById('kycMethod').style.display = "none";

		document.getElementById('child1').style.left = "150px";
		document.getElementById('child2').style.left = "140px";

		document.getElementById('child3').style.left = "300px";

		document.getElementById('secondButtonValue').innerHTML = "2";
	}

	if (isFinalMessage == true) {

		for (var i in formList) {
			document.getElementById(formList[i] + 'Method').style.display = "block";
			document.getElementById(formList[i] + 'Method').style.opacity = "0.5";
			document.getElementById(formList[i] + 'Method').style.pointerEvents = "none";
			document.getElementById(formList[i] + 'Method').style.cursor = "default";
		}
	}
	else {

		for (var i in formList) {
			if (document.getElementById(formList[i]))
				document.getElementById(formList[i]).style.display = "none";
			if (document.getElementById(formList[i] + 'Method'))
				document.getElementById(formList[i] + 'Method').style.display = "block";
			//document.getElementById('welcomeDiv').style.display = "block";

		}

		document.getElementById(paymentType).style.display = "inline";
		document.getElementById(paymentType + 'Method').style.display = "block";



		for (var i in formList) {

			if (document.getElementById(formList[i]) == null) {

				formList[i] = paymentType;

			}
			if (document.getElementById(formList[i]) == document.getElementById(paymentType)) {
				document.getElementById(formList[i] + 'Method').style.opacity = "1";

			} else {

				document.getElementById(formList[i] + 'Method').style.opacity = "0.5";
			}
		}
	}

	drawStep(1);
}

function selectUserPaymentType(userPaymentType, merchantTouchy, isFinalMessage) {

	var formList = new Array("creditCard", "neosurf", "myneosurf");

	if (userPaymentType == "creditCard" || (merchantTouchy == true && userPaymentType == "neosurf") || userPaymentType == "userInfoForm" || userPaymentType == "loginForm") {
		document.getElementById('kycMethod').style.display = "block";
	} else {
		document.getElementById('kycMethod').style.display = "none";
	}

	for (var i in formList) {

		if (document.getElementById(formList[i]) == document.getElementById(userPaymentType)) {
			document.getElementById(formList[i] + 'Method').style.opacity = "1";

		} else {

			document.getElementById(formList[i] + 'Method').style.opacity = "0.5";
		}
	}
	if (isFinalMessage == true) {

		for (var i in formList) {
			document.getElementById(formList[i] + 'Method').style.opacity = "0.5";
			document.getElementById(formList[i] + 'Method').style.pointerEvents = "none";
			document.getElementById(formList[i] + 'Method').style.cursor = "default";
		}
	}

}

function open_popup(page, page_width, page_height, options) {

	var top = (screen.height - page_width) / 2;
	var left = (screen.width - page_height) / 2;
	window.open(page, "", "top=" + top + ",left=" + left + ",width=" + page_width + ",height=" + page_height + ",menubar=no,scrollbars=no,statusbar=no,location=no");
}

function browserLanguage() {
	// Get user language
	var userLang = navigator.language || navigator.userLanguage;

	// If user language if not French, redirect to home page with lang code

	var langCode;
	langCode = null;

	// If we had the translatation
	switch (userLang.substr(0, 2))
	{
		case 'en':
			langCode = 'en_GB';
			break;

		case 'es':
			langCode = 'es_ES';
			break;

		case 'de':
			langCode = 'de_DE';
			break;

		case 'it':
			langCode = 'it_IT';
			break;

		case 'pt':
			langCode = 'pt_PT';
			break;

		case 'fr':
			langCode = 'fr_FR';
			break;

		case 'el':
			langCode = 'el_GR';
			break;

		case 'ro':
			langCode = 'ro_RO';
			break;
	}
	return langCode;
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

function paymentPinHelper(i, n, nameForm) {

	entirePincode = document.forms[nameForm].elements["payment-pin" + i].value;

	// Clean input
	entirePincode = str_replace("-", "", entirePincode);
	entirePincode = str_replace(".", "", entirePincode);
	entirePincode = str_replace(" ", "", entirePincode);

	// If user try to cut and paste directly an entire pincode
	if (entirePincode.length == 10) {

		document.forms[nameForm].elements["payment-pin1"].value = entirePincode.substring(0, 4);
		document.forms[nameForm].elements["payment-pin2"].value = entirePincode.substring(4, 7);
		document.forms[nameForm].elements["payment-pin3"].value = entirePincode.substring(7, 10);

		//document.forms[nameForm].elements["submitButton"].focus();

	} else {

		// Truncate pin field
		if (document.forms[nameForm].elements["payment-pin" + i].value.length > n) {

			document.forms[nameForm].elements["payment-pin" + i].value = entirePincode.substring(0, n);
		}

		// Change focus automaticaly - Warning focus() IE behaviour
		if (document.forms[nameForm].elements["payment-pin" + i].value.length == n) {

			if (i == 3) {
				//	document.forms[nameForm].elements["submitButton"].focus();
			} else {
				document.forms[nameForm].elements["payment-pin" + (i + 1)].focus();
			}
		}
	}
}