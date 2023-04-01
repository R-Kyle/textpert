<?php 
require('include/navigationbar.php');
require('include/database.php');
session_start();
error_reporting(0);
$msg="";
$displayemail="";
if (isset($_POST['submit'])) {

	$email = $_POST['Email'];

	//Check email if already use or not
	$checkemail = mysqli_query($con,"SELECT Email_Address FROM userlogin WHERE Email_Address='$email' ");
	$result=mysqli_fetch_array($checkemail);

	$EmailAdd = $result['Email_Address'];
	
	if ($EmailAdd != "") {
		$msg = "success";
		$_SESSION['email']=$result['Email_Address'];
		header('location:forgotpasschange.php');
	}else{
		$msg = "Incorrect Email Address Please Try again.";
		$displayemail = $email;
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>TexPert | Forgot Password</title>
</head>
<body class="navbar-dark bg-dark">
	<br><br>
<form method="post">
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>

		<div class="col-sm-6">
			<div class="card" style="padding:5%;">
					<center>
						<h2>Forgot Password</h2>
						<h6>Enter Your Email Address</h6>	

						<i style="color:red;"><?php echo $msg; ?></i>
					</center><br>
				<div class="form-floating mb-3">
				  <input type="email" class="form-control" name="Email" value="<?php echo $displayemail; ?>" id="floatingInput" placeholder="Email Address">
				  <label for="floatingInput">Email Address</label>
				</div>
				<button type="submit" name="submit" class="btn btn-primary form-control">Continue</button>

			</div>
		</div>

		<div class="col-sm-3"></div>
	</div>
</div>
</form>
</body>
</html>