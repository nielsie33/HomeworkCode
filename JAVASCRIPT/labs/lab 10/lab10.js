function dollarKoers() {
	return(1.36);
}
function euroKoers() {
	return(0.74);
}
function roebelKoers() {
	return(48.40);
}
function roebeleuroKoers() {
	return(0.02);
}
function exchange(bedrag, conversie) {
	if(conversie == 'euro') {
		return(bedrag * dollarKoers());
	}
else if(conversie == 'dollar') {
	return(bedrag * euroKoers());
	}
else if(conversie == 'euros'){
	return(bedrag * roebeleuroKoers());
	}
else if(conversie == 'roebel'){
	return(bedrag * roebelKoers());
	}
}