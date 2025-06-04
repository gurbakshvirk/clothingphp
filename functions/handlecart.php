<?php
session_start();
include('../config/dbcon.php');

file_put_contents("log.txt", "Script started\n", FILE_APPEND);

if (isset($_SESSION['auth'])) {
    // file_put_contents("log.txt", "Session found\n", FILE_APPEND);

    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        // file_put_contents("log.txt", "Scope: $scope\n", FILE_APPEND);

        switch ($scope) {
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_SESSION['AUTH_USER']['user_id']; // <- FIXED
                $chk_existing_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 

             // file_put_contents("log.txt", "Inserting: user=$user_id, prod=$prod_id, qty=$prod_qty\n", FILE_APPEND);
                if(mysqli_num_rows($chk_existing_cart_run)>0)
                    {
                        Echo "existing";
                    }
                    else{

                $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id', '$prod_id', '$prod_qty')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if ($insert_query_run) {
                    echo 201;
                } else {
                    echo "MySQL error: " . mysqli_error($con);
                }
                         }

                break;
                case "update":
                        $prod_id = $_POST['prod_id'];
                        $prod_qty = $_POST['prod_qty']; 
                        $user_id = $_SESSION['AUTH_USER']['user_id'];
                        $chk_existing_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
                        $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 

                    if(mysqli_num_rows($chk_existing_cart_run)>0)
                    {
                       $update_query = "UPDATE carts SET prod_qty= '$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id'";
                       $update_query_run = mysqli_query($con, $update_query);
                       if($update_query_run){
                        echo 200;
                       }
                       else{
                        echo 500;
                       }
                    }
                    else{
                        echo"Something went wrong";
                        } 
                        break;

                        case "delete": 
                            $cart_id = $_POST['cart_id'];
                            $user_id = $_SESSION['AUTH_USER']['user_id']; // <- FIXED
                            $chk_existing_cart = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id'";
                            $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 


                            if(mysqli_num_rows($chk_existing_cart_run)>0)
                                {
                                $delete_query = "DELETE FROM carts WHERE id='$cart_id' ";
                                $delete_query_run = mysqli_query($con, $delete_query);
                                if($delete_query_run){
                                    echo 200;
                                }
                                else{
                                    echo "Something went wrong";
                                }
                                }
                                else{
                                    echo"Something went wrong";
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

