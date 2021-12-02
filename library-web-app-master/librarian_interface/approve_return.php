<?php

include("../php-script/data_class.php");

$id=$_GET['returnid'];
// $book=$_GET['book'];
// $userselect= $_GET['userselect'];
// $days= $_GET['days'];
// $request=$_GET['reqid'];
// $getdate= date("d/m/Y");

$obj=new data();
$obj->setconnection();
$obj->returnbookapprove($id);