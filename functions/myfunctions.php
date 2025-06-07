<?php
// Check if a PHP session has not already been started
if (session_status() === PHP_SESSION_NONE) 
{
    session_start(); // Start the session so you can use session variables
}

// Include the database connection file from the parent directory
// This gives access to the $con variable (MySQLi connection object)
include('../config/dbcon.php');
function getAll($table)
{
    global $con; // Use the globally declared DB connection

    // Create a query to select all records from the given table
    $query = "SELECT * FROM $table";

    // Execute the query and return the result set
    return $query_run = mysqli_query($con, $query);        
}
function getByID($table, $id)
{
    global $con;

    // Query to fetch a record by its ID from the specified table
    $query = "SELECT * FROM $table WHERE id='$id' ";

    return $query_run = mysqli_query($con, $query);        
}
function redirect($url, $message)
{
    // Set a session message (can be shown on the redirected page using alert/notification)
    $_SESSION['message'] = $message;

    // Redirect the user to the given URL
    header('Location:' . $url);

    // End script execution to ensure redirection happens cleanly
    exit(0);
}
