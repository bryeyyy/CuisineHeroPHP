<?php
session_start();
$food_id=$_POST['post'];
$_SESSION['food_id']=$food_id;
header('location: ../Ingredients/ingredients.php');
?>