<?php

include("../php-script/data_class.php");

// $userid=$_GET['userlogid'];
$issueid=$_GET['returnid'];

$obj=new data();
$obj->setconnection();
$obj->returnbook($issueid);

?>