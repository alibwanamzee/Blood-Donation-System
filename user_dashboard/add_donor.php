<?php
	include('../connection.php');
	session_start();

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$state = $_POST['state'];
	$city = $_POST['city'];


	$insert = $connection->query("INSERT INTO donor(name, gender, phone, email, state, city, username_fk, status) VALUES ('$name', '$gender', '$phone', '$email', '$state', '$city', '".$_SESSION['membername']."', '0')");

	$insert2 = $connection->query("INSERT INTO (name, gender, phone, email, state, city, username_fk, status) VALUES ('$name', '$gender', '$phone', '$email', '$state', '$city', '".$_SESSION['membername']."', '0')");
	
	if ($insert) {
		header('location:user_dashboard.php?status=success');
		$pending_req = $connection->query("SELECT pending_req FROM stats" + 1); 
		exit();
	} else {
		header('location:user_dashboard.php?status=error');
		exit();
	}
?>