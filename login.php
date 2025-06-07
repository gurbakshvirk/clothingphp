<?php 
// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect user if already logged in
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('location: index.php'); // Redirect to homepage
    exit();
}

// Include the header (usually contains the HTML <head>, nav bar, etc.)
include('includes/header.php');
?>
 
<!-- Login Page Content -->
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Display session flash message (like login/logout success) -->
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    unset($_SESSION['message']); // Clear message after showing it
                } ?>

                <!-- Login Card -->
                <div class="card">
                    <div class="card-header">
                        <h4>Login Form</h4>
                    </div>

                    <div class="card-body">
                        <!-- Login Form -->
                        <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control" 
                                    id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" 
                                    placeholder="Enter Your Email">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    class="form-control" 
                                    id="exampleInputPassword1" 
                                    placeholder="Enter Your Password">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div> <!-- End of card -->
            </div>
        </div>
    </div>
</div>

<!-- Include footer -->
<?php include('includes/footer.php'); ?> 
