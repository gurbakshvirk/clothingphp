<?php 
// Include the header file for HTML structure (like navbar, scripts, etc.)
include('includes/header.php');  

// Include middleware to restrict access to admin only
include('../middleware/adminMiddleware.php');  
?> 

<!-- Main container for page content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php
            // Check if an 'id' parameter is passed in the URL (GET request)
            if(isset($_GET['id']))
            {
                $id = $_GET['id']; // Store the category ID from the URL
                $category = getByID("categories", $id); // Fetch category data by ID using custom function

                // Check if category exists
                if(mysqli_num_rows($category) > 0)
                {
                    $data = mysqli_fetch_array($category); // Fetch category data as an associative array
            ?>
                <!-- Card UI for editing the category -->
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>

                    <div class="card-body">
                        <!-- Form to update the category -->
                        <!-- enctype="multipart/form-data" is required for file/image upload -->
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">

                                <!-- Hidden input to store category ID -->
                                <div class="col-md-6">
                                    <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Category Name" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter slug" class="form-control">
                                </div>

                                <!-- Description textarea -->
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea rows="3" name="description" placeholder="Enter description" class="form-control"><?= $data['description'] ?></textarea>
                                </div>

                                <!-- File upload for new image and display current image -->
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="image" class="form-control">
                                    
                                    <!-- Hidden input to hold current image filename -->
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                    
                                    <!-- Show current image -->
                                    <label for="">Current Image</label>
                                    <img src="../uploads/<?= $data['image'] ?>" alt="Category Image" width="250px" height="250px">
                                </div>

                                <!-- Meta Title -->
                                <div class="col-md-12">
                                    <label for="">Meta title</label>
                                    <!-- NOTE: value attribute is invalid inside a <textarea>; use content between tags -->
                                    <textarea rows="3" name="meta_title" placeholder="Enter meta title" class="form-control"><?= $data['meta_title'] ?></textarea>
                                </div>

                                <!-- Meta Description -->
                                <div class="col-md-12">
                                    <label for="">Meta Description</label>
                                    <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control"><?= $data['meta_description'] ?></textarea>
                                </div>

                                <!-- Meta Keywords -->
                                <div class="col-md-12">
                                    <label for="">Meta Keywords</label>
                                    <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control"><?= $data['meta_keywords'] ?></textarea>
                                </div>

                                <!-- Status checkbox -->
                                <div class="col-md-6">
                                    <label for="">Status</label><br>
                                    <!-- Checked if status is true (1) -->
                                    <input type="checkbox" name="status" <?= $data['status'] ? "checked" : "" ?>>
                                </div>

                                <!-- Popular checkbox -->
                                <div class="col-md-6">
                                    <label for="">Popular</label><br>
                                    <!-- Checked if popular is true (1) -->
                                    <input type="checkbox" name="popular" <?= $data['popular'] ? "checked" : "" ?>>
                                </div>

                                <!-- Submit button -->
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                </div>

                            </div> <!-- End .row -->
                        </form>
                    </div> <!-- End .card-body -->
                </div> <!-- End .card -->

            <?php
                }
                else
                {
                    // If category not found in DB
                    echo "Category not found";
                }
            }
            else
            {
                // If ID is not present in URL
                echo "ID missing from URL";
            }
            ?>
        </div>
    </div>
</div>

<!-- Include footer (closing tags, scripts, etc.) -->
<?php include('includes/footer.php'); ?>
