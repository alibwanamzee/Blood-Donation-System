<?php
   include('../connection.php');
   session_start();

    // Fetch the email address from the current user in the database
    $members= $connection->query("SELECT email FROM donor WHERE pends='1'");

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row["email"];
    echo $email; // Return the email address
    }
    
    $conn->close();
?>
