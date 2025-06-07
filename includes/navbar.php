<!-- Navbar Component -->
<!-- This is a sticky-top, responsive, dark-themed Bootstrap 5 navbar with session-based login handling -->

<!-- Optional: Previously used version with bg-dark -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark shadow custom-navbar"> -->

<!-- Updated version: sticky-top transparent navbar with custom shadow and optional styling -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow custom-navbar transparent-navbar" id="mainNavbar">

  <!-- Container ensures responsive spacing -->
  <div class="container">

    <!-- Brand/Logo link -->
     <a class="navbar-brand" href="index.php">
       <img src="assets/images/Classic2.png" alt="ClassicCave Logo" class="logo-img">
     </a>

    <!-- <a class="navbar-brand" href="index.php"><img src="assets/images/Classic.png" alt=""></a> -->

    <!-- Hamburger menu icon for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible Navbar Menu -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <!-- Align navbar items to the right (end) -->
      <ul class="navbar-nav ms-auto">

        <!-- Home link -->
        <li class="nav-item nav-link">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <!-- Collections/Categories page -->
        <li class="nav-item nav-link">
          <a class="nav-link" href="categories.php">Categories</a>
        </li>

        <!-- Shopping Cart page -->
        <li class="nav-item nav-link">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>

        <?php
        // Check if the user is logged in
        if(isset($_SESSION['auth'])) 
        {
        ?>
        <!-- If authenticated, show dropdown menu with user's name -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['AUTH_USER']['name']; ?> <!-- Display logged-in user's name -->
          </a>

          <!-- Dropdown menu with links -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">About Us</a></li>
            <li><a class="dropdown-item" href="#">Contact Support</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li> <!-- Logout option -->
          </ul>
        </li>
        <?php
        }
        else
        {
        // If not logged in, show Register and Login links
        ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php
        }
        ?>
        
      </ul>
    </div>
  </div>
</nav>
