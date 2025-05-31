<?php
session_start();
include('../config/dbcon.php');

file_put_contents("log.txt", "Script started\n", FILE_APPEND);

if (isset($_SESSION['auth'])) {
    file_put_contents("log.txt", "Session found\n", FILE_APPEND);

    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        file_put_contents("log.txt", "Scope: $scope\n", FILE_APPEND);

        switch ($scope) {
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_SESSION['auth_user']['user_id']; // <- FIXED

                file_put_contents("log.txt", "Inserting: user=$user_id, prod=$prod_id, qty=$prod_qty\n", FILE_APPEND);

                $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id', '$prod_id', '$prod_qty')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if ($insert_query_run) {
                    echo 201;
                } else {
                    echo "MySQL error: " . mysqli_error($con);
                }
                break;
            default:
                echo 500;
        }
    }
} else {
    echo 401;
}
?>
