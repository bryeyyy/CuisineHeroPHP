<?php
session_start();
include '../../DB/cred.php';
$con = mysqli_connect($server,$username,$password,$dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$email = isset($_SESSION['email'])? $_SESSION['email'] : null;
$author = isset($_SESSION['author'])? $_SESSION['author'] : null;
$queryacc = "SELECT * from acc WHERE email='$author'";

$followed=$_POST['followed'];

if(isset($email)){
if(intval($followed) == 1){
    $sel = "INSERT INTO `follow_log` (`email`,`author`) VALUES ('$email','$author');";
    mysqli_query($con,$sel);
    $result = $con->query($queryacc);
    $row = $result->fetch_assoc();
    $follows = $row['followno'];
    $numfollow = intval($follows)+1;
    $sel_follow = "UPDATE acc SET followno='$numfollow' WHERE email = '$author'";
    mysqli_query($con,$sel_follow);
}
else{
    $sel = "DELETE FROM follow_log WHERE email='$email' AND author = '$author'";
    mysqli_query($con,$sel);
    $result = $con->query($queryacc);
    $row = $result->fetch_assoc();
    $follows=$row['followno'];
    $numfollow = intval($follows)-1;
    $sel_follow = "UPDATE acc SET followno='$numfollow' WHERE email = '$author'";
    mysqli_query($con,$sel_follow);
}
}
?>