<?php
session_start();

require "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $message = $_POST['emailMsg'];

    $query = "SELECT * FROM subscribers";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_assoc($result)) {
        $subscriberEmail = $row['SEmail'];
        
        $subject = "G-Blog Alert";
        
        $emailMessage = "Dear Subscriber,\n\n" . $message . "\n\nHope your having a good day!";

        $headers = "From: abo.al.ghozlan.mohammad@gmail.com";

        if (mail($subscriberEmail, $subject, $emailMessage, $headers)) {
            echo "Email sent to $subscriberEmail successfully.<br>";
        } else {
            echo "Failed to send email to $subscriberEmail.<br>";
        }
    }

    mysqli_close($con);
}
?>