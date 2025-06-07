<?php 
// Include the header file which contains the HTML head and navigation
include('includes/header.php');  

// Ensure only authenticated admin users can access this page
include('../middleware/adminMiddleware.php');  
?> 

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
            // Check if 'id' is passed in the URL (GET method)
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                // Fetch product data from the database by ID
                $product = getByID("products", $id);

                // Check if product data is found
                if(mysqli_num_rows($product) > 0 )
                {
                    // Fetch the product row as an associative array
                    $data = mysqli_fetch_array($product);
            ?>

            <!-- Edit Product Card -->
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product
                        <!-- Button to go back to the products list -->
                        <a href="products.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <!-- Form to update product details -->
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">   
                            <!-- Category Dropdown -->
                            <div class="col-md-12">
                                <label class="mb-0">Select Category</label>
                                <select name="category_id" class="form-select mb-2">
                                    <option selected>Select category</option>  
                                    <?php
                                    $categories = getAll("categories"); // Get all categories
                                    if(mysqli_num_rows($categories) > 0)
                                    {
                                        // Loop through each category
                                        foreach($categories as $item)
                                        {
                                    ?>
                                        <!-- Set selected category if it matches -->
                                        <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : '' ?>>
                                            <?= $item['name']; ?>
                                        </option>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Category Available";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Hidden product ID -->
                            <input type="hidden" name="product_id" value="<?= $data['id']; ?>">

                            <!-- Name and Slug -->
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" name="name" value="<?= $data['name']; ?>" placeholder="Enter Product Name" class="form-control mb-2">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter Slug" class="form-control mb-2">
                            </div>

                            <!-- Descriptions -->
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" name="small_description" placeholder="Enter small description" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter description" class="form-control mb-2"><?= $data['description']; ?></textarea>
                            </div>

                            <!-- Price Fields -->
                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="text" name="original_price" value="<?= $data['original_price']; ?>" class="form-control mb-2">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" name="selling_price" value="<?= $data['selling_price']; ?>" class="form-control mb-2">
                            </div>

                            <!-- Product Image Upload -->
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <!-- Keep track of the old image -->
                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                <input type="file" name="image" class="form-control mb-2">
                                <label class="mb-0">Current Image</label> 
                                <img src="../uploads/<?= $data['image']; ?>" alt="product image" height="50px" width="50px">
                            </div>

                            <!-- Quantity and Checkboxes -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" name="qty" value="<?= $data['qty']; ?>" class="form-control mb-2">
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Status</label></br>
                                    <!-- Checked if status is not 0 -->
                                    <input type="checkbox" name="status" <?= $data['status'] == '0' ? '' : 'checked' ?>>
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label></br>
                                    <!-- Checked if trending is not 0 -->
                                    <input type="checkbox" name="trending" <?= $data['trending'] == '0' ? '' : 'checked' ?>>
                                </div>
                            </div>

                            <!-- Meta Info -->
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <textarea rows="3" name="meta_title" placeholder="Enter meta title" class="form-control mb-2"><?= $data['meta_title']; ?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control mb-2"><?= $data['meta_description']; ?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-2"><?= $data['meta_keywords']; ?></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php 
                } // End if product found
                else{
                    echo "Product not found for given id";
                }
            }
            else{
                echo "Id missing from URL";
            }
            ?>
        </div>
    </div>
</div>

<!-- Footer include -->
<?php include('includes/footer.php'); ?>
