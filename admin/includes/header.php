<?php
// Start a PHP session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags for character encoding and responsive behavior -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Linking stylesheets -->
  <!-- [!] NOTE: 'assets/css/.min.css' seems incorrect or incomplete; consider removing or correcting -->
  <link href="assets/css/.min.css" rel="stylesheet"> <!-- Possibly a mistake -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
  <link href="assets/css/custom.css" rel="stylesheet"> <!-- Your custom styles -->

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

  <!-- Page Title -->
  <title>Classic Clothing</title>

  <!-- Google Fonts Preconnect for faster loading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Google Fonts - Miniver, Poppins, Roboto -->
  <link href="https://fonts.googleapis.com/css2?family=Miniver&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Google Fonts - Roboto and Roboto Slab for Material Design -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons (Google) -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Optional Rounded Material Symbols -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />

  <!-- Main Dashboard Style (Material UI) -->
  <link id="pagestyle" href="assets/css/material-dashboard.min.css?v=3.0.0" rel="stylesheet" />

  <!-- AlertifyJS styles for notifications and alerts -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>

  <!-- Custom inline form control styling -->
  <style>
    .form-control {
      border: 1px solid #b3a1a1 !important;
      padding: 8px 10px;
    }
    .form-select {
      border: 1px solid #b3a1a1 !important;
      padding: 8px 10px;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-200 d-flex flex-column min-vh-100">
<!-- Including the sidebar menu (admin navigation) -->
<?php include('sidebar.php'); ?>
<!-- Main content container -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Including the top navigation bar (admin navbar) -->
  <?php include('navbar.php'); ?>
