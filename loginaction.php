<?php
session_start();
require "connect.php";

$email=$_POST['email'];
$pass=$_POST['pass'];
$_SESSION['PostID'] = 0;

$query="SELECT * FROM admins WHERE adminEmail='$email' AND adminPass='$pass'";

$result = mysqli_query($con, $query) or die(mysqli_error($con));

if (mysqli_num_rows($result)>0){ // email and pass exists in db
    $_SESSION['user']=$email;
    header("location:index.php");
} else {
    header("location:login.php");
}
