<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About | HMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/ftcustm.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
       

        <!-- Header Start -->
        <?php include './partial/nav.php';  ?>
        <!-- Header End -->


         <!-- Page Header Start -->
         <div class="container-fluid page-header p-0" style="background-image: url(./poster/about_bg.jpg);width:100%;">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        
        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">About Us</h6>
                    <h1 class="mb-5">Know <span class="text-primary text-uppercase">More</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fas fa-history fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">History</h5>
                            <p class="text-body mb-0">Over the years, our hostel has grown and evolved, but our commitment to providing a unique and affordable travel experience has remained the same. We're proud to have welcomed students from all over the state, and we're always striving to improve our services and facilities to meet the needs of our student.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fas fa-bullseye fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Mission</h5>
                            <p class="text-body mb-0">At our hostel, our mission is to provide a comfortable, safe, and welcoming environment for students from all over the state. We believe that travel is a transformative experience that can broaden our horizons and connect us to new people and cultures. That's why we're committed to creating a space that fosters community, cultural exchange, and personal growth. </p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Community </h5>
                            <p class="text-body mb-0">We believe that hostels have the power to bring students together and create meaningful connections. That's why we organize events and activities that encourage guests to socialize and learn from one another. </p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fas fa-star fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Quality</h5>
                            <p class="text-body mb-0">We believe that affordable accommodation doesn't have to come at the expense of comfort or cleanliness. That's why we maintain high standards of quality in our facilities and services, ensuring that our students have a comfortable and enjoyable stay.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fas fa-universal-access fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Inclusivity</h5>
                            <p class="text-body mb-0">We believe that everyone should feel welcome and respected at our hostel, regardless of their background or identity. We strive to create an inclusive environment that celebrates diversity and promotes understanding.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fas fa-user fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Staff</h5>
                            <p class="text-body mb-0">At our hostel, we pride ourselves on having a friendly and knowledgeable staff that is dedicated to making your stay as comfortable and enjoyable as possible.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        

         <!-- Footer Start -->
         <?php include './partial/footer.php'; ?>
        <!-- Footer End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>