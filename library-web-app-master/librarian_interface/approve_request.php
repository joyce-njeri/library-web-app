<?php

include("../php-script/data_class.php");

$book=$_GET['book'];
$userselect= $_GET['userselect'];
$days= $_GET['days'];
$request=$_GET['reqid'];
$getdate= date("d/m/Y");

$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setconnection();
$obj->issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$request);
