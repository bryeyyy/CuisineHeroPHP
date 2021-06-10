<?php
session_start();
$author=$_POST['post1'];
$_SESSION['author']=$author;
header('location: ../Profile/Visit-Profile/profile-visit.php');
?>