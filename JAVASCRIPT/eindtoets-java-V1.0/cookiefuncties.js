// Function: maakCookie
// Parameters: naam, waarde, dagen
// Return:
// Doel: een cookie maken
function maakCookie(naam, waarde, dagen) {
    if (dagen) {
        var datum = new Date();
        datum.setTime(datum.getTime() + (dagen * 24 * 60 * 60 * 1000));
        var verloopdatum = '; expires= ' + datum.toGMTString();
    } else {
        var verloopdatum = '';
    }
    document.cookie = naam + '=' + waarde + verloopdatum + ';path=/';
}


// Function: leesCookie
// Parameters: naam
// Return: waarde van de cookie
// Doel: de waarde van een cookie retourneren
function leesCookie(naam) {
    var naamCookie = naam + '=';
    var cookieArray = document.cookie.split(';');
    for (var i = 0; i < cookieArray.length; i++) {
        var dezeCookie = cookieArray[i];
        dezeCookie = dezeCookie.trim();
        if (dezeCookie.indexOf(naamCookie) == 0) {
            return dezeCookie.substring(naamCookie.length, dezeCookie.length);
        }
    }
    return null;
}

// Function: verwijderCookie
function verwijderCookie(naam) {
    maakCookie(naam,"",-1);
    location.reload();
}

