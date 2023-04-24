<?php
session_start();
if (!isset($_SESSION['smobile'])) {
    header("location: ./login.php");
}
$fid=$_GET['frmid'];
include './config/db.php'; 



    $sql1="SELECT * FROM `admission` WHERE `admission`.`Form_no`=$fid";
    $res1=mysqli_query($conn,$sql1);
    $fetch=mysqli_fetch_assoc($res1);
    $stid=$fetch['Student_sid'];
    
    $sql2="SELECT * FROM `student` WHERE `student`.`sid`=$stid";
    $res2=mysqli_query($conn,$sql2);
    $fetch1=mysqli_fetch_assoc($res2);

$pdfnm=$fid.'_'.$fetch1['sname'].'.pdf';


function fetch_data()  
{  
    $fid=$_GET['frmid'];
    include './config/db.php'; 
    $sql1="SELECT * FROM `admission` WHERE `admission`.`Form_no`=$fid";
    $res1=mysqli_query($conn,$sql1);
    $fetch=mysqli_fetch_assoc($res1);
    $stid=$fetch['Student_sid'];
    $ststd=$fetch['Standard_sid'];
    $hid=$fetch['Hostel_hid'];

    $sql2="SELECT * FROM `student` WHERE `student`.`sid`=$stid";
    $res2=mysqli_query($conn,$sql2);
    $fetch1=mysqli_fetch_assoc($res2);

    $sql3="SELECT * FROM `standard` WHERE `standard`.`sid`=$ststd";
    $res3=mysqli_query($conn,$sql3);
    $fetch2=mysqli_fetch_assoc($res3);

    $sql4="SELECT * FROM `hostel` WHERE `hostel`.`hid`=$hid";
    $res4=mysqli_query($conn,$sql4);
    $fetch3=mysqli_fetch_assoc($res4);

    $sql5="SELECT * FROM `fees` WHERE Hostel_hid=$hid";
    $res5=mysqli_query($conn,$sql5);
    $fetch5=mysqli_fetch_assoc($res5);


    $date1=date_create($fetch['DOB']);
    $date2=date_create($fetch['Date']);

    $output=' <div class="d-flex">
                <form action="" method="POST" id="form1">
                <h1 style="text-align:center;">-: Student Admission Form :- </h1>
                
                    <div class="row header" >
                    
           
           <table border="1" cellpadding="10"> 
           
                            <tr>
                            <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;">Student Details</th>
                        </tr>
            
                            <tr>
                                <th>Form No</th>
                                <td colspan="3">'.$fid.'</td>
                            </tr>
                           
                            <tr>
                                <th>Student Id</th>
                                <td colspan="3">'.$fetch1['sid'].'</td>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td colspan="3">'.$fetch1['sname'].'</td>
                            </tr>
                            <tr>
                                <th>Student Mobile</th>
                                <td colspan="3">'.$fetch1['smobile'].'</td>
                            </tr>
                            <tr>
                                <th>Student Email</th>
                                <td colspan="3">'.$fetch1['semail'].'</td>
                            </tr>
                            <tr>
                                <th>Student DOB</th>
                                <td colspan="3">'.date_format($date1,"d-m-Y").'</td>
                            </tr>
                            <tr>
                                <th>Standard</th>
                                <td colspan="3">'.$fetch2['sname'].'</td>
                            </tr>
                            <tr>
                                <th>Form Submission Date</th>
                                <td colspan="3">'.date_format($date2,"d-m-Y").'</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td colspan="3">'.$fetch['Gender'].'</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td colspan="3">'.$fetch['Saddress'].'</td>
                            </tr>
                            <tr>
                                <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;">Parents Details</th>
                            </tr>
                            <tr style="text-align: center;font-weight:bolder;">
                                <th colspan="2">Parents Name</th>
                                <th colspan="2">Parents Mobile</th>
                            </tr>';
                            
                            
                            
                            $output.='<tr style="text-align: center;">
                            <td colspan="2">'.$fetch['Father_name'].'</td>
                            <td colspan="2">'.$fetch['Father_mobile'].'</td>
                            </tr>  
                        </table>
                        <table border="1" cellpadding="10">                     
                            <tr>
                                <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;">Hostel Details</th>
                            </tr>
                            <tr style="text-align: center;font-weight:bolder;">
                                <th>Hostel Name</th>
                                <th>Hostel Contact</th>
                                <th>Hostel Email</th>
                                <th>Hostel Address</th>
                            </tr>
                            
                            <tr style="text-align: center;">
                            <td>'.$fetch3['hname'].'</td>
                            <td>'.$fetch3['hmobile'].'</td>
                            <td>'.$fetch3['hemail'].'</td>
                            <td>'.$fetch3['haddress'].'</td>

                            </tr>
                        </table>

                        <table border="1" cellpadding="10">                     
                        <tr>
                            <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;">Fees Details</th>
                        </tr>
                        <tr style="text-align: center;font-weight:bolder;">
                            <th>School Fees</th>
                            <th>Hostel Fees</th>
                            <th>Other Fees</th>
                            <th>Total Fees</th>
                        </tr>
                        
                        <tr style="text-align: center;">
                        <td>'.$fetch5['School_fees'].'</td>
                        <td>'.$fetch5['Hostel_fees'].'</td>
                        <td>'.$fetch5['Other_fees'].'</td>
                        <td>'.($fetch5['Other_fees']+$fetch5['Hostel_fees']+$fetch5['School_fees']).'</td>

                        </tr>
                    </table>



                        <table border="1" cellpadding="10">                     
                            <tr>
                                <th colspan="4" style="text-align: center;font-weight:bolder;font-size: larger;">Education/Document Details</th>
                            </tr>
                            <tr style="text-align: center;font-weight:bolder;">
                                <th>Last School Name</th>
                                <th colspan="3">Document Submitted</th>
                            </tr>
                            
                            <tr style="text-align: center;">
                            <td>'.$fetch['Last_school'].'</td>
                            <td colspan="3"><ul>
                                <li>School Lc</li>
                                <li>Adhar Card</li>
                                <li>Last Academic Result</li>
                            </ul>
                            </td>
                            ';
                            

                           $output.=' </tr>
                        </table>

                            ';
                            
                        $output.="</div></form></div>";
    return $output;
}
// if(isset($_POST['create_pdf']))
// {
    require_once("./TCPDF-main/examples/tcpdf_include.php");
    // require_once("../TCPDF-main/tcpdf.php");
    

   
    
   
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('HMS');
$pdf->setTitle('Student Admission Form ');


// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('helvetica', '', 8);

// add a page
$pdf->AddPage();
      $content=""; 
      $content .= fetch_data();   
      // Clean any content of the output buffer
    //   ob_end_clean();
      $pdf->writeHTML($content);  
      $pdf->Output($pdfnm, 'I');  
//  }  



?>