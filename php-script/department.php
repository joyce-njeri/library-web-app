<?php
include '../connect.php';
if (isset($_POST['save'])) {
$department= mysqli_real_escape_string($con,htmlspecialchars($_POST['department']));
  $department = addslashes($_POST['department']);
  $department = nl2br($department);




  
  
  $sql="INSERT INTO department (`name`) VALUES ('$department')";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../backend/index.php");

else
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }



}

?>