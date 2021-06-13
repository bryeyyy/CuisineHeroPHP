<?php
session_start();
include '../DB/cred.php';
$bio = substr($_POST['bio'],0,55);
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;
$con = mysqli_connect($server,$username,$password,$dbname);
$query = "UPDATE acc SET bio ='$bio' WHERE email = '$email'";
mysqli_query($con,$query);
header('location: profile.php');
?>