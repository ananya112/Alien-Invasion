window.onload = function() {

console.log("test")

alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
characters = ["⌇", "⌆", "⌅", "⌁", "҂", "؏", "۽", "۾", "৺", "୰", "௳", "౿", "൹", "༓", "༜", "༴", "༸", "࿂", "᎓", "᎔", "᎕", "᎘", "᎙", "℥", "⅊", "⇃"];
simplephrases = ["Take us to your leader", "We come in peace", "We are an alien species"];
mediumphrases = ["Do not be afraid", "Please we only wish to cooperate", "We wish to reinstate relations with Earth"];
finalphrases = ["We are here to study the existence of your inferior race", "We come from a neighboring galaxy and intend to fulfill peaceful relations", "According to our analysis your species is not worthy of survival"];
transsimple = [];
transmedium = [];
transfinal = [];
dict = {};
function assign() {
	for(let x = 0; x < 26; x++) {
		assign = Math.round(Math.random() * (25 - x));
		dict[alphabet[x]] = characters[assign];
		characters.splice(assign,1);
		console.log(assign);
		console.log(characters);
		console.log(dict[alphabet[x]]);
	}
	console.log(dict);
}

function transto(phrase) {
	transed = phrase.toUpperCase();
	for(let x = 0; x < phrase.length; x++) {
		if(transed[x] == " ") {
			pass = "pass";
		} else {
			transed = transed.replace(transed[x], dict[transed[x]]);
		}
	}
	return transed;
}
assign();
for(let i = 0; i < 3; i++) {
	transsimple.push(transto(simplephrases[i]));
	transmedium.push(transto(mediumphrases[i]));
	transfinal.push(transto(finalphrases[i]));
	console.log(transsimple);
	console.log(transmedium);
	console.log(transfinal);
}
var button = document.getElementById("start");
button.addEventListener("click", function() {

}, false);
}	