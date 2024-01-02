<?php
require "connect.php";
session_start();

$adminemail = $_SESSION['user'];
$pass = $_POST['op'];
$newPass = $_POST['np'];
$cnewPass = $_POST['cnp'];

$query = "SELECT 'password' FROM admins WHERE email='$adminemail'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if (mysqli_num_rows($result) > 0) {

    if ($newPass == $cnewPass) {

        if ($newPass < 8) {
            header("location:resetPass.php");
            echo "<script>alert('Your password should has 8 or more characters')</script>";
        } else {
            $query = "UPDATE `admins` SET `password`='$newPass' WHERE `email`='$adminemail'";
            mysqli_query($con, $query) or die(mysqli_error($con));
            header("location:index.php");
            echo "<script>alert('Password changed succesfully.')</script>";
        }
    } else {
        header("location:resetPass.php");
        echo "<script>alert('New password and confirm password aren't the same.')</script>";
    }
}
