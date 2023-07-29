<?php
	include('../connection.php');
	session_start();

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$datepicker = $_POST['datepicker'];
	$weight = $_POST['weight'];
	$email = $_POST['email'];
	$blood = $_POST['blood'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];


	$update = $connection->query("UPDATE donor SET pends=2");

	
	if($insert){
		header('location:approved_donors.php');
	}else {
		header('location:approved_donors.php');
	}
?>