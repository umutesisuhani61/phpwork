<?php
session_start();
require_once "../config/config.php";
$id = $_SESSION['auth']['id'];
$fname = $_FILES['profimg']['name'];
$path = "../images/".$_FILES['profimg']['name'];
// print_r($_FILES);
if(move_uploaded_file($_FILES['profimg']['tmp_name'],$path)){
    $qry = mysqli_query($conn,"INSERT INTO `profile`(`uid`, `name`) VALUES ('$id','$fname')");
     $_SESSION['success'] = "Profile picture have been Changed!";
    header("location:../settings.php");
}else{
     $_SESSION['error'] = "Failed to upload photo!";
    header("location:../settings.php");
}