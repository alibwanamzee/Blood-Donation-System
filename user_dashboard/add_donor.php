<?php
include('../connection.php');
session_start();

$gender = $_POST['gender'];
$phone = $_POST['phone'];
$state = $_POST['state'];
$city = $_POST['city'];

$insert = $connection->query("INSERT INTO donor(gender, phone, state, city, member_id, status) VALUES ('$gender', '$phone', '$state', '$city', '".$_SESSION['id']."', '0')");

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