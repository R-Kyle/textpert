<?php 
require("../include/database.php");
require("include/navigationbar.php");
session_start();
error_reporting(0);

if (strlen( $_SESSION['uid']==0)) {
  header('location:signout.php');
  } 

$title='PHP';

?>

<html>
<link rel="stylesheet" type="text/css" href="css/index.css">
<head>
	<title>TexPert |  <?php echo $title; ?></title>
</head>
<body>
	<br><br>

<div class="container">
	<div class="row">


		<div class="col-sm-3">
			<a href="Prog<?php echo $title; ?>/index.php">
				<center>
					<h5>Learn to Code with</h5>
					<img src="../ImageLogo/phplogo.png" height="150" width="150"><br><br>
					<p class="btn btn-primary">Chat with Bot Now!</p>
				</center>	
			</a>
		</div>


		<div class="col-sm-9">

			 <?php 
	            $query=mysqli_query($con,"SELECT * FROM programming_description WHERE Language = '$title' ");
	           while ($row=mysqli_fetch_array($query)) {
	          ?>
	            <h3> <?php echo $row['Title_Description']; ?> </h3>
	            <pre style="letter-spacing: 2px; white-space:pre-wrap"> <?php echo $row['Description']; ?> </pre>
	            <br><hr>

	            <?php } ?>

		</div>
	
	</div>
</div>

<?php require('include/footer.php'); ?>
</body>
</html>