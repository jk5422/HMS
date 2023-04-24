<?php
include './config/db.php';
$hid=$_POST['hid'];
$stdid = $_POST["stdid"];
if($hid!= "" && $stdid!="")
{
$sql="SELECT * FROM `fees` where Hostel_hid  = $hid AND Standard_sid=$stdid";
$result = mysqli_query($conn,$sql);
?>
<table border="1">
    <tr>
        <th colspan="2">Fees Details</th>
    </tr>
<?php

    while($row = mysqli_fetch_array($result))
     {
        $sql1="select * from hostel where hid=$hid";
        $res1=mysqli_query($conn,$sql1);
        $fetch=mysqli_fetch_assoc($res1);
    
        $sql2="select * from standard where sid=$stdid";
        $res2=mysqli_query($conn,$sql2);
        $fetch2=mysqli_fetch_assoc($res2);
    
        echo '<tr>
                <th colspan="2">'.$fetch['hname'].'</th>
              </tr>
        <tr>
                <td>Standard</td>
                <td>'.$fetch2['sname'].'</td>
         </tr>
         <tr>      
                <td>School Fees</td>
                <td>'.$row['School_fees'].'</td>
        </tr>  
        <tr>   
                <td>Hostel Fees</td>
                <td>'.$row['Hostel_fees'].'</td>
        </tr> 
        <tr>      
                <td>Other Fees</td>
                <td>'.$row['Other_fees'].'</td>
        </tr>
        <tr>        
                <td>Total Fees</td>
                <td>'.($row['Other_fees']+$row['Hostel_fees']+$row['School_fees']).'</td>            
                
        </tr>

        ';
     }
     echo '</table>';
}
else
{
    echo '<p class="text-danger">Please select appropriate stadard and hostel </p>';
}

?>

