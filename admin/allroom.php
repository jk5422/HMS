<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['empemail']))
{
    header("location: ./index.php");
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $rno = $_POST['rno'];
    $hid = $_POST['ehostel'];

    if ($rno != "" && $hid != "") 
    {

        $sql5="SELECT * FROM `room` WHERE rname=$rno AND Hostel_hid=$hid";
        $res5=mysqli_query($conn,$sql5);
        $cnt=mysqli_num_rows($res5);

        if($cnt >=1){
            
            echo '<div class="alert alert-danger">
        <strong>Error! </strong> Room already Exist With Same hostel..!!
        </div>';
        }
        else
        {
            $sql2="INSERT INTO `room`(`rname`, `Hostel_hid`) VALUES ($rno,$hid)";
            $res2=mysqli_query($conn,$sql2);
            if($res2){
                echo '<div class="alert alert-success">
            <strong>Success! </strong> Room Added Successfully..!!
            </div>';
            }
            
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

    <title>Add Room | HMS</title>
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
                <span><i class="fas fa-user-plus"></i><a href="#" class="ms-2" data-bs-toggle="modal" data-bs-target="#addroomModal">Add Room</a></span>
            </div>
            <main>
                <div class="container">
                    <div class="title">
                        <h2>All Room Details</h2>
                    </div>

                    <div class="d-flex">
                        <div class="row header" style="text-align: center;">
                            <table id="example" class="table table-striped table-bordered" style="border: 1px solid #dadada;">
                                <thead>
                                    <tr>
                                        <th>Room Id</th>
                                        <th>Room Number</th>
                                        <th>Hostel Name</th>
                                    </tr>
                                </thead>
                        </div>
                        <tbody>
                            <?php

                            $sql3 = "SELECT * FROM `room`";
                            $res3 = mysqli_query($conn, $sql3);

                            while ($row = mysqli_fetch_assoc($res3)) {
                                $sql4 = "select * from hostel where hid=" . $row['Hostel_hid'] . ";";
                                $res4 = mysqli_query($conn, $sql4);
                                $fetch = mysqli_fetch_assoc($res4);

                                echo '
                                        <tr>
                                        <td>' . $row["rid"] . '</td>
                                        <td>' . $row["rname"] . '</td>
                                        <td>' . $fetch["hname"] . '</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Room Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./allroom.php" method="POST" id="empsall">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name"> Room No </label>
                            <input type="text" name="rno" id="name" class="form-control" placeholder="Enter room Number" required>
                        </div>

                        
                        <div class="form-group">
                            <label for="emphostel">Select Hostel </label>
                            <select name="ehostel" id="emphostel" class="form-control" onblur="emptycheck();">
                                <option value="">---select hostel ---</option>
                                <?php
                                $sql1 = "select * from hostel";
                                $res1 = mysqli_query($conn, $sql1);

                                while ($row = mysqli_fetch_assoc($res1)) { ?>

                                    <option value="<?php echo $row['hid'] ?>"> <?php echo $row['hname'] ?></option>

                                <?php
                                }
                                ?>
                            </select>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Add Room</button>
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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });


    function emptycheck() {
        var p = document.getElementById("name").value;
        var q = document.getElementById("emphostel").value;
        if (p == "" || q == "") {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '!...Error...!',
                timer: 2000,
                showConfirmButton: false,
                text: 'Please Fill All Required Filed..!',
            })
        } else {
            return;
        }
    }
</script>

</html>