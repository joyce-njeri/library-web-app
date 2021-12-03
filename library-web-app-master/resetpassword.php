<?php

include './php-script/connect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) {
    header("Location: ./admin_interface/dashboard.php");
}

if (isset($_POST['submit'])) {

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");

    if ($password == $cpassword) {
        $sql = "SELECT * FROM userdata WHERE email='$email'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            mysqli_query(
                $conn,
                "UPDATE `userdata` SET `password`='" . $password . "', `trn_date`='" . $curDate . "' 
                WHERE `email`='" . $email . "';"
            );

            $sql = "DELETE FROM password_reset_temp WHERE email='$email'";
            $result1 = mysqli_query($conn, $sql);

            $sql = "UPDATE userdata SET password='$password', trn_date='$curDate' WHERE email='$email'";
            $result1 = mysqli_query($conn, $sql);

            if ($result1) {
                echo "<script>alert('Congratulations! Your password has been updated successfully.')</script>";
                header("Location: signin.php");
            }
        }
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

    <title>Reset Password</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Reset Password</p>
            <div class="input-group">
                <div class="input-group">
                    <input type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Reset Password</button>
                </div>
        </form>
    </div>
</body>

</html>