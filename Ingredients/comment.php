<?php
session_start();
include '../DB/cred.php';
$food_id = isset($_SESSION['food_id'])? $_SESSION['food_id'] : null;
$con = mysqli_connect($server,$username,$password,$dbname);
$email = isset($_SESSION['email'])? $_SESSION['email']: null;
$comment = htmlspecialchars($_POST['comment']);
$qcomment = "INSERT INTO `comments`(`email`, `food_id`, `comment`) VALUES ('$email','$food_id','$comment')";
mysqli_query($con,$qcomment);
$_SESSION['rel']=1;
header('location: ingredients.php');
?>