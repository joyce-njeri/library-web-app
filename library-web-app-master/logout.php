<?php 

session_start();
session_destroy();
// unset($_SESSION['userid']);

header("Location: index.php");

?>