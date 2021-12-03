<?php

include("../php-script/data_class.php");

$addfirstname= mysqli_real_escape_string($conn,$_POST['addfirstname']);
$addlastname=mysqli_real_escape_string($conn,$_POST['addlastname']);
$addemail= mysqli_real_escape_string($conn,$_POST['addemail']);
$addpassword= mysqli_real_escape_string($conn,$_POST['addpassword']);
$addrole= mysqli_real_escape_string($conn,$_POST['addrole']);




$obj=new data();
$obj->setconnection();
$obj->addnewuser($addfirstname,$addlastname,$addemail,$addpassword,$addrole);