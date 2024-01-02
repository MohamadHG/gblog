<?php

session_start();

require "connect.php";

$subscriber = $_POST['subscriber'];
//$adminemail = $_SESSION['user'];

$qu = "SELECT * FROM subscribers WHERE SEmail='$subscriber'";

$result = mysqli_query($con, $qu) or die(mysqli_error($con));

if (mysqli_num_rows($result) == 0) {
    $que = "INSERT INTO `subscribers`(`SEmail`) VALUES ('$subscriber')";
    $result1 = mysqli_query($con, $que) or die(mysqli_error($con));
    header('location:index.php');
    echo "<script>alert('You will recieve updates from now on.')</script>";
} else {
    echo "<script>alert('The email you just entered is already subscribed')</script>";
}
