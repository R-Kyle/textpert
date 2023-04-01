<?php require('../include/database.php');
require('include/navigationbar.php');
session_start();
error_reporting(0);
$uid = $_SESSION['uid'];

$display = mysqli_query($con,"SELECT * FROM userlogin WHERE id='$uid' ");
$result=mysqli_fetch_array($display);
$name = $result['Fullname'];

if (isset($_POST['submit'])) {
	
	$tags = $_POST['category'];
	$Title = $_POST['title'];
	$Content = $_POST['content'];
	$samplecode = $_POST['samplecode'];
	

	if ($tags != "Category/Tags") {

		$code = $con->real_escape_string($samplecode);

		$insert = mysqli_query($con,"INSERT INTO forum_post (Title,Category,Content,Posted_By_Name,Posted_By_Id,Sample_Code) VALUES ('$Title','$tags','$Content','$name','$uid','$code') ");
		if ($insert) {
			$msg = '<h4 style="color: green;">Your Question is Successfully Posted</h4>';
		}
	}else{
		$msg = '<h4 style="color: red;">*Please Select Tags</h4>';
	}


}

?>

<!DOCTYPE html>
<html>
<head>
	<title>TexPert | Ask Question</title>
</head>
<body class="navbar-dark bg-dark">
	<br>
<form method="post">
	<div class="container">
		<div class="row">
			<center><?php echo $msg; ?></center>
			<div class="col-sm-12">
				<h3 style="color:white;">Title</h3>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" name="title" id="floatingInput" placeholder="title" required>
					<label for="floatingInput">Title</label>
				</div>
			</div>

			<br><br>
			<div class="col-sm-12">
				<h3 style="color:white;">Category/Tags </h3>
				<div class="form-floating">
				  <select class="form-select" id="floatingSelect" name="category" required>
				    <option selected>Category/Tags</option>
				    <option>C++</option>
				    <option>Java</option>
				    <option>PHP</option>
				  </select>
				  <label for="floatingSelect">Category/Tags</label>
				</div>
			</div>
			<br><br><br><br><br>
			<div class="col-sm-12">
				<h3 style="color:white;">What are the details of your problem?</h3>
				<div class="form-floating">
				  <textarea class="form-control" name="content" id="floatingTextarea2" required style="height: 200px"></textarea>
				  <label for="floatingTextarea2">What are the details of your problem?</label>
				</div>
			</div>

			<br><br><br><br><br><br><br><br><br><br><br>
			<div class="col-sm-12">
				<h3 style="color:white;">Your Sample Code Here</h3>
				<div class="form-floating">
				  <textarea class="form-control" name="samplecode" id="floatingTextarea2" required style="height: 200px"></textarea>
				  <label for="floatingTextarea2">Your Sample Code Here</label>
				</div>
			</div>


			<div class="col-sm-12">
				<br>
				<button type="submit" name="submit" class="btn form-control btn-success">POST</button>			
			</div>

		</div>
	</div>
</form>
</body>
</html>