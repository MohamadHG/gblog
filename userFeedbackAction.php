<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require "connect.php";

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $insertQuery = "INSERT INTO feedback (fUsername, fEmail, fMsg) VALUES ('$name', '$email', '$message')";
    
    if (mysqli_query($con, $insertQuery)) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);

    $defaultEmail = "abo.al.ghozlan.mohammad@gmail.com";
    $subject = "New Feedback Submission";
    $emailMessage = "Name: $name\nEmail: $email\nMessage: $message";

    if (mail($defaultEmail, $subject, $emailMessage)) {
        echo "Email sent to $defaultEmail successfully!";
    } else {
        echo "Failed to send email to $defaultEmail.";
    }
} else {
    echo "Invalid request.";
}
?>