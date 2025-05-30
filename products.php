<?php 
// session_start();
include('functions/userfunctions.php');
include('includes/header.php'); 
$category_slug= $_GET['category'];

$category_slug = $_GET['category'];
$category_data = getSlugActive("categories", $category_slug);

if ($category_data && mysqli_num_rows($category_data) > 0)
 {
    $category = mysqli_fetch_array($category_data);
    $cid = $category['id'];

} else {
    echo "<h4>Category Not Found</h4>";
    include('includes/footer.php');
    exit();
}


?>
<div class="py-3 bg-primary ">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="categories.php">
                 Home / 
           </a>    
            <a class="text-white" href="categories.php">
                    Collections/
            </a>
            <?= $category['name'];?>
        </h6>
    </div>
</div> 


        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                     <h1><?= $category['name'];?></h1>
                     <hr>
                     <div class="row">
                     <!-- <button class="btn btn-primary">testing</button> -->
                    <?php 




                    $products = getProdByCategory($cid);
                    
                    if(mysqli_num_rows($products) > 0)
                    {
                        foreach($products as $item)
                        {
                            ?>
                            <div class="col-md-3 col-sm-6">
                                <a href="product-view.php?product=<?=$item['slug'];?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Product Name " class="w-100">
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
                        echo "No category Available!";
                    }
                    ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
                


<?php include('includes/footer.php');?>

