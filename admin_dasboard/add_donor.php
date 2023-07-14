<?php
	include('../connection.php');
	session_start();

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$state = $_POST['state'];
	$city = $_POST['city'];
// echo "<pre>";
// 	print_r($_POST);
// 	exit();

	$insert = $connection->query("INSERT INTO `donor`( name, gender, phone, email, state, city, username_fk, status) VALUES ($name','$gender', '$phone', '$email', '$state', '$city''".$_SESSION['username']."', '0')");
	// $r = "INSERT INTO donor(name, father_name, gender, dob, body_weight, email, state, city, address, pincode, phone, image, username_fk) VALUES ('$name', '$fathername', '$gender', '$datepicker', '$weight', '$email', '$state', '$city', '$pincode', '$phone', '$address', '$location',)";
	// echo $r;
	// exit();
	
	if($insert){
		header('location:donor.php');
	}else {
		header('location:donor.php');
	}
?>