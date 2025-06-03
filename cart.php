<?php 
// session_start();
include('includes/header.php'); 
include('functions/userfunctions.php'); 
// include('includes/slider.php'); 

?>
<div class="py-3 bg-secondary">
    <div class="container">

        <h6 class="text-white">
            <a href="index.php" class="text-white">
               Home / 
            </a>
         <a href="cart.php" class="text-white">
              Cart
         </a>
        </h6>


    </div>
</div>




<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
        
                <?php $items = getCartItems();
                foreach ($items  as $citem){
                    echo $citem['name'];
                }
                
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<!-- <script>

    $(document).ready(function(){

   
    $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,          
    autoplayTimeout: 3000,    
    autoplayHoverPause: true, 
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
    });


    });    
    
</script> -->

