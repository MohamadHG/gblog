<?php

session_start();

require "connect.php";

$subscriber = $_GET['subID'];
$adminemail = $_SESSION['user'];

$que = "DELETE FROM `subscribers` WHERE SEmail='$subscriber'";
$result1 = mysqli_query($con, $que) or die(mysqli_error($con));
header('location:sub.php');
echo "<script>alert('This Subscriber has been deleted succesfully.');</script>";
