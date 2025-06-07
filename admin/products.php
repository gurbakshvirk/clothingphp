<?php 
// Start the session to manage user sessions and flash messages
session_start();

// Include the admin dashboard's header file (for HTML structure, Bootstrap, etc.)
include('includes/header.php');  

// Include middleware to check if the user is an admin; prevents unauthorized access
include('../middleware/adminMiddleware.php');  
?> 

<!-- Main content area -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <!-- Card box to display the product table -->
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>

                <div class="card-body">
                    <!-- Products Table -->
                    <table class="table table-bordered" id="products_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // Fetch all products using the getAll() function (defined in myfunctions.php)
                            $products = getAll("products");

                            // Check if any products were returned
                            if(mysqli_num_rows($products) > 0)
                            {
                                // Loop through each product and display its details
                                foreach($products as $item)
                                {
                                    ?>
                                    <tr>
                                        <!-- Display product ID -->
                                        <td><?= $item['id']; ?></td>

                                        <!-- Display product name -->
                                        <td><?= $item['name']; ?></td>

                                        <!-- Display product image (from uploads folder) -->
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="80px" height="80px" alt="<?= $item['name']; ?>">
                                        </td>

                                        <!-- Show "Visible" if status is 0, else "Hidden" -->
                                        <td><?= $item['status'] == '0' ? "Visible" : "Hidden" ?></td>

                                        <!-- Edit button linking to edit page with product ID -->
                                        <td>
                                            <a href="edit-products.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>

                                        <!-- Delete button (uses JS event listener via class) -->
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                // Display message if no products found
                                echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div> <!-- End card-body -->
            </div> <!-- End card -->

        </div>
    </div>
</div>

<!-- Include the footer (scripts, closing HTML tags, etc.) -->
<?php include('includes/footer.php'); ?> 
