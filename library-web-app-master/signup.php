<?php

include './php-script/connect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) {
    header("Location: ./admin_interface/dashboard.php");
}

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM userdata WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO userdata (firstname, lastname, email, password, type)
					VALUES ('$firstname', '$lastname','$email', '$password','$type')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // echo "<script>alert('User Registration Completed.')</script>";
                if ($type == 'Admin')
                    header("Location: ./admin_interface/dashboard.php");
                else if ($type == 'Librarian')
                    header("Location: ./librarian_interface/dashboard.php");
                else if ($type == 'Faculty')
                    header("Location: ./faculty_interface/dashboard.php");
                else 
                    header("Location: ./student_interface/dashboard.php");
            } else {
                echo "<script>alert('Woops! Something Went Wrong.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
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

    <title>Sign Up</title>
</head>

<script >
    function validatepassw(){
        // colllect the password in js variables
        var pw = document.getElementById("psw").value;
        var cpw = document.getElementById("cpsw").value; 

        //minimum password length validation &character check

    let pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        if (pattern.test(pw)) {
            document.getElementById("msg1").innerHTML = "**Your password should have atleast one upper case letter, one lower case letter and one special character";
        return false;
    }
}

        else {  
            alert ("Your password is valid");  
        
    }       

</script>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email" onsubmit ="return validateForm()">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>" required>
            </div>
            <div class="input-group">
                <input list="roles" placeholder="Role" name="type" value="<?php echo $type; ?>" required /></label>
                <datalist id="roles">
                    <option value="Student">
                    <option value="Faculty">
                    <option value="Librarian">
                    <option value="Admin">
                </datalist>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" id="psw" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                <br>
                <span id="msg1" style = "color:red"></span>
                <br>
            </div>
            <div class="input-group">
                <input type="password" id="cpsw" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                <br>
                <span id="msg2" style = "color:red"></span>
                <br>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="signin.php">Login Here</a>.</p>
        </form>
    </div>
</body>


    

</html>