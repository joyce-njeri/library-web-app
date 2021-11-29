<?php

include("data_class.php");

$addfirstname=$_POST['addfirstname'];
$addlastname=$_POST['addlastname'];
$role= $_POST['role'];
$addemail= $_POST['addemail'];
$addpass= $_POST['addpass'];


$obj=new data();
$obj->setconnection();
$obj->addnewuser($addfirstname,$addlastname,$role,$addemail,$addpass);
