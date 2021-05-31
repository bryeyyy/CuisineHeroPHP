<?php 
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "food";
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$query = "SELECT * FROM acc WHERE email = '$email'";

if ($result = $con->query($query)){
    $row = mysqli_fetch_array($result);
    echo '<div class="col-12 picban">';
    echo "<img id='picbanner'src='images/".$row['banner']."'>";
    echo '</div>
        <div class="col-12 dispic">';
    $result = $con->query($query);
    $row = mysqli_fetch_array($result);
    echo "<img src='images/".$row['dispic']."'>";
    echo '</div>';
}
?>