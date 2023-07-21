<?php
	include('../connection.php');

	$id = $_GET['status_id'];
	$status = $_POST['status'];

	$edit = $connection->query("UPDATE donor SET pends=1, status='$status' WHERE donor_id='$id'");
	$decrementQuery = "UPDATE stats SET pending_req = pending_req - 1";
    $connection->query($decrementQuery);
	$incrementQuery = "UPDATE stats SET approved_req = approved_req + 1";
    $connection->query($incrementQuery);


	header('location:pending_donors.php');

?>