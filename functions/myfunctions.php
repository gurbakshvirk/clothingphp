<?php
if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}

// include('./config/dbcon.php');
include('../config/dbcon.php');



function getAll($table)
{
        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);        
}


function getByID($table, $id)
{
        global $con;
        $query = "SELECT * FROM $table WHERE id='$id' ";
        return $query_run = mysqli_query($con, $query);        
}



function redirect($url, $message)
{
        $_SESSION['message'] = $message;
        header('Location:'.$url);
        exit(0);
}
?>
