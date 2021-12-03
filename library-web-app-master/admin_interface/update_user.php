<?php
include("../php-script/data_class.php");

$userid = mysqli_real_escape_string($conn,$_POST['adduserid']);
$addfirstname=mysqli_real_escape_string($conn,$_POST['addfirstname']);
$addlastname=mysqli_real_escape_string($conn,$_POST['addlastname']);
$addemail= mysqli_real_escape_string($conn,$_POST['addemail']);
$addrole= mysqli_real_escape_string($conn,$_POST['addrole']);

$obj=new data();
$obj->setconnection();
$obj->updateuserdata($userid, $addfirstname,$addlastname,$addemail, $addrole);
?>
