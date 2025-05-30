<?php 
session_start();
include('includes/header.php');  
include('../middleware/adminMiddleware.php');  

?> 

<div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h4>Products</h4>
            </div>
            <div class="card-body">
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
                        $products = getAll("products");

                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                    <tr>
                                        <td><?= $item['id'];?></td>
                                        <td><?= $item['name'];?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image'];?>" width="80px" height="80px" alt="<?= $item['name'];?>">
                                        </td>
                                        <td><?= $item['status'] == '0' ? "Visible" : "Hidden" ?></td>
                                        <td>
                                            <a href="edit-products.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id'];?>">Delete</button>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
         </div>
      </div>
    </div>

<?php include('includes/footer.php'); ?>
