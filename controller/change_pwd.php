<?php
session_start();
require_once "../config/config.php";
// print_r($_SESSION);
$id = $_SESSION['auth']['id'];
$email = $_SESSION['auth']['email'];
$pass = $_POST['current_password'];
$newPass = $_POST['new_password'];

$sql = mysqli_query($conn,"SELECT * FROM `users` WHERE `id` = $id AND `password` = '$pass'");
if(mysqli_num_rows($sql) > 0){
    $data = mysqli_fetch_array($sql);
    $_SESSION['auth'] = $data;
    // print "it's okay";
    $upd = mysqli_query($conn,"UPDATE `users` SET `password`='$newPass' WHERE `id` = '$id'");
    if($upd){
        $_SESSION['success'] = "Password have been changed!";
        header("location:../home.php");
    }else{
        $_SESSION['success'] = "Failed to change password!";
        header("location:../home.php");
    }
}else{
    $_SESSION['error'] = "Incorect Password Try again!";
    header("location:../home.php");
    }
