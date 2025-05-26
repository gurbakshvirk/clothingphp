<?php
// session_start();
include('config/dbcon.php');


function getAllActive($table)
{
        global $con;
        $query = "SELECT * FROM $table WHERE status='0'";
        return mysqli_query($con, $query);        
}
function redirect($url, $message)
{
        $_SESSION['message'] = $message;
        header('Location:'.$url);
        exit();
}
?>
