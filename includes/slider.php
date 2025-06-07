<!-- Bootstrap Carousel with Autoplay and Captions -->
<!-- This carousel cycles through three promotional slides automatically every 2 seconds -->

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="1000">
  
  <!-- Carousel Indicators (navigation dots at the bottom) -->
  <!-- These let users jump to a specific slide -->
  <div class="carousel-indicators">
    <!-- First dot: active by default -->
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <!-- Second dot -->
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <!-- Third dot -->
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Carousel Slides -->
  <div class="carousel-inner">

    <!-- First Slide: Active on load -->
    <div class="carousel-item active" data-bs-interval="2000"> <!-- This slide lasts 2 seconds -->
      <!-- Slide Image -->
      <img src="assets/images/newslide1.jpg" class="d-block w-100 img-fluid" alt="Latest Trends"
           style="height: 70vh; object-fit: cover;">
      <!-- Caption (visible only on medium+ screens) -->
      <div class="carousel-caption d-none d-md-block">
        <h2 style="color:white">Latest Trends</h2>
        <p style="color:white">Explore now</p>
      </div>
    </div>

    <!-- Second Slide -->
    <div class="carousel-item" data-bs-interval="2000">
      <img src="assets/images/slideimage2.jpg" class="d-block w-100 img-fluid" alt="Upto 30% OFF"
           style="height: 70vh; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h2 style="color:white">Upto 30% OFF</h2>
        <p style="color:white">Newest Arrivals.</p>
      </div>
    </div>

    <!-- Third Slide -->
    <div class="carousel-item" data-bs-interval="2000"> <!-- This slide lasts 2 second -->
      <img src="assets/images/slideimage3.jpg" class="d-block w-100 img-fluid" alt="Top Brands"
           style="height: 70vh; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h2 style="color:white">Top Brands</h2>
        <p style="color:white">Shop now.</p>
      </div>
    </div>
  </div>

  <!-- Navigation Controls -->
  <!-- Previous Button -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span> <!-- For screen readers -->
  </button>

  <!-- Next Button -->
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span> <!-- For screen readers -->
  </button>

</div>
