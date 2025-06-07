<?php
// Start the session to access session variables
session_start();

/*
Optional: If needed, you can uncomment the following section 
to prevent already logged-out users from accessing this page.
However, for a logout script, it’s often safe to proceed directly.
*/

// if (isset($_SESSION['auth'])) {
//     $_SESSION['message'] = "You are already logged in";
//     header('Location: index.php');
//     exit();
// }

// Check if user is currently authenticated
if (isset($_SESSION['auth'])) {

    // Unset all authentication-related session variables
    unset($_SESSION['auth']);         // Remove login flag
    unset($_SESSION['AUTH_USER']);    // Remove user data
    
    // Set a flash message for logout confirmation
    $_SESSION['message'] = "Logged Out Successfully";
}

// Redirect user to the homepage after logout
header('Location: index.php');
exit();
?>
