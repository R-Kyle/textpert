<?php 
require("../include/database.php");
require("include/navigationbar.php");
session_start();
error_reporting(0);
$msg="";
$uid = $_SESSION['uid'];
$currentpass = "";
$newpass = "";
$oldpass = "";

	$display = mysqli_query($con,"SELECT * FROM userlogin WHERE id='$uid' ");
	$row=mysqli_fetch_array($display);
	$imageURL = "../ImageLogo/".$row["ProfilePhoto"];


if (strlen( $_SESSION['uid']==0)) {
  header('location:signout.php');
  } 

if (isset($_POST['submit'])) {
	
	$currentpass = md5($_POST['currentpass']);
	$newpass = md5($_POST['newpass']);

	//Check old password if same in database
	$getpass = mysqli_query($con,"SELECT * FROM userlogin WHERE id='$uid' ");
	$row=mysqli_fetch_array($getpass);
	$oldpass = $row['Password'];
	$imageURL = "../ImageLogo/".$row["ProfilePhoto"];

	if ($oldpass != $currentpass) {
		$msg = '<i style="color:red">Incorrect Old Password</i>';
		
		$currentpass = $_POST['currentpass'];
		$newpass = $_POST['newpass'];


	}else{
		$update = mysqli_query($con,"UPDATE userlogin SET Password='$newpass' WHERE id='$uid' ");
		$msg = '<i style="color:green">Password Succefully Updated</i>';
		$currentpass = "";
	}



}




?>

<!DOCTYPE html>
<html>
<head>
	<title>TexPert | Change Password</title>
</head>
<body>
<br><br>
<form method="post">
<div class="container">
	<div class="row">
		
		<div class="col-sm-4 card row" style="padding-top:2%; padding-bottom: 2%; height: 350px; border:none;">
			<center>			
				<img src="<?php echo $imageURL ?>" style="height:300px; width:300px; border:solid 2px; border-radius:150px; padding:10px;">
			</center>
		</div>

		<div class="col-sm-1 "></div>

		<div class="col-sm-7 card" style="padding:3%;">

			<center>
				<img src="../ImageLogo/Textperttext.png" style="height: 50px; width: 350px;">
				<p><?php echo $msg; ?></p>
			</center>

			<h6><i style="color:red">*</i> Enter Your Current/Old Password</h6>
			<div class="form-floating mb-3">
			  <input type="Password" class="form-control" name="currentpass" id="floatingpassold" placeholder="Current Password" required value="<?php echo $currentpass; ?>">
			  <label for="floatingpass">Current Password</label>
			</div>

			<h6><i style="color:red">*</i> Enter Your New Password</h6>
			<div class="form-floating mb-3">
			  <input type="Password" class="form-control" name="newpass" id="floatingpassnew" onkeyup='check()' placeholder="New Password" required>
			  <label for="floatingpass">New Password</label>
			</div>

			<h6><i style="color:red">*</i> Confirm Your New Password</h6>
			<div class="form-floating mb-3">
			  <input type="Password" class="form-control" id="floatingpassconfirm" onkeyup='check()' placeholder="Confirm Password" required>
			  <label for="floatingpass">Confirm Password</label>
			</div>

			<p id="alertPassword"></p>
			
			<div class="form-check">
				<input class="form-check-input" type="checkbox" onclick="showpass()" id="flexCheckIndeterminate">
				<label class="form-check-label" for="flexCheckIndeterminate">Show Password</label>
			</div>
			<br>
			<div class="col-6">
				<button type="submit" name="submit" id="submit" class="btn btn-primary form-control">Update Profile</button>
			</div>

		</div>


			

		</div>

	</div>
</div>
</form>


<?php require('include/footer.php'); ?>
</body>
</html>

<script>
function showpass() {
  var x = document.getElementById("floatingpassold");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

   var y = document.getElementById("floatingpassnew");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }

     var z = document.getElementById("floatingpassconfirm");
  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }


}



 var check = function() {

 		if (document.getElementById('floatingpassnew').value == '' && document.getElementById('floatingpassconfirm').value == '' ) {


 		}else{


		      if (document.getElementById('floatingpassnew').value == document.getElementById('floatingpassconfirm').value) {
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
</script>