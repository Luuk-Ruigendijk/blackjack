<!DOCTYPE html>
<html>
<head>
	<title>blackjack startpage</title>
</head>
<body>
	<div>
		<button id="loginScreenButton" onclick="document.getElementById('loginScreen').style.display='block', document.getElementById('loginScreenButton').style.display='none'" style="width:auto;">Login</button>

		<br>

		<div id="loginScreen" style="display: none;">
			<span>YOU STILL NEED TO CHANGE WHERE THE FORM SENDS YOU!!!</span>
			<form action="/blackjack.php" method="post">
			    <div>
			      	<label for="name"><b>Username</b></label>
			      	<input type="text" placeholder="Enter Username" name="name" required>
			      	<br>
			      	<label for="pass"><b>Password</b></label>
			      	<input type="password" placeholder="Enter Password" name="pass" required>
			      	<br>
			    	<button type="submit">Login</button>
			    </div>

			    <div>
			      	<button type="button" onclick="document.getElementById('loginScreen').style.display='none', document.getElementById('loginScreenButton').style.display='block'">Cancel</button>
			    </div>
		  	</form>
		</div>

		<button id="accountCreationScreenButton" onclick="document.getElementById('accountCreationScreen').style.display='block', document.getElementById('accountCreationScreenButton').style.display='none'" style="width:auto;">Create account</button>

		<div id="accountCreationScreen" style="display: none;">
			<span>YOU STILL NEED TO CHANGE WHERE THE FORM SENDS YOU!!!</span>
			<form action="/accountCreation.php" method="post">
			    <div>
			      	<label for="name"><b>Username</b></label>
			      	<input type="text" placeholder="Enter Username" name="name" required>
			      	<br>
			      	<label for="pass"><b>Password</b></label>
			      	<input type="password" placeholder="Enter Password" name="pass" required>
			      	<br>
			      	<label for="cash"><b>Enter the amount of money you're willing to add</b></label>
			      	<input type="money" placeholder="Enter money" name="cash" required>
			      	<br>
			    	<button type="submit">Create account</button>
			    </div>

			    <div>
			      	<button type="button" onclick="document.getElementById('accountCreationScreen').style.display='none', document.getElementById('accountCreationScreenButton').style.display='block'">Cancel</button>
			    </div>
		  	</form>
		</div>


	</div>
</body>
</html>