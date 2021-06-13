<?php 
session_start();
include 'cred.php';

//POST
$Fname=$_POST['firstname'];
$Lname=$_POST['lastname'];
$email=$_POST['email'];
$pw1=$_POST['password'];


$con = mysqli_connect($server,$username,$password,$dbname);

$ins = "SELECT * from acc where email ='$email'";
$result = mysqli_query($con, $ins);
$idfier = mysqli_num_rows($result);
if($idfier==1){
    echo "Email is already taken.";
}
else{
    $signup = "INSERT into acc (firstname,lastname,pass,email,banner,dispic,followno,recpno) values ('$Fname','$Lname','$pw1','$email','defaultban.png','defaultdp.png','0','0')";
    mysqli_query($con, $signup);
    $ins = "SELECT * from acc where email ='$email' && pass='$pw1'";
    $result = mysqli_query($con, $ins);
    while ($NameRes = mysqli_fetch_array($result)){
    $_SESSION['firstname']=$NameRes['firstname'];
    $_SESSION['email']=$NameRes['email'];
    }
    header('location:../feed.php');
}
?>