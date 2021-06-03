<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "food";
$con = mysqli_connect($server,$username,$password,$dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$email = isset($_SESSION['email'])? $_SESSION['email'] : null;
$food_id = isset($_SESSION['food_id'])? $_SESSION['food_id'] : null;
$queryf = "SELECT * from food WHERE food_id='$food_id'";

$liked=$_POST['liked'];

if(isset($email)){
if(intval($liked) == 1){
    $sel = "INSERT INTO `like_log` (`id`, `email`, `liked`, `food_id`) VALUES (NULL, '$email', '1', '1');";
    mysqli_query($con,$sel);
    $result = $con->query($queryf);
    $row = $result->fetch_assoc();
    $likes = $row['likes'];
    $numlikes = intval($likes)+1;
    $sel_like = "UPDATE food SET likes='$numlikes' WHERE food_id = '1'";
    mysqli_query($con,$sel_like);
}
else{
    $sel = "DELETE FROM like_log WHERE email='$email'";
    mysqli_query($con,$sel);
    $result = $con->query($queryf);
    $row = $result->fetch_assoc();
    $likes = $row['likes'];
    $numlikes = intval($likes)-1;
    $sel_like = "UPDATE food SET likes='$numlikes' WHERE food_id = '1'";
    mysqli_query($con,$sel_like);
}
}
?>