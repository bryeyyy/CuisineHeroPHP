<?php 
include '../DB/cred.php';
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;
$food_id = isset($_SESSION['food_id'])? $_SESSION['food_id'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$sel = "SELECT * from like_log WHERE email='$email' AND food_id='$food_id'";
if($result = $con->query($sel)){
        $row = $result->fetch_assoc(); 
        if(isset($row['likes'])){
            echo '<button type="submit" class="btn like-btn liked" value="1"><img src="like.png"></button>';
        }
        else {
            echo '<button type="submit" class="btn like-btn" value="0"><img src="like.png"></button>';
    }
}
?>