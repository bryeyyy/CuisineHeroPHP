<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "food");
$msg = "";

$data = $_POST['image'];

list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;

$data = base64_decode($data);
$imageName = time().'.png';
file_put_contents('images/'.$imageName, $data);
$sql = "UPDATE acc SET banner='$imageName' WHERE email='$email'";
mysqli_query($db, $sql);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
?>