<?php
session_start();
include '../DB/cred.php';
$db = mysqli_connect($server,$username,$password,$dbname);
$msg = "";
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;

$data = $_POST['image'];

$query1 = "SELECT MAX(food_id) AS 'food_id' FROM food";
$sql1 = mysqli_query($db, $query1);
$row2 = mysqli_fetch_assoc($sql1);
$fID = intval($row2['food_id'])+1;

list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);

$data = base64_decode($data);
$imageName = time().'.png';
file_put_contents('../Ingredients/Images/'.$imageName, $data);
$sql = "INSERT INTO recipe_images (food_img, food_id, author) VALUES ('$imageName', '$fID', '$email')";//edit crop image
$result=mysqli_query($db, $sql);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
?>