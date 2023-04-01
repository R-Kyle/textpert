<?php 
require("../include/database.php");
require("include/navigationbar.php");
session_start();
error_reporting(0);

$msg="";
$uid = $_SESSION['uid'];
if (strlen( $_SESSION['uid']==0)) {
  header('location:signout.php');
  } 

$display = mysqli_query($con,"SELECT * FROM userlogin WHERE id='$uid' ");
$result=mysqli_fetch_array($display);

$imageURL = "../ImageLogo/".$result["ProfilePhoto"];

$targetDir = "../ImageLogo/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



if (isset($_POST['submit'])) {
	
	$name = $_POST['fullname'];
	$mail = $_POST['email'];

	$update = mysqli_query($con,"UPDATE userlogin SET Fullname='$name', Email_Address='$mail' WHERE id='$uid' ");
	$update1 = mysqli_query($con,"UPDATE forum_post SET Posted_By_Name='$name' WHERE Posted_By_Id='$uid' ");

	        // Allow certain file formats
             $allowTypes = array('jpg','png','jpeg','JPG','PNG','JPEG');
             if(in_array($fileType, $allowTypes)){
                 // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                     $upd = $con->query("UPDATE userlogin SET ProfilePhoto='$fileName' WHERE id='$uid' ");
                }//Move File            
             }//Allowtpes



	if ($update) {
		$msg="Successfully Updated";
		 header('location:profile.php');
	}
	else{
		$msg="Something Went Wrong Please Try Again";
	}

}




?>
<script type="text/javascript">
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<!DOCTYPE html>
<html>
<head>
	<title>TexPert | Profile</title>
</head>
<body>
<br><br>
<form method="post" enctype="multipart/form-data">
<div class="container">
	<div class="row">
		
		<div class="col-sm-4 card row" style="padding-top:2%; padding-bottom: 2%;">
			<center>			
				<img src="<?php echo $imageURL; ?>" id="preview" style="height:300px; width:300px; border:solid 2px; border-radius:150px; padding:10px;">
				<br><br>
				<input type="file" name="file" id="upload" hidden/ onchange="readURL(this);">
                 <center><label for="upload" class="uploadfile btn btn-warning form-control">Select Profile Image</label></center>
				<br>
				<button type="submit" name="submit" class="btn btn-success form-control">Update Profile</button>
			</center>
		</div>

		<div class="col-sm-1 "></div>

		<div class="col-sm-7 card" style="padding:3%;">

			<center>
				<img src="../ImageLogo/Textperttext.png" style="height: 50px; width: 350px;">
				<p style="color:red;"><?php echo $msg; ?></p>
			</center>

			<h6>Fullname</h6>
			<div class="form-floating mb-3">
			  <input type="text" class="form-control" name="fullname" id="floatingInput" placeholder="fullname" value="<?php echo $result['Fullname']; ?>">
			  <label for="floatingInput">Fullname</label>
			</div>

			<h6>Email Address</h6>
			<div class="form-floating mb-3">
			  <input type="Email" class="form-control" name="email" id="floatingInput" placeholder="Email Address" value="<?php echo $result['Email_Address']; ?>">
			  <label for="floatingInput">Email Address</label>
			</div>

			<h6>Date Registered</h6>
			<div class="form-floating mb-3 input-group">
			  <input type="text" class="form-control" name="registred" id="floatingInput" placeholder="Date Registred" disabled value="<?php echo $result['Date_Registered']; ?>">
			  <label for="floatingInput">Date Registred</label>
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
  var x = document.getElementById("floatingpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

     


</script>