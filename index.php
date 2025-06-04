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



<!-- <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <span class="underline"></span>
                <p>
                    Welcome to ClassicCave Clothing – where timeless fashion meets modern style.
                    Founded with a passion for quality, comfort, and individuality,
                    ClassicCave is more than just a clothing brand — it's a lifestyle.
                    We believe in creating pieces that speak to your confidence and reflect your unique personality.
                    Whether you're dressing up or keeping it casual, our collection is designed to make you look and feel your best.
                     At ClassicCave, every stitch tells a story of craftsmanship and care.
                    
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores quis nemo vero distinctio. Eaque voluptas cumque eos, quidem voluptatem aperiam veritatis rem. Asperiores beatae ut repellat consectetur quo. Mollitia, molestiae?
                 Join us in redefining classic fashion with a fresh perspective.
                </p>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="py-5 bg-dark"> -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-white">ClassicCave</h4>
                <span class="underline mb-2"></span>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores quis nemo vero distinctio. Eaque voluptas cumque eos, quidem voluptatem aperiam veritatis rem. Asperiores beatae ut repellat consectetur quo. Mollitia, molestiae?
                </p>
            </div>
        </div>
    </div> -->
    <!-- <footer class="bg-dark text-light pt-4 pb-3 mt-5">
  <div class="container">
    <div class="row">
      About
      <div class="col-md-4">
        <h5>About ClassicCave</h5>
        <p>ClassicCave Clothing blends timeless fashion with modern design. We're committed to offering high-quality, stylish wear that reflects your unique personality.</p>
      </div>

      Quick Links
      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="/" class="text-light text-decoration-none">Home</a></li>
          <li><a href="/shop" class="text-light text-decoration-none">Shop</a></li>
          <li><a href="/about" class="text-light text-decoration-none">About Us</a></li>
          <li><a href="/contact" class="text-light text-decoration-none">Contact</a></li>
        </ul>
      </div>

      Contact Info
      <div class="col-md-4">
        <h5>Contact Us</h5>
        <p>Email: support@classiccave.in</p>
        <p>Phone: +91-98765-43210</p>
        <p>Location: Mumbai, India</p>
      </div>
    </div>

    <hr class="bg-light">

    <div class="text-center">
      <p class="mb-0">&copy; 2025 ClassicCave Clothing. All Rights Reserved.</p>
    </div>
  </div>
</footer> -->

<!-- </div> -->







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
    autoplay: true,          // Enables auto scrolling
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

