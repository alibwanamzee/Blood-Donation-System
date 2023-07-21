<?php
	include('../connection.php');

	$id = $_GET['status_id'];
	$status = $_POST['status'];

	$edit = $connection->query("UPDATE donor SET pends=1, status=2 WHERE donor_id='$id'");
	header('location:pending_donors.php');
?>
