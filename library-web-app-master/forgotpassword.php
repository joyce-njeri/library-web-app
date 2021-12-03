<?php

include './php-script/connect.php';

// error_reporting(0);

// session_start();

// if (isset($_SESSION['email'])) {
// 	header("Location: ./admin_interface/dashboard.php");
// }

if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
	$email = $_POST["email"];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);

	if (!$email) {
		echo "<script>alert('Invalid email address please type a valid email address!')</script>";
	} else {
		$sel_query = "SELECT * FROM `userdata` WHERE email='" . $email . "'";
		$results = mysqli_query($conn, $sel_query);
		$row = mysqli_fetch_assoc($results);
		$error = "";
		if ($row == "") {
			$error = "No user is registered with this email address!";
		}
	}

	if ($error != "") {
		echo "<script>alert('No user is registered with this email address!')</script>";
		header("Location: forgotpassword.php");
	} else {
		$expFormat = mktime(
			date("H"),
			date("i"),
			date("s"),
			date("m"),
			date("d") + 1,
			date("Y")
		);
		$expDate = date("Y-m-d H:i:s", $expFormat);
		$token = md5($email);
		$addKey = substr(uniqid(rand(), 1), 3, 10);
		$token = $token . $addKey;

		// Insert Temp Table
		mysqli_query(
			$conn,
			"INSERT INTO `password_reset_temp` (`email`, `token`, `expDate`)
			VALUES ('" . $email . "', '" . $token . "', '" . $expDate . "');"
		);

		header("Location: resetpassword.php?email=$email");
	}
} else {
?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="./css/style.css">

		<title>Forgot Password</title>
	</head>

	<body>
		<div class="container">
			<form action="" method="POST" class="login-email" name="reset">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;margin-top: 20px;">Forgot Password</p>
				<div class="input-group" style="margin-top: 40px;">
					<input type="email" placeholder="Please enter your email" name="email" required>
				</div>
				<div class="input-group" style="margin-top: 40px;">
					<button name="submit" class="btn">Submit</button>
				</div>
			</form>
		</div>

	</body>

	</html>
<?php } ?>