<?php
session_start();
include '../DB/cred.php';
$db = mysqli_connect($server,$username,$password,$dbname);
$msg = "";

$data = $_POST['image'];

list($type, $data) = explode(';', $data);
list(, $data) = explode(',', $data);
$email = isset($_SESSION['email'])? $_SESSION['email'] : null;
$sqlim = "SELECT * from acc WHERE email ='$email'";
if ($result = $db->query($sqlim)){
    $row = mysqli_fetch_array($result);
    $prevImg = 'images/'.$row['dispic'].'';
    if($prevImg =='images/defaultdp.png')
    {
        $data = base64_decode($data);
        $imageName = time().'.png';
        file_put_contents('images/'.$imageName, $data);
        $sql = "UPDATE acc SET dispic='$imageName' WHERE email='$email'";
        mysqli_query($db, $sql);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    }
    else {
        unlink($prevImg);
        $data = base64_decode($data);
        $imageName = time().'.png';
        file_put_contents('images/'.$imageName, $data);
        $sql = "UPDATE acc SET dispic='$imageName' WHERE email='$email'";
        mysqli_query($db, $sql);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    }
    
}

?>