<?php

include './php-script/connect.php';

// session_start();

// error_reporting(0);

// if (isset($_SESSION['email'])) {
// 	header("Location: ./admin_interface/dashboard.php");
// }

if (
    isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset") && !isset($_POST["action"])
) {
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");

    $query = mysqli_query(
        $conn,
        "SELECT * FROM `password_reset_temp` WHERE `key`=$key and `email`=$email;"
    );

    $row = mysqli_num_rows($query);
    $error = "";
    if ($row == "") {
        echo "<script>alert('The link is invalid/expired. Either you did not copy the correct link
                from the email, or you have already used the key in which case it is 
                deactivated.')</script>";
    } else {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {
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
                        <div class="input-group" style="margin-top:20px;">
                            <input type="password" placeholder="Password" name="pass1" required>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Confirm Password" name="pass2" required>
                        </div>
                        <div class="input-group" style="margin-top: 20px;">
                            <button name="submit" class="btn">Reset Password</button>
                        </div>
                    </form>
                </div>
            </body>

            </html>

<?php

        } else {
            echo "<script>alert('The link is expired. You are trying to use the expired link which 
    as valid only 24 hours (1 days after request).')</script>";
        }
    }
    if ($error != "") {
        echo "<script>alert('$error')</script>";
    }
} // isset email key validate end


if (
    isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"] == "update")
) {
    $error = "";
    $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1 != $pass2) {
        $error = "Password do not match, both password should be same.";
    }

    if ($error != "") {
        echo "<script>alert('$error')</script>";
    } else {
        $pass1 = md5($pass1);
        mysqli_query(
            $conn,
            "UPDATE `userdata` SET `password`='" . $pass1 . "', `trn_date`='" . $curDate . "' 
        WHERE `email`='" . $email . "';"
        );

        mysqli_query($conn, "DELETE FROM `password_reset_temp` WHERE `email`='" . $email . "';");
        echo "<script>alert('Congratulations! Your password has been updated successfully.')</script>";
    }
}
?>