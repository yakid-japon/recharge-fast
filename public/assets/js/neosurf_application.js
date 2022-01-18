function open_ticket_popup(page, getTelNb) {

	if (getTelNb === 1) {
		var telNb = document.getElementById("telNb");
		page = page + "&tel_nb=" + telNb.value;
	}

	window.open(page, "", "top=0,left=0,width=370,height=600,menubar=no,scrollbars=yes,statusbar=no,location=no");
	void(0);
}

function submitOnce() {
	var submitcount = 0;
	if (submitcount === 0) {
		submitcount++;
		return true;
	} else {
		return false;
	}

}

function showHideFields(question, divValue) {

	if ($("input:radio[name=" + question + "]:checked").val() === '0') {
		document.getElementById('faq_text_' + divValue).style.display = 'none';
	} else if ($("input:radio[name=" + question + "]:checked").val() === '1') {
		document.getElementById('faq_text_' + divValue).style.display = 'block';
	}
	showContactLink();
}

function clickText(question, divValue) {
	$("input:radio[name=" + question + "]").prop('checked', null);
	$("input:radio[id=" + question + "]").attr('checked', true);
	$("input:radio[id=" + question + "]").prop('checked', true);
	showHideFields(question, divValue);
}

function showContactLink() {
	var i = 1;
	var show = true;
	while (document.getElementById('faq_text_' + i)) {
		if ($("input:radio[name=QUESTION" + (i - 1) + "]:checked").val() !== '0') {
			show = false;
		}
		i++;
	}
	if (show) {
		document.getElementById('contactLink').style.display = 'block';
	} else {
		document.getElementById('contactLink').style.display = 'none';
	}
}

// function buildNeosurfHeadGradient() {
// 	var c = document.getElementById("gradient");
// 	var cxt = c.getContext("2d");
// 	var grd = cxt.createLinearGradient(0, 0, 500, 0);
// 	grd.addColorStop(0, "#6DCFF6");
// 	grd.addColorStop(1, "#f0f3f4");
// 	cxt.fillStyle = grd;
// 	cxt.fillRect(0, 0, 500, 27);
// }


function buildMyneosurfHeadGradient() {
	var c = document.getElementById("gradient");
	var cxt = c.getContext("2d");
	var grd = cxt.createLinearGradient(0, 0, 500, 0);
	grd.addColorStop(0, "#4f577e");
	grd.addColorStop(1, "#F0F3F4");
	cxt.fillStyle = grd;
	cxt.fillRect(0, 0, 500, 27);
}

function extractUrlParams() {
	var t = location.search.substring(1).split('&');
	var f = [];
	for (var i = 0; i < t.length; i++) {
		var x = t[ i ].split('=');
		f[x[0]] = x[1];
	}
	return f;
}

function replace(expr, a, b) {
	var i = 0;
	while (i !== -1) {
		i = expr.indexOf(a, i);
		if (i >= 0) {
			expr = expr.substring(0, i) + b + expr.substring(i + a.length);
			i += b.length;
		}
	}
	return expr;
}

function languageRedirection()
{
	/*
	 * If home without Lang code
	 */
	if (
		window.location.href === 'http://' + window.location.host + '/' ||
		window.location.href === 'https://' + window.location.host + '/'
	)
	{
		// Get user language
		var userLang = navigator.language || navigator.userLanguage;

		// If user language if not French, redirect to home page with lang code
		if (userLang !== 'fr')
		{
			var langCode;
			var userLangFirstTwo;
			langCode = null;
			userLangFirstTwo = userLang.substr(0, 2);

			// If we had the translatation
			switch (userLangFirstTwo)
			{
				case 'en':
					langCode = 'en_GB';
					break;

				case 'el':
					langCode = 'el_GR';
					break;

				case 'fr':
				case 'pt':
				case 'de':
				case 'it':
				case 'es':
				case 'ro':
				case 'pl':
					langCode = userLangFirstTwo + "_" + userLangFirstTwo.toUpperCase();
					break;
			}

			if (langCode !== null)
			{
				var destination = window.location.href + langCode;
				window.location.replace(destination);
			}
		}
	}
}

function PopupCenter(url, title, w, h) {

	var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
	var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;

	width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
	height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

	var left = ((width / 2) - (w / 2)) + dualScreenLeft;
	var top = ((height / 2) - (h / 2)) + dualScreenTop;
	var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

	if (window.focus) {
		newWindow.focus();
	}
}