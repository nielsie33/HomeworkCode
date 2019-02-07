// function: maakCookie
// parameters: naam, waarde, dagen
// return:
// doel: een cookie maken
function maakCookie(naam, waarde, dagen) {
	if (dagen) {
		var datum = new Date();
		datum.setTime(datum.getTime() + (dagen*24*60*60*1000));
		var verloopdatum = '; expires= ' + datum.toGMTString();
	} else {
		var verloopdatum = '';
	}
	document.cookie = naam + '='+waarde+verloopdatum + ';path=/';
}