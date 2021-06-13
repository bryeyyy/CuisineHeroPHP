<?php
include '../../DB/cred.php';
$email = isset($_SESSION['author'])? $_SESSION['author'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$query = "SELECT * FROM follow_log WHERE email = '$email' ORDER By id Desc";
if ($result = $con->query($query)){
while($row = $result->fetch_assoc()){
    $follow = $row['author'];
    $queryfollow = "SELECT * FROM acc WHERE email='$follow'";
    $result1 = $con->query($queryfollow);
        while($row1 = $result1->fetch_array()){
            $email1 = $row1['email'];
            echo '<div class="card following col-12 col-md-4">
            <a href="javascript:void(0)" class="link1" var="'.$row1['email'].'">
            <div class="dp">
            <img src="../images/'.$row1['dispic'].'">
            </div>
            <div class="usrnm">
            <p>'.$row1['firstname'].' '.$row1['lastname'].'</div></a></div>
            <form method="post" action="../../feed_files/to-profile.php" name="redirect1" class="redirect1">
            <input type="hidden" class="post1" name="post1" value="">
            <input type="submit" style="display: none;">
            </form>';
            }
}
}
?>