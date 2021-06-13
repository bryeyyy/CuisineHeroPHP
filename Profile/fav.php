<?php
include '../DB/cred.php';
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$query = "SELECT * FROM like_log WHERE email = '$email' ORDER By id Desc";
if ($result = $con->query($query)){
while($row = $result->fetch_assoc()){
    $food_id = $row['food_id'];
    $queryfav = "SELECT * FROM food WHERE food_id='$food_id'";
    $result1 = $con->query($queryfav);
        while($row1 = $result1->fetch_array()){
            $email1 = $row1['author'];
            echo '<div class="card col-12 col-md-4">
            <a href="javascript:void(0)" class="link1" var="'.$row1['author'].'">
            <div class="dp">';
            $queryname = "SELECT * FROM acc WHERE email='$email1'";
            $result2 = $con->query($queryname);
            while ($row2 = $result2->fetch_array()){
            echo'
            <img src="images/'.$row2['dispic'].'">
            </div>
            <div class="usrnm">
            <p>'.$row2['firstname'].' '.$row2['lastname'].'';
            }
            $result1 = $con->query($queryfav);
            while($row1 = $result1->fetch_array()){
            echo '</p>
            </div>
            </a>
            <a href="javascript:void(0)" class="link" var="'.$row['food_id'].'">
            <div class="foodpic">';
            $queryImg = "SELECT * FROM recipe_images WHERE food_id='$food_id'";
            $resultImg = $con->query($queryImg);
            $rowImg = $resultImg -> fetch_assoc();
            echo'<img class="img-fluid" src="../Ingredients/Images/'.$rowImg['food_img'].'">
            </div>
            <div class="foodlabel">
            <h2>'.$row1['food_name'].'</h2>         
            <p>Date Posted: '.substr($row1['regdate'],0,16).'</p>
            </div>
            </a>
            </div>
            <form method="post" action="ingr-transfer.php"name="redirect" class="redirect">
            <input type="hidden" class="post" name="post" value="">
            <input type="submit" style="display: none;">
            </form>
            <form method="post" action="../feed_files/to-profile.php" name="redirect1" class="redirect1">
            <input type="hidden" class="post1" name="post1" value="">
            <input type="submit" style="display: none;">
            </form>';
            }
        }
    }
}
?>