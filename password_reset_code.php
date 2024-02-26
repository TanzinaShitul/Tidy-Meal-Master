<?php
session_start();
include 'dbconnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_password_reset($get_name, $get_email, $token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->Username = "tanzinashitul@gmail.com";
    $mail->Password = "bczwmghojjmcvlqa";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->setFrom("tanzinashitul@gmail.com", $get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Email Verification Form Tidy Meal Master";

    $email_template =
        "<h2>Hello $get_name</h2>
    <h3> You are received this email because we received a password reset request from your account</h3>
    <br/><br/>   
		<a href='http://localhost/TidyMealMaster/password_change.php?token=$token&email=$get_email'>Click me</a>";

    $mail->Body = $email_template;
    $mail->send();
}


if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $token = md5(rand());

    $check_email = "SELECT * FROM account WHERE Email='$email' LIMIT 1";

    $check_email_result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_result) > 0) {
        $row = mysqli_fetch_array($check_email_result);
        $get_name = $row['Name'];
        $get_email = $row['Email'];

        $update_token = "UPDATE account SET verify_token='$token' WHERE Email='$get_email' LIMIT 1";
        $update_token_result = mysqli_query($conn, $update_token);

        if ($update_token_result) {
            send_password_reset($get_name, $get_email, $token);
            echo '
            <script>
                alert("Please Check Email To Reset Password");
                window.location.href = "index.php";
            </script>
            ';
        } else {
            echo '
            <script>
            alert("' . $conn->error . '");
                window.location.href = "password_reset.php";
            </script>
            ';
        }

    } else {
        echo '
				<script>
					alert("Email Not Found");
					window.location.href = "password_reset.php";
				</script>
				';
    }
}

if (isset($_POST['password_update'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $conf_pass = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);

    if (!empty($token)) {
        $check_token = "SELECT * FROM account WHERE verify_token='$token' LIMIT 1";
        $check_token_result = mysqli_query($conn, $check_token);

        if (mysqli_num_rows($check_token_result) > 0) {
            if ($new_pass == $conf_pass) {
                $hashedPassword = password_hash($new_pass, PASSWORD_BCRYPT);
                $update_password = "UPDATE account SET Pass = '$hashedPassword' WHERE verify_token='$token' LIMIT 1";
                $update_password_result = mysqli_query($conn, $update_password);

                if ($update_password_result) {
                    $new_token = md5(rand());
                    $update_token = "UPDATE account SET verify_token = '$new_token' WHERE verify_token='$token' LIMIT 1";
                    $update_token_result = mysqli_query($conn, $update_token);
                    echo '
        <script>
    			alert("New Password Update Successfully");
    			window.location.href = "index.php";
    		</script>
    		';
                } else {
                    echo '
        <script>
    			alert("Did not update password. Something went wrong!");
    			window.location.href = "password_change.php";
    		</script>
    		';
                }
            } else {
                echo '
        <script>
    			alert("Password and Confirm Password not match!");
    			window.location.href = "password_change.php";
    		</script>
    		';
            }
        } else {
            echo '
        <script>
    			alert("Invalide Token!");
    			window.location.href = "password_change.php";
    		</script>
    		';
        }
    } else {
        echo '
        <script>
    			alert("No Token Available! Please check mail");
    			window.location.href = "password_change.php";
    		</script>
    		';
    }
}

?>