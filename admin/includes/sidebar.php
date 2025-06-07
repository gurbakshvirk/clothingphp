<!-- Side navigation bar starts here -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">

  <!-- Header section of the sidebar -->
  <div class="sidenav-header">
    <!-- Close icon for small screens (clicking hides the sidebar) -->
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>

    <!-- Brand/logo section -->
    <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
      <!-- Logo (commented out) -->
      <!-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->

      <!-- Brand name -->
      <span class="ms-1 fw-bold text-white">Hello Admin!</span>
    </a>
  </div>

  <!-- Divider line -->
  <hr class="horizontal light mt-0 mb-2">

  <!-- Sidebar menu navigation links -->
  <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <!-- Dashboard link -->
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <!-- Icon can be placed here -->
            <i class="material-icons opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <!-- View All Categories link -->
      <li class="nav-item">
        <a class="nav-link text-white" href="category.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">ALL Categories</span>
        </a>
      </li>

      <!-- Add Category link -->
      <li class="nav-item">
        <a class="nav-link text-white" href="add-category.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Add Category</span>
        </a>
      </li>

      <!-- View All Products link -->
      <li class="nav-item">
        <a class="nav-link text-white" href="products.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">ALL Products</span>
        </a>
      </li>

      <!-- Add Product link -->
      <li class="nav-item">
        <a class="nav-link text-white" href="add-product.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Add Products</span>
        </a>
      </li>

    </ul>
  </div>

  <!-- Footer section with Logout button -->
  <div class="sidenav-footer position-absolute w-100 bottom-0">
    <div class="mx-3">
      <!-- Logout button that redirects to logout.php -->
      <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php" type="button">
        Logout  
      </a>
    </div>
  </div>
</aside>
