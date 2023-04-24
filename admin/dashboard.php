<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['empemail']))
{
    header("location: ./index.php");
}

if (isset($_SESSION['empemail']) && isset($_SESSION['wmsg'])) {
    echo '<div class="alert alert-success">
                <strong>Success! </strong> Welcome '.$_SESSION["empname"].'..!!
                </div>';
    unset($_SESSION['wmsg']);
}

$sql1="select * from student";
$res1=mysqli_query($conn,$sql1);
$cnt1=mysqli_num_rows($res1);

$sql2="select * from hostel";
$res2=mysqli_query($conn,$sql2);
$cnt2=mysqli_num_rows($res2);

$sql3="SELECT * FROM `admission` WHERE isaccepted=1;";
$res3=mysqli_query($conn,$sql3);
$cnt3=mysqli_num_rows($res3);	

$sql4="select * from employee";
$res4=mysqli_query($conn,$sql4);
$cnt4=mysqli_num_rows($res4);


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Admin | HMS</title>

	<link rel="stylesheet" href="../css/bootstrap513.css">
	<link rel="stylesheet"
		href="./css/ststyle.css">
	<link rel="stylesheet"
		href="./css/stresponsive.css">
</head>

<body>

		<!-- header start-->

		<?php  include './header.php'; ?>
		<!-- header end -->
	
	<div class="main-container">
		<!-- sidebar start -->
		<?php include './sidebar.php' ; ?>
		<!-- sidebar end -->

		<div class="main">

			<div class="searchbar2">
				<!-- <input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button">
				</div> -->
                <h3>Student Dashboard</h3>
			</div>

			<div class="box-container">

				<div class="box box1">
					<div class="text">
						<h2 class="topic-heading"><?php echo $cnt2; ?></h2>
						<h2 class="topic">Registered Hostels</h2>
					</div>

					<img  src="./img/hostel.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading"><?php echo $cnt1; ?></h2>
						<h2 class="topic">Registered Students</h2>
					</div>

					<img src="./img/profile.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading"><?php echo $cnt3; ?></h2>
						<h2 class="topic">Total Admission</h2>
					</div>

					<img src="./img/admission.png"
						alt="comments">
				</div>

				<div class="box box4">
					<div class="text">
						<h2 class="topic-heading"><?php echo $cnt4; ?></h2>
						<h2 class="topic">Employee</h2>
					</div>

					<img src="./img/emp.png" alt="published">
				</div>
			</div>

			<!-- <div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Recent Articles</h1>
					<button class="view">View All</button>
				</div>

				<div class="report-body">
					<div class="report-topic-heading">
						<h3 class="t-op">Article</h3>
						<h3 class="t-op">Views</h3>
						<h3 class="t-op">Comments</h3>
						<h3 class="t-op">Status</h3>
					</div>

					<div class="items">
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 73</h3>
							<h3 class="t-op-nextlvl">2.9k</h3>
							<h3 class="t-op-nextlvl">210</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 72</h3>
							<h3 class="t-op-nextlvl">1.5k</h3>
							<h3 class="t-op-nextlvl">360</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 71</h3>
							<h3 class="t-op-nextlvl">1.1k</h3>
							<h3 class="t-op-nextlvl">150</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 70</h3>
							<h3 class="t-op-nextlvl">1.2k</h3>
							<h3 class="t-op-nextlvl">420</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 69</h3>
							<h3 class="t-op-nextlvl">2.6k</h3>
							<h3 class="t-op-nextlvl">190</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 68</h3>
							<h3 class="t-op-nextlvl">1.9k</h3>
							<h3 class="t-op-nextlvl">390</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 67</h3>
							<h3 class="t-op-nextlvl">1.2k</h3>
							<h3 class="t-op-nextlvl">580</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 66</h3>
							<h3 class="t-op-nextlvl">3.6k</h3>
							<h3 class="t-op-nextlvl">160</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 65</h3>
							<h3 class="t-op-nextlvl">1.3k</h3>
							<h3 class="t-op-nextlvl">220</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

					</div>
				</div>
			</div> -->
		</div>
	</div>

	<script src="./js/stscript.js"></script>
	<script src="../js/jquery-360.js"></script>
	<script>
		 $(".alert").fadeTo(2000, 500).fadeOut(500, function() {
        $(".alert").fadeOut(500);
    });

	</script>
</body>
</html>


