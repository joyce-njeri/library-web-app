<?php

include("../php-script/data_class.php");

$addfirstname=$_POST['addfirstname'];
$addlastname=$_POST['addlastname'];
$addemail= $_POST['addemail'];
$addpassword= $_POST['addpassword'];
$addrole= $_POST['addrole'];


$obj=new data();
$obj->setconnection();
$obj->addnewuser($addfirstname,$addlastname,$addemail,$addpassword,$addrole);