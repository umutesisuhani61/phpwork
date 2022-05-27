<?php
session_start();
require_once "config/config.php";
print $id = $_SESSION['auth']['id'];
$prof = mysqli_query($conn,"DELETE FROM `profile` WHERE `uid` = '$id'");
$acc = mysqli_query($conn,"DELETE FROM `users` WHERE `id` = '$id'");
if($prof AND $acc){
    header("location:index.php");
}else{
    $_SESSION['error'] = "Failed to delete Account!";
    header("location:home.php");
}