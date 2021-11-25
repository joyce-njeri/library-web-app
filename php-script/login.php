<?php 
include '../connect.php';
session_start();
if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM user_login where username='".$username."' and password='".$password."'";
	$res = mysqli_query($con, $sql);
  	if (mysqli_num_rows($res) > 0) {

		$row = mysqli_fetch_array($res);
		if ($row) {
			
			$_SESSION["username"]=$row['username'];
			$_SESSION["profile"]=$row['profile'];
			

			# code...
			header("location:../library.php");
			
		}
		else{
			$msg="username: Nadia, and password: 1234";
			header("location:../login.php?msg=".$msg);
		}
	}
	else{
		$msg="username: Nadia, and password: 1234";
			header("location:../login.php?msg=".$msg);
	}
	
}
?>