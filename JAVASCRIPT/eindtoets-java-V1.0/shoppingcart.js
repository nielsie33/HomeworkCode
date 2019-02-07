// Function: bestellen
// Parameters: form object
// Returns: Cookie met bestelling info...
// Purpose: cookie maken met info bestelde item

function bestellen(thisForm) {


    productInfo =
            thisForm.id.value + '|' +
            thisForm.merk.value + '|' +
            thisForm.model.value + '|' +
            thisForm.geheugen.value + '|' +
            thisForm.prijs.value + '|' +
            thisForm.aantal.value + '|' +
            thisForm.gewicht.value;

    maakCookie(thisForm.id.value, productInfo, 1);

    notice = thisForm.aantal.value + ' ' +
            thisForm.merk.value +
            ' In winkelwagen.';
    alert(notice);
}

// Function: cartWeergeven
// Parameters: Null
// Returns: Productentabel
// Purpose: Geeft productentabel weer in html
// formaat

function cartWeergeven() {
    tabelrij = '';
    for (i = 0; i <= 6; i++) {
        dezeCookie = leesCookie(i);
        if (dezeCookie == null || dezeCookie == 'niet-gevonden')
        {
            continue;
        }
        velden = new Array();
        velden = dezeCookie.split('|');
        var gewicht = (parseFloat(velden[5]) * velden[6]);

        tabelrij += '<tr>' +
                '<td>' + velden[0] + '</td>' +
                '<td>' + velden[1] + '</td>' +
                '<td>' + velden[2] + '</td>' +
                '<td>' + velden[3] + '</td>' +
                '<td>' + velden[4] + '</td>' +
                '<td>' + velden[6] + '</td>' +
                '<td>' + velden[5] + '</td>' +
                '<td>' + (parseFloat(velden[4] * velden[5])) + '</td>' +
                '<td>' + gewicht + '</td>' +
                '<td>' + "<img onclick='verwijderCookie(" + "\"" + i + "\"" + ");' src='images/delete.png'>" + '</td>' +
                '</tr>';
    }
    document.write(tabelrij);
}

function verzendkosten(gewicht) {
    var Verzendkosten = 0.0;
    
    if(gewicht <= 1 ){
        Verzendkosten = 0.60;
    }
    if(gewicht >= 1 && gewicht <= 3){
        Verzendkosten = 2.90;
    }
    if(gewicht >= 3 && gewicht <= 10){
        Verzendkosten = 5.70;
    }
    if(gewicht > 10){
        Verzendkosten = 8.80;
    }
    return Verzendkosten;
}

function GetTotaalGewicht() {
    totale_gewicht = 0.0;
    for (i = 0; i <= 6; i++) {
        dezeCookie = leesCookie(i);
        if (dezeCookie == null || dezeCookie == 'niet-gevonden')
        {
            continue;
        }
        velden = new Array();
        velden = dezeCookie.split('|');
        var gewicht = (parseFloat(velden[5]) * velden[6]);

        totale_gewicht += gewicht;
    }
    return totale_gewicht;
}

function verwijderAlleCookies() {
    for (i = 1; i <= 6; i++) {
        verwijderCookie(i);
    }
}
