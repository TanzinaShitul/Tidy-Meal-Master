<?php

session_start();

include 'dbconnect.php';

$email = mysqli_real_escape_string($conn, $_POST['userEmail']);
$pswrd = mysqli_real_escape_string($conn, $_POST['usurePassword']);




$sql = "SELECT * FROM account where Email='$email' LIMIT 1";
$login_query_run = mysqli_query($conn, $sql);
if (mysqli_num_rows($login_query_run) > 0) {

	$row_array = mysqli_fetch_array($login_query_run);
	if (password_verify($pswrd, $row_array['Pass'])) {

		if ($row_array['verify_status'] == "1") {
			$_SESSION["ID"] = $row_array["ID"];
			$_SESSION["MG"] = $row_array["ManagerID"];
			$_SESSION["STUS"] = $row_array["ST"];
			header('location:member.php');
			exit(0);

		} else {
			echo '
			<script>
				alert("Please verify your Email Address to login.!");
				window.location.href = "index.php";
			</script>
			';
			exit(0);
		}
	} else {
		echo '
            <script>
                alert("Incorrect Password or Email");
                window.location.href = "index.php";
            </script>
        ';
		exit(0);
	}
} else {
	echo '
	<script>
		alert("Incorrect Email!");
		window.location.href = "index.php";
	</script>
	';
	exit(0);
}

//$conn->close();
?>