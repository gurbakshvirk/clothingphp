<?php
session_start(); // Start session to access session variables
include('../config/dbcon.php'); // Include database connection file

// Log that the script has started (for debugging)
file_put_contents("log.txt", "Script started\n", FILE_APPEND);

// Check if user is authenticated
if (isset($_SESSION['auth'])) {

    // Check if the 'scope' is passed via POST (defines the action: add, update, delete)
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope']; // Get the action type from the request

        switch ($scope) {

            // ========== ADD PRODUCT TO CART ==========
            case "add":
                $prod_id = $_POST['prod_id']; // Product ID from POST
                $prod_qty = $_POST['prod_qty']; // Quantity from POST
                $user_id = $_SESSION['AUTH_USER']['user_id']; // Get user ID from session

                // Check if the product is already in the user's cart
                $chk_existing_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    echo "existing"; // Product already in cart
                } else {
                    // Insert the new product into the cart
                    $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id', '$prod_id', '$prod_qty')";
                    $insert_query_run = mysqli_query($con, $insert_query);

                    if ($insert_query_run) {
                        echo 201; // Successfully added
                    } else {
                        echo "MySQL error: " . mysqli_error($con); // SQL error
                    }
                }
                break;

            // ========== UPDATE PRODUCT QUANTITY ==========
            case "update":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_SESSION['AUTH_USER']['user_id'];

                // Check if product exists in user's cart
                $chk_existing_cart = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    // Update the quantity
                    $update_query = "UPDATE carts SET prod_qty= '$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id'";
                    $update_query_run = mysqli_query($con, $update_query);

                    if ($update_query_run) {
                        echo 200; // Successfully updated
                    } else {
                        echo 500; // Error during update
                    }
                } else {
                    echo "Something went wrong"; // Product not found in cart
                }
                break;

            // ========== DELETE ITEM FROM CART ==========
            case "delete":
                $cart_id = $_POST['cart_id'];
                $user_id = $_SESSION['AUTH_USER']['user_id'];

                // Check if cart item exists for the user
                $chk_existing_cart = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id'";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    // Delete the item from the cart
                    $delete_query = "DELETE FROM carts WHERE id='$cart_id'";
                    $delete_query_run = mysqli_query($con, $delete_query);

                    if ($delete_query_run) {
                        echo 200; // Successfully deleted
                    } else {
                        echo "Something went wrong"; // SQL error during delete
                    }
                } else {
                    echo "Something went wrong"; // Cart item not found
                }
                break;

            // ========== INVALID SCOPE ==========
            default:
                echo 500; // Invalid action (scope)
        }
    }

} else {
    // If the user is not authenticated
    echo 401; // Unauthorized access
}
?>
