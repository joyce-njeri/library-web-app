<?php
include("../php-script/data_class.php");

$deletebookid=$_GET['deletebookid'];


$obj=new data();
$obj->setconnection();
$obj->deletebook($deletebookid);