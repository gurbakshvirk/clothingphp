<?php 
// Include necessary functions and header
include('functions/userfunctions.php');  // Custom function file (e.g., getSlugActive)
include('includes/header.php');         // Header include (navigation bar, head, etc.)

// Check if product slug is passed via URL
if (isset($_GET['product'])) {
    
    // Get the slug from the query parameter
    $product_slug = $_GET['product'];
    
    // Fetch product data from database using slug
    $product_data = getSlugActive("products", $product_slug);
    
    // Convert result into associative array
    $product = mysqli_fetch_array($product_data); 

    // If the product exists
    if ($product) {
        ?>
        <!-- Breadcrumb Section -->
        <div class="py-3 bg-primary">
            <div class="container mt-3">
                <h6 class="text-white">
                    <a class="text-white" href="categories.php">Home /</a>    
                    <a class="text-white" href="categories.php">Collections /</a>
                    <?= $product['name']; ?> <!-- Current product name -->
                </h6>
            </div>
        </div> 

        <!-- Product Details Section -->
        <div class="bg-light py-4">
            <div class="container product_data mt-3">
                <div class="row">

                    <!-- Product Image -->
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-md-8">
                        <!-- Product Name and Trending Badge -->
                        <h4 class="fw-bold">
                            <?= $product['name']; ?>
                            <span class="float-end text-danger">
                                <?php if ($product['trending']) { echo "Trending"; } ?>
                            </span>
                        </h4>
                        <hr>

                        <!-- Small Description -->
                        <p><?= $product['small_description']; ?></p>

                        <!-- Price Section -->
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Rs. <span class="text-success fw-bold"><?= $product['selling_price']; ?></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>Rs <s class="text-danger"><?= $product['original_price']; ?></s></h5>
                            </div>
                        </div>

                        <!-- Quantity Selector -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <!-- Add to Cart Button (with product ID as value) -->
                                <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>">
                                    <i class="fa fa-shopping-cart me-2"></i> Add to Cart
                                </button>
                            </div>
                            <div class="col-md-6">
                                <!-- Add to Wishlist Button -->
                                <div class="btn btn-danger px-4">
                                    <i class="fa fa-heart me-2"></i> Add to Wishlist
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Full Description -->
                        <h6>Product Description:</h6>
                        <p><?= $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        // If product not found
        echo "Product not found";
    }
} else {  
    // If no product slug in URL
    echo "Something went wrong";
}

// Include footer
include('includes/footer.php'); 
?>
