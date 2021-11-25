<?php
include '../connect.php';
if (isset($_POST['save'])) {
$category= mysqli_real_escape_string($con,htmlspecialchars($_POST['category']));
  $category = addslashes($_POST['category']);
  $category = nl2br($category);




  
  
  $sql="INSERT INTO category (`category`) VALUES ('$category')";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../backend/index.php");

else
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }



}

?>