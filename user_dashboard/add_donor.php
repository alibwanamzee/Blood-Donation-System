<?php
include('../connection.php');
session_start();

$name = $_POST['name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$state = $_POST['state'];
$city = $_POST['city'];

$insert = $connection->query("INSERT INTO donor(name, gender, phone, email, state, city, username_fk, status) VALUES ('$name', '$gender', '$phone', '$email', '$state', '$city', '".$_SESSION['membername']."', '0')");

if ($insert) {
    if (isset($_SESSION['id'])) {
        $loggedInUserId = $_SESSION['id'];
        $incrementQuery = "UPDATE stats SET pending_req = pending_req + 1 WHERE member_id = $loggedInUserId";
        $connection->query($incrementQuery);
    }
    header('location:user_dashboard.php?status=success');
    exit();
} else {
    header('location:user_dashboard.php?status=error');
    exit();
}
?>