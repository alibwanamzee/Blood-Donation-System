<?php
	include('../connection.php');

	$id = $_GET['donor_id'];

	$delete = $connection->query("DELETE FROM donor WHERE donor_id='$id'");
	header('location:pending_donors.php');
?>