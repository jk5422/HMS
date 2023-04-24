        <div class="container-fluid bg-dark px-0 sticky-lg-top">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="./index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase"><img src="./logo/hms-removebg-preview.png" alt="HMS" height="70px" width="100%"></h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="./index.php" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase"><img src="./logo/hms-removebg-preview.png" alt="HMS" height="70px" width="100%"></h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="./index.php" class="nav-item nav-link active">Home</a>
                                <a href="./room.php" class="nav-item nav-link">Rooms</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Facilities</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="./library.php" class="dropdown-item">Library</a>
                                        <a href="./gym.php" class="dropdown-item">GYM</a>
                                        <a href="./sports.php" class="dropdown-item">Sports & Games</a>
                                    </div>
                                </div>
                                <a href="./contact.php" class="nav-item nav-link">Contact</a>
                                
                                <a href="./about.php" class="nav-item nav-link">About</a>
                                <?php
                                if(isset($_SESSION['smobile'])){                                
                                echo'
                                <img class="user" src="/HMS/logo/user.png" alt="#"/ ><div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">'.$_SESSION['sname'].'</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="./dashboard.php" class="dropdown-item">Dashboard</a>
                                    <a href="./logout.php" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                                ';
                                }
                                else
                                {
                                    echo '<a href="./login.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Login</a>'; 
                                    
                                }
                                
                            echo '</div>';

                            if(!isset($_SESSION['smobile'])){
                            echo '<a href="./register.php" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Register<i class="fa fa-arrow-right ms-3"></i></a>';
                            }
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        