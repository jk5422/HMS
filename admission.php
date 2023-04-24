<?php
session_start();
include './config/db.php';
if(!isset($_SESSION['smobile']))
{
    header("location: ./login.php");
}

$sql="select * from student where sid=".$_SESSION['sid']." and smobile=".$_SESSION['smobile'].";";
$res=mysqli_query($conn,$sql);
$fetch=mysqli_fetch_assoc($res);
$sid=$fetch['sid'];
$semail=$fetch['semail'];
$sname=$fetch['sname'];
$smobile=$fetch['smobile'];

if ($_SERVER["REQUEST_METHOD"] == 'POST') 
{

    $stid=$_POST['stid'];
    $stdob=$_POST['stdob'];
    $stgen=$_POST['stgen'];
    $staddress=$_POST['staddress'];
    $stftnm=$_POST['stftnm'];
    $stftmn=$_POST['stftmn'];
    $stlsnm=$_POST['stlsnm'];
    $sthostel=$_POST['shostel'];
    $ststd=$_POST['ststd'];
   


    if(isset($_FILES['fu']) && ($stdob!="" && $stgen!="" && $staddress!="" && $stftnm!="" && $stftmn!="" && $stlsnm!="" && $sthostel!="" && $ststd!=""))
    {
        $sql4="SELECT * FROM `admission` WHERE `admission`.`Student_sid`=$stid AND `admission`.`Hostel_hid`=$sthostel  AND `admission`.`iscancel`=0 OR `admission`.`Student_sid`=$stid AND `admission`.`iscancel`=0";
        $res4=mysqli_query($conn,$sql4);
        $cntr=mysqli_num_rows($res4);
        
    
      
    
                if($cntr >=1)
                {
                    echo '<script>alert("first cancel your admission from the previous hostel and then fill new form of new hostel");</script>';
                }
                else
                {

                $sql6="INSERT INTO `admission`(`Hostel_hid`, `Student_sid`, `Standard_sid`, `Gender`, `DOB`, `Saddress`, `Father_name`, `Father_mobile`,`Last_school`) VALUES ($sthostel,$stid,$ststd,'$stgen','$stdob','$staddress','$stftnm','$stftmn','$stlsnm');";
                $res6=mysqli_query($conn,$sql6);

                if($res6)
                {

                $n=1;
                foreach ($_FILES['fu']['tmp_name'] as $key => $image)
                {

                        $sql7="SELECT * FROM `admission` WHERE Student_sid=$stid";
                        $res7=mysqli_query($conn,$sql7);
                        $fetch1=mysqli_fetch_assoc($res7);
                        $frmno=$fetch1['Form_no'];
                        

                         $filename=$_FILES['fu']['name'][$key];
                        $ext=pathinfo($filename, PATHINFO_EXTENSION);

                            $filesize=$_FILES['fu']['size'][$key];
                            $filetmp=$_FILES['fu']['tmp_name'][$key]; 
                            $filetype=$_FILES['fu']['type'][$key];
                            $isuploaded=move_uploaded_file($filetmp,"./docs/".$stid."_".$n.".".$ext);
                            $path="/HMS/docs/".$stid."_".$n.".".$ext;
                            $n++;
                            if($isuploaded)
                            {   
                                $sql1="INSERT INTO `img`(`sid`, `path`,`hid`,`form_no`) VALUES ($stid,'$path',$sthostel,$frmno);";
                                $res1=mysqli_query($conn,$sql1);

                            }
                        
                }
                if($res1)
                {
                    sleep(5);
                    header("location: ./inquiries.php");
                }
            }
            else
            {
                echo '<script>alert("Something Went Wrong!!");</script>';
            }
    }

    }
    else
    {
        echo '<script>alert("please select all required fields");</script>';
    }


    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admission | HMS</title>
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
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/ftcustm.css">
    <link rel="stylesheet" href="./css/admission.css">
    <link rel="stylesheet" href="./css/sweetalert.css">
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    

   
</head>

<body>
    <div class="container-xxl bg-white p-0">
        

        <!-- Header Start -->
      <?php include './partial/nav.php';  ?>
        <!-- Header End -->
   
    



 <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Student Admission Form</h2>
                <hr class="w-100 bg-dark">
                <p>Fill all form field to go to next step</p>
                <form id="msform" method="post" action="./admission.php" enctype="multipart/form-data">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Basic</strong></li>
                        <li id="personal"><strong>Personal</strong></li>
                        <li id="payment"><strong>Document </strong></li>
                        <li id="hostel"><strong>Hostel</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Basic Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 5</h2>
                                </div>
                            </div> 

                            <label class="fieldlabels" for="name">Name: </label>
                            <?php echo '<input type="text" placeholder="Full Name" value="'.$sname.'" disabled />';
                             echo '<input type="hidden" name="stid" value="'.$sid.'">'; 
                             ?>

                             
                             <label class="fieldlabels" for="email">Email: </label>
                            <?php echo '<input type="email" placeholder="Email Id" value="'.$semail.'" disabled />';
                            ?> 
                             
                             <label class="fieldlabels" for="mobile">Mobile no: </label> 
                             <?php echo ' <input type="text" id="mobile" placeholder="Mobile Number" value="'.$smobile.'"  disabled /> ';
                            echo '<input type="hidden" name="stmob" value="'.$smobile.'">'; ?>

                            <label class="fieldlabels" for="dob">Date-Of-Birth: </label> 
                              <input type="date" name="stdob" id="dob" onblur="checkdob();"/> 

                              <label class="fieldlabels" for="gender"> Gender :</label>
                              <select name="stgen" id="gender" onblur="checkgen();">
                                <option value="">--select gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>

                              <label class="fieldlabels" for="std"> Select Your Standard for admission :</label>
                              <select name="ststd" id="std" onblur="checkstd();">
                                <option value="">--Select Standard--</option>
                                <?php 
                                    $sql3="select * from standard";
                                    $res3=mysqli_query($conn,$sql3);

                                    while($row3=mysqli_fetch_array($res3)){
                                ?>
                                        <option value="<?php echo $row3['sid'] ?>">
                                        <?php echo $row3['sname'] ?>
                                    </option>;
                                        <?php
                                    }
                                ?>
                              </select>

                        </div> 
                        <a href="./dashboard.php" type="button" class="btn btn-primary btn-outline-dark text-white">Go Back</a>
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 5</h2>
                                </div>
                            </div> 

                            <label class="fieldlabels" for="fname">Father Full Name: </label>
                             <input type="text" name="stftnm" id="fname" placeholder="Father Full Name" />

                             <label class="fieldlabels" for="fmobile">Father Mobile: </label>
                             <input type="text" name="stftmn" id="fmobile" placeholder="Father Mobile no" />
                             
                             <label class="fieldlabels" for="lschool">Last School Name: </label>
                             <input type="text" name="stlsnm" id="lschool" placeholder="Enter Last School Name" />

                             <label class="fieldlabels" id="address">Address: </label> 
                              <textarea name="staddress" id="address" cols="30" rows="5" placeholder="At : Village name , Sub District : Sub-name , Dis: District-name,PINCODE."></textarea>


                             <label class="fieldlabels" for="pimg">Passport size Image: </label>
                             <input type="file" name="fu[]" id="pimg" onchange="return readURL(this);" />

                             <div>
                                <img src="" id="passimg" alt="Passport size img" height="80px" width="50px">
                             </div>
                             
                             

                        </div> 
                        <a href="./dashboard.php" type="button" class="btn btn-primary btn-outline-dark text-white">Go Back</a>
                        <input type="button" name="next" class="next action-button" value="Next" /> 
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Document Upload:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 5</h2>
                                </div>
                            </div> 
                            <label class="fieldlabels" for="sclc">Upload School Leaving Photo:</label> 
                            <input type="file" name="fu[]" id="sclc" onchange="return readURL1(this);">

                            <div>
                                <img src="" id="school" alt="School LC" height="80px" width="50px" >
                             </div>

                             <label class="fieldlabels" for="adhar">Upload Adhar Card Photo:</label> 
                             <input type="file" name="fu[]" id="adhar" onchange="return readURL2(this);" >

                             <div>
                                <img src="" id="adharimg" alt="Adharcard" height="80px" width="50px">
                             </div>

                             <label class="fieldlabels" for="result">Upload Last School Result Photo:</label> 
                             <input type="file" name="fu[]" id="result" onchange="return readURL3(this);">

                             <div>
                                <img src="" id="schoolres" alt="School result" height="80px" width="50px" >
                             </div>
                        </div>
                        <a href="./dashboard.php" type="button" class="btn btn-primary btn-outline-dark text-white">Go Back</a>
                         <input type="button" name="next" class="next action-button" value="Next" /> 
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Hostel Select:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 5</h2>
                                </div>
                            </div> 
                            <label class="fieldlabels" for="country"> Select Country :</label>
                              <select name="" id="country">
                                <option value="">--Select Country</option>
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

                              <label class="fieldlabels" for="state"> Select State :</label>
                              <select name="" id="state">
                                
                              </select>

                              <label class="fieldlabels" for="city"> Select City :</label>
                              <select name="" id="city">
                                
                              </select>

                              <label class="fieldlabels" for="hostel"> Select Hostel :</label>
                              <select id="shostel" name="shostel">
                              <option value="">--Select Hostel</option>
                              </select>
                        </div>
                        <div id="fees">

                        </div>
                        <a href="./dashboard.php" type="button" class="btn btn-primary btn-outline-dark text-white">Go Back</a>
                         <input type="submit" name="next" class="next action-button" value="Submit" /> 
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 5 - 5</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">Your form is submitted Successfully</h5>
                                    <h5 class="text-danger text-center ">You will be redirected to dashboard in 3 seconds dont close the current window.</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
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
    </div>

    <script src="./js/add.js"></script>

    <!-- JavaScript Libraries -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <!-- Template Javascript -->
    <script src="./js/main.js"></script>
    <script src="./js/admission.js"></script>
    <script src="./js/sweetalert.js"></script>
    <script src="./js/fees.js"></script>

    <script>
    function readURL(input) {
        var fileInput = 
                document.getElementById('pimg');
        var filePath = input.value;
        var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.jfif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                Swal.fire({
                        icon: 'error',
                        title: '!...Error...!',
                        text: 'Upload only JPG/JPEG/PNG images..!',
                    })
                fileInput.value = '';
                return false;
            }
            else{
                if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#passimg').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
            }
 
}

function readURL1(input) {
    var filePath = input.value;
        var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.jfif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                Swal.fire({
                        icon: 'error',
                        title: '!...Error...!',
                        text: 'Upload only JPG/JPEG/PNG images..!',
                    })
                fileInput.value = '';
                return false;
            }
            else{
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#school').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
}

function readURL2(input) {
    var filePath = input.value;
        var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.jfif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                Swal.fire({
                        icon: 'error',
                        title: '!...Error...!',
                        text: 'Upload only JPG/JPEG/PNG images..!',
                    })
                fileInput.value = '';
                return false;
            }
            else{
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#adharimg').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
}

function readURL3(input) {
    var filePath = input.value;
        var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.jfif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                Swal.fire({
                        icon: 'error',
                        title: '!...Error...!',
                        text: 'Upload only JPG/JPEG/PNG images..!',
                    })
                fileInput.value = '';
                return false;
            }
            else{
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#schoolres').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
}

function checkdob(){
        var selectedDate = $("#dob").val();
        if(selectedDate == "") 
        {  
            Swal.fire({
                        icon: 'error',
                        title: '!...Error...!',
                        text: 'Please Select the date of birth..!',
                    })
        }
        else
        {
        return true;
        }
    }

function checkgen(){

        var ddl = document.getElementById("gender");
        var selectedValue = ddl.options[ddl.selectedIndex].value;
        if (selectedValue == "") 
        {
            Swal.fire({
                        icon: 'error',
                        title: '!...Error...!',
                        text: 'Please Select the gender..!',
                    })
        }
        else
        {
            return true;
        }
    }

    function checkstd(){

var ddl = document.getElementById("std");
var selectedValue = ddl.options[ddl.selectedIndex].value;
if (selectedValue == "") 
{
    Swal.fire({
                icon: 'error',
                title: '!...Error...!',
                text: 'Please Select the standard..!',
            })
}
else
{
    return true;
}
}
    </script>

</body>

</html>