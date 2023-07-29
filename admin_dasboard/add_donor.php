<?php
include('../connection.php');
session_start();

$datepicker = $_POST['datepicker'];
$weight = $_POST['weight'];
$blood = $_POST['blood'];

$donor_id = 22; 

$stmt = $connection->prepare("UPDATE donor SET pends = 2, datepicker = ?, body_weight = ?, blood_group = ? WHERE donor_id = ?");

$stmt->bind_param("sssi", $datepicker, $weight, $blood, $donor_id);


if ($stmt->execute()) {
  header('location:approved_donors.php');
} else {

  header('location:approved_donors.php');
}

$stmt->close();
?>
