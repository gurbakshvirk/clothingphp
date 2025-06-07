<?php

// Include helper functions (such as redirect function, session checks, etc.)
include('../functions/myfunctions.php');

// Check if the user is logged in
if (isset($_SESSION['auth'])) 
{
    // Check if the logged-in user does NOT have admin privileges
    // Usually, 'role_as' = 1 indicates an admin; other values may be regular users
    if ($_SESSION['role_as'] != 1) 
    {
        // If the user is not an admin, redirect them to the homepage with an error message
        redirect("../index.php", "You are not authorised to access this page");
    }
}
else 
{
    // If the user is not logged in at all, redirect them to the login page
    redirect("../login.php", "Login to continue"); 
}
?>
