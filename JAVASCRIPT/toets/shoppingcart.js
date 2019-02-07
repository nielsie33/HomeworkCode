// FUNCTION: bestellen
// PARAMETERS: Form Object
// RETURNS: Cookie met bestelling info...
// PURPOSE: cookie maken met info bestelde item
function bestellen(thisForm){
	
	productInfo =
	thisForm.id.value + '|' +
	thisForm.merk.value + '|' +
	thisForm.model.value + '|' +
	thisForm.geheugen.value + '|' +
	thisForm.gewicht.value + '|' +
	thisForm.prijs.value + '|' +
	thisForm.aantal.value;
	
	maakCookie(thisForm.id.value, productInfo,1);
	notice = thisForm.aantal.value + ' ' +
			 thisForm.merk.value +
			 ' in winkelwagen.';
	alert(notice);
}


// FUNCTION: cartWeergeven
// PARAMETERS: Null
// RETURNS: Productentabel
// PURPOSE: Geeft productentabel weer in html
// formaat
verzendkostenalles = 0;
function cartWeergeven() {
	tabelrij = '';		
	for(i = 0; i <= 6; i++){
		dezeCookie = leesCookie(i);
		if(dezeCookie == null || dezeCookie == 'niet-gevonden')
		{continue;}
		velden = new Array();
		velden = dezeCookie.split('|');
		gewichttotaal = velden[4] * velden[6];
		verzendkostentotaal = 0;
		if (gewichttotaal < 1) {
			verzendkostentotaal = 0.60;
		} else if (gewichttotaal >= 1 && gewichttotaal <= 3){
			verzendkostentotaal = 2.90;
		} else if (gewichttotaal >= 3 && gewichttotaal <= 10) {
			verzendkostentotaal = 5.70;
		} else if (gewichttotaal  > 10) {
			verzendkostentotaal = 8.80;
		}
		tabelrij += '<tr>'+
		'<td>' + velden[0] + '</td>' +
		'<td>' + velden[1] + '</td>' +
		'<td>' + velden[2] + '</td>' + 
		'<td>' + velden[3] + '</td>' +
		'<td>' + velden[4] + '</td>' +
		'<td>' + verzendkostentotaal.toFixed(2) + '</td>' +
		'<td>' + velden[5] + '</td>' +
		'<td>' + velden[6] + '</td>' +
		'<td>' + velden[5] * velden[6] + '</td>' +
		'<td>' + velden[4] * velden[6] + '</td>' +
		'<td>' + "<img onclick='verwijderCookie(" + "\"" + i + "\"" + ");' src='images/delete.png'>" + '</td>' +
		'</tr>';
		verzendkostenalles += verzendkostentotaal;
	}
	document.write("Totale Verzendkosten: " + "€" + verzendkostenalles.toFixed(2));
	document.write(tabelrij);
}

// FUNCTION: verwijderAlleCookies
// PARAMETERS: Null
// RETURNS: Null
// PURPOSE: Alle cookies verwijderen
function verwijderAlleCookies() {
	for(i = 1; i <= 6; i++){
		verwijderCookie(i)
	}
}