var playerUserName;

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

var types = "";

var originalAmount = types.length;

var pickedCard;

var betAmount = 0;

var playerCash = getCookie("cash");

var shownCash = playerCash;

console.dir(playerCash);


function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
	    var c = ca[i];
	    c = c.trim();
	    if (c.indexOf(name) == 0) {
	    	return c.substring(name.length, c.length);
	    }
	}
	return "";
}



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

function resetBoard(){
	var housePoints = 0;
	var playerPoints = 0;
	var houseAce = 0;
	var playerAce = 0;
	for(var i = 0; i < cardsAndValues.length; i++){ 
	    cardsAndValues.splice(0, 1);
	}
	document.getElementById("cardLocationPlayer").innerHTML = '';
	document.getElementById("cardLocationHouse").innerHTML = '';
}

function fullStartGame(){
	resetBoard();
	addTotalCardPool();
	document.getElementById("startGameButton").style.display = "none";
	document.getElementById("hitButton").style.visibility = "visible";
	document.getElementById("standButton").style.visibility = "visible";
	for (var givenCards = 0; givenCards < 2; givenCards++) {
		pickedCard = Math.floor(Math.random() * cardsAndValues.length);
		console.log(pickedCard);
		var createCard = document.createElement("IMG");
  		createCard.setAttribute("src", imagePrefix+cardsAndValues[pickedCard].card+imageSuffix);
  		document.getElementById("cardLocationHouse").appendChild(createCard);
  		if (givenCards==0) {
  			createCard.setAttribute("class", "regular");
  			createCard.setAttribute("id", "firstHouseCard");
  		}
  		if (cardsAndValues[pickedCard].card == "HartenAas" || cardsAndValues[pickedCard].card == "KlaverAas" || cardsAndValues[pickedCard].card == "RuitenAas" || cardsAndValues[pickedCard].card == "SchoppenAas") {
  			houseAce++;
  		}
  		housePoints+=cardsAndValues[pickedCard].value;
  		cardsAndValues.splice(pickedCard, 1);
	}

	for (var givenCards = 0; givenCards < 2; givenCards++) {
		console.log("this is "+playerAce);
		pickedCard = Math.floor(Math.random() * cardsAndValues.length);
		console.log(pickedCard);
		var createCard = document.createElement("IMG");
  		createCard.setAttribute("src", imagePrefix+cardsAndValues[pickedCard].card+imageSuffix);
  		document.getElementById("cardLocationPlayer").appendChild(createCard);
  		if (cardsAndValues[pickedCard].card == "HartenAas" || cardsAndValues[pickedCard].card == "KlaverAas" || cardsAndValues[pickedCard].card == "RuitenAas" || cardsAndValues[pickedCard].card == "SchoppenAas") {
  			playerAce++;
  		}
  		playerPoints+=cardsAndValues[pickedCard].value;
  		cardsAndValues.splice(pickedCard, 1);
  		console.log("this is "+playerAce);

	}
	if (housePoints==21) {
		document.getElementById("firstHouseCard").setAttribute("class", "");
		if (playerPoints==21) {
			alert("tie");
			gameOver("tie");
		}
		else {
			alert("house wins")
			gameOver("house");
		}
	}
	else {
		if (playerPoints==21) {
			alert("you have blackjack!")
			document.getElementById("firstHouseCard").setAttribute("class", "");
			gameOver("blackjack");
		}
	}
}

var setBetAmount;

function startGame() {
	if (playerCash > 0) {
		setBetAmount = prompt("Please enter the amount you wish to bet:", 0);
		if (setBetAmount == null || isNaN(setBetAmount) || setBetAmount < 1 || setBetAmount > playerCash) {
		    window.alert("Please enter a valid amount");
		}
		else {
			betAmount = setBetAmount;
			betAmount = parseInt(betAmount);
			playerCash = playerCash - betAmount;
			document.getElementById("playerCash").innerHTML = playerCash;
			alterPlayerCash(playerCash);
			fullStartGame();
		}
	}
	else {
		alert("You're out of cash!")
	}
}

function addPlayerCard() {
	pickedCard = Math.floor(Math.random() * cardsAndValues.length);
	console.log(pickedCard);
	var createCard = document.createElement("IMG");
	createCard.setAttribute("src", imagePrefix+cardsAndValues[pickedCard].card+imageSuffix);
	document.getElementById("cardLocationPlayer").appendChild(createCard);
	if (cardsAndValues[pickedCard].card == "HartenAas" || cardsAndValues[pickedCard].card == "KlaverAas" || cardsAndValues[pickedCard].card == "RuitenAas" || cardsAndValues[pickedCard].card == "SchoppenAas") {
		playerAce++;
	}
	playerPoints+=cardsAndValues[pickedCard].value;
  	cardsAndValues.splice(pickedCard, 1);
	if (playerPoints>21) {
		if (playerAce>0) {
			playerPoints-=10;
			playerAce--;
		}
		else {
			document.getElementById("firstHouseCard").setAttribute("class", "");
			alert("you lost!");
			gameOver("house");
		}
	}
	console.log(playerPoints);
}

function stand() {
	document.getElementById("firstHouseCard").setAttribute("class", "");
	if (housePoints>21) {
			if (houseAce>0) {
			housePoints-=10;
			houseAce--;
			if (housePoints<17) {
				stand();
			}
			if (housePoints>16) {
				comparePoints();
			}
		}
		else {
			alert("player wins")
			gameOver("player");
		}
			
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
			if (cardsAndValues[pickedCard].card == "HartenAas" || cardsAndValues[pickedCard].card == "KlaverAas" || cardsAndValues[pickedCard].card == "RuitenAas" || cardsAndValues[pickedCard].card == "SchoppenAas") {
				houseAce++;
			}
			housePoints+=cardsAndValues[pickedCard].value;
	  		cardsAndValues.splice(pickedCard, 1);
			stand();
		}
	}
}

function comparePoints() {
	if (housePoints>playerPoints) {
		alert("house wins!");
		gameOver("house");
	}
	else {
		if (housePoints<playerPoints) {
			alert("player wins!");
			gameOver("player");
		}
		else {
			alert("it's a tie.");
			gameOver("tie");
		}
	}
}

function gameOver(endingState) {
	document.getElementById("startGameButton").style.display = "inline";
	document.getElementById("hitButton").style.visibility = "hidden";
	document.getElementById("standButton").style.visibility = "hidden";
	playerAce=0;
	playerPoints=0;
	houseAce=0;
	housePoints=0;
	for (var i = 0; i < cardsAndValues.length; i++) {
		cardsAndValues.splice(0, 1);
	}
	if (endingState==="house") {

	}
	else {
		if (endingState==="tie") {
			playerCash = playerCash + betAmount;
		}
		else {
			if (endingState==="player") {
				playerCash = playerCash + betAmount + betAmount;
			}
			else {
				playerCash = playerCash + betAmount + betAmount + betAmount;
			}
			
		}
		
	}
	document.getElementById("playerCash").innerHTML = playerCash;
	betAmount = 0;
	alterPlayerCash(playerCash);
}

function openMenu() {
	document.getElementById("menu").style.display = "block";
	document.getElementById("menuButton").style.display = "none";
	
}

function closeMenu() {
	document.getElementById("menu").style.display = "none";
	document.getElementById("menuButton").style.display = "block";
	
}

function alterPlayerCash(playerCash) {

	

	function success(response){
		alert(response);
	};
	$.ajax({
		type: "POST",
		url: "cashControl.php",
		data: "playerCash=" + playerCash,
		success: success,
		dataType: "text"
	});
}

function giveMeMoney(){
	
}