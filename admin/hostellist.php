<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['empemail']))
{
    header("location: ./index.php");
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $hname = $_POST['hname'];
    $hmobile = $_POST['hmobile'];
    $hemail=$_POST['hemail'];
    $haddress=$_POST['haddress'];
    $hcity=$_POST['hcity'];

    if ($hname != "" && $hmobile != "" && $hemail!="" && $haddress!="" && $hcity!="") 
    {

        
           $sql2="INSERT INTO `hostel`(`hname`, `haddress`, `hmobile`, `hemail`, `City_ctid`) VALUES ('$hname','$haddress','$hmobile','$hemail','$hcity')";
            $res2=mysqli_query($conn,$sql2);
            if($res2){
                echo '<div class="alert alert-success">
            <strong>Success! </strong> Hostel Added Successfully..!!
            </div>';
            }

        
        
    } 
    else {
        echo '<div class="alert alert-warning">
        <strong>Error! </strong> Please fill all required filed..!!
        </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap513.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <link rel="stylesheet" href="./css/ststyle.css">
    <link rel="stylesheet" href="./css/stresponsive.css">
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="./css/allroom.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <title>Hostels | HMS</title>
</head>

<body>

    <!-- header start-->

    <?php include './header.php'; ?>
    <!-- header end -->

    <div class="main-container">
        <!-- sidebar start -->
        <?php include './sidebar.php'; ?>
        <!-- sidebar end -->

        <div class="main">
            <div class="empadd">
                <span><i class="fas fa-user-plus"></i><a href="#" class="ms-2" data-bs-toggle="modal" data-bs-target="#addroomModal">Add Hostel</a></span>
            </div>
            <main>
                <div class="container">
                    <div class="title">
                        <h2>Registered Hostel Details</h2>
                    </div>

                    <div class="d-flex">
                        <div class="row header" style="text-align: center;">
                            <table id="example" class="table table-striped table-bordered" style="border: 1px solid #dadada;">
                                <thead>
                                    <tr>
                                        <th>Hostel Id</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                        </div>
                        <tbody>
                            <?php

                            $sql3 = "SELECT * FROM `hostel`";
                            $res3 = mysqli_query($conn, $sql3);
                            while ($row = mysqli_fetch_assoc($res3)) {
                                $sql4 = "select * from city where ctid=" . $row['City_ctid'] . ";";
                                $res4 = mysqli_query($conn, $sql4);
                                $fetch = mysqli_fetch_assoc($res4);

                                echo '
                                        <tr>
                                        <td>' . $row["hid"] . '</td>
                                        <td>' . $row["hname"] . '</td>
                                        <td>' . $row["hmobile"] . '</td>
                                        <td>' . $row["hemail"] . '</td>
                                        <td>' . $row["haddress"] . '</td>
                                        <td>' . $fetch["ctname"] . '</td>
                                        </tr>
                                        ';
                            }
                            ?>
                        </tbody>

                        </table>
                    </div>
                </div>

            </main>

        </div>
    </div>


    <!-- add employee modal -->
    <div class="modal fade" id="addroomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hostel Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./hostellist.php" method="POST" id="empsall">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name"> Hostel Name </label>
                            <input type="text" name="hname"  class="form-control" placeholder="Enter Hostel Name" required>
                        </div>

                        <div class="form-group">
                            <label for="name"> Hostel mobile </label>
                            <input type="text" name="hmobile"  class="form-control" placeholder="Enter Hostel Mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="name"> Hostel Email </label>
                            <input type="text" name="hemail" class="form-control" placeholder="Enter Hostel Email" required>
                        </div>

                        <div class="form-group">
                            <label for="name"> Hostel Address </label>
                            <textarea name="haddress"  class="form-control" placeholder="Enter Hostel Address" required cols="30" rows="5"></textarea>
                        </div>

                        
                        <div class="form-group">
                            <label for="country">Select Country </label>
                            <select name="" id="country" class="form-control">
                                <option value="">---select Country ---</option>
                                <?php 
                                    $sql2="select * from country ORDER BY cname";
                                    $res2=mysqli_query($conn,$sql2);

                                    while($row2=mysqli_fetch_array($res2)){
                                ?>
                                        <option value="<?php echo $row2['cid'] ?>">
                                        <?php echo $row2['cname'] ?>
                                    </option>;
                                        <?php
                                    }
                                ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="state">Select state </label>
                            <select name="" id="state" class="form-control">
                                <option value="">---select state ---</option>
                                
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="city">Select City </label>
                            <select name="hcity" id="city" class="form-control">
                                <option value="">---select City ---</option>
                                
                            </select>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Add Hostel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>


<script src="../js/bootstrap513.js"></script>
<script src="../js/jquery-360.js"></script>
<script src="../js/datatable.js"></script>
<script src="./js/stscript.js"></script>
<script src="../js/sweetalert.js"></script>
<script src="../js/add.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });


   
</script>

</html>