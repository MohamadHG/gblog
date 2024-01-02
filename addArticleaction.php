<?php

session_start();

require "connect.php";

$title = $_POST['headline'];
$article = $_POST['article'];
$adminemail = $_SESSION['user'];
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "pics/articlesimag/" . $filename;

if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
} else {
    echo "<h3>  Failed to upload image!</h3>";
}

$query = "INSERT INTO posts(title, article, imag, PublishedDate) VALUES('$title', '$article', '$filename', now())";
mysqli_query($con, $query);

header("location:article.php");
echo '<script>alert("Post is Published!")</script>';
