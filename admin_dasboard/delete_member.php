<?php
	include('../connection.php');

	$id = $_GET['member_id'];

	$delete = $connection->query("DELETE FROM users WHERE member_id='$id'");
	header('location:members.php');
?>