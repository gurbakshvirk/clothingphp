<?php 
// Start the session to use session variables for flash messages
session_start();

// Include the database connection file to get $con variable
include('../config/dbcon.php');
include('myfunctions.php');


// Check if the form was submitted using the "register_btn" button
if(isset($_POST['register_btn']))
{
    // Sanitize and escape user input to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);  
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Query to check if the email is already registered in the users table
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    // If the email already exists
    if(mysqli_num_rows($check_email_query_run) > 0){
        // Set a session message to notify user
        $_SESSION['message'] = "Email already registered"; 
        
        // Redirect back to the register page
        header('location: ../register.php');
        exit;
    }  
    else {
        // Check if password and confirm password match
        if($password == $cpassword)
        {
            // Insert the user data into the users table
            $insert_query = "INSERT INTO users (name, email, phone, password) 
                             VALUES ('$name', '$email', '$phone', '$password')";

            // Execute the insert query
            $insert_query_run = mysqli_query($con, $insert_query);

            // If insert is successful
            if($insert_query_run)
            {
                // Set success message and redirect to login page
                $_SESSION['message'] = "Registered successfully";
                header('location: ../login.php');
                exit;
            }
            else
            {
                // Set error message and redirect back to register page
                $_SESSION['message'] = "Something went wrong";
                header('location: ../register.php');
                exit;
            }
        }
        else
        {
            // If passwords do not match, notify the user and redirect
            $_SESSION["message"] = "Passwords do not match";
            header('location: ../register.php');
            exit;
        }
    }
}


elseif(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];



        $_SESSION['AUTH_USER'] = 
        [

            'user_id' => $userid,   
            'name' => $username,
             'email' => $useremail
            ];


        $_SESSION['role_as'] = $role_as;
        if($role_as == 1)
        { 
        redirect("../admin/index.php", "Welcome to dashboard");
        }
        else{
        redirect("../index.php", "Logged in successfully");
        }
    }
    else
    {
       redirect("../login.php", "Invalid credentials");
    }

}
?>
