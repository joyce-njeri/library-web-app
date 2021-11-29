<?php
include '../connect.php';
if (isset($_POST['save'])) {
$title = mysqli_real_escape_string($con,htmlspecialchars($_POST['title']));
  $title = addslashes($_POST['title']);
  $title = nl2br($title);

  $department = mysqli_real_escape_string($con,htmlspecialchars($_POST['department']));
  $department = addslashes($_POST['department']);
  $department = nl2br($department);


  $message = mysqli_real_escape_string($con,htmlspecialchars($_POST['message']));
  $message = addslashes($_POST['message']);
  $message = nl2br($message);



  
  $sql="INSERT INTO suggestion (`title`	,`department`,`message`) VALUES ('$title', '$department','$message' )";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../library.php");
}
else
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);



}

?>