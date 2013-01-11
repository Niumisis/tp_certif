/* Author: FB

*/

function uncheck(radio) {
	var rad = document.getElementsByName(radio);
	for (var i = 0; i < rad.length; i++) {
		if(rad[i].checked) rad[i].checked = false;
	}
}

