<?php
//addserver_page.php
include("../php-script/data_class.php");

$id= mysqli_real_escape_string($conn,$_POST['bookid']);
$bookname= mysqli_real_escape_string($conn,$_POST['bookname']);
$bookdetail=mysqli_real_escape_string($conn,$_POST['bookdetail']);
$bookauthor=mysqli_real_escape_string($conn,$_POST['bookauthor']);
$bookpub=mysqli_real_escape_string($conn,$_POST['bookpub']);
$branch=mysqli_real_escape_string($conn,$_POST['branch']);
$bookprice=mysqli_real_escape_string($conn,$_POST['bookprice']);
$bookquantity=mysqli_real_escape_string($conn,$_POST['bookquantity']);

if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"../uploads/" . $_FILES["bookphoto"]["name"])) {

    $bookpic=$_FILES["bookphoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->updatebook($id,$bookpic,$bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquantity);
  } 
  else {
     echo "File not uploaded";
  }