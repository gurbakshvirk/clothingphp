<?php
// Define database connection credentials
$host = "localhost";      // Hostname of the MySQL server (usually localhost)
$username = "root";       // MySQL username (default is "root" for XAMPP)
$password = "";           // MySQL password (empty by default in XAMPP)
$database = "clothingphp"; // The name of your database

// Create a MySQL connection using mysqli_connect()
$con = mysqli_connect($host, $username, $password, $database);

// Check if the connection failed
if (!$con) {
    // If connection fails, stop execution and show the error message
    die("CONNECTION FAILED: " . mysqli_connect_error());
} else {
    // If connection succeeds, you can optionally display a success message
    // echo "Connected successfully";
}
?>
