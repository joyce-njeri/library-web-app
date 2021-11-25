<?php
include '../connect.php';
if (isset($_POST['save'])) {
$name = mysqli_real_escape_string($con,htmlspecialchars($_POST['name']));
  $name = addslashes($_POST['name']);
  $name = nl2br($name);

  $idnumber = mysqli_real_escape_string($con,htmlspecialchars($_POST['idnumber']));
  $idnumber = addslashes($_POST['idnumber']);
  $idnumber = nl2br($idnumber);

  $phone = mysqli_real_escape_string($con,htmlspecialchars($_POST['phone']));
  $phone = addslashes($_POST['phone']);
  $phone = nl2br($phone);

  $email = mysqli_real_escape_string($con,htmlspecialchars($_POST['email']));
  $email = addslashes($_POST['email']);
  $email = nl2br($email);

  

  
  
  $sql="INSERT INTO users (`names`,`id_number`,`phone`, `email`) VALUES ('$name','$idnumber','$phone', '$email')";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../backend/index.php");
}
else
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  



}

?>