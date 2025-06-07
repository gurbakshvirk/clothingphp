<?php 
// Include required files
// session_start(); // (Optional) Start session only if needed for user session management
include('functions/userfunctions.php'); // Contains custom functions like getAllActive()
include('includes/header.php');         // Header file that includes navigation and bootstrap setup
?>
<div class="py-3 bg-secondary">
    <div class="container">
        <!-- Displays navigation path -->
        <h6 class="text-white">Home / Categories</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Collections!</h1>
                <hr>
                <div class="row">
<?php 
// Fetch all active categories from the database
$categories = getAllActive("categories");

// Check if there are any categories available
if(mysqli_num_rows($categories) > 0)
{
    // Loop through each category
    foreach($categories as $item)
    {
?>
<div class="col-md-3 mb-2">
    <!-- Link to the products page with category slug as a GET parameter -->
    <a href="products.php?category=<?= $item['slug']; ?>">
        <div class="card shadow">
            <div class="card-body">
                <!-- Category image -->
                <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100">
                <!-- Category name -->
                <h4 class="text-center"><?= $item['name']; ?></h4>
            </div>
        </div>
    </a>
</div>
<?php
    }
}
else
{
    // Show message if no categories are available
    echo "No category Available!";
}
?>
                </div> <!-- .row inside card grid -->
            </div> <!-- .col-md-12 -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .py-5 -->

<?php include('includes/footer.php'); ?>
