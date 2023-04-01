<?php require('include/navigationbar.php'); ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/index.css">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TexPert | Homepage</title>
</head>
<body>

	<?php 

	 require('include/database.php');
            $query1 = $con->query("SELECT * FROM common_bot ");
            $row = $query1->fetch_assoc();

	 ?>

<div class="container-fluid row">
	<div class="col-md-6 ">
		<br><br><br><br>
		<h1 class="h1 ">
            <?php echo $row['Mainline']; ?>
        </h1>
        <center><h3><?php echo $row['Subline']; ?></center>

        <br>

	</div>

	<div class="col-md-6">
		<img class="div2" src="ImageLogo/chatgif.gif">
	</div>

<div class="col-sm-12">
	<br><br>
	<center><h2><?php echo $row['Tagline']; ?></h2></center>
</div>

</div>


<?php require('include/footer.php'); ?>
</body>
</html>
