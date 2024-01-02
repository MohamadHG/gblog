<?php

require "connect.php";

$articlePost = $_GET['PostID'];

$sql = "DELETE FROM posts WHERE Pid='$articlePost'";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

header("location:article.php");

echo "<script>alert('Post has been successfully deleted')</script>";
