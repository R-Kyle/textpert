<?php 
require('include/database.php');
require('include/navigationbar.php');
$msg="";
$msg1="";
$displayname = "";
$displayemail = "";
if (isset($_POST['submit'])) {
	
	$fullname=$_POST['Fullname'];
	$email=$_POST['Email'];
	$password=md5($_POST['Password']);

	//Check email if already use or not
	$checkemail = mysqli_query($con,"SELECT Email_Address FROM userlogin WHERE Email_Address='$email' ");
	$result=mysqli_fetch_array($checkemail);

	if ($result) {
		$displayemail = $email;
		$displayname = $fullname;
		$msg =  'The Email is Already ready taken Please use another email';
	}else{
		
		$insert = mysqli_query($con,"INSERT INTO userlogin (Fullname,Email_Address,Password) VALUES ('$fullname','$email','$password') ");
		$msg1="Register Successfully";


	}
}
 ?>

 <html>
 <head>
 	<title>Texpert | Sign Up</title>
 </head>
 <body>
 	<br><br>
<div class="container card" >
 	<div class="row">

 		<div class="card col-sm-6">
 			<img src="ImageLogo/Logoss.png" style="height:500px; width:500px;">
 		</div>


 		<div class="card col-sm-6" style="background:#00970c26; padding-left:80px; padding-right:80px; padding-bottom:50px;">
<form method="post">
 			<br>
 			<center>
 				<img src="ImageLogo/Textperttext.png" style="height:80px;">
 					<br><p style="color:red;"><?php echo $msg; ?></p>
 					<p style="color:green;"><?php echo $msg1; ?></p>
 			</center>

			<div class="form-floating mb-3">
			  <input type="text" class="form-control" name="Fullname" id="floatingInput" value="<?php echo $displayname;?>" placeholder="Fullname" required>
			  <label for="floatingInput">Fullname</label>
			</div>

			<div class="form-floating mb-3">
			  <input type="email" class="form-control" name="Email" id="floatingInput" value=" <?php echo $displayemail; ?>" placeholder="Email Address" required>
			  <label for="floatingInput">Email Address</label>
			</div>

			<div class="form-floating mb-3">
			  <input type="Password" class="form-control" name="Password" id="floatingpass" onkeyup='check()' placeholder="Password" required=>
			  <label for="floatingInput">Password</label>
			</div>

			<div class="form-floating mb-3">
			  <input type="Password" class="form-control" id="floatingpassconfirm" onkeyup='check()' placeholder="Confirm Password" required=>
			  <label for="floatingInput">Confirm Password</label>
			</div>

				<div class="form-check">
				  <input class="form-check-input" type="checkbox" onclick="showpass()" id="flexCheckIndeterminate">
				  <label class="form-check-label" for="flexCheckIndeterminate">
				    Show Password
				  </label>
				</div>

			  <p id="alertPassword"></p>
			  <div class="row">
			  	<div class="col-sm-12"><a href="UserLogin.php" style=" text-decoration: none;">Already have an Account?</a></div>
			  </div>
			  <br>
			  <button type="submit" name="submit" class="btn btn-primary form-control" id="submit">Sign Up</button>

</form>
		</div>
	</div> 		
</div>


 </div>



 <?php require('include/footer.php'); ?>
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