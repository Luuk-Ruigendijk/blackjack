var imagePrefix = "images/";

var imageSuffix = ".png";

var cardSet = ["Harten", "Klaver", "Schoppen", "Ruiten"];

var typesOriginal = ["Aas", "Twee", "Drie", "Vier", "Vijf", "Zes", "Zeven", "Acht", "Negen", "Tien", "Koning", "Koningin", "Boer"];

var allCards = [];

var cardsAndValues = [];

var testingTesting = 15;

var housePoints = 0;

var playerPoints = 0;

var houseAce = 0;

var playerAce = 0;

function addTotalCardPool(){
	for (var pack = 0; pack < 2; pack++) {
		for (var setOfCard = 0; setOfCard < 4; setOfCard++) {
			for (var i = 0; i < 13; i++) {
				let currentI = i;
				let currentValue = 0;
				if (i>13) {
					if (i>26) {
						if (i>39) {
							currentValue = currentI - 39;
							if (currentValue>10) {currentValue=10};
							if (currentValue==0) {currentValue=11};
							if (currentValue<10) {currentValue+=1};
						}
						else {
							currentValue = currentI - 26;
							if (currentValue>10) {currentValue=10};
							if (currentValue==0) {currentValue=11};
							if (currentValue<10) {currentValue+=1};
						}
					}
					else {
						currentValue = currentI - 13;
						if (currentValue>10) {currentValue=10};
						if (currentValue==0) {currentValue=11};
							if (currentValue<10) {currentValue+=1};
					}
				}
				else {
					currentValue = currentI;
					if (currentValue>10) {currentValue=10};
					if (currentValue==0) {currentValue=11};
							if (currentValue<10) {currentValue+=1};
				}

				var pushMe = {card:cardSet[setOfCard]+typesOriginal[i], value:currentValue};
				cardsAndValues.push(pushMe);
			}
		}
	}
}

addTotalCardPool();

var types = "";

var originalAmount = types.length;

function resetCards(){
	types = typesOriginal;
}

var pickedCard;

function startGame(){
	for (var givenCards = 0; givenCards < 2; givenCards++) {
		pickedCard = Math.floor(Math.random() * cardsAndValues.length);
		console.log(pickedCard);
		var createCard = document.createElement("IMG");
  		createCard.setAttribute("src", imagePrefix+cardsAndValues[pickedCard].card+imageSuffix);
  		document.getElementById("cardLocationHouse").appendChild(createCard);
  		if (givenCards==0) {
  			createCard.setAttribute("class", "regular");
  		}
  		if (cardsAndValues[pickedCard].card == "HartenAas" || "KlaverAas" || "RuitenAas" || "SchoppenAas") {
  			houseAce++;
  		}
  		housePoints+=cardsAndValues[pickedCard].value;
	}

	for (var givenCards = 0; givenCards < 2; givenCards++) {
		console.log("this is "+playerAce);
		pickedCard = Math.floor(Math.random() * cardsAndValues.length);
		console.log(pickedCard);
		var createCard = document.createElement("IMG");
  		createCard.setAttribute("src", imagePrefix+cardsAndValues[pickedCard].card+imageSuffix);
  		document.getElementById("cardLocationPlayer").appendChild(createCard);
  		if (cardsAndValues[pickedCard].card == "HartenAas" || "KlaverAas" || "RuitenAas" || "SchoppenAas") {
  			playerAce++;
  		}
  		playerPoints+=cardsAndValues[pickedCard].value;
  		console.log("this is "+playerAce);

	}
	if (housePoints==21) {
		if (playerPoints==21) {
			alert("tie")
		}
		else {
			alert("house wins")
		}
	}
	else {
		if (playerPoints==21) {
			alert("you have blackjack!")
		}
	}
}

startGame()

function addPlayerCard() {
	pickedCard = Math.floor(Math.random() * cardsAndValues.length);
	console.log(pickedCard);
	var createCard = document.createElement("IMG");
	createCard.setAttribute("src", imagePrefix+cardsAndValues[pickedCard].card+imageSuffix);
	document.getElementById("cardLocationPlayer").appendChild(createCard);
	if (cardsAndValues[pickedCard].card == "HartenAas" || "KlaverAas" || "RuitenAas" || "SchoppenAas") {
		playerAce++;
	}
	playerPoints+=cardsAndValues[pickedCard].value;
	if (playerPoints>21) {
		if (playerAce>0) {
			playerPoints-=10;
			playerAce--;
		}
		else {
			alert("you lost!");
		}
	}
	console.log(playerPoints);
}

function stand() {
	if (housePoints>21) {
		alert("player wins")
		}
	else {
		if (housePoints>16) {
		comparePoints();
		}
		else {
			pickedCard = Math.floor(Math.random() * cardsAndValues.length);
			console.log(pickedCard);
			var createCard = document.createElement("IMG");
			createCard.setAttribute("src", imagePrefix+cardsAndValues[pickedCard].card+imageSuffix);
			document.getElementById("cardLocationHouse").appendChild(createCard);
			if (cardsAndValues[pickedCard].card == "HartenAas" || "KlaverAas" || "RuitenAas" || "SchoppenAas") {
				houseAce++;
			}
			housePoints+=cardsAndValues[pickedCard].value;
			stand();
		}
	}
}

function comparePoints() {
	if (housePoints>playerPoints) {
		alert("house wins!")
	}
	else {
		if (housePoints<playerPoints) {
			alert("player wins!")
		}
		else {
			alert("it's a tie.")
		}
	}
}