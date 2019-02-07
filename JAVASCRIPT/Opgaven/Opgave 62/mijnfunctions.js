function afmelden() {
	var antwoord = confirm('Wilt u zich afmelden?');
	if(antwoord == true) {
		alert('U word afgemeld!!!');
	}
}

function begroeten() {
	datum = new Date();
	var uur = datum.getHours();
	if(uur >= 0 && uur <= 11) {
		document.write('<br>Goedemorgen!');
	} else if(uur >= 12 && uur <= 17) {
		document.write('<br>Goedemiddag!');
	} else {
		document.write('<br>Goedenavond!');
	}
}