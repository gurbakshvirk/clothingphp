<?php 

// Start the session to handle user authentication and messaging
// Uncomment the below line if SESSION is not already started elsewhere
// session_start();

// Redirect the user to the index page if already authenticated
if(isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('location: index.php');
    exit();
}

// Include the header file (usually contains HTML head, nav, etc.)
include('includes/header.php');
?>

<!-- Registration Form Section -->
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Display Session Message (like already logged in or error message) -->
                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    // Clear the message after displaying it
                    unset($_SESSION['message']);
                } ?>

                <!-- Card Container for Registration Form -->
                <div class="card">
                    <div class="card-header">
                        <h4>Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <!-- Registration Form -->
                        <!-- Submits data to functions/authcode.php via POST -->
                        <form action="functions/authcode.php" method="POST">

                            <!-- Name Input Field -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                            </div>

                            <!-- Phone Number Input Field -->
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                            </div>

                            <!-- Email Input Field -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
                            </div>

                            <!-- Password Input Field -->
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password">
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Your Password">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
                <!-- End of Card -->
            </div>
        </div>
    </div>
</div>

<!-- Include footer file (closing tags, scripts, etc.) -->
<?php include('includes/footer.php'); ?> 