<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>	
<body>
	<?php
		print_r($_COOKIE["login"]);
	?>

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
				<p id="playerCash"><?php echo($_COOKIE["cash"]); ?></p>
			</div>
		</div>
		<script type="text/javascript">
			playerUserName = '<?php echo($_COOKIE["login"]); ?>'
		</script>
		<script type="text/javascript" src="script.js"></script>
	
</body>
</html>