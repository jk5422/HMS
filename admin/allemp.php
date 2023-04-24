<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['empemail']))
{
    header("location: ./index.php");
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $name = $_POST['ename'];
    $email = $_POST['eemail'];
    $gender = $_POST['egen'];
    $role = $_POST['erole'];
    $pass = $_POST['epass'];
    $cpass = $_POST['ecpass'];
    $mobile = $_POST['econtact'];
    $hid = $_POST['ehostel'];

    if ($name != "" && $email != "" && $gender != "" && $role != "" && $pass != "" && $cpass != "" && $mobile != "" && $hid != "") 
    {

        if ($pass != $cpass) {
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Password and confirm password is mismatch..!!
            </div>';
        } else {

            $sql5 = "SELECT * FROM `employee` WHERE `employee`.`Emp_name` LIKE '$name' AND `employee`.`Erole` LIKE '$role' AND `employee`.`Hostel_hid`=$hid";
            $res5 = mysqli_query($conn, $sql5);
            $cnt = mysqli_num_rows($res5);

            if ($cnt >= 1) {
                echo '<div class="alert alert-danger" >
                <strong>Error! </strong> Employee already Exist..!!
                </div>';
            } else {

                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql2 = "INSERT INTO `employee`(`Emp_name`, `Gender`, `Erole`, `Emp_mobile`, `Emp_email`, `Password`, `Hostel_hid`) VALUES ('$name','$gender','$role','$mobile','$email','$hash',$hid)";
                $res2 = mysqli_query($conn, $sql2);

                if ($res2) {
                    echo '<div class="alert alert-success" >
                <strong>Error! </strong> Employee added successfully..!!
                </div>';
                }
            }
        }
    } else {
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
    <link rel="stylesheet" href="./css/allemp.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <title>All EMP | HMS</title>
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
                <span><i class="fas fa-user-plus"></i><a href="#" class="ms-2" data-bs-toggle="modal" data-bs-target="#addempModal">Add Employee</a></span>
            </div>
            <main>
                <div class="container">
                    <div class="title">
                        <h2>All Employee</h2>
                    </div>

                    <div class="d-flex">
                        <div class="row header" style="text-align: center;">
                            <table id="example" class="table table-striped table-bordered" style="border: 1px solid #dadada;">
                                <thead>
                                    <tr>
                                        <th>Employee Id</th>
                                        <th>Employee Name</th>
                                        <th>Gender</th>
                                        <th>Role</th>
                                        <th>Employee Mobile</th>
                                        <th>Employee Email</th>
                                        <th>Hostel Name</th>
                                    </tr>
                                </thead>
                        </div>
                        <tbody>
                            <?php

                            $sql3 = "SELECT * FROM `employee`";
                            $res3 = mysqli_query($conn, $sql3);

                            while ($row = mysqli_fetch_assoc($res3)) {
                                $sql4 = "select * from hostel where hid=" . $row['Hostel_hid'] . ";";
                                $res4 = mysqli_query($conn, $sql4);
                                $fetch = mysqli_fetch_assoc($res4);

                                echo '
                                        <tr>
                                        <td>' . $row["Empid"] . '</td>
                                        <td>' . $row["Emp_name"] . '</td>
                                        <td>' . $row["Gender"] . '</td>
                                        <td>' . $row["Erole"] . '</td>
                                        <td>' . $row["Emp_mobile"] . '</td>
                                        <td>' . $row["Emp_email"] . '</td>
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
    <div class="modal fade" id="addempModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./allemp.php" method="POST" id="empsall">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name"> Name </label>
                            <input type="text" name="ename" id="name" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <div class="form-group">
                            <label for="empgen"> Gender </label>
                            <select name="egen" id="empgen" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="emprole"> Role </label>
                            <select name="erole" id="emprole" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Rector">Rector</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="contact"> Contact </label>
                            <input type="tel" name="econtact" id="contact" class="form-control" placeholder="Enter Contact No.">
                        </div>

                        <div class="form-group">
                            <label> Email </label>
                            <input type="email" name="eemail" id="email" class="form-control" placeholder="Enter Email" required>
                        </div>

                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" id="password" class="form-control" name="epass" class="form-control" placeholder="Enter your password" required>
                        </div>

                        <div class="form-group">
                            <label for="cpassword"> Confirm Password </label>
                            <input type="password" id="cpassword" class="form-control" onblur="passcheck();" name="ecpass" placeholder="Enter Confirm password" required>
                        </div>

                        <div class="form-group">
                            <label for="emphostel">Select Hostel </label>
                            <select name="ehostel" id="emphostel" class="form-control">
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
                        <button type="submit" name="updatedata" class="btn btn-primary">Add Employee</button>
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


    function passcheck() {
        var p = document.getElementById("password").value;
        var q = document.getElementById("cpassword").value;
        if (p != q) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '!...Error...!',
                timer: 2000,
                showConfirmButton: false,
                text: 'password and confirm password value mismatch..!',
            })
        } else {
            return;
        }
    }
</script>

</html>