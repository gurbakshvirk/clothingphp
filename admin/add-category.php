<?php 
// Include the admin header (common HTML head, navbar, etc.)
include('includes/header.php');  

// Include middleware to ensure only logged-in admins can access this page
include('../middleware/adminMiddleware.php');  
?> 

<!-- Main container for the form -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Bootstrap card component -->
            <div class="card">
                <div class="card-header">
                    <!-- Card title -->
                    <h4>Add Category</h4>
                </div>

                <div class="card-body">
                    <!-- Form to submit category details -->
                    <!-- 'multipart/form-data' allows file uploads -->
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <!-- Category Name input -->
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Category Name" class="form-control">
                            </div>

                            <!-- Slug input (used in URLs) -->
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" name="slug" placeholder="Enter slug" class="form-control">
                            </div>

                            <!-- Description textarea -->
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter description" class="form-control"></textarea>
                            </div>

                            <!-- Image upload input -->
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <!-- Meta Title textarea (for SEO) -->
                            <div class="col-md-12">
                                <label for="">Meta title</label>
                                <textarea rows="3" name="meta_title" placeholder="Enter meta title" class="form-control"></textarea>
                            </div>

                            <!-- Meta Description textarea (for SEO) -->
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control"></textarea>
                            </div>

                            <!-- Meta Keywords textarea (for SEO) -->
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control"></textarea>
                            </div>

                            <!-- Status checkbox (checked = active, unchecked = inactive) -->
                            <div class="col-md-6">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status">
                            </div>

                            <!-- Popular checkbox (optional: if checked, highlight this category) -->
                            <div class="col-md-6">
                                <label for="">Popular</label><br>
                                <input type="checkbox" name="popular">
                            </div>

                            <!-- Submit button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                            </div>

                        </div> <!-- End of row -->
                    </form>
                </div> <!-- End of card-body -->
            </div> <!-- End of card -->
        </div> <!-- End of col -->
    </div> <!-- End of row -->
</div> <!-- End of container -->

<!-- Include admin footer (scripts, closing tags, etc.) -->
<?php include('includes/footer.php'); ?>
