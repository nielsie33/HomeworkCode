// Globale variabelen
var afbeeldingen = new Array('galaxy-s4.png','ipad.jpg','laptop.jpg');
var max = afbeeldingen.length;
var randomIndex=0;
function showMedia() {
	randomIndex = Math.floor((Math.random() * max));
	document.getElementById('media').src = afbeeldingen[randomIndex];
}