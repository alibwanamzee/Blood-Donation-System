<?php
	$connection = new mysqli('localhost', 'root', '', 'Blood_donation_database');
	if($connection) {
		echo "";
	}else {
		echo "error";
	}
?>