<?php 
require('include/navigationbar.php');
require('include/database.php');
session_start();
error_reporting(0);
$useremail = $_SESSION['email'];

if (isset($_POST['submit'])) {

	$newpass = md5($_POST['NewPassword']);
	
	$update = mysqli_query($con,"UPDATE userlogin SET Password='$newpass' WHERE Email_Address='$useremail' ");
	$msg="Your Password Sucessfully Change";
	header( "refresh:3; url=UserLogin.php" ); 

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
						<h2>New Password</h2>
						<h6><?php echo $useremail; ?></>
						<h6>Please Create a New Password</h6>	
						<i style="color:green;"><?php echo $msg; ?></i>

					</center><br>

				<div class="form-floating mb-3">
				  <input type="Password" class="form-control" name="NewPassword" id="floatingpass" onkeyup='check()' placeholder="Password" required=>
				  <label for="floatingInput">New Password</label>
				</div>

				<div class="form-floating mb-3">
				  <input type="Password" class="form-control" id="floatingpassconfirm" onkeyup='check()' placeholder="Confirm Password" required>
				  <label for="floatingInput">Confirm Password</label>
				</div>

					<div class="form-check">
					  <input class="form-check-input" type="checkbox" onclick="showpass()" id="flexCheckIndeterminate">
					  <label class="form-check-label" for="flexCheckIndeterminate">
					    Show Password
					  </label>
					</div>

				  <p id="alertPassword"></p>
				  <br>
				  <button type="submit" name="submit" class="btn btn-primary form-control" id="submit">Change Password</button>

				</div>
		</div>

		<div class="col-sm-3"></div>
	</div>
</div>
</form>
</body>
</html>

<script type="text/javascript">

 var check = function() {

 		if (document.getElementById('floatingpass').value == '' && document.getElementById('floatingpassconfirm').value == '' ) {


 		}else{


		      if (document.getElementById('floatingpass').value == document.getElementById('floatingpassconfirm').value) {
		          document.getElementById('alertPassword').style.color = 'green';
		          document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-check-circle"></i>Password Match !</span>';
		          document.getElementById("submit").disabled = false;
		      } else {
		      		document.getElementById('alertPassword').style.color = '#EE2B39';
		          document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i>Password not Match</span>';
		      	document.getElementById("submit").disabled = true;
		      }


 		}




  }


function showpass() {
  var x = document.getElementById("floatingpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

  var y = document.getElementById("floatingpassconfirm");

    if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}



</script>