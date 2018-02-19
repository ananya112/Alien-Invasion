window.onload = function() {

alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
characters = ["⌇", "⌆", "⌅", "⌁", "҂", "؏", "۽", "۾", "৺", "୰", "௳", "౿", "൹", "༓", "༜", "༴", "༸", "࿂", "᎓", "᎔", "᎕", "᎘", "᎙", "℥", "⅊", "⇃"];
simplephrases = ["Take us to your leader", "We come in peace", "We are an alien species"];
mediumphrases = ["Do not be afraid", "Please we only wish to cooperate", "We wish to reinstate relations with Earth"];
finalphrases = ["We are here to study the existence of your inferior race", "We come from a neighboring galaxy and intend to fulfill peaceful relations", "According to our analysis your species is not worthy of survival"];
transsimple = [];
transmedium = [];
transfinal = [];
solved = [];
initial = [];
dict = {};
globalused = [];
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
function transfrom(phrase) {
	transphrase = phrase;
	for(let x = 0; x < phrase.length; x++) {
			if(phrase[x] == " ") {
				let pass = "pass";
			} else {
			for(let i = 0; i < 26; i++) {
				if(dict[alphabet[i]] == phrase[x]) {
					if(solved.indexOf(alphabet[i]) > -1) {
						transphrase = transphrase.replace(phrase[x], alphabet[i]);
					}
				}
			}
		}
	}
	return transphrase;
}
function initreveal() {
	let used = [];
	console.log(initial);
	for(let x = 0; x < 5; x++) {
		var rand = Math.round(Math.random() * initial.length);
		if(used.indexOf(initial[rand]) > -1) {
			console.log(used.indexOf(initial[rand]	));
			x--;
		} else {
			solved.push(initial[rand]);
			used.push(initial[rand]);	
		}
	}
	console.log(solved);
}

function simplerandom() {
	for(let x = 0; x < 2; x++) {
		rand = Math.round(Math.random() * 2 - x);
		let phrase = transsimple[rand];
		simplephrases.pop(rand);
		return phrase;
	}
}
function mediumrandom() {
	for(let x = 0; x < 2; x++) {
		rand = Math.round(Math.random() * 2 - x);
		let phrase = transmedium[rand];
		mediumphrases.pop(rand);
		return phrase;
	}
}
function finalrandom() {
	for(let x = 0; x < 2; x++) {
		rand = Math.round(Math.random() * 2 - x);
		let phrase = transfinal[rand];
		simplephrases.pop(rand);
		return phrase;
	}
}
function main() {
	assign();
	for(let i = 0; i < 3; i++) {
		console.log(i);
	transsimple.push(transto(simplephrases[i]));
	transmedium.push(transto(mediumphrases[i]));
	transfinal.push(transto(finalphrases[i]));
	console.log(transsimple);
	console.log(transmedium);
	console.log(transfinal);
}
	let initialphrase = simplerandom();
	for(let x = 0; x < initialphrase.length; x++) {
		if(initialphrase[x] == " ") {
			let pass2 = "pass";
		} else {
			for(i = 0; i < 26; i++)
				if(dict[alphabet[i]] == initialphrase[x]) {
					if(globalused.indexOf(alphabet[i]) > -1) {
						let pass = "pass";
					} else {
						initial.push(alphabet[i]);
						globalused.push(alphabet[i]);
					}
				}
			}
		}
	initreveal();
	console.log(transfrom(initialphrase));
	}
main();
/*var button = document.getElementById("start");
button.addEventListener("click", function() {

}, false);*/
}	