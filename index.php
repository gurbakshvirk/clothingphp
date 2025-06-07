<?php 
// Include necessary files
include('includes/header.php');       // Loads the HTML <head>, navbar, etc.
include('functions/userfunctions.php'); // Contains user-defined functions (e.g., getAllTrending)
include('includes/slider.php');       // Displays the top image slider/banner
?>

<div class="container-fluid overflow-hidden mt-5">
  <div class="row align-items-center">
    <!-- Left Content Column -->
    <div class="col-sm-12 col-md-6 col-lg-6 p-3" data-aos="zoom-in" data-aos-offset="200">
      <h1 class="mb-3 text-center mt-5">About <span class="text-dark">Us</span></h1>
      <p class="mb-3 ">
        "Welcome to ClassicCaveClothing – Where Style Meets Comfort
        <br><br>
        Discover the perfect blend of fashion, quality, and affordability at ClassicCaveClothing. Whether you're looking for everyday essentials or statement pieces, our collection is designed to fit your lifestyle. From casual wear to trendy outfits, we bring you handpicked styles for men, women, and kids – crafted with care and delivered with love.
        <br>
        ✅ Premium Fabrics<br>
        ✅ Trendy & Timeless Designs<br>
        ✅ Affordable Prices<br>
        ✅ Easy Returns & Fast Shipping<br>
        Dress with confidence, express your individuality, and elevate your wardrobe—one outfit at a time."
      </p>
      <button type="button" class="btn btn-light mb-4 mt-4">Explore More</button>

      <!-- Accordion Section -->
      <div class="accordion" id="accordionExample" data-aos="zoom-in-left" data-aos-offset="200">
        <!-- Item 1 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Accordion Item #1
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the
              collapse plugin adds the appropriate classes.
            </div>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Accordion Item #2
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default.
            </div>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Accordion Item #3
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> Same behavior as above.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Image Column -->
    <div class="col-sm-12 col-md-6 col-lg-6 mt-3 text-end" data-aos="zoom-in" data-aos-offset="200">
      <img src="assets/images/image.jpg" class="img-fluid img-thumbnail rightimg" alt="Sport shoes collection">
    </div>
  </div>
</div>









<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center mt-5">Trending Products</h4>
                <hr>
                
                <!-- Start Owl Carousel -->
                <div class="owl-carousel">
                    <?php   
                    // Fetch all trending products from the database
                    $trendingproducts = getAllTrending();

                    // Check if products exist
                    if(mysqli_num_rows($trendingproducts) > 0)
                    {
                        // Loop through each product and display it
                        foreach($trendingproducts as $item){
                    ?>
                        <div class="item">
                            <!-- Product link -->
                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- Product image -->
                                        <img src="uploads/<?= $item['image']; ?>" alt="Product Name" class="w-100">
                                        <!-- Product name -->
                                        <h6 class="text-center"><?= $item['name']; ?></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div> <!-- End owl-carousel -->
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,                  // Enables infinite looping
        margin: 10,                  // Space between items
        nav: true,                   // Shows navigation arrows
        // autoplay: true,              // Auto-scrolls carousel
        autoplayTimeout: 3000,       // 3 seconds between slides
        autoplayHoverPause: true,    // Pause carousel when mouse hovers
        responsive: {                // Items per screen width
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
