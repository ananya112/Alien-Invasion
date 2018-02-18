window.onload = function() {

console.log("test")

alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
characters = ["⌇", "⌆", "⌅", "⌁", "҂", "؏", "۽", "۾", "৺", "୰", "௳", "౿", "൹", "༓", "༜", "༴", "༸", "࿂", "᎓", "᎔", "᎕", "᎘", "᎙", "℥", "⅊", "⇃"];
phrases = ["Take us to your leader", "Give us your cows"];

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
	console.log(transed);
	for(x = 0; x < phrase.length; x++) {
		if(transed[x] == " ") {
			pass = "pass";
			console.log(transed);
		} else {
			transed = transed.replace(transed[x], dict[transed[x]]);
			console.log(transed);
		}
	}
}
assign();
console.log(phrases.length);
for(x = 0; x < phrases.length - 1; x++) {
	transto(phrases[x]);
}
var button = document.getElementById("start");
button.addEventListener("click", function() {

}, false);
}