<?php
include('../connection.php');
session_start();

$datepicker = $_POST['datepicker'];
$weight = $_POST['weight'];
$blood = $_POST['blood'];

$members = $connection->query("SELECT d.*, u.name FROM donor d INNER JOIN users u ON d.member_id = u.member_id WHERE d.pends = '1'");
while ($row = $members->fetch_array()) {
  $donor_id = $row['donor_id'];

  $stmt = $connection->prepare("UPDATE donor SET pends = 2, datepicker = ?, body_weight = ?, blood_group = ? WHERE donor_id = ?");
  $stmt->bind_param("sssi", $datepicker, $weight, $blood, $donor_id);

  if ($stmt->execute()) {
      $member_id = $row['member_id'];
      $sql = "UPDATE stats SET visits = visits+1 WHERE member_id = $member_id";
      $connection->query($sql);

  } else {
    header('location: approved_donors.php?error=Update_Failed');
    exit;
  }

  $stmt->close();
}

header('location: approved_donors.php');
?>
