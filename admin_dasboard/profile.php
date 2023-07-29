<?php
	include('../connection.php');
	session_start();

	if(!isset($_SESSION['username']) AND $_SESSION['member_id'] == ''){
		header('location:login.php');
	}
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
            height: 100vh;
        }
        .profile-left {
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            height: 60vh;
        }
        .heading {
            text-align: center;
        }
        .table{
            display: flex;
            flex-direction:column ;
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
                <img src="../assets/img/user-medium.png" class="img-circle" alt="Avatar">
                <h3 class="name"></h3>
                <span class="online-status status-available">Available</span>
            </div>
            
        </div>
        <div class="profile-detail">
            <div class="profile-info">
                <h3 class="heading">My Profile</h3>
                <table class="table table-borderless" id="donors">
                    <tbody>
                        <tr>
                            <th>Name</th>
                        <?php
                        $singleRow = $connection->query("SELECT * FROM users LIMIT 1");
                        if ($row = $singleRow->fetch_array()) {
                            ?>
                            <td><?php echo $row['username']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <?php
                                if(!$row['email'] === NULL){
                                   ?><td><?php echo $row['email'];}else{echo 'No email';} ?></td>
                        </tr>
    
                        <tr>
                            <th>Password</th>
                            <td><?php echo $row['password']; ?></td>
                        </tr>
                    </tr>
                    <?php
                        } else {
                            // No row found, handle accordingly
                            ?>
                            <tr>
                                <td colspan="5">No data found</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="./admin_dashboard.php" class="btn btn-success">Home</a>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <p class="text-center">&copy; 2023. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
</body>
</html>
