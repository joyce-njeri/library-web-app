<?php

include("../php-script/data_class.php");

$addfirstname=$_POST['addfirstname'];
$addfirstname = filter_var($addfirstname, FILTER_SANITIZE_STRING);
$addlastname=$_POST['addlastname'];
$addlastname = filter_var($addlastname, FILTER_SANITIZE_STRING);
$addemail= $_POST['addemail'];
// Remove all illegal characters from email
$addemail = filter_var($addemail, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (!filter_var($addemail, FILTER_VALIDATE_EMAIL) === false) {
    echo ("$addemail is a valid email address");
} else {
    echo "<script>alert('$addemail is not a valid email address.')</script>";
}
$addpassword= $_POST['addpassword'];
$addrole= $_POST['addrole'];


$obj=new data();
$obj->setconnection();
$obj->addnewuser($addfirstname,$addlastname,$addemail,$addpassword,$addrole);