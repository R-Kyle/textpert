<?php 
require('include/navigationbar.php');
require('include/database.php');
session_start();
error_reporting(0);
$msg="";

if (isset($_POST['submit'])) {
	
	$email=$_POST['Email'];
    $password=md5($_POST['Password']);

    $query= mysqli_query($con,"SELECT * FROM userlogin WHERE Email_Address='$email' and Password='$password' ");
    $result = mysqli_fetch_array($query);

    if ($result>0) {
    	
    	$_SESSION['uid']=$result['id'];
    	header('location:User/index.php');
    }else{
    	$displayemail = $email;
    	$msg="<p style='color:red;'>Invalid Details</p>";
    }



}




 ?>

 <html>
 <head>
 	<title>Texpert | Sign In</title>
 </head>
 <body>
 	<br><br>

<div class="container card">
 	<div class="row">

 		<div class="card col-sm-6">
 			<img src="ImageLogo/Logoss.png" style="height:500px; width:500px;">
 		</div>


 		<div class="card col-sm-6" style="background:#00970c26; padding-left:80px; padding-right:80px; padding-bottom:50px;">
 <form method="POST">
 			<br>
 			<center>
 				<img src="ImageLogo/Textperttext.png" style="height:80px;">
 				<h6>Please Login into your account</h6>
 				<?php echo $msg; ?>
 			</center>
 			<br>

			<div class="form-floating mb-3">
			  <input type="email" class="form-control" name="Email" value="<?php echo $displayemail; ?>" id="floatingInput" placeholder="Email Address">
			  <label for="floatingInput">Email Address</label>
			</div>
			

			 <div class="form-floating mb-3">
			  <input type="Password" class="form-control" name="Password" id="floatingInput" placeholder="Password">
			  <label for="floatingInput">Password</label>
			</div>

			  <div class="row">
			  	<div class="col-sm-6"><a href="forgotpassword.php" style=" text-decoration: none;">Forgot Password?</a></div>
			  	<div class="col-sm-6">
			  		<a href="UserRegister.php" style=" text-decoration: none;"class="d-flex justify-content-end">
			  		Don't have an Account?
			 		</a>
			 	</div>
			  </div>
			  <br>
			  <button type="submit" name="submit" class="btn btn-primary form-control">Sign In</button>

</form>	
		</div>	

	</div> 		
</div>


 </div>



 <?php require('include/footer.php'); ?>
 </body>
 </html>