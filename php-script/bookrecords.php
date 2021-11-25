<?php
include '../connect.php';
if (isset($_POST['save'])) {
$name = mysqli_real_escape_string($con,htmlspecialchars($_POST['name']));
  $name = addslashes($_POST['name']);
  $name = nl2br($name);

  $department = mysqli_real_escape_string($con,htmlspecialchars($_POST['department']));
  $department = addslashes($_POST['department']);
  $department = nl2br($department);

   $edition = mysqli_real_escape_string($con,htmlspecialchars($_POST['edition']));
  $edition = addslashes($_POST['edition']);
  $edition = nl2br($edition);

  $category = mysqli_real_escape_string($con,htmlspecialchars($_POST['category']));
  $category = addslashes($_POST['category']);
  $category = nl2br($category);

  $author = mysqli_real_escape_string($con,htmlspecialchars($_POST['author']));
  $author = addslashes($_POST['author']);
  $author = nl2br($author);

  $arrivaldate = mysqli_real_escape_string($con,htmlspecialchars($_POST['arrivaldate']));
  $arrivaldate = addslashes($_POST['arrivaldate']);
  $arrivaldate = nl2br($arrivaldate);

   $copies = mysqli_real_escape_string($con,htmlspecialchars($_POST['copies']));
  $copies = addslashes($_POST['copies']);
  $copies = nl2br($copies);

  $book_id=$arrivaldate.'-'.str_random(6);


  
  $sql="INSERT INTO books (  `name`,  `edition`, `author` , `department`,  `category`,  `copies`,  `arrival_date`,  `book_id`
) VALUES ('$name','$edition','$author', '$department', '$category', '$copies', '$arrivaldate', '$book_id')";
  if(mysqli_query($con, $sql)){
$msg="Records inserted successfully";
header("Location:../backend/index.php");
}
else
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  



}

?>