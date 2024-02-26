<?php
session_start();
$email = $_POST["userEmail"];
$pswrd = $_POST["userPassword"];
$name = $_POST['userName'];
$birthdate = date("m/d/Y", strtotime($_POST["birthdate"]));
$dateObj = DateTime::createFromFormat('m/d/Y', $birthdate);
$birthdate = $dateObj->format('Y/m/d');
$gender = $_POST["Gender"];
$phn = $_POST["usermobile"];
$verify_token = md5(rand());



include 'dbconnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_mail_to_verify($name, $email, $verify_token)
{
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPAuth = true;

	$mail->Host = "smtp.gmail.com";
	$mail->Username = "tanzinashitul@gmail.com";
	$mail->Password = "bczwmghojjmcvlqa";

	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom("tanzinashitul@gmail.com", $name);
	$mail->addAddress($email);

	$mail->isHTML(true);
	$mail->Subject = "Email Verification Form Tidy Meal Master";

	$email_template = "<h2> You Have Registered with Tidy Meal Master</h2>
		<h4>Verify your mail address to login with the below given link</h4>
		<a href='http://localhost/TidyMealMaster/verify-email.php?token=$verify_token'>Click me</a>";

	$mail->Body = $email_template;
	$mail->send();

}


$sql = "SELECT COUNT(*)as total FROM account";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row_array = $result->fetch_array();
	$LatID = $row_array['total'] + 1;

	$hashedPassword = password_hash($pswrd, PASSWORD_BCRYPT);

	$sql = "INSERT INTO account(ID,Email,Pass,Name,Birth,Mobile,Gender,Pro,verify_token,ST)
		 VALUES('$LatID','$email','$hashedPassword','$name','$birthdate','$phn','$gender','pro.jpg','$verify_token','none')";
	if ($conn->query($sql) === TRUE) {
		send_mail_to_verify($name, $email, $verify_token);
		$tm = 'chat' . $LatID;
		$sql = "create table " . $tm . "(
				MsgID int AUTO_INCREMENT primary key,
				ID int not null,
				Msg varchar(105) not null,
				Dat Date not null,
				FOREIGN KEY (ID) REFERENCES account(ID))";
		if ($conn->query($sql) === TRUE) {
			$tm = 'bal' . $LatID;
			$sql = "create table " . $tm . "(
					Dat date primary key,
					Amount int not null)";
			if ($conn->query($sql) === TRUE) {
				$_SESSION["ID"] = $LatID;
				$_SESSION["MG"] = "";
				$_SESSION["STUS"] = "none";
				echo '
				<script>
					alert("Registration Successfull.! Please verify your Email Address.");
					window.location.href = "index.php";
				</script>
				';
			} else {

				echo '
		<script>
			alert("' . $conn->error . '");
			window.location.href = "Reg.php";
		</script>
		';
			}
		} else {
			echo '
		<script>
			alert("' . $conn->error . '");
			window.location.href = "Reg.php";
		</script>
		';
		}
	} else {
		echo '
		<script>
			alert("' . $conn->error . '");
			window.location.href = "Reg.php";
		</script>
		';
	}
} else {
	echo '
		<script>
			alert("' . $conn->error . '");
			window.location.href = "Reg.php";
		</script>
		';
}

$conn->close();
?>