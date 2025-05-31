<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<!doctype html>
<html lang="en">

              <head>

              <!-- required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- <link href="assets/css/custom.css" rel="stylesheet"> -->

                
                <!-- bootstrap css -->
                
                <link href="assets/css/bootstrap.min.css" rel="stylesheet">
                <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
                <link href="assets/css/owl.carousel.min.css" rel="stylesheet"> 

                <!-- <link rel="stylesheet" href="admin/assets/css/custom.css"> -->
            <!-- <link href="assets/css/custom.css" rel="stylesheet"> -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <title>Hello world</title>

                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Miniver&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
           
           
                <!-- alertify js css -->
                  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>

            <!-- bootstrap alertify  -->
                  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
                
                <style>
                  
                  .product-card img{
                    height: 250px;
                    object-fit: cover;

                  }

                  .custom-navbar {
                    height: 80px; /* adjust as needed */
                  }

                  .custom-navbar .navbar-brand,
                  .custom-navbar .nav-link,
                  .custom-navbar .dropdown-toggle {
                    line-height: 80px;  /* vertically center text */
                    padding-top: 0;
                    padding-bottom: 0;
                  }




                  .custom-navbar {
  transition: background-color 0.4s ease, box-shadow 0.4s ease;
  height: 80px;
}

.custom-navbar .navbar-brand,
.custom-navbar .nav-link,
.custom-navbar .dropdown-toggle {
  line-height: 80px;
  padding-top: 0;
  padding-bottom: 0;
}

/* Transparent background initially */
.navbar-transparent {
  background-color: rgba(0, 0, 0, 0.0); /* Fully transparent */
  box-shadow: none;
}

/* Solid background on scroll */
.navbar-scrolled {
  background-color: #212529; /* Bootstrap dark */
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}





                </style>
              
              </head>
        <body>
<?php include('navbar.php');?>
