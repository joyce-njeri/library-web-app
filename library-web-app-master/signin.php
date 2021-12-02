<?php

include './php-script/connect.php';

session_start();

error_reporting(0);

if (isset($_SESSION['email'])) {
	header("Location: ./admin_interface/dashboard.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		$logtype=$row['type'];

		if ($logtype == 'Admin')
			header("Location: ./admin_interface/dashboard.php");
		else if ($logtype == 'Librarian')
			header("Location: ./librarian_interface/dashboard.php");
		else if ($logtype == 'Faculty')
			header("Location: ./faculty_interface/dashboard.php");
		else if ($logtype == 'Student')
			header("Location: ./student_interface/dashboard.php");

	} else {
		echo "<script>alert('Woops! Email or password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="./css/style.css">

	<title>Sign In</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign In</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="signup.php">Register Here</a>.</p>
		</form>
	</div>
</body>

</html>