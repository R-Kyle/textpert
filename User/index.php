<?php 
require('../include/database.php');
require('include/navigationbar.php');
session_start();
error_reporting(0);
if (strlen( $_SESSION['uid']==0)) {
  header('location:signout.php');
  } 

 ?>
<html>

<head>
	<title>TexPert | Home</title>
</head>
<body>

<?php require('include/footer.php'); ?>
</body>
</html>
