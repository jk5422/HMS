<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rooms | HMS </title>
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
        <div class="container-fluid page-header p-0" style="background-image: url(./poster/rooms_bg.jpg);width:100%;">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


       


       <!-- Video Start -->
       <div class="container-xxl py-4  px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">

                <div class="col-md-6">
                    <div class="video">
                            <img src="./poster/hostel.jpg" height="100%" width="100%" alt="hostel life">
                            <span></span>
                        </button>
                    </div>
                </div>

                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Explore our rooms</h6>
                        <h1 class="text-white mb-4">Rooms facilities</h1>
                        <ol class="text-white">
                            <li>Bed and Mattress:- Each room should have a bed with a comfortable     mattress to ensure a good night's sleep.</li>
                            <li>Study Table and Chair:- A study table and chair are essential for students to study and do their homework.</li>
                            <li>Lighting:- Adequate lighting should be provided in each room for reading and studying.</li>
                            <li>Electrical Outlets:- Sufficient electrical outlets should be installed in each room to allow students to charge their devices and use electronics.</li>
                            <li>Ceiling Fan/Air Conditioning:- Depending on the climate, rooms should have either a ceiling fan or air conditioning to ensure comfort during hot weather.</li>
                            <li>Cleaning and Maintenance:- Regular cleaning and maintenance of rooms should be provided to ensure a hygienic and safe living environment.</li>
                            
                        </ol>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="container-xxl testimonial1 my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5">

                    <div class="testimonial-item position-relative border rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/r-6.jpg" style="width: 100%; height: 250px;"></p>    
                    </div>

                    <div class="testimonial-item position-relative border rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/r-5.jpg" style="width: 100%; height: 250px;"></p>    
                    </div>

                    <div class="testimonial-item position-relative border rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/r-4.webp" style="width: 100%; height: 250px;"></p>    
                    </div>


                    <div class="testimonial-item position-relative border rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/r-3.webp" style="width: 100%; height: 250px;"></p>    
                    </div>

                    <div class="testimonial-item position-relative border rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/R-2.jpg" style="width: 100%; height: 250px;"></p>    
                    </div>

                    <div class="testimonial-item position-relative border rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/R-1.jpg" style="width: 100%; height: 250px;"></p>    
                    </div>

                    

                </div>
            </div>
        </div>

       


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