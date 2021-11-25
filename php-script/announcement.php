<?php
include '../connect.php';
if (isset($_POST['save'])) {
$title = mysqli_real_escape_string($con,htmlspecialchars($_POST['title']));
  $title = addslashes($_POST['title']);
  $title = nl2br($title);

  $details = mysqli_real_escape_string($con,htmlspecialchars($_POST['details']));
  $details = addslashes($_POST['details']);
  $details = nl2br($details);



  
  $sql="INSERT INTO announce (`title`,`details`) VALUES ('$title', '$details')";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../library.php");
}
	else
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);



}

?>