<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "clothingphp";



$con = mysqli_connect($host, $username, $password, $database);

if(!$con)
{
     die("CONNECTION FAILED: " . mysqli_connect_error());
     die("Connection failed: " . mysqli_connect_error());
}
else
{
    echo"Connected successfully";
}
?>