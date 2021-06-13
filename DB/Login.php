<?php 
session_start();
include 'cred.php';

//POST
$email=$_POST['LogEmail'];
$pw1=$_POST['LogPassword'];


$con = mysqli_connect($server,$username,$password,$dbname);

$ins = "SELECT * from acc where email ='$email' && pass='$pw1'";
$result = mysqli_query($con, $ins);
$idfier = mysqli_num_rows($result);

if($idfier==1){
    while ($NameRes = mysqli_fetch_array($result)){
    $_SESSION['firstname']=$NameRes['firstname'];
    $_SESSION['email']=$NameRes['email'];
    }
    header('location:../feed.php');
}
else{
    header('location:../index.php');
}
?>