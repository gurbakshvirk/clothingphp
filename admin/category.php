<?php 
// Include the admin panel header file (for HTML layout, CSS, JS links, etc.)
include('includes/header.php');  

// Include a middleware script that likely checks if the current user is an admin
include('../middleware/adminMiddleware.php');  
?> 

<!-- Start of the container holding the page content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Bootstrap Card for a nice box layout -->
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4> <!-- Card heading -->
                </div>
                <div class="card-body">
                    <!-- Table to display all categories -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>          <!-- Category ID -->
                                <th>Name</th>        <!-- Category Name -->
                                <th>Image</th>       <!-- Category Image -->
                                <th>Status</th>      <!-- Visibility Status -->
                                <th>Action</th>      <!-- Edit/Delete Buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch all rows from the "categories" table using a custom function
                            $category = getAll("categories");

                            // Check if any categories exist
                            if(mysqli_num_rows($category) > 0)
                            {
                                // Loop through each category and output a table row
                                foreach($category as $item)
                                {
                                    ?>
                                        <tr>
                                            <!-- Category ID -->
                                            <td><?= $item['id'];?></td>
                                            
                                            <!-- Category Name -->
                                            <td><?= $item['name'];?></td>
                                            
                                            <!-- Category Image (displayed from uploads folder) -->
                                            <td>
                                                <img src="../uploads/<?= $item['image'];?>" 
                                                     width="80px" height="80px" 
                                                     alt="<?= $item['name'];?>">
                                            </td>
                                            
                                            <!-- Show 'visible' if status is 0, otherwise 'hidden' -->
                                            <td><?= $item['status'] == '0' ? "visible" : "hidden" ?></td>
                                            
                                            <!-- Edit and Delete Buttons -->
                                            <td>
                                                <!-- Link to edit the category (passes ID in URL) -->
                                                <a href="edit-category.php?id=<?= $item['id'];?>" 
                                                   class="btn btn-primary">Edit</a>

                                                <!-- Form to delete the category using POST -->
                                                <form action="code.php" method="POST" style="display:inline-block">
                                                    <!-- Hidden input to send category ID -->
                                                    <input type="hidden" name="category_id" value="<?= $item['id'];?>">
                                                    
                                                    <!-- Delete button with POST submission -->
                                                    <button type="submit" class="btn btn-danger" name="delete_category_btn">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                // If no categories found, you can optionally show a message here
                                echo "<tr><td colspan='5'>No categories found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include footer layout with possible closing tags and scripts -->
<?php include('includes/footer.php'); ?>
