<?php
	include('../connection.php');

	$id = $_GET['status_id'];
	$status = $_POST['status'];

	$edit = $connection->query("UPDATE donor SET status='$status' WHERE donor_id='$id'");
	header('location:pending_donors.php');

	$id = $_GET['pends_id'];
	$pends = $_POST['pends'];

	$edit = $connection->query("UPDATE donor SET pends='$pends' WHERE pends_id='$id'");
	header('location:pending_donors.php');

?>