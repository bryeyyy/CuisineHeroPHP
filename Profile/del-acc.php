<?php
session_start();
include '../DB/cred.php';
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;
$con = mysqli_connect($server,$username,$password,$dbname);
$query = "DELETE FROM acc WHERE email = '$email'";
mysqli_query($con,$query);
session_destroy();
header('location:../index.php');

?>