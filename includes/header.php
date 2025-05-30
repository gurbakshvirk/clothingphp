<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<!doctype html>
<html lang="en">

              <head>

              <!-- required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- bootstrap css -->
                <link href="assets/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="admin/assets/css/custom.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <title>Hello world</title>

                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Miniver&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
                <style>
                  .product-card img{
                    height: 250px;
                    object-fit: cover;

                  }


                </style>
              
              </head>
        <body>
<?php include('navbar.php');?>