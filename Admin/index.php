<?php 
require('../include/database.php');
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
	
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = $con->query("SELECT * from useradmin where Username='$username' and Password = '$password' ");
    $ret=mysqli_fetch_array($query);

    if($ret>0){
      $_SESSION['aid']=$ret['id'];
     	header('location:dashboard.php');
    }
    else{
   	 $msg="Invalid Details.";
    }


}


 ?>
<html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
<link href="css/style.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="../ImageLogo/Logoss.png">
<head>
	<title>Admin Login</title>
</head>
<body style="background:#313131;">

<div class="container">
	<div class="col-sm-12 row" style="margin-top:100px;">
		
<div class="col-sm-4"></div>
			<div class="col-sm-4 card" style="background:#f1f1f1; border-radius:20px;">

				<?php 
                  
                    // $query1 = $con->query("SELECT * FROM common_bot ");
                    // $row = $query1->fetch_assoc();

                    // $imageURL = "../ImageLogo/".$row["System_Logo"];
                ?>   

				<br><br>
				<center>
					<img src="../ImageLogo/Logoss.png" height="100" width="100" style="border-radius:100px;">
					<br>
					<b><p>Sign in by entering the information below <br><br><i style="color:red;"><?php echo $msg; ?></i></p></b>
				</center>
				<form class="form-horizontal form-material" method="POST" style="margin-left:50px;margin-right:50px;">

	                <div class="input-group mb-2 form-group mb-4">
					  <span class="input-group-text fa fa-user " style="background:transparent;"></span>
					  <input type="text" class="form-control" placeholder="Username" name="username" style="text-align:center;">
					</div>

					<div class="input-group mb-2 form-group mb-4">
					  <span class="input-group-text fa fa-key" style="background:transparent;"></span>
					  <input type="Password" class="form-control" placeholder="Password" name="password" style="text-align:center;">
					</div>

					<div class="input-group mb-2">
					  <button class="btn btn-success form-control" type="submit" name="submit">Submit</button>
					</div>

	
                </form>
                <br><br>
			</div>
		
<div class="col-sm-4"></div>
	</div>
</div>

</body>
</html>