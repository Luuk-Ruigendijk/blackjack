<?php ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>	
<body>
		<div id="menuLocation">
			<button id="menuButton" onclick="openMenu()">open menu</button>
			<div id="menu" style="display: none;">
				<button onclick="closeMenu()">close menu</button>
				<a href="index.php">log out</a>
			</div>
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

