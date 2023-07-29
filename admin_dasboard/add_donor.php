<?php
include('../connection.php');
session_start();

$num = 21;
$datepicker = $_POST['datepicker'];
$weight = $_POST['weight'];
$blood = $_POST['blood'];

$donor_id = $num++; 

$stmt = $connection->prepare("UPDATE donor SET pends = 2, datepicker = ?, body_weight = ?, blood_group = ? WHERE donor_id = ?");

$stmt->bind_param("sssi", $datepicker, $weight, $blood, $donor_id);


if ($stmt->execute()) {
  header('location:approved_donors.php');
} else {

  header('location:approved_donors.php');
}

$stmt->close();
?>
