<?php
// session_start(); 
// Commented out – only start session if not already started elsewhere. Make sure session_start() exists in files that include this one when necessary.

include('config/dbcon.php'); 
// Include the database connection file so you can use $con (the connection object) in all functions.
function getAllActive($table)
{
    global $con; // Use the globally declared database connection

    // Get all records from the specified table where status is '0' (active)
    $query = "SELECT * FROM $table WHERE status='0'";

    // Run the query and return the result set
    return mysqli_query($con, $query);        
}
function getAllTrending()
{
    global $con;

    // Select products that are marked as trending (trending='1')
    $query = "SELECT * FROM products WHERE trending='1'";

    return mysqli_query($con, $query);        
}
function getByIDActive($table, $id)
{
    global $con;

    // Get a specific active record by its ID from the specified table
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0' LIMIT 1";

    return $query_run = mysqli_query($con, $query);        
}
function getCartItems()
{
    global $con;

    // Get logged-in user's ID from session
    $userId =  $_SESSION['AUTH_USER']['user_id'];

    // Join carts and products tables to get cart items along with product details
    $query = "SELECT 
                c.id as cid,            -- cart item id
                c.prod_id,              -- product id in cart
                c.prod_qty,             -- quantity in cart
                p.id as pid,            -- product id from products table
                p.name,                 -- product name
                p.image,                -- product image
                p.selling_price         -- product selling price
              FROM carts c, products p 
              WHERE c.prod_id = p.id 
              AND c.user_id = '$userId' 
              ORDER BY c.id DESC";

    return $query_run = mysqli_query($con, $query);
}
function getProdByCategory($category_id) 
{
    global $con;

    // Get all active products under a specific category
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0'";

    return $query_run = mysqli_query($con, $query);        
}
function getSlugActive($table, $slug)
{
    global $con;

    // Get a specific active record by slug (used in SEO-friendly URLs)
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";

    return $query_run = mysqli_query($con, $query);        
}
function redirect($url, $message)
{
    // Set a session message (for alertify or other UI feedback)
    $_SESSION['message'] = $message;

    // Redirect user to a new URL
    // header('Location:'.$url); // Commented out — you can uncomment this to activate redirect
    exit(); // Stop script execution after redirection
}
