<?php
// Start the session to access session variables
session_start();

// Include the database connection file
require_once '../connection.php'; // Replace './connection.php' with the path to your database connection file

require_once './user_header.php';
?>

<!-- Your HTML and JavaScript code as before -->

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <?php
            // Check if the membername and userid are set in the session to determine if the user is logged in
            if (isset($_SESSION['membername']) AND isset($_SESSION['userid'])) {
                // Get the membername from the session
                $membername = $_SESSION['membername'];

                // Assuming you have a table named "donors" in your database
                $query = "SELECT donor_id, body_weight, phone, datepicker FROM donor WHERE heloo = '$membername'";

                // Execute the query
                $result = mysqli_query($connection, $query);

                // Check if the query was successful
                if ($result) {
                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the rows and display donor information
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['donor_id'];
                            $weight = $row['body_weight'];
                            $phone = $row['phone'];
                            $datepicker = $row['datepicker'];

                            // Echo the donor information
                            echo "<p>ID: $id</p>";
                            echo "<p>Weight: $weight</p>";
                            echo "<p>Phone: $phone</p>";
                            echo "<p>Date: $datepicker</p>";
                            echo "<hr>";
                        }
                    } else {
                        echo "<p>No donors found for the current user.</p>";
                    }
                } else {
                    echo "<p>Error: Unable to fetch data from the database.</p>";
                }

                // Close the database connection
                mysqli_close($connection);

            } else {
                echo "<p>No user is currently logged in. Please log in to view your profile.</p>";
            }
            ?>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<?php
include('user_footer.php');
?>
