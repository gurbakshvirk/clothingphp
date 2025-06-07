<?php 
// Include the admin panel header layout (Bootstrap, navigation, etc.)
include('includes/header.php');  

// Include middleware to restrict access to admin users only
include('../middleware/adminMiddleware.php');  
?> 
<!-- Main container to hold the page content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Bootstrap card for styling the Add Product form -->
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4> <!-- Card title -->
                </div>

                <div class="card-body">
                    <!-- Form to add a product -->
                    <!-- enctype="multipart/form-data" is required for file uploads -->
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">   

                            <!-- Category Dropdown -->
                            <div class="col-md-12">
                                <label class="mb-0">Select Category</label>
                                <select name="category_id" class="form-select mb-2">
                                    <option selected>Select category</option>  
                                    <?php
                                    // Fetch all categories from the database
                                    $categories = getAll("categories");
                                    
                                    // If there are any categories available
                                    if(mysqli_num_rows($categories) > 0) {
                                        // Loop through and list each as an option
                                        foreach($categories as $item) {
                                            ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        // If no categories exist, display a message
                                        echo "<option>No Category Available</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Product Name -->
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" name="name" placeholder="Enter Product Name" class="form-control mb-2">
                            </div>

                            <!-- Product Slug (SEO-friendly URL) -->
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" placeholder="Enter slug" class="form-control mb-2">
                            </div>

                            <!-- Short description -->
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" name="small_description" placeholder="Enter small description" class="form-control mb-2"></textarea>
                            </div>

                            <!-- Full product description -->
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter description" class="form-control mb-2"></textarea>
                            </div>

                            <!-- Original Price -->
                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="text" name="original_price" placeholder="Enter Original price" class="form-control mb-2">
                            </div>

                            <!-- Selling Price -->
                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" name="selling_price" placeholder="Enter selling price" class="form-control mb-2">
                            </div>

                            <!-- Upload product image -->
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                            </div>

                            <!-- Quantity and Status/Trending Checkboxes -->
                            <div class="row">
                                <!-- Quantity -->
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                                </div>

                                <!-- Status: If checked, product will be hidden (1). If unchecked, visible (0). -->
                                <div class="col-md-3">
                                    <label class="mb-0">Status</label></br>
                                    <input type="checkbox" name="status">
                                </div>

                                <!-- Trending: If checked, product will be marked as trending -->
                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label></br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>

                            <!-- Meta title for SEO -->
                            <div class="col-md-12">
                                <label class="mb-0">Meta title</label>
                                <textarea rows="3" name="meta_title" placeholder="Enter meta title" class="form-control mb-2"></textarea>
                            </div>

                            <!-- Meta description for SEO -->
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control mb-2"></textarea>
                            </div>

                            <!-- Meta keywords for SEO -->
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-2"></textarea>
                            </div>

                            <!-- Submit button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div>
    </div>
</div>
<?php 
// Include footer for admin panel (scripts, closing tags)
include('includes/footer.php'); 
?>
