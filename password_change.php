
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Set New Password Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mycss/login.css" />
    <script src="myjs/change_pass.js"></script>
    <script src="myjs/login.js"></script>


</head>

<body class="cls0">
    <div class="login-block">
        <center class="lgin">
            <h3>Tidy Meal Master</h3> Set New Password
        </center>

        <form action="password_reset_code.php" method="post" name="change_pass_input" onsubmit="return Chk_Valid()">
            <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])) {
                echo $_GET['token'];
            } ?>">
            <div class="email-container">
                <input type="text" name="email" required value="<?php if (isset($_GET['email'])) {
                    echo $_GET['email'];
                } ?>" placeholder="Email" maxlength="30">
                </input>
            </div>
            <div class="password-container">
                <input type="password" name="newPassword" required value="" placeholder="New Password.."
                    id="newpassword" maxlength="30" onclick="Reform1()">
                <img src="mycss/img/eye.png" width="20" height="20"
                    style="position: absolute; transform: translateY(50%); margin-left: -1.5%;" class="toggle-password"
                    onclick="togglePasswordVisibility(this)">
                </input>
            </div>
            <div class="password-container">
                <input type="password" name="confirmPassword" required value="" placeholder="Confirm Password.."
                    id="confirmpassword" maxlength="30" onclick="Reform2()">
                <img src="mycss/img/eye.png" width="20" height="20"
                    style="position: absolute; transform: translateY(50%); margin-left: -1.5%;" class="toggle-password"
                    onclick="togglePasswordVisibility(this)">
                </input>
            </div>
            </br>
            <button type="submit" name="password_update">Update Password</button>
        </form>

    </div>
    <div class="cls2">
			<br />
			<center>All Right Preserved.</center>
		</div>

</body>

</html>