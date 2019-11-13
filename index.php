<?php ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>	
<body>
	
		<div id="scoreboard">
			
		</div>
		<div id="playAreaHouse">
			<div id="cardLocationHouse"></div>
		</div>
		<div id="playAreaPlayer">
			<div id="cardLocationPlayer"></div>
			<div id="buttonLocationPlayer">
				<button id="startGameButton" onclick="startGame()">New Game</button>
				<button id="hitButton" onclick="addPlayerCard()">Hit</button>
				<button id="standButton" onclick="stand()">Stand</button>
				
			</div>
			<div id="playerCashLocation">
				<p id="playerCash"></p>
			</div>
		</div>
	
	<script type="text/javascript" src="script.js"></script>
</body>
</html>
