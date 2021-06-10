<?php
$db = mysqli_connect("localhost", "root", "", "food");
$msg = "";

$data = $_POST['image'];

list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);

$data = base64_decode($data);
$imageName = time().'.png';
file_put_contents('Images/'.$imageName, $data);
$sql = "UPDATE food SET food_img='$imageName' WHERE food_id='2'";//edit crop image
mysqli_query($db, $sql);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
?>