<?php
//addserver_page.php
include("../php-script/data_class.php");



$bookname=$_POST['bookname'];
$bookname = filter_var($bookname, FILTER_SANITIZE_STRING);
$bookdetail=$_POST['bookdetail'];
$bookdetail = filter_var($bookdetail, FILTER_SANITIZE_STRING);
$bookauthor=$_POST['bookauthor'];
$bookauthor = filter_var($bookauthor, FILTER_SANITIZE_STRING);
$bookpub=$_POST['bookpub'];
$branch=$_POST['branch'];
$bookbranch = filter_var($bookbranch, FILTER_SANITIZE_STRING);
$bookprice=$_POST['bookprice'];
if (!filter_var($bookprice, FILTER_VALIDATE_INT) === false) {
  echo("Price is valid");
} else {
  echo "<script>alert('Price is not valid.')</script>";
  
}
$bookquantity=$_POST['bookquantity'];
if (!filter_var($bookquantity, FILTER_VALIDATE_INT) === false) {
  echo("Quantity is valid");
} else {
  echo "<script>alert('Quantity is not valid.')</script>";
}



if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"../uploads/" . $_FILES["bookphoto"]["name"])) {

    $bookpic=$_FILES["bookphoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->addbook($bookpic,$bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquantity);
  } 
  else {
     echo "<script>alert('File not uploaded.')</script>";
  }