<?php

include './php-script/connect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) {
    header("Location: ./admin_interface/dashboard.php");
}

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $type = $_POST['type'];

     $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    if (empty($firstname)) { array_push($errors, "First name is required"); }
    if (empty($lastname)) { array_push($errors, "Last name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if ($password != $cpassword) {
            array_push($errors, "The two passwords do not match");
          }

    $sql = "SELECT * FROM userdata WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if($user){
        if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }

    }


    if ($password == $cpassword) {
        $sql = "SELECT * FROM userdata WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $password = md5($password)
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

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
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
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="signin.php">Login Here</a>.</p>
        </form>
    </div>
</body>

</html>