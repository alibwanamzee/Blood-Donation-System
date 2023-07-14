<?php
	include('connection.php');
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$login = $connection->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

	$fetch = $login->fetch_array();
	if($login->num_rows == 1){
		if($fetch['usertype'] == 'admin'){
			$_SESSION['member_id'] = $fetch['member_id'];
			$_SESSION['username'] = $fetch['username'];
			header('location:admin_dasboard/admin_dashboard.php');

		} elseif ($fetch['usertype'] == 'phlebotomists')  {
			$_SESSION['userid'] = $fetch['user_id'];
			$_SESSION['membername'] = $fetch['username'];
			header('location:/Blood_donation_system/admin/home.php');

		} elseif ($fetch['usertype'] == 'donor')  {
			$_SESSION['userid'] = $fetch['user_id'];
			$_SESSION['membername'] = $fetch['username'];
			header('location:user_dashboard/user_dashboard.php');
		} 
	}else {
		$_SESSION['error'] = '';
		header('location:../index.php');	
	}
?>