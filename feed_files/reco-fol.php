<?php
include 'DB/cred.php';
$con = mysqli_connect($server,$username,$password,$dbname);
$email = isset($_SESSION['email'])? $_SESSION['email']:null;
$sel = "SELECT * FROM acc WHERE email !='$email' ORDER By followno Desc";
$flag=0;
if($result=$con->query($sel)){
    while ($row=$result->fetch_array()){
        if ($flag <=2){
        $author=$row['email'];
        $sel1 = "SELECT * from follow_log WHERE email='$email' AND author='$author'";
        $result1=$con->query($sel1);
        $row1=$result1->fetch_array();
        if(!isset($row1['author'])){
        echo '<a href="javascript:void(0)" class="link1" var="'.$author.'">
        <div class="personcard justify-content-center;" style="cursor: pointer;""> <!--per user ito na recommended-->
        <p class="usrnm2">'.$row['firstname'].' '.$row['lastname'].'</p>
        <div class="dp2">
            <img src="Profile/images/'.$row['dispic'].'">
        </div>
        </div></a><form method="post" action="feed_files/to-profile.php" name="redirect1" class="redirect1">
        <input type="hidden" class="post1" name="post1" value="">
        <input type="submit" style="display: none;">
        </form>';
        $flag++;
        }
    }}
}
?>