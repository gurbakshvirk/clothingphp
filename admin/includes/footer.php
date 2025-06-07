  </main> <!-- End of the main content area opened earlier -->
  <!-- Footer Section Begins -->
  <footer class="footer mt-auto pt-4 bg-light">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <!-- Footer Navigation Links (Centered on all screen sizes) -->
          <ul class="nav nav-footer justify-content-center">
            <li class="nav-item">
              <a href="#" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link pe-0 text-muted" target="_blank">About</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section Ends -->
<!-- jQuery library -->
<script src="./assets/js/jquery-3.7.1.min.js"></script>

<!-- Bootstrap bundle includes Popper (for dropdowns, modals, tooltips) -->
<script src="./assets/js/bootstrap.bundle.min.js"></script>

<!-- Custom scrollbar plugins -->
<script src="./assets/js/perfect-scrollbar.min.js"></script>
<script src="./assets/js/smooth-scrollbar.min.js"></script>

<!-- SweetAlert for nice popup alerts -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Your custom JS logic (example: UI interactions, AJAX requests, etc.) -->
<script src="./assets/js/custom.js"></script>
<!-- Material Dashboard Core JS for interactive sidebar, etc. -->
<script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
<!-- These scripts are commented out, not necessary if using bundle -->
<!-- <script src="../assets/js/core/popper.min.js"></script> -->
<!-- <script src="../assets/js/core/bootstrap.min.js"></script> -->
<!-- <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script> -->
<!-- <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> -->
<!-- Alertify.js for clean toast-style alerts -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<script>
  <?php
  // If a message is set in session (e.g., "Product added successfully")
  if(isset($_SESSION['message']))
  {
  ?>
    // Set Alertify notification to appear in top-right
    alertify.set('notifier','position', 'top-right');

    // Display the message using Alertify
    alertify.success('<?= $_SESSION['message']; ?>');

    // Clear the message from session after displaying
    <?php unset($_SESSION['message']); ?>
  <?php
  }
  ?>
</script>
</body>
</html>
