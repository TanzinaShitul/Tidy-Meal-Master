<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="mycss/Reg.css" />
	<script src="myjs/reg.js"></script>

</head>

<body class="cls0">
	<div class="cls1">
		<div class="RegBlock">
			<center class="Reg">
				<h3>Tidy Meal Master</h3> Please Register
			</center>
			<form action="RegTm.php" method="post" name="reg_input" onsubmit="return Chk_Valid()">
				<input type="email" name="userEmail" value="" placeholder="Email.." id="email" onclick="Reform_email()">
				<span id="emailAlert" class="alert-msg" style="display: none;">Invalid email format</span>

				</input>

				<input type="text" name="userName" value="" placeholder="Full Name.." id="name" maxlength="30"
					onclick="Refrom_name()">
				</input>

				<input type="password" name="userPassword" value="" placeholder="Password.." id="password"
					maxlength="30" onclick="Reform_pass()">
				<img src="mycss/img/eye.png" width="20" height="20"
					style="position: absolute; transform: translateY(50%); margin-left: -1.5%;" class="toggle-password"
					onclick="togglePasswordVisibility(this)">
				</input>
				<span id="passwordMsg" class="alert-msg" style="display: none;">Password must be minimum 6
					characters</span>
				</br>
				<input type="password" name="confirmPassword" value="" placeholder="Confirm Password.." id="cpassword"
					maxlength="30" onclick="Reform_cpass()">
				<img src="mycss/img/eye.png" width="20" height="20"
					style="position: absolute; transform: translateY(50%); margin-left: -1.5%;" class="toggle-password"
					onclick="togglePasswordVisibility(this)">
				</input>
				</br>
				<input type="date" name="birthdate" id="bdate" onclick="Reform_date()">
				</input>
				</br>
				<select name="Gender" ID="gender" onclick="Reform_gender()">
					<option value="" disabled selected hidden>Select Your Gender.</option>
					<option style="color: black" value="Male">Male</option>
					<option style="color: black" value="Female">Female</option>
					<option style="color: black" value="Other">Other</option>
				</select>

				<input type="text" name="usermobile" value="" placeholder="Mobile.." id="mobile"
					onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="11"
					onclick="Reform_mobile()">
				</input>

				<button type="submit" id="continue">Submit</button>
			</form>

			<p>Already have an account?<a href="index.php">Login here</a></p>
		</div>

		<div class="cls4">
			<br />
			<center>All Right Preserved.</center>
		</div>

	</div>
</body>

</html>