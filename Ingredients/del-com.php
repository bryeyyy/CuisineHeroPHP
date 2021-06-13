<?php
session_start();
include '../DB/cred.php';
$id = $_POST['id'];
$con = mysqli_connect($server,$username,$password,$dbname);
$sel = "DELETE FROM comments WHERE id='$id'";
mysqli_query($con,$sel);
$_SESSION['rel']=1;
header('location: ingredients.php');
?>