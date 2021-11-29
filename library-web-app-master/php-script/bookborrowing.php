<?php
include '../connect.php';
if (isset($_POST['save'])) {
$book = mysqli_real_escape_string($con,htmlspecialchars($_POST['book']));
  $book = addslashes($_POST['book']);
  $book = nl2br($book);

  $user = mysqli_real_escape_string($con,htmlspecialchars($_POST['user']));
  $user = addslashes($_POST['user']);
  $user = nl2br($user);

  $issuedate = mysqli_real_escape_string($con,htmlspecialchars($_POST['issuedate']));
  $issuedate = addslashes($_POST['issuedate']);
  $issuedate = nl2br($issuedate);

  $returndate = mysqli_real_escape_string($con,htmlspecialchars($_POST['returndate']));
  $returndate = addslashes($_POST['returndate']);
  $returndate = nl2br($returndate);

  $borrowedcopies = mysqli_real_escape_string($con,htmlspecialchars($_POST['borrowedcopies']));
  $borrowedcopies = addslashes($_POST['borrowedcopies']);
  $borrowedcopies = nl2br($borrowedcopies);


  
  
  $sql="INSERT INTO borrow (  `book_id`, `user_id`, `date_out`, `return_date`, `copie`) VALUES ('$book','$user','$issuedate', '$returndate', '$borrowedcopies')";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../backend/index.php");
  }
    else
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  



}

?>