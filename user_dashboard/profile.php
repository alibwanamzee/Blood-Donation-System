<?php
	include('../connection.php');
	session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        .profile-left
         {
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            height: 70vh;
        }
        .profile-header {
            height: 40%;
        }
        .heading {
            text-align: center;
        }
        h4,P{
            
            text-align: center;
            padding: 0.8rem;
            font-weight: bolder;
            font-size: larger;
        }
        .profile-main img {
            width: 150px; /* Set your desired width */
            height: 150px; /* Set your desired height */
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<body>
    <div class="profile-left">
        <div class="profile-header">
            <div class="profile-main">
                <img src="../assets/img/user-medium.png" class="img-circle" alt="DP" >
                <h3 class="name"></h3>
                <span class="online-status status-available" style="color:greenyellow">Profile Photo</span>
            </div>
            
        </div>
        <div class="profile-detail">
            <div class="profile-info">
                <h3 class="heading">My Profile</h3>
                <h4>Name: </h4>
                <span>
                <?php
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM donor WHERE member_id = $id";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row["gender"];
                        }
                    }
                ?>



                </span>
            </div>
            <div class="text-center">
                <a href="./admin_dashboard.php" class="btn btn-success">Home</a>
            </div>
        </div>
    </div>

    <footer>
        <p style="text-align: center;">&copy; 2023. All Rights Reserved.</p>
    </footer>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
</body>
</html>
