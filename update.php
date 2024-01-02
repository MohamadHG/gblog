<?php

require "connect.php";

$articlepost = $_GET['articlepost'];
$articletitle = $_GET['articletitle'];
$PostID = $_GET['PostID'];

$sql = "UPDATE posts SET title='$articletitle', article='$articlepost' WHERE Pid='$PostID'";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

header("location:index.php");

echo "<script>alert('Post has been successfully updated')</script>";
