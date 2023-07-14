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


	$insert = $connection->query("INSERT INTO donor(name, gender, datepicker, body_weight, email, blood_group, state, city, pincode, phone, address, username_fk, status) VALUES ('$name', '$gender', '$datepicker', '$weight', '$email', '$blood', '$state', '$city', '$pincode', '$phone', '$address', '".$_SESSION['username']."', '0')");

	
	if($insert){
		header('location:donor.php');
	}else {
		header('location:donor.php');
	}
?>