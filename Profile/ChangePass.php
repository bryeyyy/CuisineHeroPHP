<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "food";
$pass = $_POST["changepassword"];
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$query = "UPDATE acc SET pass='$pass' WHERE email = '$email'";
mysqli_query($con,$query);
header('location:profile.php');
?>