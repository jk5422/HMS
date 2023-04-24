<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['empemail']))
{
    header("location: ./index.php");
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
    <link rel="stylesheet" href="./css/admission.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <title>Room Details | HMS</title>
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
            <main>
                <div class="container">
                    <div class="title">
                        <h2>Rooms Details</h2>
                    </div>

                    <div class="d-flex">
                        <div class="row header" style="text-align: center;">
                            <table id="example" class="table table-striped table-bordered" style="border: 1px solid #dadada;">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Standard</th>
                                        <th>Hostel Name</th>
                                        <th>Room No</th>
                                        <th>Bad No</th>
                                    </tr>
                                </thead>
                        </div>
                        <tbody>
                            <?php

                            $sql3 = "SELECT * FROM `student`,`admission` WHERE student.sid=admission.Student_sid AND admission.isaccepted=1;";
                            $res3 = mysqli_query($conn, $sql3);

                            while ($row = mysqli_fetch_assoc($res3)) {
                                $student=$row['sid'];
                                $sql4 = "SELECT * FROM `admission`,`standard` WHERE admission.Student_sid=$student AND admission.Standard_sid=standard.sid;";
                                $res4 = mysqli_query($conn, $sql4);
                                $fetch = mysqli_fetch_assoc($res4);

                                $sql6 = "SELECT * FROM `admission`,`hostel` WHERE `admission`.`Hostel_hid`=Hostel.hid AND admission.Student_sid=$student;";
                                $res6 = mysqli_query($conn, $sql6);
                                $fetch2 = mysqli_fetch_assoc($res6);

                                $sql7 = "SELECT * FROM `room`,`room_allocate` WHERE room.rid=room_allocate.Room_rid AND room_allocate.Student_sid=$student;";
                                $res7 = mysqli_query($conn, $sql7);
                                $fetch3 = mysqli_fetch_assoc($res7);

                                echo '
                                        <tr>
                                        <td>' . $row["sid"] . '</td>
                                        <td>' . $row["sname"] . '</td>
                                        <td>' . $fetch["sname"] . '</td>
                                        <td>' . $fetch2["hname"] . '</td>';

                                        if($fetch3["rname"]=="" && $fetch3["Bad_no"]==""){

                                            echo '<td>--</td>';
                                            echo '<td>--</td>';
                                          
                                        }
                                        else
                                        {
                                            echo '<td>' . $fetch3["rname"] . '</td>';
                                           echo '<td>' . $fetch3["Bad_no"] . '</td>';
                                        }
                                        

                                        
                                       echo '</tr>
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


    
</script>

</html>