<?php
// Check if the user is not authenticated (i.e., not logged in)
if (!isset($_SESSION['auth'])) 
{
    // Redirect the user to the login page with a custom message
    // 'redirect()' is a custom function likely defined elsewhere in your codebase
    // It likely sets a session message and performs a header redirect
    redirect("login.php", 'Login to continue');
}
?>
