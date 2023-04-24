<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hostel Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

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
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <div class="container bg-white p-0">
        
        <!-- Header Start -->
        <?php include './partial/nav.php';  ?>
        <!-- Header End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="./poster/library_discuss-transformed.jpeg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">HMS</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Life is too short to live in a hostel!
                                </h1>
                                <a href="#facilities" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Facilities</a>
                                <a href="./dashboard.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Admission Inquiry</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="./poster/outside.jpg " alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">HMS</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Hostel life is all about the journey, not the destination.
                                </h1>
                                <a href="#facilities" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Facilities</a>
                                <a href="./dashboard.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Admission Inquiry</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Booking Start -->
        <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow" style="padding: 30px;">
                    <h6 class="section-title  text-primary text-uppercase" style="margin-left: 50px;">Admission Process</h6>
                    <div class="row g-2">
                        <img src="./poster/ADMISSION-PR_1.jpg" alt="Admission Process" height="250px" width="100%">

                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4 word">Welcome to <span class="text-primary text-uppercase">HMS</span></h1>
                        

                        <p class="mb-4"> Hostel facilities can be an excellent option for students, offering a variety of benefits that can enhance their overall student life experience.</p>
                        <div class="row g-3 pb-4">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <b class="text-dark">Why Student choose hostel facilities during their studies ?</b>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ol>
                                                <li>Safe and Secure Environment: We understand that safety is a top priority for students, which is why we have implemented several security measures to ensure the safety of our residents. Our hostel is equipped with security cameras, and our staff is available around the clock to ensure that students feel secure and protected at all times.</li>
                                                <li>
                                                Academic Support: We understand that studying can be stressful, which is why we offer a supportive environment for students. Our hostel has designated study areas, high-speed internet access, and a library that students can use to help them excel academically.
                                                </li>
                                                <li>
                                                Affordable Prices: We believe that students should have access to quality housing at an affordable price. That's why we offer competitive rates and flexible payment options to help students manage their expenses while they study.
                                                </li>
                                                <li>
                                                Community Building: We believe that building a sense of community is crucial for students during their studnet life. We offer several social events and activities that encourage students to connect with one another, develop new friendships, and learn about different cultures and backgrounds.
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="./poster/Boys-Hostel.webp" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="./poster/area.jfif">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="./poster/hostel-hacks.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="./poster/L-2.webp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->





        <!-- Service Start -->
        <div class="container-xxl py-5" id="facilities">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Facilities</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Facilities</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-hotel fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Rooms & Appartment</h5>
                            <p class="text-body mb-0">All our hostel rooms are air-conditioned, ensuring a comfortable stay even during hot summer months and Our hostel rooms and apartments are cleaned and maintained daily to ensure a clean and hygienic environment for our students.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Mess Facility</h5>
                            <p class="text-body mb-0">Our hostel mess is open for breakfast, lunch, and dinner, providing students with delicious meals throughout the day and We offer a variety of meal options to cater to different dietary requirements and preferences. </p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fas fa-book-reader"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Library </h5>
                            <p class="text-body mb-0">Our hostel provides a well-stocked library for studentsto enjoy during their stay and We offer a variety of books, magazines, and newspapers in our library to cater to different interests and preferences. </p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-swimmer fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Sports & Gaming</h5>
                            <p class="text-body mb-0">We offer indoor and outdoor sports facilities, including a table tennis, football, and vollyball and We have a dedicated sports and games coordinator who manages the facilities and organizes events and activities for students.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="far fa-handshake"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Event & Celebration</h5>
                            <p class="text-body mb-0">Our event facilities are well-decorated and equipped with audio-visual equipment to provide a festive and enjoyable environment for students and Our event facilities can accommodate a range of group sizes, from small intimate gatherings to large parties.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-dumbbell fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">GYM & Yoga</h5>
                            <p class="text-body mb-0">Our hostel provides a well-equipped gym and yoga studio for studnets to maintain their fitness and wellness routines during their stay and We offer a range of fitness equipment, including treadmills, weight machines, and exercise bikes, in our gym to cater to different workout needs.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- Testimonial Start -->
        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5">
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/hostel.jpg" style="width: 100%; height: 200px;"></p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Rooms</h6>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/d_1.jfif" style="width: 100%; height: 200px;"></p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Mess Facility</h6>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/L-1.jpg" style="width: 100%; height: 200px;"></p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Library</h6>
                            </div>
                        </div>
                    </div>


                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/h5.jpg" style="width: 100%; height: 200px;"></p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Sports & Games</h6>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/gym.png" style="width: 100%; height: 200px;"></p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">GYM Facilities</h6>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p><img class="img-fluid flex-shrink-0 rounded" src="./poster/conference-1.png" style="width: 100%; height: 200px;"></p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Conference Hall</h6>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Video Start -->
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Hostel life</h6>
                        <h1 class="text-white mb-4">We've got to keep moving</h1>
                        <p class="text-white mb-4">Living with peers from different academic backgrounds and courses, allows you the exchange of knowledge and ideas you will otherwise miss. This exchange of information keeps happening in the background and trains you in skills you didn’t know you needed! When your roomies come back home and tell you what they learnt in their class today – you become a passive learner! This has to be the best way of learning – learning while you have fun! So, you become a master of so many trades while you don’t even notice that you’re learning!</p>
                        <a href="./about.php" class="btn btn-primary py-md-3 px-md-5 me-3">Know more</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                        <img src="./poster/gdiscuss-transformed.jpeg" height="100%" width="100%" alt="hostel life">
                        <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1" style="background-color:orange;">
                    <div class="border rounded text-center p-1" style="background-color:navy;">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4 section-title contact">CONTACT <span class="text-primary text-uppercase">US</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <img src="./poster/contact-transformed.jpeg" alt="Contact us" height="80px" width="150px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->


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
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- main page js -->
    <script src="js/main.js"></script>
</body>

</html>