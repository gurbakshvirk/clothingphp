<?php 
// session_start();
include('includes/header.php'); 
include('functions/userfunctions.php'); 
include('includes/slider.php'); 

?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <hr>
               
                    <div class="owl-carousel">
                        <?php   
                        $trendingproducts = getAllTrending();
                        if(mysqli_num_rows($trendingproducts) > 0)
                        {
                            foreach($trendingproducts as $item){
                                ?>
                                <div class="item">
                                <a href="product-view.php?product=<?=$item['slug'];?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Product Name " class="w-100">
                                                <h6 class="text-center"><?= $item['name']; ?></h6s>
                                            </div>
                                        </div>
                                </a>
                                 </div>
                            <?php
                            }
                        }
                        ?>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <span class="underline"></span>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores quis nemo vero distinctio. Eaque voluptas cumque eos, quidem voluptatem aperiam veritatis rem. Asperiores beatae ut repellat consectetur quo. Mollitia, molestiae?
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-white">ClassicCave</h4>
                <span class="underline mb-2"></span>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores quis nemo vero distinctio. Eaque voluptas cumque eos, quidem voluptatem aperiam veritatis rem. Asperiores beatae ut repellat consectetur quo. Mollitia, molestiae?
                </p>
            </div>
        </div>
    </div>
</div>







<?php include('includes/footer.php'); ?>
<script>

    $(document).ready(function(){

    // $('.owl-carousel').owlCarousel({
    // loop:true,
    // margin:10,
    // nav:true,
    // responsive:{
    //     0:{
    //         items:1
    //     },
    //     600:{
    //         items:3
    //     },
    //     1000:{
    //         items:5
    //     }
    // }
    // })
    $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,           // Enables auto scrolling
    autoplayTimeout: 3000,    // Time between slides in milliseconds (3 seconds)
    autoplayHoverPause: true, // Pause on mouse hover
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
    
</script>

