<?php 
// Start session if not already started
// session_start(); // Uncomment if session is not started globally

// Include necessary files
include('functions/userfunctions.php'); // Contains user-defined functions like getSlugActive(), getProdByCategory()
include('includes/header.php'); // Contains HTML <head> section and top navigation

// Get the category slug from the URL query parameter
$category_slug = $_GET['category'];

// Get category data from the database based on the slug and ensure it's active
$category_data = getSlugActive("categories", $category_slug);

// Check if the category exists and has at least one row
if ($category_data && mysqli_num_rows($category_data) > 0)
{
    // Fetch category details into an associative array
    $category = mysqli_fetch_array($category_data);

    // Store category ID to fetch its related products later
    $cid = $category['id'];
}
else {
    // If no category is found, display an error and stop the script
    echo "<h4>Category Not Found</h4>";
    include('includes/footer.php');
    exit();
}
?>

<!-- Breadcrumb Section -->
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="categories.php">Home /</a>
            <a class="text-white" href="categories.php">Collections /</a>
            <?= $category['name']; ?> <!-- Current category name -->
        </h6>
    </div>
</div> 

<!-- Main Products Display Section -->
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Category Title -->
                <h1><?= $category['name']; ?></h1>
                <hr>

                <!-- Products Row -->
                <div class="row">

                <?php 
                // Fetch products by category ID
                $products = getProdByCategory($cid);
                
                // If products are found, loop through each one and display
                if(mysqli_num_rows($products) > 0)
                {
                    foreach($products as $item)
                    {
                        ?>
                        <!-- Each product in its own column -->
                        <div class="col-md-3 col-sm-6">
                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- Product image -->
                                        <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                        <!-- Product name -->
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
                    // If no products are available for this category
                    echo "<h5>No products available in this category!</h5>";
                }
                ?>
                
                </div> <!-- End of Products Row -->
            </div>
        </div>
    </div>
</div>

<!-- Include the footer section -->
<?php include('includes/footer.php'); ?>
