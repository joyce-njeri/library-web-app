<?php

include("../php-script/data_class.php");

$book=mysqli_real_escape_string($conn,$_POST['book']);
$userselect= mysqli_real_escape_string($conn,$_POST['userselect']);
$getdate= date("d/m/Y");
$days= $_POST['days'];

$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setconnection();
$obj->issuebook($book,$userselect,$days,$getdate,$returnDate);
