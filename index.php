<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="mycss/login.css" />
	<script src="myjs/login.js"></script>
</head>

<body class="cls0">

	<div class="cls">

		<div class="Empty"></div>

		<div class="login-block">

			<center class="lgin">
				<h3>Tidy Meal Master</h3> Please Login
			</center>

			<form action="Login.php" method="post" name="login_input" onsubmit="return Chk_Valid()">
				<input type="email" name="userEmail" value="" placeholder="Email.." id="email" onclick="Reform1()">
				</input>
				<input type="password" name="usurePassword" value="" placeholder="Password.." id="password"
					onclick="Reform2()" maxlength="30">

				<img src="mycss/img/eye.png" width="20"
					height="20" style="position: absolute; transform: translateY(50%); margin-left: -1.5%;"
					class="toggle-password" onclick="togglePasswordVisibility(this)">
				</input>
				</br>
				<button type="submit" id="login">Login</button>
			</form>
			<div class="flex-container">
				<button type="button" class="breg" onclick="document.location.href='Reg.php'"
					id="register">Register</button>
				<button type="button" class="bforgot" onclick="document.location.href='password_reset.php'"
					id="forgot">Forgot password</button>
			</div>
		</div>

	
		<div class="cls2">
			<br />
			<center>All Right Preserved.</center>
		</div>
	</div>
</body>

</html>