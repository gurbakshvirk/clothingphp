<?php 

// session_start(); // Uncomment only if session is not already started elsewhere

// Include common header (navigation, styles, etc.)
include('includes/header.php'); 

// Include functions for product/user/cart operations
include('functions/userfunctions.php'); 

// Checks if the user is authenticated (usually redirects to login if not)
include('authenticate.php'); 
?>
<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Home / </a>
            <a href="cart.php" class="text-white">Cart</a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
<div class="row">
    <div class="col-md-12">
        <div class="row align-items-center">
            <div class="col-md-5"><h6>Product</h6></div>
            <div class="col-md-3"><h6>Price</h6></div>
            <div class="col-md-2"><h6>Quantity</h6></div>
            <div class="col-md-2"><h6>Remove</h6></div>
        </div>
        <hr>
<div id="my-cart">
<?php 
    // Fetch all cart items for the logged-in user
    $items = getCartItems();

    // Loop through each item and display
    foreach ($items as $citem) {
?>
<div class="card product_data shadow-sm mb-2">
    <div class="row align-items-center">
        <!-- Product Image -->
        <div class="col-md-2">
            <img src="uploads/<?= $citem['image'] ?>" alt="image" class="w-75">
        </div>

        <!-- Product Name -->
        <div class="col-md-3">
            <h5><?= $citem['name'] ?></h5>
        </div>

        <!-- Product Price -->
        <div class="col-md-3">
            <h5>Rs.<?= $citem['selling_price'] ?></h5>
        </div>

        <!-- Quantity Controls -->
        <div class="col-md-2">
            <!-- Hidden input to hold the product ID for quantity updates -->
            <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">

            <!-- Quantity increment/decrement buttons -->
            <div class="input-group mb-3" style="width:130px">
                <button class="input-group-text decrement-btn updateQty">-</button>
                <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled>
                <button class="input-group-text increment-btn updateQty">+</button>
            </div>
        </div>

        <!-- Remove Button -->
        <div class="col-md-2">
            <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                <i class="fa fa-trash me-2"></i>Remove
            </button>
        </div>
    </div>
</div>
<?php } // End of foreach ?>
</div> <!-- End of #my-cart -->
</div> <!-- .col-md-12 -->
</div> <!-- .row -->
</div> <!-- .card-body -->
</div> <!-- .container -->
</div> <!-- .py-5 -->
<?php include('includes/footer.php'); ?>
