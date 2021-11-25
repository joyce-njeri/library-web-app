<?php
include '../connect.php';
if (isset($_POST['save'])) {
$name = mysqli_real_escape_string($con,htmlspecialchars($_POST['name']));
  $name = addslashes($_POST['name']);
  $name = nl2br($name);

  $location = mysqli_real_escape_string($con,htmlspecialchars($_POST['location']));
  $location = addslashes($_POST['location']);
  $location = nl2br($location);

  $organiser = mysqli_real_escape_string($con,htmlspecialchars($_POST['organiser']));
  $organiser = addslashes($_POST['organiser']);
  $organiser = nl2br($organiser);

  $date = mysqli_real_escape_string($con,htmlspecialchars($_POST['date']));
  $date = addslashes($_POST['date']);
  $date = nl2br($date);

  $department = mysqli_real_escape_string($con,htmlspecialchars($_POST['department']));
  $department = addslashes($_POST['department']);
  $department = nl2br($department);


  

  $sql="INSERT INTO event ( `name`  `place` `organizer` `department`  `date`) VALUES ('$name','$location','$organiser', '$department', '$date')";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../backend/index.php");
}
else
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  



}

?>