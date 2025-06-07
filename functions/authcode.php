<?php 
// Start the session to use session variables for flash messages and user authentication
session_start();

// Include database connection ($con) and custom helper functions like redirect()
include('../config/dbcon.php');
include('myfunctions.php');


// =================== USER REGISTRATION ===================
if (isset($_POST['register_btn'])) {
    // Sanitize user input to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);  
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Check if the email already exists in the `users` table
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        // If email exists, show message and redirect to register page
        $_SESSION['message'] = "Email already registered"; 
        header('location: ../register.php');
        exit;
    } else {
        // Check if password and confirm password match
        if ($password == $cpassword) {

            // Insert new user data into the `users` table
            $insert_query = "INSERT INTO users (name, email, phone, password) 
                             VALUES ('$name', '$email', '$phone', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                // If insert was successful, redirect to login
                $_SESSION['message'] = "Registered successfully";
                header('location: ../login.php');
                exit;
            } else {
                // If insert failed, show error message
                $_SESSION['message'] = "Something went wrong";
                header('location: ../register.php');
                exit;
            }

        } else {
            // If passwords don't match, show error and redirect back
            $_SESSION["message"] = "Passwords do not match";
            header('location: ../register.php');
            exit;
        }
    }
}


// =================== USER LOGIN ===================
elseif (isset($_POST['login_btn'])) {
    // Sanitize user input
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to find user with provided email and password
    $login_query = "SELECT * FROM users WHERE email='$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        // If user found, set session variables
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as']; // 1 = admin, 0 = regular user

        // Store user info in session for later use
        $_SESSION['AUTH_USER'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        // Redirect based on role
        if ($role_as == 1) { 
            redirect("../admin/index.php", "Welcome to dashboard");
        } else {
            redirect("../index.php", "Logged in successfully");
        }
    } else {
        // Invalid credentials
        redirect("../login.php", "Invalid credentials");
    }
}
?>
