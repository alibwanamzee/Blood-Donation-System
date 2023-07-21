<?php
include('connection.php');
session_start();

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$insert = $connection->query("INSERT INTO users(name, username, password, email, usertype) VALUES('$fullname', '$username', '$password', '$email', 'donor')");
if ($insert) {
    $_SESSION['success'] = '';
    
    // Get the auto-generated member_id from the previous INSERT query
    $member_id = $connection->insert_id;
    
    // Insert a new row into the stats table for the newly registered user
    $insertStats = $connection->query("INSERT INTO stats(member_id, pending_req, approved_req, visits) VALUES($member_id, 0, 0, 0)");
    header('location:index.php');
} else {
?>
<div class="alert alert-success" style="background-color: red; color: white;">
    <strong>ERROR!</strong> This alert box could indicate a successful or positive action.
</div>
<?php
}
?>
