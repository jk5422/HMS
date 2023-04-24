<?php
include './config/db.php';
$country_id = $_POST["country_id"];
$result = mysqli_query($conn,"SELECT * FROM state where Country_cid = $country_id ORDER BY sname");
?>
<option value="">Select State</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["sid"];?>"><?php echo $row["sname"];?></option>
<?php
}
?>