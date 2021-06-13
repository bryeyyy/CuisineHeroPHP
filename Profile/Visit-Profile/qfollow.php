<?php 
include '../../DB/cred.php';
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;
$author = isset($_SESSION['author'])? $_SESSION['author'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$sel = "SELECT * from follow_log WHERE email='$email' AND author='$author'";
if($result = $con->query($sel)){
        $row = $result->fetch_assoc(); 
        if(isset($row['id'])){
            echo '<button type="button" class="btn follow-btn followed" value="1"><div>Followed</div></button>';
        }
        else {
            echo '<button type="button" class="btn follow-btn" value="0"><div>Follow</div></button>';
    }
}
?>