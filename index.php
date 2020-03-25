<?php 
	session_unset();
?>

<!DOCTYPE html>
<html>
<head>
	<title>blackjack startpage</title>
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
	<div>
		<button id="loginScreenButton" onclick="document.getElementById('loginScreen').style.display='block', document.getElementById('loginScreenButton').style.display='none'" style="width:auto;">Log In</button>
		<br>
		<div id="loginScreen" style="display: none;">
			<form action="/accountLogin.php" method="post">
			    <div>
			      	<label for="name"><b>Username</b></label>
			      	<input type="text" placeholder="Enter Username" name="name" required>
			      	<br>
			      	<label for="pass"><b>Password</b></label>
			      	<input type="password" placeholder="Enter Password" name="pass" required>
			      	<br>
			    	<input type="submit" name="login" value="Log In" />
			    </div>
			    <div>
			      	<button type="button" onclick="document.getElementById('loginScreen').style.display='none', document.getElementById('loginScreenButton').style.display='block'">Cancel</button>
			    </div>
		  	</form>
		</div>

		<button id="accountCreationScreenButton" onclick="document.getElementById('accountCreationScreen').style.display='block', document.getElementById('accountCreationScreenButton').style.display='none'" style="width:auto;">Create account</button>

		<div id="accountCreationScreen" style="display: none;">
			<form action="/accounts.php" method="post">
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
			    	<input type="submit" name="createAccount" value="Create account" />
			    </div>

			    <div>
			      	<button type="button" onclick="document.getElementById('accountCreationScreen').style.display='none', document.getElementById('accountCreationScreenButton').style.display='block'">Cancel</button>
			    </div>
		  	</form>
		</div>


	</div>
</body>
</html>