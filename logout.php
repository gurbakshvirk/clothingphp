<?php
session_start();

// if(isset($_SESSION['auth']))
// {
//     $_SESSION['message'] = "You are already loggedin";
// header('location: index.php');
// }

if(isset($_SESSION['auth']))
{

    unset($_SESSION['auth']);
    unset($_SESSION['AUTH_USER']);
    $_SESSION['message'] = "Logged Out Successfully"; 
}
header('location: index.php');


?>
