<?php
$db = mysqli_connect("localhost", "root", "", "food");
$msg = "";

$data = $_POST['image'];

list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);

$data = base64_decode($data);
$imageName = time().'.png';
file_put_contents('Ingredients/Images/'.$imageName, $data);
$sql = "INSERT INTO `food`(`food_name`, `food_img`, `cook_time`, `prep_time`, `video_link`, `proced`, `nutri_info`) VALUES ()";//edit crop image
mysqli_query($db, $sql);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
?>