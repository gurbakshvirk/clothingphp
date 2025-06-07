<!-- Footer Section -->
<!-- <footer class="bg-dark text-light pt-4 pb-3 mt-5"> -->
<footer class="footercustom text-light pt-4 pb-3 mt-5">

  <div class="container">
    <div class="row">

      <!-- About Section -->
      <div class="col-md-4">
        <h5>About ClassicCave</h5>
        <p>
          ClassicCave Clothing blends timeless fashion with modern design.
          We're committed to offering high-quality, stylish wear that reflects your unique personality.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <!-- Internal navigation links -->
          <li><a href="index.php" class="text-light text-decoration-none">Home</a></li>
          <li><a href="categories.php" class="text-light text-decoration-none">Shop</a></li>
          <li><a href="/about" class="text-light text-decoration-none">About Us</a></li>
          <li><a href="/contact" class="text-light text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Information -->
      <div class="col-md-4">
        <h5>Contact Us</h5>
        <p>Email: support@classiccave.in</p>
        <p>Phone: +91-98765-43210</p>
        <p>Location: Mumbai, India</p>
      </div>
    </div>

    <!-- Horizontal Divider -->
    <hr class="bg-light">

    <!-- Copyright -->
    <div class="text-center">
      <p class="mb-0">&copy; 2025 ClassicCave Clothing. All Rights Reserved.</p>
    </div>
  </div>
</footer>
<!-- jQuery (required by many plugins including Bootstrap and Owl Carousel) -->
<script src="assets/js/jquery-3.7.1.min.js"></script>

<!-- Bootstrap JS bundle (includes Popper.js for tooltips and dropdowns) -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS file for site-specific scripts -->
<script src="assets/js/custom.js"></script>

<!-- Owl Carousel plugin for sliders -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- AlertifyJS: For non-blocking notifications (toast messages) -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<script>
  // Set Alertify notification position to top-right
  alertify.set('notifier', 'position', 'top-right');

  <?php
  // If a session message is set, show it as a success toast
  if(isset($_SESSION['message'])) {
  ?> 
      alertify.success('<?= $_SESSION['message']; ?>');
  <?php
      // Clear the message after displaying to prevent repetition
      unset($_SESSION['message']);
  }
  ?>
</script>
