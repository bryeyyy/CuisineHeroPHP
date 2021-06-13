<?php 
include '../../DB/cred.php';
$email = isset($_SESSION['author'])? $_SESSION['author'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$query = "SELECT * FROM acc WHERE email = '$email'";

if ($result = $con->query($query)){
    $row = mysqli_fetch_array($result);
    echo '<div class="container-fluid"><div class="row"><div class="col-12 picban">';
    echo "<img id='picbanner'src='../images/".$row['banner']."'>";//Banner
    echo '</div>
        <div class="col-12 dispic">';
    echo "<img src='../images/".$row['dispic']."'>";//DP
    echo '</div><h3 class="col-12 profile-name">';
    echo ''.$row["firstname"].' '.$row["lastname"].'';//Namaewa
    echo '</h3><div class="row accnos">
        <h5 class="col-6 col-md-12 bud">
        '.$row['followno'].' Followers</h5>
        <h5 class="col-6 col-md-12 recp">
        '.$row['recpno'].' Recipe</h5>
        <div class="biocon col-12"><div id="bio">'.$row["bio"].'</div></div> 
        </div>';//bio
}
?>