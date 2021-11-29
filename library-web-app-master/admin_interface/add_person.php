<?php

include("../php-script/data_class.php");

$addfirstname=$_POST['addfirstname'];
$addlastname=$_POST['addlastname'];
$addrole= $_POST['addrole'];
$addemail= $_POST['addemail'];
$addpassword= md5($_POST['addpassword']);


$obj=new data();
$obj->setconnection();
$obj->addnewuser($addfirstname,$addlastname,$addrole,$addemail,$addpassword);