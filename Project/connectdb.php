<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = ''; // Ensure this is empty if no password is set for root
$DATABASE = 'signuppage1';

// Create connection
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

// Close connection
//mysqli_close($con);
?>

