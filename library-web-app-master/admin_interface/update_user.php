<?php
include("../php-script/data_class.php");

$userid=$_POST['adduserid'];
$addfirstname=$_POST['addfirstname'];
$addlastname=$_POST['addlastname'];
$addemail= $_POST['addemail'];
$addrole= $_POST['addrole'];

$obj=new data();
$obj->setconnection();
$obj->updateuserdata($userid, $addfirstname,$addlastname,$addemail, $addrole);
?>
